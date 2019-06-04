<!DOCTYPE html>
<html lang="en">
<?php

session_start();
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
<?php $_SESSION['masina']=1;  ?>
<body>
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">

        <div class="col-lg-6">

          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <a class="navbar-brand"  href="prijava.php">
            <div class="features-icons-icon d-flex">
              <i class="icon-screen-desktop m-auto text-primary"></i>
            </div>
              </a>
            <h3>Želim si izposodit knjigo </h3>
          </div>
        </div>


        <div class="col-lg-6">

          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <a class="navbar-brand"  href="vracanje.php">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
              </a>
            <h3>Želim vrniti knjigo </h3>

          </div>
        </div>


      </div>
    </div>
  </section>



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
