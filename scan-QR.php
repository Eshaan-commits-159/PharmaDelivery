<?php 
include ('connection.php');
session_start();
if(!isset($_SESSION["user_id"])){
    echo "<script>window.open('login.php','_self')</script>";
    header("Location:login.php");
    exit();
}

if (isset($_POST['submit_qr_code'])) {
    $_SESSION['qr_code'] = $_POST['qr_code'];  
    $idarr=$_SESSION['qr_code'];
    $sql = "SELECT  * FROM [DietApp].[dbo].[Vw_PharmacyDeliveries]  where MatlIssueNumber= '$idarr' ";
    $stmt = sqlsrv_query( $conn, $sql );  

    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
  
    $matissuenumber=$row['MatlIssueNumber']; 
    if ($matissuenumber ==null)
    {
        echo "<script>alert( 'Invalid Document. Document not found !!')</script>";

    }
    else
    {
    $patientcode=$row['PatientCode']; 
    $patientname=$row['PatientName'];
    $wardname=$row['WardName'];
    $matindentnumber=$row['MatlIndentNumber']; 
    $matissuedate=$row['MatlIssueDate']->format('Y-m-d H:i:s');   
    $user = $_SESSION["user_id"]; 
    $status="1"; 
    $sql = "SELECT  count(*) Recs FROM [DietApp].[dbo].[Pharmacy_status]  where MatlIssueNumber= '$idarr' ";
    $stmt = sqlsrv_query( $conn, $sql );  
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
    //echo $row['Recs'];
    if ($row['Recs']==0) {

    $query = "INSERT INTO  [DietApp].[dbo].[Pharmacy_status]  
    (PatientCode,PatientName,WardName,MatlIndentNumber,MatlIssueNumber,MatlIssueDate,scanUser,scanDate,Status)
    values('".$patientcode."','".$patientname."','".$wardname."','".$matindentnumber."','".$matissuenumber."','".$matissuedate."','".$user."',GETDATE(),'".$status."')";
    $stmt1 = sqlsrv_query($conn, $query);
	//echo $query ;
    }
    else {
    echo "<script>alert( 'This document is already Scanned')</script>";
    }
    }
    // header("Location:scan-QR.php");
    // exit();
}

?>
<html>
<body>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Scan QR Code</title>
        <link rel="icon" href="assets/img/logo.svg" sizes="32x32" />
        <link rel="icon" href="assets/img/logo.svg" sizes="192x192" />
        <link rel="apple-touch-icon" href="assets/img/logo.svg" />

        <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap/css/bootstrap.min.css">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/styles.css">


    </head>
    <body id="body-pd">
        
        <?php include_once 'includes/header.php'; ?>

        <?php include_once 'includes/sideNav.php'; ?>



        <div class="container pt-5">
            <div class="text-center">
                <h2 class="scan-page-title">Place the QR Code inside the Area</h2>
                <p class="scan-page-info">Scanning will start automatically</p>
                <div class="scan-image-preview-area">
                    <img src="assets/img/icons/scan-boder.svg" class="video-overlay">
                    <video id="preview"></video>
                </div>
            </div>
        </div><br>


        <div class="container">
            <div class="camera-changee-btn-area text-center">
                <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
                  

                    <input type="radio" class="btn-check" name="options" value="1" id="option1" autocomplete="off" checked>
                    <label class="btn btn-light" for="option1">Back Camera</label>

                    <input type="radio" class="btn-check" name="options" value="2" id="option2" autocomplete="off">
                    <label class="btn btn-light" for="option2">Front Camera</label>
                  
                </div>
            </div>
        </div>


        <div class="custom-form">
            <form method="post">
                <input type="hidden" id="qrcode" name="qr_code" id="get_qr_code" value="00">
                <button type="submit" id="qr_code_submit_btn" name="submit_qr_code" class="hidden-btn"></button>
            </form>
        </div>
<video id="preview"></video>

<script type="text/javascript" src="assets/vendors/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="assets/vendors/jquery/popper.min.js"></script>
        <script type="text/javascript" src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/vendors/jquery/jquery.validate.js"></script>
        <script type="text/javascript" src="assets/vendors/instascan/instascan.min.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- <script type="text/javascript" src="jquery-cookie-master/src/jquery.cookie"></script>
 --><script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<!-- <script src="jc.js" type="text/javascript"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script> -->
<script type="text/javascript">

// var b=[];

	var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false }); 

	scanner.addListener('scan',function(content){ 

        $('#qrcode').val(content).trigger('change');
        $('#qr_code_submit_btn').trigger('click');
		
        if(confirm("Do you want to stop scanning?")){
            //console.log(b);
        }
      

	});
	Instascan.Camera.getCameras().then(function (cameras){
		if(cameras.length>0){
			scanner.start(cameras[1]);
			$('[name="options"]').on('change',function(){
				if($(this).val()==1){
					if(cameras[1]!=""){
						scanner.start(cameras[1]);
					}else{
						alert('No Front camera found!');
					}
				}else if($(this).val()==2){
					if(cameras[0]!=""){
						scanner.start(cameras[0]);
					}else{
						alert('No Back camera found!');
					}
				}
			});
		}else{
			console.error('No cameras found.');
			alert('No cameras found.');
		}
	}).catch(function(e){
		console.error(e);
		alert(e);
	});

	</script>
</body>
</html>