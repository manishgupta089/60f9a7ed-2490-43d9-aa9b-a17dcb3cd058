﻿<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>

<?php
$Class=$_REQUEST["txtClass"];
	$ssql="SELECT distinct `subject` FROM `report_card_temp` where `sclass`='$Class'";
		$rs= mysql_query($ssql);
		if(mysql_num_rows($rs)>0)
		{
			$cnt=1;
			while($row = mysql_fetch_array($rs))
			  {
			  	$arrSubject[$cnt]=$row[0];
			  	$cnt=$cnt+1;
			  }
			  
		}
		
	///Top 5 Student******
		$sql="SELECT `srollno` FROM `report_card_rank` ORDER BY `PercentObtained` desc limit 5";
		$rsl1= mysql_query($sql);
			$RollNo="";
			while($row = mysql_fetch_array($rsl1))
			  {
			  	$RollNo=$RollNo . $row[0].",";
			  }
			  $AllRollNos=substr($RollNo,0,strlen($RollNo)-1);
		
		$ssql="SELECT distinct `sname`,`sclass`,`srollno` FROM `report_card_temp` where `sclass`='$Class' and `srollno` in ($AllRollNos)";
		$rs1= mysql_query($ssql);
	////////////////////////	
	//Bottom 5 Student
		$sql="SELECT `srollno` FROM `report_card_rank` ORDER BY `PercentObtained` limit 5";
		$rsl2= mysql_query($sql);
			$RollNo="";
			while($row = mysql_fetch_array($rsl2))
			  {
			  	$RollNo=$RollNo . $row[0].",";
			  }
			  $AllRollNos=substr($RollNo,0,strlen($RollNo)-1);
		
		$ssql="SELECT distinct `sname`,`sclass`,`srollno` FROM `report_card_temp` where `sclass`='$Class' and `srollno` in ($AllRollNos)";
		$rsBottom= mysql_query($ssql);
	///////////////////////		
			  
		
		
		/*
		for($i=1;$i <= count($arrSubject);$i++)
		{
			echo $arrSubject[$i];
			echo "<br>";
		}
		exit();
		*/
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Roll</title>
</head>

<body>
<table border="1" style="border-collapse: collapse">
<tr>
<td colspan="123" align="left"><b>Top Five Student</b></td>
</tr>
<tr>
<th rowspan="3">Roll.No.</th>
<th rowspan="3">Name</th>
<th rowspan="3">Father Name</th>
<?php
	for($i=1;$i < count($arrSubject);$i++)
		{
			$Subject = str_replace(" ","",$arrSubject[$i]);
?>
<th colspan="24"><?php echo $Subject;?></th>
	<?php } ?>
</tr>

<tr>
<?php
	for($i=1;$i < count($arrSubject);$i++)
		{
			$Subject = str_replace(" ","",$arrSubject[$i]);
?>
<th colspan="3">FA1</th>
<th colspan="3">FA2</th>
<th colspan="3">SA1</th>
<th colspan="3">Term1</th>
<th colspan="3">FA3</th>
<th colspan="3">FA4</th>
<th colspan="3">SA2</th>
<th colspan="3">Term2</th>
<?php } ?>
</tr>

<tr>
<?php
	for($i=1;$i < count($arrSubject);$i++)
		{
			$Subject = str_replace(" ","",$arrSubject[$i]);
			
?>
<th>M</th>
<th>%</th>
<th>G</th>
<th>M</th>
<th>%</th>
<th>G</th>
<th>M</th>
<th>%</th>
<th>G</th>
<th>M</th>
<th>%</th>
<th>G</th>
<th>M</th>
<th>%</th>
<th>G</th>
<th>M</th>
<th>%</th>
<th>G</th>
<th>M</th>
<th>%</th>
<th>G</th>
<th>M</th>
<th>%</th>
<th>G</th>
<?php } ?>
</tr>
<?php
mysql_query("truncate table `report_card_rank`") or die(mysql_error());
while($row = mysql_fetch_array($rs1))
  {
  	$StudentName=$row[0];
  	$StudetnClass=$row[1];
  	$StudetnRollNo=$row[2];
  	$rsFName= mysql_query("select `sfathername` from `student_master` where `sclass`='$StudetnClass' and `srollno`='$StudetnRollNo'");
  	while($rowF=mysql_fetch_array($rsFName))
  	{
  		$FatherName=$rowF[0];
  		break;
  	}  			
?>
<tr>
<td><?php echo $StudetnRollNo;?></td>
<td><?php echo $StudentName;?></td>
<td><?php echo $FatherName;?></td>
	<?php
		$FA1_MarksObtained=0;
		$FA2_MarksObtained=0;
		$FA3_MarksObtained=0;
		$FA4_MarksObtained=0;
		$SA1_MarksObtained=0;
		$SA2_MarksObtained=0;
		$FA1_convertedmarks=0;
		$FA2_convertedmarks=0;
		$SA1_convertedmarks=0;
		$SumOfMaxMarks=0;
		$SumOfObtainedMarks=0;
		
		for($i=1;$i < count($arrSubject);$i++)
			{
				$Subject = $arrSubject[$i];
				$rsFA1= mysql_query("select `MarksObtained`,`convertedmarks`,`Grade`,`MaxMarks` from `report_card_temp` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='FA1'");
				$rsFA2= mysql_query("select `MarksObtained`,`convertedmarks`,`Grade`,`MaxMarks` from `report_card_temp` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='FA2'");
				$rsFA3= mysql_query("select `MarksObtained`,`convertedmarks`,`Grade`,`MaxMarks` from `report_card_temp` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='FA3'");
				$rsFA4= mysql_query("select `MarksObtained`,`convertedmarks`,`Grade`,`MaxMarks` from `report_card_temp` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='FA4'");
				$rsSA1= mysql_query("select `MarksObtained`,`convertedmarks`,`Grade`,`MaxMarks` from `report_card_temp` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='SA1'");
				$rsSA2= mysql_query("select `MarksObtained`,`convertedmarks`,`Grade`,`MaxMarks` from `report_card_temp` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='SA2'");
				while($row1 = mysql_fetch_array($rsFA1))
  				{
  					$FA1_MarksObtained=$row1[0];
  					$FA1_convertedmarks=$row1[1];
  					$FA1_Grade=$row1[2];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row1[3];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row1[0];
  					break;
  				}
  				while($row2 = mysql_fetch_array($rsFA2))
  				{
  					$FA2_MarksObtained=$row2[0];
  					$FA2_convertedmarks=$row2[1];
  					$FA2_Grade=$row2[2];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row2[3];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row2[0];
  					break;
  				}
  				while($row3 = mysql_fetch_array($rsFA3))
  				{
  					$FA3_MarksObtained=$row3[0];
  					$FA3_convertedmarks=$row3[1];
  					$FA3_Grade=$row3[2];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row3[3];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row3[0];
  					break;
  				}
  				while($row4 = mysql_fetch_array($rsFA4))
  				{
  					$FA4_MarksObtained=$row4[0];
  					$FA4_convertedmarks=$row4[1];
  					$FA4_Grade=$row4[2];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row4[3];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row4[0];
  					break;
  				}
  				while($row5 = mysql_fetch_array($rsSA1))
  				{
  					$SA1_MarksObtained=$row5[0];
  					$SA1_convertedmarks=$row5[1];
  					$SA1_Grade=$row5[2];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row5[3];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row5[0];
  					break;
  				}
  				while($row6 = mysql_fetch_array($rsSA2))
  				{
  					$SA2_MarksObtained=$row6[0];
  					$SA2_convertedmarks=$row6[1];
  					$SA2_Grade=$row6[2];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row6[3];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row6[0];
  					break;
  				}
	?>
<td><?php echo $FA1_MarksObtained;?></td>
<td><?php echo $FA1_convertedmarks;?></td>
<td><?php echo $FA1_Grade;?></td>
<td><?php echo $FA2_MarksObtained;?></td>
<td><?php echo $FA2_convertedmarks;?></td>
<td><?php echo $FA2_Grade;?></td>
<td><?php echo $SA1_MarksObtained;?></td>
<td><?php echo $SA1_convertedmarks;?></td>
<td><?php echo $SA1_Grade;?></td>
<td><?php echo ($FA1_MarksObtained+$FA2_MarksObtained+$SA1_MarksObtained); ?></td>
<td><?php echo ($FA1_convertedmarks+$FA2_convertedmarks+$SA1_convertedmarks); ?></td>
	<td>
		<?php 
			$Term1TotalObtainedPercent= 2*($FA1_convertedmarks+$FA2_convertedmarks+$SA1_convertedmarks);
			$rsTerm1Grade=mysql_query("select `Grade` from `grade_master` where `MaxMarks`='100' and ".$Term1TotalObtainedPercent.">=`RangeFrom` and ".$Term1TotalObtainedPercent."<=`RangeTo`");
			while($rowTerm1Grade = mysql_fetch_array($rsTerm1Grade))
  				{
  					$Term1Grade=$rowTerm1Grade[0];
  					break;
  				}
  				echo $Term1Grade;			
		?>
	</td>
<td><?php echo $FA3_MarksObtained;?></td>
<td><?php echo $FA3_convertedmarks;?></td>
<td><?php echo $FA3_Grade;?></td>
<td><?php echo $FA4_MarksObtained;?></td>
<td><?php echo $FA4_convertedmarks;?></td>
<td><?php echo $FA4_Grade;?></td>
<td><?php echo $SA2_MarksObtained;?></td>
<td><?php echo $SA2_convertedmarks;?></td>
<td><?php echo $SA2_Grade;?></td>
<td><?php echo ($FA3_MarksObtained+$FA4_MarksObtained+$SA2_MarksObtained); ?></td>
<td><?php echo ($FA3_convertedmarks+$FA4_convertedmarks+$SA2_convertedmarks); ?></td>
<td>
		<?php 
			$Term2TotalObtainedPercent= 2*($FA3_convertedmarks+$FA4_convertedmarks+$SA2_convertedmarks);
			$rsTerm2Grade=mysql_query("select `Grade` from `grade_master` where `MaxMarks`='100' and ".$Term2TotalObtainedPercent.">=`RangeFrom` and ".$Term2TotalObtainedPercent."<=`RangeTo`");
			while($rowTerm2Grade = mysql_fetch_array($rsTerm2Grade))
  				{
  					$Term2Grade=$rowTerm2Grade[0];
  					break;
  				}
  				echo $Term2Grade;			
		?>
</td>
	<?php 
	} //End of for loop for all subject completed
	

	?>
</tr>
<?php
}//end of while loop for Student detail
?>
</table>
<br>
<table border="1" style="border-collapse: collapse">
<tr>
<td colspan="123" align="left"><b>Bottom Five Student</b></td>
</tr>
<tr>
<th rowspan="3">Roll.No.</th>
<th rowspan="3">Name</th>
<th rowspan="3">Father Name</th>
<?php
	for($i=1;$i < count($arrSubject);$i++)
		{
			$Subject = str_replace(" ","",$arrSubject[$i]);
?>
<th colspan="24"><?php echo $Subject;?></th>
	<?php } ?>
</tr>

<tr>
<?php
	for($i=1;$i < count($arrSubject);$i++)
		{
			$Subject = str_replace(" ","",$arrSubject[$i]);
?>
<th colspan="3">FA1</th>
<th colspan="3">FA2</th>
<th colspan="3">SA1</th>
<th colspan="3">Term1</th>
<th colspan="3">FA3</th>
<th colspan="3">FA4</th>
<th colspan="3">SA2</th>
<th colspan="3">Term2</th>
<?php } ?>
</tr>

<tr>
<?php
	for($i=1;$i < count($arrSubject);$i++)
		{
			$Subject = str_replace(" ","",$arrSubject[$i]);
			
?>
<th>M</th>
<th>%</th>
<th>G</th>
<th>M</th>
<th>%</th>
<th>G</th>
<th>M</th>
<th>%</th>
<th>G</th>
<th>M</th>
<th>%</th>
<th>G</th>
<th>M</th>
<th>%</th>
<th>G</th>
<th>M</th>
<th>%</th>
<th>G</th>
<th>M</th>
<th>%</th>
<th>G</th>
<th>M</th>
<th>%</th>
<th>G</th>
<?php } ?>
</tr>
<?php
mysql_query("truncate table `report_card_rank`") or die(mysql_error());
while($row = mysql_fetch_array($rsBottom))
  {
  	$StudentName=$row[0];
  	$StudetnClass=$row[1];
  	$StudetnRollNo=$row[2];
  	$rsFName= mysql_query("select `sfathername` from `student_master` where `sclass`='$StudetnClass' and `srollno`='$StudetnRollNo'");
  	while($rowF=mysql_fetch_array($rsFName))
  	{
  		$FatherName=$rowF[0];
  		break;
  	}  			
?>
<tr>
<td><?php echo $StudetnRollNo;?></td>
<td><?php echo $StudentName;?></td>
<td><?php echo $FatherName;?></td>
	<?php
		$FA1_MarksObtained=0;
		$FA2_MarksObtained=0;
		$FA3_MarksObtained=0;
		$FA4_MarksObtained=0;
		$SA1_MarksObtained=0;
		$SA2_MarksObtained=0;
		$FA1_convertedmarks=0;
		$FA2_convertedmarks=0;
		$SA1_convertedmarks=0;
		$SumOfMaxMarks=0;
		$SumOfObtainedMarks=0;
		
		for($i=1;$i < count($arrSubject);$i++)
			{
				$Subject = $arrSubject[$i];
				$rsFA1= mysql_query("select `MarksObtained`,`convertedmarks`,`Grade`,`MaxMarks` from `report_card_temp` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='FA1'");
				$rsFA2= mysql_query("select `MarksObtained`,`convertedmarks`,`Grade`,`MaxMarks` from `report_card_temp` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='FA2'");
				$rsFA3= mysql_query("select `MarksObtained`,`convertedmarks`,`Grade`,`MaxMarks` from `report_card_temp` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='FA3'");
				$rsFA4= mysql_query("select `MarksObtained`,`convertedmarks`,`Grade`,`MaxMarks` from `report_card_temp` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='FA4'");
				$rsSA1= mysql_query("select `MarksObtained`,`convertedmarks`,`Grade`,`MaxMarks` from `report_card_temp` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='SA1'");
				$rsSA2= mysql_query("select `MarksObtained`,`convertedmarks`,`Grade`,`MaxMarks` from `report_card_temp` where `sclass`='$Class' and `srollno`='$StudetnRollNo' and `subject`='$Subject' and `testtype`='SA2'");
				while($row1 = mysql_fetch_array($rsFA1))
  				{
  					$FA1_MarksObtained=$row1[0];
  					$FA1_convertedmarks=$row1[1];
  					$FA1_Grade=$row1[2];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row1[3];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row1[0];
  					break;
  				}
  				while($row2 = mysql_fetch_array($rsFA2))
  				{
  					$FA2_MarksObtained=$row2[0];
  					$FA2_convertedmarks=$row2[1];
  					$FA2_Grade=$row2[2];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row2[3];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row2[0];
  					break;
  				}
  				while($row3 = mysql_fetch_array($rsFA3))
  				{
  					$FA3_MarksObtained=$row3[0];
  					$FA3_convertedmarks=$row3[1];
  					$FA3_Grade=$row3[2];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row3[3];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row3[0];
  					break;
  				}
  				while($row4 = mysql_fetch_array($rsFA4))
  				{
  					$FA4_MarksObtained=$row4[0];
  					$FA4_convertedmarks=$row4[1];
  					$FA4_Grade=$row4[2];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row4[3];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row4[0];
  					break;
  				}
  				while($row5 = mysql_fetch_array($rsSA1))
  				{
  					$SA1_MarksObtained=$row5[0];
  					$SA1_convertedmarks=$row5[1];
  					$SA1_Grade=$row5[2];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row5[3];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row5[0];
  					break;
  				}
  				while($row6 = mysql_fetch_array($rsSA2))
  				{
  					$SA2_MarksObtained=$row6[0];
  					$SA2_convertedmarks=$row6[1];
  					$SA2_Grade=$row6[2];
  					
  					$SumOfMaxMarks=$SumOfMaxMarks + $row6[3];
  					$SumOfObtainedMarks=$SumOfObtainedMarks + $row6[0];
  					break;
  				}
	?>
<td><?php echo $FA1_MarksObtained;?></td>
<td><?php echo $FA1_convertedmarks;?></td>
<td><?php echo $FA1_Grade;?></td>
<td><?php echo $FA2_MarksObtained;?></td>
<td><?php echo $FA2_convertedmarks;?></td>
<td><?php echo $FA2_Grade;?></td>
<td><?php echo $SA1_MarksObtained;?></td>
<td><?php echo $SA1_convertedmarks;?></td>
<td><?php echo $SA1_Grade;?></td>
<td><?php echo ($FA1_MarksObtained+$FA2_MarksObtained+$SA1_MarksObtained); ?></td>
<td><?php echo ($FA1_convertedmarks+$FA2_convertedmarks+$SA1_convertedmarks); ?></td>
	<td>
		<?php 
			$Term1TotalObtainedPercent= 2*($FA1_convertedmarks+$FA2_convertedmarks+$SA1_convertedmarks);
			$rsTerm1Grade=mysql_query("select `Grade` from `grade_master` where `MaxMarks`='100' and ".$Term1TotalObtainedPercent.">=`RangeFrom` and ".$Term1TotalObtainedPercent."<=`RangeTo`");
			while($rowTerm1Grade = mysql_fetch_array($rsTerm1Grade))
  				{
  					$Term1Grade=$rowTerm1Grade[0];
  					break;
  				}
  				echo $Term1Grade;			
		?>
	</td>
<td><?php echo $FA3_MarksObtained;?></td>
<td><?php echo $FA3_convertedmarks;?></td>
<td><?php echo $FA3_Grade;?></td>
<td><?php echo $FA4_MarksObtained;?></td>
<td><?php echo $FA4_convertedmarks;?></td>
<td><?php echo $FA4_Grade;?></td>
<td><?php echo $SA2_MarksObtained;?></td>
<td><?php echo $SA2_convertedmarks;?></td>
<td><?php echo $SA2_Grade;?></td>
<td><?php echo ($FA3_MarksObtained+$FA4_MarksObtained+$SA2_MarksObtained); ?></td>
<td><?php echo ($FA3_convertedmarks+$FA4_convertedmarks+$SA2_convertedmarks); ?></td>
<td>
		<?php 
			$Term2TotalObtainedPercent= 2*($FA3_convertedmarks+$FA4_convertedmarks+$SA2_convertedmarks);
			$rsTerm2Grade=mysql_query("select `Grade` from `grade_master` where `MaxMarks`='100' and ".$Term2TotalObtainedPercent.">=`RangeFrom` and ".$Term2TotalObtainedPercent."<=`RangeTo`");
			while($rowTerm2Grade = mysql_fetch_array($rsTerm2Grade))
  				{
  					$Term2Grade=$rowTerm2Grade[0];
  					break;
  				}
  				echo $Term2Grade;			
		?>
</td>
	<?php 
	} //End of for loop for all subject completed
	

	?>
</tr>
<?php
}//end of while loop for Student detail
?>
</table>


</body>

</html>
