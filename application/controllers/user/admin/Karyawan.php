<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	public function index()
	{
		$data['karyawan']=$this->db->query("SELECT * from karyawan")->result_array();
		$this->admin->load('admin/template','admin/form/karyawan/data_karyawan', $data);
	}
	public function tambah()
	{
		
		$this->admin->load('admin/template','admin/form/karyawan/tambah_karyawan');
	}
	
	public function simpan()
	{
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$nohp = $this->input->post('nohp');
		$data = [
			'nama_karyawan'=>$nama,
			'alamat_karyawan'=>$alamat,
			'nohp_karyawan'=>$nohp,
		];
		$this->db->insert('karyawan', $data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data karyawan berhasil ditambahkan</div>');
		redirect('user/admin/karyawan');
	}

	public function edit($id)
	{
		
		$data['karyawan'] = $this->db->get_where('karyawan', array('id_karyawan' => $id))->row_array(); 
		$this->admin->load('admin/template','admin/form/karyawan/edit_karyawan', $data);
	}

	public function simpanedit()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$nohp = $this->input->post('nohp');
		$data = [
			'nama_karyawan'=>$nama,
			'alamat_karyawan'=>$alamat,
			'nohp_karyawan'=>$nohp,
		];
		$where = [
			'id_karyawan'=>$id
		];
		$this->db->update('karyawan', $data, $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data karyawan berhasil diperbaharui</div>');
		redirect('user/admin/karyawan');
	}
	public function hapus($id)
	{
		$this->db->delete('karyawan', array('id_karyawan' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data karyawan berhasil dihapus</div>');
		redirect('user/admin/karyawan');
	}
}
