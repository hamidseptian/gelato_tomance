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
          <form action="<?php echo base_url('user/admin/bahan_baku/simpan') ?>" method='post'  enctype="multipart/form-data">
            
            <div class="form-group">
              <label>Bahan Baku</label>
              <input type="text" name="bahan_baku" class="form-control" required>
            </div>
           
            <div class="form-group">
              <label>Peruntukan</label>
              <select class="form-control" name="untuk" id="untuk">
              	<option value="Hand Baquet">Hand Baquet</option>
              	<option value="Topping">Topping</option>
              </select>
            </div>
           
            <div class="form-group" id="f_topping" hidden="true">
              <label>Topping</label>
              <select class="form-control" name="topping" id="topping" >
	              	<option value=""></option>
              	
              </select>
            </div>
            <div class="form-group" id="f_warna">
              <label>Warna</label>
              <input class="form-control" name="warna" id="warna">
              	
            </div>
           
            <script type="text/javascript">
            	$('#untuk').change(function(){
            		var peruntukan = $('#untuk').val();
            		var warna = $('#warna').val();
            		$('#topping').val('');
            		console.log(peruntukan);
            		if (peruntukan=='Topping') {
            			$('#f_topping').show();
            			$('#f_warna').hide();
            			$('#warna').val('');
            			$('#topping').html(`
            				<?php foreach($topping as $d){ ?>
	              	<option value="<?php echo $d['id_topping'] ?>"><?php echo $d['nama_topping'] ?></option>
	              <?php } ?>
            			`);
            		}else{
            			$('#f_topping').hide();
            			$('#f_warna').show();
            			$('#topping').html('<option value=""></option>');

            		}
            	});
            </script>

            <div class="form-group">
              <label>Stok Awal</label>
              <input type="number" name="stok" class="form-control" required>
            </div>
           
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" name="berkas"  required>
            </div>
           
            <div class="form-group">
              <input type="submit" value="Simpan Data bahan baku" class="btn btn-info">
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>
