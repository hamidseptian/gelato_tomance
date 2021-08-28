<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bahan_baku extends CI_Controller {

	public function index()
	{
		$data['bahan_baku']=$this->db->query("
			SELECT bb.*, 
			(SELECT sum(qty) from management_bahan_baku where id_bahan_baku=bb.id_bahan_baku and jenis='Masuk') as stok_masuk,
			(SELECT sum(qty) from management_bahan_baku where id_bahan_baku=bb.id_bahan_baku and jenis='Keluar') as stok_keluar
			
			 from bahan_baku bb
			")->result_array();
		$this->admin->load('admin/template','admin/form/bahan_baku/data_bahan_baku', $data);
	}
	public function tambah()
	{
		// $data['topping'] = $this->db->query("SELECT * from topping where id_topping not in (SELECT id_topping from bahan_baku where peruntukan='Topping')")->result_array();
		$data['topping'] = $this->db->get('topping')->result_array();
		$this->admin->load('admin/template','admin/form/bahan_baku/tambah_bahan_baku', $data);
	}
	

	 public function simpan(){
 		
	 	 $this->load->helper(array('form'));
	        $config['upload_path']          = './file/bahan_baku/gambar/';
	          $namaberkas         = $_FILES['berkas']['name'];
	         // $config['max_size']             = 20000;
	        $config['allowed_types']        = 'jpg|png|gif';
	       
	      $x = explode('.', $namaberkas );
	        $ekstensi = strtolower(end($x));
	        $namabaru=date('ymdhis.').$ekstensi;


	     
			$produk = $this->input->post('produk');
			$bahan_baku = $this->input->post('bahan_baku');
			$stok = $this->input->post('stok');
			$untuk = $this->input->post('untuk');
			$topping = $this->input->post('topping');
			$warna = $this->input->post('warna');

			$datainput = [
				'nama_bahan_baku'=>$bahan_baku,
				'peruntukan'=>$untuk,
				'id_topping'=>$topping,
				'keterangan'=>$warna,
				'gambar'=>$namabaru,
				
				];
		
	       // echo $namabaru;
	         $config['file_name']  = $namabaru;
	          $this->load->library('upload', $config);
	 
	        if ( ! $this->upload->do_upload('berkas')){
	            
	                 $pesan_error =  $this->upload->display_errors();
	                 $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                
	               Data bahan_baku gagal disimpan<br>Silahkan dicoba lagi memilih file dengan extensi file yang benar <br>'.$pesan_error.'
	              </div>');
	              
	              // redirect('admin/file/');
	        }else{
	                $data = array('upload_data' => $this->upload->data());
	                
	            //    $this->admin_query->simpan_file();
	               
	             $this->db->insert('bahan_baku',$datainput);
	             $last_insert_id = $this->db->insert_id(); 

	             	$datainputmanagementstok = [
						'id_bahan_baku'=>$last_insert_id,
						'nama_bahan_baku'=>$bahan_baku,
						'qty'=>$stok,
						'jenis'=>'Masuk',
						'tgl_transaksi '=>date('Y-m-d'),
						
					];
	             $this->db->insert('management_bahan_baku',$datainputmanagementstok);
	                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                
	               Data bahan_baku disimpan 
	              </div>');
	        }
	          redirect('user/admin/bahan_baku');
	}

	public function edit($id)
	{
		$data['topping'] = $this->db->get('topping')->result_array();
		$data['bahan_baku'] = $this->db->get_where('bahan_baku', array('id_bahan_baku' => $id))->row_array(); 
		$this->admin->load('admin/template','admin/form/bahan_baku/edit_bahan_baku', $data);
	}

	public function tambah_stok($id)
	{
		$data['bahan_baku'] = $this->db->get_where('bahan_baku', array('id_bahan_baku' => $id))->row_array(); 
		$this->admin->load('admin/template','admin/form/bahan_baku/tambah_stok', $data);
	}


	 public function simpanedit(){
 		
	 	 $this->load->helper(array('form'));
	        $config['upload_path']          = './file/bahan_baku/gambar/';
	          $namaberkas         = $_FILES['berkas']['name'];
	         // $config['max_size']             = 20000;
	        $config['allowed_types']        = 'jpg|png|gif';
	       
	      $x = explode('.', $namaberkas );
	        $ekstensi = strtolower(end($x));
	        $namabaru=date('ymdhis.').$ekstensi;


	     
			$id = $this->input->post('id');
			$filelama = $this->input->post('filelama');
			$bahan_baku = $this->input->post('bahan_baku');

			
			$where = [
				'id_bahan_baku'=>$id,
				
				];
	       // echo $namabaru;
	         $config['file_name']  = $namabaru;
	          $this->load->library('upload', $config);
	 

	 		if ($namaberkas=='') {
	 			$datainput = [
					'nama_bahan_baku'=>$bahan_baku,
					
				];
	 			 $this->db->update('bahan_baku',$datainput, $where);
	 		}else{
	 			  if ( ! $this->upload->do_upload('berkas')){
			            
			                 $pesan_error =  $this->upload->display_errors();
			                 $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                
			               Data bahan_baku gagal disimpan<br>Silahkan dicoba lagi memilih file dengan extensi file yang benar <br>'.$pesan_error.'
			              </div>');
			              
			              // redirect('admin/file/');
			        }else{
			                $data = array('upload_data' => $this->upload->data());
			             $datainput = [
							'nama_bahan_baku'=>$bahan_baku,
							'gambar'=>$namabaru,
						];   
							
						unlink('file/bahan_baku/gambar/'.$filelama);		

			            //    $this->admin_query->simpan_file();
			               
			                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                
			               Data bahan_baku diperbaharui
			              </div>');
			             $this->db->update('bahan_baku',$datainput, $where);
			        }
	 		}
			          redirect('user/admin/bahan_baku');
	      
	}


	public function simpan_stok()
	{
		$id = $this->input->post('id');
		$bahan_baku = $this->input->post('bahan_baku');
		$stok = $this->input->post('stok');
		$data = [
			'id_bahan_baku'=>$id,
			'nama_bahan_baku'=>$bahan_baku,
			'qty'=>$stok,
			'jenis'=>'Masuk',
			'tgl_transaksi '=>date('Y-m-d'),
			
		];
		$this->db->insert('management_bahan_baku', $data);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data stok bahan baku '.$bahan_baku.' berhasil ditambahkan</div>');
		redirect('user/admin/bahan_baku');
	}
	public function hapus($id, $file)
	{
		$this->db->delete('bahan_baku', array('id_bahan_baku' => $id)); 
		unlink('file/bahan_baku/gambar/'.$file);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data bahan_baku berhasil dihapus</div>');
		redirect('user/admin/bahan_baku');
	}
}
