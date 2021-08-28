 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Produk</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/produk') ?>" class="btn btn-info">Kembali</a>
          </div>
        </div>
        <div class="box-body">
          <form action="<?php echo base_url('user/admin/produk/simpanedit') ?>" method='post'>
            <div class="form-group">
              <label>Produk</label>
              <input type="hidden" name="id" class="form-control" value="<?php echo $produk['id_produk'] ?>">
              <input type="text" name="nama" class="form-control" value="<?php echo $produk['nama_produk'] ?>">
            </div>

            <div class="form-group">
              <label>Keterangan Produk</label>
              <textarea name="ket" class="form-control"><?php echo $produk['keterangan'] ?></textarea>
            </div>
            
            <div class="form-group">
              <input type="submit" value="Simpan Perubahan" class="btn btn-info">
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>






