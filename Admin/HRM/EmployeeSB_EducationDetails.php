﻿<?php  
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if(isset($_POST['submit']))
{
   $EmpNo=$_POST['txtEmpNo'];
   $EmpName=$_POST['txtEmpName'];
   $EmpType=$_POST['txtEmpType'];
   $Designation=$_POST['txtDesig'];
   $Exam=$_POST['txtExamination'];
   $Board=$_POST['txtBoard'];
   $Division=$_POST['txtDivision'];
   $YearOfPassing=$_POST['txtYear'];
   $DateOfEntry=$_POST['txtDateOfEntry'];
   $Subjects=$_POST['txtSubjects'];
   $Remarks=$_POST['txtRemarks'];  
    
	mysql_query("INSERT INTO `EmployeeSB_Education`(`EmpID`, `EmpName`, `EmpDepartment`, `EmpDesignation`, `Examination`, `Board`, `Division`, `Year`, `DateOfEntry`, `Subjects`, `Remarks`) VALUES ('$EmpNo','$EmpName','$EmpType','$Designation','$Exam','$Board','$Division','$YearOfPassing','$DateOfEntry','$Subjects','$Remarks')");
   			
		
	  			
	
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Services Book</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<style type="text/css">
.footer {
    height:20px; 
    width: 100%; 
    background-image: none;
    background-repeat: repeat;
    background-attachment: scroll;
    background-position: 0% 0%;
    position: fixed;
    bottom: 2pt;
    left: 0pt;
}   

.footer_contents 

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
}
.style1 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
}
.style2 {
	text-align: center;
}
.style3 {
	font-size: medium;
	color: #FF0000;
}
.style4 {
	font-family: Cambria;
}
</style>


<script language="javascript">


function sname()
{
	document.getElementById("trWait").style.display="";
	document.getElementById("trWait").innerHTML ="Please Wait...";
	var itm;
	try
	{
		itm = new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			itm = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
			try
			{
			itm = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
				alert("Your Browser Broke!");
				return false;
			}
		}
	}
	
	itm.onreadystatechange=function()
		      {
			      if(itm.readyState==4)
			        {
						var rows="";
			        	rows=new String(itm.responseText);
			        	arr_row=rows.split(",");
			        	document.getElementById('txtEmpName').value=arr_row[0];
						document.getElementById('txtEmpType').value=arr_row[1];       	 
						document.getElementById('txtMobile').value=arr_row[2];       	 
						document.getElementById("trWait").style.display="none";
						document.getElementById("trWait").innerHTML ="";						
			        }
		      }
			
			var submiturl="get_info2.php?c=" + document.getElementById('txtEmpNo').value;
			itm.open("GET", submiturl,true);
			itm.send(null);
}



</script>


</head>

<body>
<form name="frmIssue" id="frmIssue" method="post">
<input type="hidden" name="SubmitType" id="SubmitType" value="">
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font face="Cambria">Employee Services Book Education 
	Details</font><font size="3" face="Cambria"></p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

        <img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></b></td>
  </tr>
</table>

<b>

<table class="name" width="100%" cellpadding="0" style="border-collapse: collapse" border="1">
 <tr id="trWait" style="display: none;">
		  <td align="center" style="border-style: solid; border-width: 1px" colspan="8">&nbsp;</td>
 </tr>
 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146">
			<p><b><font face="Cambria">Emp No.</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146"><font face="Cambria">
			<input name="txtEmpNo" id="txtEmpNo" onkeyup="javascript:sname();" style="float: left" value="" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146">
			<p><b><span class="style4">Emp</span><font face="Cambria"> Name</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtEmpName" id="txtEmpName" style="float: left"/ value="" class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147">
			<font face="Cambria"><b>Emp Department</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtEmpType" id="txtEmpType" style="float: left"/ value="" class="text-box"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<p><b>Emp Designation</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<input name="txtDesig" id="txtMobile" style="float: left"/ value="" class="text-box"></font></td>
		  
		
 </tr>
</table>
<font face="Cambria"> 
<br />
</font>
<table class="name" width="100%">
<p align="left">
<font face="Cambria"> 
<br />
</font></p>

<table id="Table1" style="border-style:solid; border-width:1px; border-collapse:collapse" style="border-style: solid; border-width: 1px" width="100%" cellpadding="0">
			<p align="left">&nbsp;<tr>
				<td align="center" style="border-style: solid; border-width: 1px" width="167">
			<b><font face="Cambria">Examination</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167"><b><font face="Cambria">Board</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			Division/CGPA/%</td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167"><b><font face="Cambria">Year Of Passing</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="197"><b><font face="Cambria">Date Of Entry</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133"><b><font face="Cambria">Subjects</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="168">
			<b><font face="Cambria">Remarks</font></b></td>
		  
 </tr>
 
			<td align="center" style="border-style: solid; border-width: 1px" width="167">
			<p>

<b>

			<font face="Cambria">
			<input name="txtExamination" id="txtExamination"  style="float: left"/class="text-box"></font></td>
		  </td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			<input name="txtBoard" id="txtBoard" style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">
			<p>

<b>

			<font face="Cambria">
			<input name="txtDivision" id="txtDivision" style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="167">

<b>

			<font face="Cambria">
			<input name="txtYear" id="txtYear" type=date style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="197"><font face="Cambria">
			<p><b>
			<input name="txtDateOfEntry" id="txtDateOfEntry" type="date" style="float: left" class="text-box"/></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="133"><b><font face="Cambria">
			<input name="txtSubjects" id="txtSubjects" style="float: left" class="text-box"/></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="168">
			<p><b><font face="Cambria">
			<input name="txtRemarks" id="txtRemarks" style="float: left" class="text-box"/></font></td>
		  
 </tr>
 
</table>
</table>
<p>
<br>
</p>
&nbsp;<br />
</p>
&nbsp;<table align="center">
  <tr>  
        <td>
		<p align="center"><font face="Cambria">
		<input name="submit" type="submit" value="Submit" style="font-weight: 700" class="text-box"></font>
		</td>
  </tr>
</table>
<br>
<br>
<br>

<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Examination</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Board</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Division/CGPA</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">Year Of Passing </font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>



		<b><font face="Cambria">Entry Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>

<b>

		<font face="Cambria">Subjects</font>&nbsp;</td>

		<td height="22" align="center" bgcolor="#95C23D" width=65>

<b>

		<font face="Cambria">Remarks</font>&nbsp;</td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_Education ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Examination"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Board"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Division"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Year"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateOfEntry"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Subjects"];?></font></td>
   <td align="center"><font face="Cambria"><?php echo $rs["Remarks"];?></font></td>
	

</tr>
<?php   	 
}
?>
</table>


</div>


</form>
<font face="Cambria"><br>

</font>



<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>
</html>
