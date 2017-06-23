<?php
session_start();

include '../Header/Header3.php';
include '../../connection.php';
?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Payroll</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../../Bootstrap/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/payroll.css" />
   <script src="../../Bootstrap/bootstrap.min.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
 <div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="cont">
<div class="row newemployee">
 <div class="col-md-2 hris-topmanu"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="HRISbasicdetail.php"><button class="btnmanu">Basic Details</button></a></li>
   <li><a href="HRISpositiondetail.php"><button class="btnmanu">Position Details</button></a></li>
   <li><a href="HRIScontactdetail.php"><button class="btnmanu">Contact Details</button></a></li>
   <li class="active"><a href="HRISemploymentdetail.php"><button class="btnmanu">Employment Details</button></a></li>
   <li><a href="HRISeducationdetail.php"><button class="btnmanu">Education Details</button></a></li>
   <li><a href="HRISbankdetail.php"><button class="btnmanu">Bank Details</button></a></li>
   <li><a href="HRISiddetail.php"><button class="btnmanu">ID Details</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <!------>
  <div class="show-contactdetails">
   <form action="#" method="post">
   <div id="myProgress">
	 <div id="myBar" style="width:<?php $x=42; echo $x; ?>%" ></div>
     <div align="center" style="color:#000; margin-left:2%;"><font><?php echo $x; ?>% Complete Your Pr<font style="color:#000">ofile</font></font></div>
	</div>
  <!------>
   <div class="basic position"><strong>EMPLOYMENT DETAILS:</strong> </div>
  <!------>
  <div class="showdetail1">
   <div class="cdetails"> 
    <div>
    <table>
     <tr>
      <td>School Name</td><td>:</td>
      <td><input type="text" name="schoolname" class="text-box" placeholder="School Name" id="schoolname"></td>
     </tr>
     <tr>
      <td>Start Date</td><td>:</td>
      <td><input type="date" name="startdate" class="text-box tbs" ></td>
     </tr>
     <tr>
      <td>End Date</td><td>:</td>
      <td><input type="date" name="enddate" class="text-box tbs" ></td>
     </tr>
    </table>
    </div>
    <div class="emtable2">
    <table>
     <tr>
      <td>Title</td><td>:</td>
      <td><input type="text" name="title" class="text-box" placeholder="Title" id="Title"></td>
     </tr>
     <tr>
      <td>Location</td><td>:</td>
      <td><textarea name="location" class="text-box" placeholder="Location" id="location"></textarea> </td>
     </tr>
    </table>
    </div>
    <div align="center" style="margin-top:2%; width:100%">
     <a id="submit" onClick="window.open('HRISeducationdetail.php', '_top')" class="btn">Submit</a>
    </div>
   </div>
  </div>
 </form>
  <!------------->
   <!------------------>
 </div>
 </div>
 </div>
 </div>
</div> 
<div><?php include '../../footer.php'; ?></div>
</body>
</html>