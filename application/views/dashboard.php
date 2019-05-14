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
            <a href="<?php echo base_url('indexadmin') ?>">
              <i></i>
              <p>Daftar dosen</p>
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
                <h4 class="card-title">Daftar Dosen</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Kode</th>
                      <th>Alamat</th>
                      <th>TTL</th>
                      <th>No. HP</th>
                      <th>Gaji</th>
                      <th>ID FK</th>
                      <th>Action</th>                                                                      
                    </thead>
                    <tbody>
                    <?php if ($json->success): ?>
                      <?php if (count($json->data) > 0): ?>
                          <?php foreach($json->data as $dosen): ?>
                            <tr>
                              <td><?php echo $dosen->nip_dosen; ?></td>
                              <td><?php echo $dosen->nama; ?></td>
                              <td><?php echo $dosen->kodedosen; ?></td>
                              <td><?php echo $dosen->alamat; ?></td>
                              <td><?php echo $dosen->ttl; ?></td>
                              <td><?php echo $dosen->nohp; ?></td>
                              <td>RP.<?php echo $dosen->gaji; ?></td>
                              <td><?php echo $dosen->id_fakultas; ?></td>
                              <td>
                               <?php echo form_open('indexadmin/deletedosen'); ?>
                                  <input type="hidden" name="nipdosen" value="<?php echo $dosen->nip_dosen; ?>" required>
                                  <input type="submit" class="btn btn-block" name="hapus" value="Hapus">
                               <?php echo form_close(); ?>
                               <?php echo form_open('indexadmin/updatedosen'); ?>
                                  <span>
                                    <input type="hidden" name="nip_dosen" value="<?php echo $dosen->nip_dosen; ?>" required>
                                    <input type="hidden" name="nama" value="<?php echo $dosen->nama; ?>" required>
                                    <input type="hidden" name="kodedosen" value="<?php echo $dosen->kodedosen; ?>" required>
                                    <input type="hidden" name="alamat" value="<?php echo $dosen->alamat; ?>" required>
                                    <input type="hidden" name="ttl" value="<?php echo $dosen->ttl; ?>" required>
                                    <input type="hidden" name="nohp" value="<?php echo $dosen->nohp; ?>" required>
                                    <input type="hidden" name="gaji" value="<?php echo $dosen->gaji; ?>" required>
                                    <input type="hidden" name="id_fakultas" value="<?php echo $dosen->id_fakultas; ?>" required>
                                  </span>
                                  </br>
                                  <span><input type="submit" class="btn btn-block" name="hapus" value="Update"></span>
                               <?php echo form_close(); ?>                               
                              </td>
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
<script type="text/javascript">
 $(document).ready(function(){
    $("table").effect("slide", "slow");
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
 $(".urldelete").click(function( event ){
      var nip_dosen = $(event.currentTarget).attr("data-key");
      $.ajax({
         type:'get',
         dataType: 'json',
         url: 'http://localhost:8000/api/v1/hr/Dosen/removeDosen/'+nip_dosen,
         success:function (dt) {
          alert("AJAX request successfully completed");
          window.location.reload(true);
         },
         error: function(e){
          alert("AJAX request NOT successfully completed");
          window.location.reload(true);
          console.log("Gagal Hapus");
         }
     });
 }); 


</script>  
</body>

</html>