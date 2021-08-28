 <div class="row">
    <div class="col-md-8">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Bahan Baku</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/bahan_baku/tambah') ?>" class="btn btn-info">Tambah Bahan Baku</a>
          </div>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('pesan') ?>
          <table class="table table-striped table-bordered" id="tabel1">
            <thead>
              <tr>
                <td width="20px">No</td>
                <td>Gambar</td>
                <td>Bahan Baku</td>
                <td width="30px">Stok</td>
                <td width="150px">Option</td>
              </tr>
            </thead>
            <?php 
            $no=1;
            foreach ($bahan_baku as $d1) { 
              $stok_tersedia = $d1['stok_masuk'] - $d1['stok_keluar'];

              ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><img src="<?php echo base_url('file/bahan_baku/gambar/'.$d1['gambar']) ?>" width="100px"></td>
                <td><?php echo $d1['nama_bahan_baku'] ?></td>
                <td><?php echo $stok_tersedia ?></td>
                <td>
                  <a href="<?php echo base_url('user/admin/bahan_baku/tambah_stok/'.$d1['id_bahan_baku']) ?>" class="btn btn-info btn-xs" >Tambah Stok</a>
                  <a href="<?php echo base_url('user/admin/bahan_baku/edit/'.$d1['id_bahan_baku']) ?>" class="btn btn-info btn-xs" >Edit</a>
                  <a href="<?php echo base_url('user/admin/bahan_baku/hapus/'.$d1['id_bahan_baku'].'/'.$d1['gambar']) ?>" class="btn btn-info btn-xs" onclick="return confirm('Hapus bahan baku <?php echo $d1['nama_bahan_baku'] ?>.?')">Hapus</a>
                </td>
              </tr>
            <?php } ?>
            
          </table>
        </div>


      </div>
    </div>
  </div>


















