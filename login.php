<?php
session_start();

  if(isset($_POST['qr'])){

$fields = array("method" => "mymethod", "email" => "myemail");
$isci=$_POST["qr"];

$url = "http://localhost:8880/projekt/rest/upoti/upot";

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

  foreach ($obj as $i) {
    if($i["qrUporabnik"]==$_POST["qr"]){
      $obje=$i;
    }

  }

  if(isset($obje)){
    $streznik = $_SERVER["HTTP_HOST"];
      // pot do imenika in datoteke, v katerem smo
      $pot = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
      $streznik = $_SERVER["HTTP_HOST"];
        $pot = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
        $id=$obje["id"];
        $ime=$obje["ime"];
          $priimek=$obje["priimek"];

      //echo  "ID  ".$id." ime ".$ime." priimek ".$priimek;
  $_SESSION["id"] =$id;
  $_SESSION["ime"] =$ime;
  $_SESSION["priimek"] =$priimek;


  $link="knjiznica.php";
  echo $link;
  }
  else{

  }



  //header("Location: http://$streznik$pot/knjiznica.php");


}
 ?>
