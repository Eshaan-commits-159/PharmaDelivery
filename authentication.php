<?php  
    session_start();    
     include('connection.php');  
   
     $username = $_POST['user'];  
     $password = $_POST['pass'];
    


    $sql = "SELECT * FROM [DietApp].[dbo].[vw_LoginTable] where isDietician = 'P'  and usercode= '$username' and passwrd= '$password'" ;  
    $stmt = sqlsrv_query( $conn, $sql);  
    if( $stmt === false )  
    {  
     echo "Error in executing query.</br>";  
     die( print_r( sqlsrv_errors(), true));  
    }  
  
    /* Retrieve and display the results of the query. */  
    $row = sqlsrv_fetch_array($stmt);
    
         if($row == false){  
            // echo '<script>alert("Invalid Username and Password")</script>';
            header("location:login.php?message=failed");

        }  
        else{  
            $_SESSION["user_id"] = $row["usercode"];  
            header("location:index.php");
        }     
  
    /* Free statement and connection resources. */  
    sqlsrv_free_stmt( $stmt);  
    sqlsrv_close( $conn);  

       
?>  