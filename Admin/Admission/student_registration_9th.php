<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
?>

<?php
  
    
if(isset($_POST['BtnSubmitCreteria']))
{
	
	$FirstName=$_POST['txtfirstName'];
	$MiddleName=$_POST['txtMiddleName'];
	$LastName=$_POST['txtLastName'];
	$PlaceofBirth=$_POST['txtPlaceOfBirth'];
	$DOB=$_POST['txtDOB'];
	$Age=$_POST['txtAge'];
	$Gender=$_POST['txtSex'];
	$MotherTongue=$_POST['txtMotherTounge'];
	$Nationality=$_POST['txtNationality'];
	$Class=$_POST['cboClass'];
	$LastSchool=$_POST['txtLastSchool'];
	$SecondLanguage=$_POST['cbosecondlanguage'];
	$PermanentAddress=$_POST['txtpermanentAddress'];
	$PermanentPhone=$_POST['permanentno'];
	$ResidentialAddress=$_POST['txtAddress'];
	$ResidentialPhone=$_POST['residentialno'];

	$EnglishGrade=$_POST['cboenglish'];
	$MathGrade=$_POST['cbomath'];
	$GeneralScienceGrade=$_POST['cbogeneralscience'];
	$SocialScienceGrade=$_POST['cbosocialscience'];
	$SelectThirdLanguage=$_POST['cboselectthirdlanguage'];
	
	
	
	
	
	
	
	
	
	$SpecialAchievement1=$_POST['SpecialAchievement1'];
        $AchievementLevel1=$_POST['AchievementLevel1'];
        $AchievementRenk1=$_POST['AchievementRenk1'];
        
        $SpecialAchievement2=$_POST['SpecialAchievement2'];
        $AchievementLevel2=$_POST['AchievementLevel2'];
        $AchievementRenk2=$_POST['AchievementRenk2'];
        
        $SpecialAchievement3=$_POST['SpecialAchievement3'];
        $AchievementLevel3=$_POST['AchievementLevel3'];
        $AchievementRenk3=$_POST['AchievementRenk3'];
        
        $SpecialAchievement4=$_POST['SpecialAchievement4'];
        $AchievementLevel4=$_POST['AchievementLevel4'];
        $AchievementRenk4=$_POST['AchievementRenk4'];
        
        $SpecialAchievement5=$_POST['SpecialAchievement5'];
        $AchievementLevel5=$_POST['AchievementLevel5'];
        $AchievementRenk5=$_POST['AchievementRenk5'];
        

	
$result=mysql_query("INSERT INTO `CriteriaForm`(`FirstName`,`MiddleName`,`LastName`,`PlaceofBirth`,`DOB`,`Age`,`Gender`,`MotherTongue`,`Nationality`,`Class`,`LastSchool`,`SecondLanguage`,`PermanentAddress`,`PermanentPhone`,`ResidentialAddress`,`ResidentialPhone`,`EnglishGrade`,`MathGrade`,`GeneralScienceGrade`,`SocialScienceGrade`"
        . ",`SelectThirdLanguage`,`SpecialAchievement1`,`AchievementLevel1`,`AchievementRenk1`,`SpecialAchievement2`,`AchievementLevel2`,`AchievementRenk2`,`SpecialAchievement3`,`AchievementLevel3`,`AchievementRenk3`,`SpecialAchievement4`,`AchievementLevel4`,`AchievementRenk4`,`SpecialAchievement5`,`AchievementLevel5`,`AchievementRenk5`) VALUES ('$FirstName','$MiddleName','$LastName','$PlaceofBirth','$DOB','$Age','$Gender','$MotherTongue','$Nationality','$Class','$LastSchool','$SecondLanguage','$PermanentAddress','$PermanentPhone','$ResidentialAddress','$ResidentialPhone','$EnglishGrade','$MathGrade','$GeneralScienceGrade','$SocialScienceGrade',"
        . "'$SelectThirdLanguage','$SpecialAchievement1','$AchievementLevel1','$AchievementRenk1','$SpecialAchievement2','$AchievementLevel2','$AchievementRenk2','$SpecialAchievement3','$AchievementLevel3','$AchievementRenk3','$SpecialAchievement4','$AchievementLevel4','$AchievementRenk4','$SpecialAchievement5','$AchievementLevel5','$AchievementRenk5')");

    $lastInsertedIdSQL=mysql_query("SELECT srno FROM CriteriaForm ORDER BY srno DESC  LIMIT 1");
    $lastInsertId=  mysql_fetch_array($lastInsertedIdSQL);
    $lastInsertSrno=$lastInsertId['srno'];
    $finalCreteriaNO="DPS-R-".$lastInsertId['srno'];
    $dataId=$_SESSION['finalCreteriaNO']=$finalCreteriaNO;
    $updateCreteriaTable=mysql_query("UPDATE  CriteriaForm SET  CriteriaNo = '".$finalCreteriaNO."'  WHERE  srno='".$lastInsertSrno."'");


}	


?>


<?php
$registration=$_SESSION['finalCreteriaNO'];
//echo "SELECT FirstName, MiddleName, LastName, PlaceofBirth, DOB, Age, Gender, MotherTongue, Nationality, Class, LastSchool, SecondLanguage, PermanentAddress, PermanentPhone, ResidentialAddress, ResidentialPhone  FROM CriteriaForm WHERE srno = '$registration'";die;
$rsreg=mysql_query("SELECT FirstName, MiddleName, LastName, PlaceofBirth, DOB, Age, Gender, MotherTongue, Nationality, Class, LastSchool, SecondLanguage, PermanentAddress, PermanentPhone, ResidentialAddress, ResidentialPhone  FROM CriteriaForm WHERE CriteriaNo = '$registration'");


while($row = mysql_fetch_row($rsreg))
		{
			$FirstName=$row[0];
			$MiddleName=$row[1];
			$LastName=$row[2];
			$PlaceofBirth=$row[3];
			$DOB=$row[4];
			$Age=$row[5];
			$Gender=$row[6];
			$MotherTongue=$row[7];
			$Nationality=$row[8];
			$Class=$row[9];
			$LastSchool=$row[10];
			$SecondLanguage=$row[11];
			$PermanentAddress=$row[12];
			$PermanentPhone=$row[13];
			$ResidentialAddress=$row[14];
			$ResidentialPhone=$row[15];
			
			break;
		}
		





if(isset($_POST['BtnSubmit']))
{
	$RegistrationNo =$_POST['registrationno'];
	$sname=$_POST['txtName'];
	$middlename=$_POST['txtMiddleName'];
	$slastname=$_POST['txtLastName'];
	$PlaceOfBirth=$_POST['txtPlaceOfBirth'];
	$DOB=$_POST['txtDOB'];
	$Age=$_POST['txtAge'];
	$Sex=$_POST['txtSex'];
	$MotherTongue=$_POST['txtMotherTounge'];
	$Nationality=$_POST['txtNationality'];
	$sclass=$_POST['cboClass'];
	$LastSchool=$_POST['txtLastSchool'];
	$SecondLanguage=$_POST['cbosecondlanguage'];
	$PermanentAddress=$_POST['txtpermanentAddress'];
	$PermanentPhoneNo=$_POST['permanentno'];
	$ResidentialAddress=$_POST['txtAddress'];
	$ResidencePhoneNo=$_POST['residentialno'];
	
	$sfathername=$_POST['txtFatherName'];
	$sfatherage=$_POST['txtFatherAge'];
	$FatherEducation=$_POST['txtFatherEducation'];
	$FatherDesignation=$_POST['txtFatherDesignation'];
	$FatherOccupation=$_POST['txtFatherOccupation'];
	$FatherCompanyName=$_POST['txtFatherCompanyName'];
	$FatherMobileNo=$_POST['txtFatherMobileNo'];
	$FatherEmailId=$_POST['txtFatherEmailId'];
	$FatherOfficeAddress=$_POST['txtFatherOfficialAddress'];
	$FatherOfficePhoneNo=$_POST['cboofficeno'];
	
	$MotherName=$_POST['txtMotherName'];
	$MotherAge=$_POST['txtMotherAge'];
	$MotherEducation=$_POST['txtMotherEducation'];
	$MotherDesignation=$_POST['txtMotherDesignation'];
	$MotherOccupatoin=$_POST['txtMotherOccupation'];
	$MotherCompanyName=$_POST['txtMotherCompanyName'];
	$MotherMobile=$_POST['txtMotherMobileNo'];
	$MotherEmail=$_POST['txtMotherEmailId'];
	$MotherOfficeAddress=$_POST['txtMotherOfficialAddress'];
	$MotherOfficePhone=$_POST['cbomotherofficeno'];
	
	$GuradianName=$_POST['txtGuradianName'];
	$GuradianAge=$_POST['txtGuradianAge'];
	$GuradinaEducation=$_POST['txtGuradinaEducation'];
	$GuradianOccupation=$_POST['txtGuradianOccupation'];
	$GuradianDesignation=$_POST['txtGuradianDesignation'];
	$GuradianCompanyName=$_POST['txtGuradianCompanyName'];
	$GuradianOfficialPhNo=$_POST['txtGuradianOfficialPhNo'];
	$GuradianMobileNo=$_POST['txtGuradianMobileNo'];
	$GuardiansAddress=$_POST['txtGuradianAddress'];
	$GuradianOfficialAddress=$_POST['txtGuradianOfficialAddress'];
	$GuardianEmailId=$_POST['txtguardianEmailId'];
	
	$Sibling=$_POST['chkSibling'];
	$Father_DPS_Alumni=$_POST['chkFatherAlumni'];
	$Mother_DPS_Alumni=$_POST['chkMotherAlumni'];
	$DPSRohiniStaff=$_POST['chkDPSStaff'];
	$OtherDPSStaff=$_POST['otherdpsstaff'];
	$Single_Parent=$_POST['chkSingleParent'];
	
	$RealBroSisName=$_POST['txtRealBroSisName'];
	$RealBroSisClass=$_POST['txtRealBroSisClass'];
	$RealBroSisAdmissionNo=$_POST['txtRealBroSisSchoolName'];
	
	$RealBroSisName2=$_POST['txtRealBroSisName2'];
	$RealBroSisClass2=$_POST['txtRealBroSisClass2'];
	$RealBroSisAdmissionNo2=$_POST['txtRealBroSisSchoolName2'];
	
	$Single_Parent_Reason=$_POST['cbosingleparent'];
	$Other_single_parent=$_POST['txtsingleparent'];
	
	$AlumniFatherName=$_POST['txtFatherAlumniName'];
	$AlumniSchoolName=$_POST['txtDPSSchoolName'];
	$AlumniPassingYear=$_POST['txtYearOfPassing'];
	$AlumniFatherPassingClass=$_POST['txtLastPassoutClassFather'];
	
	$AlumniMotherName=$_POST['txtMotherAlumniName'];
	$AlumniMotherSchoolName=$_POST['txtMotherDPSSchoolName'];
	$AlumniMotherPassingYear=$_POST['txtMotherYearOfPassing'];
	$AlumniMotherPassingClass=$_POST['txtLastPassoutClassMother'];
	
	$Category=$_POST['cbocatagory'];
	$OtherCatagoryDetail=$_POST['txtothercatagory'];
	
	$EmergencyContactPersonName=$_POST['txtcontactpersonname'];
	$EmergencyContactNo=$_POST['txtemergencyMobile'];
	$EmergencyEmail=$_POST['txtemergencyemail'];
	
	$BirthCertificate=$_FILES["F1"]["name"];
	$ProfilePhoto=$_FILES["F2"]["name"];
	$FatherPhoto=$_FILES["F3"]["name"];
	$MotherPhoto=$_FILES["F4"]["name"];
	$GuardianPhoto=$_FILES["F5"]["name"];
	$CatagoryCertificate=$_FILES["F6"]["name"];
	$OtherCatagoryCertificate=$_FILES["F7"]["name"];
	$ParentDPSStaff=$_FILES["F8"]["name"];
	$ParentDPSAlumni=$_FILES["F9"]["name"];
	$class8_trm1=$_FILES["F10"]["name"];
	$class7_finlexm=$_FILES["F11"]["name"];
	$AadharNumber=$_FILES["F12"]["name"];
	$ResidenceProof=$_FILES["F13"]["name"];
         //-------------------ACCUPATION FIELDS FATHER--------------------------------------
        
        $fatherbusiness=$_POST['fatherbusiness'];
	$fatherpolitical=$_POST['fatherpolitical'];
	$fatherministry=$_POST['fatherministry'];
        $fatherprofssional=$_POST['fatherprofssional'];
	$fatherservices=$_POST['fatherservices'];
	$fatherothers=$_POST['fatherothers'];
        
        //-------------------ACCUPATION FIELDS MOTHER--------------------------------------
          
        $motherbusiness=$_POST['motherbusiness'];
	$motherpolitical=$_POST['motherpolitical'];
	$motherministry=$_POST['motherministry'];
        $motherprofssional=$_POST['motherprofssional'];
	$motherservices=$_POST['motherservices'];
	$motherothers=$_POST['motherothers'];
        
         //-------------------ACCUPATION FIELDS GURDIAN--------------------------------------
        
        $guardianbusiness=$_POST['guardianbusiness'];
	$guardianpolitical=$_POST['guardianpolitical'];
	$guardianministry=$_POST['guardianministry'];
        $guardianprofssional=$_POST['guardianprofssional'];
	$guardianservices=$_POST['guardianservices'];
	$guardianothers=$_POST['guardianothers'];
        
        $bloodgroup=$_POST['bloodgroup'];
       
        $RegistrationDate=$_POST['txtdateofregistration'];
	$RegistrationPlace=$_POST['txtplaceofregistration'];
        if($RegistrationNo<10){
            $RegistrationNo="00".$RegistrationNo;
        }elseif($RegistrationNo>9 && $RegistrationNo<100){
            $RegistrationNo="0".$RegistrationNo;
        }else{
            $RegistrationNo=$RegistrationNo;
        }
        
         $finalRegistrationNO="DPSR/17-18/".$RegistrationNo;

        
//$resultData=mysql_query("INSERT INTO ``( "
        . "`RegistrationNo`, `sname`, `middlename`, `slastname`, `PlaceOfBirth`, `DOB`, `Age`, `Sex`, `MotherTongue`, `Nationality`, `sclass`, `LastSchool`, `SecondLanguage`, `PermanentAddress`, `PermanentPhoneNo`, `ResidentialAddress`, `ResidencePhoneNo`, `sfathername`, `sfatherage`, `FatherEducation`, `FatherDesignation`, `FatherOccupation`, `FatherCompanyName`, `FatherMobileNo`, `FatherEmailId`, `FatherOfficeAddress`, `FatherOfficePhoneNo`, `MotherName`, `MotherAge`, `MotherEducation`, `MotherDesignation`, `MotherOccupatoin`, `MotherCompanyName`, `MotherMobile`, `MotherEmail`, `MotherOfficeAddress`, `MotherOfficePhone`, `GuradianName`, `GuradianAge`, `GuradinaEducation`, `GuradianOccupation`, `GuradianDesignation` ,`GuradianCompanyName`, `GuradianOfficialPhNo`, `GuradianMobileNo`, `GuardiansAddress`, `GuradianOfficialAddress`, `GuardianEmailId`, `Sibling`, `Father_DPS_Alumni`, `Mother_DPS_Alumni`, `DPSRohiniStaff`, `OtherDPSStaff`, `Single_Parent`, `RealBroSisName`, `RealBroSisClass`, `RealBroSisAdmissionNo`, `RealBroSisName2`, `RealBroSisClass2`, `RealBroSisAdmissionNo2`, `Single_Parent_Reason`, `Other_single_parent`, `AlumniFatherName`, `AlumniSchoolName`, `AlumniPassingYear`, `AlumniFatherPassingClass`, `AlumniMotherName`, `AlumniMotherSchoolName`, `AlumniMotherPassingYear`, `AlumniMotherPassingClass`, `Category`, `OtherCatagoryDetail`, `EmergencyContactPersonName`, `EmergencyContactNo`, `EmergencyEmail`, `BirthCertificate`, `ProfilePhoto`, `FatherPhoto`, `MotherPhoto`, `GuardianPhoto`, `CatagoryCertificate`, `OtherCatagoryCertificate`, `ParentDPSStaff`, `ParentDPSAlumni`, `class8_trm1`, `class7_finlexm`, `AadharNumber`, `ResidenceProof`, `RegistrationDate`, `RegistrationPlace`, `ResidenceProofType`, `fatherbusiness`, `fatherpolitical`, `fatherministry`, `fatherprofssional`, `fatherservices`"
        . ", `fatherothers`, `motherbusiness`, `motherpolitical`, `motherministry`, `motherprofssional`, `motherservices`"
        . ", `motherothers`, `guardianbusiness`, `guardianpolitical`, `guardianministry`, `guardianprofssional`, `guardianservices`, `guardianothers`, `bloodgroup`) "
        . "VALUES ('$finalRegistrationNO', '$sname', '$middlename', '$slastname', '$PlaceOfBirth', '$DOB', '$Age', '$Sex', '$MotherTongue', '$Nationality', '$sclass', '$LastSchool', '$SecondLanguage', '$PermanentAddress', '$PermanentPhoneNo', '$ResidentialAddress', '$ResidencePhoneNo', '$sfathername', '$sfatherage', '$FatherEducation', '$FatherDesignation', '$FatherOccupation', '$FatherCompanyName', '$FatherMobileNo', '$FatherEmailId', '$FatherOfficeAddress', '$FatherOfficePhoneNo', '$MotherName', '$MotherAge', '$MotherEducation', '$MotherDesignation', '$MotherOccupatoin', '$MotherCompanyName', '$MotherMobile', '$MotherEmail', '$MotherOfficeAddress', '$MotherOfficePhone', '$GuradianName', '$GuradianAge', '$GuradinaEducation', '$GuradianOccupation', '$GuradianDesignation', '$GuradianCompanyName', '$GuradianOfficialPhNo', '$GuradianMobileNo', '$GuardiansAddress', '$GuradianOfficialAddress', '$GuardianEmailId', '$Sibling', '$Father_DPS_Alumni', '$Mother_DPS_Alumni', '$DPSRohiniStaff', '$OtherDPSStaff', '$Single_Parent', '$RealBroSisName', '$RealBroSisClass', '$RealBroSisAdmissionNo', '$RealBroSisName2', '$RealBroSisClass2', '$RealBroSisAdmissionNo2', '$Single_Parent_Reason', '$Other_single_parent', '$AlumniFatherName', '$AlumniSchoolName', '$AlumniPassingYear', '$AlumniFatherPassingClass', '$AlumniMotherName', '$AlumniMotherSchoolName', '$AlumniMotherPassingYear', '$AlumniMotherPassingClass', '$Category', '$OtherCatagoryDetail', '$EmergencyContactPersonName', '$EmergencyContactNo', '$EmergencyEmail', '$BirthCertificate', '$ProfilePhoto', '$FatherPhoto', '$MotherPhoto', '$GuardianPhoto', '$CatagoryCertificate', '$OtherCatagoryCertificate', '$ParentDPSStaff', '$ParentDPSAlumni', '$class8_trm1', '$class7_finlexm', '$AadharNumber', '$ResidenceProof', '$RegistrationDate', '$RegistrationPlace', '$ResidenceProofType', '$fatherbusiness', '$fatherpolitical', '$fatherministry', '$fatherprofssional', '$fatherservices' "
        . ", '$fatherothers', '$motherbusiness', '$motherpolitical', '$motherministry', '$motherprofssional', '$motherservices'"
        . ", '$motherothers', '$guardianbusiness', '$guardianpolitical', '$guardianministry', '$guardianprofssional', '$guardianservices', '$guardianothers', '$bloodgroup')");


$lastInsertedIdSQLReg=mysql_query("SELECT srno FROM NewStudentRegistration_temp ORDER BY srno DESC  LIMIT 1");
    $lastInsertIdReg=  mysql_fetch_array($lastInsertedIdSQLReg);
    $lastInsertSrnoReg=$lastInsertIdReg['srno'];
    
    $finalRegistrationNO="008".$lastInsertSrnoReg;
        
    $updateCreteriaTable=mysql_query("UPDATE  NewStudentRegistration_temp SET  RegistrationNo = '".$finalRegistrationNO."'  WHERE  srno='".$lastInsertIdReg['srno']."'");

    
        $target_dir = "Documents/";
        $target_file1 = $target_dir.basename($_FILES["F1"]["name"]);
        move_uploaded_file($_FILES["F1"]["tmp_name"], $target_file1);
        
         $target_fileF2 = $target_dir.basename($_FILES["F2"]["name"]);
        move_uploaded_file($_FILES["F2"]["tmp_name"], $target_fileF2);
        
         $target_fileF3 = $target_dir.basename($_FILES["F3"]["name"]);
        move_uploaded_file($_FILES["F3"]["tmp_name"], $target_fileF3);
        
         $target_fileF4 = $target_dir.basename($_FILES["F4"]["name"]);
        move_uploaded_file($_FILES["F4"]["tmp_name"], $target_fileF4);
        
         $target_fileF5 = $target_dir.basename($_FILES["F5"]["name"]);
        move_uploaded_file($_FILES["F5"]["tmp_name"], $target_fileF5);
        
         $target_fileF6 = $target_dir.basename($_FILES["F6"]["name"]);
        move_uploaded_file($_FILES["F6"]["tmp_name"], $target_fileF6);
        
         $target_fileF7 = $target_dir.basename($_FILES["F7"]["name"]);
        move_uploaded_file($_FILES["F7"]["tmp_name"], $target_fileF7);
        
         $target_fileF8 = $target_dir.basename($_FILES["F8"]["name"]);
        move_uploaded_file($_FILES["F8"]["tmp_name"], $target_fileF8);
        
        $target_fileF9 = $target_dir.basename($_FILES["F9"]["name"]);
        move_uploaded_file($_FILES["F9"]["tmp_name"], $target_fileF9);
        
         $target_fileF10 = $target_dir.basename($_FILES["F10"]["name"]);
        move_uploaded_file($_FILES["F10"]["tmp_name"], $target_fileF10);
        
        $target_fileF11 = $target_dir.basename($_FILES["F11"]["name"]);
        move_uploaded_file($_FILES["F11"]["tmp_name"], $target_fileF11);
        
         $target_fileF12 = $target_dir.basename($_FILES["F12"]["name"]);
        move_uploaded_file($_FILES["F12"]["tmp_name"], $target_fileF12);
        
        $target_fileF13 = $target_dir.basename($_FILES["F13"]["name"]);
        move_uploaded_file($_FILES["F13"]["tmp_name"], $target_fileF13);
        
        if($resultData){ 
           
      

       }
	
}	
?>
<?php
$sqlInq = "SELECT MAX(CAST(`RegistrationNo` AS SIGNED INTEGER)) as `srno` FROM  `NewStudentRegistration_temp`";
	
	$rsInq = mysql_query($sqlInq);
		if (mysql_num_rows($rsInq) > 0)
		{
			while($row1 = mysql_fetch_row($rsInq))
				{
					//$InqNo="IF" .(string)$row1[0];						
					$InqNo=$row1[0]+1;						
				}
		}
		else
		{
			$InqNo="1";
		}
		$sqlInq = "SELECT MAX(CAST(`RegistrationNo` AS SIGNED INTEGER)) as `srno` FROM  `NewStudentRegistration_temp`";
$class=$_SESSION['StudentClass'];
$ssqlClass="SELECT distinct `MasterClass` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
$ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster`";
$rsFY= mysql_query($ssqlFY);
$rsEducation=mysql_query("select distinct `Qualification` from `NewStudentRegistrationQualificationMaster` order by `Qualification`");
$rsEducation1=mysql_query("select distinct `Qualification` from `NewStudentRegistrationQualificationMaster` order by `Qualification`");
$rsEducation2=mysql_query("select distinct `Qualification` from `NewStudentRegistrationQualificationMaster` order by `Qualification`");

$rsSchooListFather=mysql_query("select distinct `SchoolName` from `NewStudentRegistrationSchoolList` order by `SchoolName`");
$rsSchooListMother=mysql_query("select distinct `SchoolName` from `NewStudentRegistrationSchoolList` order by `SchoolName`");

$rsLocation=mysql_query("select distinct `Sector` from `NewStudentRegistrationDistanceMaster` order by `Sector`");

$currentdate=date("d-m-Y");

	$ssqlRoute="SELECT distinct `routeno` FROM `RouteMaster`";

	$rsRoute= mysql_query($ssqlRoute);
$ssqlDiscount="SELECT distinct `head` FROM `discounttable` where `discounttype`='tuitionfees'";
$rsDiscount= mysql_query($ssqlDiscount);

$sstr="SELECT distinct `head` FROM `discounttable` where `discounttype`='admissionfees'";
$rsAdmissionFeeDiscount= mysql_query($sstr);

$sstr="SELECT distinct `head` FROM `discounttable` where `discounttype`='annualcharges'";
$rsAnnualFeeDiscount= mysql_query($sstr);

$rsSchool = mysql_query("select distinct `SchoolId`,`SchoolName` from `SchoolConfig`");
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
$rsClass2= mysql_query($ssqlClass);
$rsClass3= mysql_query($ssqlClass);

$rsfatherBusiness=mysql_query("SELECT distinct `catagory` FROM `Business_master`");
$rsmotherBusiness=mysql_query("SELECT distinct `catagory` FROM `Business_master`");
$rsguardianBusiness=mysql_query("SELECT distinct `catagory` FROM `Business_master`");

$rsfatherProfession=mysql_query("SELECT distinct `catagory` FROM `professional_master`");
$rsmotherProfession=mysql_query("SELECT distinct `catagory` FROM `professional_master`");
$rsguardianProfession=mysql_query("SELECT distinct `catagory` FROM `professional_master`");

$rsfatherService=mysql_query("SELECT distinct `catagory` FROM `service_master`");
$rsmotherService=mysql_query("SELECT distinct `catagory` FROM `service_master`");
$rsguardianService=mysql_query("SELECT distinct `catagory` FROM `service_master`");

?>

<script type="text/javascript">
    function clickIE4(){
    if (event.button==2){
    return false;
    }
    }
    function clickNS4(e){
    if (document.layers||document.getElementById&&!document.all){
    if (e.which==2||e.which==3){
    return false;
    }
    }
    }
    if (document.layers){
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown=clickNS4;
    }
    else if (document.all&&!document.getElementById){
    document.onmousedown=clickIE4;
    }
    document.oncontextmenu=new Function("return false")
    function disableselect(e){
    return false
    }
    function reEnable(){
    return true
    }
    //if IE4+
    document.onselectstart=new Function ("return false")
    //if NS6
    if (window.sidebar){
    document.onmousedown=disableselect
    document.onclick=reEnable
    }
    document.onkeydown = function(e) {
        if (e.ctrlKey &&
            (e.keyCode === 67 ||
             e.keyCode === 86 ||
             e.keyCode === 85 ||
             e.keyCode === 117)) {
            alert('not allowed');
            return false;
        } else {
            return true;
        }
};
</script>


<script language="javascript">
	String.prototype.trim=function()
	{
		return this.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
	};
</script>

<SCRIPT language=Javascript>
      <!--
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
      //-->
   </SCRIPT>
   <script>
   function fnlChkCategory(ctrlname)
{
	if(ctrlname=="chkOtherCategory")
	{	
		if(document.getElementById(ctrlname).checked==true)
		{	
			document.getElementById("hOtherCategory").value="Yes";
			document.getElementById("txtothercatagory").readOnly=false;
			return;
		}
		else
		{
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("txtothercatagory").value="";
			document.getElementById("txtothercatagory").readOnly=true;
			return;
		}
	}
			
			

	if(ctrlname=="chkSibling")
	{
		//alert(document.getElementById("lifecheck").checked);
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hSibling").value="Yes";
			document.getElementById("txtRealBroSisName").readOnly=false;
			document.getElementById("txtRealBroSisClass").disabled=false;
			document.getElementById("txtRealBroSisSchoolName").readOnly=false;
			document.getElementById("txtRealBroSisName2").readOnly=false;
			document.getElementById("txtRealBroSisClass2").disabled=false;
			document.getElementById("txtRealBroSisSchoolName2").readOnly=false;
			
			
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hSibling").value="No";
			document.getElementById("txtRealBroSisName").value="";
			document.getElementById("txtRealBroSisName").readOnly=true;
			document.getElementById("txtRealBroSisClass").value="";
			document.getElementById("txtRealBroSisClass").disabled=true;
			document.getElementById("txtRealBroSisSchoolName").value="";
			document.getElementById("txtRealBroSisSchoolName").readOnly=true;
			document.getElementById("txtRealBroSisName2").value="";
			document.getElementById("txtRealBroSisName2").readOnly=true;
			document.getElementById("txtRealBroSisClass2").value="";
			document.getElementById("txtRealBroSisClass2").disabled=true;
			document.getElementById("txtRealBroSisSchoolName2").value="";
			document.getElementById("txtRealBroSisSchoolName2").readOnly=true;
			return;
		}
	}
	
	if(ctrlname=="chkFatherAlumni")
	{
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hFatherAlumni").value="Yes";
			document.getElementById("txtFatherAlumniName").readOnly=false;
			//document.getElementById("txtDPSSchoolName").readOnly=false;
			document.getElementById("txtDPSSchoolName").readOnly=false;
			document.getElementById("txtYearOfPassing").readOnly=false;
			document.getElementById("txtLastPassoutClassFather").disabled=false;
			
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hFatherAlumni").value="No";
			
			document.getElementById("txtFatherAlumniName").value="";
			document.getElementById("txtDPSSchoolName").value="";
			document.getElementById("txtYearOfPassing").value="";
			document.getElementById("txtFatherAlumniName").readOnly=true;
			document.getElementById("txtLastPassoutClassFather").value="";
			document.getElementById("txtDPSSchoolName").readOnly=true;
			document.getElementById("txtLastPassoutClassFather").disabled=true;
			
			
			document.getElementById("txtFatherAlumniName").readOnly=true;
			//document.getElementById("txtDPSSchoolName").disabled=true;
			document.getElementById("txtYearOfPassing").readOnly=true;
			return;
		}
	}
	if(ctrlname=="chkMotherAlumni")
	{	
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hMotherAlumni").value="Yes";
			document.getElementById("txtMotherAlumniName").readOnly=false;
			document.getElementById("txtMotherDPSSchoolName").readOnly=false;
			document.getElementById("txtMotherYearOfPassing").readOnly=false;
			document.getElementById("txtLastPassoutClassMother").disabled=false;
			
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hMotherAlumni").value="No";
			
			document.getElementById("txtMotherAlumniName").value="";
			document.getElementById("txtMotherDPSSchoolName").value="";
			document.getElementById("txtMotherYearOfPassing").value="";
			document.getElementById("txtLastPassoutClassMother").value="";
			
			
			document.getElementById("txtMotherAlumniName").readOnly=true;
			document.getElementById("txtMotherDPSSchoolName").readOnly=true;
			document.getElementById("txtMotherYearOfPassing").readOnly=true;
			document.getElementById("txtLastPassoutClassMother").disabled=true;
			return;
		}
	}
	
	if(ctrlname=="chkSingleParent")
	{
           
		//alert(document.getElementById("lifecheck").checked);
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			
			
			document.getElementById("hSingleParent").value="Yes";
			document.getElementById("cbosingleparent").disabled=false;
			
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			
			return;
		}
		else
		{
			
			document.getElementById("hSingleParent").value="No";
			document.getElementById("cbosingleparent").value="";
			document.getElementById("cbosingleparent").disabled=true;
			
			return;
		}
	}
	
	if(ctrlname=="chkSpecialNeed")
	{	
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hSpecialNeed").value="Yes";
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hSpecialNeed").value="No";
			return;
		}
	}
	
	
		
	if(ctrlname=="chkDPSStaff")
	{
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hDPSStaff").value="Yes";
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hDPSStaff").value="No";			
			return;
		}
	}
	
	if(ctrlname=="chkEWSCategory")
	{
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hEWSCategory").value="Yes";
			document.getElementById("hOtherCategory").value="No";
			document.getElementById("chkOtherCategory").checked=false;
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hEWSCategory").value="No";			
			return;
		}
	}
	if(ctrlname=="chkOtherCategory")
	{
		if(document.getElementById(ctrlname).checked==true)
		{
			//alert("Sibling is selected!");
			document.getElementById("hOtherCategory").value="Yes";
			if( document.getElementById("hSpecialNeed").value=="Yes" ||  document.getElementById("hEWSCategory").value=="Yes" || document.getElementById("hotherCategory").value=="Yes")
			{
				document.getElementById("hOtherCategory").value="No";
				document.getElementById(ctrlname).checked=false;
				alert("Other can be selected only if other categories not selected!");
				return;
			}
			return;
		}
		else
		{
			//alert("Sibling not selected!");
			document.getElementById("hOtherCategory").value="No";
			return;
		}
	}	
}
function fnlSelectionCheck()
{
	var src = document.getElementById("cboOptionalSubject");
		SelectedCount=0;
		SelectedValue="";
		for(var count=0; count < src.options.length; count++) 
		{
			if(src.options[count].selected == true) 
			{
				var option = src.options[count];
				
				SelectedCount=SelectedCount + 1;
				SelectedValue=SelectedValue + option.value +",";
			}
		}
		//alert(SelectedValue);
		if(SelectedCount>2)
		{
			for(var count=0; count < src.options.length; count++) 
			{
				if(src.options[count].selected == true) 
				{
					src.options[count].selected = false;
				}
			}
			SelectedValue="";
			alert("Maximum two optional subjects can be selected!");
			return;
		}
		document.getElementById("txtOptionalSubject").value=SelectedValue;		
}
function CalculateAgeInQC() 
{
    
     if(document.getElementById("txtDOB").value=="")
     {
     	alert("Please enter Date of Birth!");
     	return;
     }
     document.getElementById("txtAge").value="Please Wait";
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
						document.getElementById("txtAge").value=rows;
			        	//arr_row=rows.split(",");

			        	//document.getElementById("txtAdmissionFees").value=arr_row[4];
						//document.getElementById("txtTotal").value=arr_row[4];
			        	//document.getElementById("txtSecurityFeesAmount").value=arr_row[5];
						//CalculatTotal();
						//alert(rows);														
			        }
		      }
			var submiturl="CalculateAge.php?DateOfBirth=" + document.getElementById("txtDOB").value;
			xmlHttp.open("GET", submiturl,true);
			xmlHttp.send(null);
}

function fnlChksingleparentDetail()
{
	
	if((document.getElementById("cbosingleparent").value =="Others"))
	{
		
		
		document.getElementById("txtsingleparent").style.display ="";
	}
	else
	{
		
		document.getElementById("txtsingleparent").style.display ="none";
		
	}
	
	
}
function fnlChkCatagory()
{
	
	if((document.getElementById("cbocatagory").value =="Others"))
	{
		
		
		document.getElementById("txtothercatagory").style.display ="";
	}
	else
	{
		
		document.getElementById("txtothercatagory").style.display ="none";
		
	}
	
	
}
   </script>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Language" content="en-us">

<title>Student Registration</title>
<link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="../js/bootstrap.min.js"></script>
	
	
	
		<style> body{font-family:Arial, Helvetica, sans-serif!important;} .Header .img-responsive{width:40%; color:#000!important;}
		 .text-box{ width:90%; padding:2% 2%; border-radius:5px; border:1px solid #c8c8c8; } .row{padding-left:0%; margin:0;} .h{background-color:rgba(11, 70, 45, 0.84); padding:4px 0px; color:#FFFFFF;} .h11{ text-transform:uppercase;} .col-xs-6{ text-align:left; margin-top:1%!important;} .hr{width:99%; border:1px solid #CCCCCC; padding:0;} .col-xs-3, .col-xs-9{margin-top:1%; } .f{font-size:12px;} .col-xs-2{width:12%; padding:0; border:1px solid #0099ff; } .col-xs-2 li{list-style:none; padding:5%;} .info{ padding:1%; margin:0; line-height:0.5;} .tba{ width:90%; } .tbs{padding:2.5%;}
		 .col-xs-3:nth-child(odd){font-weight:600;} .col-xs-1{width:2%;}
		 .table1 tr td{padding:1%;}  .row_1{ border-bottom: 2px solid #999999; } 
		 .col-xs-12 table td{ padding:1% 0.5%; border:1px solid #0099ff; border-radius:2px; } 
		 .col{ text-align:left; }  .check{padding:0 0 0 3%;} .study{margin-top:3%;}
		 .check table{width:20%; float:left;} .check table td{ padding:3% 1%!important; font-size:13px;} .check table td:nth-child(odd){width:20px;}
		 .table_detai .row{width:100%;} .table_detail .col-xs-2, .table_detail .col-xs-3{padding:1% 1%; margin:0; border:1px solid #0099ff; } .table_detail .col-xs-2{ width:17%;} .table_detail .head1{font-weight:700; padding:1%; background-color:#0099ff; margin:0; border:1px solid #0099ff;} .table_detail .col-xs-2 .text-box{ width:95%; border-radius:3px; border:1px solid #0099ff;} .table_detail .head2{ padding-bottom:1.3%; } 
		 @media only screen and (min-width:1235px) and (max-width: 1935px){.col{text-align:center; } .study{margin-top:4%;} }
		 
		 @media only screen and (min-width:800) and (max-width: 934px){ .check table td{ font-size:11px!important;}}
		 @media only screen and (min-width:870px) and (max-width: 1235px){	 .col-xs-2{width:20%;} .tba{ width:90%; } 	 }
		 @media only screen and (min-width:1051px) and (max-width: 1235px){.table_detail .l{ font-size:12px; padding-bottom:1.7%;}}
		 @media only screen and (min-width:870px) and (max-width: 1051px){ .table_detail .l{ font-size:12px; padding-bottom:0.5%; padding-top:0.5%;} }
		 @media only screen and (min-width:928px) and (max-width: 1080px){ .table_detail .l2{ font-size:12px; padding-bottom:1.3%; } }
		 @media only screen and (min-width:870px) and (max-width: 928px){ .table_detail .l2{ font-size:12px; padding-bottom:0.2%; padding-top:0.2%; } .study{margin-top:7%;} }
		 @media only screen and (min-width:720px) and (max-width: 870px){ .col-xs-2{width:30%;} .table_detail .l{ font-size:12px; padding-bottom:0.4%; padding-top:0.4%;} .table_detail .l2{ font-size:12px; padding-bottom:0.2%; padding-top:0.1%; } .tba{ width:90%; } .check table{width:33%; float:left;} .study{margin-top:20%;} }		 
		 @media only screen and (min-width:580px) and (max-width: 720px){
		 .col-xs-3{ width:50%; margin-top:1%; } .col-xs-6{ text-align:left; margin-top:1%!important;} .col-xs-6 .text-box{ width:50%!important; } .xs{ width:51%;} .xs1{ width:50%; margin-left:-1%; } .col-xs-2{ width:50%;} .col-xs-2 .text-box{height:25px; } .xss{width:50%!important;} .table_detail .head1{ display:none;} .table_detail .col-xs-3 {width:30%;} .table_detail .l{ font-size:12px; padding-bottom:0.1%; padding-top:0.1%;} .table_detail .l2{ font-size:9px; padding:0; padding-bottom:0%; padding-top:0%; } .table_detail .col-xs-2 { padding:0.8% 1%; width:20%;} .table_detail .l3{padding:1%;} table_detail .head1{padding-bottom:0.5%;} .tba{ width:90%; }.info p{line-height:1.2;} .check table{width:30%; float:left;} .study{margin-top:25%;}
		 .col-xs-1{width:2%; float:left;} .col-xs-10{width:70%; float:left;} .xs11{margin-top:8%;}
		 } 
		 @media only screen and (min-width:530px) and (max-width: 580px){ body{font-size:12px;} .Header .img-responsive{width:40%}
		 .col-xs-3{ width:50%; margin-top:2%; } .col-xs-6{ text-align:left; margin-top:1%;} .col-xs-6 .text-box{ width:50%!important; } .xs{ width:51%;} .xs1{ width:50%; margin-left:-1%; } .col-xs-2{ width:49%; } .col-xs-2 .text-box{height:25px; }  .xss{width:45%!important; font-size:12px;} .xss1{ width:45%; font-size:12px;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .tba{ width:90%; } .info p{line-height:1.2;} .check table{width:45%; float:left;} .study{margin-top:40%;}
		  .col-xs-1{width:2%; float:left;} .col-xs-10{width:70%; float:left;} .xs11{margin-top:8%;}
		 } 
		 @media only screen and (min-width:445px) and (max-width: 530px){ body{font-size:14px; line-height:1;} .row{padding:0 10%} .Header .img-responsive{width:100%}
		 .col-xs-3{ width:100%; margin-top:2%; } .col-xs-6{ text-align:left; margin-top:1%;} .text-box{width:100%;} .col-xs-6 .text-box{ width:80%!important; } .col-xs-2{ width:50%; margin-top:1%;  } .col-xs-2 .text-box{height:25px; } .xss{width:80%!important; } .xss1{ width:80%;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .tba{ width:50%; }.info p{line-height:1.2;} .check table{width:95%; float:left;}
		  .col-xs-1{width:2%; float:left;} .col-xs-10{width:70%; float:left;} .xs11{margin-top:8%;}
		 } 
		 @media only screen and (min-width:334px) and (max-width: 445px){ body{font-size:14px; line-height:1.5;} .tba{ width:100%; } .row{padding:0 10%} .Header .img-responsive{width:100%}
		 .col-xs-3{ width:100%; margin-top:2%;  } .col-xs-6{ text-align:left; margin-top:1%; width:50%; } .text-box{width:100%;} .col-xs-6 .text-box{ width:78%!important;  margin-left:-3%; } .col-xs-2{ width:95%; margin-top:1%;} .xss{width:100%!important; } .xss1{ width:100%;} .col-xs-2 li{ padding:2%;} .table1{font-size:12px;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;} .info p{line-height:1.2;} .check table{width:95%; float:left;} 
		 
		 }	
		  @media only screen and (min-width:240px) and (max-width: 334px){ body{font-size:14px; line-height:1;} .tba{ width:100%; } .row{padding:0 10%} .Header .img-responsive{width:100%}
		 .col-xs-3{ width:100%; margin-top:3%;  } .col-xs-6{ text-align:left; margin-top:1%; width:50%; } .text-box{width:80%;} .col-xs-6 .text-box{ width:80%!important; } .col-xs-2{ width:95%; margin-top:1%;} .col-xs-2 .text-box{height:25px; } .xss{width:85%!important; } .xss1{ width:80%;} .table_detail .head2{ background-color:#0099ff; text-align:center;} .table_detail .head1{ display:none;} .table_detail .row{ margin-left:10%; margin-top:2%; font-size:12px;} .table_detail .col-xs-3{ width:70%; padding:1%;} .table_detail .col-xs-2{ width:70%; margin-left:8.3%; padding:1%;}.info p{line-height:1.2;} .check table{width:95%; float:left;}
		 }		 
		
		</style>
	</head>
<body>

<div id="container">
 <div class="row ">
  <div class="Header" align="center" ><img src="<?php echo $SchoolLogo; ?>" class="img-responsive"><br />
 
    <div class="table1">
	  <b><?php echo $SchoolAddress; ?></b><br />
	 <b> <?php echo $SchoolPhoneNo; ?></b><br />
	  <b> <?php echo $SchoolEmailId; ?></b>
	</div>
  </div>
 </div>
 <form name="frmNewStudent" id="frmNewStudent" method="post" action="" enctype="multipart/form-data">
     <input type="hidden" name="hSibling" id="hSibling" value="No">
		<input type="hidden" name="hFatherAlumni" id="hFatherAlumni" value="No">
		<input type="hidden" name="hMotherAlumni" id="hMotherAlumni" value="No">
		<input type="hidden" name="hSingleParent" id="hSingleParent" value="No">
		<input type="hidden" name="hSpecialNeed" id="hSpecialNeed" value="No">
		<input type="hidden" name="hDPSStaff" id="hDPSStaff" value="No">
		<input type="hidden" name="hEWSCategory" id="hEWSCategory" value="No">
		<input type="hidden" name="hOtherCategory" id="hOtherCategory" value="No">
		
		<input type="hidden" name="txtOptionalSubject" id="txtOptionalSubject" value="">
		<input type="hidden" name="registrationno" id="registrationno" value="<?php echo $InqNo;?>">
        
  <div>&nbsp;</div>
  <div style="background-color: #0b462d; padding:2px 0; color:#FFFFFF;">
    <h4 align="center">APPLICATION FORM - IX (Session 2017 - 2018)</h4>
  </div>
  <div class="info">
  	<h4>Parents are requested to note : </h4>
	<p><font size="+2">&raquo;</font>  This is not an Admission Form. Submission of this form does not guarantee admission to school.</p>
	<p><font size="+2">&raquo;</font>  This form is non-transferable and Registration fee is <strong>INR 25/-</strong> </p>
  </div>
  <div align="center" class="h h11"><b><font >Student Details</font></b></div>
  <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Class Applied For*:</div>
  <div class="col-xs-3"> <input type="text" name="cboClass" id="cboClass" class="text-box" required value="<?php echo $Class; ?>" readonly>  </div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <div class="row" >
  
  <div class="col-xs-3"> First Name of Applicant*: </div>
  <div class="col-xs-3"> <input name="txtName" id="txtName" type="text" class="text-box" value="<?php echo $FirstName; ?>" required readonly/> </div>
  <div class="col-xs-3 xs"> Middle Name of Applicant:</div>
  <div class="col-xs-3 xs1"> <input name="txtMiddleName" id="txtMiddleName" type="text" class="text-box" size="20" value="<?php echo $MiddleName; ?>"readonly></div>  
 </div>
 <div class="row">
  <div class="col-xs-3 xs"> Last Name of Applicant:</div>
  <div class="col-xs-3 xs1"> <input name="txtLastName" id="txtLastName" type="text" class="text-box" size="20" value="<?php echo $LastName; ?>" readonly></div>
  <div class="col-xs-3"> Place of Birth:</div>
  <div class="col-xs-3"> <input name="txtPlaceOfBirth" id="txtPlaceOfBirth" class="text-box" type="text" value="<?php echo $PlaceofBirth; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Date of Birth*:</div>
  <div class="col-xs-3"> <input name="txtDOB" id="txtDOB" type="date" class="text-box" placeholder="mm/dd/yyyy" required value="<?php echo $DOB; ?>" readonly></div>
  <div class="col-xs-3 xs"> Age as on*:</div>
  <div class="col-xs-3 xs1"> <input name="txtAge" id="txtAge" type="text" class="text-box" onClick="javascript:CalculateAgeInQC();" readonly placeholder="31-Mar-2017" required value="<?php echo $Age; ?>" readonly/></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Gender*:</div>
  <div class="col-xs-3"> <input type="text" name="txtSex" id="txtSex" class="text-box" required value="<?php echo $Gender; ?> " readonly>
  </div>
  <div class="col-xs-3"> Mother Tongue*: </div>
  <div class="col-xs-3"> <input name="txtMotherTounge" id="txtMotherTounge" class="text-box" type="text" required value="<?php echo $MotherTongue; ?>" readonly></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Blood Group*:</div>
  <div class="col-xs-3"><select name="bloodgroup" id="bloodgroup" class="text-box" required="true">
  			<option value="">Select One</option>
  			<option value="A+">A+</option>
  			<option value="A-">A-</option>
  			<option value="B+">B+</option>
  			<option value="B-">B-</option>
  			<option value="AB+">AB+</option>
  			<option value="AB-">AB-</option>
  			<option value="O+">O+</option>
  			<option value="O-">O-</option>
  			</select></div>
  <div class="col-xs-3"> Nationality: </div>
  <div class="col-xs-3"> <input name="txtNationality" id="txtNationality" type="text" class="text-box" value="<?php echo $Nationality; ?>" readonly></div>
  </div> 
 <div class="row">
  <div class="col-xs-3"> Last School Attended*: </div>
  <div class="col-xs-3"> <input name="txtLastSchool" id="txtLastSchool" type="text" class="text-box" required value="<?php echo $LastSchool; ?>" readonly></div>
  <div class="col-xs-3"> Choice of second language for class IX: </div>
  <div class="col-xs-3"> <input type="text" name="cbosecondlanguage" id="cbosecondlanguage" class="text-box" value="<?php echo $SecondLanguage; ?>" readonly>  </div>
  </div> 
 <div class="row">
  <div class="col-xs-3 xs"> Residential Address*: </div>
  <div class="col-xs-3 xs1"> <textarea name="txtpermanentAddress" id="txtpermanentAddress" class="text-box-address text-box tba" rows="2" required readonly/><?php echo $ResidentialAddress; ?></textarea></div>
  <div class="col-xs-3">Residential Landline Number:</div>
  <div class="col-xs-3"><input type="number" name="permanentno" id="permanentno" class="text-box tba" value="<?php echo  $ResidentialPhone; ?>" readonly></div>
   </div>
 <div class="row">
  <div class="col-xs-3 xs">  Permanent Address*:</div>
  <div class="col-xs-3 xs1"> <textarea name="txtAddress" id="txtAddress" class="text-box-address text-box tba" rows="2" required readonly /><?php echo  $PermanentAddress;?></textarea></div>
  <div class="col-xs-3">Permanent Landline Number:</div>
  <div class="col-xs-3"><input type="number" name="residentialno" id="residentialno" class="text-box tba" value="<?php echo $PermanentPhone; ?>" readonly></div>
</div>
 
 <div> &nbsp;</div>
 <div class="h h11" align="center"><strong> Family Details (Father / Mother / Guardian)</strong></div>
 <div>&nbsp;</div>
 <div align="center"><strong><u>Father's Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name*:</div>
  <div class="col-xs-3"> <input name="txtFatherName" id="txtFatherName" type="text" class="text-box" required></div>
  <div class="col-xs-3">  Age:</div>
  <div class="col-xs-3"> <input name="txtFatherAge" id="txtFatherAge" class="text-box" type="text"></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Qualification*:</div>
  <div class="col-xs-3"><select size="1" name="txtFatherEducation" id="txtFatherEducation" class="text-box tbs" required="true">
		<option selected="selected" value="">Select Highest Qualification</option>
	<?php
			while($rowEdu = mysql_fetch_row($rsEducation))
			{
				$Qualification=$rowEdu[0];
		?>
		<option value="<?php echo $Qualification;?>"><?php echo $Qualification;?></option>
		<?php
			}
		?>
		
	</select>
  </div>  
  <div class="col-xs-3">Occupation:</div>
  <div class="col-xs-3"><select name="txtFatherOccupation" id="txtFatherOccupation" class="text-box">
  			<option value="">Select One</option>
  			<option value="Business">Business</option>
  			<option value="Political">Political</option>
  			<option value="Ministry">Ministry</option>
  			<option value="Professional">Professional</option>
  			<option value="Services">Services</option>
  			<option value="Others">Others</option>
  			</select></div>
 </div>
 <div class="row">
 <div  id="fbusiness" style="display: none;">
  <div class="col-xs-3">Business:</div>
  <div class="col-xs-3"><select name="fatherbusiness" id="fatherbusiness" class="text-box tbs">
                            <option selected="" value="Select One">Select One</option>
		<?php
		while($row1 = mysql_fetch_row($rsfatherBusiness))
		{
					$fatherbusiness=$row1[0];
		?>
		<option value="<?php echo $fatherbusiness; ?>"><?php echo $fatherbusiness; ?></option>
		<?php 
		}
		?>
                          </select>
  </div>
  
 </div>
 <div id="fpolitical" style="display: none;">
 <div class="col-xs-3">Political:</div>
  <div class="col-xs-3"><input type="text" name="fatherpolitical" id="fatherpolitical" class="text-box"></div>
 </div>
  
 <div  id="fministry" style="display: none;">
  <div class="col-xs-3">Ministry:</div>
  <div class="col-xs-3"><input type="radio" name="fatherministry" id="fatherministry" value="External Affairs">External Affairs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="fatherministry" id="fatherministry" value="SSI">SSI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="fatherministry" id="fatherministry" value="Others">Others</div>
 </div>
 <div id="fprofessional" style="display: none;">
  <div class="col-xs-3">Professional:</div>
  <div class="col-xs-3"><select name="fatherprofssional" id="fatherprofssional" class="text-box">
                               <option selected="" value="Select One">Select One</option>
	<?php
		while($row1 = mysql_fetch_row($rsfatherProfession))
		{
					$fatherprofession=$row1[0];
		?>
		<option value="<?php echo $fatherprofession; ?>"><?php echo $fatherprofession; ?></option>
		<?php 
		}
		?>
		</select>
		</div>
 </div>
 <div id="fservicess" style="display: none;" >
  <div class="col-xs-3">Services:</div>
  <div class="col-xs-3"><select name="fatherservices" id="fatherservices" class="text-box">
                             <option selected="" value="Select One">Select One</option>
	    <?php
		while($row1 = mysql_fetch_row($rsfatherService))
		{
					$fatherservice=$row1[0];
		?>
		<option value="<?php echo $fatherservice; ?>"><?php echo $fatherservice; ?></option>
		<?php 
		}
		?>
                        </select>               
  </div>
 </div>
 <div id="fothers" style="display: none;" >
  <div class="col-xs-3">Others:</div>
  <div class="col-xs-3"><input type="text" name="fatherothers" id="fatherothers" class="text-box" ></div> 
 </div>
  <div class="col-xs-3 xs"> Designation: <br><font class="f">(If employed)</font> </div>
  <div class="col-xs-3 xs1"> <input name="txtFatherDesignation" id="txtFatherDesignation" class="text-box" type="text"></div>
 </div>
 <div class="row">
   <div class="col-xs-3"> Organization Name: <br><font class="f">(If employed)</font> </div>
  <div class="col-xs-3"> <input name="txtFatherCompanyName" id="txtFatherCompanyName" class="text-box" type="text"></div>
  <div class="col-xs-3"> Mobile No *:</div>
  <div class="col-xs-3"> <input name="txtFatherMobileNo" id="txtFatherMobileNo" class="text-box" type="text" required ></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Email Id *:</div>
  <div class="col-xs-3"> <input name="txtFatherEmailId" id="txtFatherEmailId" class="text-box" type="email" required></div>
  <div class="col-xs-3">Office Address: <br><font class="f">(If employed)</font> </div>
  <div class="col-xs-3"> <textarea name="txtFatherOfficialAddress" id="txtFatherOfficialAddress" class="text-box-address text-box" rows="2"></textarea></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Office Landline No. :</div>
  <div class="col-xs-3"><input type="number" name="cboofficeno" id="cboofficeno" class="text-box"></div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 
 <div>&nbsp;</div>
 <div align="center"><strong><u>Mother's Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name*:</div>
  <div class="col-xs-3"> <input name="txtMotherName" id="txtMotherName" type="text" class="text-box" required></div>
  <div class="col-xs-3"> Age:</div>
  <div class="col-xs-3"> <input name="txtMotherAge" id="txtMotherAge" class="text-box" type="text"></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Qualification*:</div>
  <div class="col-xs-3"><select size="1" name="txtMotherEducation" id="txtMotherEducation" class="text-box tbs" required="true">
		<option selected="selected" value="">Select Highest Qualification</option>
	<?php
			while($rowEdu1 = mysql_fetch_row($rsEducation1))
			{
				$Qualification1=$rowEdu1[0];
		?>
		<option value="<?php echo $Qualification1;?>"><?php echo $Qualification1;?></option>
		<?php
			}
		?>
	</select>
  </div>
  <div class="col-xs-3">Occupation</div>
  <div class="col-xs-3"><select name="txtMotherOccupation" id="txtMotherOccupation" class="text-box">
  			<option value="">Select One</option>
  			<option value="Business">Business</option>
  			<option value="Political">Political</option>
  			<option value="Ministry">Ministry</option>
  			<option value="Professional">Professional</option>
  			<option value="Services">Services</option>
  			<option value="Others">Others</option>
  			</select></div>
 </div>
 <div class="row"> 
 <div id="mbusiness" style="display: none;">
  <div class="col-xs-3">Business:</div>
  <div class="col-xs-3"><select name="motherbusiness" id="motherbusiness" class="text-box">
                               <option selected="" value="Select One">Select One</option>
	<?php
		while($row1 = mysql_fetch_row($rsmotherBusiness))
		{
					$motherbusiness=$row1[0];
		?>
		<option value="<?php echo $motherbusiness; ?>"><?php echo $motherbusiness; ?></option>
		<?php 
		}
		?>
                        </select>
  </div>
 </div>
 
 <div id="mpolitical" style="display: none;">
  <div class="col-xs-3">Political:</div>
  <div class="col-xs-3"><input type="text" name="motherpolitical" id="motherpolitical" class="text-box"></div>
 </div>
  
 <div  id="mministry" style="display: none;" >
  <div class="col-xs-3">Ministry:</div>
  <div class="col-xs-3"><input type="radio" name="motherministry" id="motherministry" value="External Affairs">External Affairs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="motherministry" id="motherministry" value="SSI">SSI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="motherministry" id="motherministry" value="Others">Others</div>

 </div>
 <div id="mprofessional" style="display: none;">
    <div class="col-xs-3">Professional:</div>
  <div class="col-xs-3"><select name="motherprofssional" id="motherprofssional" class="text-box">
                               <option selected="" value="Select One">Select One</option>
	<?php
		while($row1 = mysql_fetch_row($rsmotherProfession))
		{
					$motherprofession=$row1[0];
		?>
		<option value="<?php echo $motherprofession; ?>"><?php echo $motherprofession; ?></option>
		<?php 
		}
		?>
                        </select></div>
 </div>
 <div id="mservicess" style="display: none;">
     
      <div class="col-xs-3">Services:</div>
  <div class="col-xs-3"><select name="motherservices" id="motherservices" class="text-box">
                               <option selected="" value="Select One">Select One</option>
	<?php
		while($row1 = mysql_fetch_row($rsmotherService))
		{
					$motherservice=$row1[0];
		?>
		<option value="<?php echo $motherservice; ?>"><?php echo $motherservice; ?></option>
		<?php 
		}
		?>
                        </select>               
  </div> 
     
 </div>

  <div  id="mothers" style="display: none;" >
  <div class="col-xs-3">Others:</div>
  <div class="col-xs-3"><input type="text" name="motherothers" id="motherothers" class="text-box" ></div>  
 </div>
  <div class="col-xs-3 xs"> Designation: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3 xs1"> <input name="txtMotherDesignation" id="txtMotherDesignation" class="text-box" type="text"></div>	
 </div>
 <div class="row">
  <div class="col-xs-3 xs"> Organization Name: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3 xs1"> <input name="txtMotherCompanyName" id="txtMotherCompanyName" type="text" class="text-box"></div>
  <div class="col-xs-3"> Mobile No.*:</div>
  <div class="col-xs-3"> <input name="txtMotherMobileNo" id="txtFatherOfficialPhNo1" class="text-box" type="text" required></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Email id*:</div>
  <div class="col-xs-3"> <input name="txtMotherEmailId" id="txtFatherOfficialPhNo2" class="text-box" type="email" required></div>
  <div class="col-xs-3"> Office Address: <br><font class="f">(If employed)</font></div>
  <div class="col-xs-3"> <textarea name="txtMotherOfficialAddress" id="txtMotherOfficialAddress" class="text-box-address text-box" rows="2"></textarea></div>
 </div>
 <div class="row">
  <div class="col-xs-3">Office Landline No. :</div>
  <div class="col-xs-3"><input type="number" name="cbomotherofficeno" id="cbomotherofficeno" class="text-box"></div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 
 <div>&nbsp;</div>
 <div align="center"><strong><u>Guardian's Details (If Applicable)</u></strong></div>
 <div>&nbsp;</div>
 
 <div class="row">
  <div class="col-xs-3"> Name:</div>
  <div class="col-xs-3"> <input name="txtGuradianName" id="txtGuradianName" type="text" class="text-box" ></div>
  <div class="col-xs-3"> Age: </div>
  <div class="col-xs-3"> <input name="txtGuradianAge" id="txtGuradianAge" class="text-box" type="text" ></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Qualification:</div>
  <div class="col-xs-3"> <input name="txtGuradinaEducation" id="txtGuradinaEducation" type="text" class="text-box" ></div>
  <div class="col-xs-3">Occupation:</div>
  <div class="col-xs-3"><select name="txtGuradianOccupation" id="txtGuradianOccupation" class="text-box">
  			<option value="">Select One</option>
  			<option value="Business">Business</option>
  			<option value="Political">Political</option>
  			<option value="Ministry">Ministry</option>
  			<option value="Professional">Professional</option>
  			<option value="Services">Services</option>
  			<option value="Others">Others</option>
  			</select></div>
  
  
 </div>
 <div class="row">
 <div id="gbusiness" style="display: none;">
  <div class="col-xs-3">Business:</div>
  <div class="col-xs-3"><select name="guardianbusiness" id="guardianbusiness" class="text-box">
                             <option selected="" value="Select One">Select One</option>
	<?php
		while($row1 = mysql_fetch_row($rsguardianBusiness))
		{
					$guardianbusiness=$row1[0];
		?>
		<option value="<?php echo $guardianbusiness; ?>"><?php echo $guardianbusiness; ?></option>
		<?php 
		}
		?>
                        </select>
  </div>
  
 </div>
 <div id="gpolitical" style="display: none;" >
     
     <div class="col-xs-3">Political:</div>
  <div class="col-xs-3"><input type="text" name="guardianpolitical" id="guardianpolitical" class="text-box"></div>
 </div>
 <div id="gministry" style="display: none;" >
  <div class="col-xs-3">Ministry:</div>
  <div class="col-xs-3"><input type="radio" name="guardianministry" id="guardianministry" value="External Affairs">External Affairs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="guardianministry" id="guardianministry" value="SSI">SSI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="guardianministry" id="guardianministry" value="Others">Others</div>
  
 </div>
 <div id="gprofessional" style="display: none;">
   <div class="col-xs-3">Professional:</div>
  <div class="col-xs-3"><select name="guardianprofssional" id="guardianprofssional" class="text-box">
                              <option selected="" value="Select One">Select One</option>
	<?php
		while($row1 = mysql_fetch_row($rsguardianProfession))
		{
					$guardianprofession=$row1[0];
		?>
		<option value="<?php echo $guardianprofession; ?>"><?php echo $guardianprofession; ?></option>
		<?php 
		}
		?>
                        </select></div>
     
 </div>
 <div id="gservicess" style="display: none;" >
  <div class="col-xs-3">Services:</div>
  <div class="col-xs-3"><select name="guardianservices" id="guardianservices" class="text-box">
                              <option selected="" value="Select One">Select One</option>
	<?php
		while($row1 = mysql_fetch_row($rsguardianService))
		{
					$guardianservice=$row1[0];
		?>
		<option value="<?php echo $guardianservice; ?>"><?php echo $guardianservice; ?></option>
		<?php 
		}
		?>
                        </select>               
  </div>
   
 </div>
 <div id="gothers" style="display: none;" >
  <div class="col-xs-3">Others:</div>
  <div class="col-xs-3"><input type="text" name="guardianothers" id="guardianothers" class="text-box" ></div> 
 </div>
  <div class="col-xs-3"> Designation:<br><font class="f"> (If employed)</font></div>
  <div class="col-xs-3"> <input name="txtGuradianDesignation" id="txtMotherDesignation0" class="text-box" type="text" ></div>
 </div>
 <div class="row">
  <div class="col-xs-3 xs"> Organization Name:<br><font class="f">(If employed)</font></div>
  <div class="col-xs-3 xs1"> <input name="txtGuradianCompanyName" id="txtMotherCompanyName0" type="text" class="text-box" ></div>
  <div class="col-xs-3 xs"> Residence Landline. No: </div>
  <div class="col-xs-3 xs1"> <input name="txtGuradianOfficialPhNo" id="txtMotherOfficialPhNo0" class="text-box" type="text" ></div>
 </div>
 <div class="row">
  <div class="col-xs-3"> Mobile No.:</div>
  <div class="col-xs-3"> <input name="txtGuradianMobileNo" id="txtFatherOfficialPhNo4" class="text-box" type="text" ></div>
  <div class="col-xs-3"> Email id:</div>
  <div class="col-xs-3"> <input name="txtguardianEmailId" id="txtguardianEmailId" class="text-box" type="email" ></div>
 </div>
 <div class="row">
  <div class="col-xs-3 xs"> Address:</div>
  <div class="col-xs-3 xs1"> <textarea name="txtGuradianAddress" id="txtMotherAddress0" class="text-box-address text-box" class="text-box-address" rows="2"></textarea> </div>
  <div class="col-xs-3 xs"> Office Address:<br><font class="f">(If employed):</font></div>
  <div class="col-xs-3 xs1"> <textarea name="txtGuradianOfficialAddress" id="txtMotherOfficialAddress0" class="text-box-address text-box" class="text-box-address" rows="2"></textarea> </div>
 </div>
 <div>&nbsp;</div>
 <div class="h" align="center"><strong>Category</strong>*
		<i>(Please select the relevant Category / Categories and fill the details as applicable. 
		If you do not fall into any category, please select others. Parents are required to produce 
		the relevant documents at the time of admission. In case the documents are not produced, the candidature will be rejected)</i>
 </div>
 <div>&nbsp;</div>
 <div class="check check1" >
  <table>
   <tr> <td><input name="chkSibling" id="chkSibling" type="checkbox" value="1" onClick="javascript:fnlChkCategory('chkSibling');"></td> 
   		<td class="col1"><strong>Sibling(s) studying in DPS, Rohini</strong></td> </tr>
 
  </table>
  <table>
   <tr> <td><input name="chkFatherAlumni" id="chkFatherAlumni" type="checkbox" value="1" onClick="javascript:fnlChkCategory('chkFatherAlumni');"></td> 
   		<td class="col1"><strong>Father DPS Alumni</strong></td> </tr>
  
  </table>
  <table> 
   <tr> <td><input name="chkMotherAlumni" id="chkMotherAlumni" type="checkbox" value="1" onClick="javascript:fnlChkCategory('chkMotherAlumni');"></td>
   		<td class="col1"><strong>Mother DPS Alumni</strong></td>  </tr>

  </table>
  <table>
   <tr> <td><input name="chkDPSStaff" id="chkDPSStaff" type="checkbox" value="Yes" onClick="javascript:fnlChkCategory('chkDPSStaff');"></td>
   		<td class="col1"><strong>DPS Rohini  Staff</strong></td> </tr>
  
  </table>
  <table>
   <tr><td><input name="otherdpsstaff" id="otherdpsstaff" type="checkbox" value="1" onClick="javascript:fnlChkCategory('chkOtherCategory');"></td>
   		<td class="col1"><strong>Other DPS  Staff</strong></td> </tr>
  </table> 
  <table>
   <tr> <td><input name="chkSingleParent" id="chkSingleParent" type="checkbox" value="5" onClick="javascript:fnlChkCategory('chkSingleParent');"></td>
   		<td class="col1"><strong>Single  Parent</strong></td> </tr>
   
   
  </table>
 </div> 
 
 <div>&nbsp;</div>
 <div class="study">
 <div align="center">
        <strong>Details of Sibling(s) studying in <?php echo $SchoolName; ?> 
		</strong> <p>(If there is more than one sibling, mention all)</p>
 </div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Brother / Sister's Name: </div>
  <div class="col-xs-3"> <input name="txtRealBroSisName" id="txtRealBroSisName" class="text-box" type="text" readonly required> </div>
  <div class="col-xs-3"> Brother / Sister's Class:</div>
  <div class="col-xs-3"> 
  		<select name="txtRealBroSisClass" id="txtRealBroSisClass" class="text-box tbs" disabled="disabled" required="true">
        	<option value="">Select One</option>
    <?php
			while($rowClass = mysql_fetch_row($rsClass))
			{
				$classList=$rowClass [0];
		?>
		<option value="<?php echo $classList;?>"><?php echo $classList;?></option>
		<?php
			}
		?>
        </select>
  </div>
  <div class="col-xs-3"> Brother / Sister's Admission No:</div>
  <div class="col-xs-3"> <input name="txtRealBroSisSchoolName" id="txtRealBroSisSchoolName" class="text-box" type="text" readonly required></div>
  <div class="col-xs-6"> &nbsp;</div>
 </div>
 <hr class="hr">
 <div class="row">
  <div class="col-xs-3"> Brother / Sister's Name: </div>
  <div class="col-xs-3"> <input name="txtRealBroSisName2" id="txtRealBroSisName2" class="text-box" type="text" readonly > </div>
  <div class="col-xs-3"> Brother / Sister's Class: </div>
  <div class="col-xs-3"> 
  		<select name="txtRealBroSisClass2" id="txtRealBroSisClass2" class="text-box tbs" disabled="disabled">
        	<option value="">Select One</option>
    <?php
			while($rowClass = mysql_fetch_row($rsClass2))
			{
				$classList=$rowClass [0];
		?>
		<option value="<?php echo $classList;?>"><?php echo $classList;?></option>
		<?php
			}
		?>
        </select>
  </div>
  <div class="col-xs-3"> Brother / Sister's Admission No:</div>
  <div class="col-xs-3"> <input name="txtRealBroSisSchoolName2" id="txtRealBroSisSchoolName2" class="text-box" type="text" readonly></div>
  <div class="col-xs-6"> &nbsp;</div>
 </div>
 <hr class="hr">
 <div class="row">
  <div class="col-xs-3">Single Parent:</div>
  <div class="col-xs-3">
   <select size="1" name="cbosingleparent" id="cbosingleparent" class="text-box tbs"  onchange="Javascript:fnlChksingleparentDetail();" disabled="disabled">
		<option value="">Select One</option>
		<option value="Divorced">Divorced</option>
		<option value="Seperated">Seperated</option>
	    <option value="Deceased">Deceased</option>
         <option value="Others">Others</option>
   </select>
  </div>
  <div class="col-xs-3">(If Others, please specify):</div>
  <div class="col-xs-3"><input type="text" name="txtsingleparent" id="txtsingleparent" class="text-box"   style="display: none;"></div>
 </div>
 <div>&nbsp;</div>
 <div class="h" align="center">Details of Father / Mother, if Alumni of <font style="text-transform:uppercase"><?php echo $SchoolName; ?></font></div>
 <div>&nbsp;</div>
 
 <div align="center"><strong><u> Father Alumni Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name of Father:</div>
  <div class="col-xs-3"> <input name="txtFatherAlumniName" id="txtFatherAlumniName" class="text-box" type="text" readonly></div>
  <div class="col-xs-3"> Name of DPS Branch:</div>
  <div class="col-xs-3"> <input type="text" name="txtDPSSchoolName" id="txtDPSSchoolName" class="text-box" readonly></div>
  	
 </div>
 <div class="row">
  <div class="col-xs-3"> Passout Year:</div>
  <div class="col-xs-3"> <input name="txtYearOfPassing" id="txtYearOfPassing" class="text-box" type="text" size="20" readonly></div>
  <div class="col-xs-3"> Passout Class:</div>
  <div class="col-xs-3"> 
  	<select size="1" name="txtLastPassoutClassFather" id="txtLastPassoutClassFather" class="text-box tbs" disabled="disabled">
		<option selected value="">Select One</option>
		<option value="10th">10th</option>
		<option value="12th">12th</option>
	</select>
  </div>
 </div>
 
 <div>&nbsp; </div>
 <div align="center"><strong><u>Mother Alumni Details</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name of Mother:</div>
  <div class="col-xs-3"> <input name="txtMotherAlumniName" id="txtMotherAlumniName" class="text-box" type="text" readonly> </div>
  <div class="col-xs-3"> Name of DPS Branch:</div>
  <div class="col-xs-3"> <input name="txtMotherDPSSchoolName" id="txtMotherDPSSchoolName" class="text-box" type="text" readonly></div>
 </div>
 <div class="row">	
  <div class="col-xs-3"> Passout Year:</div>
  <div class="col-xs-3"> <input name="txtMotherYearOfPassing" id="txtMotherYearOfPassing" class="text-box" type="text" readonly></div>
  <div class="col-xs-3"> Passout Class:</div>
  <div class="col-xs-3"> 
    <select size="1" name="txtLastPassoutClassMother" id="txtLastPassoutClassMother" class="text-box tbs" disabled="disabled">
		<option selected value="">Select One</option>
		<option value="10th">10th</option>
		<option value="12th">12th</option>
	</select>
  </div>
 </div>
 <div>&nbsp; </div>
 <div align="center"><strong><u>Category</u></strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3">Select Category:</div>
  <div class="col-xs-3">
   <select size="1" name="cbocatagory" id="cbocatagory" class="text-box tbs"  onchange="Javascript:fnlChkCatagory();">
		<option value="">Select One</option>
                <option value="General">General</option>
		<option value="SC">SC</option>
		<option value="ST">ST</option>
	       <option value="OBC">OBC</option>
		<option value="Minority">Minority</option>
		<option value="Others">Other(Specify)</option>
   </select>
  </div>
  <div class="col-xs-3">(If Others, please specify):</div>
  <div class="col-xs-3"><input type="text" name="txtothercatagory" id="txtothercatagory" class="text-box" style="display: none;"></div>
 </div>
 
 
 
 <div>&nbsp;</div>
 <div class="h" align="center"><strong>Contact details for all admission related information.</strong> </div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-3"> Name of the contact person*:</div>
  <div class="col-xs-3"> <input name="txtcontactpersonname" id="txtcontactpersonname"  class="text-box"  type="text" required></div>
  <div class="col-xs-3"> Mobile No*:</div>
  <div class="col-xs-3"> <input name="txtemergencyMobile" id="txtemergencyMobile" type="text" class="text-box" onKeyPress="return isNumberKey(event)"  pattern="[0-9]{10}" required></div>
 
  <div class="col-xs-3"> E-mail Id*:</div>
  <div class="col-xs-3"> <input name="txtemergencyemail" id="txtemergencyemail" type="email" class="text-box" required></div>
  <div class="col-xs-6">&nbsp;</div> 
 </div>
 
 <div>&nbsp;</div>
 <div class="h" align="center"><strong> Documents to be Uploaded <p>(Please note maximum file size allowed is 250 Kb.)</p> </strong></div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 1. Copy of Birth Certificate issued by Municipal Corporation* :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F1"  required="true"> </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 2. Photograph of Applicant* :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F2" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif" required> </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 3. Photograph of Father* :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F3" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif" required> </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 4. Photograph of Mother* :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F4" accept="image/gif, image/jpeg, image/png, image/tiff, image/bmp,image/tif,image/gif" required> </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 5. Photograph of Guardian (if applicable)  :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F5" > </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 6. Copy Of ST/SC/OBC Certificate (if applicable) :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F6" > </div>
 </div>
 <div class="col-xs-6 xss"><b> 7. Proof of Any Other Category (if applicable) :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F7" > </div>
 </div>
 <div class="row xs11">
  <div class="col-xs-6 xss"><b> 8. Proof of Parent being DPS Staff (if applicable) :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F8" > </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 9. Proof of Parent being DPS Alumni (if applicable) :</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F9" > </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b> 10. Marksheet of Term-I Exam of Class VIII*:</b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F10" > </div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b>11. Marksheet of Final Exam of Class VII : </b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F11" required></div>
 </div>
 <div class="row">
  <div class="col-xs-6 xss"><b>12. Copy of Aadhar Card of Applicant : </b></div>
  <div class="col-xs-6 xss1"> <input type="file" name="F12" ></div>
 </div>
<div class="row">
  <div class="col-xs-6 xss"> <b>13. Residence Proof* :</b><br>
   <div class="row">
    <div class="col-xs-1"> <input type="radio" name="ResidenceProofType" value="Ration Card" required> </div>
    <div class="col-xs-10">Ration Card issued in the name of parents(mother / father having name of the child)</div> 
   </div>
   <div class="row">
    <div class="col-xs-1"> <input type="radio" name="ResidenceProofType" value="Domicile" required> </div>
    <div class="col-xs-10">Domicile Certificate of child or his/her parents.</div> 
   </div>
    <div class="row">
    <div class="col-xs-1"> <input type="radio" name="ResidenceProofType" value="Voter ID" required> </div>
    <div class="col-xs-10">Voter Identity Card / EPIC of any of the parents or child.</div> 
   </div>
    <div class="row">
    <div class="col-xs-1"> <input type="radio" name="ResidenceProofType" value="Aadhar Card" required> </div>
    <div class="col-xs-10">Aadhar Card / Unique Identity Card of Mother / Father / Child issued by the Government of India.</div> 
   </div>
  </div>
  <div class="col-xs-6 xss1"> <input type="file" name="F13" required> </div> 
 </div>
 <div>&nbsp;</div>
 <div class="row">
  <div class="col-xs-12" style="padding:0 1%;"><strong>Undertaking:</strong>
    <p><b>1.</b> I understand that the registration fee of <span style="font-weight: 400">INR 25</span>/- is towards the processing fee for the Class IX admission process. It is 
		non-refundable and registration does not guarantee admission.</p>
	<p><b>2.</b> I understand that rendering false / incorrect or misleading 
		information shall disqualify the applicant for admission to this school and 
		also that an incomplete form will be rejected without assigning any reason.</p>
	<p><b>3.</b> I 
		understand that no change/resubmission will be entertained by the school in case of ab incorrect entry.</p>
	<p><b>4.</b> I 
		understand that the decision of the management of the School shall be 
		final and binding on me for which I will not file any objection / case 
		in any court of law anywhere in India.</p>

	<p><b>5.</b> I hereby confirm the 
		above declarations.</p>
  </div>
 </div>
 
 <div class="row" style="padding-left:1%;">
  <div class="col-xs-3"><b>Place :</b></div>
  <div class="col-xs-3"> <input type="text" name="txtplaceofregistration" class="text-box" > </div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <div class="row" style="padding-left:1%;"> 
  <div class="col-xs-3"><b> Date :</b> </div>
  <div class="col-xs-3"><input type="text" name="txtdateofregistration" value="<?php echo $currentdate;?>" class="text-box" style="border:none"></div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <div>&nbsp;</div>
 <div class="col-xs-12" align="center"> <input name="BtnSubmit" type="submit" value="I Agree" ></div>
</div>
<div>&nbsp;</div>

</form>
</div>

</body>
</html>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){
$('#F1').bind('change', function() {
    var f1Size=(this.files[0].size/1024);
    if(f1Size >300){
       $("#errorMessageF1").html("Maximum file size limit is 300kb");
    }
});
$('#F2').bind('change', function() {
    var f2Size=(this.files[0].size/1024);
    if(f2Size >300){
       $("#errorMessageF2").html("Maximum file size limit is 300kb");
    }
});
$('#F3').bind('change', function() {
    var f3Size=(this.files[0].size/1024);
    if(f3Size >300){
       $("#errorMessageF3").html("Maximum file size limit is 300kb");
    }
});
$('#F4').bind('change', function() {
    var f4Size=(this.files[0].size/1024);
    if(f4Size >300){
       $("#errorMessageF4").html("Maximum file size limit is 300kb");
    }
});
$('#F5').bind('change', function() {
    var f5Size=(this.files[0].size/1024);
    if(f5Size >300){
       $("#errorMessageF5").html("Maximum file size limit is 300kb");
    }
});
$('#F6').bind('change', function() {
    var f6Size=(this.files[0].size/1024);
    if(f6Size >300){
       $("#errorMessageF6").html("Maximum file size limit is 300kb");
    }
});
$('#F7').bind('change', function() {
    var f7Size=(this.files[0].size/1024);
    if(f7Size >300){
       $("#errorMessageF7").html("Maximum file size limit is 300kb");
    }
});
$('#F9').bind('change', function() {
    var f9Size=(this.files[0].size/1024);
    if(f7Size >300){
       $("#errorMessageF9").html("Maximum file size limit is 300kb");
    }
});
$('#F10').bind('change', function() {
    var f10Size=(this.files[0].size/1024);
    if(f10Size >300){
       $("#errorMessageF10").html("Maximum file size limit is 300kb");
    }
});
$('#F11').bind('change', function() {
    var f11Size=(this.files[0].size/1024);
    if(f11Size >300){
       $("#errorMessageF11").html("Maximum file size limit is 300kb");
    }
});
$('#F12').bind('change', function() {
    var f12Size=(this.files[0].size/1024);
    if(f12Size >300){
       $("#errorMessageF12").html("Maximum file size limit is 300kb");
    }
});
$('#F13').bind('change', function() {
    var f13Size=(this.files[0].size/1024);
    if(f13Size >300){
       $("#errorMessageF13").html("Maximum file size limit is 300kb");
    }
});
  $('#F14').bind('change', function() {
    var f14Size=(this.files[0].size/1024);
    if(f14Size >300){
       $("#errorMessageF14").html("Maximum file size limit is 300kb");
    }
});      
    });
    </script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
    
    $(document).ready(function(){
      $("#txtFatherOccupation").change(function(){
        var accupation=$("#txtFatherOccupation").val();
        
      if(accupation=="Business"){
          $("#fbusiness").css("display", "block");
          $("#fpolitical").css("display", "none");
          $("#fministry").css("display", "none");
          $("#fprofessional").css("display", "none");
          $("#fservicess").css("display", "none");
          $("#fothers").css("display", "none");
          
       }else if(accupation=="Political"){
          $("#fbusiness").css("display", "none");
          $("#fpolitical").css("display", "block");
          $("#fministry").css("display", "none");
          $("#fprofessional").css("display", "none");
          $("#fservicess").css("display", "none");
          $("#fothers").css("display", "none");
       }else if(accupation=="Ministry"){
           $("#fbusiness").css("display", "none");
          $("#fpolitical").css("display", "none");
          $("#fministry").css("display", "block");
          $("#fprofessional").css("display", "none");
          $("#fservicess").css("display", "none");
          $("#fothers").css("display", "none");
       }else if(accupation=="Professional"){
          $("#fbusiness").css("display", "none");
          $("#fpolitical").css("display", "none");
          $("#fministry").css("display", "none");
          $("#fprofessional").css("display", "block");
          $("#fservicess").css("display", "none");
          $("#fothers").css("display", "none");
       }else if(accupation=="Services"){
          $("#fbusiness").css("display", "none");
          $("#fpolitical").css("display", "none");
          $("#fministry").css("display", "none");
          $("#fprofessional").css("display", "none");
          $("#fservicess").css("display", "block");
          $("#fothers").css("display", "none");
       }else if(accupation=="Others"){
          $("#fbusiness").css("display", "none");
          $("#fpolitical").css("display", "none");
          $("#fministry").css("display", "none");
          $("#fprofessional").css("display", "none");
          $("#fservicess").css("display", "none");
          $("#fothers").css("display", "block");
       }
      });  
       
       $("#txtMotherOccupation").change(function(){
         
        var maccupation=$("#txtMotherOccupation").val();
        
      if(maccupation=="Business"){
          $("#mbusiness").css("display", "block");
          $("#mpolitical").css("display", "none");
          $("#mministry").css("display", "none");
          $("#mprofessional").css("display", "none");
          $("#mservicess").css("display", "none");
          $("#mothers").css("display", "none");

       }else if(maccupation=="Political"){
          $("#mbusiness").css("display", "none");
          $("#mpolitical").css("display", "block");
          $("#mministry").css("display", "none");
          $("#mprofessional").css("display", "none");
          $("#mservicess").css("display", "none");
          $("#mothers").css("display", "none");
       }else if(maccupation=="Ministry"){
           $("#mbusiness").css("display", "none");
          $("#mpolitical").css("display", "none");
          $("#mministry").css("display", "block");
          $("#mprofessional").css("display", "none");
          $("#mservicess").css("display", "none");
          $("#mothers").css("display", "none");
       }else if(maccupation=="Professional"){
          $("#mbusiness").css("display", "none");
          $("#mpolitical").css("display", "none");
          $("#mministry").css("display", "none");
          $("#mprofessional").css("display", "block");
          $("#mservicess").css("display", "none");
          $("#mothers").css("display", "none");
       }else if(maccupation=="Services"){
          $("#mbusiness").css("display", "none");
          $("#mpolitical").css("display", "none");
          $("#mministry").css("display", "none");
          $("#mprofessional").css("display", "none");
          $("#mservicess").css("display", "block");
          $("#mothers").css("display", "none");
       }else if(maccupation=="Others"){
          $("#mbusiness").css("display", "none");
          $("#mpolitical").css("display", "none");
          $("#mministry").css("display", "none");
          $("#mprofessional").css("display", "none");
          $("#mservicess").css("display", "none");
          $("#mothers").css("display", "block");
       }
    });
    
    $("#txtGuradianOccupation").change(function(){
         
        var gaccupation=$("#txtGuradianOccupation").val();
        
      if(gaccupation=="Business"){
          $("#gbusiness").css("display", "block");
          $("#gpolitical").css("display", "none");
          $("#gministry").css("display", "none");
          $("#gprofessional").css("display", "none");
          $("#gservicess").css("display", "none");
          $("#gothers").css("display", "none");

       }else if(gaccupation=="Political"){
          $("#gbusiness").css("display", "none");
          $("#gpolitical").css("display", "block");
          $("#gministry").css("display", "none");
          $("#gprofessional").css("display", "none");
          $("#gservicess").css("display", "none");
          $("#gothers").css("display", "none");
       }else if(gaccupation=="Ministry"){
           $("#gbusiness").css("display", "none");
          $("#gpolitical").css("display", "none");
          $("#gministry").css("display", "block");
          $("#gprofessional").css("display", "none");
          $("#gservicess").css("display", "none");
          $("#gothers").css("display", "none");
       }else if(gaccupation=="Professional"){
          $("#gbusiness").css("display", "none");
          $("#gpolitical").css("display", "none");
          $("#gministry").css("display", "none");
          $("#gprofessional").css("display", "block");
          $("#gservicess").css("display", "none");
          $("#gothers").css("display", "none");
       }else if(gaccupation=="Services"){
          $("#gbusiness").css("display", "none");
          $("#gpolitical").css("display", "none");
          $("#gministry").css("display", "none");
          $("#gprofessional").css("display", "none");
          $("#gservicess").css("display", "block");
          $("#gothers").css("display", "none");
       }else if(gaccupation=="Others"){
          $("#gbusiness").css("display", "none");
          $("#gpolitical").css("display", "none");
          $("#gministry").css("display", "none");
          $("#gprofessional").css("display", "none");
          $("#gservicess").css("display", "none");
          $("#gothers").css("display", "block");
       }
    });
    
    });
    
    </script>

    