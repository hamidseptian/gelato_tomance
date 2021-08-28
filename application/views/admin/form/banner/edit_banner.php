 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit banner</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/banner') ?>" class="btn btn-info">Kembali</a>
          </div>
        </div>
        <div class="box-body">
          <form action="<?php echo base_url('user/admin/banner/simpanedit') ?>" method='post'  enctype="multipart/form-data">
           
              <input type="hidden" name="id" class="form-control" required value="<?php echo $banner['id_banner'] ?>">
          
            <div class="form-group">
              <label>Gambar</label> <br>
              <img src="<?php echo base_url('file/banner/gambar/'.$banner['gambar']) ?>" width="150px"> <br><br>
              <input type="file" name="berkas" >
            </div>
           
            <div class="form-group">
              <input type="submit" value="Simpan Data banner" class="btn btn-info">
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>
