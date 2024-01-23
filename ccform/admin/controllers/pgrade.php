<?php 
include("../../include/security.php");
include("../../include/conn.php");
if($_GET['insert']=='pt'){
	

	
	$insert = mysqli_query($db,"insert into producttypes(
	pdtcode,pdtname,pdtdesc)
	values(
	'".mysqli_real_escape_string($db,$_POST["pdtcode"])."',
'".mysqli_real_escape_string($db,$_POST["pdtname"])."',
'".mysqli_real_escape_string($db,$_POST["pdtdesc"])."'
)");

	
	header("location:../product-grade.php");
}

elseif($_GET['edit']=='pt'){
	

	
	$update = mysqli_query($db,"update producttypes set
	
	pdtcode='".mysqli_real_escape_string($db,$_POST["pdtcode"])."',
        pdtname='".mysqli_real_escape_string($db,$_POST["pdtname"])."',
        pdtdesc='".mysqli_real_escape_string($db,$_POST["pdtdesc"])."'
	where id='".$_GET['id']."'");

	
	header("location:../product-grade.php");
}
?>