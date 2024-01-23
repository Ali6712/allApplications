<?php 
include("../include/security.php");
include("../include/conn.php");
if($_GET['check']=='dept'){

	$dname=$_POST['dname'];
	$dpassword=$_POST['dpassword'];
	$select_dept = mysqli_query($db,"SELECT * 
									 FROM departments 
									 WHERE di     ='".mysqli_real_escape_string($db,$dname)."' 
									 AND   dpassword ='".mysqli_real_escape_string($db,$dpassword)."'");
									
	$check_dept = mysqli_num_rows($select_dept);
	$row_dept   = mysqli_fetch_array($select_dept);

	if ( $check_dept > 0 ) {
	$dname          = $row_dept['di'];
	$_SESSION['dname']           = $dname;
		if(!isset($_POST['approved'])){
		header("location: ../cr-pending-list.php");
		}else{
		header("location: ../cr-approved-list.php");	
		}
	}
	else{
	header("location: ../cr-pending.php?dName=$dname");
	}
}
elseif($_GET['check']=='c-dept'){

	$dname=$_POST['dname'];
	$spassword=$_POST['dpassword'];
	$select_dept = mysqli_query($db,"SELECT * 
			 FROM departments 
			 WHERE di        ='".mysqli_real_escape_string($db,$dname)."' 
			 AND   dpassword ='".mysqli_real_escape_string($db,$spassword)."'");
			
	$check_dept = mysqli_num_rows($select_dept);
	$row_dept   = mysqli_fetch_array($select_dept);

	if ( $check_dept > 0 ) {
	$_SESSION['dname']        = $row_dept['di'];
		if(!isset($_POST['approved'])){
		header("location: ../cr-concern-pending-list.php");
		}else{
		header("location: ../cr-concern-approved-list.php");	
		}
	}
	else{
	header("location: ../cr-concern-pending.php?dept=$dname");
	}
}
elseif($_GET['check']=='q-dept'){
	
    $dname=$_POST['dname'];
	$dpassword=$_POST['qpassword'];
	$select_dept = mysqli_query($db,"SELECT * 
									 FROM departments 
									 WHERE di     ='".mysqli_real_escape_string($db,$dname)."' 
									 AND   dpassword ='".mysqli_real_escape_string($db,$dpassword)."'");
									
	$check_dept = mysqli_num_rows($select_dept);
	$row_dept   = mysqli_fetch_array($select_dept);

	if ( $check_dept > 0 ) {
	$dname          = $row_dept['dname'];
	$dept           = $row_dept['dept'];
	$_SESSION['dname']           = $dname;
	$_SESSION['dept']            = $dept;
		if(!isset($_POST['followup'])){
		header("location: ../gm-pending-list.php");
		}else{
		header("location: ../gm-followup-list.php");	
		}
	}
	else{
	header("location: ../gm-pending.php?dName=$dname");
	}
	


}
elseif($_GET['insert']=='complaint'){
	
	
	$date1 = date("Y-m-d h:i:s");
	$date = date("Ymdhis");
	$filename = $_FILES["file"]["name"];
	$filename = preg_replace("/[^A-Za-z0-9\-_.\/]/", "", $filename);
	$file_basename1 = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_basename = 'C-'.$date.'-'.$file_basename1;
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	if($filename!=""){
	$cc_file = $file_basename.$file_ext;
	move_uploaded_file($_FILES["file"]["tmp_name"], "../Upload/" . $cc_file);
    }
	
	if($filename!=""){
	$cc_file = $file_basename.$file_ext;
	move_uploaded_file($_FILES["file"]["tmp_name"], "../../ccform/Upload/" . $cc_file);
    }
	
	
	
	
if($_POST["prod_dos"]=='Diluted'){
$prod_dos = $_POST["prod_dos"].' - '.$_POST['prod_dos2'].'%';
}else if($_POST["prod_dos"]=='Available'){
$prod_dos = $_POST["prod_dos"].' - '.mysqli_real_escape_string($db,$_POST['prod_dos2']);
}else{
$prod_dos = $_POST["prod_dos"];
}
	
	$insert = mysqli_query($db,"insert into complain(
	sub_date, comp_for, issue_dept, comp_color, cust_name, 
	prod_desc, 
	batch_code, 
	comp_stage, 
	end_app, 
	prod_dos, 
	material, 
	process_type, 
	defect_type, 
	comp_sample, 
	sample_detail,
	comp_desc, 
	ename, 
	email, 
	cstatus, 
	cc_file, 
	c_month, 
	c_year)
	values(
	'".$_POST["sub_date"]."',
	'".$_POST["comp_for"]."',
	'".$_POST["issue_dept"]."',
	'".mysqli_real_escape_string($db,$_POST["comp_color"])."',
	'".mysqli_real_escape_string($db,$_POST["cust_name"])."',
	'".mysqli_real_escape_string($db,$_POST["prod_desc"])."',
	'".mysqli_real_escape_string($db,$_POST["batch_code"])."',
	'".mysqli_real_escape_string($db,$_POST["comp_stage"])."',
	'".mysqli_real_escape_string($db,$_POST["end_app"])."',
	'".mysqli_real_escape_string($db,$prod_dos)."',
	'".mysqli_real_escape_string($db,$_POST["material"])."',
	'".mysqli_real_escape_string($db,$_POST["process_type"])."',
	'".mysqli_real_escape_string($db,$_POST["defect_type"])."',
	'".mysqli_real_escape_string($db,$_POST["comp_sample"])."',
	'".mysqli_real_escape_string($db,$_POST["sample_detail"])."',
	'".mysqli_real_escape_string($db,$_POST["comp_desc"])."',
	'".mysqli_real_escape_string($db,$_POST["ename"])."',
	'".mysqli_real_escape_string($db,$_POST["email"])."',
	'Pending',
	'".$cc_file."',
	'".date('M')."',
	'".date('Y')."')");
	

	
	$select=mysqli_query($db,"select * from complain order by Serno desc limit 0,1");
	$row=mysqli_fetch_array($select);
	$Serno=base64_encode($row['Serno']);
	
	
	
	$types=mysqli_query($db,"select * from types where id='".$_POST["process_type"]."'");
	$row_type=mysqli_fetch_array($types);
	
	$process_type = $row_type['tname'];
	
	$defects=mysqli_query($db,"select * from defects where 
	id='".$_POST["defect_type"]."'");
	$row_defect=mysqli_fetch_array($defects);
	
	$defect_type  = $row_defect['dname'];
	
	
	
	
	
	//email
	$select_to=mysqli_query($db,"select * from departments where
	di='".mysqli_real_escape_string($db,$_POST["comp_for"])."'");
	$row_to=mysqli_fetch_array($select_to);
	$dname  = $row_to['dname'];
	$demail = $row_to['demail'];
	
	$subject    = 'New Customer Complaint No "'.$row['Serno'].'" - Pending For Lab Response';
	
	
	$detail = 'A new compliant from "'.$_POST["cust_name"].'" regarding "'.$defect_type.'" is received. Complaint No. is "'.$row['Serno'].'". ';
	
	$detail2 = 'Please response maximum within 48 hours.';
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
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;"> 
	<tr> 
	<td align="center" bgcolor="#5abae3" style="padding: 40px 0 30px 0; color: white; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - Customer Complaints
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
	//$subject = 'New Customer Complaint - Pending For Approval';
	
    $headers = "From: " . strip_tags($from) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
	$mail = mail($to, $subject, $body, $headers);
    
    mysqli_error($mail);


	header("location:../cr-new.php?Serno=$Serno");
}
elseif($_GET['edit']=='c-complaint'){
    
	
	
	$date1 = date("Y-m-d h:i:s");
	$date = date("Ymdhis");
	$filename = $_FILES["file"]["name"];
	$filename = preg_replace("/[^A-Za-z0-9\-_.\/]/", "", $filename);
	$file_basename1 = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_basename = 'C-'.$date.'-'.$file_basename1;
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	if($filename!=""){
	$cc_file = $file_basename.$file_ext;
	move_uploaded_file($_FILES["file"]["tmp_name"], "../Upload/" . $cc_file);
    }else{
	$cc_file = $_POST["file2"];
	}

	
	$update = mysqli_query($db,"update complain set cstatus='Approved'  
	where Serno='".base64_decode($_GET["id"])."'");

	
	$select = mysqli_query($db,"select * from concern_dept where serno='".base64_decode($_GET["id"])."'");
	$num=mysqli_num_rows($select);
	
	if($num==0){
	
	$insert = mysqli_query($db,	"insert into concern_dept 
	(serno, app_date_con, suggestion, suggestion2, 
	suggestion3, comp_nature,
	cyear, 
	file_uploaded,
	production_line,
	shifts
	)
	values
	('".base64_decode($_GET["id"])."', 
	'".date('Y-m-d H:i')."', 
	'".mysqli_real_escape_string($db,$_POST["suggestion"])."', 
	'".mysqli_real_escape_string($db,$_POST["suggestion2"])."',
	'".mysqli_real_escape_string($db,$_POST["suggestion3"])."', 
	'".mysqli_real_escape_string($db,$_POST["comp_nature"])."', 
	'".date('Y')."', 
	'".$cc_file."',
	'".mysqli_real_escape_string($db,$_POST["production_line"])."',
	'".mysqli_real_escape_string($db,$_POST["shifts"])."'
	)");
    
	}else{
	    
	$update = mysqli_query($db,"update concern_dept set 
	suggestion='".mysqli_real_escape_string($db,$_POST["suggestion"])."',
	suggestion2='".mysqli_real_escape_string($db,$_POST["suggestion2"])."',
	suggestion3='".mysqli_real_escape_string($db,$_POST["suggestion3"])."',
	objremarks='".mysqli_real_escape_string($db,$_POST["objremarks"])."',
	objectDate='".date('Y-m-d H:i')."'
 	where serno='".base64_decode($_GET["id"])."'");

	    
	}
	
	$select=mysqli_query($db,"select * from complain where Serno='".base64_decode($_GET["id"])."'");
	$row=mysqli_fetch_array($select);
	$Serno=base64_encode($row['Serno']);
	
	$types=mysqli_query($db,"select * from types where id='".$row["process_type"]."'");
	$row_type=mysqli_fetch_array($types);
	
	$process_type = $row_type['tname'];
	
	$defects=mysqli_query($db,"select * from defects where 
	id='".$row["defect_type"]."'");
	$row_defect=mysqli_fetch_array($defects);
	
	$defect_type  = $row_defect['dname'];
	
	if($row['comp_for']=='2'){
	    $di = '30';
	}else{
	    $di = '32';
	}
	
	//email
	$select_to=mysqli_query($db,"select * from departments where
	di='".$di."'");
	$row_to=mysqli_fetch_array($select_to);
	$dname  = $row_to['dname'];
	$demail = $row_to['demail'];
	
	$subject    = 'Customer Complaint No "'.$row['Serno'].'" - Pending For GM Approval';
	
	
	$detail = 'Your response on compliant from "'.$row["cust_name"].'" regarding "'.$defect_type.'" is awaited. Complaint No. is "'.$row['Serno'].'". ';
	
	$detail2 = 'Please response maximum within 24 hours.';
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
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;"> 
	<tr> 
	<td align="center" bgcolor="#5abae3" style="padding: 40px 0 30px 0; color: white; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - Customer Complaints
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
	<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><b> Dear GM </b></td> 
	</tr> 
	<tr> 
	<td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"> 
	'.$detail.'
	</td> 
	</tr> 
		<tr> 
	<td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"> 
	'.$detail2.'
	</td> 
	</tr> 
		<tr> 
	<td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"> 
	'.$detail3.'
	</td> 
	</tr> 
	<tr>
	<td style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
	<a href="'.$url.'/gm-pending.php" class="go-shop-btn btn btn-fill-type" style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
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
	//$subject = 'New Customer Complaint - Pending For Approval';
	
    $headers = "From: " . strip_tags($from) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
	mail($to, $subject, $body, $headers);
	
	
	header("location: ../cr-concern-pending-list.php");
}

elseif($_GET['edit']=='gm-complaint'){

	if($_POST["status_ip"]=='Approved'){
		
	$update = mysqli_query($db,"update complain set cstatus='Completed',gm_app_date='".date('Y-m-d H:i')."'
								where Serno='".base64_decode($_GET["id"])."'");		
		$update = mysqli_query($db,"update concern_dept set 
    	objection='".$_POST['objection']."' 
    	where serno='".base64_decode($_GET["id"])."'");
		//email
	$select_to=mysqli_query($db,"select * from complain where
	Serno='".base64_decode($_GET["id"])."'");
	$row_to=mysqli_fetch_array($select_to);
	$dname  = $row_to['ename'];
	$demail = $row_to['email'];


	$subject    = 'Customer Complaint No "'.$row_to['Serno'].'" - Pending For Sales Person Response';


	$types=mysqli_query($db,"select * from types where id='".$row_to["process_type"]."'");
	$row_type=mysqli_fetch_array($types);
	
	$process_type = $row_type['tname'];
	
	$defects=mysqli_query($db,"select * from defects where 
	id='".$row_to["defect_type"]."'");
	$row_defect=mysqli_fetch_array($defects);
	
	$defect_type  = $row_defect['dname'];


    $depts=mysqli_query($db,"select * from departments where
	di='".$row_to["comp_for"]."'");
	$dept=mysqli_fetch_array($depts);



	$subject    = 'Customer Complaint No "'.base64_decode($_GET["id"]).'" - Pending For Sales Person Response';
	


	$detail = '"'.$dept["dname"].'" response on compliant from "'.$row_to["cust_name"].'" regarding "'.$defect_type.'" is received. Complaint No. is "'.$row_to['Serno'].'". ';
	
	$detail2 = 'Please share back the final conclusion on this complaint max. within 72 hours by clicking on relevant.';



	
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
	<td align="center" bgcolor="#5abae3" style="padding: 40px 0 30px 0; color: white; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - Customer Complaints
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
	<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><b> Dear Sales Person </b></td> 
	</tr> 
	<tr> 
	<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"> 
	'.$detail.'	</td> 
	</tr> 
	<tr>

    
    <tr>
	<td style="padding: 5px 0 5px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
	'.$detail2.'	</td>
	</tr> 
    
    
     <tr>
	<td style="padding: 5px 0 5px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
	<a href="'.$url.'/status.php?id='.$row_to['Serno'].'&action='.base64_encode('Discounted Sale').'&update=status" class="go-shop-btn btn btn-fill-type" style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
	padding: 11px 15px;
	color: #333333;
	transition: .3s all linear;
	-webkit-transition-delay: .2s;
	transition-delay: .2s;">Discounted Sale</a>	</td>
	</tr> 
    
     <tr>
	<td style="padding: 5px 0 5px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
	<a href="'.$url.'/status.php?id='.$row_to['Serno'].'&action='.base64_encode('Customer Satisfied').'&update=status" class="go-shop-btn btn btn-fill-type" style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
	padding: 11px 15px;
	color: #333333;
	transition: .3s all linear;
	-webkit-transition-delay: .2s;
	transition-delay: .2s;">Customer Satisfied</a>	</td>
	</tr> 
    
     <tr>
	<td style="padding: 5px 0 5px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
	<a href="'.$url.'/status.php?id='.$row_to['Serno'].'&action='.base64_encode('Material Return').'&update=status" class="go-shop-btn btn btn-fill-type" style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
	padding: 11px 15px;
	color: #333333;
	transition: .3s all linear;
	-webkit-transition-delay: .2s;
	transition-delay: .2s;">Material Return</a>	</td>
	</tr> 
    
     <tr>
	<td style="padding: 5px 0 5px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
	<a href="'.$url.'/status.php?id='.$row_to['Serno'].'&action='.base64_encode('Customer Consumed Material Conditionally').'&update=status" class="go-shop-btn btn btn-fill-type" style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
	padding: 11px 15px;
	color: #333333;
	transition: .3s all linear;
	-webkit-transition-delay: .2s;
	transition-delay: .2s;">Customer Consumed Material Conditionally</a>	</td>
	</tr> 
    
     <tr>
	<td style="padding: 5px 0 5px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
	<a href="'.$url.'/status.php?id='.$row_to['Serno'].'&action='.base64_encode('Material Replaced').'&update=status" class="go-shop-btn btn btn-fill-type" style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
	padding: 11px 15px;
	color: #333333;
	transition: .3s all linear;
	-webkit-transition-delay: .2s;
	transition-delay: .2s;">Material Replaced</a>	</td>
	</tr> 
    
    
    <tr>
	<td style="padding: 5px 0 5px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
	<a href="'.$url.'/status.php?id='.$row_to['Serno'].'&action='.base64_encode('Customer Satisfied').'&update=status" class="go-shop-btn btn btn-fill-type" style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
	padding: 11px 15px;
	color: #333333;
	transition: .3s all linear;
	-webkit-transition-delay: .2s;
	transition-delay: .2s;">Customer Satisfied</a>	</td>
	</tr> 
    
    <tr>
	<td style="padding: 5px 0 5px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
	<a href="'.$url.'/status.php?id='.$row_to['Serno'].'&action='.base64_encode('Further trials recommended').'&update=status" class="go-shop-btn btn btn-fill-type" style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
	padding: 11px 15px;
	color: #333333;
	transition: .3s all linear;
	-webkit-transition-delay: .2s;
	transition-delay: .2s;">Further trials recommended</a>	</td>
	</tr> 
    
    <tr>
	<td style="padding: 5px 0 5px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
	<a href="'.$url.'/status.php?id='.$row_to['Serno'].'&action='.base64_encode('Claimed').'&update=status" class="go-shop-btn btn btn-fill-type" style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
	padding: 11px 15px;
	color: #333333;
	transition: .3s all linear;
	-webkit-transition-delay: .2s;
	transition-delay: .2s;">Claimed</a>	</td>
	</tr> 
    
     <tr>
	<td style="padding: 5px 0 5px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
	<a href="'.$url.'/status.php?id='.$row_to['Serno'].'&action='.base64_encode('Others').'&update=status" class="go-shop-btn btn btn-fill-type" style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
	padding: 11px 15px;
	color: #333333;
	transition: .3s all linear;
	-webkit-transition-delay: .2s;
	transition-delay: .2s;">Others</a>	</td>
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
	//$subject = 'New Customer Complaint - Pending For Approval';
	
    $headers = "From: " . strip_tags($from) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
	mail($to, $subject, $body, $headers);
	
	
	}elseif($_POST["status_ip"]=='Objection'){
	
	$update = mysqli_query($db,"update complain set cstatus='Objected',gm_app_date='".date('Y-m-d H:i')."'
								where Serno='".base64_decode($_GET["id"])."'");
    
    	$update = mysqli_query($db,"update concern_dept set 
    	objection='".$_POST['objection']."' 
    	where serno='".base64_decode($_GET["id"])."'");



	//email
	
    $select=mysqli_query($db,"select * from complain where
	Serno='".base64_decode($_GET["id"])."'");
	$row=mysqli_fetch_array($select);


    $select2=mysqli_query($db,"select * from concern_dept where serno='".base64_decode($_GET["id"])."'");
	$row2=mysqli_fetch_array($select2);

   $types=mysqli_query($db,"select * from types where id='".$row["process_type"]."'");
	$row_type=mysqli_fetch_array($types);
	
	$process_type = $row_type['tname'];
	
	$defects=mysqli_query($db,"select * from defects where 
	id='".$row["defect_type"]."'");
	$row_defect=mysqli_fetch_array($defects);
	
	$defect_type  = $row_defect['dname'];

	$select_to=mysqli_query($db,"select * from departments where
	di='".$row["comp_for"]."'");
	$row_to=mysqli_fetch_array($select_to);
	$dname  = $row_to['dname'];
	$demail = $row_to['demail'];
	
	$subject    = 'Customer Complaint No "'.$row['Serno'].'" - Objected By GM';
	
	
	$detail = 'Your response on compliant from  "'.$row["cust_name"].'" regarding "'.$defect_type.'" is rejected by GM. Complaint No. is "'.$row['Serno'].'". ';
	
	$detail2 = 'Comments by GM: '.mysqli_real_escape_string($db,$row2['objection']);
	$detail3 = 'Please review your response as per requirement.';
	$detail4 = 'Click below for more detail';
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
	<td align="center" bgcolor="#5abae3" style="padding: 40px 0 30px 0; color: white; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - Customer Complaints
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
	<td colspan="2" style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><b> Dear Lab Person </b></td> 
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
	<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"> 
	'.$detail4.'	</td> 
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
	//$subject = 'New Customer Complaint - Pending For Approval';
	
    $headers = "From: " . strip_tags($from) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
	$mail = mail($to, $subject, $body, $headers);
    
    mysqli_error($mail);


    
		
	}

	
	header("location: ../gm-pending-list.php");
}

elseif($_GET['edit']=='qa-followup-complaint'){


	$update = mysqli_query($db,"update concern_dept set status_followup='Follow',followup_date='".date('Y-m-d H:i')."',
	                            followup='".mysqli_real_escape_string($db,$_POST["followup"])."'
								where serno='".base64_decode($_GET["id"])."'");		

	
	header("location: ../qa-followup-list.php");

}elseif($_POST['get_op']=='get_op'){
	
	$html.='<select id="oi" name="oi" class="form-control" required>';
									
	$ops= mysqli_query($db,"SELECT * FROM operators where mi='".$_POST['mi']."' and ostatus='1' order by oname asc");
	while($op = mysqli_fetch_array($ops)){   
	if($op['oi']==$_POST['oi']){$selected="selected='selected'";}else{$selected='';}
	$html.='<option value="'.$op['oi'].'" '.$selected.'>'.$op['oname'].'</option>';

	} 
	$html.='</select>';
	echo $html;
}elseif($_POST['get_sections']=='get_sections'){
	
	$html.='<select id="si" name="si" class="form-control" required>';
									
	$sections= mysqli_query($db,"SELECT * FROM sections where dname='".$_POST['dname']."' and sstatus='1' order by sname asc");
	while($section = mysqli_fetch_array($sections)){   
	
	$html.='<option value="'.$section['si'].'" >'.$section['sname'].'</option>';

	} 
	$html.='</select>';
	echo $html;
}elseif($_GET['update']=='status'){
        $select=mysqli_query($db,"select * from complain where
    	Serno='".base64_decode($_GET["id"])."'");
    	$row=mysqli_fetch_array($select);
    
    if($row['sDate']==''){
        
        $update=mysqli_query($db,"update complain set 
        sDate='".date('Y-m-d')."',
        sRemarks='".base64_decode($_GET["action"])."' where
    	Serno='".base64_decode($_GET["id"])."'");
    	$message = 'successfully';
        
    }else{
        
        $message = 'already';
    }
    $id=$_GET["id"];
    header("location ../thank-you.php?id=$id&message=$message");
    
    
    
}
?> 

