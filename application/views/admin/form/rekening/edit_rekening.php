 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit rekening</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/rekening') ?>" class="btn btn-info">Kembali</a>
          </div>
        </div>
        <div class="box-body">
          <form action="<?php echo base_url('user/admin/rekening/simpanedit') ?>" method='post'>
            <div class="form-group">
              <label>rekening</label>
              <input type="hidden" name="id" class="form-control" value="<?php echo $rekening['id_rekening'] ?>">
            </div>
           <div class="form-group">
              <label>Kode Bank</label>
              <input type="number" name="kode" class="form-control" required value="<?php echo $rekening['kode_bank'] ?>">
            </div>
            <div class="form-group">
              <label>Nama Bank</label>
              <input type="text" name="bank" class="form-control" required value="<?php echo $rekening['nama_bank'] ?>">
            </div>
            <div class="form-group">
              <label>No rekening</label>
              <input type="text" name="norek" class="form-control" required value="<?php echo $rekening['no_rekening'] ?>">
            </div>
            <div class="form-group">
              <label>Nama rekening</label>
              <input type="text" name="narek" class="form-control" required value="<?php echo $rekening['nama_rekening'] ?>">
            </div>
            
            <div class="form-group">
              <input type="submit" value="Simpan Perubahan" class="btn btn-info">
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>






