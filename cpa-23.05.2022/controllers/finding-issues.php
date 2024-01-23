<?php 
include("../include/security.php");
include("../include/conn.php");
if($_GET['insert']=='finding-issue'){
	

	$insert = mysqli_query($db,"insert into tbl_fissues(
	FLD_FNAME, FLD_FFLAG)
	values('".mysqli_real_escape_string($db,$_POST["FLD_FNAME"])."',
	'".$_POST["FLD_FFLAG"]."')");

	
	header("location:../finding-issues.php");
}

elseif($_GET['edit']=='finding-issue'){
	

	$update = mysqli_query($db,"update tbl_fissues set
	FLD_FNAME='".mysqli_real_escape_string($db,$_POST["FLD_FNAME"])."',
	FLD_FFLAG='".$_POST["FLD_FFLAG"]."'

	where FLD_ID='".$_GET['id']."'");

	
	header("location:../finding-issues.php");
}
?>