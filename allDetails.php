<?php 
    session_start();
    $active='allDetails';
    include_once 'connection.php';
  
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

        <?php
        $default = 0;
        if(isset($_POST['generate'])) {
          $userid=$_SESSION["user_id"];
        $fromdate = $_POST['fromdate'];
        $enddate = $_POST['enddate'];
        $newFromDate = date("Y-m-d", strtotime($fromdate));
        $newEndDate = date("Y-m-d", strtotime($enddate));
        $default = 1;
        
          
        ?>
        <div class="table-responsive-sm">
        <!--Table-->
        <table class="table" id="tblexportData">
            <!--Table head-->
            <thead class="table-dark">
                <tr>
                    <th>PatientCode</th>
                    <th>PatientName</th>
                    <th>WardName</th>
                    <th>MatlIndentNumber</th>
                    <th>MatlIssueNumber</th>
                    <th>MatlIssueDate</th>
                    <th>scanUser</th>
                    <th>scanDate</th>
                    <th>Status</th>
                    <th>DeliveryEnd</th>
                    <th>RecievedUser</th>
                    <th>TimeDifference</th>
                    </tr>
            </thead>

            <!--Table head-->
            <!--Table body-->
            <tbody>
            <?php
               $status="0";
            $user_id=$_SESSION["user_id"];
            // echo "$newEndDate";
            $query= "Select * FROM [DietApp].[dbo].[Pharmacy_status] where Status = '$status' and Convert(varchar(10),scanDate,120)>='$newFromDate' and Convert(varchar(10),scanDate,120)<='$newEndDate' order by scanDate DESC"; 
            $stmt = sqlsrv_query( $conn, $query );

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
?>



<tr>
<td><?php echo $row['PatientCode']?></td>
<td><?php echo $row['PatientName']?></td>
<td><?php echo $row['WardName']?></td>
<td><?php echo $row['MatlIndentNumber']?></td>
<td><?php echo $row['MatlIssueNumber']?></td>
<td><?php echo $row['MatlIssueDate']->format('Y-m-d h:i:s')?></td>
<td><?php echo $row['scanUser']?></td>
<td><?php echo $row['scanDate']->format('Y-m-d h:i:s')?></td>
<td><?php echo $row['Status']?></td>
<td><?php echo $row['DeliveryEnd']->format('Y-m-d h:i:s')?></td>
<td><?php echo $row['RecievedUser']?></td>
<td><?php echo $row['Tat']?></td>
</tr>


<?php   


       

    }
  }?>

        <div class="container pt-5">
            <h2 class="page-title">All Details</h2>
            <div class="container date-filter-area">
                <form method="post">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>From date</label>
                                <input name="fromdate" class="form-control"style="width:100%" type="date" value="<?php if($default==0){echo date("Y-m-d");} else {echo $newFromDate;} ?>">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <label>To date</label>
                                <input name="enddate" class="form-control" style="width:100%" type="date" value="<?php if($default==0){echo date("Y-m-d");} else {echo $newEndDate;} ?>">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                            <div class="form-group">
                                <div class="form-group" style="margin-top: 17px;">
                                    <button class="btn btn-custom" type="submit" name="generate"> <img src="assets/img/icons/apply.svg" class="btn-icon"> Apply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <br>
        
                <div align="right">  
                <button onclick="exportToExcel('tblexportData', 'user-data')" class="btn btn-success">Export Table Data To Excel File</button>  
            </div><br><br>
        </div>



        <!--===== MAIN JS =====-->
       <script> function exportToExcel(tableID, filename = ''){
                var downloadurl;
                var dataFileType = 'application/vnd.ms-excel';
                var tableSelect = document.getElementById(tableID);
                var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');
                
                // Specify file name
                filename = filename?filename+'.xls':'export_excel_data.xls';
                
                // Create download link element
                downloadurl = document.createElement("a");
                
                document.body.appendChild(downloadurl);
                
                if(navigator.msSaveOrOpenBlob){
                    var blob = new Blob(['\ufeff', tableHTMLData], {
                        type: dataFileType
                    });
                    navigator.msSaveOrOpenBlob( blob, filename);
                }else{
                    // Create a link to the file
                    downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;
                
                    // Setting the file name
                    downloadurl.download = filename;
                    
                    //triggering the function
                    downloadurl.click();
                }
            }
        </script>
        <script type="text/javascript" src="assets/vendors/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="assets/vendors/jquery/popper.min.js"></script>
        <script type="text/javascript" src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/vendors/jquery/jquery.validate.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>
    </body>
</html>
