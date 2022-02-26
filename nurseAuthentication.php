<?php  
    session_start();    
     include('connection.php');  
   
     $username = $_POST['Nurseuser'];  
     //$password = $_POST['Nursepass'];
	 
	 $_SESSION["nurse_id"] = $username;  
      header("location:scan_nurse.php");
       
?>  