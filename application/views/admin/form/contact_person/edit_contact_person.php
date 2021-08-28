 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit contact person</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/contact_person') ?>" class="btn btn-info">Kembali</a>
          </div>
        </div>
        <div class="box-body">
          <form action="<?php echo base_url('user/admin/contact_person/simpanedit') ?>" method='post'>
              <input type="hidden" name="id" class="form-control" value="<?php echo $contact_person['id_contact_person'] ?>">
              <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" required value="<?php echo $contact_person['nama'] ?>">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" required value="<?php echo $contact_person['alamat'] ?>">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" required value="<?php echo $contact_person['email'] ?>">
            </div>
            <div class="form-group">
              <label>No HP</label>
              <input type="text" name="nohp" class="form-control" required value="<?php echo $contact_person['nohp'] ?>">
            </div>
            
            
            <div class="form-group">
              <input type="submit" value="Simpan Perubahan" class="btn btn-info">
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>






