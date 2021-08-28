 <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Cara Pesan</h3>
          <div class="pull-right">
            <a href="<?php echo base_url('user/admin/cara_pesan/edit/1') ?>" class="btn btn-info">Edit</a>
          </div>
        </div>
        <div class="box-body">
          <?php echo $this->session->flashdata('pesan') ?>
          <?php echo $cara_pesan['cara_pesan'] ?>
        </div>


      </div>
    </div>
  </div>


















