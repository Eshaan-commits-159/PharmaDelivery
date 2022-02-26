<?php 
    session_start();
    $active='index';
    
    if(!isset($_SESSION["user_id"])){
        echo "<script>window.open('login.php','_self')</script>";
        header("Location:login.php");
        exit();
    }
   
 
?>
<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Task</title>
        <link rel="icon" href="assets/img/logo.svg" sizes="32x32" />
        <link rel="icon" href="assets/img/logo.svg" sizes="192x192" />
        <link rel="apple-touch-icon" href="assets/img/logo.svg" />

        <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap/css/bootstrap.min.css">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/styles.css">

        <title>Sidebar menu responsive</title>
    </head>
    <body id="body-pd">
        
        <?php include_once 'includes/header.php'; ?>

        <?php include_once 'includes/sideNav.php'; ?>

        <div class="container pt-5">
            <h2 class="page-title">All Actions</h2>
            <div class="row">
            
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 pb-5">
                <div class="card">
                  <div class="card-body text-center">
                    <img src="assets/img/icons/view.svg" class="card_icon">
                    <h5 class="card-title card-custom-title"> Scan IPD Bills </h5>
<!--                    <a href="scan-list.php" class="btn btn-custom"><i class='bx bx-scan' ></i> Select Area</a> -->
                    <a href="scan-QR.php" class="btn btn-custom"><i class='bx bx-scan' ></i>QR Code</a>
                  </div>
                </div>

        

        

        <!--===== MAIN JS =====-->
        <script type="text/javascript" src="assets/vendors/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="assets/vendors/jquery/popper.min.js"></script>
        <script type="text/javascript" src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/vendors/jquery/jquery.validate.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>
    </body>
</html>