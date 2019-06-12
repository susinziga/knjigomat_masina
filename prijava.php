<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'masinasession.php';
 ?>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="http://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Knjigomat</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">


  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">

</head>

<body>
<?php
$_SERVER['REQUEST_METHOD']
?>





  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Knjigomat</a>

    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <h1 style="color:white">Skeniraj QR kodo uporabnika</h1>
      <div class="row">
        <video id="preview" style="margin:auto"></video>
        <script type="text/javascript">
          let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
          scanner.addListener('scan', function (content) {
            //alert(content);
            prijava(content);
          });
          Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
              scanner.start(cameras[0]);
            } else {
              console.error('No cameras found.');
            }
          }).catch(function (e) {

          });
        </script>
      </div>
    </div>
  </header>

  


  <script>
  function prijava(content){


    $.ajax({
     url:"login.php",
     method:"POST",
     data:{qr:content},
     success:function(data){
       if(data!=""){
         window.location = data;
        }

     }
   });

  }

  </script>


</body>

</html>
