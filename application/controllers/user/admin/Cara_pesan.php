<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cara_pesan extends CI_Controller {

	public function index()
	{
		$data['cara_pesan']=$this->db->query("SELECT * from cara_pesan where id = 1")->row_array();
		$this->admin->load('admin/template','admin/form/cara_pesan/data_cara_pesan', $data);
	}
	public function tambah()
	{
		
		$this->admin->load('admin/template','admin/form/cara_pesan/tambah_cara_pesan');
	}
	
	public function simpan()
	{
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$nohp = $this->input->post('nohp');
		$data = [
			'nama'=>$nama,
			'alamat'=>$alamat,
			'email'=>$email,
			'nohp'=>$nohp,
		];
		$this->db->insert('cara_pesan', $data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data cara pesan berhasil ditambahkan</div>');
		redirect('user/admin/cara_pesan');
	}

	public function edit($id)
	{
		
		$data['cara_pesan'] = $this->db->get_where('cara_pesan', array('id' => $id))->row_array(); 
		$this->admin->load('admin/template','admin/form/cara_pesan/edit_cara_pesan', $data);
	}

	public function simpanedit()
	{
		$id = $this->input->post('id');
		$isi = $this->input->post('isi');
		$data = [
			'cara_pesan'=>$isi
		];
		$where = [
			'id'=>$id
		];
		$this->db->update('cara_pesan', $data, $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data cara_pesan berhasil diperbaharui</div>');
		redirect('user/admin/cara_pesan');
	}
	public function hapus($id)
	{
		$this->db->delete('cara_pesan', array('id' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data cara_pesan berhasil dihapus</div>');
		redirect('user/admin/cara_pesan');
	}
}
