<?php 
session_start();
include("../include/conn.php");

//checking username and password
$FLD_EMAIL=$_POST['FLD_EMAIL'];
$FLD_BCODE=$_POST['FLD_BCODE'];

$select_user = mysqli_query($db,"SELECT * 
                                 FROM tbl_usr02 
                                 WHERE FLD_EMAIL     ='".mysqli_real_escape_string($db,$FLD_EMAIL)."' 
								 AND   FLD_BCODE     ='".mysqli_real_escape_string($db,$FLD_BCODE)."'");
		
$check_user = mysqli_num_rows($select_user);
$row_user   = mysqli_fetch_array($select_user);

if ( $check_user > 0 ) {

$FLD_ID           = $row_user['FLD_ID'];
$FLD_BTYPE        = $row_user['FLD_BTYPE'];
$FLD_BNAME        = $row_user['FLD_BNAME'];
$FLD_EMAIL        = $row_user['FLD_EMAIL'];
$FLD_DNAME        = $row_user['FLD_DNAME'];


$_SESSION['FLD_ID']            = $FLD_ID;
$_SESSION['FLD_BTYPE']         = $FLD_BTYPE;
$_SESSION['FLD_BNAME']         = $FLD_BNAME;
$_SESSION['FLD_EMAIL']         = $FLD_EMAIL;
$_SESSION['FLD_DNAME']         = $FLD_DNAME;

header("location:../index.php?login=true");
}
else{
header("location:../login.php?login=fail");
}


?> 

