<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php

$ssql="SELECT `srno`,`feeshead`,`datetime` FROM `fees_head_master` order by `srno`";
$rs= mysql_query($ssql);$num_rows=0;
if($_REQUEST["cboMasterClass"] !="")
{

  
  $FeesHead=$_POST["cboFeesHead"];
   $FYYear=$_POST["cboFinancialYear"];
 //echo "INSERT INTO `fees_master`(`feeshead`, `class`, `amount`, `quarter`, `financialyear`) VALUES ('$FeesHead','$MasterClass','$Amount','','$FYYear')";
 //exit();
  //echo "INSERT INTO `fees_master`(`feeshead`, `class`, `amount`, `quarter`, `financialyear`,`status`) VALUES ('$FeesHead','$MasterClass','$Amount','','$FYYear',1)";die;
 $rsFeeHead=mysql_query("INSERT INTO `fees_head_master`(`feeshead`,`status`) VALUES ('$FeesHead',1)");
 echo "<br><br><center><b>Fee Head defined successfully!<b>";

 }  
?>
<script language="javascript">

function Validate()
{

	if (document.getElementById("cboMasterClass").value == "Select One")
	{
		alert ("CLass is mandatory!");
		return;
	}
	if(document.getElementById("cboFeesHead").value=="Select One")
	{
		alert("Fee Head is mandatory!");
		return;
	}
	
	document.getElementById("frmFeesHeadMaster").submit();

}




function ShowEdit(SrNo)
{	
	var myWindow = window.open("EditStudentMaster.php?srno=" + SrNo ,"","width=300,height=400");
}


</script>

<html>
<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<title>Fees Master</title>

<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">

.style1 {

	font-family: Cambria;

	font-weight: bold;

	font-size: 18px;

	color: #000000;

}

.style2 {

	border-collapse: collapse;

	border-style: solid;

	border-width: 1px;

}

.style3 {

	text-decoration: none;

}

.style4 {

	font-family: Cambria;

	font-size: 15px;

	color: #000000;

	font-weight: bold;

}
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

.style5 {

	border-right-style: solid;

	border-right-width: 1px;

}

.style6 {

	border-left-style: solid;

	border-left-width: 1px;

}

.style7 {

	border-left-style: solid;

	border-left-width: 1px;

	text-align: center;

}

.style8 {

	text-align: center;

	border-top-style: solid;

	border-top-width: 1px;

}

.style9 {

	font-family: Cambria;

	font-size: 15px;

	color: #FFFFFF;

}

.style10 {

	border-bottom-style: solid;

	border-bottom-width: 1px;

}

.style11 {

	border-right-style: solid;

	border-right-width: 1px;

	border-bottom-style: solid;

	border-bottom-width: 1px;

}

.style12 {

	border-left-style: solid;

	border-left-width: 1px;

	border-bottom-style: solid;

	border-bottom-width: 1px;

}

.auto-style20 {
	border-collapse: collapse;
	border-width: 0px;
	font-size: medium;
}

.auto-style22 {
	color: #000000;
}
.auto-style23 {
	border: medium none #FFFFFF;
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
	text-align: left;
	background-color: #FFFFFF;
}

.auto-style3 {
	border-style: solid;
	border-width: 0px;
	text-align: center;
	color: #000000;
}
.auto-style6 {
	color: #DAB9C1;
}

.auto-style24 {
	border-style: none;
	border-width: medium;
}
.auto-style25 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 0px;
}

</style>

</head>
<body>
<table width="100%" cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style25">
	<tr>
		<td  bgcolor="#000000" bordercolor="#FFFFFF" bordercolordark="#FFFFFF" bordercolorlight="#FFFFFF" class="auto-style24">

<table width="100%" cellspacing="0" bordercolor="#000000" id="table_11" class="auto-style20" style="height: 33px">

	

	
	<tr>
		<td class="auto-style23" style="border-style: none; border-width: medium">
		
		<span class="auto-style22">
		
		<strong>Fees Head Master</strong><hr class="auto-style3" style="height: 0px" noshade="noshade">
<p class="auto-style6" style="height: 30px"><a href="javascript:history.back(1)">
<img height="27" src="../images/BackButton.png" width="60" style="float: right"></a></p>
				
				</span></a></table>


	
	
	
		</td>
		
</table>
<table width="100%" border="1" style="border-collapse: collapse">
    <form name="frmFeesHeadMaster" id="frmFeesHeadMaster" method="post" action="FeesHeadMaster.php">
<tr>
<td><font face="Cambria">Fees Head</font></td>

<td><font face="Cambria"><input type="text" name="feesHead" id="txtAmount" size="20" class="text-box" required="true"></font></td>

<td><font face="Cambria">Financial Year</font></td>

<td><font face="Cambria"><select name="cboFinancialYear" id="cboFinancialYear" style="float: left;"  required="true"  class="text-box"  >
						 <option selected="" value="Select One">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `financialyear` FROM `fymaster`";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						

						 <?php 
							}
							?>
			</select></font></td>



</tr>




<tr>
    <td><font face="Cambria">&nbsp;</font></td>

    <td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>


</tr>




<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>

<td>
							<font face="Cambria">
                                                        <input type="submit" name="submit" value="submit " style="font-weight: 700" onclick="javascript:Validate();"></font></td>
<td>&nbsp;</td>
<td>&nbsp;</td>

</tr>




</form>


</table>
<br><br><br><br>
	
	

	<br>
	 

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>



</html>