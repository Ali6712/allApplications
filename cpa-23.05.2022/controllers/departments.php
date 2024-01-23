<?php 
include("../include/security.php");
include("../include/conn.php");
if($_GET['insert']=='department'){
	

	$insert = mysqli_query($db,"insert into tbl_depts(
	FLD_DNAME, FLD_DFLAG)
	values('".mysqli_real_escape_string($db,$_POST["FLD_DNAME"])."',
	'".$_POST["FLD_DFLAG"]."')");

	
	header("location:../departments.php");
}

elseif($_GET['edit']=='department'){
	

	$update = mysqli_query($db,"update tbl_depts set
	FLD_DNAME='".mysqli_real_escape_string($db,$_POST["FLD_DNAME"])."',
	FLD_DFLAG='".$_POST["FLD_DFLAG"]."'

	where FLD_ID='".$_GET['id']."'");

	
	header("location:../departments.php");
}
?>