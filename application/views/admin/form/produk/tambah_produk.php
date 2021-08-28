 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Produk</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/produk') ?>" class="btn btn-info">Kembali</a>
          </div>
        </div>
        <div class="box-body">
          <form action="<?php echo base_url('user/admin/produk/simpan') ?>" method='post'>
            <div class="form-group">
              <label>Produk</label>
              <input type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
              <label>Keterangan Produk</label>
              <textarea name="ket" class="form-control"></textarea>
            </div>
            
            <div class="form-group">
              <input type="submit" value="Simpan Data produk" class="btn btn-info">
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>
