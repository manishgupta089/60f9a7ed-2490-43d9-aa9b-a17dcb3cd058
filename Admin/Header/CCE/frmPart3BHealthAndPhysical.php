﻿<?php include '../../connection.php';?>

<?php
	//$sclass="1A";
	session_start();
	$sclass = $_SESSION['Class'];
	$AdmissionId =$_SESSION['sadmission'];
	$ssqlChk="select * from `reportcard_interim` where `sadmission`='$AdmissionId' and `indicatortype`='Health and Physical'";
	$rsChk = mysql_query($ssqlChk);
	if (mysql_num_rows($rsChk) > 0)
	{
		$Msg="<br><br><center>Step 5 Health & Physical Edu. has been uploaded!";
	}
	
	$sqlRcpt = "SELECT `DescriptiveIndicator` FROM  `reportcard_healthphysical` where `status`='1' and `indicatortype`='Health and Physical' and `class`='$sclass'";
	$rs = mysql_query($sqlRcpt);

?>

<script language="javascript">
	function fnlGetGrade(cnt)
	{
		//alert(cnt);
		ctrlname="txtPoint" + cnt;
		Gradectrl="txtGrade" + cnt;
		ctrlDescOther="txtDescriptionOther" + cnt;
		
		ctrlDescription="cboDescription" + cnt;
		cboDescriptionVarName = "document.frmLifeSkill.cboDescription" + String(cnt);

		//alert(document.getElementById(ctrlname).value);
		if(isNaN(document.getElementById(ctrlname).value)==true)
		{
			alert("Only numberic value is accepted!");
			document.getElementById(ctrlname).value="";
			return;
		}
		else
		{
			if (parseInt(document.getElementById(ctrlname).value) < 1 || parseInt(document.getElementById(ctrlname).value)>5)
			{
				alert ("Only values from 1 to 5 is acceptable in point");
				document.getElementById(Gradectrl).value="";
				document.getElementById(ctrlname).value="";
				document.getElementById(ctrlDescOther).value="";
				document.getElementById(ctrlDescOther).style.display="none";
				removeAllOptions(cnt);
				addOption(cnt,"Select One","Select One")
				
				return;
			}
		}
		
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
			        	rows=new String(xmlHttp.responseText);
			        	/*
			        	arr_row=rows.split(",");
			        	document.getElementById("txtAdmissionFees").value=arr_row[4];
			        	document.getElementById("txtSecurityFeesAmount").value=arr_row[5];
						CalculatTotal();
						*/
						
						arr_row=rows.split(",");
						
						if (arr_row[0] != 0)													
						{
							Grade=arr_row[0];
							document.getElementById(Gradectrl).value =Grade.replace("﻿","");
							removeAllOptions(cnt);
							//removeAllOptions(document.frmLifeSkill.cboDescription1);
							
							addOption(cnt,"Select One","Select One")
							for(var row_count=1;row_count<arr_row.length;++row_count)
			        		{
			        			addOption(cnt,arr_row[row_count],arr_row[row_count])			        			 
			        		}
			        		addOption(cnt,"Type your own","Type your own")
						}
						else
						{
							document.getElementById(Gradectrl).value="";
							removeAllOptions(cnt);
							addOption(cnt,"Select One","Select One")
							
						}
			        }
		      }
			var submiturl="GetGradePart2LifeSkill.php?Point=" + escape(document.getElementById(ctrlname).value) + "&indicater_type=HealthAndPhysical&class=" + document.getElementById("txtClass").value;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
	}
	
	function fnlShowHideOtherTextBox(cnt)
	{
		ctrlName="txtDescriptionOther" + cnt;
		ctrlName1="cboDescription" + cnt;
		if (document.getElementById(ctrlName1).value == "Type your own")
		{
			document.getElementById(ctrlName).style.display="";	
		}
		else
		{
			document.getElementById(ctrlName).value="";
			document.getElementById(ctrlName).style.display="none";
		}		
	}
	
	function removeAllOptions(cnt)
	{
		ctrlName="cboDescription" + cnt;
		
		//selectbox="document.frmLifeSkill.cboDescription" + selectbox;

		var i;
		for(i=document.getElementById(ctrlName).options.length-1;i>=0;i--)
		{
			document.getElementById(ctrlName).remove(i);
		}
	}
	function addOption(cnt,text,value )
	{
		ctrlName="cboDescription" + cnt;
		
		var optn = document.createElement("OPTION");
		optn.text = text;
		optn.value = value;
		document.getElementById(ctrlName).options.add(optn);
	}
	function Validate()
	{
		//alert(document.getElementById("TotalCnt").value);
		TotalControl=document.getElementById("TotalCnt").value;
		
		var selectedcounter=0;
		for(var cnt=1;cnt <= TotalControl;cnt++)
		{
			ctrlname="txtPoint" + cnt;
			ctrlDesc="cboDescription" + cnt;
			ctrlDescOther="txtDescriptionOther" + cnt;
			
			/*
			if(document.getElementById(ctrlname).value == "")
			{
				alert("All the Descriptive Indicators are mandatory!");
				return;
			}
			*/
			if(document.getElementById(ctrlname).value != "")
			{
				if(isNaN(document.getElementById(ctrlname).value)==true)
				{
					alert("All the points should be numeric");
					return;
				}
				if(document.getElementById(ctrlDesc).value=="Select One")
				{
					alert("Descriptive Indicators's Descriptions are mandatory!");
					return;
				}
				if(document.getElementById(ctrlDesc).value == "Type your own")
				{
					if (document.getElementById(ctrlDescOther).value == "")
					{
						alert("All the Descriptive Indicators's Descriptions are mandatory!");
						return;
					}
				}
				selectedcounter=selectedcounter+1;
			}					
		}
		if (selectedcounter>2)
		{
			alert("As per C.B.S.E.(CCE) guidelines health and physical education can be assessed only on two parameters!Please check");
			return;
		}
		document.getElementById("frmLifeSkill").submit();
		return;
	}
</script>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Part - 1 Academic Performance</title>
<style type="text/css">
.style1 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style3 {
	text-align: center;
	font-family: Cambria;
	font-size: 12pt;
	border: 1px solid #000000;
}
.style4 {
	font-family: Arial;
	font-size: 11pt;
	text-align: center;
	border: 1px solid #000000;
}
.style6 {
	font-family: Cambria;
	font-size: large;
	border: 1px solid #000000;
}
.style7 {
	font-size: small;
}
.style8 {
	border: 1px solid #000000;
	font-family: Cambria;
	font-size: 12pt;
}
.style9 {
	font-family: Cambria;
}
.style10 {
	font-family: Cambria;
	font-size: 11pt;
	text-align: center;
	border: 1px solid #000000;
}
.style23 {
	border: 1px solid #000000;
	font-family: Cambria;
}
.style20 {
	text-decoration: none;
}
.style21 {
	color: #000000;
}
.style16 {
	font-family: Cambria;
	border: 1px solid #000000;
	background-color: #9CE79C;
}
</style>
</head>

<body>
<table style="width: 100%" class="style1">
	<tr>
		<td class="style23" style="width: 184px">
		<a href="frmPart1BScholasticAreas.php" class="style20">
		<span class="style21">Step 1 <br>
		(Scholastic Areas)</span></a></td>
		<td class="style23" style="width: 185px">
		<a href="frmPart2ALifeSkill.php" class="style20"><span class="style21">
		Step 2 <br>
		(Co-Scholastic -Life Skills)</span></a></td>
		<td class="style23" style="width: 185px">
		<a href="frmPart2DAttitudeAndValues.php" class="style20">
		<span class="style21">Step 3 <br>
		(Co-Scholastic- Attitude)</span></a></td>
		<td class="style23" style="width: 185px">
		<a href="frmPart3ACoScholasticActivities.php" class="style20">
		<span class="style21">Step 4 <br>
		Co-Scholastic Activities</span></a></td>
		<td class="style16" style="width: 185px">
		<a href="frmPart3BHealthAndPhysical.php" class="style20">
		<span class="style21">Step 5 <br>
		Health &amp; Physical Edu.</span></a></td>
		<td class="style23" style="width: 185px">Step 6 <br>
		Self Awareness</td>
	</tr>
</table>
<br>
<?php
if ($Msg !="")
{
	echo $Msg;
	exit();
}
?>
<table style="width: 100%" class="style1">
	<tr>
		<td class="style6" style="height: 24px" colspan="5"><strong>
		<font size="3">Part - 3 
		Co-Scholastic Activities</font><span class="style7">
		Health and Physical Edu.
		</span></strong><span class="style7">(any two be assessed on a 5 point scale 
		once in a session)</span></td>
	</tr>
	<form name="frmLifeSkill" id="frmLifeSkill" method="post" action="SubmitfrmLifeSkill.php">
	<span class="style9">
	<input type="hidden" name="txtClass" id="txtClass" value="<?php echo $sclass; ?>">
	<input type="hidden" name="txtIndicaterType" id="txtIndicaterType" value="Health and Physical">
	</span>
	<tr>
		<td class="style8" style="width: 55px; height: 24px"><strong>S. No.</strong></td>
		<td class="style3" style="height: 24px; width: 518px;"><strong>Descriptive Indicators</strong></td>
		<td class="style3" style="height: 24px; width: 176px;"><strong>Point</strong></td>
		<td class="style3" style="height: 24px; width: 177px;"><strong>Grade</strong></td>
		<td class="style3" style="height: 24px; width: 177px;"><strong>Description</strong></td>
	</tr>
	<?php
		$ccnt=1;
		while($row = mysql_fetch_row($rs))
		{
			$descriptiveIndicater=$row[0];
	?>
	<span class="style9">
	<input type="hidden" name="txtDescriptiveIndicater<?php echo $ccnt;?>" id="txtDescriptiveIndicater<?php echo $ccnt;?>" value="<?php echo $descriptiveIndicater;?>">
	</span>
	<tr>
		<td class="style10" style="width: 55px; height: 50px"><?php if($ccnt<10) {?>0<?php }?><?php echo $ccnt; ?></td>
		<td class="style10" style="height: 50px; width: 518px;"><?php echo $descriptiveIndicater;?> :</td>
		<td class="style10" style="height: 50px; width: 176px;">
		<input name="txtPoint<?php echo $ccnt;?>" id="txtPoint<?php echo $ccnt;?>" type="text" onkeyup="Javascript:fnlGetGrade('<?php echo $ccnt;?>');"></td>
		<td class="style10" style="height: 50px; width: 177px;">
		<input name="txtGrade<?php echo $ccnt;?>" id="txtGrade<?php echo $ccnt;?>" type="text" readonly="readonly"></td>
		<td class="style4" style="width: 177px; height: 50px">
		<span class="style9">
		<select name="cboDescription<?php echo $ccnt;?>" id="cboDescription<?php echo $ccnt;?>" onchange="Javascript:fnlShowHideOtherTextBox('<?php echo $ccnt;?>');">
		<option selected="" value="SelectOne">SelectOne</option>
		</select></span> <span class="style9">
		<input type="text" name="txtDescriptionOther<?php echo $ccnt;?>" id="txtDescriptionOther<?php echo $ccnt;?>" value="" style="display: none;">
		</span>
		</td>
	</tr>
	
	<?php
		$ccnt=$ccnt+1;
	}
	?>
	<span class="style9">
	<input type="hidden" name="TotalCnt" id="TotalCnt" value="<?php echo $ccnt-1;?>">
	</span>
	<tr>
		<td class="style10" style="height: 50px" colspan="5">
		<input name="btnSubmit" type="button" value="Submit" onclick="Javascript:Validate();"></td>
	</tr>
	</form>
	</table>

</body>

</html>