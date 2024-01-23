<?php 
session_start();
include("../include/conn.php");

//checking username and password
$user_name=$_POST['user_name'];
$user_password=$_POST['user_password'];
echo "SELECT * 
                                 FROM tblusers 
                                 WHERE user_email     ='".mysqli_real_escape_string($db,$user_name)."' 
								 AND   user_password  ='".mysqli_real_escape_string($db,$user_password)."'";
$select_user = mysqli_query($db,"SELECT * 
                                 FROM tblusers 
                                 WHERE user_email     ='".mysqli_real_escape_string($db,$user_name)."' 
								 AND   user_password  ='".mysqli_real_escape_string($db,$user_password)."'");
								
$check_user = mysqli_num_rows($select_user);
$row_user   = mysqli_fetch_array($select_user);

if ( $check_user > 0 ) {

$user_id          = $row_user['user_id'];
$user_email       = $row_user['user_email'];
$user_name        = $row_user['user_name'];
$user_type        = $row_user['user_type'];
$user_last_login  = $row_user['user_last_login'];

$_SESSION['user_id']           = $user_id;
$_SESSION['user_name']         = $user_name;
$_SESSION['user_type']         = $user_type;
$_SESSION['user_last_login']   = $user_last_login;
header("location:../admin/index.php?login=true");
}
else{
header("location:../login.php?login=fail");
}


?> 

