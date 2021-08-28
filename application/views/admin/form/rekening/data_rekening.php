 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data rekening</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/rekening/tambah') ?>" class="btn btn-info">Tambah rekening</a>
          </div>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('pesan') ?>
          <table class="table table-striped table-bordered" id="tabel1">
            <thead>
              <tr>
                <td width="20px">No</td>
                <td>Kode Bank</td>
                <td>Nama Bank</td>
                <td>No Rekening</td>
                <td>Nama rekening</td>
                <td width="90px">Option</td>
              </tr>
            </thead>
            <?php 
            $no=1;
            foreach ($rekening as $d1) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $d1['kode_bank'] ?></td>
                <td><?php echo $d1['nama_bank'] ?></td>
                <td><?php echo $d1['no_rekening'] ?></td>
                <td><?php echo $d1['nama_rekening'] ?></td>
                <td>
                  <a href="<?php echo base_url('user/admin/rekening/edit/'.$d1['id_rekening']) ?>" class="btn btn-info btn-xs" >Edit</a>
                  <a href="<?php echo base_url('user/admin/rekening/hapus/'.$d1['id_rekening']) ?>" class="btn btn-info btn-xs" onclick="return confirm('Hapus rekening <?php echo $d1['nama_rekening'] ?>.?')">Hapus</a>
                </td>
              </tr>
            <?php } ?>
            
          </table>
        </div>


      </div>
    </div>
  </div>


















