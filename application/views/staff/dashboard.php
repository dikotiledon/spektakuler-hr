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

  <link href="<?php echo base_url('assets/css/paper-dashboard.css?v=2.0.0') ?>" rel="stylesheet" />
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <link href='<?php echo base_url('assets/js/core/jquery-ui.min.css');?>' rel='stylesheet' type='text/css'>
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>  
<script type='text/javascript'>
        $(document).ready(function(){
            // Number
            $('#datepicker2').datepicker({
            dateFormat: "yy-mm-dd",
            minDate: 0,
            maxDate: 3,
            });
            $('#datepicker3').datepicker({
            dateFormat: "yy-mm-dd",
            minDate: 0,
            maxDate: 90,
            });
            $('#datepicker4').datepicker({
            dateFormat: "yy-mm-dd",
            minDate: 0,
            maxDate: 3,
            });
            $('#datepicker5').datepicker({
            dateFormat: "yy-mm-dd",
            minDate: 0,
            maxDate: 7,
            });                                    
        });
 </script>

 <style type="text/css">
   #idizin, #idhamil { display: none; }
 </style>
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
          <li class="active ">
            <a href="<?php echo base_url('indexdosen') ?>">
              <i></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('indexstaff/fetchCuti') ?>">
              <i></i>
              <p>Status Pengajuan Cuti</p>
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
  <div class="emp-profile">
     <div class="card">
                <div class="row">
                    <div class="col-md-6">
                    <div class="card-header">
                       <h4 class="card-title"><?php echo $this->session->userdata('nama'); ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="profile-head">
                                    <h6>
                                       Staff Fakultas <?php echo $this->session->userdata('id_fakultas'); ?>
                                    </h6>
              
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Absensi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#cuti" role="tab" aria-controls="cuti" aria-selected="false">Pengajuan Cuti</a>
                                </li>                                
                            </ul>
                        </div>
                    </div>
                </div>
              </div>
                <div class="row">
                    <div class="card-body">
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>NIP</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $this->session->userdata('nip'); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $this->session->userdata('nama'); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>TTL</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><p><?php echo $this->session->userdata('ttl'); ?></p>
                                            </div>
                                        </div>                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Alamat</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><p><?php echo $this->session->userdata('alamat'); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>No. HP</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><p><?php echo $this->session->userdata('nohp'); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Fakultas</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><p><?php echo $this->session->userdata('id_fakultas'); ?></p>
                                            </div>
                                        </div>
                            </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                              <?php echo form_open('indexstaff/absensi'); ?>
                                              <input type="hidden" name="nip" value="<?php echo $this->session->userdata('nip') ?>">
                                              <input type="hidden" name="id_fakultas" value="<?php echo $this->session->userdata('id_fakultas') ?>">
                                              <input style="display: block;" class="btn btn-lg" type="submit" name="absen" value="Absen">
                                              <?php echo form_close(); ?>
                                            </div>
                                        </div>
                                </div>
                                <div class="tab-pane fade" id="cuti" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                  <?php echo form_open('indexstaff/cuti'); ?>
                                                  <form>                 
                                                        <div class="form-group">
                                                          <label for="exampleFormControlInput1">NIP Staff</label>
                                                          <input type="number" name="nip" class="form-control" id="exampleFormControlInput1" placeholder="NIP Dosen" value="<?php echo $this->session->userdata('nip'); ?>" readonly>
                                                        </div>                    
                                                        <div class="form-group">
                                                          <label for="exampleFormControlInput1">Nama Staff</label>
                                                          <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap" value="<?php echo $this->session->userdata('nama'); ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="exampleFormControlInput1">Jenis Staff</label>
                                                          <input type="text" name="jenis_staf" class="form-control" id="exampleFormControlInput1" placeholder="Jenis Staff" value="<?php echo $this->session->userdata('jenis_staff'); ?>" readonly>
                                                        </div>                                                      
                                                        <div class="form-group">
                                                          <label for="exampleFormControlSelect1">Fakultas</label>
                                                          <input type="text" name="id_fakultas" class="form-control" id="exampleFormControlInput1" placeholder="Fakultas" value="<?php echo $this->session->userdata('id_fakultas'); ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="exampleFormControlSelect1">Jenis Cuti</label>
                                                          <select name="jeniscuti" class="form-control" id="cutiselector">
                                                            <option value="hamil">Hamil</option>
                                                            <option value="izin">Izin</option>
                                                            <option value="sakit">Sakit</option>
                                                            <option value="hariraya">Hari Raya</option>
                                                          </select>
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="exampleFormControlSelect1">Tanggal</label>
                                                        </br>
                                                          <div id="idhamil" style="display:none;">
                                                            <input type="text" id="datepicker3" onfocus="this.value=''" name="rentangtanggal1">
                                                          </div>
                                                          <div id="idizin" style="display:none;">
                                                            <input type="text" id="datepicker2" onfocus="this.value=''" name="rentangtanggal2">
                                                          </div>
                                                          <div id="idsakit" style="display:none;">
                                                            <input type="text" id="datepicker4" onfocus="this.value=''" name="rentangtanggal3">
                                                          </div> 
                                                          <div id="idhariraya" style="display:none;">
                                                            <input type="text" id="datepicker5" onfocus="this.value=''" name="rentangtanggal4">
                                                          </div>                            
                                                        </div>                                      
                                                        <div class="form-group">
                                                          <label for="exampleFormControlSelect1">Keterangan</label>
                                                           <textarea class="md-textarea form-control" name="keterangan"></textarea>
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
                    </div>
                  </div>
                </div>        
        </div>
      </div>
</div>
<!--       <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Absen</h4>
              </div>
              <div class="card-body">
                <div>
                  <?php echo form_open('indexdosen/absensi'); ?>
                  <input type="hidden" name="nip" value="<?php echo $this->session->userdata('nip') ?>">
                  <input type="hidden" name="id_fakultas" value="<?php echo $this->session->userdata('id_fakultas') ?>">
                  <input style="display: block;" class="btn btn-lg" type="submit" name="absen" value="Absen">
                  <?php echo form_close(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
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
 <script type="text/javascript">
   $('#cutiselector').on('change', function() {
  //  alert( this.value ); // or $(this).val()
  if(this.value == "izin") {
    $('#idizin').show();
    $('#idhamil').hide();
    $('#idsakit').hide();
    $('#idhariraya').hide();
  } else if(this.value == "hamil") {
    $('#idizin').hide();
    $('#idhamil').show();
    $('#idsakit').hide();
    $('#idhariraya').hide();
  }else if(this.value == "sakit"){
    $('#idizin').hide();
    $('#idhamil').hide();
    $('#idsakit').show();
    $('#idhariraya  ').hide();
  }else if(this.value == "hariraya"){
    $('#idizin').hide();
    $('#idhamil').hide();
    $('#idsakit').hide();
    $('#idhariraya').show();  
  }
});
 </script>
 <script type="text/javascript">
   $("#quote_form").on("change", "#cutiselector", function(event){
    event.delegateTarget.reset();
});
 </script>
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