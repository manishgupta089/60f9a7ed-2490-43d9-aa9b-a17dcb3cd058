<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Payroll</title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../../../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../../../css/payroll.css" />
   <script src="../../../js/bootstrap.min.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
 <div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="cont">
<div class="row newemployee">
 <div class="col-md-2 hris-topmanu"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="HRISbasicdetail.php"><button class="btnmanu">Basic Details</button></a></li>
   <li><a href="HRISpositiondetail.php"><button class="btnmanu">Position Details</button></a></li>
   <li><a href="HRIScontactdetail.php"><button class="btnmanu">Contact Details</button></a></li>
   <li><a href="HRISemploymentdetail.php"><button class="btnmanu">Employment Details</button></a></li>
   <li><a href="HRISeducationdetail.php"><button class="btnmanu">Education Details</button></a></li>
   <li class="active"><a href="HRISbankdetail.php"><button class="btnmanu">Bank Details</button></a></li>
   <li><a href="HRISiddetail.php"><button class="btnmanu">ID Details</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <!------>
  <div class="show-contactdetails">
   <form action="#" method="post">
   <div id="myProgress">
	 <div id="myBar" style="width:<?php $x=70; echo $x; ?>%" ><font style="float:right; color:#fff; margin-right:15%;"><?php echo $x; ?>% Complete Your Profile</font></div>
	</div>
  <!------>
   <div class="basic position"><strong>BANK DETAILS:</strong> </div>
  <!------>
  <div class="showdetail1">
   <div class="cdetails"> 
    <div>
    <table>
     <tr>
      <td>Name Of Bank</td><td>:</td>
      <td><input type="text" name="nameofbank" class="text-box" placeholder="Name Of Bank"></td>
     </tr>
     <tr>
      <td>Ifsc Code</td><td>:</td>
      <td><input type="text" name="ifsccode" class="text-box" placeholder="Ifsc Code"></td>
     </tr>
     <tr>
      <td>Branch Name</td><td>:</td>
      <td><input type="text" name="branchname" placeholder="Branch Name" class="text-box"  ></td>
     </tr>
     <tr>
      <td>Payee Name</td><td>:</td>
      <td><input type="text" name="payeename" placeholder="Payee Name" class="text-box"  ></td>
     </tr>
    </table>
    </div>
    <div>
    <table>
     <tr>
      <td>Account Type</td><td>:</td>
      <td><select name="accounttype" class="text-box tbs" >
      	  	<option value="">Select One</option>
            <option value="Current">Current Account</option>
            <option value="Saving">Saving  Account</option>
            <option value="Recurring">Recurring Deposit Account</option>
            <option value="Fixed Deposit">Fixed Deposit Account</option>
          </select></td>
     </tr>     
     <tr>
      <td>Account No.</td><td>:</td>
      <td><input type="text" name="accountno" class="text-box" placeholder="Account No." ></td>
     </tr>
      <tr>
      <td>Branch Address</td><td>:</td>
      <td><textarea name="branchaddress" class="text-box" placeholder="Branch Address"></textarea> </td>
     </tr>
    </table>
    </div>
    <div align="center" style="margin-top:2%; width:100%">
     <a id="submit" onClick="window.open('HRISiddetail.php', '_top');" class="btn">Submit</a>
    </div>
   </div>
  </div>
  </form>
  <!------------->
   <!------------------>
 </div>
 </div>
 </div>
 </div>
</div> 
<div><?php include '../../footer.php'; ?></div>
</body>
</html>