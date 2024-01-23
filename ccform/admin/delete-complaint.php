<?php include("../include/security.php");?>
<?php include("../include/conn.php");?>
<?php 


if(isset($_SESSION['user_id'])){
	$update = mysqli_query($db,"update complain set cstatus='Deleted' where Serno='".base64_decode($_GET['id'])."'");
	
	header("location:complaints.php");
}

?>