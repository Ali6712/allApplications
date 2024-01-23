<?php 
session_start();
error_reporting(0);
$title="Product Development - ";
$url = 'http://103.100.188.26:8100/applications/pd-live';
if(!isset($_SESSION['user_id'])){
header("location: $url/login.php");
}
?>