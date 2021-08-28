 <?php 
// error_reporting(0);

$level = $this->session->userdata('level');

$id_admin = $this->session->userdata('id_user');
  $q_admin= $this->db->query("SELECT * from admin where id_admin = '$id_admin'")->row_array() ;
$jabatan = $q_admin['jabatan'];

       ?>
       <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator Page - Gelato Romance</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/adminlte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/adminlte/dist/css/skins/_all-skins.min.css">

  <script type="text/javascript" src="<?php echo base_url() ?>/adminlte/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>/ckeditor/ckeditor.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>/adminlte/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url() ?>/file/gambar/user.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php $namauser = $q_admin['nama_admin']; 
                    echo $namauser;
                ?>
                  
                </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>/file/gambar/user.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php 
                      $namauser = $q_admin['nama_admin']; 
                     $level = $q_admin['level']; 
                    echo $namauser.' - '.$jabatan;
                 
                ?>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?php echo base_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>/file/gambar/user.jpg" class="img" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
          <?php 
                    echo $namauser;
                 
                ?>
                  
            </p>
          <a href="#">
              <?php 
              echo $jabatan;
                  
                ?>
                  
          </a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Master Data</li>
     
        <li><a href="<?php echo base_url('user/admin/produk/') ?>"><i class="fa fa-book"></i><span style="color:aqua">Data Produk</span></a></li>
        <li><a href="<?php echo base_url('user/admin/ukuran/') ?>"><i class="fa fa-book"></i><span style="color:aqua">Data Ukuran Produk</span></a></li>
        <li><a href="<?php echo base_url('user/admin/topping/') ?>"><i class="fa fa-book"></i><span  style="color:aqua">Data Topping</span></a></li>
        <!-- <li><a href="<?php echo base_url('user/admin/bahan_baku/') ?>"><i class="fa fa-book"></i><span style="color:aqua">Data Bahan Baku</span></a></li> -->
        <!-- <li><a href="<?php echo base_url('user/admin/kategori/') ?>"><i class="fa fa-book"></i><span>Data Manajemen (Seperti waktu pembuatan dll)(Optional)</span></a></li> -->
        <!-- <li><a href="<?php echo base_url('user/admin/karyawan/') ?>"><i class="fa fa-book"></i><span style="color:aqua">Data Karyawan (yang membuat nya)</span></a></li> -->
        <li><a href="<?php echo base_url('user/admin/banner/') ?>"><i class="fa fa-book"></i><span  style="color:aqua">Banner</span></a></li>
        <li><a href="<?php echo base_url('user/admin/rekening/') ?>"><i class="fa fa-book"></i><span style="color:aqua">Data Rekening</span></a></li>
        <li><a href="<?php echo base_url('user/admin/cara_pesan/') ?>"><i class="fa fa-book"></i><span  style="color:aqua">Cara Pesan</span></a></li>
        <li><a href="<?php echo base_url('user/admin/contact_person/') ?>"><i class="fa fa-book"></i><span style="color:aqua">Contact Person</span></a></li>
        <li class="header">Order</li>
        <li><a href="<?php echo base_url('user/admin/pesanan/baru/') ?>"><i class="fa fa-book"></i><span >Data Pesanan Baru</span></a></li>
        <!-- <li><a href="<?php echo base_url('user/admin/kategori/') ?>"><i class="fa fa-book"></i><span>Data Pesanan Dalam Pengerjaan</span></a></li> -->
        <li><a href="<?php echo base_url('user/admin/kategori/') ?>"><i class="fa fa-book"></i><span>Data Pesanan Selesai</span></a></li>
        <li><a href="<?php echo base_url('user/admin/kategori/') ?>"><i class="fa fa-book"></i><span>Laporan</span></a></li>
        <li class="header">Order</li>
        <li><a href="<?php echo base_url('user/admin/pelanggan/') ?>"><i class="fa fa-book"></i><span  style="color:aqua">Pelanggan</span></a></li>
        <li><a href="<?php echo base_url('user/admin/user/') ?>"><i class="fa fa-book"></i><span  style="color:aqua">Admin</span></a></li>
 
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
             <?php echo $konten ?>
 
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>/adminlte/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#tabel1').DataTable()
    $('#tabel2').DataTable()
    $('#tabel3').DataTable()
     $('#tabelscroll1').DataTable( {
    "scrollX": true
    } );
     $('#tabelscroll2').DataTable( {
    "scrollX": true
    } );
    $('#tabel4').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript">

    function getkey(e)
            {
            if (window.event)
               return window.event.keyCode;
            else if (e)
               return e.which;
            else
               return null;
            }
            
        function goodchars(e, goods, field)
            {
                var key, keychar;
                key = getkey(e);
                if (key == null) return true;
                 
                keychar = String.fromCharCode(key);
                keychar = keychar.toLowerCase();
                goods = goods.toLowerCase();
                 
                // check goodkeys
                if (goods.indexOf(keychar) != -1)
                    return true;
                // control keys
                if ( key==null || key==0 || key==8 || key==9 || key==27 )
                   return true;
                    
                if (key == 13) {
                    var i;
                    for (i = 0; i < field.form.elements.length; i++)
                        if (field == field.form.elements[i])
                            break;
                    i = (i + 1) % field.form.elements.length;
                    field.form.elements[i].focus();
                    return false;
                    };
                // else return false
                return false;
            }
</script>
</body>
</html>
