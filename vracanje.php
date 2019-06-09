<!DOCTYPE html>
<html lang="en">
<?php

session_start();
include 'masinasession.php';
 ?>
<head>

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
  	<script src="http://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

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
      <a class="navbar-brand" href="index.php">Domov</a>

    </div>
  </nav>


  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <video id="preview"></video>
        <script type="text/javascript">
          let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
          scanner.addListener('scan', function (content) {
            //alert(content);
            vrni(content);
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
  <?php


    if(array_key_exists('isci',$_POST)){
      $fields = array("method" => "mymethod", "email" => "myemail");
      //echo $isci." ".$cat;ž
      $qr=$_POST['qr'];
      $url = "http://localhost:8880/projekt/rest/izposoja/vrni/$qr";
        $fields = json_encode($fields);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($fields))
        );
        $result= curl_exec($ch);

        curl_close($ch);


if($result=='uspesno'){


   ?>
   <div class="alert" style="padding: 20px; background-color: green; color: white; margin-bottom: 15px;">
     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
     Knjiga uspešno oddana!
   </div>
 <?php }} ?>

 <script>
 function vrni(content){


   $.ajax({
    url:"vrniQr.php",
    method:"POST",
    data:{qr:content},
    success:function(data){

      alert(data);
      if(data=='dela'){
        alert(data);
       }
       else{
         alert("nedela");
       }

    }
  });

 }

 </script>

  <!-- Footer -->


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
