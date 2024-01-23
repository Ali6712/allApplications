<?php 
include("../include/security.php");
include("../include/conn.php");
if($_GET['delete']=='true'){
$Userid=mysql_real_escape_string($_GET['Userid']);
$delete=mysql_query("delete from tblusers WHERE Userid='".$Userid."'");	
header("location: ../users.php?delete=suc");	
}else{
$Userid=mysql_real_escape_string($_GET['Userid']);
$check_user = mysql_query("SELECT * FROM tblusers WHERE Userid='".$Userid."'");
$row = mysql_fetch_array($check_user);
$insert=mysql_query("insert into tblusers 
	(UserName, UserPassword, UserType, UserLastLogin, Deptid, Flag)
	values
	('".$row['UserName']."', '".$row['UserPassword']."', 'incharge', '', '".$row['Deptid']."', '1')");

header("location: ../users.php?insert=true");
}


?> 

