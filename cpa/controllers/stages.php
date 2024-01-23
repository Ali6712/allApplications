<?php 
include("../../include/security.php");
include("../../include/conn.php");
if($_GET['insert']=='cs'){
	

	
	$insert = mysqli_query($db,"insert into stages(
	sname,sstatus)
	values(
	'".mysqli_real_escape_string($db,$_POST["sname"])."',
	'1')");

	
	header("location:../complaint-stage.php");
}

elseif($_GET['edit']=='cs'){
	

	
	$update = mysqli_query($db,"update stages set
	
	sname='".mysqli_real_escape_string($db,$_POST["sname"])."'
	where si='".$_GET['si']."'");

	
	header("location:../complaint-stage.php");
}
?>