﻿<?php include '../connection.php';?>
<?php
$AdmissionNo=$_REQUEST["txtAdmissionNo"];
$Quarter=$_REQUEST["cboQuarter"];
if($Quarter=="Q1")
	$InstallmentName="FEES FIRST INSTALLMENT";
elseif($Quarter=="Q2")
	$InstallmentName="FEES SECOND INSTALLMENT";
elseif($Quarter=="Q3")
	$InstallmentName="FEES THIRD INSTALLMENT";
elseif($Quarter=="Q4")
	$InstallmentName="FEES FOURTH INSTALLMENT";

$merchantTxnId = uniqid(); 

		$sqlStudentDetail = "select `sfathername`,`sname`,`sclass`,`srollno` from  `student_master` where `sadmission`='$AdmissionNo'";
		$rsStudentDetail = mysql_query($sqlStudentDetail);

		while($rows = mysql_fetch_row($rsStudentDetail))
		{
			$FatherName=$rows[0];
			$Name=$rows[1];
			$Class=$rows[2];
			$RollNo=$rows[3];
			break;
		}
		$rsSchoolDetail = mysql_query("select `PREFIX`,`SchoolName`,`SchoolAddress`,`PhoneNo`,`LogoURL`,`AccountNo`,`AffiliationNo`,`SchoolNo`,`website` from `SchoolConfig` where `SchoolId`='$SchoolId'");
		while($rows = mysql_fetch_row($rsSchoolDetail))
		{
			$PREFIX=$rows[0];
			$SchoolName=$rows[1];
			$SchoolAddress=$rows[2];
			$PhoneNo=$rows[3];
			$LogoURL=$rows[4];
			$AccountNo=$rows[5];
			$AffiliationNo=$rows[6];
			$SchoolNo=$rows[7];
			$website=$rows[8];
			break;
		}
		
	$PaymentMode="Online";

	$rsFY=mysql_query("select `year` from `FYmaster` where `Status`='Active'");
	$rowFY=mysql_fetch_row($rsFY);
	$FinancialYear = $rowFY[0];
	$currentdate=date("Y-m-d");
	
	$InstallmentWithoutLateFee=$_REQUEST["InstallmentWithoutLateFee"];
	$LateFee=$_REQUEST["LateFee"];
	$InstallmentAmountWithLateFee=$_REQUEST["InstallmentAmount"];



//if ($_REQUEST["SubmitType"]=="Final")
//{
	
	$NewReciptNo="";

	
	$sstr="select * from `fees` where `sadmission`='$AdmissionNo' and `quarter`='$Quarter' and `FinancialYear`='$FinancialYear' and `FeesType` !='Hostel' and `cheque_status` !='Bounce'";
	$rs = mysql_query($sstr);
		if (mysql_num_rows($rs) > 0)
		{
			echo "<br><br><center><b>Fee already submitted for Admission Id:" . $AdmissionNo . ",Quarter:" . $Quarter . ",Financial Year:" . $FinancialYear;
			exit();
		}
	
	
	$currentDateTime=date("Y-m-d h:i:sa");
	$ssqlR="INSERT INTO `fees_receipt_code` (`sadmission` ,`ReceiptNo`) VALUES('$AdmissionNo','$NewReciptNo')";
	//mysql_query($ssqlR) or die(mysql_error());
	
	$ssql="INSERT INTO `fees_temp` (`sadmission` ,`sname` ,`sclass`,`srollno`,`fees_amount`,`InstallmentAmount`,`amountpaid`,`quarter`,`date`,`datetime`,`FinancialYear`,`status`,`receipt`,`finalamount`,`ReceiptFileName`,`PaymentMode`,`ActualLateFee`,`AdjustedLateFee`,`Remarks`,`FeesType`,`TxnAmount`,`TxnId`,`InstallmentName`) VALUES ('$AdmissionNo','$Name','$Class','$RollNo','$InstallmentWithoutLateFee','$InstallmentWithoutLateFee','$InstallmentAmountWithLateFee','$Quarter','$currentdate','$currentDateTime','$FinancialYear','Paid','$NewReciptNo','$InstallmentAmountWithLateFee','$PDFFileName','$PaymentMode','$LateFee','$LateFee','$Remarks','Regular','$InstallmentAmountWithLateFee','$merchantTxnId','$InstallmentName')";	
	mysql_query($ssql) or die(mysql_error());
	
	$ssql1="INSERT INTO `fees_transaction_temp` (`sadmission`,`ReceiptNo`,`ReceiptDate`,`TutionFee`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`PreviousBalance`,`CurrentBalance`,`Remarks`,`chequeno`,`bankname`,`FinancialYear`,`cheque_date`,`cheque_status`,`PaymentMode`,`TxnAmount`,`TxnId`) VALUES ('$AdmissionNo','$NewReciptNo','$currentdate','$TuitionFee','$LateFee','$LateDays','$AdjustedLateFee','$AdjustedLateDays','$PreviousBalance','$BalanceAmount','$Remarks','$ChequeNo','$BankName','$FinancialYear','$ChequeDate','$CheckStatus','$PaymentMode','$PayingAmount','$merchantTxnId')";
	//mysql_query($ssql1) or die(mysql_error());
	$ssql2="INSERT INTO `fees_student` (`sadmission`,`class`,`Name`,`feeshead`,`amount`,`financialyear`,`FeesType`) VALUES ('$AdmissionNo','$Class','$Name','$InstallmentName','$feestuednAmount','$FinancialYear','Regular')";
	//mysql_query($ssql2) or die(mysql_error());
//}

//-------------------- Previous Payment history----------------------------------------------------------
	$ssql = "SELECT `quarter`,`fees_amount`,`amountpaid`,`BalanceAmt`,`status`,`receipt`,date_format(`date`,'%d-%m-%Y') as `date`,`FinancialYear` FROM `fees` where `sadmission`='$AdmissionNo' order by `quarter`,`FinancialYear` desc limit 4";
	$rs = mysql_query($ssql);
	
//****************

	$orderAmount=$InstallmentAmountWithLateFee;
	//$orderAmount=1;
	$SubmitStatus="successfull";
			
			set_include_path('../lib'.PATH_SEPARATOR.get_include_path());
             //Need to replace the last part of URL("your-vanityUrlPart") with your Testing/Live URL
             $formPostUrl = "https://www.citruspay.com/totalsoft";	
             
             //Need to change with your Secret Key
             $secret_key = "ac3d61806bd38e9dd0c3b3a8d42082143b5ba3a9";
             
             //Need to change with your Vanity URL Key from the citrus panel
             $vanityUrl = "totalsoft";
					

             //Need to change with your Order Amount
             
             $currency = "INR";
             $data= $vanityUrl.$orderAmount.$merchantTxnId.$currency;
             $securitySignature = hash_hmac('sha1', $data, $secret_key);
	
?>

<script language="javascript">
	function fnlsubmitform()
	{
		if(document.getElementById("SubmitStatus").value=="successfull")
		{
			document.getElementById("frmPayment").submit();
		}
	}
</script>

<html>
<head></head>
<body onload="Javascript:fnlsubmitform();">

			<form name="frmPayment" id="frmPayment" align="center" method="post" action="<?php echo $formPostUrl; ?>">
			 <div class="style1">
				<font size="3"><strong>
			 <input type="hidden" name="SubmitStatus" id="SubmitStatus" value="<?php echo $SubmitStatus;?>">
	         <input type="hidden" id="merchantTxnId" name="merchantTxnId" value="<?php echo $merchantTxnId; ?>" />
             <input type="hidden" id="orderAmount" name="orderAmount" value="<?php echo $orderAmount; ?>" />
             <input type="hidden" id="currency" name="currency" value="<?php echo $currency; ?>" />
			 <input type="hidden" id="firstName" name="firstName" value="<?php echo $Name;?>" />
			 <input type="hidden" id="lastName" name="lastName" value="." />
			 <input type="hidden" id="Name" name="Name" value="<?php echo $Name;?>" />
             <input type="hidden" name="returnUrl" value="http://dpsfsis.com/Users/FeesReceiptUser.php" />
             <!--<input type="hidden" name="notifyUrl" value="http://dpsfsis.com/AdmissionFeeNotifyResponse.php" />-->
             <input type="hidden" id="secSignature" name="secSignature" value="<?php echo $securitySignature; ?>" />
			 <input type="hidden" name="customParams[0].name" value="AdminNo" /> 
			 <input type="hidden" name="customParams[0].value" value="NA" />			 		
			 	             
	             <!--<input type="Submit" value="Pay Now"/>-->
	             Please wait Payment is in progress</strong></font></div>
			</form>
</body>
</html>




