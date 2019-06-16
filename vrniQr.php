<?php


  if(isset($_POST["qr"])){
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

    if($result=="dela"){
    //  echo "dela";
    }
    else{
    //  echo "nedela";
    }
  }
     ?>
