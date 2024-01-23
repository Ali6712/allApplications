<?php
$to = "umairriaz87@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: umairriaz87@gmail.com" . "\r\n" ;

mail($to,$subject,$txt,$headers);
?> 