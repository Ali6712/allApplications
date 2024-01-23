<?php include("include/security.php");?>
<?php include("include/conn.php");?>
<?php 


if(isset($_SESSION['FLD_ID'])){
	$update = mysqli_query($db,"update tbl_cpa set FLD_CFLAG='Deleted' where FLD_ID='".base64_decode($_GET['id'])."'");
	
	header("location:index.php");
}

?>