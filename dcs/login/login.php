<?php 
session_start();
include("../include/conn.php");
$action = base64_decode($_GET['action']);

if($action == 'login'){
    
    $FLD_BNAME  = $_POST['FLD_BNAME'];
    $FLD_BCODE  = $_POST['FLD_BCODE'];
    $users = mysqli_query($db,"SELECT * 
                               FROM tbl_usr02 
                               WHERE 
                               FLD_BNAME = '".mysqli_real_escape_string($db,$FLD_BNAME)."' 
    						   AND FLD_BCODE ='".mysqli_real_escape_string($db,$FLD_BCODE)."'
    						   AND FLD_UFLAG = 'Active'");
    								
    $num    = mysqli_num_rows($users);
    $user   = mysqli_fetch_array($users);
    
    if ( $num > 0 ) {
    $FLD_ID     = $user['FLD_ID'];
    $FLD_BNAME  = $user['FLD_BNAME'];
    $FLD_BTYPE  = $user['FLD_BTYPE'];
	$FLD_DNAME  = $user['FLD_DNAME'];
    $FLD_EMAIL  = $user['FLD_EMAIL'];
    $update=mysqli_query($db,"UPDATE
                              tbl_usr02 set FLD_LTIME='".date('Y-m-d H:i')."'
                              WHERE FLD_ID='".$FLD_ID."' ");

    $FLD_LTIME  = date('Y-m-d H:i');
    
    $_SESSION['FLD_ID']      = $FLD_ID;
    $_SESSION['FLD_BNAME']   = $FLD_BNAME;
    $_SESSION['FLD_BTYPE']   = $FLD_BTYPE;
	$_SESSION['FLD_DNAME']   = $FLD_DNAME;
	$_SESSION['FLD_EMAIL']   = $FLD_EMAIL;
    $_SESSION['FLD_LTIME']   = $FLD_LTIME;
    
    header("location: ../dashboard.php?login=true");
	
	
    }
    else{
    header("location: ../index.php?login=fail");	
    }
}

?> 

