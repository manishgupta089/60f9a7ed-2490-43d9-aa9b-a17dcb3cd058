<?php
session_start();

include '../../connection.php';
include '../../APPConf.php';

$EmployeeId=$_SESSION['userid'];
$rsEmp=mysql_query("select `Education_Qualification`,`Name`,`InstituteName`,`Specialization`,`DegreeFinalGrade`,`DegreeStartDate`,`DegreeEndDate` from `employee_master` where `EmpId` ='$EmployeeId'");
$rs1=mysql_query("select `Name` from `employee_master` where `EmpId` ='$EmployeeId'");
$currentdate=date("Y-m-d");
while($row = mysql_fetch_row($rsEmp))
		{
			$Education_Qualification=$row[0];
			$Name=$row[1];
			$InstituteName=$row[2];
			$Specialization=$row[3];
			$DegreeFinalGrade=$row[4];
			$DegreeStartDate=$row[5];
			$DegreeEndDate=$row[6];
			break;
		}
		while($row1 = mysql_fetch_row($rs1))
		{
			$Empname=$row1[0];
			break;
		}

$rsNotice=mysql_query("select `noticetitle`,`NoticeDate`,`srno` from `employee_notice` where `EmpId`='$EmployeeId' or `EmpId`='All'");


?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Payroll</title><link rel="icon" href="l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/payroll.css" />
   <script src="../js/bootstrap.min.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
 <div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="cont">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="#"><button class="btnmanu">My Letters</button></a></li>
   <li class="active"><a href="#"><button class="btnmanu">My Details</button></a></li>
   <li><a href="#"><button class="btnmanu">Salary Letters</button></a></li>
   <li><a href="#"><button class="btnmanu">Hr Policies &amp; User Guides</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <div class="hris-topmanu">
  <ul>
   <li><a href="HRISmydetail.php">Basic Details</a></li>
   <li><a href="HRISpositiondetail.php">Position Details</a></li>
   <li><a href="HRIScontactdetail.php">Contact Details</a></li>
   <li><a href="HRISemploymentdetail.php">Employment Details</a></li>
   <li class="active"><a href="HRISeducationdetail.php">Education Details</a></li>
   <li><a href="HRISbankdetail.php">Bank Details</a></li>
   <li><a href="HRISiddetail.php">ID Details</a></li>
  </ul>
  </div>
  <!------>
  <div class="show-contactdetails">
   <div class="basic position">
   <div><strong>EDUCATION DETAILS:</strong>&nbsp;<?php echo $Name; ?></div>
   <div>
    <ul>
     <li class="active"><a href="HRISeducationdetail.php">View</a></li>
     <li><a href="HRISeducationedit.php">Modify</a></li>
    </ul>
  </div>
  </div>
  <!------>
  <!------>
  <div class="showdetail">
   <div class="cdetails"> 
    <table>
     <tr class="col">
      <td>Degree</td>
      <td>Institute Name/Location</td>
      <td>Specialization</td>
      <td>Percentage/Final Grade</td>
      <td>Start Date</td>
      <td>End Date</td>
      <td>Action</td>
     </tr>
     <tr>
      <td><b><?php echo $Education_Qualification; ?></b></td>
      <td><?php echo $InstituteName; ?></td>
      <td><?php echo $Specialization; ?></td>
      <td><?php echo $DegreeFinalGrade; ?></td>
      <td><?php echo $DegreeStartDate; ?></td>
      <td><?php echo $DegreeEndDate; ?></td>
      <td><a href="HRISeducationedit.php" class="edit"></a><a href="#" onClick="delete()" class="delete"></a></td>
     </tr>
     
    </table>
   </div>
  </div>
  <!------------->
   <!------------------>
 </div>
 </div>
 </div>
 </div>
</div> 
<div><?php include 'footer.php'; ?></div>
</body>
</html>