<?php include("include/conn.php");
$url = 'http://solutionly.com.pk/projects/binrasheed/ccform';
$concern_complaints= mysqli_query($db,"SELECT * FROM complain 
where (cstatus='Pending' or cstatus='Objected' ) order by serno asc");
while($concern_complaint = mysqli_fetch_array($concern_complaints)){ 

	if($concern_complaint['cstatus']!='Objected'){
	   $types=mysqli_query($db,"select * from types where id='".$concern_complaint["process_type"]."'");
	   $row_type=mysqli_fetch_array($types);
		
	   $process_type = $row_type['tname'];
		
	   $defects=mysqli_query($db,"select * from defects where 
	   id='".$concern_complaint["defect_type"]."'");
	   $row_defect=mysqli_fetch_array($defects);
		
	   $defect_type  = $row_defect['dname'];
		
		
	   $select_to=mysqli_query($db,"select * from departments where
	   di='".$concern_complaint['comp_for']."'");
	   $row_to=mysqli_fetch_array($select_to);


       echo $concern_complaint['Serno']; echo "<br>";
       echo $sub_date = $concern_complaint['sub_date']; echo "<br>";
	   echo $today    = date('Y-m-d');echo "<br>";
	    $diff   ="";
        $years  ="";
        $months ="";
        $days   ="";
        $diff   = abs(strtotime(date('Y-m-d')) - strtotime($sub_date));
        $years  = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        
        if($days>=2){
            
           //email
        	$select_to=mysqli_query($db,"select * from departments where
        	di='".mysqli_real_escape_string($db,$concern_complaint["comp_for"])."'");
        	$row_to=mysqli_fetch_array($select_to);
        	$dname  = $row_to['dname'];
        	$demail = $row_to['demail'];
        	
        	$subject    = 'Alert! New Customer Complaint No "'.$concern_complaint['Serno'].'" - Pending For Lab Response';
        	
        	
        	$detail = 'A new compliant from "'.$concern_complaint["cust_name"].'" regarding "'.$defect_type.'" is pending for approval. Complaint No. is "'.$concern_complaint['Serno'].'". ';
        	
        	$detail2 = 'You have only one day left to respond.';
        	$detail3 = 'Click below for more detail.';
        	
        	$body='<html xmlns="http://www.w3.org/1999/xhtml"> 
        	<head> 
        	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
        	<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
        	</head> 
        	<body> 
        	<table border="0" cellpadding="0" cellspacing="0" width="100%">   
        	<tr> 
        	<td style="padding: 10px 0 30px 0;"> 
        	<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;"> 
        	<tr> 
        	<td align="center" bgcolor="#ff3800" style="padding: 40px 0 30px 0; color: white; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - Customer Complaints
        	</td> 
        	</tr> 
        	<tr> 
        	<td align="center" bgcolor="#1E90FF" style="padding:20px 0 15px 0; color: #153643; font-size: 16px; font-weight: bold; font-family: Arial, sans-serif;"> 
        	</td> 
        	</tr> 
        	<tr> 
        	<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;"> 
        	<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
        	<tr> 
        	<td colspan="2" style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><b> Dear '.$dname.' </b></td> 
        	</tr> 
        	<tr> 
        	<td colspan="2" style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"> 
        	'.$detail.'	</td> 
        	</tr> 
        		
        <tr> 
        	<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"> 
        	'.$detail2.'	</td> 
        	</tr> 
        	
        	
        	<tr> 
        	<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"> 
        	'.$detail3.'	</td> 
        	</tr> 
        	
        	<tr>
        	<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
        	<a href="'.$url.'/cr-concern-pending.php" class="go-shop-btn btn btn-fill-type" style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
        	padding: 11px 15px;
        	color: #333333;
        	transition: .3s all linear;
        	-webkit-transition-delay: .2s;
        	transition-delay: .2s;">Login</a>	</td>
        	</tr> 
        	</table> 
        	</td> 
        	</tr> 
        	<tr> 
        	<td bgcolor="#253238" style="padding: 30px 30px 30px 30px;"> 
        	<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
        	<tr> 
        	<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">Regards<br/>  BINRASHEED Team<br>
        	Note: This is a system generated E-mail message just for intimation so please dont REPLY to it!.
        	</td> 
        	</tr> 
        	</table> 
        	</td> 
        	</tr> 
        	</table> 
        	</td> 
        	</tr> 
        	</table> 
        	</body> 
        	</html>';	
           
            //EMAIL
        	$to      = $demail;
            $from    = 'complaints@binrasheed.com';

            $headers = "From: " . strip_tags($from) . "\r\n";
        	$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
        	$headers .= "MIME-Version: 1.0\r\n";
        	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
        	$mail = mail($to, $subject, $body, $headers);     
        	
        	$to      = "";
        	$headers = "";
        	$body    = "";
        	$subject = "";
            $from    = "";
        }
	   

	}

} 

?>