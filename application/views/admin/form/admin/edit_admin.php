 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit admin</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/user') ?>" class="btn btn-info">Kembali</a>
          </div>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('pesan'); ?>
          <form action="<?php echo base_url('user/admin/user/simpanedit') ?>" method='post'>
            <div class="form-group">
              <label>Nama</label>
              <input type="hidden" name="id" class="form-control" required value="<?php echo $admin['id_admin'] ?>">
              <input type="text" name="nama" class="form-control" required value="<?php echo $admin['nama_admin'] ?>">
            </div>
           
            <div class="form-group">
              <label>Jabatan</label>
              <input type="text" name="jabatan" class="form-control" required value="<?php echo $admin['jabatan'] ?>">
            </div>
           
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control" required value="<?php echo $admin['username'] ?>">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" required value="<?php echo $admin['password'] ?>">
            </div>
           
            <div class="form-group">
              <input type="submit" value="Simpan Data admin" class="btn btn-info">
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>
