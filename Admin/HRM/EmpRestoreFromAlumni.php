﻿<?php
session_start();
include '../../connection.php';
?>
<?php
$EmpId=$_REQUEST["EmpId"];
$ssql = "INSERT INTO `employee_master`(`EmpId`, `Name`, `DOB`, `Gender`, `Category`, `Nationality`, `DOJ`, `LastSchool`, `employeetype`, `ClassTeacher`, `Education_Qualification`, `FatherName`, `Salary`, `Allowances`, `Address`, `MobileNo`, `Imei`, `UserId`, `Password`, `email`, `role`, `status`, `L1_Approver_Id`, `L2_Approver_Id`, `L3_Approver_Id`, `Department`, `Designation`, `PayBand`, `TeachingSubject`, `MaritalStatus`, `HusbandName`, `AnniversaryDate`, `DateTime`, `DesigOrder`)SELECT `EmpId`, `Name`, `DOB`, `Gender`, `Category`, `Nationality`, `DOJ`, `LastSchool`, `employeetype`, `ClassTeacher`, `Education_Qualification`, `FatherName`, `Salary`, `Allowances`, `Address`, `MobileNo`, `Imei`, `UserId`, `Password`, `email`, `role`, `status`, `L1_Approver_Id`, `L2_Approver_Id`, `L3_Approver_Id`, `Department`, `Designation`, `PayBand`, `TeachingSubject`, `MaritalStatus`, `HusbandName`, `AnniversaryDate`, `DateTime`, `DesigOrder` FROM `employee_alumni` where `EmpId`='$EmpId'";
mysql_query($ssql) or die(mysql_error());
//echo $ssql;
//exit();
$ssql = "delete FROM `employee_alumni` where `EmpId`='$EmpId'";
mysql_query($ssql) or die(mysql_error());
echo "<br><br><center><b>Employee:".$EmpId." has been restored to employee master";
?>
