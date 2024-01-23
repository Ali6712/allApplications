<?php 
include("../include/security.php");
include("../include/conn.php");

//checking username and password
$Username=mysqli_real_escape_string($db,$_POST['UserName']);
$UserPassword=mysqli_real_escape_string($db,$_POST['UserPassword']);

$check_user = mysqli_query($db,"SELECT * FROM tblusers WHERE UserName='".$Username."' and UserPassword='".$UserPassword."'");
$rs = mysqli_num_rows($check_user);
$row = mysqli_fetch_array($check_user);

if ( $rs > 0 ) {

$Userid          = $row['Userid'];
$UserName        = $row['UserName'];
$UserType        = $row['UserType'];
$UserLastLogin   = $row['UserLastLogin'];
$IsIncharge      = $row['IsIncharge'];
$KPIFlag         = $row['KPIFlag'];
$_SESSION['Userid']          = $Userid;
$_SESSION['UserType']        = $UserType;
$_SESSION['UserName']        = $UserName;
$_SESSION['UserLastLogin']   = $UserLastLogin;
$_SESSION['IsIncharge']      = $IsIncharge;
$_SESSION['KPIFlag']         = $KPIFlag;
$update = mysqli_query($db,"UPDATE tblusers SET UserLastLogin='".date("H:i d.m.Y")."' WHERE Userid='".$Userid."'");

if($row['Flag']==0){
	header("location: ../change_password.php");
}else{
	
	header("location: ../main.php");	

}
}else{
    header("location: ../index.php?login=false");
}


?> 

