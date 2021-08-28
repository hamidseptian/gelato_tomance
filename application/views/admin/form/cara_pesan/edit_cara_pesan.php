 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Cara pesan</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/cara_pesan') ?>" class="btn btn-info">Kembali</a>
          </div>
        </div>
        <div class="box-body">
          <form action="<?php echo base_url('user/admin/cara_pesan/simpanedit') ?>" method='post'>
              <input type="hidden" name="id" class="form-control" value="<?php echo $cara_pesan['id'] ?>">
                  <div class="form-group">
                    <label>Isi Berita</label><br>
                    <textarea class="ckeditor" id="ckedtor" name="isi" rows="10" required><?php echo $cara_pesan['cara_pesan'] ?></textarea>
                     </div>
            
            <div class="form-group">
              <input type="submit" value="Simpan Perubahan" class="btn btn-info">
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>






