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
   <li><a href="LibrarySetup_Name.php"><button class="btnmanu">Define Library Name </button></a></li>
   <li><a href="Define_Libaray_Subject.php"><button class="btnmanu">Define Library Subjects </button></a></li>
   <li class="active"><a href="Define_Author.php"><button class="btnmanu">Define Authors  </button></a></li>
   <li><a href="Define_Language.php"><button class="btnmanu">Define Languages </button></a></li>
   <li><a href="Define_Periodical.php"><button class="btnmanu">Define Periodicals  </button></a></li>
   <li><a href="Define_Publisher.php"><button class="btnmanu">Define Publishers  </button></a></li>
   <li><a href="Define_Shelf.php"><button class="btnmanu">Define Shelf  </button></a></li>
   <li><a href="Define_Book_ID.php"><button class="btnmanu">Define Book Unique ID  </button></a></li>
   <li><a href="Define_Library_Vendor.php"><button class="btnmanu">Define Library Vendors  </button></a></li>
   <li><a href="Define_Department.php"><button class="btnmanu">Define Departments  </button></a></li>
   <li><a href="Define_DDC.php"><button class="btnmanu">Define DDC  </button></a></li>
   <li><a href="Book_Transfer.php"><button class="btnmanu">Book Transfer  </button></a></li>
   <li><a href="Define_Study_Material.php"><button class="btnmanu">Define Study Materials  </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  	<div class="librarysetup">
    	<div class="librarysetup_head">Add Author</div>
        <div class="librarysetup_input1">
        	<form action="" method="post">
	        	<div class="row">
                	<div class="col-xs-6"><b>1. &nbsp; Add First Name:</b></div>
                    <div class="col-xs-6"><input type="text" name="addFirstName" id="addFirstName" class="text-box" value=""></div>
                </div>
	        	<div class="row">
                	<div class="col-xs-6"><b>2. &nbsp; Add Last Name:</b></div>
                    <div class="col-xs-6"><input type="text" name="addLastName" id="addLastName" class="text-box" value=""></div>
                </div>
	        	<div class="row">
                	<div class="col-xs-6"><b>3. &nbsp; Author Code:</b></div>
                    <div class="col-xs-6"><input type="text" name="authorCode" id="authorCode" class="text-box" value=""></div>
                </div>
	        	<div class="row">
                    <div class="col-xs-12" align="center"><input type="submit" name="submit" id="submit" class="btn"></div>
                </div>
            </form>           
        </div>
        <div class="librarysetup_table1">
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
														<th>Sr. No.</th>
														<th>First Name</th>
														<th>Last Name</th>
														<th>Name</th>
                                                        <th>Author Code</th>
													</tr>
												</thead>
												<tbody>
                                                    <tr>
                                                        <td>1.</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                        <td>ASDDFG ASDF</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2.</td>
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
<?php include '../footer.php'; ?>

 
 
 
 




