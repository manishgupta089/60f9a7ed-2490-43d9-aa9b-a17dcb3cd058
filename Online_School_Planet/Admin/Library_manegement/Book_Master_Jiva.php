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
<style>
.librarysetup .librarysetup_table3 table td .btn{padding:2% 10% !important; width:50px;}
</style>

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
   <li><a href="Report_Book.php"><button class="btnmanu">Books In Circulation </button></a></li>
   <li><a href="Overdue_Book.php"><button class="btnmanu">Overdue Books </button></a></li>
   <li><a href="Issue_Return_History.php"><button class="btnmanu">Issue / Return History  </button></a></li>
   <li><a href="Book_Master.php"><button class="btnmanu">Book Master  </button></a></li>
   <li class="active"><a href="Book_Master_Jiva.php"><button class="btnmanu">Book Master Jiva  </button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  	<div class="librarysetup">
    	<div class="librarysetup_head">Library Book Information</div>
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
                                                        <th>Library_Name</th>
                                                        <th>Location_Code</th>
                                                        <th>Date</th>
                                                        <th>Source_Weedout</th>
                                                        <th>Accession_No.</th>
                                                        <th>Responsibility</th>
                                                        <th>MIMN</th>
                                                        <th>Class_No.</th>
                                                        <th>Book_No.</th>
                                                        <th>Volume_No.</th>
                                                        <th>Pagination</th>
                                                        <th>Student_Class</th>
                                                        <th>Subject_Name</th>
                                                        <th>Keyword</th>
                                                        <th>Hindi_Book_Author</th>
                                                        <th>Author1</th>
                                                        <th>Author2</th>
                                                        <th>Author3</th>
                                                        <th>Corporate_Author</th>
                                                        <th>Title</th>
                                                        <th>Sub_Title</th>
                                                        <th>Place</th>
                                                        <th>Publisher</th>
                                                        <th>Year_Of_Edition.</th>
                                                        <th>Edition_Book</th>
                                                        <th>Bill_Date</th>
                                                        <th>Cost</th>
                                                        <th>ISBN_No</th>
                                                        <th>Series_Title</th>
                                                        <th>Bill_No</th>
                                                        <th>Remark</th>
													</tr>
												</thead>
												<tbody>
                                                    <tr>
                                                        <td>1.</td>
                                                        <td> ASDF</td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
                                                        <td>ASDDFG </td>
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

 
 
 
 




