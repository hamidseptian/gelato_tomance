<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topping extends CI_Controller {

	public function index()
	{
		$data['topping']=$this->db->query("SELECT * from topping")->result_array();
		$this->admin->load('admin/template','admin/form/topping/data_topping', $data);
	}
	public function tambah()
	{
		
		$this->admin->load('admin/template','admin/form/topping/tambah_topping');
	}
	
	public function simpan()
	{
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$data = [
			'nama_topping'=>$nama,
			'harga'=>$harga,
			'stok'=>$stok
		];
		$this->db->insert('topping', $data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data topping berhasil ditambahkan</div>');
		redirect('user/admin/topping');
	}

	public function edit($id)
	{
		
		$data['topping'] = $this->db->get_where('topping', array('id_topping' => $id))->row_array(); 
		$this->admin->load('admin/template','admin/form/topping/edit_topping', $data);
	}

	public function simpanedit()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$data = [
			'nama_topping'=>$nama,
			'harga'=>$harga,
			'stok'=>$stok
		];
		$where = [
			'id_topping'=>$id
		];
		$this->db->update('topping', $data, $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data topping berhasil diperbaharui</div>');
		redirect('user/admin/topping');
	}
	public function hapus($id)
	{
		$this->db->delete('topping', array('id_topping' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data topping berhasil dihapus</div>');
		redirect('user/admin/topping');
	}
}
