<?php 
include("../../include/security.php");
include("../../include/conn.php");
if($_GET['insert']=='defect'){
	

	
	$insert = mysqli_query($db,"insert into defects(
	di,dname)
	values(
	'".mysqli_real_escape_string($db,$_POST["di"])."',
'".mysqli_real_escape_string($db,$_POST["dname"])."')");

	
	header("location:../defect-types.php");
}

elseif($_GET['edit']=='defect'){
	

	
	$update = mysqli_query($db,"update defects set
	
	di='".mysqli_real_escape_string($db,$_POST["di"])."',
dname='".mysqli_real_escape_string($db,$_POST["dname"])."'
	where id='".$_GET['id']."'");

	
	header("location:../defect-types.php");
}
?>