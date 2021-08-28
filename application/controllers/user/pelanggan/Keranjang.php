<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	public function index()
	{
		$id_plg = $this->session->userdata('id_user');
		$q_pesanan = "SELECT * from pesanan p 
		left join ukuran u on p.id_ukuran=u.id_ukuran
		left join produk pr on p.id_produk=pr.id_produk
		where p.id_pelanggan='$id_plg' and p.status_pesanan='Masuk Ke Keranjang' group by p.id_ukuran";
		$data['pesanan']=$this->db->query($q_pesanan)->result_array();
		$data['j_pesanan']=$this->db->query($q_pesanan)->num_rows();
		$data['rekening']=$this->db->query("SELECT * from rekening")->result_array();
		$this->admin->load('home/template','pelanggan/form/keranjang/keranjang', $data);
	}
	public function checkout()
	{
		$pengambilan = $this->input->post('pengambilan');
		$tgls =date('Y-m-d');
		$sesudah = date('Y-m-d', strtotime("+2 days", strtotime($tgls)));


		if (strtotime($pengambilan) < strtotime($sesudah)) {
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Gagal Checkout <br>Waktu pengambilan yang di bolehkan adalah diatas tanggal '.$sesudah.'</div>');
			redirect('user/pelanggan/keranjang');
		}else{
			date_default_timezone_set("Asia/Bangkok");
			$jam_sekarang = date('H');
			$jam_berakhir = $jam_sekarang + 6;
			if ($jam_berakhir>23) {
				$tgl_expired = date('Y-m-d', strtotime("+2 days", strtotime($tgls)));
				$sisa_jam = $jam_berakhir - 24;
				$akhir_pembayaran = $tgl_expired.' 0'.$sisa_jam.':'.date('i');
			}else{
				$akhir_pembayaran = $tgls.' '.$jam_berakhir.':'.date('i');
			}
			// $this->session->set_flashdata('pesan','<div class="alert alert-success">Checkout Sukses<br>Silahkan lakukan pembayaran sebelum  '.$akhir_pembayaran.'</div>');
			$id_plg = $this->session->userdata('id_user');
			$q_pesanan = "SELECT * from pesanan p 
			left join ukuran u on p.id_ukuran=u.id_ukuran
			left join produk pr on p.id_produk=pr.id_produk
			where p.id_pelanggan='$id_plg' and p.status_pesanan='Masuk Ke Keranjang' group by p.id_ukuran";
			$data['pengambilan']=$pengambilan;
			$data['pesanan']=$this->db->query($q_pesanan)->result_array();
			$data['j_pesanan']=$this->db->query($q_pesanan)->num_rows();
			$data['rekening']=$this->db->query("SELECT * from rekening")->result_array();
			$this->admin->load('home/template','pelanggan/form/keranjang/checkout', $data);
		}
	}
	public function konfirmasi()
	{
		$pengambilan = $this->input->post('pengambilan');
		$tgls =date('Y-m-d');
		$waktu_skrg =date('H:i');
		$waktu_pesan = $tgls.' '.$waktu_skrg;
		$sesudah = date('Y-m-d', strtotime("+2 days", strtotime($tgls)));


		if (strtotime($pengambilan) < strtotime($sesudah)) {
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Gagal Checkout <br>Waktu pengambilan yang di bolehkan adalah diatas tanggdasdal '.$pengambilan.'</div>');
			redirect('user/pelanggan/keranjang');
		}else{
			date_default_timezone_set("Asia/Bangkok");
			$jam_sekarang = date('H');
			$jam_berakhir = $jam_sekarang + 6;
			if ($jam_berakhir>23) {
				$tgl_expired = date('Y-m-d', strtotime("+2 days", strtotime($tgls)));
				$sisa_jam = $jam_berakhir - 24;
				$showjam = $sisa_jam<=9 ? ''.$sisa_jam : $sisa_jam;
				$akhir_pembayaran = $tgl_expired.' 0'.$showjam.':'.date('i');
			}else{
				$showjam = $jam_berakhir<=9 ? '0'.$jam_berakhir : $jam_berakhir;
				$akhir_pembayaran = $tgls.' '.$showjam.':'.date('i');
			}
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Checkout Sukses<br>Silahkan lakukan pembayaran sebelum  '.$akhir_pembayaran.'</div>');
			$id_plg = $this->session->userdata('id_user');
			echo $id_plg;
			$q_pesanan = "UPDATE  pesanan 
			set status_pesanan = 'Menunggu Pembayaran', akhir_pembayaran='$akhir_pembayaran',
			tanggal_pengambilan='$pengambilan', tanggal_pesan='$tgls', waktu_pesan='$waktu_pesan'
			where id_pelanggan='$id_plg' and status_pesanan='Masuk Ke Keranjang'";
			$update = $this->db->query($q_pesanan);
			redirect('user/pelanggan/order/pesanan/Menunggu Pembayaran/'.$waktu_pesan);
		}
	}
	
	
	public function hapus($id)
	{
		$this->db->delete('pesanan', array('id_pesanan' => $id)); 
		$this->db->delete('topping_pesanan', array('id_pesanan' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data produk berhasil dihapus dalam keranjang</div>');
		redirect('user/pelanggan/keranjang');
	}


	public function edit($id, $id_pesanan)
	{
			$produk = $this->db->query("SELECT * from ukuran u left join produk p on u.id_produk=p.id_produk where u.id_ukuran='$id'")->row_array();
			$id_ukuran = $produk['id_ukuran'];
			$qwarna_produk = "SELECT * from warna where id_ukuran='$id_ukuran'";
			$qtopping = "SELECT * from topping where stok >0";

			$data['id_pesanan'] = $id_pesanan;
			$data['pesanan'] = $this->db->query("SELECT * from pesanan where id_pesanan='$id_pesanan'")->row_array();
			$data['warna']=$this->db->query($qwarna_produk)->result_array();
			$data['topping']=$this->db->query($qtopping)->result_array();
			$data['produk']=$produk;
			$data['caption_cari']='';
		
			

		
		$this->admin->load('home/template','pelanggan/form/keranjang/edit_keranjang', $data);
	}
}
