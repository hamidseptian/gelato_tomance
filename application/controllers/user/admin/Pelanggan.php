<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function index()
	{
		$data['pelanggan']=$this->db->query("SELECT * from pelanggan")->result_array();
		$this->admin->load('admin/template','admin/form/pelanggan/data_pelanggan', $data);
	}
	public function tambah()
	{
		
		$this->admin->load('admin/template','admin/form/pelanggan/tambah_pelanggan');
	}
	
	public function simpan()
	{
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$nohp = $this->input->post('nohp');
		$data = [
			'nama_pelanggan'=>$nama,
			'alamat_pelanggan'=>$alamat,
			'nohp_pelanggan'=>$nohp,
		];
		$this->db->insert('pelanggan', $data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data pelanggan berhasil ditambahkan</div>');
		redirect('user/admin/pelanggan');
	}

	public function edit($id)
	{
		
		$data['pelanggan'] = $this->db->get_where('pelanggan', array('id_pelanggan' => $id))->row_array(); 
		$this->admin->load('admin/template','admin/form/pelanggan/edit_pelanggan', $data);
	}

	public function simpanedit()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$nohp = $this->input->post('nohp');
		$data = [
			'nama_pelanggan'=>$nama,
			'alamat_pelanggan'=>$alamat,
			'nohp_pelanggan'=>$nohp,
		];
		$where = [
			'id_pelanggan'=>$id
		];
		$this->db->update('pelanggan', $data, $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data pelanggan berhasil diperbaharui</div>');
		redirect('user/admin/pelanggan');
	}
	public function hapus($id)
	{
		$this->db->delete('pelanggan', array('id_pelanggan' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data pelanggan berhasil dihapus</div>');
		redirect('user/admin/pelanggan');
	}
}
