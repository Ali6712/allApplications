<?php 
include("../include/security.php");
include("../include/conn.php");
if($_GET['insert']=='rank1'){
	
	
	$insert = mysqli_query($db,"insert into tblrank1(
	r1_c_id, 
	r1_rf_id, 
	r1_cp_name,
	r1_cd_id, 
	r1_cp_contact, 
	r1_cp_email, 
	r1_cp_address, 
	r1_created_by, 
	r1_created_on, 
	r1_creation_time, 
	r1_month,
	r1_year,
	r1_status)
	values(
	'".$_POST["r1_c_id"]."',
	'".$_POST["r1_rf_id"]."',
	'".mysqli_real_escape_string($db,$_POST["r1_cp_name"])."',
	'".mysqli_real_escape_string($db,$_POST["r1_cd_id"])."',
	'".mysqli_real_escape_string($db,$_POST["r1_cp_contact"])."',
	'".mysqli_real_escape_string($db,$_POST["r1_cp_email"])."',
	'".mysqli_real_escape_string($db,$_POST["r1_cp_address"])."',
	'".mysqli_real_escape_string($db,$_SESSION["user_id"])."',
	'".date('Y-m-d')."',
    '".date('H:i')."',
	'".date('M')."',
	'".date('Y')."',
	'Active')");


	
	$select=mysqli_query($db,"select * from tblrank1 order by r1_id desc limit 0,1");
	$row=mysqli_fetch_array($select);
	$Serno=base64_encode($row['r1_id']);
	
    
   foreach ($_POST['pld_id'] as $pld_id){
	   
	   $insert = mysqli_query($db,"insert into tblrank1productlines (r1_id, pld_id)	
	   values('".$row['r1_id']."', '".$pld_id."')");
	   
   }  
                

	header("location:../pd-new.php?Serno=$Serno");
}
elseif($_GET['insert']=='rank2'){

	
	$r2_meeting_date = explode('/',$_POST["r2_meeting_date"]);
	$r2_meeting_date = $r2_meeting_date[2].'-'.$r2_meeting_date[0].'-'.$r2_meeting_date[1];
	
	$developments_r2 = mysqli_query($db,"SELECT * FROM tblrank2 where r1_id='".base64_decode($_GET['id'])."'");
    $num             = mysqli_num_rows($developments_r2);
	
	if($num==0){
		$insert = mysqli_query($db,"insert into tblrank2(
		r1_id, 
		r2_mt_id, 
		r2_meeting_date, 
		r2_attendees, 
		r2_payment_type, 
		r2_register_ratio, 
		r2_repute_wrt_payment, 
		r2_int_nat_cert, 
		r2_remarks, 
		r2_created_by, 
		r2_created_on, 
		r2_creation_time, 
		r2_status)
		values(
		'".base64_decode($_GET["id"])."',
		'".$_POST["r2_mt_id"]."',
		'".$r2_meeting_date."',
		'".mysqli_real_escape_string($db,$_POST["r2_attendees"])."',
		'".mysqli_real_escape_string($db,$_POST["r2_payment_type"])."',
		'".mysqli_real_escape_string($db,$_POST["r2_register_ratio"])."',
		'".mysqli_real_escape_string($db,$_POST["r2_repute_wrt_payment"])."',
		'".mysqli_real_escape_string($db,$_POST["r2_int_nat_cert"])."',
		'".mysqli_real_escape_string($db,$_POST["r2_remarks"])."',
		'".mysqli_real_escape_string($db,$_SESSION["user_id"])."',
		'".date('Y-m-d')."',
		'".date('H:i')."',
		'Active')");		
		
	}else{
		
		
			$update = mysqli_query($db,"update tblrank2 set 
			r2_mt_id='".$_POST["r2_mt_id"]."',
			r2_meeting_date='".$r2_meeting_date."', 
			r2_attendees='".mysqli_real_escape_string($db,$_POST["r2_attendees"])."', 
			r2_payment_type='".mysqli_real_escape_string($db,$_POST["r2_payment_type"])."', 
			r2_register_ratio='".mysqli_real_escape_string($db,$_POST["r2_register_ratio"])."',
			r2_repute_wrt_payment='".mysqli_real_escape_string($db,$_POST["r2_repute_wrt_payment"])."', 
			r2_int_nat_cert='".mysqli_real_escape_string($db,$_POST["r2_int_nat_cert"])."',
			r2_remarks='".mysqli_real_escape_string($db,$_POST["r2_remarks"])."'
			where r1_id='".base64_decode($_GET["id"])."'");
		
		
	}
	

	$id=$_GET["id"];

	header("location: ../pd-detail_2a.php?id=$id&msg=saved");
}
elseif($_GET['insert']=='rank_2b'){
	
	
 
	 $id=$_GET['r1_pl_id'];
                 
	 $pd_description                    = $_POST['pd_description'.$id];
	 $pc_id                             = $_POST['pc_id'.$id];
	 $standard_sample_arranged          = $_POST['standard_sample_arranged'.$id];
	 $substrate_sample_available        = $_POST['substrate_sample_available'.$id];
	 $finished_article_available        = $_POST['finished_article_available'.$id];
	 $dispatch_to_factory               = $_POST['dispatch_to_factory3'.$id].'-'.$_POST['dispatch_to_factory2'.$id].'-'.$_POST['dispatch_to_factory1'.$id];
	 $marked_to_id                      = $_POST['marked_to_id'.$id];
	 $required_date                     = $_POST['required_date3'.$id].'-'.$_POST['required_date2'.$id].'-'.$_POST['required_date1'.$id];
	 $remarks                           = $_POST['remarks'.$id];
	 $total_consumption                 = $_POST['total_consumption'.$id];
	 $expected_volume_p_month           = $_POST['expected_volume_p_month'.$id];
	 $current_source                    = $_POST['current_source'.$id];
	 $fda_requirement                   = $_POST['fda_requirement'.$id];
	 $pd_priority_status                = $_POST['pd_priority_status'.$id];
	 $t_base_resin_grade                = $_POST['t_base_resin_grade'.$id];
	 $t_dosage_per                      = $_POST['t_dosage_per'.$id];
	 $t_gloss                           = $_POST['t_gloss'.$id];
	 $t_opacity                         = $_POST['t_opacity'.$id];
	 $t_heat_stability                  = $_POST['t_heat_stability'.$id];
	 $t_light_stability                 = $_POST['t_light_stability'.$id];
	 $t_flame_retardant                 = $_POST['t_flame_retardant'.$id];
	 $t_any_o_requirment                = $_POST['t_any_o_requirment'.$id];
	 $t_required_sample                 = $_POST['t_required_sample'.$id];
	 $t_target_rmc                      = $_POST['t_target_rmc'.$id];
	 $t_sale_price                      = $_POST['t_sale_price'.$id];
	 
    $date1 = date("Y-m-d h:i:s");
	$date  = date("Ymdhis");
	$filename = $_FILES["attachment".$id]["name"];
	$filename = preg_replace("/[^A-Za-z0-9\-_.\/]/", "", $filename);
	$file_basename1 = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_basename  = 'A-'.$date.'-'.$file_basename1;
	$file_ext       = substr($filename, strripos($filename, '.')); // get file name
	if($filename!=""){
	$attachment     = $file_basename.$file_ext;
	move_uploaded_file($_FILES["attachment".$id]["tmp_name"], "../upload/" . $attachment);
    }
	 	 
	
	$insert=mysqli_query($db,"insert into tblrank2detail 
	(r1_pl_id, 
	pd_description, 
	pc_id, 
	standard_sample_arranged, 
	substrate_sample_available, 
	finished_article_available, 
	dispatch_to_factory, 
	marked_to_id, 
	required_date, 
	attachment, 
	remarks, 
	total_consumption, 
	expected_volume_p_month, 
	current_source, 
	fda_requirement, 
	pd_priority_status, 
	t_base_resin_grade, 
	t_dosage_per, 
	t_gloss, 
	t_opacity, 
	t_heat_stability, 
	t_light_stability, 
	t_flame_retardant, 
	t_any_o_requirment, 
	t_required_sample, 
	t_target_rmc, 
	t_sale_price, 
	r2_d_created_by, 
	r2_d_created_on, 
	r2_d_status
	)
	values
	('".$id."', 
	'".$pd_description."',  
	'".$pc_id."', 
	'".$standard_sample_arranged."', 
	'".$substrate_sample_available."', 
	'".$finished_article_available."', 
	'".$dispatch_to_factory."', 
	'".$marked_to_id."', 
	'".$required_date."', 
	'".$attachment."', 
	'".$remarks."', 
	'".$total_consumption."', 
	'".$expected_volume_p_month."', 
	'".$current_source."', 
	'".$fda_requirement."', 
	'".$pd_priority_status."', 
	'".$t_base_resin_grade."', 
	'".$t_dosage_per."', 
	'".$t_gloss."', 
	'".$t_opacity."', 
	'".$t_heat_stability."',  
	'".$t_light_stability."',  
	'".$t_flame_retardant."',  
	'".$t_any_o_requirment."',  
	'".$t_required_sample."', 
	'".$t_target_rmc."', 
	'".$t_sale_price."', 
	'".$_SESSION['user_id']."',  
	'".date('Y-m-d')."', 
	'Active'
	)");
	$id=$_GET['id'];
	header("location: ../pd-detail_2b.php?id=$id");
	
}
elseif($_POST['action']=='send'){ 

$r1_pl_id    =$_POST['r1_pl_id'];
$marked_to_id=$_POST['marked_to_id'];

$update=mysqli_query($db,"update tblrank2detail set marked_to_id='".$marked_to_id."',r2_send_flag='Y',
r2_send_datetime='".date('Y-m-d H:i')."' where r1_pl_id='".$r1_pl_id."'");


    //email
	$select_to=mysqli_query($db,"select * from tblusers where
	user_id='".$marked_to_id."'");
	$row_to=mysqli_fetch_array($select_to);
	$dname  = $row_to['user_name'];
	$demail = $row_to['user_name'];
	
	$subject    = 'New Product Development "'.$row['Serno'].'" - Pending For Lab Response';
	
	
	$detail = 'A new product development is received. Development No. is "'.$row['Serno'].'". ';
	
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
	<td align="center" bgcolor="#5abae3" style="padding: 40px 0 30px 0; color: white; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - Product Development
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
	'.$detail3.'	</td> 
	</tr> 
	
	<tr>
	<td colspan="2" style="padding: 10px 0 10px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 15px; text-align:center;">
	<a href="'.$url.'/index.php" class="go-shop-btn btn btn-fill-type" style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
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
    $from    = 'pd@binrasheed.com';
	//$subject = 'New Customer Complaint - Pending For Approval';
	
    $headers = "From: " . strip_tags($from) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
	$mail = mail($to, $subject, $body, $headers);

}
elseif($_POST['action']=='save_lab_rec'){ 
$r1_pl_id                =$_POST['r1_pl_id'];
$r2_late_received_remarks=$_POST['r2_late_received_remarks'];

$update=mysqli_query($db,"update tblrank2detail set r2_lab_received_flag='Y',r2_lab_received_datetime='".date('Y-m-d H:i')."',r2_late_received_remarks='".$r2_late_received_remarks."' where r1_pl_id='".$r1_pl_id."'");
}

elseif($_GET['insert']=='pd_2r'){
	
	
 
	 $id=$_GET['r1_pl_id'];
                 
	 $pd2r_closest_existing_grade       = $_POST['pd2r_closest_existing_grade'];
	 $pd2r_closest_trail_grade          = $_POST['pd2r_closest_trail_grade'];
	 $pd2r_recommendation               = $_POST['pd2r_recommendation'];
	 $pd2r_new_dev_required             = $_POST['pd2r_new_dev_required'];
	 $pd2r_plan_date_trails             = $_POST['pd2r_plan_date_trails'];
	 $pd2r_etd                          = $_POST['pd2r_etd'];
	 
	 $pd2r_recommendation_date = explode('/',$_POST["pd2r_recommendation_date"]);
	 $pd2r_recommendation_date = $pd2r_recommendation_date[2].'-'.$pd2r_recommendation_date[0].'-'.$pd2r_recommendation_date[1];


	 $pd2r_plan_date_trails = explode('/',$_POST["pd2r_plan_date_trails"]);
	 $pd2r_plan_date_trails = $pd2r_plan_date_trails[2].'-'.$pd2r_plan_date_trails[0].'-'.$pd2r_plan_date_trails[1];	 


	 $pd2r_etd = explode('/',$_POST["pd2r_etd"]);
	 $pd2r_etd = $pd2r_etd[2].'-'.$pd2r_etd[0].'-'.$pd2r_etd[1];
	 
	 if($pd2r_new_dev_required=='Yes'){
		$pd3r_flag ='Y'; 
	 }else{
		$pd3r_flag ='C';  
		$pd2r_plan_date_trails  = '0000-00-00';
		$pd2r_etd               = '0000-00-00';        
	 }


	
	$insert=mysqli_query($db,"insert into tblpd2r 
	(r1_pl_id, 
	pd2r_closest_existing_grade,
	pd2r_closest_trail_grade,   
	pd2r_recommendation,        
	pd2r_recommendation_date,   
	pd2r_new_dev_required,      
	pd2r_plan_date_trails,      
	pd2r_etd,                   
	pd3r_flag,                  
	pd2r_created_by,            
	pd2r_created_on,            
	pd2r_creation_time,         
	pd2r_status
	)
	values
	('".$id."', 
	'".$pd2r_closest_existing_grade."',  
	'".$pd2r_closest_trail_grade."', 
	'".$pd2r_recommendation."', 
	'".$pd2r_recommendation_date."', 
	'".$pd2r_new_dev_required."', 
	'".$pd2r_plan_date_trails."', 
	'".$pd2r_etd."', 
	'".$pd3r_flag."', 
	'".$_SESSION['user_id']."',  
	'".date('Y-m-d')."', 
	'".date('H:i')."',
	'Active'
	)");
	
   
	header("location: ../pd-lab-listing.php");
	
}elseif($_GET['insert']=='pd_3r'){
	
	 $id=$_GET['r1_pl_id'];
                 
	 $pd3r_dev_start_time               = $_POST['pd3r_dev_start_time'];
	 $pd3r_dev_status                   = $_POST['pd3r_dev_status'];
	 $pd3r_dev_reason                   = $_POST['pd3r_dev_reason'];
	 $pd3r_dev_end_time                 = $_POST['pd3r_dev_end_time'];

	 
	 $pd3r_dev_start_date = explode('/',$_POST["pd3r_dev_start_date"]);
	 $pd3r_dev_start_date = $pd3r_dev_start_date[2].'-'.$pd3r_dev_start_date[0].'-'.$pd3r_dev_start_date[1];


	 $pd3r_dev_end_date = explode('/',$_POST["pd3r_dev_end_date"]);
	 $pd3r_dev_end_date = $pd3r_dev_end_date[2].'-'.$pd3r_dev_end_date[0].'-'.$pd3r_dev_end_date[1];	 

	
	$update=mysqli_query($db,"update tblpd2r 
	set
	pd3r_flag='C',
	pd3r_dev_start_date='".$pd3r_dev_start_date."', 
	pd3r_dev_start_time='".$pd3r_dev_start_time."',    
	pd3r_dev_status='".$pd3r_dev_status."',        
	pd3r_dev_reason='".$pd3r_dev_reason."',    
	pd3r_dev_end_date='".$pd3r_dev_end_date."',       
	pd3r_dev_end_time='".$pd3r_dev_end_time."'
	where r1_pl_id='".$id."'");
	

	
    header("location: ../pd-lab-listing.php");
	
	
}
elseif($_GET['insert']=='pd_4r'){
	
	 $id=$_GET['r1_pl_id'];
                 
	 $pd4r_final_report                  = $_POST['pd4r_final_report'];
	 $pd4r_sample_code                   = $_POST['pd4r_sample_code'];
	 $pd4r_sample_qty                    = $_POST['pd4r_sample_qty'];

     $date1 = date("Y-m-d h:i:s");
	 $date  = date("Ymdhis");
	 $filename = $_FILES["pd4r_final_report_att"]["name"];
	 $filename = preg_replace("/[^A-Za-z0-9\-_.\/]/", "", $filename);
	 $file_basename1 = substr($filename, 0, strripos($filename, '.')); // get file extention
	 $file_basename  = 'A-'.$date.'-'.$file_basename1;
	 $file_ext       = substr($filename, strripos($filename, '.')); // get file name
	 if($filename!=""){
	 $pd4r_final_report_att     = $file_basename.$file_ext;
	 move_uploaded_file($_FILES["pd4r_final_report_att"]["tmp_name"], "../upload/" . $pd4r_final_report_att);
     } 

	
	$update=mysqli_query($db,"update tblpd2r 
	set
	pd3r_flag='F',
	pd4r_final_report='".mysqli_real_escape_string($db,$pd4r_final_report)."', 
	pd4r_final_report_att='".$pd4r_final_report_att."',    
	pd4r_sample_code='".mysqli_real_escape_string($db,$pd4r_sample_code)."',        
	pd4r_sample_qty='".mysqli_real_escape_string($db,$pd4r_sample_qty)."',    
	pd4r_updated_by='".$_SESSION['user_id']."',       
	pd4r_updated_on='".date('Y-m-d')."',
	pd4r_updated_time='".date('H:i')."'
	where r1_pl_id='".$id."'");
	
	$select_so= mysqli_query($db,"select r2_d_created_by from tblrank2detail where r1_pl_id='".$id."'");
    $so = mysqli_fetch_array($select_so);
	
	$users= mysqli_query($db,"select * from tblusers where user_id='".$so['r2_d_created_by']."'");
	$user = mysqli_fetch_array($users);
	
    //email
	$dname  = $user['user_name'];
	$demail = $user['user_email'];
	
	$subject    = 'New Product Development "'.$id.'" - Pending For Sample Receiving';
	
	
	$detail = 'A new product development is pending for receiving. Development No. is "'.$id.'". ';
	

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
	<td align="center" bgcolor="#5abae3" style="padding: 40px 0 30px 0; color: white; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"> BINRASHEED - Product Development
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
	<a href="'.$url.'/index.php" class="go-shop-btn btn btn-fill-type" style="padding-top: 6px;padding-bottom: 6px; float:left;    border: 2px solid #333;
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
    $from    = 'pd@binrasheed.com';
	//$subject = 'New Customer Complaint - Pending For Approval';
	
    $headers = "From: " . strip_tags($from) . "\r\n";
	$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
	$mail = mail($to, $subject, $body, $headers);	
	
	
    header("location: ../pd-lab-listing.php");
	
	
}elseif($_GET['insert']=='rank3'){
	
	
	
	 $id=base64_decode($_GET['id']);
                 
	 $r3_sample_received_from           = $_POST['r3_sample_received_from'];
	 $r3_handover                       = $_POST['r3_handover'];
	 $r3_so                             = $_POST['r3_so'];

	 
	 $r3_etd_feedback = explode('/',$_POST["r3_etd_feedback"]);
	 $r3_etd_feedback = $r3_etd_feedback[2].'-'.$r3_etd_feedback[0].'-'.$r3_etd_feedback[1];



	
	$insert=mysqli_query($db,"insert into tblrank3 
	(r1_pl_id, 
	r3_sample_received_from,
	r3_handover,            
	r3_so,                  
	r3_etd_feedback,        
	r3_created_by,          
	r3_created_on,          
	r3_creation_time,       
	r3_status              

	)
	values
	('".$id."', 
	'".mysqli_real_escape_string($db,$r3_sample_received_from)."',  
	'".mysqli_real_escape_string($db,$r3_handover)."', 
	'".mysqli_real_escape_string($db,$r3_so)."', 
	'".$r3_etd_feedback."', 
	'".$_SESSION['user_id']."',  
	'".date('Y-m-d')."', 
	'".date('H:i')."',
	'Received'
	)");

   
	header("location: ../dashboard.php");
	
	
}elseif($_GET['insert']=='rank4'){
	
	
	
	 $id=base64_decode($_GET['id']);
                 
	 $r4_result           = $_POST['r4_result'];
	 $r4_feedback_detail  = $_POST['r4_feedback_detail'];
	 $r4_trail_o_qty      = $_POST['r4_trail_o_qty'];

	 
	 $r4_result_date = explode('/',$_POST["r4_result_date"]);
	 $r4_result_date = $r4_result_date[2].'-'.$r4_result_date[0].'-'.$r4_result_date[1];


     $r4_trail_date = explode('/',$_POST["r4_trail_date"]);
	 $r4_trail_date = $r4_trail_date[2].'-'.$r4_trail_date[0].'-'.$r4_trail_date[1];	 
	 
        if($r4_result=='Pass'){
			$r5_flag = 'Y';
		}else{
			$r5_flag = 'N';
		}
	
		$insert=mysqli_query($db,"insert into tblrank4 
		(r1_pl_id, 
		r4_result_date,
		r4_result,            
		r4_feedback_detail,                  
		r4_trail_date,
		r4_trail_o_qty,
        r5_flag,        
		r4_created_by,          
		r4_created_on,          
		r4_creation_time      

		)
		values
		('".$id."', 
		'".$r4_result_date."',  
		'".mysqli_real_escape_string($db,$r4_result)."',  
		'".mysqli_real_escape_string($db,$r4_feedback_detail)."', 
		'".$r4_trail_date."', 
		'".$r4_trail_o_qty."', 
		'".$r5_flag."', 
		'".$_SESSION['user_id']."',  
		'".date('Y-m-d')."', 
		'".date('H:i')."'
		)");

   
	header("location: ../pd-feedback-pending-listing.php");
	
	
}elseif($_GET['insert']=='rank5'){
	
	
	
	 $id=base64_decode($_GET['id']);
     

     $update = mysqli_query($db,"update tblrank4 set r5_flag='C' where r1_pl_id='".$id."'");
	 
	 $r5_n_sample_name   = $_POST['r5_n_sample_name'];
	 $r5_so              = $_POST['r5_so'];
	 $r5_so_qty          = $_POST['r5_so_qty'];
	 $r5_so_value        = $_POST['r5_so_value'];
	 $r5_result          = $_POST['r5_result'];
	 $r5_trail_o_qty     = $_POST['r5_trail_o_qty'];

	 
	 $r5_so_date = explode('/',$_POST["r5_so_date"]);
	 $r5_so_date = $r5_so_date[2].'-'.$r5_so_date[0].'-'.$r5_so_date[1];


     $r5_roe_date = explode('/',$_POST["r5_roe_date"]);
	 $r5_roe_date = $r5_roe_date[2].'-'.$r5_roe_date[0].'-'.$r5_roe_date[1];	 
	 
 	
		$insert=mysqli_query($db,"insert into tblrank5
		(r1_pl_id, 
		r5_n_sample_name, 
		r5_so,              
		r5_so_date,                        
		r5_so_qty,        
		r5_so_value,      
        r5_result,        
		r5_roe_date,          
		r5_trail_o_qty,       
		r5_created_by,    
        r5_created_on,    
        r5_creation_time 
	
		)
		values
		('".$id."', 
		'".mysqli_real_escape_string($db,$r5_n_sample_name)."',  
		'".mysqli_real_escape_string($db,$r5_so)."', 
		'".mysqli_real_escape_string($db,$r5_so_date)."', 
		'".mysqli_real_escape_string($db,$r5_so_qty)."', 
		'".mysqli_real_escape_string($db,$r5_so_value)."', 
		'".$r5_result."', 
		'".$r5_roe_date."', 
		'".mysqli_real_escape_string($db,$r5_trail_o_qty)."', 
		'".$_SESSION['user_id']."',  
		'".date('Y-m-d')."', 
		'".date('H:i')."'
		)");

   
	header("location: ../pd-feedback-pending-listing.php");
	
}elseif($_GET['insert']=='rank6'){
	
	
	
	 $id=base64_decode($_GET['id']);
     

     $update = mysqli_query($db,"update tblrank2detail set final_status='Completed Successfully' where r1_pl_id='".$id."'");
	 

	 $r6_so            = $_POST['r6_so'];
	 $r6_so_qty        = $_POST['r6_so_qty'];
	 $r6_so_value      = $_POST['r6_so_value'];
	 $r6_rsf           = $_POST['r6_rsf'];
     $r6_result        = $_POST['r6_result'];
	 
	 $r6_so_date = explode('/',$_POST["r6_so_date"]);
	 $r6_so_date = $r6_so_date[2].'-'.$r6_so_date[0].'-'.$r6_so_date[1];


     $r6_next_o_date = explode('/',$_POST["r6_next_o_date"]);
	 $r6_next_o_date = $r6_next_o_date[2].'-'.$r6_next_o_date[0].'-'.$r6_next_o_date[1];	 
	 
 	
		$insert=mysqli_query($db,"insert into tblrank6
		(r1_pl_id, 
		r6_so,           
		r6_so_date,      
		r6_so_qty,                      
		r6_so_value,     
		r6_rsf,          
        r6_next_o_date,  
		r6_result,         
		r6_created_by,     
		r6_created_on,   
        r6_creation_time
        
	
		)
		values
		('".$id."', 
		'".mysqli_real_escape_string($db,$r6_so)."',  
		'".mysqli_real_escape_string($db,$r6_so_date)."', 
		'".mysqli_real_escape_string($db,$r6_so_qty)."', 
		'".mysqli_real_escape_string($db,$r6_so_value)."', 
		'".mysqli_real_escape_string($db,$r6_rsf)."', 
		'".$r6_next_o_date."', 
		'".$r6_result."', 
		'".$_SESSION['user_id']."',  
		'".date('Y-m-d')."', 
		'".date('H:i')."'
		)");

   
	header("location: ../dashboard.php");
	
	
	
	
	
}
?> 

