<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Login</title>
	<link rel="icon" href="assets/img/logo.svg" sizes="32x32" />
    <link rel="icon" href="assets/img/logo.svg" sizes="192x192" />
    <link rel="apple-touch-icon" href="assets/img/bhlogo.png" />

	<link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap/css/bootstrap.min.css">

	<!-- ===== font awesome ICONS ===== -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="assets/css/user-style.css">


</head>
<body>

	<main class="user-form-page-body">
		<form method="post" class="user_profile_form" id="login_form"
		action="authentication.php" onsubmit = "return validation()" name="f1">
			<div class="user-form-page-area">
				<div class="user-form-page-haeder-area text-center">
					<img class="" src="assets/img/bhlogo.png" alt="" width="200" height="80">
					<h1 class="h3 mb-1 user-form-page-title-text"> <span style="color: blue;">Pharmacy Delivery</span></h1>
				</div><br>

			
				
			
						<?php if (isset($_GET["message"])&& $_GET["message"]=='failed'):?>
							<div class="alert alert-danger">
							 <?php echo 'You Entered Wrong Username Or Password';
						 ?>	
						  <?php endif; ?>	
						 </div>
						 <div class="form-input-area">
					<div class="form-group">
						<div class="form-item">
							<label for="inputEmail" class="custom-form-label">Enter UserId</label>
							<input type="text" id="inputEmail" class="form-control input-field" name="user" placeholder="Enter Userid">
						</div>
					</div>
					<div class="form-group password_field">
						<div class="form-item">
							<label for="inputPassword" class="custom-form-label">Password</label>
							<!-- <a href="forgetPassword.php"><label class="forget-password-label">Forget Password ?</label></a> -->
							<input type="password" id="inputPassword" class="form-control input-field" name="pass" placeholder="Enter password">
							<i class="fas fa-eye" id="eyeTogglePassword"></i>
						</div>
					</div>
					<div class="text-center">
						<button class="btn btn-custom" name="login_btn" type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>	

					
					</div>
				</div>
			</div>	
		</form>	
	</main>



	<script type="text/javascript" src="assets/vendors/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="assets/vendors/jquery/popper.min.js"></script>
	<script type="text/javascript" src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/9c95112890.js"></script>
	<script type="text/javascript" src="assets/vendors/jquery/jquery.validate.js"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>


	
</body>
</html>