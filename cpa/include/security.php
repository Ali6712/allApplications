<?php 
session_start();
error_reporting(0);
$title="CPA - ";

$url = 'http://192.168.0.151/applications/cpa';
$redirect=$url.'/login.php';
if(!isset($_SESSION['FLD_ID'])){
	header("location:$redirect");
}

?>