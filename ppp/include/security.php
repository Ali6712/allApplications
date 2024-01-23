<?php 
session_start();
error_reporting(0);

if(!isset($_SESSION['Userid'])){
header("location: index.php?login=false");
}
$title="PPP - People Performance Process - ";
?>