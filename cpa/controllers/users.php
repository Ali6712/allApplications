<?php 
include("../include/security.php");
include("../include/conn.php");
if($_GET['insert']=='user'){
	

	$insert = mysqli_query($db,"insert into tbl_usr02(
	FLD_BTYPE, FLD_DNAME,FLD_BNAME,FLD_BCODE,FLD_EMAIL,FLD_UFLAG)
	values(
	'".$_POST["FLD_BTYPE"]."',
	'".$_POST["FLD_DNAME"]."',
	'".mysqli_real_escape_string($db,$_POST["FLD_BNAME"])."',
	'".mysqli_real_escape_string($db,$_POST["FLD_BCODE"])."',
	'".mysqli_real_escape_string($db,$_POST["FLD_EMAIL"])."',
	'".$_POST["FLD_UFLAG"]."')");

	
	header("location:../users.php");
}

elseif($_GET['edit']=='user'){
	

	$update = mysqli_query($db,"update tbl_usr02 set
	FLD_BTYPE='".$_POST["FLD_BTYPE"]."',
	FLD_DNAME='".$_POST["FLD_DNAME"]."',
	FLD_BNAME='".mysqli_real_escape_string($db,$_POST["FLD_BNAME"])."',
	FLD_BCODE='".mysqli_real_escape_string($db,$_POST["FLD_BCODE"])."',
	FLD_EMAIL='".mysqli_real_escape_string($db,$_POST["FLD_EMAIL"])."',
	FLD_UFLAG='".$_POST["FLD_UFLAG"]."'

	where FLD_ID='".$_GET['id']."'");

	
	header("location:../users.php");
}
?>