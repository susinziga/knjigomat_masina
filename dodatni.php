<html>
<?php

$idKnj=$_GET["idKnj"];
$idUpo=$_GET["idUpo"];
$idmas=$_GET["idMasina"];


$fields = array("method" => "mymethod", "email" => "myemail");
//echo $isci." ".$cat;ž

$url = "http://localhost:8880/projekt/rest/narocilo/vrniID/$idUpo&$idKnj&$idmas";
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
  echo $result;


  $fields = array("method" => "mymethod", "email" => "myemail");
  //echo $isci." ".$cat;ž

  $url = "http://localhost:8880/projekt/rest/izposoja/izpo/$result&$idKnj&$idUpo";
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
    echo $result;
    $pot = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
    $streznik = $_SERVER["HTTP_HOST"];
    header("Location: http://$streznik$pot/knjiznica.php");
 ?>
</html>
