<?php  
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
?>
<?php
$EmpNo=$_REQUEST["txtEmpNo"];
$EmployeeId=$_SESSION['userid'];

if ($EmpNo!="" || $EmployeeId!="" )
{
	$ssql="SELECT `srno`, `EmpId`, `Name`, date_format(`DOB`,'%d-%m-%Y') as `DOB`, `Gender`, `Category`, `Nationality`, date_format(`DOB`,'%d-%m-%Y') as `DOJ`, `LastSchool`, `employeetype`, `ClassTeacher`, `Education_Qualification`, `FatherName`, `Salary`, `Allowances`, `Address`, `MobileNo`, `Imei`, `UserId`, `Password`, `email`, `role`, `status`, `L1_Approver_Id`, `Department`, `Designation`, `PayBand`, `TeachingSubject`, `MaritalStatus`, `HusbandName`, `AnniversaryDate`, `DateTime`, `DesigOrder` FROM `employee_master` WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ";
	$rs= mysql_query($ssql);
	while($row = mysql_fetch_row($rs))
	{
					//$srno=$row[0];
					$empname=$row[2];
					$fathername=$row[12];
					$Address=$row[15];
					
					//yyyy-mm-dd
					//mm/dd/yyyy
					$arr=explode('-',$DOB);
					$DOB=  $arr[1]. "/" . $arr[2] . "/" . $arr[0];
	
	                $arrdoj=explode('-',$DOJ);
					$DOJ=  $arrdoj[1]. "/" . $arrdoj[2] . "/" . $arrdoj[0];

					
					$RetirementDate="To be Filled";
					$EduQuali=$row[11];
					
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DPS Faridabad</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
<div id="container">
<link rel="stylesheet" href="../../Bootstrap/bootstrap.min.css">
  <script src="../../Bootstrap/jquery.min.js"></script>
  <script src="../../Bootstrap/bootstrap.min.js"></script>
<style type="text/css">
body{font-family:Arial !important; height:auto;}
.logo{border-bottom:1px dotted #0b462d;} .logo div{margin:0.5% 0;}
.logo .img-responsive{width:30%; margin:0.5%;}
.col-xs-3, .col-xs-2{padding:0.5% 1%; font-size:14px;}
.h{font-size:15px; font-weight:700; padding:0 2%;}
.table1, .table2, .table3, .table4, .table5, .table6, .table7, .table8, .table9, .table10, .table11, .table12, .table13{width:100%; height:auto; padding:0 2%;} .table-top{width:100%; padding:0 2%;} .table-top table{width:48%; float:left;} .table-top table td:nth-child(even){width:10px;} 
.table-top table td{width:48%; padding:0.5%;} .tb{width:100%; padding:0 2%;} .tb table{width:100%;} .tb table td{padding:0.5% 0;}
.table1 table, .table2 table, .table3 table, .table4 table, .table5 table, .table6 table, .table7 table, .table8 table, .table9 table, .table10 table, .table11 table, .table12 table, .table13 table{width:100%; height:auto;} .table-top table td:last-child{ padding-left:2%;}
.table1 table .col td, .table2 table .col td, .table3 table .col td, .table4 table .col td, .table5 table .col td, .table6 table .col td,
.table7 table .col td, .table8 table .col td, .table9 table .col td, .table10 table .col td, .table11 table .col td, .table12 table .col td,
.table13 table .col td{background:#0b462d; color:#fff; font-size:14px; padding:0.5% 1%; border:1px solid #ccc;}
.table1 table td, .table2 table td, .table3 table td, .table4 table td, .table5 table td, .table6 table td, .table7 table td, .table8 table td,
.table9 table td, .table10 table td, .table11 table td, .table12 table td, .table13 table td{padding:0.3% 1%; border:1px solid #0b462d; font-size:13px;}
.container1{margin:2% 0; border-top:1px solid #0b462d; height:350px;}
.nav{width:20%; float:left; border-right:1px solid #0b462d;} .nav li{ height:10%; width:269px;} .nav li.active a{border:none!important; background:#eaeaea;}
.tab-content{width:80%; float:left; margin-top:2%;} .nav li a{color:black; padding:6px 15px;} .nav li.active{background:#ccc; border:1px solid #ccc!important;}
div.active{background:none;} .ddiframeshim{height:0;}
</style>
<div style="border-bottom:1px dotted #0b462d; margin:1% 0 0 0; padding:0.5%;" ><b>Employee Service Book</b></div>
 <div class="logo">
  <div align="center"><img src="../images/dpslogo.png" height="91" width="364" class="img-responsive"></div>
  <div align="center"><b>Sector 19, Mathura Road, Faridabad (Haryana)</b></div>
  <div align="center"><b>0129-2280522, 2290522,8744078558</b></div>
 </div>
 <div class="h" align="center"><u><b>Employee Service Book</b></u></div>
 <div align="center"><b>Session 2015 - 16</b></div>
 <div>&nbsp;</div>
 <div class="table-top" id="table-top">
  <table>
   <tr> <td><b>01. &nbsp;Name of Employee</b></td><td><b>:</b></td><td><?php echo $empname; ?></td> </tr>
   <tr> <td><b>03. &nbsp;Address (Local)</b></td><td><b>:</b></td><td><?php echo $Address; ?></td> </tr>
   <tr> <td><b>05. &nbsp;Date of Birth</b></td><td><b>:</b></td><td><?php echo $DOB; ?></td> </tr>
   <tr> <td><b>07. &nbsp;Date of Retirement</b></td><td><b>:</b></td><td>&nbsp;</td> </tr>
   <tr> <td><b>10. &nbsp;Type of appointment held</b></td><td><b>:</b></td><td>&nbsp;</td> </tr>
  </table>
  <table>
   <tr> <td><b>02. &nbsp;Father's/Husband's Name</b></td><td><b>:</b></td><td><?php echo $fathername; ?></td> </tr>
   <tr> <td><b>04. &nbsp;Address (Permanent)</b></td><td><b>:</b></td><td><?php echo $Address; ?></td> </tr>
   <tr> <td><b>06. &nbsp;Date of Appointment</b></td><td><b>:</b></td><td><?php echo $DOJ; ?></td> </tr>
   <tr> <td><b>08. &nbsp;Educational Qualification</b></td><td><b>:</b></td><td><?php echo $EduQuali; ?></td> </tr>
   <tr> <td><b>&nbsp;</b></td><td>&nbsp;</td><td>&nbsp;</td> </tr>
  </table>
 </div>
 <div class="tb">
  <table>
   <tr> <td style="width:50px;"><b>11.</b></td> <td><b>a)Change of address w.e.f. &nbsp; :</b>&nbsp;</td> 
   		 <td><b>b)Change of address w.e.f. &nbsp; :</b>&nbsp;</td> 
         <td><b>c)Change of address w.e.f. &nbsp; :</b>&nbsp;</td> </tr>
  </table>
 </div>
 <!-----------------Table------------->
<div class="container1" id="container1">
  <ul class="nav nav-tabs" id="head">
    <li class="active"><a  href="#home">12.Other Special achievements</a></li>
    <li><a href="#table2">13.Physical Attributes :</a></li>
    <li><a href="#table3">14.Educational Qualification </a></li>
    <li><a href="#table4">15.Details of Previous Experiences</a></li>
    <li><a href="#table5">16.Details of Family</a></li>
    <li><a href="#table6">17.Nomination of Provident Fund.</a></li>
    <li><a href="#table7">18.Record of Posts Held </a></li>
    <li><a href="#table8">19.Record of Jobs  </a></li>
    <li><a href="#table9">20.Training Record of Program <!---Workshop/Seminar Attended--> </a></li>
    <li><a href="#table10">21.Record of Deputation </a></li>
    <li><a href="#table11">22.Record of L.T.C. </a></li>
    <li><a href="#table12">23.Record of Leave </a></li>
   <li><a href="#table13">24.Record for LWP </a></li>
  </ul>
<!---------------Tables--------------------->
  <div class="tab-content" id="table">
 <!---------------table1-------------->
    <div id="home" class="tab-pane fade in active">
      <div class="h">12. &nbsp;<u>Other Special achievements if any :</u></div>
 <div>&nbsp;</div>
 <div class="table1">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Area of Achievement</td>
    <td>Achievement Date</td>
    <td>Achievement Detail</td>
    <td>Date Of Entry</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_Achievement WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td><?php echo $rs["srno"]; ?> </td>
	<td><?php echo $rs["EmpID"];?> </td>
    <td><?php echo $rs["EmpName"];?> </td>
	<td><?php echo $rs["EmpDepartment"];?> </td>
	<td><?php echo $rs["EmpDesignation"];?> </td>
	<td><?php echo $rs["AreaofAchievement"];?> </td>
	<td><?php echo $rs["AchievementDate"];?> </td>
	<td><?php echo $rs["AchievementDetails"];?> </td>
	<td><?php echo $rs["DateofEntry"];?> </td>
</tr>
<?php   	 
}
?>
  </table>
 </div>
    </div>
  <!---------------table2-------------->
    <div id="table2" class="tab-pane fade">
      <div class="h">13. &nbsp;<u>Physical Attributes :</u></div>
      <div class="table2">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Height</td>
    <td>Weight</td>
    <td>Personal Identification</td>
    <td>Entry Date</td>
    <td>Finger Impression</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_PhysicalAttributes WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["Height"];?> </td>
	<td> <?php echo $rs["Weight"];?> </td>
	<td> <?php echo $rs["PersonalIdentification"];?> </td>
	<td> <?php echo $rs["DateofEntry"];?> </td>
	<td> <?php echo $rs["FingerInspiration"];?> </td>
</tr>
<?php   	 
}
?>
  </table>
 </div>
    </div>
  <!---------------table3-------------->
    <div id="table3" class="tab-pane fade">
      <div class="h">14. &nbsp;<u>Educational Qualification :</u></div>
 <div>&nbsp;</div>
 <div class="table3">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Examination</td>
    <td>Board</td>
    <td>Division/CGPA</td>
    <td>Year Of Passing</td>
    <td>Entry Date</td>
    <td>Subjects </td>
    <td>Remarks</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_Education WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["Examination"];?> </td>
	<td> <?php echo $rs["Board"];?> </td>
	<td> <?php echo $rs["Division"];?> </td>
	<td> <?php echo $rs["Year"];?> </td>
	<td> <?php echo $rs["DateOfEntry"];?> </td>
	<td> <?php echo $rs["Subjects"];?> </td>
   <td> <?php echo $rs["Remarks"];?> </td>
	

</tr>
<?php   	 
}
?>
  </table>
 </div>
    </div>
  <!---------------table4-------------->   
    <div id="table4" class="tab-pane fade">
     <div class="h">15. &nbsp;<u>Details of Previous Experiences :</u></div>
 <div>&nbsp;</div>
 <div class="table4">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Organization Name</td>
    <td>Period From</td>
    <td>Period To</td>
    <td>Class Taught</td>
    <td>Subjects Taught</td>
    <td>Date Of Entry </td>
    <td>Remarks</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_Experiecnce WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["NameOfInstitution"];?> </td>
	<td> <?php echo $rs["PeriodFrom"];?> </td>
	<td> <?php echo $rs["PeriodTo"];?> </td>
	<td> <?php echo $rs["ClassTaught"];?> </td>
	<td> <?php echo $rs["SubjectsTaught"];?> </td>
	<td> <?php echo $rs["DateOfEntry"];?> </td>
   <td> <?php echo $rs["Remarks"];?> </td>
	

</tr>
<?php   	 
}
?>
  </table>
 </div>
    </div>
  <!---------------table5-------------->
    <div id="table5" class="tab-pane fade">
      <div class="h">16. &nbsp;<u>Details of Family :</u></div>
 <div>&nbsp;</div>
 <div class="table5">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Family Member Name</td>
    <td>Gender</td>
    <td>Age of Family Member</td>
    <td>Remarks</td>
    <td>Entry Date</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_FamilyDetails WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["FamilyMemberName"];?> </td>
	<td> <?php echo $rs["Gender"];?> </td>
	<td> <?php echo $rs["Age"];?> </td>
	<td> <?php echo $rs["Remarks"];?> </td>
	<td> <?php echo $rs["DateofEntry"];?> </td>
</tr>
<?php   	 
}
?>
  </table>
 </div>
    </div>
  <!---------------table6-------------->
    <div id="table6" class="tab-pane fade">
      <div class="h">17. &nbsp;<u>Nomination of Provident Fund/Gratuity. :</u></div>
 <div style="padding:0 5%;"><p>I hereby direct that the amount at my credit in the school Teachers Provident Fund Trust/Gratuity due to me under the rules, at the time of my death shall be distributed among the members of my family mentioned below in the manner shown against their names.</p></div>
 <div>&nbsp;</div>
 <div class="table6">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Nominee Name</td>
    <td>Nominee Address</td>
    <td>Relationship With Nominee</td>
    <td>Nominee Age</td>
    <td>Accumulation Amoun</td>
    <td>Entry Date</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_PFNominee WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["NameofNominee"];?> </td>
	<td> <?php echo $rs["AddressofNominee"];?> </td>
	<td> <?php echo $rs["Relationship"];?> </td>
	<td> <?php echo $rs["AgeofNominee"];?> </td>
	<td> <?php echo $rs["Amount"];?> </td>
	<td> <?php echo $rs["DateofEntry"];?> </td>


</tr>
<?php   	 
}
?>
  </table>
 </div>
    </div>
  <!---------------table7-------------->
    <div id="table7" class="tab-pane fade">
      <div class="h">18. &nbsp;<u>Record of Posts Held :</u></div>
 <div>&nbsp;</div>
 <div class="table7">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Appointment Date</td>
    <td>Position</td>
    <td>Matching Job</td>
    <td>Pay Scale</td>
    <td>Basic Pay</td>
    <td>Grade Pay</td>
    <td>Allowances</td>
    <td>Gross Pay</td>
    <td>Level</td>    
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_PostsHeld WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId'");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["DateofApportionment"];?> </td>
	<td> <?php echo $rs["Position"];?> </td>
	<td> <?php echo $rs["MatchingJob"];?> </td>
	<td> <?php echo $rs["PayScale"];?> </td>
	<td> <?php echo $rs["BasicPay"];?> </td>
	<td> <?php echo $rs["GradePay"];?> </td>
	<td> <?php echo $rs["Allowances"];?> </td>
	<td> <?php echo $rs["TotalGrossPay"];?> </td>
	<td> <?php echo $rs["Level"];?> </td>
</tr>
<?php   	 
}
?>
  </table>
 </div>
    </div>
  <!---------------table8-------------->
    <div id="table8" class="tab-pane fade">
      <div class="h">19. &nbsp;<u>Record of Jobs of Special Responsibility Held :</u></div>
 <div>&nbsp;</div>
 <div class="table8">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Post Held</td>
    <td>Date From</td>
    <td>Date To</td>
    <td>Allowances Draw</td> 
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_SpecialResponsibilities WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId'");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["PostHeld"];?> </td>
	<td> <?php echo $rs["DateFrom"];?> </td>
	<td> <?php echo $rs["DateTo"];?> </td>
	<td> <?php echo $rs["SAD"];?> </td>
	
</tr>
<?php   	 
}
?>
  </table>
 </div>
    </div>
  <!---------------table9-------------->
    <div id="table9" class="tab-pane fade">
      <div class="h">20. &nbsp;<u>Training Record of Program (s) Workshop (s)/Seminar (s) Attended :</u></div>
 <div>&nbsp;</div>
 <div class="table9">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Training Date</td>
    <td>Topic</td>
    <td>Venue</td>
    <td>Training Duration</td>
    <td>Organization Name</td>
    <td>Entry Date</td> 
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_TrainingDetails WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId'");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["TrainingDate"];?> </td>
	<td> <?php echo $rs["Topic"];?> </td>
	<td> <?php echo $rs["Venue"];?> </td>
	<td> <?php echo $rs["Duration"];?> </td>
	<td> <?php echo $rs["NameOfInstitution"];?> </td>
	<td> <?php echo $rs["DateOfEntry"];?> </td>
	

</tr>
<?php   	 
}
?>
  </table>
 </div>
    </div>
  <!---------------table10-------------->
    <div id="table10" class="tab-pane fade">
      <div class="h">21. &nbsp;<u>Record of Deputation :</u></div>
 <div>&nbsp;</div>
 <div class="table10">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Deputation Job</td>
    <td>Period From</td>
    <td>Period To</td>
    <td>Organization Name </td>
    <td>Date Of Entry</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_Deputation WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId'  ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["DeputationJob"];?> </td>
	<td> <?php echo $rs["FromDate"];?> </td>
	<td> <?php echo $rs["ToDate"];?> </td>
	<td> <?php echo $rs["NameOfOrganization"];?> </td>
	<td> <?php echo $rs["DateOfEntry"];?> </td>
	

</tr>
<?php   	 
}
?>
  </table>
 </div>
    </div>
  <!---------------table11-------------->
    <div id="table11" class="tab-pane fade">
      <div class="h">22. &nbsp;<u>Record of L.T.C. :</u></div>
 <div>&nbsp;</div>
 <div class="table11">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Period From</td>
    <td>Period To</td>
    <td>Days </td>
    <td>Type of L.T.C.</td>
    <td>Service Tenure</td>
    <td>Amount</td>
    <td>Amount</td>
    <td>Service Remarks</td>
    <td>Entry Date</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_LTC  WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["FromDate"];?> </td>
	<td> <?php echo $rs["ToDate"];?> </td>
	<td> <?php echo $rs["Days"];?> </td>
	<td> <?php echo $rs["TypeofLTC"];?> </td>
	<td> <?php echo $rs["BlockofYears"];?> </td>
	<td> <?php echo $rs["Amount"];?> </td>
	<td> <?php echo $rs["ActualClaim"];?> </td>
	<td> <?php echo $rs["Remarks"];?> </td>
   <td> <?php echo $rs["DateofEntry"];?> </td>
	

</tr>
<?php   	 
}
?>
  </table>
 </div>
    </div>
  <!---------------table12-------------->
    <div id="table12" class="tab-pane fade">
      <div class="h">23. &nbsp;<u>Record of Maternity/Medical Leave :</u></div>
 <div>&nbsp;</div>
 <div class="table12">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Period From</td>
    <td>Period To</td>
    <td>Days </td>
    <td>Type of Appointment</td>
    <td>Service Tenure</td>
    <td>Service Remarks</td>
    <td>Entry Date</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_MedicalLeave  WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["FromDate"];?> </td>
	<td> <?php echo $rs["ToDate"];?> </td>
	<td> <?php echo $rs["Days"];?> </td>
	<td> <?php echo $rs["TypeofAppointment"];?> </td>
	<td> <?php echo $rs["LengthofService"];?> </td>
	<td> <?php echo $rs["Remarks"];?> </td>
    <td> <?php echo $rs["DateofEntry"];?> </td>
	

</tr>
<?php   	 
}
?>
  </table>
 </div>
    </div>
  <!---------------table13-------------->
    <div id="table13" class="tab-pane fade">
      <div class="h">24. &nbsp;<u>Record for LWP :</u></div>
 <div>&nbsp;</div>
 <div class="table13">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Period From</td>
    <td>Period To</td>
    <td>Days </td>
    <td>Total Days of LOP</td>
    <td>Service Remarks</td>
    <td>Entry Date</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_LWP WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["FromDate"];?> </td>
	<td> <?php echo $rs["ToDate"];?> </td>
	<td> <?php echo $rs["Days"];?> </td>
	<td> <?php echo $rs["DaysofLossPay"];?> </td>
	<td> <?php echo $rs["Remarks"];?> </td>
    <td> <?php echo $rs["DateofEntry"];?> </td>
	

</tr>
<?php   	 
}
?>
  </table>
 </div>
    </div>
  </div>
  <div>&nbsp;</div>
  <div>&nbsp;</div>  
   <!-- <hr>
    <p class="act"><b>Active Tab</b>: <span></span></p>
    <p class="prev"><b>Previous Tab</b>: <span></span></p>-->
</div>	

 
<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
    $('.nav-tabs a').on('shown.bs.tab', function(event){
        var x = $(event.target).text();         // active tab
        var y = $(event.relatedTarget).text();  // previous tab
        $(".act span").text(x);
        $(".prev span").text(y);
    });
});
</script>
<!----------fOR PRINT---->
<div id="container2" style="display:none">
<div>&nbsp;</div>
<div class="h">12. &nbsp;<u>Other Special achievements if any :</u></div>
 <div>&nbsp;</div>
 <div class="table1">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Area of Achievement</td>
    <td>Achievement Date</td>
    <td>Achievement Detail</td>
    <td>Date Of Entry</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_Achievement WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td><?php echo $rs["srno"]; ?> </td>
	<td><?php echo $rs["EmpID"];?> </td>
    <td><?php echo $rs["EmpName"];?> </td>
	<td><?php echo $rs["EmpDepartment"];?> </td>
	<td><?php echo $rs["EmpDesignation"];?> </td>
	<td><?php echo $rs["AreaofAchievement"];?> </td>
	<td><?php echo $rs["AchievementDate"];?> </td>
	<td><?php echo $rs["AchievementDetails"];?> </td>
	<td><?php echo $rs["DateofEntry"];?> </td>
</tr>
<?php   	 
}
?>
  </table>
 </div>
 <div>&nbsp;</div>
 <div class="h">13. &nbsp;<u>Other Remarks :</u></div>
 <div>&nbsp;</div>
 <div class="h">14. &nbsp;<u>Physical Attributes :</u></div>
 <div>&nbsp;</div>
      <div class="table2">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Height</td>
    <td>Weight</td>
    <td>Personal Identification</td>
    <td>Entry Date</td>
    <td>Finger Impression</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_PhysicalAttributes WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["Height"];?> </td>
	<td> <?php echo $rs["Weight"];?> </td>
	<td> <?php echo $rs["PersonalIdentification"];?> </td>
	<td> <?php echo $rs["DateofEntry"];?> </td>
	<td> <?php echo $rs["FingerInspiration"];?> </td>
</tr>
<?php   	 
}
?>
  </table>
 </div>
 <div>&nbsp;</div>
 <div class="h">15. &nbsp;<u>Signature of the employee with date (To be re-attested after every five years) :</u></div>
 <div>&nbsp;</div>
 <div class="h">16. &nbsp;<u>Signature with Seal of Attesting Officer/Principal :</u></div>
 <div>&nbsp;</div>
 <div class="h">17. &nbsp;<u>Educational Qualification :</u></div>
 <div>&nbsp;</div>
 <div class="table3">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Examination</td>
    <td>Board</td>
    <td>Division/CGPA</td>
    <td>Year Of Passing</td>
    <td>Entry Date</td>
    <td>Subjects </td>
    <td>Remarks</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_Education WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["Examination"];?> </td>
	<td> <?php echo $rs["Board"];?> </td>
	<td> <?php echo $rs["Division"];?> </td>
	<td> <?php echo $rs["Year"];?> </td>
	<td> <?php echo $rs["DateOfEntry"];?> </td>
	<td> <?php echo $rs["Subjects"];?> </td>
   <td> <?php echo $rs["Remarks"];?> </td>
	

</tr>
<?php   	 
}
?>
  </table>
 </div>
 <div>&nbsp;</div>
 <div class="h">18. &nbsp;<u>Details of Previous Experiences :</u></div>
 <div>&nbsp;</div>
 <div class="table4">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Organization Name</td>
    <td>Period From</td>
    <td>Period To</td>
    <td>Class Taught</td>
    <td>Subjects Taught</td>
    <td>Date Of Entry </td>
    <td>Remarks</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_Experiecnce WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["NameOfInstitution"];?> </td>
	<td> <?php echo $rs["PeriodFrom"];?> </td>
	<td> <?php echo $rs["PeriodTo"];?> </td>
	<td> <?php echo $rs["ClassTaught"];?> </td>
	<td> <?php echo $rs["SubjectsTaught"];?> </td>
	<td> <?php echo $rs["DateOfEntry"];?> </td>
   <td> <?php echo $rs["Remarks"];?> </td>
	

</tr>
<?php   	 
}
?>
  </table>
 </div>
 <div>&nbsp;</div>
 <div class="h">19. &nbsp;<u>Details of Family :</u></div>
 <div>&nbsp;</div>
 <div class="table5">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Family Member Name</td>
    <td>Gender</td>
    <td>Age of Family Member</td>
    <td>Remarks</td>
    <td>Entry Date</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_FamilyDetails WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["FamilyMemberName"];?> </td>
	<td> <?php echo $rs["Gender"];?> </td>
	<td> <?php echo $rs["Age"];?> </td>
	<td> <?php echo $rs["Remarks"];?> </td>
	<td> <?php echo $rs["DateofEntry"];?> </td>
</tr>
<?php   	 
}
?>
  </table>
 </div>
 <div>&nbsp;</div>
 <div class="h">20. &nbsp;<u>Nomination of Provident Fund/Gratuity. :</u></div>
 <div style="padding:0 5%;"><p>I hereby direct that the amount at my credit in the school Teachers Provident Fund Trust/Gratuity due to me under the rules, at the time of my death shall be distributed among the members of my family mentioned below in the manner shown against their names.</p></div>
 <div>&nbsp;</div>
 <div class="table6">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Nominee Name</td>
    <td>Nominee Address</td>
    <td>Relationship With Nominee</td>
    <td>Nominee Age</td>
    <td>Accumulation Amoun</td>
    <td>Entry Date</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_PFNominee WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["NameofNominee"];?> </td>
	<td> <?php echo $rs["AddressofNominee"];?> </td>
	<td> <?php echo $rs["Relationship"];?> </td>
	<td> <?php echo $rs["AgeofNominee"];?> </td>
	<td> <?php echo $rs["Amount"];?> </td>
	<td> <?php echo $rs["DateofEntry"];?> </td>


</tr>
<?php   	 
}
?>
  </table>
 </div>
 <div>&nbsp;</div>
 <div class="h">21.Record of Posts Held :</div>
 <div>&nbsp;</div>
 <div class="table7">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Appointment Date</td>
    <td>Position</td>
    <td>Matching Job</td>
    <td>Pay Scale</td>
    <td>Basic Pay</td>
    <td>Grade Pay</td>
    <td>Allowances</td>
    <td>Gross Pay</td>
    <td>Level</td>    
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_PostsHeld WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId'");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["DateofApportionment"];?> </td>
	<td> <?php echo $rs["Position"];?> </td>
	<td> <?php echo $rs["MatchingJob"];?> </td>
	<td> <?php echo $rs["PayScale"];?> </td>
	<td> <?php echo $rs["BasicPay"];?> </td>
	<td> <?php echo $rs["GradePay"];?> </td>
	<td> <?php echo $rs["Allowances"];?> </td>
	<td> <?php echo $rs["TotalGrossPay"];?> </td>
	<td> <?php echo $rs["Level"];?> </td>
</tr>
<?php   	 
}
?>
  </table>
 </div>
 <div>&nbsp;</div>
 <div class="h">22. &nbsp;<u>Record of Jobs of Special Responsibility Held :</u></div>
 <div>&nbsp;</div>
 <div class="table8">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Post Held</td>
    <td>Date From</td>
    <td>Date To</td>
    <td>Allowances Draw</td> 
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_SpecialResponsibilities WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId'");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["PostHeld"];?> </td>
	<td> <?php echo $rs["DateFrom"];?> </td>
	<td> <?php echo $rs["DateTo"];?> </td>
	<td> <?php echo $rs["SAD"];?> </td>
	
</tr>
<?php   	 
}
?>
  </table>
 </div>
 <div>&nbsp;</div>
 <div class="h">23. &nbsp;<u>Training Record of Program (s) Workshop (s)/Seminar (s) Attended :</u></div>
 <div>&nbsp;</div>
 <div class="table9">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Training Date</td>
    <td>Topic</td>
    <td>Venue</td>
    <td>Training Duration</td>
    <td>Organization Name</td>
    <td>Entry Date</td> 
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_TrainingDetails WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId'");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["TrainingDate"];?> </td>
	<td> <?php echo $rs["Topic"];?> </td>
	<td> <?php echo $rs["Venue"];?> </td>
	<td> <?php echo $rs["Duration"];?> </td>
	<td> <?php echo $rs["NameOfInstitution"];?> </td>
	<td> <?php echo $rs["DateOfEntry"];?> </td>
	

</tr>
<?php   	 
}
?>
  </table>
 </div>
 <div>&nbsp;</div>
 <div class="h">24. &nbsp;<u>Record of Deputation :</u></div>
 <div>&nbsp;</div>
 <div class="table10">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Deputation Job</td>
    <td>Period From</td>
    <td>Period To</td>
    <td>Organization Name </td>
    <td>Date Of Entry</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_Deputation WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId'  ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["DeputationJob"];?> </td>
	<td> <?php echo $rs["FromDate"];?> </td>
	<td> <?php echo $rs["ToDate"];?> </td>
	<td> <?php echo $rs["NameOfOrganization"];?> </td>
	<td> <?php echo $rs["DateOfEntry"];?> </td>
	

</tr>
<?php   	 
}
?>
  </table>
 </div>
 <div>&nbsp;</div>
 <div class="h">25. &nbsp;<u>Earned Leave Account :</u></div>
 <div>&nbsp;</div>
 <div class="h">26. &nbsp;<u>Half Pay Leave Account :</u></div>
 <div>&nbsp;</div>
 <div class="h">27. &nbsp;<u>Record of L.T.C. :</u></div>
 <div>&nbsp;</div>
 <div class="table11">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Period From</td>
    <td>Period To</td>
    <td>Days </td>
    <td>Type of L.T.C.</td>
    <td>Service Tenure</td>
    <td>Amount</td>
    <td>Amount</td>
    <td>Service Remarks</td>
    <td>Entry Date</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_LTC  WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["FromDate"];?> </td>
	<td> <?php echo $rs["ToDate"];?> </td>
	<td> <?php echo $rs["Days"];?> </td>
	<td> <?php echo $rs["TypeofLTC"];?> </td>
	<td> <?php echo $rs["BlockofYears"];?> </td>
	<td> <?php echo $rs["Amount"];?> </td>
	<td> <?php echo $rs["ActualClaim"];?> </td>
	<td> <?php echo $rs["Remarks"];?> </td>
   <td> <?php echo $rs["DateofEntry"];?> </td>
	

</tr>
<?php   	 
}
?>
  </table>
 </div>
 <div>&nbsp;</div>
 <div class="h">28. &nbsp;<u>Record of Maternity/Medical Leave :</u></div>
 <div>&nbsp;</div>
 <div class="table12">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Period From</td>
    <td>Period To</td>
    <td>Days </td>
    <td>Type of Appointment</td>
    <td>Service Tenure</td>
    <td>Service Remarks</td>
    <td>Entry Date</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_MedicalLeave  WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["FromDate"];?> </td>
	<td> <?php echo $rs["ToDate"];?> </td>
	<td> <?php echo $rs["Days"];?> </td>
	<td> <?php echo $rs["TypeofAppointment"];?> </td>
	<td> <?php echo $rs["LengthofService"];?> </td>
	<td> <?php echo $rs["Remarks"];?> </td>
    <td> <?php echo $rs["DateofEntry"];?> </td>
	

</tr>
<?php   	 
}
?>
  </table>
 </div>
 <div>&nbsp;</div>
 <div class="h">29. &nbsp;<u>Record for LWP :</u></div>
 <div>&nbsp;</div>
 <div class="table13">
  <table>
   <tr class="col">
    <td>Sr. No.</td>
    <td>Employee ID.</td>
    <td>Name</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Period From</td>
    <td>Period To</td>
    <td>Days </td>
    <td>Total Days of LOP</td>
    <td>Service Remarks</td>
    <td>Entry Date</td>
   </tr>
   <?php
$result=mysql_query("select * from EmployeeSB_LWP WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td> <?php echo $rs["srno"]; ?> </td>
	<td> <?php echo $rs["EmpID"];?> </td>
    <td> <?php echo $rs["EmpName"];?> </td>
	<td> <?php echo $rs["EmpDepartment"];?> </td>
	<td> <?php echo $rs["EmpDesignation"];?> </td>
	<td> <?php echo $rs["FromDate"];?> </td>
	<td> <?php echo $rs["ToDate"];?> </td>
	<td> <?php echo $rs["Days"];?> </td>
	<td> <?php echo $rs["DaysofLossPay"];?> </td>
	<td> <?php echo $rs["Remarks"];?> </td>
    <td> <?php echo $rs["DateofEntry"];?> </td>
	

</tr>
<?php   	 
}
?>
  </table>
 </div>
</div>
<p align="center" style="margin-top:5.4%; border-bottom:1px solid #0b462d; margin-bottom:1px;"><a href="Javascript:printDiv();" ><u>PRINT</u></a></p>
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("container").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
		document.getElementById("container2").style.display = "block";
		document.getElementById("container1").style.display = "none";
		
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>
</body>
</html>
