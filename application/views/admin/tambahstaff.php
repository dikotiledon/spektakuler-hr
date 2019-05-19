<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    HR Sisfo
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" />  
  <link href="<?php echo base_url('assets/css/paper-dashboard.css?v=2.0.0') ?>" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="red" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <!-- <img src="../assets/img/logo-small.png"> -->
          </div>
        </a>
        <a href="<?php echo base_url('indexadmin') ?>" class="simple-text logo-normal">
          HR Sisfo
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="<?php echo base_url('indexadmin') ?>">
              <i></i>
              <p>Daftar Dosen</p>
            </a>
          </li>
          <li >
            <a href="<?php echo base_url('indexadmin/tambahdosen') ?>">
              <i></i>
              <p>Tambah Dosen</p>
            </a>
          </li>            
          <li>
          <li>
            <a href="<?php echo base_url('indexadmin/staff') ?>">
              <i></i>
              <p>Daftar Staff</p>
            </a>
          </li>
          <li class="active">
            <a href="<?php echo base_url('indexadmin/tambahstaff') ?>">
              <i></i>
              <p>Tambah Staff</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('indexadmin/absensi') ?>">
              <i></i>
              <p>Absensi</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('indexadmin/cuti') ?>">
              <i></i>
              <p>Cuti</p>
            </a>
          </li>                                                     
          <li>            
            <a href="<?php echo base_url('cakun/logout') ?>">
              <i></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">
  
  
</div> -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Tambah Staff</h4>
              </div>
              <div class="card-body">
                <?php echo form_open('indexadmin/processtambahstaff'); ?>
                <form>                 
                      <div class="form-group">
                        <label for="exampleFormControlInput1">NIP Staff</label>
                        <input type="number" name="nip_staff" class="form-control" id="exampleFormControlInput1" placeholder="NIP Staff" maxlength="8" min="98711600" max="98711999" onKeyPress="if(this.value.length==8) return false;">
                      </div>                    
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Staff</label>
                        <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap" maxlength="30">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Jenis Staff</label>
                        <input type="text" name="jenis_staff" class="form-control" id="exampleFormControlInput1" placeholder="Jenis Staff" maxlength="10">
                      </div>         
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" placeholder="Alamat" maxlength="100">
                      </div>         
                      <div class="form-group">
                        <label for="exampleFormControlInput1">TTL (ie: Bandung, 1 Mei 1990)</label>
                        <input type="text" name="ttl" class="form-control" id="exampleFormControlInput1" placeholder="TTL">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">No. HP</label>
                        <input style="text-transform: capitalize;" type="number" name="nohp" class="form-control" id="exampleFormControlInput1" placeholder="No. HP" maxlength="11" onKeyPress="if(this.value.length==8) return false;">
                      </div> 
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Gaji</label>
                        <input type="number" name="gaji" class="form-control" id="exampleFormControlInput1" placeholder="Gaji" maxlength="8" onKeyPress="if(this.value.length==8) return false;">
                      </div>                                              
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Fakultas</label>
                        <select name="fakultas" class="form-control" id="exampleFormControlSelect1">
                          <?php if ($json->success): ?>
                            <?php if (count($json->data) > 0): ?>
                              <?php foreach($json->data as $fakultas): ?>
                                <option value="<?php echo $fakultas->id_fakultas; ?>"><?php echo $fakultas->id_fakultas; ?></option>
                              <?php endforeach; ?>
                            <?php else: ?>
                              Tidak ada data!
                            <?php endif; ?>
                          <?php endif; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="submit" name="submit" class="form-control" id="exampleFormControlInput1" value="Submit">
                      </div>                       
                    </form>
                    <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, Copyrights by HR Sisfo
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assets/js/core/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/core/popper.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js') ?>"></script>
  <!--  Google Maps Plugin    -->
  <!-- Chart JS -->
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js') ?>"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('assets/js/paper-dashboard.min.js?v=2.0.0') ?>" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>

</html>