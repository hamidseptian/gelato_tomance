 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Bahan Baku</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/bahan_baku') ?>" class="btn btn-info">Kembali</a>
          </div>
        </div>
        <div class="box-body">
          <form action="<?php echo base_url('user/admin/bahan_baku/simpan_stok') ?>" method='post'  enctype="multipart/form-data">
            
            <div class="form-group">
              <label>Bahan Baku</label>
              <input type="hidden" name="id" class="form-control" required value="<?php echo $bahan_baku['id_bahan_baku'] ?>">
              <input type="text" name="bahan_baku" class="form-control" required value="<?php echo $bahan_baku['nama_bahan_baku'] ?>" readonly>
            </div>
           
        
           
            <div class="form-group">
              <label>Gambar</label><br>
                <img src="<?php echo base_url('file/bahan_baku/gambar/'.$bahan_baku['gambar']) ?>" width="150px"> <br><br>
              <input type="file" name="berkas" >
            </div>


            <div class="form-group">
              <label>Stok Ditambahkan</label>
              <input type="number" name="stok" class="form-control" required>
            </div>
           
           
            <div class="form-group">
              <input type="submit" value="Simpan Stok bahan baku" class="btn btn-info">
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>
