﻿<?php
session_start();
include '../Header/Header3.php';
include '../../AppConf.php';
?>
<?php
   $sql = "SELECT distinct `class` FROM `class_master`";
   $result = mysql_query($sql, $Con);
   
   $sqlex = "SELECT distinct `examtype` FROM `exam_master`";
   $rsltex = mysql_query($sqlex, $Con);
   
if ($_REQUEST["SubmitType"]=="ReloadWithSubject")
{
	$class = $_REQUEST["cboClass"];
	$SelectedClass = $_REQUEST["cboClass"];
	$SelectStudentName= str_replace("﻿﻿","",$_REQUEST["txtStudentName"]);
	$RollNo= $_REQUEST["txtRollNo"];
	$ExamType= $_REQUEST["cboTestType"];
	//$ssql="SELECT distinct `subject` FROM `subject_master` a  where  `class`='$class'";
	
	$ssql="SELECT `subject`,`evaluation`,`elective`,`UT`,`Activity1`,`Activity2`,`Activity3`,`OTBA`,`ASL`,`MaxMarks` FROM `subject_master` WHERE `class`='$SelectedClass' and `exam_type`='$ExamType' and `evaluation`='Y' and `elective`='N'";
	$ssql=$ssql ." union ";
	$ssql=$ssql ."SELECT `subject`,`evaluation`,`elective`,`UT`,`Activity1`,`Activity2`,`Activity3`,`OTBA`,`ASL`,`MaxMarks` FROM `subject_master` WHERE `class`='$SelectedClass' and `exam_type`='$ExamType' and `evaluation`='Y' and `elective`='Y' and ";
	$ssql=$ssql ."`subject` in (select distinct `subject` from `student_elective_mapping` where `class`='$SelectedClass' and `srollno`='$RollNo' and `evaluation`='Y' and `elective`='Y')";
	
	$rs= mysql_query($ssql);
}   
   
?>   

<script language="javascript">
function ReloadWithSubject()
{
	document.getElementById("SubmitType").value="ReloadWithSubject";
	document.getElementById("frmClassWork").submit();
	
}
function Validate()
{
	
	var totalSubject = document.getElementById("totalSubject").value;
	
		
	for (i=1;i<totalSubject;i++)
	{
		//varCtrlName = "txtDate" + i;
		var CtrlSubjectName = "txtName" + i;
		
		var CtrlUT="txtUT" + i;
		var CtrlUTMaxMarks="UTMaxMarks" + i;
		
		var CtrlA1="txtA1" + i;
		var CtrlA1MaxMarks="A1MaxMarks" + i;
		
		var CtrlA2="txtA2" + i;
		var CtrlA2MaxMarks="A2MaxMarks" + i;
		
		var CtrlA3="txtA3" + i;
		var CtrlA3MaxMarks="A3MaxMarks" + i;
		
		var CtrlOTBA="txtOTBA" + i;
		var CtrlOTBAMaxMarks="OTBAMaxMarks" + i;
		
		var CtrlASL="txtASL" + i;
		var CtrlASLMaxMarks="ASLMaxMarks" + i;
		
		if (document.getElementById(CtrlUT).readOnly == false)
		{
			if (document.getElementById(CtrlUT).value == "")
			{
				alert ("Please enter value in UT for Subject :" + document.getElementById(CtrlSubjectName).value);				
				return;
			}
			if (isNaN(document.getElementById(CtrlUT).value) == true)
			{
				alert ("Please enter numeric value in UT for Subject :" + document.getElementById(CtrlSubjectName).value);				
				return;
			}
		}
		
		if (document.getElementById(CtrlA1).readOnly == false)
		{
			if (document.getElementById(CtrlA1).value == "")
			{
				alert ("Please enter value in A1 for Subject :" + document.getElementById(CtrlSubjectName).value);				
				return;
			}
			if (isNaN(document.getElementById(CtrlA1).value) == true)
			{
				alert ("Please enter numeric value in A1 for Subject :" + document.getElementById(CtrlSubjectName).value);				
				return;
			}
		}
		if (document.getElementById(CtrlA2).readOnly == false)
		{
			if (document.getElementById(CtrlA2).value == "")
			{
				alert ("Please enter value in A2 for Subject :" + document.getElementById(CtrlSubjectName).value);				
				return;
			}
			if (isNaN(document.getElementById(CtrlA2).value) == true)
			{
				alert ("Please enter numeric value in A2 for Subject :" + document.getElementById(CtrlSubjectName).value);				
				return;
			}
		}
		if (document.getElementById(CtrlA3).readOnly == false)
		{
			if (document.getElementById(CtrlA3).value == "")
			{
				alert ("Please enter value in A3 for Subject :" + document.getElementById(CtrlSubjectName).value);				
				return;
			}
			if (isNaN(document.getElementById(CtrlA3).value) == true)
			{
				alert ("Please enter numeric value in A3 for Subject :" + document.getElementById(CtrlSubjectName).value);				
				return;
			}
		}
		if (document.getElementById(CtrlOTBA).readOnly == false)
		{
			if (document.getElementById(CtrlOTBA).value == "")
			{
				alert ("Please enter value in OTBA for Subject :" + document.getElementById(CtrlSubjectName).value);				
				return;
			}
			if (isNaN(document.getElementById(CtrlOTBA).value) == true)
			{
				alert ("Please enter numeric value in OTBA for Subject :" + document.getElementById(CtrlSubjectName).value);				
				return;
			}
		}
		if (document.getElementById(CtrlASL).readOnly == false)
		{
			if (document.getElementById(CtrlASL).value == "")
			{
				alert ("Please enter value in ASL for Subject :" + document.getElementById(CtrlSubjectName).value);				
				return;
			}
			if (isNaN(document.getElementById(CtrlASL).value) == true)
			{
				alert ("Please enter numeric value in ASL for Subject :" + document.getElementById(CtrlSubjectName).value);				
				return;
			}
		}
		
		
	}
	
	
	document.getElementById("frmClassWork").action="SubmitfrmNewReportCard.php";
	document.getElementById("frmClassWork").submit();
}
function FillSubject()
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
			        	rows=new String(xmlHttp.responseText);
			        	removeAllOptions(document.frmClassWork.cboSubject);
			        	//document.getElementById("txtName").value="";
			        	addOption(document.frmClassWork.cboSubject,"Select One","Select One")
			        	arr_row=rows.split(",");
			        	for(var row_count=0;row_count<arr_row.length;++row_count)
			        	{
			        			addOption(document.frmClassWork.cboSubject,arr_row[row_count],arr_row[row_count])			        			 
			        	}
						//alert(rows);														
			        }
		      }

			var submiturl="GetSubject.php?Class=" + document.getElementById("cboClass").value + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
			
}

function GetMaxMarks()
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
			        	rows=new String(xmlHttp.responseText);
			        	MaxControl=document.getElementById("totalSubject").value
			        	document.getElementById("MaxMarks").value=parseInt(rows);
			        	for(i=1;i<=MaxControl;i++)
			        	{
			        		varCtrlMarksName="txtMaxMarks" + i;							
							document.getElementById(varCtrlMarksName).value=rows;
			        	}
						//alert(rows);														
			        }
		      }
			
			var submiturl="GetMaxMarks.php?TestType=" + document.getElementById("cboTestType").value;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);

}

function GetStudentName()
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
			        	rows=new String(xmlHttp.responseText);

			        	document.getElementById("txtStudentName").value=rows;
			        	
			        	ReloadWithSubject();
			        	if (document.getElementById("cboTestType").value !="Select One")
			        	{
			        		//Commented on 28-Oct-2014
			        		//GetMaxMarks();
			        	}
						//alert(rows);														
			        }
		      }
			
			var submiturl="GetStudentName.php?RollNo=" + document.getElementById("txtRollNo").value + "&Class=" + document.getElementById("cboClass").value;
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
	function GetGrade(cnt)
	{
		//alert(marksobtained);
		//alert(document.getElementById(marksobtained).value);
		var ctrlSubject="txtName" + cnt;
		
		var ctrlUT="txtUT" + cnt;
		var ctrlUTMaxMarks="UTMaxMarks" + cnt;
		
		var ctrlA1="txtA1" + cnt;
		var ctrlA1MaxMarks="A1MaxMarks" + cnt;
		
		var ctrlA2="txtA2" + cnt;
		var ctrlA2MaxMarks="A2MaxMarks" + cnt;
		
		var ctrlA3="txtA3" + cnt;
		var ctrlA3MaxMarks="A3MaxMarks" + cnt;
		
		var ctrlOTBA="txtOTBA" + cnt;
		var ctrlOTBAMaxMarks="OTBAMaxMarks" + cnt;
		
		var ctrlASL="txtASL" + cnt;
		var ctrlASLMaxMarks="ASLMaxMarks" + cnt;
		
		var ctrlMaxMarks="txtMaxMarks" + cnt;
		
		var ctrlTotalMarks="txtTotalMarks" + cnt;
		
		var ctrlGrade="txtGrd" + cnt;
		var ctrlGradePoint="txtGrdPoint" + cnt;
		
		var UTObtainMarks=0;
		var A1ObtainMarks=0;
		var A2ObtainMarks=0;
		var A3ObtainMarks=0;
		var OTBAObtainMarks=0;
		var ASLObtainMarks=0;
		var TotalObtainedMarks=0;
		
		if (document.getElementById(ctrlUTMaxMarks).value != "" && document.getElementById(ctrlUTMaxMarks).value != "0")
		{
			if (document.getElementById(ctrlUT).value != "")
			{
				UTObtainMarks = parseInt(document.getElementById(ctrlUT).value);
				if (parseInt(document.getElementById(ctrlUT).value) > parseInt(document.getElementById(ctrlUTMaxMarks).value))
				{
					alert ("UT Marks can not be more then" + document.getElementById(ctrlUTMaxMarks).value + " for subject: " + document.getElementById(ctrlSubject).value);
					document.getElementById(ctrlUT).value="";
					return;
				}
			}
		}
		
		
		//alert(document.getElementById(ctrlA1MaxMarks).value);
		
		if (document.getElementById(ctrlA1MaxMarks).value != "" && document.getElementById(ctrlA1MaxMarks).value != "0")
		{
			if (document.getElementById(ctrlA1).value != "")
			{
				A1ObtainMarks = parseInt(document.getElementById(ctrlA1).value);
				if (parseInt(document.getElementById(ctrlA1).value) > parseInt(document.getElementById(ctrlA1MaxMarks).value))
				{
					alert ("Activity1 Marks can not be more then" + document.getElementById(ctrlA1MaxMarks).value + " for subject: " + document.getElementById(ctrlSubject).value);
					document.getElementById(ctrlA1).value="";
					return;
				}
			}
		}
		
		if (document.getElementById(ctrlA2MaxMarks).value != "" && document.getElementById(ctrlA2MaxMarks).value != "0")
		{
			if (document.getElementById(ctrlA2).value != "")
			{
				A2ObtainMarks = parseInt(document.getElementById(ctrlA2).value);
				if (parseInt(document.getElementById(ctrlA2).value) > parseInt(document.getElementById(ctrlA2MaxMarks).value))
				{
					alert ("Activity2 Marks can not be more then" + document.getElementById(ctrlA2MaxMarks).value + " for subject: " + document.getElementById(ctrlSubject).value);
					document.getElementById(ctrlA2).value="";
					return;
				}
			}
		}
		
		if (document.getElementById(ctrlA3MaxMarks).value != "" && document.getElementById(ctrlA3MaxMarks).value != "0")
		{
			if (document.getElementById(ctrlA3).value != "")
			{
				A3ObtainMarks = parseInt(document.getElementById(ctrlA3).value);
				if (parseInt(document.getElementById(ctrlA3).value) > parseInt(document.getElementById(ctrlA3MaxMarks).value))
				{
					alert ("Activity3 Marks can not be more then" + document.getElementById(ctrlA3MaxMarks).value + " for subject: " + document.getElementById(ctrlSubject).value);
					document.getElementById(ctrlA3).value="";
					return;
				}
			}
		}
		
		
		if (document.getElementById(ctrlOTBAMaxMarks).value != "" && document.getElementById(ctrlOTBAMaxMarks).value != "0")
		{
			if (document.getElementById(ctrlOTBA).value != "")
			{
				OTBAObtainMarks = parseInt(document.getElementById(ctrlOTBA).value);
				if (parseInt(document.getElementById(ctrlOTBA).value) > parseInt(document.getElementById(ctrlOTBAMaxMarks).value))
				{
					alert ("OTBA Marks can not be more then" + document.getElementById(ctrlOTBAMaxMarks).value + " for subject: " + document.getElementById(ctrlSubject).value);
					document.getElementById(ctrlOTBA).value="";
					return;
				}
			}
		}
		
		
		if (document.getElementById(ctrlASLMaxMarks).value != "" && document.getElementById(ctrlASLMaxMarks).value != "0")
		{
			if (document.getElementById(ctrlASL).value != "")
			{
				ASLObtainMarks = parseInt(document.getElementById(ctrlASL).value);
				if (parseInt(document.getElementById(ctrlASL).value) > parseInt(document.getElementById(ctrlASLMaxMarks).value))
				{
					alert ("ASL Marks can not be more then" + document.getElementById(ctrlASLMaxMarks).value + " for subject: " + document.getElementById(ctrlSubject).value);
					document.getElementById(ctrlOTBA).value="";
					return;
				}
			}
		}
		
		
		TotalObtainedMarks=parseInt(UTObtainMarks)+parseInt(A1ObtainMarks)+parseInt(A2ObtainMarks)+parseInt(A3ObtainMarks)+parseInt(OTBAObtainMarks)+parseInt(ASLObtainMarks);
			
		MarksObtained = parseInt(TotalObtainedMarks);
		MaxMarks = parseInt(document.getElementById(ctrlMaxMarks).value);
		document.getElementById(ctrlTotalMarks).value=MarksObtained;
		
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

			        	arr_row=rows.split(",");
			        	
			        	document.getElementById(ctrlGrade).value=arr_row[0];
			        	document.getElementById(ctrlGradePoint).value=arr_row[1];
			        	
			        							
			        }
		      }
			
			var submiturl="GetGrade.php?MarksObtained=" + MarksObtained  + "&MaxMarks=" + MaxMarks;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
	}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enter Class Work Details</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">
.style1 {
	border-color: #808080;
	border-width: 0px;
	border-collapse: collapse;
	font-family: Cambria; 
	}
.style6 {
	border-collapse: collapse;
	font-family: Cambria;
}
.style8 {
	text-align: center;
	font-family: Cambria;
}
.auto-style2 {
	text-align: center;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
}
.auto-style4 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #DCBA7B;
	color: #000000;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}
.auto-style5 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
}
.auto-style6 {
	color: #000000;
}
.auto-style7 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	color: #000000;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}
.auto-style21 {
	text-align: left;
}
.auto-style22 {
	text-align: right;
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: defulat (size);
}
.auto-style23 {
	text-align: center;
	border-style: none;
	border-width: medium;
	background-color: #FFFFFF;
	font-family: Cambria;
}
.auto-style25 {
	text-align: right;
	border-style: none;
	border-width: medium;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
	font-size: defulat (size);
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

.auto-style29 {
	border-right-width: 0px;
	border-top-width: 0px;
	border-bottom-width: 0px;
}
.auto-style32 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
}
.auto-style33 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	font-size: defulat (size);
}
.auto-style36 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	text-decoration: underline;
}
.auto-style3 {
	font-family: Cambria;
	font-weight: bold;
	font-size: 15px;
	color: #000000;
}
.auto-style37 {
	text-align: left;
	border-style: none;
	border-width: medium;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
	font-size: defulat (size);
}
.auto-style39 {
	text-align: center;
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
	font-size: defulat (size);
}
.auto-style40 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
	color: #000000;
	font-size: defulat (size);
}
</style>
</head>

<body>

<table style="width: 100%" class="style1">
	
	<tr>
		<td class="auto-style7" style="border-style: none; border-width: medium">

				<div class="auto-style21">

					<strong>Student Marks Upload</strong><hr class="auto-style3" style="height: -15px">
				</div>
<p class="auto-style6" style="height: 7px"><b><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" style="float: right"></a></b></p>
				
				</td>
	</tr>	
	
	</table>	<table class="auto-style29">
	<form name="frmClassWork" id="frmClassWork" method="post" action="frmNewReportCard.php">	
	<input type="hidden" name="SubmitType" id="SubmitType" value="" class="auto-style5">		
	<input type="hidden" name="MaxMarks" id="MaxMarks" value="" class="auto-style5">
	<input type="hidden" name="SelectedExamType" id="SelectedExamType" value="<?php echo $ExamType; ?>">
	<tr>
		<td class="auto-style25" style="width: 318px; height: 29px;">
		<p style="text-align: center">Class: </td>
		<td class="auto-style32" style="width: 319px; height: 29px;">
		
			<span class="auto-style40">
		
			<!--<select name="cboClass" id="cboClass" onchange="FillSubject();">-->
			</span>
			<select name="cboClass" id="cboClass" class="auto-style40">
			<option selected="" value="Select One">Select One</option>
			<?php
				while($row = mysql_fetch_assoc($result))
   				{
   					$class=$row['class'];
			?>
			<option value="<?php echo $class; ?>" <?php if ($class==$SelectedClass) { echo "selected"; } ?> ><?php echo $class; ?></option>
			<?php
				}
			?>
			</select><span class="auto-style40"> </span>
		</td>
		<td class="auto-style37" style="width: 273px; height: 29px;">
		<p style="text-align: center">Roll No:</td>
		<td class="auto-style32" style="width: 319px; height: 29px;">
		<span class="auto-style40">
		<!--
		<select name="cboSubject" id="cboSubject">
		<option></option>
		<option selected="" value="Select One">Select One</option>
		</select>
		-->
		</span>
		<input name="txtRollNo" id="txtRollNo" type="text" value="<?php echo $RollNo; ?>" class="auto-style40"></td>
	</tr>
	 
	<tr>
		<td class="auto-style25" style="width: 318px" height="33">
		<p style="text-align: center">Student Name:</td>
		<td class="auto-style32" style="width: 319px" height="33">
		
			<input name="txtStudentName" id="txtStudentName" type="text" style="width: 213; height:21" value="<?php echo $SelectStudentName; ?>" readonly class="auto-style40"></td>
		<td class="auto-style37" style="width: 273px" height="33">
		<p style="text-align: center">Test Type:</td>
		<td class="auto-style32" style="width: 319px" height="33">
		<!--<select name="cboTestType" id="cboTestType" onclick="GetMaxMarks();" class="auto-style40">-->
		<select name="cboTestType" id="cboTestType" onchange="GetStudentName();" class="auto-style40">
		<option selected="" value="Select One">Select One</option>
		<?php
				while($row = mysql_fetch_assoc($rsltex))
   				{
   					$ExamType=$row['examtype'];
		?>
		<option value="<?php echo $ExamType; ?>"><?php echo $ExamType; ?></option>
		<?php
		}
		?>
		
		</select></td>
	</tr>
	
	<tr>
		<td class="auto-style25" style="width: 318px">
		<p style="text-align: center">Position:</td>
		<td class="auto-style32" colspan="3">
		
			<input name="txtPosition" id="txtPosition" type="text" class="auto-style40" size="9"></td>
	</tr>
	
	<tr>
		<td class="auto-style22" colspan="4">
		<table width="100%" border="1" cellpadding="0" class="style6">
			
			<tr>
				<td style="height: 24px" class="auto-style33" bgcolor="#FFFFFF" colspan="11">&nbsp;</td>
			</tr>
			
			<tr>
				<td style="width: 196px; height: 24px;" class="auto-style33" bgcolor="#95C23D">Subject</td>
				<td style="width: 197px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				UT</td>
				<td style="width: 197px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				A1</td>
				<td style="width: 197px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				A2</td>
				<td style="width: 197px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				A3</td>
				<td style="width: 197px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				OTBA</td>
				<td style="width: 197px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				ASL</td>
				<td style="width: 197px; height: 24px;" class="auto-style39" bgcolor="#95C23D">Max. Marks</td>
				<td style="width: 103px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				Obtained</td>
				<td style="width: 99px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				Grade</td>
				<td style="width: 197px; height: 24px;" class="auto-style39" bgcolor="#95C23D">
				Grade Points</td>
			</tr>
			<?php
				$Cnt=1;
				while($row = mysql_fetch_assoc($rs))
   				{
   					$Subject=$row['subject'];
   					$UTMaxMarks=$row['UT'];
   					$A1MaxMarks=$row['Activity1'];
   					$A2MaxMarks=$row['Activity2'];
   					$A3MaxMarks=$row['Activity3'];
   					$OTBAMaxMarks=$row['OTBA'];
   					$ASLMaxMarks=$row['ASL'];
   					$MaxMarks=$row['MaxMarks'];   					
			?>
			<tr>
				<td style="width: 196px; height: 48px;" class="style8">
				<input name="txtName<?php echo $Cnt; ?>" id="txtName<?php echo $Cnt; ?>" type="text" style="width: 148px" value="<?php echo $Subject; ?>" readonly="readonly" class="auto-style40"></td>
				<td style="width: 197px; height: 48px;" class="style8">
		<input type="text" name="txtUT<?php echo $Cnt; ?>" id="txtUT<?php echo $Cnt; ?>" size="15" onkeyup="Javascript:GetGrade('<?php echo $Cnt; ?>');" class="auto-style40" style="width: 35px">
		<input type="hidden" name="UTMaxMarks<?php echo $Cnt; ?>" id="UTMaxMarks<?php echo $Cnt; ?>" value="<?php echo $UTMaxMarks;?>">
				/<?php echo $UTMaxMarks;?></td>
				<td style="width: 197px; height: 48px;" class="style8">
		<input name="txtA1<?php echo $Cnt; ?>" id="txtA1<?php echo $Cnt; ?>" type="text" size="15" style="width: 35px" onkeyup="Javascript:GetGrade('<?php echo $Cnt; ?>');">
		<input type="hidden" name="A1MaxMarks<?php echo $Cnt; ?>" id="A1MaxMarks<?php echo $Cnt; ?>" value="<?php echo $A1MaxMarks;?>">/<?php echo $A1MaxMarks;?>
				</td>
				<td style="width: 197px; height: 48px;" class="style8">
		<input name="txtA2<?php echo $Cnt; ?>" id="txtA2<?php echo $Cnt; ?>" type="text" size="15" style="width: 35px" onkeyup="Javascript:GetGrade('<?php echo $Cnt; ?>');">
		<input type="hidden" name="A2MaxMarks<?php echo $Cnt; ?>" id="A2MaxMarks<?php echo $Cnt; ?>" value="<?php echo $A2MaxMarks;?>">/<?php echo $A2MaxMarks;?>
				</td>
				<td style="width: 197px; height: 48px;" class="style8">
		<input name="txtA3<?php echo $Cnt; ?>" id="txtA3<?php echo $Cnt; ?>" type="text" size="15" style="width: 35px" onkeyup="Javascript:GetGrade('<?php echo $Cnt; ?>');">
		<input type="hidden" name="A3MaxMarks<?php echo $Cnt; ?>" id="A3MaxMarks<?php echo $Cnt; ?>" value="<?php echo $A3MaxMarks;?>">/<?php echo $A3MaxMarks;?>
				</td>
				<td style="width: 197px; height: 48px;" class="style8">
		<input name="txtOTBA<?php echo $Cnt; ?>" id="txtOTBA<?php echo $Cnt; ?>" type="text" size="15" style="width: 35px" <?php if ($OTBAMaxMarks =="" || $OTBAMaxMarks =="0") { ?>readonly="readonly" <?php } ?> onkeyup="Javascript:GetGrade('<?php echo $Cnt; ?>');">
		<input type="hidden" name="OTBAMaxMarks<?php echo $Cnt; ?>" id="OTBAMaxMarks<?php echo $Cnt; ?>" value="<?php echo $OTBAMaxMarks;?>">/<?php echo $OTBAMaxMarks;?>
				</td>
				<td style="width: 197px; height: 48px;" class="style8">
		<input name="txtASL<?php echo $Cnt; ?>" id="txtASL<?php echo $Cnt; ?>" type="text" size="15" style="width: 35px" <?php if ($ASLMaxMarks == "" || $ASLMaxMarks == "0") { ?>readonly="readonly" <?php } ?> onkeyup="Javascript:GetGrade('<?php echo $Cnt; ?>');">
		<input type="hidden" name="ASLMaxMarks<?php echo $Cnt; ?>" id="ASLMaxMarks<?php echo $Cnt; ?>" value="<?php echo $ASLMaxMarks;?>">/<?php echo $ASLMaxMarks;?>
				</td>
				<td style="width: 197px; height: 48px;" class="style8">
				<input name="txtMaxMarks<?php echo $Cnt; ?>" id="txtMaxMarks<?php echo $Cnt; ?>" type="text" readonly class="auto-style40" style="width: 36px" value="<?php echo $MaxMarks; ?>"></td>
				<td style="width: 103px; height: 48px;" class="style8">
				<input name="txtTotalMarks<?php echo $Cnt; ?>" id="txtTotalMarks<?php echo $Cnt; ?>" type="text" class="auto-style40" style="width: 73; height:21" readonly="readonly"></td>
				<td style="width: 99px; height: 48px;" class="style8">
				<input name="txtGrd<?php echo $Cnt; ?>" id="txtGrd<?php echo $Cnt; ?>" type="text" readonly class="auto-style40" style="width: 35px"></td>
				<td style="width: 197px; height: 48px;" class="auto-style2">
				<input name="txtGrdPoint<?php echo $Cnt; ?>" id="txtGrdPoint<?php echo $Cnt; ?>" type="text" readonly class="auto-style40" style="width: 35px"></td>
			</tr>
			<?php
				$Cnt = $Cnt+1;
			}
			?>
			<input type="hidden" name="totalSubject" id="totalSubject" value="<?php echo $Cnt; ?>" class="auto-style40">
			</table>
		</td>
	</tr>
	<tr>
		<td class="auto-style23" colspan="4">
		<input name="Submit" type="button" value="Submit" onclick="Javascript:Validate();" class="auto-style40" style="font-weight: 700"></td>
	</tr>
	</form>
</table>

<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool Technologies LLP</font></div>
</div>
</body>

</html>