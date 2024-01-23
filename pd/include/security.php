<?php 
session_start();
error_reporting(0);
$title="Product Development - ";
$url = 'http://192.168.0.151/applications/pd';
if(!isset($_SESSION['user_id'])){
header("location: $url/login.php");
}
?>