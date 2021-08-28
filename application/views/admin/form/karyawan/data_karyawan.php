 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Karyawan</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/karyawan/tambah') ?>" class="btn btn-info">Tambah Karyawan</a>
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
                <td width="90px">Option</td>
              </tr>
            </thead>
            <?php 
            $no=1;
            foreach ($karyawan as $d1) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $d1['nama_karyawan'] ?></td>
                <td><?php echo $d1['alamat_karyawan'] ?></td>
                <td><?php echo $d1['nohp_karyawan'] ?></td>
                <td>
                  <a href="<?php echo base_url('user/admin/karyawan/edit/'.$d1['id_karyawan']) ?>" class="btn btn-info btn-xs" >Edit</a>
                  <a href="<?php echo base_url('user/admin/karyawan/hapus/'.$d1['id_karyawan']) ?>" class="btn btn-info btn-xs" onclick="return confirm('Hapus karyawan <?php echo $d1['nama_karyawan'] ?>.?')">Hapus</a>
                </td>
              </tr>
            <?php } ?>
            
          </table>
        </div>


      </div>
    </div>
  </div>


















