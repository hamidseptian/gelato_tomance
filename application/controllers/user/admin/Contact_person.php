<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_person extends CI_Controller {

	public function index()
	{
		$data['contact_person']=$this->db->query("SELECT * from contact_person")->result_array();
		$this->admin->load('admin/template','admin/form/contact_person/data_contact_person', $data);
	}
	public function tambah()
	{
		
		$this->admin->load('admin/template','admin/form/contact_person/tambah_contact_person');
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
		$this->db->insert('contact_person', $data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data contact_person berhasil ditambahkan</div>');
		redirect('user/admin/contact_person');
	}

	public function edit($id)
	{
		
		$data['contact_person'] = $this->db->get_where('contact_person', array('id_contact_person' => $id))->row_array(); 
		$this->admin->load('admin/template','admin/form/contact_person/edit_contact_person', $data);
	}

	public function simpanedit()
	{
		$id = $this->input->post('id');
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
		$where = [
			'id_contact_person'=>$id
		];
		$this->db->update('contact_person', $data, $where);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data contact_person berhasil diperbaharui</div>');
		redirect('user/admin/contact_person');
	}
	public function hapus($id)
	{
		$this->db->delete('contact_person', array('id_contact_person' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data contact_person berhasil dihapus</div>');
		redirect('user/admin/contact_person');
	}
}
