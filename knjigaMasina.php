<!DOCTYPE html>
<html lang="en">


<style>
<?php  include'css/style.css'; ?>
</style>

<?php

session_start();
include 'masinasession.php';
 ?>
 <?php
if(!isset($_SESSION["id"])){
  header("Location: index.php");
}
if(time()-$_SESSION["timer"]>120){
  header("Location: odjava.php");
}
else{
  $_SESSION["timer"]=time();
}

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

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">

</head>

<body onload="load(); setimg();">
<?php


$_SERVER['REQUEST_METHOD'];
$id=$_GET["id"];

$fields = array("method" => "mymethod", "email" => "myemail");
//echo $isci." ".$cat;ž

$url = "http://localhost:8880/projekt/rest/knjige/knjiga/$id";
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
  $obj = json_decode($result,true);
  $zanr=$obj['vrsta'];


  if(isset($obj['slika'])) {

  $bytes=$obj['slika'];
  //echo '<img src="data:image/jpeg;base64,'.base64_encode($str->load()) .'" />';
  $string = implode(array_map("chr", $bytes)); //Convert it to string

  $base64 = base64_encode($string); //Encode to base64
  $img = "<img src= 'data:image/jpeg;base64, $base64' style='height:250px'/>"; //Create the image
  }
  else{
    $img = "<img src= 'img/noimg.jpg' style='height:250px'/>";
  }



  $fields = array("method" => "mymethod", "email" => "myemail");
  //echo $isci." ".$cat;ž

  $url = "http://localhost:8880/projekt/rest/knjige/iskanje/vrsta&$zanr";
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
    $obje = json_decode($result,true);

?>




  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top nav">
    <div class="container">
      <a class="navbar-brand" href="knjiznica.php">Knjigomat</a>
        <a class="navbar-brand" href="index.php">Odjava</a>

    </div>
  </nav>

  <!-- Masthead -->


  <!-- Icons Grid -->
  <section class="slike content-to-hide"  >

      <div class="row scrolling-wrapper content-to-hide" style="width:100%">

        <?php
        if(isset($obje)){
        foreach($obje as $i) { //foreach element in $arr
          if(isset($i['slika'])) {

          $bytes=$i['slika'];
          //echo '<img src="data:image/jpeg;base64,'.base64_encode($str->load()) .'" />';
          $string = implode(array_map("chr", $bytes)); //Convert it to string

          $base64 = base64_encode($string); //Encode to base64
          $imga = "<img src= 'data:image/jpeg;base64, $base64' style='height:250px'/>"; //Create the image

          }

          else{
            $imga = "<img src= 'img/noimg.jpg' style='height:250px'/>";
          }
          ?>


            <div class="scroll-item">
              <a href="knjiga.php?id=<?php echo $i['id'] ?>">
              <?php echo $imga ?>
              </a>
            </div>



    <?php } } ?>


    </div>

  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" >
          <?php echo $img ?>

          <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $obj['qrKoda'] ?>&choe=UTF-8" />

        </div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2><?php echo $obj['naslov'] ?></h2>
          <p class="lead mb-0">Avtor: <?php echo $obj['avtor'] ?></p>
          <p class="lead mb-0">Žanr: <?php echo $obj['vrsta'] ?></p>
          <br />
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">


              <button type="submit" name="prevzemi" class="btn btn-block btn-lg btn-primary">Prevzemi</button>
            </form>

        </div>
      </div>

  </section>

<?php
if(array_key_exists('prevzemi',$_POST)){
  $idUpo=$_SESSION['id'];
  $idKnjiga=$_GET["id"];
//  $masina=$_POST['masina'];


  $fields = array("method" => "mymethod", "email" => "myemail");
  //echo $isci." ".$cat;ž
  $masina=$_SESSION["masina"];
  $url = "http://localhost:8880/projekt/rest/izposoja/izposoja/$idKnjiga&$idUpo&$masina";
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

   // header("Location: knjiznica.php");



    if($result=='Uspesno'){
      ?>
      <div class="alert" style="padding: 20px; background-color: green; color: white; margin-bottom: 15px;">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
       Knjiga izposojena!
      </div>
      <?php

    }
  }
     ?>








  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <script type="text/javascript" src="llqrcode.js"></script>
<script type="text/javascript" src="webqr.js"></script>



</body>

</html>
