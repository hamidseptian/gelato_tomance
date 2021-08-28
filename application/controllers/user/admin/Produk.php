<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function index()
	{
		$data['produk']=$this->db->query("SELECT * from produk")->result_array();
		$this->admin->load('admin/template','admin/form/produk/data_produk', $data);
	}
	public function tambah()
	{
		
		$this->admin->load('admin/template','admin/form/produk/tambah_produk');
	}
	
	public function simpan()
	{
		$nama = $this->input->post('nama');
		$ket = $this->input->post('ket');
		$data = [
			'nama_produk'=>$nama,
			'keterangan'=>$ket
		];
		$this->db->insert('produk', $data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data produk berhasil ditambahkan</div>');
		redirect('user/admin/produk');
	}

	public function edit($id)
	{
		
		$data['produk'] = $this->db->get_where('produk', array('id_produk' => $id))->row_array(); 
		$this->admin->load('admin/template','admin/form/produk/edit_produk', $data);
	}

	public function simpanedit()
	{
		$nama = $this->input->post('nama');
		$ket = $this->input->post('ket');
		$id = $this->input->post('id');
		$data = [
			'nama_produk'=>$nama,
			'keterangan'=>$ket
		];
		$where = [
			'id_produk'=>$id
		];
		$this->db->update('produk', $data, $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data produk berhasil diperbaharui</div>');
		redirect('user/admin/produk');
	}
	public function hapus($id)
	{
		$this->db->delete('produk', array('id_produk' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data produk berhasil dihapus</div>');
		redirect('user/admin/produk');
	}
}
