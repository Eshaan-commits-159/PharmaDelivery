<?php 
session_start();

$active='delivered';
include('connection.php');  

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
        <style>
        #example1 {
        display: flex;
        flex-direction: column;
        justify-content: stretch;
         
        /* padding-left:15px; */
        }
        .idetail{
        box-sizing: content-box;  
        width: 100%;
        /* height: 200px; */
        height: 100%;
        /* padding: 15px, 15px;  */
        margin-top: 15px; 
        background-color: powderblue;
        border-radius:25px;
        text-align: center;
        }

        </style>
    </head>
    <body id="body-pd">
        
        <?php include_once 'includes/header.php'; ?>
        <?php include_once 'includes/sideNav.php'; ?>

        <?php 

            $status="0"; 
            $user_id=$_SESSION["user_id"];
			$sql = "SELECT  * FROM [DietApp].[dbo].[Pharmacy_status]  where Status= '$status' and scanUser='$user_id' and DeliveryEnd >=convert(Datetime,(convert(varchar(10),getdate(),120)))-2  order by DeliveryEnd desc";	

            $stmt = sqlsrv_query( $conn, $sql );
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            
             echo "<div id='example1'>
             <div class = 'idetail'>
             <b>Scan Time:</b>".$row['scanDate']->format('Y-m-d H:i:s').",<br>
             <b>Delivery Time:</b>".$row['DeliveryEnd']->format('Y-m-d H:i:s').",<br>
             <b>Delivered In:</b>".$row['Tat']." minutes,<br>
            <b>Issue Number:</b>".$row['MatlIssueNumber'].",
            <br>".$row['PatientName'].",<br>".$row['WardName'].",<br><b>Recieved By:</b> ".$row['RecievedUser']."</div>
            </div>";
    
}
// sqlsrv_free_stmt($stmt1);
sqlsrv_free_stmt( $stmt);

?>

         <!--===== MAIN JS =====-->
         <script type="text/javascript" src="assets/vendors/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="assets/vendors/jquery/popper.min.js"></script>
        <script type="text/javascript" src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/vendors/jquery/jquery.validate.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>
    </body>
</html>
