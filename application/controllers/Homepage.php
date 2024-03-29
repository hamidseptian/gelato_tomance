	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('homepage_model');
	}
	public function index()
	{
		$this->home->load('home/template','home/form/home/home');
	}
	public function daftar()
	{
		$this->home->load('home/template','home/form/daftar/daftar');
	}

	public function simpan_pelanggan()
	{
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$nohp = $this->input->post('nohp');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek_username = $this->db->get_where('pelanggan',['username'=>$username])->num_rows();
		if ($cek_username>0) {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data admin gagal ditambahkan<br>Username sudah dipakai</div>');
		redirect('homepage/daftar');
		}else{

		$data = [
			'nama_pelanggan'=>$nama,
			'alamat_pelanggan'=>$alamat,
			'nohp_pelanggan'=>$nohp,
			'username'=>$username,
			'password'=>$password,
		];
		$this->db->insert('pelanggan', $data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Pendaftaran berhasil<br>silahkan login</div>');
		redirect('homepage/login_pelanggan');
		}
	}
	public function login_admin()
	{
		$this->home->load('home/template','home/form/login/admin');
	}
	public function cara_pesan()
	{
		$data['cara_pesan'] = $this->db->get_where('cara_pesan', ['id'=>1])->row();
		$this->home->load('home/template','home/form/cara_pesan/cara_pesan', $data);
	}
	public function login_pelanggan()
	{
		$this->home->load('home/template','home/form/login/pelanggan');
	}

	public function proseslogin_admin(){
		$username = $this->input->post('username');
		//$pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$pass=$this->input->post('password');
			$user= $this->db->get_where('admin', ['username'=>$username])->row_array();
			if ($user) {
				$pasword_tersimpan = $user['password'];
				//$verivikasi=password_verify($pass, $pasword_tersimpan);
			
				if ($pasword_tersimpan == $pass) {
					$data_session = [
						'status' => "login",
						'level'=>$user['level'],
						'nama_user'=>$user['nama_admin'],
						'id_user'=>$user['id_admin']
					];
 					$this->session->set_userdata($data_session);
					redirect('user/admin/dashboard');
				}
				else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger">Password salah</div>');
					redirect('homepage/login_admin');
					
				}

			}
			else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Username dan password salah</div>');
				redirect('homepage/login_admin');
			}
	}
	public function proseslogin_pelanggan(){
		$username = $this->input->post('username');
		//$pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$pass=$this->input->post('password');
			$user= $this->db->get_where('pelanggan', ['username'=>$username])->row_array();
			if ($user) {
				$pasword_tersimpan = $user['password'];
				//$verivikasi=password_verify($pass, $pasword_tersimpan);
			
				if ($pasword_tersimpan == $pass) {
					$data_session = [
						'status' => "login",
						'level'=>'pelanggan',
						'nama_user'=>$user['nama_pelanggan'],
						'id_user'=>$user['id_pelanggan']
					];
 					$this->session->set_userdata($data_session);
					redirect('user/pelanggan/dashboard');
				}
				else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger">Password salah</div>');
					redirect('homepage/login_pelanggan');
					
				}

			}
			else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger">Username dan password salah</div>');
				redirect('homepage/login_pelanggan');
			}



///		$data=$this->db->insert('admin',['username'=>$username, 'password'=>$pass]);
	}





	public function produk()
	{
		if (!$this->input->post('keyword')) {
			$data['caption_cari']='';
			$data['produk']=$this->db->query("SELECT * from ukuran u left join produk p on u.id_produk=p.id_produk")->result_array();
		}else{
			$keyword = $this->input->post('keyword');
			$data['caption_cari']=$keyword;
			$data['produk']=$this->db->query("SELECT * from ukuran u left join produk p on u.id_produk=p.id_produk where p.nama_produk like '%$keyword%' or u.ukuran like '%$keyword%'")->result_array();

		}
		$this->admin->load('home/template','home/form/produk/produk', $data);
	}

	public function detail_produk($id)
	{
			$produk = $this->db->query("SELECT * from ukuran u left join produk p on u.id_produk=p.id_produk where u.id_ukuran='$id'")->row_array();
			$id_ukuran = $produk['id_ukuran'];
			$qwarna_produk = "SELECT * from warna where id_ukuran='$id_ukuran'";
			$qtopping = "SELECT * from topping where stok >0";
			$data['warna']=$this->db->query($qwarna_produk)->result_array();
			$data['topping']=$this->db->query($qtopping)->result_array();
			$data['produk']=$produk;
			$data['caption_cari']='';
		
			

		
		$this->admin->load('home/template','home/form/produk/detail_produk', $data);
	}
	public function cp()
	{

			$data['cp']=$this->db->query("SELECT * from contact_person")->result_array();


		$this->admin->load('home/template','home/form/cp/cp', $data);
	}
	
}
