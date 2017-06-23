<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   <title>Employee Portal</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
</head>

<body>
<div id="container">
<!----Header--------->
 <div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="cont">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="#"><button class="btnmanu">My Letters</button></a></li>
   <li class="active"><a href="HRISmydetail.php"><button class="btnmanu">My Details</button></a></li>
   <li><a href="HRISsalarylatter.php"><button class="btnmanu">Salary Letters</button></a></li>
   <li><a href="#"><button class="btnmanu">Hr Policies &amp; User Guides</button></a></li>
  </ul>
 </div>
 <!------------------------->
 <div class="col-md-10">
  <div class="hris-topmanu">
  <ul>
   <li><a href="HRISmydetail.php"><button class="btnmanu">Basic Details</button></a></li>
   <li><a href="HRISpositiondetail.php"><button class="btnmanu">Position Details</button></a></li>
   <li><a href="HRIScontactdetail.php"><button class="btnmanu">Contact Details</button></a></li>
   <li><a href="HRISemploymentdetail.php"><button class="btnmanu">Employment Details</button></a></li>
   <li><a href="HRISeducationdetail.php"><button class="btnmanu">Education Details</button></a></li>
   <li class="active"><a href="HRISbankdetail.php"><button class="btnmanu">Bank Details</button></a></li>
   <li><a href="HRISiddetail.php"><button class="btnmanu">ID Details</button></a></li>
  </ul>
  </div>
  <!------>
  <div class="show-bankdetails">
   <div class="basic position">
   <div><strong>BANK DETAILS:</strong>&nbsp; <?php echo $tn; ?></div>
   <div class="active"><a href="#">View</a></div>
    <!--<ul>
     <li class="active"></li>
     <li><a href="HRISbasicdetailmodify.php">Modify</a></li>
    </ul>
  </div>-->
  </div>
  <!------>
  <!------>
  <div class="showdetail">
   <div class="cdetails"> 
    <table>
     <tr class="col">
      <td>Name Of Bank</td>
      <td>Ifsc Code</td>
      <td>Account Type</td>
      <td>Account No.</td>
      <td>Branch Name</td>
      <td>Branch Address</td>
      <td>Payee Name</td>
      <td>Action</td>
     </tr>
     <tr>
      <td><b><?php echo $tbn; ?></b></td>
      <td><?php echo $tifsc; ?></td>
      <td><?php echo $tat; ?></td>
      <td><?php echo $tean; ?></td>
      <td><?php echo $tbb; ?></td>
      <td><?php echo $tbba; ?></td>
      <td><?php echo $tpn; ?></td>
      <td></td>
     </tr>
     
    </table>
   </div>
  </div>
  <!------------->
 
  <!------------------>
 </div>
</div>
</div>
</div>
</div>
</body>
</html>
<div><?php include 'footer.php'; ?></div>