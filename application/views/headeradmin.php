<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Material Admin by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css');?>">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/fontastic.css');?>">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.default.css' );?>">
    <!-- <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet"> -->
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css');?>">
    <!-- Favicon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/img/favicon.ico');?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NIP</th>
      <th scope="col">Nama Lengkap</th>
      <th scope="col">Fakultas</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
      <?php foreach ($dosen as $key): ?>
        <tr>
          <th scope="row">1</th>
          <td><?php echo $key['nip_dosen']; ?></td>
          <td><?php echo $key['nama']; ?></td>
          <td><?php echo $key['id_fakultas']; ?></td>
          <td>
            <a class="modal-trigger urldelete" href="#delete" data-key="<?php echo $key['nip_dosen']; ?>">Delete</a>
            <a href=""> </a>
            <a class="modal-trigger urlupdate" href="#update" data-key="<?php echo $key['nip_dosen']; ?>">Update</a>            
          </td>
          </tr>
       <?php endforeach ?>
    
  </tbody>
</table>
<div id="res_div"></div>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script> 
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
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
