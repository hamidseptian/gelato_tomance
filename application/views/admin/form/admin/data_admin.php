 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data admin</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/user/tambah') ?>" class="btn btn-info">Tambah admin</a>
          </div>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('pesan') ?>
          <table class="table table-striped table-bordered" id="tabel1">
            <thead>
              <tr>
                <td width="20px">No</td>
                <td>Nama</td>
                <td>Jabatan</td>
                <td>Username</td>
                <td>Password</td>
                <td width="90px">Option</td>
              </tr>
            </thead>
            <?php 
            $no=1;
            $id_aktif = $this->session->userdata('id_user');
            foreach ($admin as $d1) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $d1['nama_admin'] ?></td>
                <td><?php echo $d1['jabatan'] ?></td>
                <td><?php echo $d1['username'] ?></td>
                <td><?php echo $d1['password'] ?></td>
                <td>
                  <?php   if ($d1['id_admin']==$id_aktif) {
                    echo "Sedang Aktif";
                  }else{ ?>
                  <a href="<?php echo base_url('user/admin/user/edit/'.$d1['id_admin']) ?>" class="btn btn-info btn-xs" >Edit</a>
                  <a href="<?php echo base_url('user/admin/user/hapus/'.$d1['id_admin']) ?>" class="btn btn-info btn-xs" onclick="return confirm('Hapus admin <?php echo $d1['nama_admin'] ?>.?')">Hapus</a>
                <?php   } ?>
                </td>
              </tr>
            <?php } ?>
            
          </table>
        </div>


      </div>
    </div>
  </div>


















