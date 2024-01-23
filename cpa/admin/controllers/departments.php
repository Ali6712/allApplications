<?php 
include("../../include/security.php");
include("../../include/conn.php");
if($_GET['insert']=='department'){
	
	$d = $_POST['dept'];
	
	for($i=0;$i<=count($d);$i++){
		
		if($d[$i]!=''){
		   $dept .= $d[$i].','; 	
		}
		
	}
	
	$dept = rtrim($dept, ',');
	 
	
	$insert = mysqli_query($db,"insert into departments(
	dtype, dname, dpassword, demail, dept, 
	dtflag)
	values(
	'".$_POST["dtype"]."',
	'".mysqli_real_escape_string($db,$_POST["dname"])."',
	'".mysqli_real_escape_string($db,$_POST["dpassword"])."',
	'".mysqli_real_escape_string($db,$_POST["demail"])."',
	'".mysqli_real_escape_string($db,$dept)."',
	'1')");

	
	header("location:../departments.php");
}

elseif($_GET['edit']=='department'){
	
	$d = $_POST['dept'];
	
	for($i=0;$i<=count($d);$i++){
		
		if($d[$i]!=''){
		   $dept .= $d[$i].','; 	
		}
		
	}
	
	$dept = rtrim($dept, ',');
	 
	
	$update = mysqli_query($db,"update departments set
	
	dtype='".$_POST["dtype"]."',
	dname='".mysqli_real_escape_string($db,$_POST["dname"])."',
	dpassword='".mysqli_real_escape_string($db,$_POST["dpassword"])."',
	demail='".mysqli_real_escape_string($db,$_POST["demail"])."',
	dept='".mysqli_real_escape_string($db,$dept)."'
	where di='".$_GET['di']."'");

	
	header("location:../departments.php");
}
?>