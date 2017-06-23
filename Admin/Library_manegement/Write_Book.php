<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title>Library Management</title><link rel="icon" href="../images/l1.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <link rel="stylesheet" href="../css/jquery.dataTables.min.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
   <script src="../js/jquery.dataTables.min.js"></script>
   <script src="../js/dataTables-data.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
<div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="BookIssue_Return.php"><button class="btnmanu">Book Issue </button></a></li>
   <li><a href="Book_Return.php"><button class="btnmanu">Book Return </button></a></li>
   <li><a href=""><button class="btnmanu">Book Lost </button></a></li>
   <li><a href="Search_Book.php"><button class="btnmanu">Search a Book  </button></a></li>
   <li><a href="Book_Issue_Staff.php"><button class="btnmanu">Book Issue To Staff  </button></a></li>
   <li class="active"><a href="Write_Book.php"><button class="btnmanu">Write Off Book  </button></a></li>
   <li><a href="Reactive_Write_Book.php"><button class="btnmanu">Reactive Write off Book  </button></a></li>
   <li><a href="Search_Book_Jiva.php"><button class="btnmanu">Search a Book Jiva  </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  	<div class="librarysetup">
    	<div class="librarysetup_head">Library Write off Book</div>
        <div class="librarysetup_input2">
        	<form action="" method="post">
                <div class="row">
                	<div class="col-xs-3"><b>Select Library:</b></div>
                    <div class="col-xs-3"><Select name="LibraryName" id="LibraryName" class="text-box" value="">
                    					  	<option value="">Select Library</option>
                                          </Select>
                    </div>
                	<div class="col-xs-3"><b>Select Class:</b></div>
                    <div class="col-xs-3"><Select name="class" id="class" class="text-box" value="">
                    					  	<option value="">Select Class</option>
                                          </Select>
                    </div>
                </div>
	        	<div class="row">
                	<div class="col-xs-3"><b>Accession No.:</b></div>
                    <div class="col-xs-3"><input type="text" name="accessionNo" id="accessionNo" class="text-box" value=""></div>
                	<div class="col-xs-3"><b>Bill No.:</b></div>
                    <div class="col-xs-3"><input type="text" name="billNo" id="billNo" class="text-box" value=""></div>
                </div>
	        	<div class="row">
                    <div class="col-xs-12" align="center"><input type="submit" name="submit" id="submit" class="btn"></div>
                </div>
                <div id="a"></div>
            </form>                
        </div>
        <div class="librarysetup_table3">
        	<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr class="col">
														<th>Sr._No.</th>
                                                        <th>Write_off_Book</th>
                                                        <th>Library_Name</th>
                                                        <th>Class</th>
                                                        <th>Accession_No.</th>
                                                        <th>Subject</th>
                                                        <th>Subject_Sub_category</th>
                                                        <th>Book_Name</th>
                                                        <th>Sub_Title</th>
                                                        <th>Author</th>
                                                        <th>Publisher</th>
                                                        <th>Vendor</th>
                                                        <th>Donated_Book</th>
                                                        <th>Shelf_Rack</th>
                                                        <th>Shelf_Row</th>
                                                        <th>Book_type</th>
                                                        <th>Language</th>
                                                        <th>Purchase_Date</th>
                                                        <th>ISBN_No</th>
                                                        <th>Bill_Date</th>
                                                        <th>Bill_No.</th>
                                                        <th>Purchase_Order_No.</th>
                                                        <th>Volume</th>
                                                        <th>Edition_No.</th>
                                                        <th>Remarks</th>
                                                        <th>Price</th>
													</tr>
												</thead>
												<tbody>
                                                    <tr>
                                                        <td>1.</td>
                                                        <td><a href="#" class="btn">Write off Book</a></td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                    </tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- /Row -->
        </div>
    </div>
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
<?php include '../footer.php' ?>
<script>

var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();
if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;
var today = year + "-" + month + "-" + day;
document.getElementById('bookIssueDate').value = today;


</script>

 
 
 
 




