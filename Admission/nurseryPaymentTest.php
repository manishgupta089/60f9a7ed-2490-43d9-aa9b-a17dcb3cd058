<?php
	session_start();
	include '../connection.php';
	include '../AppConf.php';
?>
<?php
	if(isset($_POST['BtnSubmit']))
{
      //  echo "<pre />";print_r($_POST);die;
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
        $_SESSION['class']="Nursery";
	$Location=$_POST['txtLocality'];
	$Distance=$_POST['txtLocality'];
       
        
	$Twin_Triplet=$_POST['cboapplicable'];
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
	$GuradianMobileNo=$_POST['txtGuradianMobileNo'];
	$GuradianOfficialAddress=$_POST['txtGuradianOfficialAddress'];
	$GuradianOfficialPhNo=$_POST['txtguardianofficeno'];
	$GuardianEmailId=$_POST['txtguardianEmailId'];
	
	$Sibling=$_POST['chkSibling'];
	$Father_DPS_Alumni=$_POST['chkFatherAlumni'];
	$Mother_DPS_Alumni=$_POST['chkMotherAlumni'];
	$Single_Parent=$_POST['chkSingleParent'];
	$Special_Needs=$_POST['chkSpecialNeed'];
	
	$DPSRohiniStaff=$_POST['chkDPSStaff'];
	$OtherDPSStaff=$_POST['otherdpsstaff'];
	
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
	
	$SpecialNeedRequirment=$_POST['cboSpecialNeed'];
	$OtherSpecialNeed=$_POST['txtSpecialNeedDetail'];
	$Category=$_POST['cbocatagory'];
	$OtherCatagoryDetail=$_POST['txtothercatagory'];
	
	$EmergencyContactPersonName=$_POST['txtcontactpersonname'];
	$EmergencyContactNo=$_POST['txtemergencyMobile'];
	$EmergencyEmail=$_POST['txtemergencyemail'];
        
        $ResidenceProofType=$_POST['ResidenceProofType'];
       
        
            
	$BirthCertificate=$_FILES["F1"]["name"];
	$ProfilePhoto=$_FILES["F2"]["name"];

	$FatherPhoto=$_FILES["F3"]["name"];
	$MotherPhoto=$_FILES["F4"]["name"];
	$GuardianPhoto=$_FILES["F5"]["name"];
	$ParentDPSAlumni=$_FILES["F6"]["name"];
	$ParentDPSStaff=$_FILES["F7"]["name"];
	
	$CatagoryCertificate=$_FILES["F9"]["name"];
	$MedicalCertificate=$_FILES["F10"]["name"];
	$ResidenceProof=$_FILES["F11"]["name"];
         
        $SibilingProof=$_FILES["F12"]["name"];
	$GirlChild_FirstBorn=$_FILES["F13"]["name"];
	$SingleParent=$_FILES["F14"]["name"];
        
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
        
        $chkGirlChild_FirstBorn=$_POST['chkgirlCategory'];
        $bloodgroup=$_POST['bloodgroup'];
        
        
        
        
        $RegistrationDate=$_POST['txtdateofregistration'];
	$RegistrationPlace=$_POST['txtplaceofregistration'];
      
 $lastInsertedIdSQLReg=mysql_query("SELECT RegistrationNo FROM NewStudentRegistration_temp WHERE sclass='Nursery' ORDER BY srno DESC  LIMIT 1");
$rows_count=  mysql_num_rows($lastInsertedIdSQLReg);
if($rows_count>0){
   $lastInsertIdReg=  mysql_fetch_array($lastInsertedIdSQLReg);
    $finalRegistrationNO=$lastInsertIdReg['RegistrationNo']+1;
    
}else{
     $lastInsertIdReg=  mysql_fetch_array($lastInsertedIdSQLReg);
    $finalRegistrationNO=170000+1;
      
}
         
      $insertData=    mysql_query("INSERT INTO `NewStudentRegistration_temp`( `RegistrationNo`,`sname`,`middlename`,`slastname`,`PlaceOfBirth`,`DOB`,`Age`,`Sex`,`MotherTongue`,`Nationality`,`sclass`,`Location`,`Twin_Triplet`,`PermanentAddress`,`PermanentPhoneNo`,`ResidentialAddress`,`ResidencePhoneNo`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherDesignation`,`FatherOccupation`,`FatherCompanyName`,`FatherMobileNo`,`FatherEmailId`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherDesignation`,`MotherOccupatoin`,`MotherCompanyName`,`MotherMobile`,`MotherEmail`,`MotherOfficeAddress`,`MotherOfficePhone`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,`GuradianDesignation`,`GuradianCompanyName`,`GuradianMobileNo`,`GuradianOfficialAddress`,`GuradianOfficialPhNo`,`GuardianEmailId`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`Single_Parent`,`Special_Needs`,`DPSRohiniStaff`,`OtherDPSStaff`,`RealBroSisName`,`RealBroSisClass`,`RealBroSisAdmissionNo`,`RealBroSisName2`,`RealBroSisClass2`,`RealBroSisAdmissionNo2`,`Single_Parent_Reason`,`Other_single_parent`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`AlumniFatherPassingClass`,`AlumniMotherName`,`AlumniMotherSchoolName`,`AlumniMotherPassingYear`,`AlumniMotherPassingClass`,`SpecialNeedRequirment`,`OtherSpecialNeed`,`Category`,`OtherCatagoryDetail`,`EmergencyContactPersonName`,`EmergencyContactNo`,`EmergencyEmail`,`BirthCertificate`,`ProfilePhoto`,`FatherPhoto`,`MotherPhoto`,`GuardianPhoto`,`ParentDPSAlumni`,`ParentDPSStaff`,`CatagoryCertificate`,`MedicalCertificate`,`ResidenceProof`,`RegistrationDate`,"
        . "`RegistrationPlace`,`ResidenceProofType`,`SibilingProof`,`GirlChild_FirstBorn`"
        . ",`SingleParent`,`fatherbusiness`,`fatherpolitical`,`fatherministry`,`fatherprofssional`,`fatherservices`"
        . ",`fatherothers`,`motherbusiness`,`motherpolitical`,`motherministry`,`motherprofssional`,`motherservices`"
        . ",`motherothers`,`guardianbusiness`,`guardianpolitical`,`guardianministry`,`guardianprofssional`,`guardianservices`,`guardianothers`,`chkGirlChild_FirstBorn`,`Distance`,`bloodgroup`) VALUES ('$finalRegistrationNO','$sname','$middlename','$slastname','$PlaceOfBirth','$DOB','$Age','$Sex','$MotherTongue','$Nationality','$sclass','$Location','$Twin_Triplet','$PermanentAddress','$PermanentPhoneNo','$ResidentialAddress','$ResidencePhoneNo','$sfathername','$sfatherage','$FatherEducation','$FatherDesignation','$FatherOccupation','$FatherCompanyName','$FatherMobileNo','$FatherEmailId','$FatherOfficeAddress','$FatherOfficePhoneNo','$MotherName','$MotherAge','$MotherEducation','$MotherDesignation','$MotherOccupatoin','$MotherCompanyName','$MotherMobile','$MotherEmail','$MotherOfficeAddress','$MotherOfficePhone','$GuradianName','$GuradianAge','$GuradinaEducation','$GuradianOccupation','$GuradianDesignation','$GuradianCompanyName','$GuradianMobileNo','$GuradianOfficialAddress','$GuradianOfficialPhNo','$GuardianEmailId','$Sibling','$Father_DPS_Alumni','$Mother_DPS_Alumni','$Single_Parent','$Special_Needs','$DPSRohiniStaff','$OtherDPSStaff','$RealBroSisName','$RealBroSisClass','$RealBroSisAdmissionNo','$RealBroSisName2','$RealBroSisClass2','$RealBroSisAdmissionNo2','$Single_Parent_Reason','$Other_single_parent','$AlumniFatherName','$AlumniSchoolName','$AlumniPassingYear','$AlumniFatherPassingClass','$AlumniMotherName','$AlumniMotherSchoolName','$AlumniMotherPassingYear','$AlumniMotherPassingClass','$SpecialNeedRequirment','$OtherSpecialNeed','$Category','$OtherCatagoryDetail','$EmergencyContactPersonName','$EmergencyContactNo','$EmergencyEmail','$BirthCertificate','$ProfilePhoto','$FatherPhoto','$MotherPhoto','$GuardianPhoto','$ParentDPSAlumni','$ParentDPSStaff','$CatagoryCertificate','$MedicalCertificate','$ResidenceProof','$RegistrationDate',"
        . "'$RegistrationPlace','$ResidenceProofType','$SibilingProof','$GirlChild_FirstBorn'"
        . ",'$SingleParent','$fatherbusiness','$fatherpolitical','$fatherministry','$fatherprofssional','$fatherservices'"
        . ",'$fatherothers','$motherbusiness','$motherpolitical','$motherministry','$motherprofssional','$motherservices'"
        . ",'$motherothers','$guardianbusiness','$guardianpolitical','$guardianministry','$guardianprofssional','$guardianservices','$guardianothers','$chkGirlChild_FirstBorn','$Distance','$bloodgroup')");

//$lastInsertedIdSQLReg=mysql_query("SELECT RegistrationNo FROM NewStudentRegistration_temp WHERE sclass='Nursery' ORDER BY srno DESC  LIMIT 1");
//$rows_count=  mysql_num_rows($lastInsertedIdSQLReg);
//if($rows_count>0){
//   $lastInsertIdReg=  mysql_fetch_array($lastInsertedIdSQLReg);
//    $finalRegistrationNO=$lastInsertIdReg['RegistrationNo']+1;
//    $updateCreteriaTable=mysql_query("UPDATE  NewStudentRegistration_temp SET  RegistrationNo = '".$finalRegistrationNO."'  WHERE  srno='".$lastInsertIdReg['srno']."'");
//     
//}else{
//     $lastInsertIdReg=  mysql_fetch_array($lastInsertedIdSQLReg);
//    $finalRegistrationNO=170000+1;
//    $updateCreteriaTable=mysql_query("UPDATE  NewStudentRegistration_temp SET  RegistrationNo = '".$finalRegistrationNO."'  WHERE  srno='".$lastInsertIdReg['srno']."'");
//      
//}
    
    /*---------------GENERATE PDF CODE AND SEND-----------------------------------------------------------------------*/
    
      
      
      
      echo "INSERT INTO `NewStudentRegistration_temp`( `RegistrationNo`,`sname`,`middlename`,`slastname`,`PlaceOfBirth`,`DOB`,`Age`,`Sex`,`MotherTongue`,`Nationality`,`sclass`,`Location`,`Twin_Triplet`,`PermanentAddress`,`PermanentPhoneNo`,`ResidentialAddress`,`ResidencePhoneNo`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherDesignation`,`FatherOccupation`,`FatherCompanyName`,`FatherMobileNo`,`FatherEmailId`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherDesignation`,`MotherOccupatoin`,`MotherCompanyName`,`MotherMobile`,`MotherEmail`,`MotherOfficeAddress`,`MotherOfficePhone`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,`GuradianDesignation`,`GuradianCompanyName`,`GuradianMobileNo`,`GuradianOfficialAddress`,`GuradianOfficialPhNo`,`GuardianEmailId`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`Single_Parent`,`Special_Needs`,`DPSRohiniStaff`,`OtherDPSStaff`,`RealBroSisName`,`RealBroSisClass`,`RealBroSisAdmissionNo`,`RealBroSisName2`,`RealBroSisClass2`,`RealBroSisAdmissionNo2`,`Single_Parent_Reason`,`Other_single_parent`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`AlumniFatherPassingClass`,`AlumniMotherName`,`AlumniMotherSchoolName`,`AlumniMotherPassingYear`,`AlumniMotherPassingClass`,`SpecialNeedRequirment`,`OtherSpecialNeed`,`Category`,`OtherCatagoryDetail`,`EmergencyContactPersonName`,`EmergencyContactNo`,`EmergencyEmail`,`BirthCertificate`,`ProfilePhoto`,`FatherPhoto`,`MotherPhoto`,`GuardianPhoto`,`ParentDPSAlumni`,`ParentDPSStaff`,`CatagoryCertificate`,`MedicalCertificate`,`ResidenceProof`,`RegistrationDate`,"
        . "`RegistrationPlace`,`ResidenceProofType`,`SibilingProof`,`GirlChild_FirstBorn`"
        . ",`SingleParent`,`fatherbusiness`,`fatherpolitical`,`fatherministry`,`fatherprofssional`,`fatherservices`"
        . ",`fatherothers`,`motherbusiness`,`motherpolitical`,`motherministry`,`motherprofssional`,`motherservices`"
        . ",`motherothers`,`guardianbusiness`,`guardianpolitical`,`guardianministry`,`guardianprofssional`,`guardianservices`,`guardianothers`,`chkGirlChild_FirstBorn`,`Distance`,`bloodgroup`) VALUES ('$finalRegistrationNO','$sname','$middlename','$slastname','$PlaceOfBirth','$DOB','$Age','$Sex','$MotherTongue','$Nationality','$sclass','$Location','$Twin_Triplet','$PermanentAddress','$PermanentPhoneNo','$ResidentialAddress','$ResidencePhoneNo','$sfathername','$sfatherage','$FatherEducation','$FatherDesignation','$FatherOccupation','$FatherCompanyName','$FatherMobileNo','$FatherEmailId','$FatherOfficeAddress','$FatherOfficePhoneNo','$MotherName','$MotherAge','$MotherEducation','$MotherDesignation','$MotherOccupatoin','$MotherCompanyName','$MotherMobile','$MotherEmail','$MotherOfficeAddress','$MotherOfficePhone','$GuradianName','$GuradianAge','$GuradinaEducation','$GuradianOccupation','$GuradianDesignation','$GuradianCompanyName','$GuradianMobileNo','$GuradianOfficialAddress','$GuradianOfficialPhNo','$GuardianEmailId','$Sibling','$Father_DPS_Alumni','$Mother_DPS_Alumni','$Single_Parent','$Special_Needs','$DPSRohiniStaff','$OtherDPSStaff','$RealBroSisName','$RealBroSisClass','$RealBroSisAdmissionNo','$RealBroSisName2','$RealBroSisClass2','$RealBroSisAdmissionNo2','$Single_Parent_Reason','$Other_single_parent','$AlumniFatherName','$AlumniSchoolName','$AlumniPassingYear','$AlumniFatherPassingClass','$AlumniMotherName','$AlumniMotherSchoolName','$AlumniMotherPassingYear','$AlumniMotherPassingClass','$SpecialNeedRequirment','$OtherSpecialNeed','$Category','$OtherCatagoryDetail','$EmergencyContactPersonName','$EmergencyContactNo','$EmergencyEmail','$BirthCertificate','$ProfilePhoto','$FatherPhoto','$MotherPhoto','$GuardianPhoto','$ParentDPSAlumni','$ParentDPSStaff','$CatagoryCertificate','$MedicalCertificate','$ResidenceProof','$RegistrationDate',"
        . "'$RegistrationPlace','$ResidenceProofType','$SibilingProof','$GirlChild_FirstBorn'"
        . ",'$SingleParent','$fatherbusiness','$fatherpolitical','$fatherministry','$fatherprofssional','$fatherservices'"
        . ",'$fatherothers','$motherbusiness','$motherpolitical','$motherministry','$motherprofssional','$motherservices'"
        . ",'$motherothers','$guardianbusiness','$guardianpolitical','$guardianministry','$guardianprofssional','$guardianservices','$guardianothers','$chkGirlChild_FirstBorn','$Distance','$bloodgroup')";die;
      
      
     $target_dir = "Documents_nursery/";
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
        
        $target_fileF9 = $target_dir.basename($_FILES["F9"]["name"]);
        move_uploaded_file($_FILES["F9"]["tmp_name"], $target_fileF9);
        
         $target_fileF10 = $target_dir.basename($_FILES["F10"]["name"]);
        move_uploaded_file($_FILES["F10"]["tmp_name"], $target_fileF10);
		
	$target_fileF11 = $target_dir.basename($_FILES["F11"]["name"]);
        move_uploaded_file($_FILES["F11"]["tmp_name"], $target_fileF11);
        
          $target_fileF12 = $target_dir.basename($_FILES["F12"]["name"]);
        move_uploaded_file($_FILES["F12"]["tmp_name"], $target_fileF12);
        
         $target_fileF13 = $target_dir.basename($_FILES["F13"]["name"]);
        move_uploaded_file($_FILES["F13"]["tmp_name"], $target_fileF113);
		
	$target_fileF14 = $target_dir.basename($_FILES["F14"]["name"]);
        move_uploaded_file($_FILES["F14"]["tmp_name"], $target_fileF14);
  
    
    
    
    if($insertData){ 
    
    include("CitrusPayment.php");
    }
    
    
    
}	
?>
