<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
	include '../Header/Header3.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="en-us">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Student Registration</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
</head>
<style>
 .table{padding:0 15%; }
 .table table{width:100%;}
 .table table .col td{background:#0b462d; color:#fff; font-size:16px;}
 .table table td{padding:0.5% 1%; font-size:14px; border:1px solid #ccc;}
</style>
<body>
<div id="container">
 <div class="table">
  <table>
   <tr class="col"> <td>Date</td><td>Total No of New Registration</td><td>Status</td> </tr>
   <?php $sqlReport="SELECT COUNT( srno ) AS number, `RegistrationDate` FROM NewStudentRegistration_temp GROUP BY RegistrationDate ORDER BY RegistrationDate DESC";
   $sqlQuery=  mysql_query($sqlReport);
   while($reportData=  mysql_fetch_array($sqlQuery)){
   ?>
   
   <tr><td><?php echo $reportData['RegistrationDate']; ?></td><td><?php echo $reportData['number']; ?></td><td><a href="datewiseregistrationreport.php?Date=<?php echo $reportData['RegistrationDate']; ?>">View</td> </tr>
   <?php } ?>
  
  </table>
 </div>
</div>
</body>
</html>