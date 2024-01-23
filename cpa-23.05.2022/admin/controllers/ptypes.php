<?php 
include("../../include/security.php");
include("../../include/conn.php");
if($_GET['insert']=='pt'){
	

	
	$insert = mysqli_query($db,"insert into types(
	di,dname)
	values(
	'".mysqli_real_escape_string($db,$_POST["di"])."',
'".mysqli_real_escape_string($db,$_POST["tname"])."')");

	
	header("location:../process-type.php");
}

elseif($_GET['edit']=='pt'){
	

	
$update = mysqli_query($db,"update types set
	
	di='".mysqli_real_escape_string($db,$_POST["di"])."',
tname='".mysqli_real_escape_string($db,$_POST["tname"])."'
	where id='".$_GET['id']."'");

	
	header("location:../process-type.php");
}
?>