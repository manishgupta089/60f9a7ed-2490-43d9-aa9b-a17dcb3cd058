<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
	include '../Header/Header3.php';

?>
<?php 
$EmpId=$_REQUEST["txtEmpId"];

$ssql="SELECT distinct `Question`FROM `Employee_ACR_Question_Master`";
$rsQuestion=mysql_query($ssql);
$rsEmpDetail=mysql_query("SELECT `Name`,`Department`,`Designation`  from `employee_master` where `EmpId`='$EmpId'");
$rowEmpDetail=mysql_fetch_row($rsEmpDetail);
{
    $EmpName=$rowEmpDetail[0];
    $Department=$rowEmpDetail[1];
    $Designation=$rowEmpDetail[2];

}


?>

<script language="javascript">

function GetRating(cnt)

	{

			try

		    {    

				// Firefox, Opera 8.0+, Safari    

				xmlHttp=new XMLHttpRequest();

			}

		  catch (e)

		    {    // Internet Explorer    

				try

			      {      

					xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");

				  }

			    catch (e)

			      {      

					  try

				        { 

							xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");

						}

				      catch (e)

				        {        

							alert("Your browser does not support AJAX!");        

							return false;        

						}      

				  }    

			 } 

			 xmlHttp.onreadystatechange=function()

		      {

			      if(xmlHttp.readyState==4)

			        {

						var rows="";

						var Rating="";

			        	rows=new String(xmlHttp.responseText);
						//alert(rows);
			        	//removeAllOptions(document.frmGroupSMS.lstSelectedGroupMember);
						document.getElementById("txtRating"+cnt).value=rows;
			        													

			        }

		      }

			var submiturl="GetRating.php?Answer="+ document.getElementById("txtAnswer"+cnt).value + "";

			xmlHttp.open("GET", submiturl,true);

			xmlHttp.send(null);			

}

function removeAllOptions(selectbox)

	{

		var i;

		for(i=selectbox.options.length-1;i>=0;i--)

		{

			selectbox.remove(i);

		}

	}

	function removeOption(selectbox,indx)

	{

		var i;

		i=indx;

			selectbox.remove(i);

	}

	function addOption(selectbox,text,value )

	{

		var optn = document.createElement("OPTION");

		optn.text = text;

		optn.value = value;

		selectbox.options.add(optn);

	}


function Validate()
{
    if(document.getElementById("txtEmpNo").value.trim()=="")
	{
		alert ("Please Select and Employee !");
		return;
	}
	

	document.getElementById("frmEmployeeACR").submit();
}




</script>



<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>ACR</title>
	<link rel="stylesheet" type="text/css" href="../tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

	<script type="text/javascript" src="../tcal.js"></script>

</head>

<body>
<div id="MasterDiv">
<div align="center">
<table width="100%">
<tr>
<td>
<h1 align="center"><b><font face="Cambria">
<img src="<?php echo $SchoolLogo; ?>" height="100px" width="400px"></font></b></h1>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b><?php echo $SchoolAddress; ?></b> </font>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b>Phone No: <?php echo $SchoolPhoneNo; ?></b> </font>
</td>
</tr>
<tr>
<td align="center">
<font face="Cambria"><b>Email Id: <?php echo $SchoolEmailId; ?></b> </font>
</td>
</tr>
<tr>
<td align="center">
&nbsp;</td>
</tr>
</table>
<table id="table_10" style="width: 100%" cellspacing="0" cellpadding="0" class="style15">
	<tr>
		<td class="style16">
<p  style="height: 12px" align="center">
<strong><font face="Cambria" style="font-size: 14pt">Annual Confidential Report</font></strong></p>
<p  style="height: 12px" align="left" class="style25">&nbsp;</p>
</td>
</tr>
<tr>
		<td class="style16">
<p  style="height: 12px" align="center" class="style25"><font face="Cambria"><b>HOD/ HM/ VICE- 
PRINCIPAL ASSESSMENT</b></font></p>
</td>
</tr>
		</table>
		<font face="Cambria">
		<br>
		<br>
		</font>
		<form name="frmEmployeeACR" id="frmEmployeeACR" method="post" action="SubmitACRHodAssesmentTeaching.php" enctype="multipart/form-data">

        

		<table class="name" width="100%" cellpadding="0" style="border-collapse: collapse" border="1">
 <tr id="trWait" style="display: none;">
		  <td align="center" style="border-style: solid; border-width: 1px" colspan="8">&nbsp;</td>
 </tr>
 <tr>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146">
			<p><b><font face="Cambria">Emp No.</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146">
			<font face="Cambria">
			<input name="txtEmpNo" id="txtEmpNo" style="float: left"  class="text-box" value="<?php echo $EmpId; ?>"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="146">
			<p><b><font face="Cambria"><span class="style4">Emp</span> Name</font></b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147">
			<font face="Cambria">
			<input name="txtEmpName" id="txtEmpName"  class="text-box" value="<?php echo $EmpName; ?>"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147">
			<font face="Cambria"><b>Emp Department</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147">
			<font face="Cambria">
			<input name="txtEmpType" id="txtEmpType" class="text-box" value="<?php echo $Department; ?>"></font></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147"><font face="Cambria">
			<p><b>Emp Designation</b></td>
		  <td align="center" style="border-style: solid; border-width: 1px" width="147">
			<font face="Cambria">
			<input name="txtDesig" id="txtMobile"  class="text-box"  value="<?php echo $Designation; ?>"></font></td>
		  
		
 </tr>
 
 <tr>
  <td>
 
 &nbsp;</td>
  <td>
 
 &nbsp;</td>
  <td>
 
 &nbsp;</td>
  <td>
 
 &nbsp;</td>
  <td>
 
 &nbsp;</td>
 <td>
 
 &nbsp;</td>
 <td>
  
 &nbsp;</td>
  <td>
 
 &nbsp;</td>
 </tr>
 </table>
 <font face="Cambria">
 <br>
 <br>
	</font>
	<table class="name" width="100%" cellpadding="0" style="border-collapse: collapse" border="1">
 <tr>
  <td>
 
 <b>
 
 <font face="Cambria">Srno</font></b></td>
  <td>
 
 <b>
 
 <font face="Cambria">Question</font></b></td>
 <!--- <td>
 
 <b>
 
 <font face="Cambria">Rating</font></b></td>--->

  <td>
 
 <b>
 
 <font face="Cambria">Answer</font></b></td>

  <td>
 
 <font face="Cambria"><b>Rating</b></font></td>
 </tr>
 <?php 
 
 $recno=1;
 while($row=mysql_fetch_row($rsQuestion))
 
 {
 
      $Question=$row[0];
      $Answer=$row[1];
?>
 <tr>
  <td>
 <font face="Cambria">
 <?php echo $recno; ?>
 </font>
 </td>
  <td>
 
 <font face="Cambria">
 
 <?php echo $Question; ?></font></td>
 <!--<td>
			<font face="Cambria">
			<input name="txtRating" id="txtRating" style="float: left"  class="text-box"></font></td>--->
 <td>
 <select name="txtAnswer<?php echo $recno;?>" id="txtAnswer<?php echo $recno;?>"  style="float: left" ; class="text-box"  onchange="Javascript:GetRating('<?php echo $recno;?>');">
						 <option selected="" value="">Select One</option>
						 <?php
							$ssqlName="SELECT distinct `Answer` FROM `Employee_ACR_Question_Master` where `Question`='$Question'";
							$rsName= mysql_query($ssqlName);
							
							while($row1 = mysql_fetch_row($rsName))
							{
									$Name=$row1[0];
							?>
						 <option value="<?php echo $Name; ?>"><?php echo $Name; ?></option>
						 <?php 
							}
							?>
			</select></td>
 <td>
 </font>
 <font face="Cambria">
 <input type ="text" name="txtRating<?php echo $recno;?>" id="txtRating<?php echo $recno;?>" value ="" size="13" readonly>
 </font></td>
 </tr>
 <tr>
 
 <td colspan="4">
 
 &nbsp;</td>
 </tr>

 <?php 
 $recno=$recno+1;
 }
 ?>
 <tr>
 
 <td colspan="4">
 
 &nbsp;</td>
 </tr>
 
 <tr>
 
 <td colspan="4">
 
 <p align="center">
			<font face="Cambria">
			<input name="BtnSubmit" type="button" value="Submit" onclick="Validate();" style="font-weight: 700" class="text-box">
			 <input type="hidden" name="hTotalRecno" id="hTotalRecno" value="<?php echo $recno;?>"></font></td>
 </tr>
 
 </form>
</table>
		

</div>

</div>
<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a>
<br>
<br>
<br>

<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>


</font>


</body>

</html>