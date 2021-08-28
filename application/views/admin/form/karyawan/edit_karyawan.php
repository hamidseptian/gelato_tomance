 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Karyawan</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/karyawan') ?>" class="btn btn-info">Kembali</a>
          </div>
        </div>
        <div class="box-body">
          <form action="<?php echo base_url('user/admin/karyawan/simpanedit') ?>" method='post'>
            <div class="form-group">
              <label>Karyawan</label>
              <input type="hidden" name="id" class="form-control" value="<?php echo $karyawan['id_karyawan'] ?>">
              <input type="text" name="nama" class="form-control" value="<?php echo $karyawan['nama_karyawan'] ?>">
            </div>
                <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" required value="<?php echo $karyawan['alamat_karyawan'] ?>">
            </div>
           
            <div class="form-group">
              <label>No HP</label>
              <input type="text" name="nohp" class="form-control" required value="<?php echo $karyawan['nohp_karyawan'] ?>">
            </div>
            
            <div class="form-group">
              <input type="submit" value="Simpan Perubahan" class="btn btn-info">
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>






