<?php session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Language" content="en-us">

<title>DPS Submition Detail</title>
<link rel="stylesheet" href="../bootstrap/bootstrap.min.css" />
    <script src="../bootstrap/bootstrap.min.js"></script>
</head>
<style>
body{font-family:Arial;}
#container{margin:5% 23%; line-height:2;  font-size:16px; border:5px groove #0b462d; border-radius:5px; padding:1%;}
#container img{width:80%;}
.head {font-family:Arial; font-style:italic; font-size:18px; font-weight:bold; margin-bottom:1%; }
.inner{padding:1% 2%;} .text1{text-align:center}
.text2{margin:1% 0; background:#0b462d; padding:0.5%; text-align:center; color:#fff; font-size:18px; font-weight:bold;}
.col-xs-6:nth-child(odd){font-weight:bold;}
.col-xs-6{margin:0.7% 0;}
.text3{font-size:16px; font-weight:bold; margin:1% 0; background:#0b462d; color:#fff; text-align:center;}
@media only screen and (min-width:400px) and (max-width: 720px){#container{margin:1% 5%; font-size:14px;} .head{font-size:16px;}
.text2{font-size:16px;} .text3{font-size:16px;}}
@media only screen and (min-width:200px) and (max-width: 400px){#container{margin:5% 5%; font-size:12px;} .head{font-size:14px;}
.text2{font-size:14px;} .text3{font-size:14px;} .xs{font-size:10px;} }	
</style>
<body>
 <div id="container">
  <div align="center"><img src="../images/NewLogo.jpg" /></div>
  <div class="inner">
    <div class="head">Congratulations!</div>
    <div class="text1"><i>You have successfully registered for <b>Class <?php echo $class; ?></b> admission.</i><br> Your Application Number is <b><?php echo $RegistrationNo; ?>.</b> </div>
    <div class="text2"><font><b>Transaction details </b></font></div>
    <div class="row" >
     <div class="col-xs-6"> Transaction Number :</div>
     <div class="col-xs-6"><?php echo $TxnId; ?></div>
    </div>
    <div class="row" >
     <div class="col-xs-6 xs"> Transaction Reference ID :</div>
     <div class="col-xs-6"><?php echo $TxRefNo; ?></div>
    </div>
    <div class="row" >
     <div class="col-xs-6"> Amount :</div>
     <div class="col-xs-6"><?php echo $TxnAmount; ?></div>
    </div>
    <div class="row" >
     <div class="col-xs-6"> Status :</div>
     <div class="col-xs-6"><?php echo $TxnStatus; ?></div>
    </div>
    <div class="text3">For further updates visit school website regularly. </div>
  </div>
 </div>
</body>
</html>
