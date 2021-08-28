 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data pelanggan</h3>
          <div class="pull-right">
            <!-- <a href="<?php echo base_url('user/admin/pelanggan/tambah') ?>" class="btn btn-info">Tambah pelanggan</a> -->
          </div>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('pesan') ?>
          <table class="table table-striped table-bordered" id="tabel1">
            <thead>
              <tr>
                <td width="20px">No</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>No HP</td>
              </tr>
            </thead>
            <?php 
            $no=1;
            foreach ($pelanggan as $d1) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $d1['nama_pelanggan'] ?></td>
                <td><?php echo $d1['alamat_pelanggan'] ?></td>
                <td><?php echo $d1['nohp_pelanggan'] ?></td>
           
              </tr>
            <?php } ?>
            
          </table>
        </div>


      </div>
    </div>
  </div>


















