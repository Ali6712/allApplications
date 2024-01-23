<?php 
include("../include/security.php");
include("../include/conn.php");
if($_GET['insert']=='cpa'){

$FLD_CRDT = explode('/',$_POST["FLD_CRDT"]);
$FLD_CRDT = $FLD_CRDT[2].'-'.$FLD_CRDT[0].'-'.$FLD_CRDT[1];


$date1 = date("Y-m-d h:i:s");
$date = date("Ymdhis");
$filename = $_FILES["FLD_FILE"]["name"];
$filename = preg_replace("/[^A-Za-z0-9\-_.\/]/", "", $filename);
$file_basename1 = substr($filename, 0, strripos($filename, '.')); 

$file_basename = 'CPA-'.$date.'-'.$file_basename1;
$file_ext = substr($filename, strripos($filename, '.')); 
if($filename!=""){
$FLD_FILE = $file_basename.$file_ext;
move_uploaded_file($_FILES["FLD_FILE"]["tmp_name"], "../Upload/" . $FLD_FILE);
}



$insert = mysqli_query($db,"insert into tbl_cpa(
FLD_DNAME, FLD_CTYPE, FLD_CRBY, FLD_CRDT, FLD_FISU, 
FLD_FTYPE, 
FLD_DESC, 
FLD_FILE, 
FLD_CRTBY, 
FLD_ERDAT, 
FLD_TIME, 
FLD_MONTH,
FLD_YEAR,
FLD_CFLAG)
values(
'".$_POST["FLD_DNAME"]."',
'".$_POST["FLD_CTYPE"]."',
'".mysqli_real_escape_string($db,$_POST["FLD_CRBY"])."',
'".$FLD_CRDT."',
'".$_POST["FLD_FISU"]."',
'".$_POST["FLD_FTYPE"]."',
'".mysqli_real_escape_string($db,$_POST["FLD_DESC"])."',
'".$FLD_FILE."',
'".$_SESSION['FLD_ID']."',
'".$_POST["FLD_ERDAT"]."',
'".$_POST["FLD_TIME"]."',
'".date('M')."',
'".date('Y')."',
'Pending')");



$cpas=mysqli_query($db,"select * from tbl_cpatypes where FLD_ID='".$_POST["FLD_CTYPE"]."'");
$cpa=mysqli_fetch_array($cpas);
$FLD_CPANAME=$cpa['FLD_CPANAME'];	


$fis=mysqli_query($db,"select * from tbl_fissues where FLD_ID='".$_POST["FLD_FISU"]."'");
$fi=mysqli_fetch_array($fis);
$FLD_FNAME=$fi['FLD_FNAME'];	


$select=mysqli_query($db,"select * from tbl_cpa order by FLD_ID desc limit 0,1");
$row=mysqli_fetch_array($select);
$FLD_ID=base64_encode($row['FLD_ID']);



//email
$select_to=mysqli_query($db,"select * from tbl_usr02 where FLD_BTYPE='User' and 
FLD_DNAME='".$_POST["FLD_DNAME"]."'");
$row_to=mysqli_fetch_array($select_to);
$FLD_BNAME  = $row_to['FLD_BNAME'];
$FLD_EMAIL  = $row_to['FLD_EMAIL'];
//$subject    = 'CPA No.   - Pending For Response - Status';
$subject    = 'CPA No "'.$row['FLD_ID'].'" - Pending For Response - Awaited';

$detail = 'Your (Department) response on CPA from "Compliance" regarding "'.$FLD_FNAME.'" 
is awaited. CPA status is pending & CPA number is 
"'.$row['FLD_ID'].'".';


$detail2 = 'Kindly login in the online CPA management application and respond within 3 

days. ';
$detail3 = 'Click below for more detail';

$body='<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
</head> 
<body> 
<table border="0" cellpadding="0" cellspacing="0" width="100%">   
<tr> 
<td style="padding: 10px 0 30px 0;"> 
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" 

style="border: 1px solid #cccccc; border-collapse: collapse;"> 
<tr> 
<td align="center" bgcolor="#5abae3" style="padding: 40px 0 30px 0; color: white; 

font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - CPA 
</td> 
</tr> 
<tr> 
<td align="center" bgcolor="#1E90FF" style="padding:20px 0 15px 0; color: #153643; 

font-size: 16px; font-weight: bold; font-family: Arial, sans-serif;"> 
</td> 
</tr> 
<tr> 
<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;"> 
<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
<tr> 
<td colspan="2" style="color: #153643; font-family: Arial, sans-serif; font-size: 

24px;"><b> Dear Viewer/HOD/Compliance Team </b></td> 
</tr> 
<tr> 
<td colspan="2" style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail.'	</td> 
</tr> 

<tr> 
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail2.'	</td> 
</tr> 


<tr> 
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail3.'	</td> 
</tr> 

<tr>
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
<a href="'.$url.'/concern-pending.php" class="go-shop-btn btn btn-fill-type" 

style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
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
<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" 

width="75%">Regards<br/>  BINRASHEED Team<br>
Note: This is a system generated E-mail message just for intimation so please dont 

REPLY to it!.
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
$to      = $FLD_EMAIL;
$from    = 'cpa@binrasheed.com';
//$subject = 'New CPA - Pending For Approval';

$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
$mail = mail($to, $subject, $body, $headers);



$select_to=mysqli_query($db,"select * from tbl_usr02 where FLD_BTYPE='HOD' and 
FLD_DNAME='".$_POST["FLD_DNAME"]."'");
$row_to=mysqli_fetch_array($select_to);
$FLD_BNAME  = $row_to['FLD_BNAME'];
$FLD_EMAIL  = $row_to['FLD_EMAIL'];
//$subject    = 'CPA No.   - Pending For Response - Status';
$subject    = 'CPA No "'.$row['FLD_ID'].'" - Pending For Response - Awaited';

$detail = 'Your (Department) response on CPA from "Compliance" regarding "'.$FLD_FNAME.'" 

is awaited. CPA status is pending  
& CPA number is "'.$row['FLD_ID'].'".';


$detail2 = 'Kindly login in the online CPA management application and respond within 3 

days. ';
$detail3 = 'Click below for more detail';

$body='<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
</head> 
<body> 
<table border="0" cellpadding="0" cellspacing="0" width="100%">   
<tr> 
<td style="padding: 10px 0 30px 0;"> 
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" 

style="border: 1px solid #cccccc; border-collapse: collapse;"> 
<tr> 
<td align="center" bgcolor="#5abae3" style="padding: 40px 0 30px 0; color: white; 

font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - CPA 
</td> 
</tr> 
<tr> 
<td align="center" bgcolor="#1E90FF" style="padding:20px 0 15px 0; color: #153643; 

font-size: 16px; font-weight: bold; font-family: Arial, sans-serif;"> 
</td> 
</tr> 
<tr> 
<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;"> 
<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
<tr> 
<td colspan="2" style="color: #153643; font-family: Arial, sans-serif; font-size: 

24px;"><b> Dear Viewer/HOD/Compliance Team </b></td> 
</tr> 
<tr> 
<td colspan="2" style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail.'	</td> 
</tr> 

<tr> 
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail2.'	</td> 
</tr> 


<tr> 
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail3.'	</td> 
</tr> 

<tr>
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
<a href="'.$url.'/concern-pending.php" class="go-shop-btn btn btn-fill-type" 

style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
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
<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" 

width="75%">Regards<br/>  BINRASHEED Team<br>
Note: This is a system generated E-mail message just for intimation so please dont 

REPLY to it!.
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
$to      = $FLD_EMAIL;
$from    = 'cpa@binrasheed.com';
//$subject = 'New Customer Complaint - Pending For Approval';

$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
$mail = mail($to, $subject, $body, $headers);


header("location:../new.php?Serno=$FLD_ID");
}
elseif($_GET['edit']=='dept-cpa'){

$date1 = date("Y-m-d h:i:s");
$date = date("Ymdhis");
$filename = $_FILES["FLD_FILE"]["name"];
$filename = preg_replace("/[^A-Za-z0-9\-_.\/]/", "", $filename);
$file_basename1 = substr($filename, 0, strripos($filename, '.')); 
$file_basename = 'CPA-'.$date.'-'.$file_basename1;
$file_ext = substr($filename, strripos($filename, '.')); 
if($filename!=""){
$FLD_FILE = $file_basename.$file_ext;
move_uploaded_file($_FILES["FLD_FILE"]["tmp_name"], "../Upload/" . $FLD_FILE);
}


$FLD_TDATE = explode('/',$_POST["FLD_TDATE"]);
$FLD_TDATE = $FLD_TDATE[2].'-'.$FLD_TDATE[0].'-'.$FLD_TDATE[1];

$update = mysqli_query($db,"update tbl_cpa set FLD_CFLAG='QA Pending',
FLD_ROOTC='".mysqli_real_escape_string($db,$_POST["FLD_ROOTC"])."', 
FLD_CORAC='".mysqli_real_escape_string($db,$_POST["FLD_CORAC"])."', 
FLD_TDATE='".$FLD_TDATE."',
FLD_DDATE='".date('Y-m-d')."',
FLD_DTME='".date('H:i')."',
FLD_REMK='".mysqli_real_escape_string($db,$_POST["FLD_REMK"])."', 
FLD_COMT2='".mysqli_real_escape_string($db,$_POST["FLD_COMT2"])."', 
FLD_FILE2='".$FLD_FILE."'
where FLD_ID='".base64_decode($_GET["id"])."'");


$insert = mysqli_query($db,	"insert into tbl_cdept 
(FLD_CPA,  
FLD_ROOTC,
FLD_CORAC,
FLD_TDATE,
FLD_DDATE,
FLD_DTME, 
FLD_ENAME,
FLD_REMK,
FLD_COMT2,
FLD_FILE
)
values
('".base64_decode($_GET["id"])."', 
'".mysqli_real_escape_string($db,$_POST["FLD_ROOTC"])."', 
'".mysqli_real_escape_string($db,$_POST["FLD_CORAC"])."', 
'".$FLD_TDATE."',
'".date('Y-m-d')."',
'".date('H:i')."',
'".$_SESSION['FLD_ID']."',
'".mysqli_real_escape_string($db,$_POST["FLD_REMK"])."', 
'".mysqli_real_escape_string($db,$_POST["FLD_COMT2"])."', 
'".$FLD_FILE."'
)");


$select=mysqli_query($db,"select * from tbl_cpa 
where FLD_ID='".base64_decode($_GET["id"])."'");
$row=mysqli_fetch_array($select);

$depts=mysqli_query($db,"select * from tbl_depts 
where FLD_ID='".$row['FLD_DNAME']."'");
$dept =mysqli_fetch_array($depts);	

$cpas=mysqli_query($db,"select * from tbl_cpatypes
 where FLD_ID='".$row["FLD_CTYPE"]."'");
$cpa=mysqli_fetch_array($cpas);
$FLD_CPANAME=$cpa['FLD_CPANAME'];	

$fis=mysqli_query($db,"select * from tbl_fissues 
where FLD_ID='".$row["FLD_FISU"]."'");
$fi=mysqli_fetch_array($fis);
$FLD_FNAME=$fi['FLD_FNAME'];	


//email
$select_to=mysqli_query($db,"select * from tbl_usr02 
where FLD_ID='".$row["FLD_CRTBY"]."'");
$row_to=mysqli_fetch_array($select_to);
$FLD_BNAME  = $row_to['FLD_BNAME'];
$FLD_EMAIL  = $row_to['FLD_EMAIL'];

$subject    = 'CPA No "'.$row['FLD_ID'].'" - Pending For Compliance Approval';


$detail = 'Your response on CPA from "'.$dept["FLD_DNAME"].'" 
regarding "'.$FLD_FNAME.'" is awaited. CPA status is pending 
& CPA No. is "'.$row['FLD_ID'].'".';

$detail2 = 'Kindly login in the online CPA management application and respond within 3 

days. ';
$detail3 = 'Click below for more detail';


$body='<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
</head> 
<body> 
<table border="0" cellpadding="0" cellspacing="0" width="100%">   
<tr> 
<td style="padding: 10px 0 30px 0;"> 
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" 

style="border: 1px solid #cccccc; border-collapse: collapse;"> 
<tr> 
<td align="center" bgcolor="#5abae3" style="padding: 40px 0 30px 0; color: white; 

font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - CPA
</td> 
</tr> 
<tr> 
<td align="center" bgcolor="#1E90FF" style="padding:20px 0 15px 0; color: #153643; 

font-size: 16px; font-weight: bold; font-family: Arial, sans-serif;"> 
</td> 
</tr> 
<tr> 
<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;"> 
<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
<tr> 
<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><b> 

Dear Compliance </b></td> 
</tr> 
<tr> 
<td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; 

font-size: 16px; line-height: 20px;"> 
'.$detail.'
</td> 
</tr> 
<tr> 
<td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; 

font-size: 16px; line-height: 20px;"> 
'.$detail2.'
</td> 
</tr> 
<tr> 
<td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; 

font-size: 16px; line-height: 20px;"> 
'.$detail3.'
</td> 
</tr> 
<tr>
<td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; 

font-size: 16px; line-height: 15px; text-align:center;">
<a href="'.$url.'/gm-pending.php" class="go-shop-btn btn btn-fill-type" 

style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
padding: 11px 15px;
color: #333333;
transition: .3s all linear;
-webkit-transition-delay: .2s;
transition-delay: .2s;">Login</a>
</td>
</tr> 
</table> 
</td> 
</tr> 
<tr> 
<td bgcolor="#253238" style="padding: 30px 30px 30px 30px;"> 
<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
<tr> 
<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" 

width="75%">Regards<br/>  BINRASHEED Team<br>
Note: This is a system generated E-mail message just for intimation so please dont 

REPLY to it!.
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
$to      = $FLD_EMAIL;
$from    = 'cpa@binrasheed.com';

$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
mail($to, $subject, $body, $headers);


header("location: ../index.php");
}
elseif($_GET['edit']=='qa-pending'){


$update = mysqli_query($db,"update tbl_cpa set FLD_CFLAG='".$_POST["FLD_CFLAG2"]."',
FLD_QAFRT='".$_POST["FLD_QAFRT"]."', 
FLD_QAFCA='".$_POST["FLD_QAFCA"]."', 
FLD_QAEDV='".$_POST["FLD_QAEDV"]."',
FLD_COMT='".mysqli_real_escape_string($db,$_POST["FLD_COMT"])."', 
FLD_QAFDT='".date('Y-m-d')."',
FLD_QAFTM='".date('H:i')."'
where FLD_ID='".base64_decode($_GET["id"])."'");


$insert = mysqli_query($db,	"insert into tbl_qa 
(FLD_CPA,  
FLD_QAFRT,
FLD_QAFCA,
FLD_QAEDV,
FLD_COMT,
FLD_QAFDT,
FLD_QAFTM, 
FLD_ENAME
)
values
('".base64_decode($_GET["id"])."', 
'".$_POST["FLD_QAFRT"]."', 
'".$_POST["FLD_QAFCA"]."', 
'".$_POST["FLD_QAEDV"]."', 
'".mysqli_real_escape_string($db,$_POST["FLD_COMT"])."',
'".date('Y-m-d')."',
'".date('H:i')."',
'".$_SESSION['FLD_ID']."'
)");


$select=mysqli_query($db,"select * from tbl_cpa 
where FLD_ID='".base64_decode($_GET["id"])."'");
$row=mysqli_fetch_array($select);

$depts=mysqli_query($db,"select * from tbl_depts
 where FLD_ID='".$row['FLD_DNAME']."'");
$dept =mysqli_fetch_array($depts);	
$cpas=mysqli_query($db,"select * from tbl_cpatypes 
where FLD_ID='".$row["FLD_CTYPE"]."'");
$cpa=mysqli_fetch_array($cpas);
$FLD_CPANAME=$cpa['FLD_CPANAME'];	

$fis=mysqli_query($db,"select * from tbl_fissues
 where FLD_ID='".$row["FLD_FISU"]."'");
$fi=mysqli_fetch_array($fis);
$FLD_FNAME=$fi['FLD_FNAME'];	

if($_POST["FLD_CFLAG2"]!='QA Followup' and $_POST["FLD_CFLAG2"]!='Closed'){



//email
$select_to=mysqli_query($db,"select * from tbl_usr02 where FLD_BTYPE='User' and 
FLD_DNAME='".$row['FLD_DNAME']."'");
$row_to=mysqli_fetch_array($select_to);
$FLD_BNAME  = $row_to['FLD_BNAME'];
$FLD_EMAIL  = $row_to['FLD_EMAIL'];
//$subject    = 'CPA No.   - Pending For Response - Status';
$subject    = 'CPA No "'.$row['FLD_ID'].'" - Pending For Response -'.$_POST["FLD_CFLAG2"];

$detail = 'Your (Department) response on CPA from "Compliance" 
regarding "'.$FLD_FNAME.'" is awaited. CPA status is pending & 
CPA number is "'.$row['FLD_ID'].'".'; 


$detail2 = 'Kindly login in the online CPA management application and respond within 3 

days. ';
$detail3 = 'Click below for more detail';

$body='<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
</head> 
<body> 
<table border="0" cellpadding="0" cellspacing="0" width="100%">   
<tr> 
<td style="padding: 10px 0 30px 0;"> 
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" 

style="border: 1px solid #cccccc; border-collapse: collapse;"> 
<tr> 
<td align="center" bgcolor="#5abae3" style="padding: 40px 0 30px 0; color: white; 

font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - CPA 
</td> 
</tr> 
<tr> 
<td align="center" bgcolor="#1E90FF" style="padding:20px 0 15px 0; color: #153643; 

font-size: 16px; font-weight: bold; font-family: Arial, sans-serif;"> 
</td> 
</tr> 
<tr> 
<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;"> 
<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
<tr> 
<td colspan="2" style="color: #153643; font-family: Arial, sans-serif; font-size: 

24px;"><b> Dear Viewer/HOD </b></td> 
</tr> 
<tr> 
<td colspan="2" style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail.'	</td> 
</tr> 

<tr> 
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail2.'	</td> 
</tr> 


<tr> 
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail3.'	</td> 
</tr> 

<tr>
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
<a href="'.$url.'/concern-pending.php" class="go-shop-btn btn btn-fill-type" 

style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
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
<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" 

width="75%">Regards<br/>  BINRASHEED Team<br>
Note: This is a system generated E-mail message just for intimation so please dont 

REPLY to it!.
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
$to      = $FLD_EMAIL;
$from    = 'cpa@binrasheed.com';
//$subject = 'New CPA - Pending For Approval';

$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
$mail = mail($to, $subject, $body, $headers);



$select_to=mysqli_query($db,"select * from tbl_usr02 where FLD_BTYPE='HOD' and 
FLD_DNAME='".$row['FLD_DNAME']."'");
$row_to=mysqli_fetch_array($select_to);
$FLD_BNAME  = $row_to['FLD_BNAME'];
$FLD_EMAIL  = $row_to['FLD_EMAIL'];
//$subject    = 'CPA No.   - Pending For Response - Status';
$subject    = 'CPA No "'.$row['FLD_ID'].'" - Pending For Response -'.$_POST["FLD_CFLAG2"];

$detail = 'Your (Department) response on CPA from "Compliance" 
regarding "'.$FLD_FNAME.'" is awaited. CPA status is pending 
& CPA number is "'.$row['FLD_ID'].'".'; 


$detail2 = 'Kindly login in the online CPA management application and respond within 3 

days. ';
$detail3 = 'Click below for more detail';

$body='<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
</head> 
<body> 
<table border="0" cellpadding="0" cellspacing="0" width="100%">   
<tr> 
<td style="padding: 10px 0 30px 0;"> 
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" 

style="border: 1px solid #cccccc; border-collapse: collapse;"> 
<tr> 
<td align="center" bgcolor="#5abae3" style="padding: 40px 0 30px 0; color: white; 

font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - CPA 
</td> 
</tr> 
<tr> 
<td align="center" bgcolor="#1E90FF" style="padding:20px 0 15px 0; color: #153643; 

font-size: 16px; font-weight: bold; font-family: Arial, sans-serif;"> 
</td> 
</tr> 
<tr> 
<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;"> 
<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
<tr> 
<td colspan="2" style="color: #153643; font-family: Arial, sans-serif; font-size: 

24px;"><b> Dear Viewer/HOD </b></td> 
</tr> 
<tr> 
<td colspan="2" style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail.'	</td> 
</tr> 

<tr> 
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail2.'	</td> 
</tr> 


<tr> 
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail3.'	</td> 
</tr> 

<tr>
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
<a href="'.$url.'/concern-pending.php" class="go-shop-btn btn btn-fill-type" 

style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
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
<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" 

width="75%">Regards<br/>  BINRASHEED Team<br>
Note: This is a system generated E-mail message just for intimation so please dont 

REPLY to it!.
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
$to      = $FLD_EMAIL;
$from    = 'cpa@binrasheed.com';
//$subject = 'New CPA - Pending For Approval';

$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
$mail = mail($to, $subject, $body, $headers);
}
header("location: ../index.php");
}
elseif($_GET['edit']=='qa-followup'){


$update = mysqli_query($db,"update tbl_cpa set FLD_CFLAG='".$_POST["FLD_CFLAG2"]."',
FLD_QAFRT='".$_POST["FLD_QAFRT"]."', 
FLD_QAFCA='".$_POST["FLD_QAFCA"]."', 
FLD_QAEDV='".$_POST["FLD_QAEDV"]."',
FLD_COMT='".mysqli_real_escape_string($db,$_POST["FLD_COMT"])."', 
FLD_QAFDT='".date('Y-m-d')."',
FLD_QAFTM='".date('H:i')."'
where FLD_ID='".base64_decode($_GET["id"])."'");


$insert = mysqli_query($db,	"insert into tbl_qa 
(FLD_CPA,  
FLD_QAFRT,
FLD_QAFCA,
FLD_QAEDV,
FLD_COMT,
FLD_QAFDT,
FLD_QAFTM, 
FLD_ENAME
)
values
('".base64_decode($_GET["id"])."', 
'".$_POST["FLD_QAFRT"]."', 
'".$_POST["FLD_QAFCA"]."', 
'".$_POST["FLD_QAEDV"]."', 
'".mysqli_real_escape_string($db,$_POST["FLD_COMT"])."',
'".date('Y-m-d')."',
'".date('H:i')."',
'".$_SESSION['FLD_ID']."'
)");


$select=mysqli_query($db,"select * from tbl_cpa 
where FLD_ID='".base64_decode($_GET["id"])."'");
$row=mysqli_fetch_array($select);

$depts=mysqli_query($db,"select * from tbl_depts 
where FLD_ID='".$row['FLD_DNAME']."'");
$dept =mysqli_fetch_array($depts);	

$cpas=mysqli_query($db,"select * from tbl_cpatypes 
where FLD_ID='".$row["FLD_CTYPE"]."'");
$cpa=mysqli_fetch_array($cpas);
$FLD_CPANAME=$cpa['FLD_CPANAME'];	


$fis=mysqli_query($db,"select * from tbl_fissues 
where FLD_ID='".$row["FLD_FISU"]."'");
$fi=mysqli_fetch_array($fis);
$FLD_FNAME=$fi['FLD_FNAME'];	

//email
$select_to=mysqli_query($db,"select * from tbl_usr02 where  FLD_BTYPE='User' and 
FLD_DNAME='".$row["FLD_DNAME"]."'");
$row_to=mysqli_fetch_array($select_to);
$FLD_BNAME  = $row_to['FLD_BNAME'];
$FLD_EMAIL  = $row_to['FLD_EMAIL'];

if($_POST["FLD_CFLAG2"]=='Completed'){
$subject    = 'CPA No "'.$row['FLD_ID'].'" - Has Been Closed';
$detail = 'CPA No. is "'.$row['FLD_ID'].'" has been closed. Thanks for you effort.';



$body='<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
</head> 
<body> 
<table border="0" cellpadding="0" cellspacing="0" width="100%">   
<tr> 
<td style="padding: 10px 0 30px 0;"> 
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" 

style="border: 1px solid #cccccc; border-collapse: collapse;"> 
<tr> 
<td align="center" bgcolor="#5abae3" style="padding: 40px 0 30px 0; color: white; 

font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - CPA
</td> 
</tr> 
<tr> 
<td align="center" bgcolor="#1E90FF" style="padding:20px 0 15px 0; color: #153643; 

font-size: 16px; font-weight: bold; font-family: Arial, sans-serif;"> 
</td> 
</tr> 
<tr> 
<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;"> 
<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
<tr> 
<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><b> 

Dear Viewer/HOD</b></td> 
</tr> 
<tr> 
<td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; 

font-size: 16px; line-height: 20px;"> 
'.$detail.'
</td> 
</tr> 

</table> 
</td> 
</tr> 
<tr> 
<td bgcolor="#253238" style="padding: 30px 30px 30px 30px;"> 
<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
<tr> 
<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" 

width="75%">Regards<br/>  BINRASHEED Team<br>
Note: This is a system generated E-mail message just for intimation so please dont 

REPLY to it!.
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
$to      = $FLD_EMAIL;
$from    = 'cpa@binrasheed.com';
//$subject = 'CPA - Pending For Approval';

$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
$mail = mail($to, $subject, $body, $headers);


}else{


//email
$select_to=mysqli_query($db,"select * from tbl_usr02 where FLD_BTYPE='User' and 
FLD_DNAME='".$row['FLD_DNAME']."'");
$row_to=mysqli_fetch_array($select_to);
$FLD_BNAME  = $row_to['FLD_BNAME'];
$FLD_EMAIL  = $row_to['FLD_EMAIL'];
//$subject    = 'CPA No.   - Pending For Response - Status';
$subject    = 'CPA No "'.$row['FLD_ID'].'" - Pending For Response - '.$_POST["FLD_CFLAG2"];

$detail = 'Your (Department) response on CPA from "Compliance" regarding "'.$FLD_FNAME.'" 

is awaited. CPA status is pending 
& CPA number is "'.$row['FLD_ID'].'".'; 


$detail2 = 'Kindly login in the online CPA management application and respond within 3 

days. ';
$detail3 = 'Click below for more detail';

$body='<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
</head> 
<body> 
<table border="0" cellpadding="0" cellspacing="0" width="100%">   
<tr> 
<td style="padding: 10px 0 30px 0;"> 
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" 

style="border: 1px solid #cccccc; border-collapse: collapse;"> 
<tr> 
<td align="center" bgcolor="#5abae3" style="padding: 40px 0 30px 0; color: white; 

font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - CPA 
</td> 
</tr> 
<tr> 
<td align="center" bgcolor="#1E90FF" style="padding:20px 0 15px 0; color: #153643; 

font-size: 16px; font-weight: bold; font-family: Arial, sans-serif;"> 
</td> 
</tr> 
<tr> 
<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;"> 
<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
<tr> 
<td colspan="2" style="color: #153643; font-family: Arial, sans-serif; font-size: 

24px;"><b> Dear Viewer/HOD </b></td> 
</tr> 
<tr> 
<td colspan="2" style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail.'	</td> 
</tr> 

<tr> 
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail2.'	</td> 
</tr> 


<tr> 
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail3.'	</td> 
</tr> 

<tr>
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
<a href="'.$url.'/concern-pending.php" class="go-shop-btn btn btn-fill-type" 

style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
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
<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" 

width="75%">Regards<br/>  BINRASHEED Team<br>
Note: This is a system generated E-mail message just for intimation so please dont 

REPLY to it!.
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
$to      = $FLD_EMAIL;
$from    = 'cpa@binrasheed.com';
//$subject = 'CPA - Pending For Approval';

$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
$mail = mail($to, $subject, $body, $headers);



$select_to=mysqli_query($db,"select * from tbl_usr02 where FLD_BTYPE='HOD' and 
FLD_DNAME='".$row['FLD_DNAME']."'");
$row_to=mysqli_fetch_array($select_to);
$FLD_BNAME  = $row_to['FLD_BNAME'];
$FLD_EMAIL  = $row_to['FLD_EMAIL'];
//$subject    = 'CPA No.   - Pending For Response';
$subject    = 'CPA No "'.$row['FLD_ID'].'" - Pending For Response - '.$_POST["FLD_CFLAG2"];

$detail = 'Your (Department) response on CPA from "Compliance" regarding "'.$FLD_FNAME.'" 
is awaited. CPA status is pending 
& CPA number is "'.$row['FLD_ID'].'".'; 


$detail2 = 'Kindly login in the online CPA management application and respond within 3 

days. ';
$detail3 = 'Click below for more detail';

$body='<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
</head> 
<body> 
<table border="0" cellpadding="0" cellspacing="0" width="100%">   
<tr> 
<td style="padding: 10px 0 30px 0;"> 
<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" 

style="border: 1px solid #cccccc; border-collapse: collapse;"> 
<tr> 
<td align="center" bgcolor="#5abae3" style="padding: 40px 0 30px 0; color: white; 

font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - CPA 
</td> 
</tr> 
<tr> 
<td align="center" bgcolor="#1E90FF" style="padding:20px 0 15px 0; color: #153643; 

font-size: 16px; font-weight: bold; font-family: Arial, sans-serif;"> 
</td> 
</tr> 
<tr> 
<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;"> 
<table border="0" cellpadding="0" cellspacing="0" width="100%"> 
<tr> 
<td colspan="2" style="color: #153643; font-family: Arial, sans-serif; font-size: 

24px;"><b> Dear Viewer/HOD </b></td> 
</tr> 
<tr> 
<td colspan="2" style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail.'	</td> 
</tr> 

<tr> 
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail2.'	</td> 
</tr> 


<tr> 
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 20px;"> 
'.$detail3.'	</td> 
</tr> 

<tr>
<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, 

sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
<a href="'.$url.'/concern-pending.php" class="go-shop-btn btn btn-fill-type" 

style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
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
<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" 

width="75%">Regards<br/>  BINRASHEED Team<br>
Note: This is a system generated E-mail message just for intimation so please dont 

REPLY to it!.
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
$to      = $FLD_EMAIL;
$from    = 'cpa@binrasheed.com';
//$subject = 'CPA - Pending For Approval';

$headers = "From: " . strip_tags($from) . "\r\n";
$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
$mail = mail($to, $subject, $body, $headers);



}
header("location: ../index.php");
}
?> 

