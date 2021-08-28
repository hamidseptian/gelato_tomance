<div class="tab-content">
	

	<div class="tab-pane  active" id="blockView">
		<h4>Produk
		<?php echo $caption_cari ?> </h4>
		<ul class="thumbnails">
			<?php 	
			$id_pelanggan = $this->session->userdata('id_user');
			
			foreach ($produk as  $d) {
				if ($d['gambar']=='') {
					$gambar=base_url().'file/produk/default.png';
					# code...
				}else{
					$gambar=base_url().'file/produk/gambar/'.$d['gambar'];;
				}
				$id_ukuran=$d['id_ukuran'];

				$q_pesanan = $this->db->query("SELECT * from pesanan where id_ukuran='$id_ukuran' and id_pelanggan='$id_pelanggan' and status_pesanan='Masuk Ke Keranjang'");
				$j_pesanan = $q_pesanan->num_rows();
				$d_pesanan = $q_pesanan->row_array();
				// if ($j_pesanan>0) {
				// 	$id_pesanan = $d_pesanan['id_pesanan'];
				// 	$link = base_url().'user/pelanggan/keranjang/edit/'.$d['id_ukuran'].'/'.$id_pesanan ;
				// }else{
					$link = base_url().'homepage/detail_produk/'.$d['id_ukuran'] ;
				// }
			 ?>
			<li class="span3">
			  <div class="thumbnail" >
				<a href="product_details.html"><img src="<?php echo $gambar ?>" style="height: 100px; margin-top:10px"></a>
				<div class="caption">
				  <h5><?php echo $d['nama_produk'] ?></h5>
				  <p><?php echo $d['ukuran'] ?></p>
				 
				  <h4 style="text-align:center"><a class="btn" href="<?php echo $link ?>" title="Lihat detail Produk" data-toggle="tooltip"> <i class="icon-zoom-in"></i></a> <a class="btn btn-primary" href="#" >Rp. <?php echo number_format($d['biaya']) ?></a></h4>
				</div>
			  </div>
			</li>
		<?php 	} ?>
			
		  </ul>


	<hr class="soft">
	</div>
</div>