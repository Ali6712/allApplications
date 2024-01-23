<?php 
include("../include/security.php");
include("../include/conn.php");
if($_GET['insert']=='finding-type'){
	

	$insert = mysqli_query($db,"insert into tbl_ftypes(
	FLD_FTNAME, FLD_FTFLAG)
	values('".mysqli_real_escape_string($db,$_POST["FLD_FTNAME"])."',
	'".$_POST["FLD_FTFLAG"]."')");

	
	header("location:../finding-types.php");
}

elseif($_GET['edit']=='finding-type'){
	

	$update = mysqli_query($db,"update tbl_ftypes set
	FLD_FTNAME='".mysqli_real_escape_string($db,$_POST["FLD_FTNAME"])."',
	FLD_FTFLAG='".$_POST["FLD_FTFLAG"]."'

	where FLD_ID='".$_GET['id']."'");

	
	header("location:../finding-types.php");
}
?>