<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>

<?php
	
	if ($_REQUEST["txtReciptNo"] != "")
	{
		$ReceiptNo = $_REQUEST["txtReciptNo"];
		//$ssql = "SELECT `amountpaid`,`SecurityAmtPaid`,`Discount`,`TotalAmtPaid` FROM `AdmissionFees` where `receipt`='$ReceiptNo'";
		$ssql = "SELECT a.`FeeMonth`,";
		$ssql = $ssql . "(SELECT `TutionFee` FROM `fees_transaction` where `ReceiptNo`=a.`receipt` and `PBalanceReceiptNo`='') as `TutionFee`,";
		$ssql = $ssql . "(SELECT `TransportFee` FROM `fees_transaction` where `ReceiptNo`=a.`receipt` and `PBalanceReceiptNo`='') as `TransportFee`,"; 
		$ssql = $ssql . "(SELECT `AdjustedLateFee` FROM `fees_transaction` where `ReceiptNo`=a.`receipt` and `PBalanceReceiptNo`='') as `AdjustedLateFee`,";
		$ssql = $ssql . "(SELECT `PreviousBalance` FROM `fees_transaction` where `ReceiptNo`=a.`receipt` and `PBalanceReceiptNo`='') as `PreviousBalance`,";
		$ssql = $ssql . "(SELECT `Discount` FROM `fees_transaction` where `ReceiptNo`=a.`receipt` and `PBalanceReceiptNo`='') as `Discount`,";
		$ssql = $ssql . "(SELECT `DiscountReason` FROM `fees_transaction` where `ReceiptNo`=a.`receipt` and `PBalanceReceiptNo`='') as `DiscountReason`,";
		$ssql = $ssql . "(SELECT `Remarks` FROM `fees_transaction` where `ReceiptNo`=a.`receipt` and `PBalanceReceiptNo`='') as `Remarks`,";
		$ssql = $ssql . "a.`finalamount`,a.`status`";
		$ssql = $ssql . " FROM `fees_monthwise` as `a` WHERE `receipt`='$ReceiptNo'";		
		
		$rs = mysql_query($ssql);
		while($row = mysql_fetch_row($rs))
		{
					$Month= $row[0];
					$TutionFee= $row[1];
					$TransportFee= $row[2];
					$AdjustedLateFee= $row[3];
					$PreviousBalance= $row[4];
					$Discount= $row[5];
					$DiscountReason= $row[6];
					$Remarks= $row[7];
					$finalamount= $row[8];
					$status=$row[9];
					if ($status=="CANCEL")
					{
						echo "<br><br><center><b> Fee receipt no:" . $ReceiptNo . " is already cancelled in system!<br>Click <a href='FeesMenu.php'>here</a> to go back!";
						exit();
						
					}
		}
		$rs1 = mysql_query("select sum(`PaidBalanceAmt`) from `fees_transaction` where `ReceiptNo`='$ReceiptNo' and `PBalanceReceiptNo` !=''");
		while($row1 = mysql_fetch_row($rs1))
		{
			$PaidBalanceAmt=$row1[0];
		}	
		//$finalamount=$finalamount-$PaidBalanceAmt;
	}

	


?>



<script language="javascript">

function ShowReceiptDetail()
{
	if (document.getElementById("txtReciptNo").value=="")
	{
		alert("Please enter receipt no!");
		return;
	}
	document.getElementById("frmFindReceipt").submit();
}

function Validate()
{
	if (document.getElementById("txtTotalRefundAmt").value=="")
	{
		alert("Refund value is mandatory!");
		return;
	}

	document.getElementById("frmNewStudent").submit();
}



function ShowEdit(SrNo)
{



	//window.open "EditHoliday.php?srno" . SrNo;



	var myWindow = window.open("EditStudentMaster.php?srno=" + SrNo ,"","width=300,height=400");



}



function ShowDelete(SrNo)
{
	var r = confirm("Do you really want to delete the entry?");
	if (r == true)
 	 {
  		var myWindow = window.open("DeleteStudentMaster.php?srno=" + SrNo ,"","width=300,height=400");
  	 }
	else
  	{
	  	return;
  	}
}

function GetFeeDetail()
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
			        	//alert(rows);
			        	//return;
			        	
			        	arr_row=rows.split(",");
			        	document.getElementById("txtAdmissionFees").value=arr_row[4];
			        	document.getElementById("txtSecurityFeesAmount").value=arr_row[5];
						//alert(rows);														
			        }
		      }

			var submiturl="Fees/GetAdmissionFeeDetail.php?Class=" + document.getElementById("cboClass").value + "";
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
}
</script>



<html>







<head>



<meta http-equiv="Content-Language" content="en-us">



<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">



<title>Monthly Fees receipt Cancellation</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">



.style7 {



	border-left-style: none;



	border-left-width: medium;



	text-align: center;



}



.style12 {

	border-left-width: 0px;

}



.auto-style1 {
	border-collapse: collapse;
	border: 0px solid #000000;
}
.auto-style6 {
	font-size: small;
}



.auto-style7 {
	border-collapse: collapse;
	border-width: 0px;
}
.auto-style11 {
	border-style: none;
	border-width: medium;
}
.auto-style16 {
	font-size: 12pt;
	color: #000000;
	margin-left: 13px;
	font-family: Cambria;
}
.auto-style18 {
	font-weight: bold;
	font-size: 12pt;
	font-family: Cambria;
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

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;

}
.auto-style19 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
}
.auto-style20 {
	font-weight: normal;
	font-size: 12pt;
	font-family: Cambria;
}
.auto-style21 {
	font-family: Cambria;
	font-weight: normal;
	font-size: 12pt;
	color: #000000;
}
.auto-style23 {
	font-size: 12pt;
}
.auto-style25 {
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
}
.auto-style26 {
	border-style: none;
	border-width: medium;
	font-size: 12pt;
	font-family: Cambria;
}



.auto-style30 {
	border: medium solid #FFFFFF;
	color: #000000;
}
.auto-style5 {
	text-align: left;
	font-family: Cambria;
	color: #000000;
	text-decoration: underline;
	font-size: medium;
}
.auto-style3 {
	color: #000000;
}
.auto-style31 {
	font-family: Cambria;
}
.auto-style32 {
	font-size: small;
	font-family: Cambria;
	color: #000000;
}
.auto-style33 {
	font-size: 11pt;
	font-family: Cambria;
}
.auto-style34 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
}
.auto-style35 {
	text-align: center;
	border-top-style: solid;
	border-top-width: 1px;
	font-family: Cambria;
	font-weight: bold;
	font-size: 18px;
	color: #000000;
}



.auto-style36 {
	border-style: none;
	border-width: medium;
	text-align: right;
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
}
.auto-style38 {
	text-align: center;
	border-top-style: solid;
	border-top-width: 1px;
	font-family: Cambria;
	font-size: medium;
	color: #000000;
}
.auto-style17 {
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
}
.auto-style39 {
	border-style: none;
	border-width: medium;
	text-align: left;
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
}
.auto-style40 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 11pt;
	color: #CC3300;
}
.auto-style41 {
	border-style: none;
	border-width: medium;
	text-align: left;
}



.auto-style47 {
	font-family: Cambria;
	font-size: 12pt;
	color: #FFFFFF;
	text-decoration: underline;
	background-color: #CC3300;
}
.auto-style48 {
	border-style: none;
	border-width: medium;
	color: #FFFFFF;
	background-color: #CC3300;
}
.auto-style49 {
	border-style: none;
	border-width: medium;
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
	text-decoration: underline;
	background-color: #FFFFFF;
}



.style13 {
	border-style: none;
	border-width: medium;
	text-align: center;
}
.style14 {
	font-family: Cambria;
	font-size: medium;
	color: #000000;
}



.style15 {
	font-family: Cambria;
	font-size: 11pt;
	color: #000000;
	background-color: #FFFFFF;
}



.style16 {
	font-family: Cambria;
	font-size: 12pt;
	color: #000000;
	background-color: #FFFFFF;
	text-align: center;
}



</style>



</head>







<body>



<p>&nbsp;</p>



<table cellspacing="0" bordercolor="#000000" id="table_10" class="auto-style7" style="width: 100%">



	



	

	<tr>

		<td class="auto-style30">

<p class="auto-style5" style="height: 12px"><strong><font size="3">Monthly Fees 
receipt Cancellation</font></strong></p>
<hr class="auto-style3" style="height: -15px">
<p class="auto-style6" style="height: 7px"><a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></a></p>

		</table>


	
<table style="width: 100%" class="auto-style1">
			<form name="frmFindReceipt" id="frmFindReceipt" method="post" action="CancelFeesMonthwise.php" method="post">
			<tr>
			<td class="style15" style="width: 130px"><strong>Enter Receipt No:</strong></td>
			<td class="style15" style="width: 177px">
			
				<input name="txtReciptNo" id="txtReciptNo" Class="text-box" type="text"></td>
			<td class="style16">
			&nbsp;<p>
			<input name="Submit" type="button" value="Submit" onclick="Javascript:ShowReceiptDetail();" Class="text-box"></p>
			<p>&nbsp;</p>
			<p>&nbsp;</td>
			</tr>
			</form>
</table>

<?php
if ($_REQUEST["txtReciptNo"] != "")
	{
?>
<table cellspacing="0" cellpadding="0" class="style12" style="width: 100%">
	<form name="frmNewStudent" id="frmNewStudent" method="post" action="CancelledFeesReceiptMonthly.php">
	<input type="hidden" name="RecReceiptNo" id="RecReceiptNo" value="<?php echo $ReceiptNo; ?>">
	<tr>



		<td style="height: 11px;" class="auto-style35">
		<?php echo $Message1; ?></td>

	</tr>

	

		

		<tr>



		<td style="height: 29px;" class="auto-style23">



		<table style="width: 100%" class="auto-style1">

			<tr>

				<td class="auto-style49" colspan="6" style="height: 10px">



				<strong>Fee Receipt Cancellation: <?php echo $ReceiptNo; ?></strong></td>

			</tr>

			<tr>

				<td class="style13" colspan="2">



				<strong><span class="style14"><font size="3">Fee Details</font></span></strong></td>

				<td style="width: 134px" class="auto-style11">



				<strong><span class="style14"><font size="3">Cancellation Amt.</font></span></strong></td>

				<td style="width: 157px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 29px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 158px" class="auto-style11">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19">



		Fees Payment for Month</td>

				<td class="auto-style19">
			<input name="txtMonth" id="txtMonth" type="text" value="<?php echo $Month; ?>"Class="text-box"  readonly="readonly"></td>

				<td style="width: 134px" class="auto-style11">







				&nbsp;</td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



		&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19">



		Tuition Fees + Annual Charges for the Quarter:</td>

				<td class="auto-style19">







		<input name="txtTuition" id="txtTuition" type="text" Class="text-box" value="<?php echo $TutionFee; ?>" readonly="readonly"></td>

				<td style="width: 134px" class="auto-style11">







				<input name="txtRefundTuitionFee" id="txtRefundTuitionFee" Class="text-box" type="text" readonly="readonly" value="<?php echo $TutionFee; ?>"></td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



		&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19" style="height: 27px">



		Transport Fees:</td>

				<td class="auto-style19" style="height: 27px">







		<input name="txtTransportFees" id="txtTransportFees" type="text" Class="text-box" readonly="readonly" value="<?php echo $TransportFee; ?>"></td>

				<td style="width: 134px; height: 27px;" class="auto-style11">







				<input name="txtRefundTransportFees" id="txtRefundTransportFees" Class="text-box" type="text" readonly="readonly" value="<?php echo $TransportFee; ?>"></td>

				<td style="width: 157px; height: 27px;" class="auto-style36">



				</td>

				<td class="auto-style11" colspan="2" style="height: 27px">



				</td>

			</tr>

			<tr>

				<td class="auto-style19">



		Adjusted Late Fees Charge</td>

				<td class="auto-style19">







		<input name="txtAdjustedLateFee" type="text" Class="text-box" value="<?php echo $AdjustedLateFee; ?>" readonly="readonly"></td>

				<td style="width: 134px" class="auto-style11">







				<input name="txtRefundLateFee" Class="text-box" type="text" value="<?php echo $AdjustedLateFee; ?>" readonly="readonly"></td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19">



		Previous Balance</td>

				<td class="auto-style19">







		<input name="txtPreviousBalance" type="text" Class="text-box" value="<?php echo $PreviousBalance; ?>" readonly="readonly" ></td>

				<td style="width: 134px" class="auto-style11">







				<input name="txtRefundPreviousBalance" Class="text-box" type="text" value="<?php echo $PreviousBalance; ?>" readonly="readonly"></td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19">



				Discount</td>

				<td class="auto-style19">







		<input name="txtDiscount" id="txtDiscount" type="text" Class="text-box" readonly="readonly" value="<?php echo $Discount; ?>"></td>

				<td style="width: 134px" class="auto-style11">







				<input name="txtRefundDiscount" id="txtRefundDiscount" Class="text-box" type="text" readonly="readonly" value="<?php echo $Discount; ?>"></td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19">



		Discount Reason</td>

				<td style="width: 63px" class="auto-style11">



		<input name="txtDiscountReason" id="txtDiscountReason" Class="text-box" value="<?php echo $DiscountReason; ?>" type="text"></td>

				<td style="width: 134px" class="auto-style11">



				&nbsp;</td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			<tr>

				<td class="auto-style19">



		Remarks</td>

				<td class="auto-style11" colspan="5">



		<textarea name="txtRemarks" id="txtRemarks" rows="2" Class="text-box" cols="20"><?php echo $Remarks; ?></textarea></td>

			</tr>

			<tr>

				<td class="auto-style19">



		Balance Amount Paid</td>

				<td class="auto-style11" colspan="5">



		<input name="txtBalanceAmtPaid" id="txtBalanceAmtPaid" Class="text-box" type="text" value="<?php echo $PaidBalanceAmt;?>"></td>

			</tr>

			<tr>

				<td class="auto-style19">



				Total Amt.</td>

				<td style="width: 63px" class="auto-style11">



				<input name="txtTotalAmt" id="txtTotalAmt" type="text" Class="text-box" readonly="readonly" value="<?php echo $finalamount; ?>"></td>

				<td style="width: 134px" class="auto-style11">



				<input name="txtTotalRefundAmt" id="txtTotalRefundAmt" type="text" readonly="readonly" Class="text-box" value="<?php echo $finalamount; ?>"></td>

				<td style="width: 157px" class="auto-style36">



				&nbsp;</td>

				<td class="auto-style11" colspan="2">



				&nbsp;</td>

			</tr>

			</table>

		</td>

		

		</tr>

		

		<tr>

		

		

		<td><br class="auto-style31">

</td>



</tr>

<tr>

		<td style="width: 158px; height: 29px;" class="style7">



		<input name="BtnSubmit" type="button" Class="text-box" value="Submit" onclick="Validate();" class="auto-style32" style="width: 73px"></td>



	</tr>



	</form>



</table>
<?php
}
?>


<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld Technologies LLP</font></div>

</div>

</body>







</html>