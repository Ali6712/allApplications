<?php 
include("../include/security.php");
include("../include/conn.php");
if($_GET['insert']=='customer'){
	

	
	$insert = mysqli_query($db,"insert into tblcustomers(
	c_code,c_name)
	values(
	'".mysqli_real_escape_string($db,$_POST["c_code"])."',
'".mysqli_real_escape_string($db,$_POST["c_name"])."')");

	
	header("location:../customers.php");
}

elseif($_GET['edit']=='customer'){
	

	
	$update = mysqli_query($db,"update tblcustomers set
	
	c_code='".mysqli_real_escape_string($db,$_POST["c_code"])."',
c_name='".mysqli_real_escape_string($db,$_POST["c_name"])."'
	where c_id='".$_GET['id']."'");

	
	header("location:../customers.php");
}
?>