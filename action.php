<?php 
include_once('connection.php');
if(isset($_POST) && !empty($_POST['uname']) && !empty($_POST['psw'])) 
    {   
    $login = $_POST["uname"];
    $pass  = $_POST["psw"];
    extract($_POST); 
	$sql = "SELECT passwrd FROM vw_LoginTable WHERE usercode='".$login."'";
    $req =  sqlsrv_query($conn, $sql) or die('Error SQL!<br>'.$sql.'<br>');
	 $data = sqlsrv_fetch_array($req, SQLSRV_FETCH_ASSOC);
	if($pass !== $data['passwrd'])
        {
        echo ' <script> alert ("Login Or Password Incorrect")</script>' ;
        include('index.php'); 
        exit;
        }
    else
        {
        $_SESSION['login'] = $login;
        echo 'Login Succesfull';
       
        }    

	
	} 
	
	 else {
    echo '<p>Vous avez oublié de remplir un champ.</p>';
    include('index.html'); 
}



?>