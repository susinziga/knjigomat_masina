<!DOCTYPE html>
<html lang="en">
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

<body>
<?php


$_SERVER['REQUEST_METHOD']
?>




  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="knjiznica.php">Knjigomat</a>
        <a class="navbar-brand" href="index.php">Odjava</a>

    </div>
  </nav>





  <?php

$fields = array("method" => "mymethod", "email" => "myemail");
//echo $isci." ".$cat;ž
$idUpo=$_SESSION['id'];
$masina=1;
$url = "http://localhost:8880/projekt/rest/narocilo/celo/$idUpo&$masina";
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
  $obj= json_decode($result,true);

?>
  <!-- Icons Grid -->

  <section class="features-icons bg-light text-center" >
    <div class="container">
      <div class="row" style="width:100%">
        <?php

        if(isset($obj)){
        foreach($obj as $i) { //foreach element in $arr

          ?>
        <div style="disply:inline-block" class="col-lg-4">
        <div class="features-icons-icon " style="height:300px; display:inline-block">

            <div>

                <?php if(isset($i['slika'])) {
                $bytes=$i['slika'];
                //echo '<img src="data:image/jpeg;base64,'.base64_encode($str->load()) .'" />';
                $string = implode(array_map("chr", $bytes)); //Convert it to string

                $base64 = base64_encode($string); //Encode to base64
                $img = "<img src= 'data:image/jpeg;base64, $base64' style='height:250px'/>"; //Create the image
                }
                else{
                  $img = "<img src= 'img/noimg.jpg' style='height:250px'/>";
                } ?>

              <?php echo $img ?>
            
            </div>


        </div>
        <h3> <?php echo $i["naslov"] ?></h3>
      <a href="dodatni.php?idUpo=<?php echo $idUpo ?>&idMasina=<?php echo $masina ?>&idKnj=<?php echo $i['id'] ?>">  PREVZEMI </a>

      </div>
    <?php } } ?>


      </div>
    </div>
  </section>

    <?php
function prevzem($id){
echo $id;


              /*  $fields = array("method" => "mymethod", "email" => "myemail");
                //echo $isci." ".$cat;ž
              $idUporabnik=$_SESSION['id'];
                $url = "http://localhost:8880/projekt/rest/izposoja/izpo/$idUporabnik";
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
                  $narocila = json_decode($result,true);*/

    }



     ?>



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
