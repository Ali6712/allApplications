<?php
include("../include/security.php");
include("../include/conn.php");

if($_GET["insert"]=="employee"){

$insert=mysqli_query($db,"insert into tbluserinfodetail
(Userid, User_Name, Date_Of_Joining,  
Desigid,
ESid,
Deptid,
Cityid,
Incharge_Code,
HOD_Code,
Date_Of_Birth,
CNIC,
Gender,
Mobile_No_1,
Cid,
HiringMonth,
HiringYear
)
values
('".$_POST['Userid']."', '".$_POST['User_Name']."', '".$_POST['Date_Of_Joining']."',  
'".$_POST['Desigid']."',
'1',
'".$_POST['Deptid']."',
'".$_POST['Cityid']."',
'".$_POST['Incharge_Code']."',
'0',
'".$_POST['Date_Of_Birth']."',
'".$_POST['CNIC']."',
'".$_POST['Gender']."',
'".mysqli_real_escape_string($db,$_POST['Mobile_No_1'])."',
'".$_POST['Cid']."',
'".$_POST['MO']."',
'".$_POST['YR']."'
)");



$insert2=mysqli_query($db,"insert into tblusers
(UserName, UserPassword, UserType, Deptid)
values('".$_POST['Userid']."', '123', '".$_POST['Login_Type']."','".$_POST['Deptid']."')");
header("location:../employees-list.php");
}elseif($_GET["edit"]=="employee"){

$update=mysqli_query($db,"update tbluserinfodetail set 
User_Name='".$_POST['User_Name']."', Date_Of_Joining='".$_POST['Date_Of_Joining']."',  
Desigid='".$_POST['Desigid']."',
ESid='".$_POST['ESid']."',
Deptid='".$_POST['Deptid']."',
Cityid='".$_POST['Cityid']."',
Incharge_Code='".$_POST['Incharge_Code']."',
HOD_Code='0',
Date_Of_Birth='".$_POST['Date_Of_Birth']."',
CNIC='".$_POST['CNIC']."',
Gender='".$_POST['Gender']."',
Mobile_No_1='".mysqli_real_escape_string($db,$_POST['Mobile_No_1'])."',
Cid='".$_POST['Cid']."',
HiringMonth='".$_POST['MO']."',
HiringYear='".$_POST['YR']."'
where Userid='".$_POST['Userid']."'");

header("location:../employees-list.php");
}


?>