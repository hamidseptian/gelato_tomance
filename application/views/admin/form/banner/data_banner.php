 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Data banner</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/banner/tambah') ?>" class="btn btn-info">Tambah banner</a>
          </div>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('pesan') ?>
          <table class="table table-striped table-bordered" id="tabel1">
            <thead>
              <tr>
                <td width="20px">No</td>
                <td>Gambar</td>
                <td width="90px">Option</td>
              </tr>
            </thead>
            <?php 
            $no=1;
            foreach ($banner as $d1) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><img src="<?php echo base_url('file/banner/gambar/'.$d1['gambar']) ?>" width="100px"></td>
              
                <td>
                  <a href="<?php echo base_url('user/admin/banner/edit/'.$d1['id_banner']) ?>" class="btn btn-info btn-xs" >Edit</a>
                  <a href="<?php echo base_url('user/admin/banner/hapus/'.$d1['id_banner'].'/'.$d1['gambar']) ?>" class="btn btn-info btn-xs" onclick="return confirm('Hapus banner.?')">Hapus</a>
                </td>
              </tr>
            <?php } ?>
            
          </table>
        </div>


      </div>
    </div>
  </div>


















