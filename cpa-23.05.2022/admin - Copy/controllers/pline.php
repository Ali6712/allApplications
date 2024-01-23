<?php 
include("../../include/security.php");
include("../../include/conn.php");
if($_GET['insert']=='pline'){
	

	
	$insert = mysqli_query($db,"insert into productlines(
	di,lname)
	values(
	'".mysqli_real_escape_string($db,$_POST["di"])."',
'".mysqli_real_escape_string($db,$_POST["lname"])."')");

	
	header("location:../production-line.php");
}

elseif($_GET['edit']=='pline'){
	

	
	$update = mysqli_query($db,"update productlines set
	
	di='".mysqli_real_escape_string($db,$_POST["di"])."',
lname='".mysqli_real_escape_string($db,$_POST["lname"])."'
	where id='".$_GET['id']."'");

	
	header("location:../production-line.php");
}
?>