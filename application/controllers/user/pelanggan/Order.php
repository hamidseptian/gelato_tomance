<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index()
	{
		$data['produk']=$this->db->query("SELECT * from produk")->result_array();
		$this->admin->load('home/template','pelanggan/form/pesanan/semua_pesanan', $data);
	}
	
	public function simpan_ke_keranjang()
	{
		$qty = $this->input->post('qty');
		$id_ukuran = $this->input->post('id_ukuran');
		$id_produk = $this->input->post('id_produk');
		$warna = $this->input->post('warna');
		$maksimal_topping = $this->input->post('maksimal_topping');
		$id_topping = $this->input->post('id_topping');
		$qty_topping = $this->input->post('qty_topping');

		$banyak_toping = array_sum($qty_topping);
		if ($banyak_toping>$maksimal_topping) {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Gagal memasukkan ke keranjang<br>Total maksimal topping yang dibolehkan adalah '.$maksimal_topping.'</div>');
			redirect('homepage/detail_produk/'.$id_ukuran);
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data di masukkan ke keranjang</div>');
			$data = [
				'id_pelanggan'=>$this->session->userdata('id_user'),
				'id_ukuran'=>$id_ukuran,
				'id_produk'=>$id_produk,
				'id_warna'=>$warna,
				'qty'=>$qty,
				'status_pesanan'=>'Masuk Ke Keranjang'
			];
			$this->db->insert('pesanan', $data);
			$last_insert_id = $this->db->insert_id(); 
			foreach ($qty_topping as $k => $v) {
				$id_topping_terpilih = $id_topping[$k];
				$q_topping = $this->db->get_where('topping', ['id_topping'=>$id_topping_terpilih])->row_array();
				$harga_topping = $q_topping['harga'];
				$nama_topping = $q_topping['nama_topping'];
				$stok_topping = $q_topping['stok'];
				if ($v>0) {
					$data = [
						'id_pesanan'=>$last_insert_id,
						'id_topping'=>$id_topping_terpilih,
						'nama_topping'=>$nama_topping,
						'banyak_topping'=>$v,
						'harga_topping '=>$harga_topping
					];
					$this->db->insert('topping_pesanan', $data);
				}
			}
		}
		
			redirect('homepage/produk');
	}
	
	public function simpanedit_ke_keranjang()
	{
		$id_pesanan = $this->input->post('id_pesanan');
		$qty = $this->input->post('qty');
		$id_ukuran = $this->input->post('id_ukuran');
		$id_produk = $this->input->post('id_produk');
		$warna = $this->input->post('warna');
		$maksimal_topping = $this->input->post('maksimal_topping');
		$id_topping = $this->input->post('id_topping');
		$qty_topping = $this->input->post('qty_topping');

		$banyak_toping = array_sum($qty_topping);
		if ($banyak_toping>$maksimal_topping) {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Gagal memasukkan ke keranjang<br>Total maksimal topping yang dibolehkan adalah '.$maksimal_topping.'</div>');
			redirect('user/pelanggan/keranjang/'.$id_ukuran.'/'.$id_pesanan);
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data di masukkan ke keranjang</div>');
			$data = [
				'id_pelanggan'=>$this->session->userdata('id_user'),
				'id_ukuran'=>$id_ukuran,
				'id_produk'=>$id_produk,
				'id_warna'=>$warna,
				'qty'=>$qty,
				'status_pesanan'=>'Masuk Ke Keranjang'
			];
			$where = ['id_pesanan'=>$id_pesanan];
			$this->db->update('pesanan', $data, $where);
			$last_insert_id = $this->db->insert_id(); 
			$this->db->delete('topping_pesanan', $where);
			foreach ($qty_topping as $k => $v) {
				$id_topping_terpilih = $id_topping[$k];
				$q_topping = $this->db->get_where('topping', ['id_topping'=>$id_topping_terpilih])->row_array();
				$harga_topping = $q_topping['harga'];
				$nama_topping = $q_topping['nama_topping'];
				if ($v>0) {
					$data = [
						'id_pesanan'=>$id_pesanan,
						'id_topping'=>$id_topping_terpilih,
						'nama_topping'=>$nama_topping,
						'banyak_topping'=>$v,
						'harga_topping '=>$harga_topping
					];
					$this->db->insert('topping_pesanan', $data);
				}
			}
		}
		
			redirect('user/pelanggan/keranjang/');
	}

	public function edit($id)
	{
		
		$data['produk'] = $this->db->get_where('produk', array('id_produk' => $id))->row_array(); 
		$this->admin->load('admin/template','admin/form/produk/edit_produk', $data);
	}

	public function simpanedit()
	{
		$nama = $this->input->post('nama');
		$id = $this->input->post('id');
		$data = [
			'nama_produk'=>$nama
		];
		$where = [
			'id_produk'=>$id
		];
		$this->db->update('produk', $data, $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data produk berhasil diperbaharui</div>');
		redirect('user/admin/produk');
	}

	public function pesanan($status, $waktu)
	{
			$status  = str_replace('%20', ' ', $status);
			$waktu  = str_replace('%20', ' ', $waktu);
			$id_plg = $this->session->userdata('id_user');
			$q_pesanan = "SELECT * from pesanan p 
			left join ukuran u on p.id_ukuran=u.id_ukuran
			left join produk pr on p.id_produk=pr.id_produk
			where p.id_pelanggan='$id_plg' and p.status_pesanan='$status' and waktu_pesan='$waktu' group by p.id_ukuran";
			$data['status']=$status;
			$data['pesanan']=$this->db->query($q_pesanan)->result_array();
			$data['j_pesanan']=$this->db->query($q_pesanan)->num_rows();
			$data['rekening']=$this->db->query("SELECT * from rekening")->result_array();
			$this->admin->load('home/template','pelanggan/form/pesanan/pesanan', $data);
		
	}
}
