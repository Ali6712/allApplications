<?php 
include("../include/security.php");
include("../include/conn.php");
	
$Password=$_POST['Password'];
	
$change = mysqli_query($db,"UPDATE tblusers SET UserPassword='".$Password."', Flag='1' WHERE UserName='".$_SESSION['UserName']."'");

header("location: ../main.php?password=changed");


?> 

