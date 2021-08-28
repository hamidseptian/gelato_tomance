<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	public function index()
	{
		$data['banner']=$this->db->query("SELECT * from banner")->result_array();
		$this->admin->load('admin/template','admin/form/banner/data_banner', $data);
	}
	public function tambah()
	{
		
		$data['produk']=$this->db->query("SELECT * from produk")->result_array();
		$this->admin->load('admin/template','admin/form/banner/tambah_banner', $data);
	}
	

	 public function simpan(){
 		
	 	 $this->load->helper(array('form'));
	        $config['upload_path']          = './file/banner/gambar/';
	          $namaberkas         = $_FILES['berkas']['name'];
	         // $config['max_size']             = 20000;
	        $config['allowed_types']        = 'jpg|png|gif';
	       
	      $x = explode('.', $namaberkas );
	        $ekstensi = strtolower(end($x));
	        $namabaru=date('ymdhis.').$ekstensi;


	     
			$produk = $this->input->post('produk');
			$banner = $this->input->post('banner');
			$biaya = $this->input->post('biaya');

			$datainput = [
				'gambar'=>$namabaru,
				
				];
	       // echo $namabaru;
	         $config['file_name']  = $namabaru;
	          $this->load->library('upload', $config);
	 
	        if ( ! $this->upload->do_upload('berkas')){
	            
	                 $pesan_error =  $this->upload->display_errors();
	                 $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                
	               Data banner gagal disimpan<br>Silahkan dicoba lagi memilih file dengan extensi file yang benar <br>'.$pesan_error.'
	              </div>');
	              
	              // redirect('admin/file/');
	        }else{
	                $data = array('upload_data' => $this->upload->data());
	                
	            //    $this->admin_query->simpan_file();
	               
	                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                
	               Data banner disimpan
	              </div>');
	             $this->db->insert('banner',$datainput);
	        }
	          redirect('user/admin/banner');
	}

	public function edit($id)
	{
		$data['produk']=$this->db->query("SELECT * from produk")->result_array();
		$data['banner'] = $this->db->get_where('banner', array('id_banner' => $id))->row_array(); 
		$this->admin->load('admin/template','admin/form/banner/edit_banner', $data);
	}


	 public function simpanedit(){
 		
	 	 $this->load->helper(array('form'));
	        $config['upload_path']          = './file/banner/gambar/';
	          $namaberkas         = $_FILES['berkas']['name'];
	         // $config['max_size']             = 20000;
	        $config['allowed_types']        = 'jpg|png|gif';
	       
	      $x = explode('.', $namaberkas );
	        $ekstensi = strtolower(end($x));
	        $namabaru=date('ymdhis.').$ekstensi;


	     
			$produk = $this->input->post('produk');
			$banner = $this->input->post('banner');
			$biaya = $this->input->post('biaya');
			$id = $this->input->post('id');
			$filelama = $this->input->post('filelama');

			
			$where = [
				'id_banner'=>$id,
				
				];
	       // echo $namabaru;
	         $config['file_name']  = $namabaru;
	          $this->load->library('upload', $config);
	 

	 		if ($namaberkas=='') {
	 			$datainput = [
					'id_produk'=>$produk,
					'banner'=>$banner,
					'biaya'=>$biaya,
					
				];
	 			 $this->db->update('banner',$datainput, $where);
	 		}else{
	 			  if ( ! $this->upload->do_upload('berkas')){
			            
			                 $pesan_error =  $this->upload->display_errors();
			                 $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                
			               Data banner gagal disimpan<br>Silahkan dicoba lagi memilih file dengan extensi file yang benar <br>'.$pesan_error.'
			              </div>');
			              
			              // redirect('admin/file/');
			        }else{
			                $data = array('upload_data' => $this->upload->data());
			             $datainput = [
						
							'gambar'=>$namabaru,
						];   
							
						unlink('file/banner/gambar/'.$filelama);		

			            //    $this->admin_query->simpan_file();
			               
			                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                
			               Data banner diperbaharui
			              </div>');
			             $this->db->update('banner',$datainput, $where);
			        }
	 		}
			          redirect('user/admin/banner');
	      
	}
	public function hapus($id, $file)
	{
		$this->db->delete('banner', array('id_banner' => $id)); 
		unlink('file/banner/gambar/'.$file);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data banner berhasil dihapus</div>');
		redirect('user/admin/banner');
	}
}
