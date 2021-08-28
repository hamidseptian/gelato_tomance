 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Contact Person</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/contact_person/tambah') ?>" class="btn btn-info">Tambah Contact Person</a>
          </div>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('pesan') ?>
          <table class="table table-striped table-bordered" id="tabel1">
            <thead>
              <tr>
                <td width="20px">No</td>
                <td> Nama</td>
                <td>ALamat</td>
                <td>Email</td>
                <td>No HP</td>
                <td width="90px">Option</td>
              </tr>
            </thead>
            <?php 
            $no=1;
            foreach ($contact_person as $d1) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $d1['nama'] ?></td>
                <td><?php echo $d1['alamat'] ?></td>
                <td><?php echo $d1['email'] ?></td>
                <td><?php echo $d1['nohp'] ?></td>
                <td>
                  <a href="<?php echo base_url('user/admin/contact_person/edit/'.$d1['id_contact_person']) ?>" class="btn btn-info btn-xs" >Edit</a>
                  <a href="<?php echo base_url('user/admin/contact_person/hapus/'.$d1['id_contact_person']) ?>" class="btn btn-info btn-xs" onclick="return confirm('Hapus contact_person <?php echo $d1['nama'] ?>.?')">Hapus</a>
                </td>
              </tr>
            <?php } ?>
            
          </table>
        </div>


      </div>
    </div>
  </div>


















