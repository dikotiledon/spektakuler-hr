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
          <li >
            <a href="<?php echo base_url('indexdosen') ?>">
              <i></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active ">
            <a href="<?php echo base_url('indexdosen/fetchCuti') ?>">
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
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Daftar Pengajuan Cuti</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Jenis Cuti</th>
                      <th>Rentang Tanggal</th>
                      <th>Status</th>
                      <th>Keterangan</th>                                                                 
                    </thead>
                    <tbody>
                    <?php if ($json->success): ?>
                      <?php if (count($json->data) > 0): ?>
                          <?php foreach($json->data as $cuti): ?>
                            <tr>
                              <td><?php echo $cuti->jeniscuti; ?></td>
                              <td><?php echo $cuti->rentangtanggal; ?></td>
                              <td><?php echo $cuti->status; ?></td>
                              <td><?php echo $cuti->keterangan; ?></td>
                            </tr>
                          <?php endforeach; ?>
                      <?php else: ?>
                        Tidak ada data!
                      <?php endif; ?>
                    <?php endif; ?>
                    </tbody>
                  </table>
                </div>
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