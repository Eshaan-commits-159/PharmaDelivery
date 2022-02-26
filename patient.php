<?php 
session_start();

$active='patient';
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
         
        }
        .idetail{
        box-sizing: content-box;  
        width: 100%;
        height: 100%;
        margin-bottom: -10px; 
        background-color: #CAD5E2;
        border-radius:25px;
        text-align: center;
        }

body {
font-family: Arial, Helvetica, sans-serif;
}
/* Full width input fields */
input[type=text], input[type=password] {
width: 100%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
box-sizing: border-box;
}
/* Set a style for all buttons */
button {
background-color: #4CAF50;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
cursor: pointer;
width: 100%;
}
button:hover {
opacity: 0.7;
}
/* For the cancel button */
.cancelbtn {
width: auto;
padding: 10px 18px;
background-color: #f44336;
}
/* Center the image and position the close button */
.imgcontainer {
text-align: center;
margin: 24px 0 12px 0;
position: relative;
}
img.avatar {
width: 60%;
border-radius: 30%;
}
.container {
padding: 16px;
}
span.psw {
float: right;
padding-top: 16px;
}
/* The modal (background) */
.modal {
/* Hidden by default */
display: none;
/* Stay in place */
position: fixed;
/* Sit on top */
z-index: 1;
left: 0;
top: 0;
/* Full width and height */
width: 100%;
height: 100%;
/* Enable scrolling if needed */
overflow: auto;
/* Fallback color */
background-color: #000;
/* Black with opacity */
background-color: rgba(0,0,0,0.4);
padding-top: 60px;
}
/* Modal content/box */
.modal-content {
background-color: #fefefe;
margin: 5% auto 15% auto;
border: 1px solid #888;
width: 80%;
}
/* The close button (x)*/
.close {
position: absolute;
right: 25px;
top: 0px;
color: #000;
font-size: 35px;
font-weight: bold;
}
.close:hover, .close:focus {
color: red;
cursor: pointer;
}
/* Add zoom animation */
.animate {
-webkit-animation: animatezoom 0.6s;
animation: animatezoom 0.6s
}
@-webkit-keyframes animatezoom {
from {-webkit-transform: scale(0);}
to {-webkit-transform: scale(1);}
}
@keyframes animatezoom {
from {transform: scale(0);}
to {transform: scale(1);}
}
/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
span.psw {
display: block;
float: none;
}
.cancelbtn {
width: 100%;
}
}

.p1 {
  font-family: "Times New Roman", Times, serif;
}

</style>

    </head>
    <body id="body-pd">
        
        <?php include_once 'includes/header.php'; ?>

        <?php include_once 'includes/sideNav.php'; ?>

        <button onclick="document.getElementById('id01').style.display='block'" style="width: auto; "> Nurse Login</button>
<div id="id01" class="modal">
<form class="modal-content animate" action="nurseAuthentication.php" method="POST"  >
<!-- Create an image container -->
<div class="imgcontainer">
<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
<img src="assets/img/bhlogo.png" alt="Avatar" class="avatar">
</div>
<!-- Create a form container -->
<div class="container">
<!-- Username -->
<label for="user"><b>Nurse Name</b></label>
<input type="text" placeholder="Enter Nurse Name" name="Nurseuser" required>
<!-- Password -->
<!-- <label for="pass"><b>Password</b></label>
// <input type="password" placeholder="Enter Password" name="Nursepass" required>-->
<!-- Submit Button -->
<button type="submit">Add Receiver</button>
<!--<label>
<input type="checkbox" checked="checked" name="remember">Remember Me
</label>-->
</div>
<div class="container" style="background-color: #f1f1f1;">
<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
</div>
</form>
</div>
 
<?php 

$status="1"; 
$userid=$_SESSION["user_id"];
$sql = "SELECT  * FROM [DietApp].[dbo].[Pharmacy_status]  where Status= '$status' and scanUser = '$userid' order by scanDate DESC"; 
$stmt = sqlsrv_query( $conn, $sql );


while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
   
      echo "<div id='example1'><div class = 'idetail'>
      <b>Scan Time:</b>".$row['scanDate']->format('Y-m-d H:i:s').",<br>
      <b>Issue Number:</b>".$row['MatlIssueNumber'].",<br> <b>Patient Code:</b>".$row['PatientCode'].",
      <br>".$row['PatientName'].",<br><b>Ward Name:</b>".$row['WardName'].";
      </div>
      </div>
      <br>"; 
}

// sqlsrv_free_stmt($stmt1);
sqlsrv_free_stmt( $stmt);
?>

</body>
</html>

                  <!--===== MAIN JS =====-->
        <script type="text/javascript" src="assets/vendors/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="assets/vendors/jquery/popper.min.js"></script>
        <script type="text/javascript" src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/vendors/jquery/jquery.validate.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

        <script>
// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
}
}
</script>
    </body>
</html>