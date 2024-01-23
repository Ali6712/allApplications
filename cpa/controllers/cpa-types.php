<?php 
include("../include/security.php");
include("../include/conn.php");
if($_GET['insert']=='cpa-type'){
	

	$insert = mysqli_query($db,"insert into tbl_cpatypes(
	FLD_CPANAME, FLD_CPAFLAG)
	values('".mysqli_real_escape_string($db,$_POST["FLD_CPANAME"])."',
	'".$_POST["FLD_CPAFLAG"]."')");

	
	header("location:../cpa-types.php");
}

elseif($_GET['edit']=='cpa-type'){
	

	$update = mysqli_query($db,"update tbl_cpatypes set
	FLD_CPANAME='".mysqli_real_escape_string($db,$_POST["FLD_CPANAME"])."',
	FLD_CPAFLAG='".$_POST["FLD_CPAFLAG"]."'

	where FLD_ID='".$_GET['id']."'");

	
	header("location:../cpa-types.php");
}
?>