<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

	public function index()
	{
		$data['rekening']=$this->db->query("SELECT * from rekening")->result_array();
		$this->admin->load('admin/template','admin/form/rekening/data_rekening', $data);
	}
	public function tambah()
	{
		
		$this->admin->load('admin/template','admin/form/rekening/tambah_rekening');
	}
	
	public function simpan()
	{
		$kode = $this->input->post('kode');
		$bank = $this->input->post('bank');
		$norek = $this->input->post('norek');
		$narek = $this->input->post('narek');
		$data = [
			'kode_bank'=>$kode,
			'nama_bank'=>$bank,
			'no_rekening'=>$norek,
			'nama_rekening'=>$narek,
		];
		$this->db->insert('rekening', $data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data rekening berhasil ditambahkan</div>');
		redirect('user/admin/rekening');
	}

	public function edit($id)
	{
		
		$data['rekening'] = $this->db->get_where('rekening', array('id_rekening' => $id))->row_array(); 
		$this->admin->load('admin/template','admin/form/rekening/edit_rekening', $data);
	}

	public function simpanedit()
	{
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$bank = $this->input->post('bank');
		$norek = $this->input->post('norek');
		$narek = $this->input->post('narek');
		$data = [
			'kode_bank'=>$kode,
			'nama_bank'=>$bank,
			'no_rekening'=>$norek,
			'nama_rekening'=>$narek,
		];
		$where = [
			'id_rekening'=>$id
		];
		$this->db->update('rekening', $data, $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data rekening berhasil diperbaharui</div>');
		redirect('user/admin/rekening');
	}
	public function hapus($id)
	{
		$this->db->delete('rekening', array('id_rekening' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data rekening berhasil dihapus</div>');
		redirect('user/admin/rekening');
	}
}
