<?php
$serverName = "192.168.5.19\ApexSQL"; //serverName\instanceName
$connectionInfo = array( "Database"=>"DietApp", "UID"=>"DietApp", "PWD"=>"BvhApp@123");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
?>