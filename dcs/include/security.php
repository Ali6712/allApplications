<?php 
session_start();
error_reporting(E_WARNING);
$url="http://192.168.0.151/applications/dcs";
if(!isset($_SESSION['FLD_ID'])){
header("location: $url/index.php?login=fail");
}
$title="Document Control System";

$date     = date('Y-m-d');
$time     = date('H:i');
$dateTime = date('Y-m-d H:i');
$aname    = $_SESSION['FLD_ID'];
$spmon    = date('Ym');
?>