 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah banner</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/banner') ?>" class="btn btn-info">Kembali</a>
          </div>
        </div>
        <div class="box-body">
          <form action="<?php echo base_url('user/admin/banner/simpan') ?>" method='post'  enctype="multipart/form-data">
           
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" name="berkas"  required>
            </div>
           
            <div class="form-group">
              <input type="submit" value="Simpan banner" class="btn btn-info">
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>
