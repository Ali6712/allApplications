<?php 
session_start();
session_destroy();
header("location: http://192.168.0.151/applications/pd/login.php?logout=success");
?>