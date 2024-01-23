<?php 
session_start();
error_reporting(0);
include('include/conn.php');

?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html><!--<![endif]-->

<!-- Specific Page Data -->
<!-- End of Data -->

<head>
    <meta charset="utf-8" />
	<title><?php echo $title;?> Employee Information Detail </title>
    <meta name="keywords" content="HTML5 Template, CSS3, Mega Menu, Admin Template, Elegant HTML Theme, Vendroid" />
    <meta name="description" content="Form Layouts - Responsive Admin HTML Template">
    <meta name="author" content="Venmond">
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="img/ico/favicon.png">
    <!-- CSS -->
    <!-- Bootstrap & FontAwesome & Entypo CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
    <link href="css/font-entypo.css" rel="stylesheet" type="text/css">
    <!-- Fonts CSS -->
    <link href="css/fonts.css"  rel="stylesheet" type="text/css">        
    <!-- Plugin CSS -->
    <link href="plugins/jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">    
    <link href="plugins/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="plugins/isotope/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="plugins/pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">    
	<link href="plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">   
    <link href="plugins/mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
    <link href="plugins/tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">    
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">    
    <link href="plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">
	<!-- Specific CSS -->
    <!-- Theme CSS -->
    <link href="css/theme.min.css" rel="stylesheet" type="text/css">
    <!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]--> 
    <link href="css/chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->    
    <!-- Responsive CSS -->
    <link href="css/theme-responsive.min.css" rel="stylesheet" type="text/css"> 
    <!-- for specific page in style css -->
    <!-- for specific page responsive in style css -->
    <!-- Custom CSS -->
    <link href="custom/custom.css" rel="stylesheet" type="text/css">
    <!-- Head SCRIPTS -->
    <script type="text/javascript" src="js/modernizr.js"></script> 
    <script type="text/javascript" src="js/mobile-detect.min.js"></script> 
    <script type="text/javascript" src="js/mobile-detect-modernizr.js"></script> 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="js/html5shiv.js"></script>
      <script type="text/javascript" src="js/respond.min.js"></script>     
    <![endif]-->
    

	
</head>    

<body id="forms" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed      responsive    clearfix" data-active="forms "  data-smooth-scrolling="1">     
<div class="vd_body">

<?php
//include('include/header.php');
?>

<div class="content">
  <div class="container">
          
          <div class="vd_content-section clearfix">
            <div class="row">
			<div class="col-md-1"></div>
              <div class="col-md-10">
                <div class="panel widget">
                  <div class="panel-heading vd_bg-grey">
                    <h3 class="panel-title" align="center" style="font-size:24px;"> <span class="menu-icon"> <i class="fa fa-envelope"></i> </span> Employee Information Detail  </h3>
					<br>
                  <h4 align="center" style="font-size:15px; color:white;"> NBMN </h4>
				  </div>
                  <div class="panel-body">
                    
						<form class="form-horizontal" id="submit_form" action="controllars/profile.php?INSERT=PROFILE" role="form" method="post"  enctype="multipart/form-data" data-parsley-validate>
					
					<?php
					  
							$Ud = mysql_query("Select * From tbluserinfodetail where Userid='".$_SESSION['UserName']."'"); 
							$row_Ud = mysql_fetch_array($Ud);
							
							$desig=mysql_query("select DesigName from tbldesignations where Desigid='".$row_Ud['Desigid']."'");
							$row_desig=mysql_fetch_array($desig);
					 
							$dept=mysql_query("select DeptName from tbldept where Deptid='".$row_Ud['Deptid']."'");
							$row_dept=mysql_fetch_array($dept);
							
							$city=mysql_query("select CityName from tblcities where Cityid='".$row_Ud['Cityid']."'");
							$row_city=mysql_fetch_array($city);
							
							$Report=mysql_query("Select User_Name from tbluserinfodetail where Userid='".$row_Ud['Incharge_Code']."'");
							$row_Report=mysql_fetch_array($Report);
							
							$HOD=mysql_query("Select User_Name from tbluserinfodetail where Userid='".$row_Ud['HOD_Code']."'");
							$row_HOD=mysql_fetch_array($HOD);
							
							$start =$row_Ud['Date_Of_Joining'];
							$end = date('Y-m-d');
							$doj_year=explode('-', $row_Ud['Date_Of_Joining']);
							$end2=date($doj_year[0].'-12-31');
							$diff = (strtotime($end)- strtotime($start))/86400 +1;
							$diff2 = (strtotime($end2)- strtotime($start))/86400 +1;
					  ?>
					  
					  <br>
		<input class="input-border-btm" type="hidden" name="Incharge_Code" id="Incharge_Code" value="<?php echo $row_Ud['Incharge_Code'];?>" >
			<input class="input-border-btm" type="hidden" name="HOD_Code" id="HOD_Code" value="<?php echo $row_Ud['HOD_Code'];?>" >
			
			
	
					<div class="row">
                       
                        <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Company Name:</label>
                          <div class="controls col-xs-8">
                          <?php if(substr($_SESSION['UserName'],0,1)=='1'  ){?>
                          
                           <input class="input-border-btm" type="text" name="Company_Name" id="Company_Name" placeholder="Employee Code" readonly value="NEO" required>
                           
                           <?php }else{?>
                           <input class="input-border-btm" type="text" name="Company_Name" id="Company_Name" placeholder="Employee Code" readonly value="LR" required>
                           <?php } ?>
                           
						  
						  </div>
                        </div>
						
						 <div class="col-md-6">
                          <label class="col-xs-4 control-label" style="color:red;">Employee Code:</label>
                          <div class="controls col-xs-8">
                            <input class="input-border-btm" type="text" name="Userid" id="Userid" placeholder="Employee Code" readonly value="<?php echo $row_Ud['Userid'];?>" required>
                          </div>
                        </div>
						
                      </div>
					  
					  <div class="row">
                       
                        <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Designation:</label>
                          <div class="controls col-xs-8">
						  <input class="input-border-btm" type="hidden" name="Desigid" id="Desigid"  readonly value="<?php echo $row_Ud['Desigid'];?>" >
						  
						  <select id="Desigid2" name="Desigid2" class="input-border-btm" disabled>
<option> Select Any... </option>

<?php

$dq= mysql_query("SELECT * FROM tbldesignations ORDER BY DesigName ASC");
while($dept = mysql_fetch_array($dq)){

?>

<option value="<?php echo $dept['Desigid'];?>" <?php if($row_Ud['Desigid']==$dept['Desigid']){echo "selected='selected'";}?>><?php echo $dept['DesigName'];?>  </option>

<?php

}
?>

 </select>
                          </div>
                        </div>
						
						 <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Department:</label>
                          <div class="controls col-xs-8" >
						 
						  <input class="input-border-btm" type="hidden" name="Deptid" id="Deptid" readonly value="<?php echo $row_Ud['Deptid'];?>" >
						  <select id="Deptid2" name="Deptid2" class="input-border-btm" disabled>
							<option> Select Any... </option>

							<?php

							$dp= mysql_query("SELECT * FROM tbldept ORDER BY DeptName ASC");
							while($dept = mysql_fetch_array($dp)){

							?>

							<option value="<?php echo $dept['Deptid'];?>" <?php if($row_Ud['Deptid']==$dept['Deptid']){echo "selected='selected'";}?>><?php echo $dept['DeptName'];?>  </option>

							<?php

							}
							?>

							 </select>
						  
                          </div>
                        </div>
						
                      </div>
					  
					 
					 
					  
					  <br>
					  <hr>
					  <h3 class="panel-title" style="font-size:18px; color:black;"><b> Personal Detail: </b></h3>
					  <hr>
					  <br>
					  
					 
					  
					<div class="row">
                        
                        <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">CNIC:</label>
                          <div class="controls col-xs-8">
                            <input class="input-border-btm" type="text" id="CNIC" name="CNIC" placeholder="CNIC"  value="<?php echo $row_Ud['CNIC'];?>" required>
                          </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Father/Husband:</label>
                          <div class="controls col-xs-8">
                            <select class="input-border-btm" name="FNH" required>
							   <option value="">  </option>
								<option value="FN"> Father </option>
								<option value="HN"> Husband </option>
								</select>
                          </div>
                        </div>
                        
                        
                        
					
					    
						
						
                      </div>
					
					<div class="row">
				      <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Employee Name:</label>
                          <div class="controls col-xs-8">
                            <input class="input-border-btm" type="text" id="User_Name" name="User_Name" placeholder="Employee Name"  value="<?php echo $row_Ud['User_Name'];?>" required>
                          </div>
                        </div>
					 <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Father / Husband Name:</label>
                          <div class="controls col-xs-8">
                            <input class="input-border-btm" type="text" id="FH_Name" name="FH_Name"   required >
                          </div>
                        </div>
					  
	             	</div>
		            
					<div class="row">
				      <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Gender:</label>
                          <div class="controls col-xs-8">
                            
							 <select class="input-border-btm" name="Gender" required>
							   <option value="">  </option>
								<option value="Male"> Male </option>
								<option value="Female"> Female </option>
								</select>
							
                          </div>
                        </div>
					 <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Date of Birth:</label>
                          <div class="controls col-xs-8">
                           
							
							<div class="controls col-xs-4">
                             
                             
                              <select class="input-border-btm" name="Date_Of_Birth" required>
                                  <option value="">Year</option>
                                  <?php for($i=1950;$i<=date('Y');$i++){?>
								<option value="<?php echo $i;?>"> <?php echo $i;?> </option>
								<?php } ?>
								</select>
								</div>
								<div class="controls col-xs-4">
                             
                                <select class="input-border-btm" name="Date_Of_Birth2" required>
                                     <option value="">Month</option>
                                  <?php for($i=1;$i<=12;$i++){
									  if(strlen($i)==1){
										  $i='0'.$i;
										  
									  }
									  ?>
								<option value="<?php echo $i;?>"> <?php echo $i;?> </option>
								<?php } ?>
								</select>
                             
                             
							
                          </div>
						  
						  <div class="controls col-xs-4">
                             
                                <select class="input-border-btm" name="Date_Of_Birth3" required>
                                     <option value="">Day</option>
                                  <?php for($i=1;$i<=31;$i++){
									  if(strlen($i)==1){
										  $i='0'.$i;
										  
									  }
									  ?>
								<option value="<?php echo $i;?>"> <?php echo $i;?> </option>
								<?php } ?>
								</select>
                             
                             
							
                          </div>
                        </div>
					  
	             	</div>
					
					
					<div class="row">
				      <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Contact Number:</label>
                          <div class="controls col-xs-8">
                            <input type="text" class="input-border-btm" placeholder="0300-0000000" id="Contact_No" name="Contact_No" required>
							 
							
                          </div>
                        </div>
					 <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Blood Group:</label>
                          <div class="controls col-xs-8">
                             <select class="input-border-btm" name="Blood_Group" id="Blood_Group" required>
									<option value="">  </option>
									<option value="AB+" > AB+ </option>
									<option value="AB-"> AB- </option>
									<option value="A+"> A+ </option>
									<option value="A-"> A- </option>
									<option value="B+"> B+ </option>
									<option value="B-"> B- </option>
									<option value="O+"> O+ </option>
									<option value="O-"> O- </option>
									<option value="Confirm-Later">Confirm Later</option>
								</select>
                          </div>
                        </div>
					  
	             	</div>
					
					
					<div class="row">
				     
						
					 <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Disability (if any):</label>
                          <div class="controls col-xs-8">
                            <select class="input-border-btm" name="Disability" required>
								<option value="No"> No </option>
								<option value="Yes"> Yes </option>
								</select>
                          </div>
                        </div>
					  
					  	
					 <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Marital Status:</label>
                          <div class="controls col-xs-8">
                           <select class="input-border-btm" name="Maritial_Status" required onchange="show_m_status(this.value);">
						        <option value="">  </option>
								<option value="Single"> Single </option>
								<option value="Married"> Married </option>
								<option value="Divorced"> Divorced </option>
								</select>
                          </div>
                        </div>
					  
	             	</div>
					
					
					<div class="row" id="show_c_status" style="display:none;">
				     
					
					  
					  
					   <div class="col-md-6" >
                          <label class="col-xs-3 control-label" style="color:red;">No of Children:</label>
                          <div class="controls col-xs-8">
                           <input type="number" class="input-border-btm" placeholder="Number of Children" id="No_Child" name="No_Child" >
                          </div>
                        </div>
						
						
					  
					  <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">If Child has any disability:</label>
                          <div class="controls col-xs-8">
                            <select class="input-border-btm" name="Child_Disability" >
								<option value="No"> No </option>
								<option value="Yes"> Yes </option>
								</select>
                          </div>
                        </div>
					  
	             	</div>
					
					
					<div class="row" id="show_m_status" style="display:none;">
				     
					
					  
					  
					   <div class="col-md-6" style="display:none;">
                          <label class="col-xs-3 control-label" >Spouse Name:</label>
                          <div class="controls col-xs-8">
                           <input type="number" class="input-border-btm" placeholder="Spouse Name" id="Spouse_Name" name="Spouse_Name" >
                          </div>
                        </div>
						
						 <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">If Spouse has any disability:</label>
                          <div class="controls col-xs-8">
                            <select class="input-border-btm" name="Spouse_Disability" >
								<option value="No"> No </option>
								<option value="Yes"> Yes </option>
								</select>
                          </div>
                        </div>
					  
					  
					
					  
	             	</div>
					
					<div class="row">
				     
					
					  
					  
					   <div class="col-md-6" >
                          <label class="col-xs-3 control-label" style="color:red;">Nationality:</label>
                          <div class="controls col-xs-8">
                            <select class="input-border-btm" name="Nationality" required>
								<option value="Pakistani">Pakistani</option>
								</select>
                          </div>
                        </div>
						
						 <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Religion:</label>
                          <div class="controls col-xs-8">
                            <select class="input-border-btm" name="Religion" required>
								<option value="Muslim"> Muslim </option>
								<option value="Christain"> Christain </option>
								<option value="Other"> Other </option>
								</select>
                          </div>
                        </div>
					  
					  
					
					  
	             	</div>
					
					
					<div class="row">
				     
					
					  
					  
					   <div class="col-md-12" >
                          <label class="col-xs-3 control-label" style="color:red;">Current Address:</label>
                          <div class="controls col-xs-9">
                            <input type="text" class="input-border-btm" name="Current_Address" placeholder="Current Address" required>
                          </div>
                        </div>
						
					  
					  
					
					  
	             	</div>
					
					<div class="row">
				     
					
					  
					  
					  
						 <div class="col-md-12">
                          <label class="col-xs-3 control-label" style="color:red;">Permanent Address:</label>
                          <div class="controls col-xs-9">
                           <input type="text" class="input-border-btm" name="Permanent_Address" placeholder="If Permanent Address is same as above then please copy complete above address in this field." required>
                          </div>
                        </div>
					  
					  
					
					  
	             	</div>
					<div class="row">
				     
					
					  
					  
					  
						 <div class="col-md-12">
                          <label class="col-xs-3 control-label" style="color:red;">Distance from Current Home Address to Office in Kilometers (One Sided):</label>
                          <div class="controls col-xs-9">
                           <input type="text" class="input-border-btm" name="home_diff" placeholder="Distance from Current Home Address to Office in Kilometers (One Sided)" required>
                          </div>
                        </div>
					  
					  
					
					  
	             	</div>
					
					<br>
					  <hr>
					  <h3 class="panel-title" style="font-size:18px; color:black;"><b> Emergency Contact Detail: </b></h3>
					  <hr>
					  <br>
					
					
					<div class="row">
				     
					
					  
					  
					  
						 <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Emergency Contact Name:</label>
                          <div class="controls col-xs-8">
                           <input type="text" class="input-border-btm" name="Emergency_Contact_Name" id="Emergency_Contact_Name" placeholder="Name" required>
                          </div>
                        </div>
					  
					  <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Emergency Contact No:</label>
                          <div class="controls col-xs-8">
                           <input type="text" class="input-border-btm" name="Emergency_Contact_No" id="Emergency_Contact_No" placeholder="0300-0000000" required>
                          </div>
                        </div>
					
					  
	             	</div>
					
					<div class="row">
				     
					
					  
					  
					  
						 <div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Emergency Contact Relation:</label>
                          <div class="controls col-xs-8">
                           <input type="text" class="input-border-btm" name="Emergency_Relation" id="Emergency_Relation" placeholder="Name" required>
                          </div>
                        </div>
					  
					 
					
					  
	             	</div>
					
					<br>
					  <hr>
					  <h3 class="panel-title" style="font-size:18px; color:black;"><b> Qualification Detail: </b></h3>
					  <hr>
					  <br>
					
					<div class="row">
				<div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Highest Qualification</label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="Highest_Qualification" id="Highest_Qualification" placeholder="Highest Qualification" required>
                          </div>
                        </div>
						
						<div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Specialization </label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="Specialization" id="Specialization" placeholder="Specialization" required>
                          </div>
                        </div>
				
			</div>	
					
					<div class="row">
				<div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Name of Institue:</label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="Institue" id="Institue" placeholder="Name of Institue" required>
                          </div>
                        </div>
						<div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Grade/Marks/CGPA:</label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="Marks" id="Marks" placeholder="Grade/Marks/CGPA" required>
                          </div>
                        </div>
						
				
			</div>	
			
			<div class="row">
				
				<div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Year of Last Degree Completion </label>
                          <div class="controls col-xs-4">
                             
                             
                              <select class="input-border-btm" name="Completion_Year" required>
                                  <option></option>
                                  <?php for($i=1950;$i<=date('Y');$i++){?>
								<option value="<?php echo $i;?>"> <?php echo $i;?> </option>
								<?php } ?>
								</select>
								</div>
								<div class="controls col-xs-4">
                             
                                <select class="input-border-btm" name="Completion_Month">
                                     <option></option>
                                  <?php for($i=1;$i<=12;$i++){?>
								<option value="<?php echo $i;?>"> <?php echo $i;?> </option>
								<?php } ?>
								</select>
                             
                             
                          </div>
                        </div>		
						
			</div>	
					
				<br>
					  <hr>
					  <h3 class="panel-title" style="font-size:18px; color:black;"><b> Previous Organization Detail: </b></h3>
					  <hr>
					  <br>
				
				<div class="row">
				<div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Is Your First Job?</label>
                          <div class="controls col-xs-8">
                            <select class="input-border-btm" name="First_Job" onchange="show_previous(this.value);" required >
							   <option value="">  </option>
								<option value="No"> No </option>
								<option value="Yes"> Yes </option>
								</select>
                          </div>
                        </div>
				
			</div>	

<div class="row" id="show_previous" style="display:none;">
				<div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Last Company Name</label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="Last_Company" id="Last_Company" placeholder="Company Name" >
                          </div>
                        </div>
						
						<div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Designation</label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="Last_Designation" id="Last_Designation" placeholder="Designation" >
                          </div>
                        </div>
				
			</div>	

			<div class="row" id="show_previous2" style="display:none;">
				
						
						<div class="col-md-12">
                          <label class="col-xs-6 control-label" style="color:red;">Total Work Experience (Apart from Current Organization)</label>
                         
                          
                            <div class="controls col-xs-2">
                             
                             
                              <select class="input-border-btm" name="Total_Work">
                                  <option value="">Year</option>
                                  <?php for($i=1;$i<=50;$i++){?>
								<option value="<?php echo $i;?>"> <?php echo $i;?> </option>
								<?php } ?>
								</select>
								</div>
								<div class="controls col-xs-2">
                             
                                <select class="input-border-btm" name="Total_Work2">
                                     <option value="">Month</option>
                                  <?php for($i=1;$i<=12;$i++){?>
								<option value="<?php echo $i;?>"> <?php echo $i;?> </option>
								<?php } ?>
								</select>
                             
                             
                          </div>
                          
                        </div>
				
			</div>	

			
			<br>
					  <hr>
					  <h3 class="panel-title" style="font-size:18px; color:black;"><b> Bank Detail: </b></h3>
					  <hr>
					  <br>
			
			
			<div class="row">
				<div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Bank Name:</label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="Bank_Name" id="Bank_Name" placeholder="Bank Name" required>
                          </div>
                        </div>
						
						<div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Account No </label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="Account_No" id="Account_No" placeholder="Account No" required>
                          </div>
                        </div>
				
			</div>	
			
			<div class="row">
				<div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Account Title:</label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="Account_Title" id="Account_Title" placeholder="Account Title" required>
                          </div>
                        </div>
						
						
			</div>	
			
			
			<br>
					  <hr>
					  <h3 class="panel-title" style="font-size:18px; color:black;"><b> Other Detail: </b></h3>
					  <hr>
					  <br>
			
			<div class="row">
				<div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Own Vehicle Status</label>
                          <div class="controls col-xs-8">
                            <select class="input-border-btm" name="V_Status" onchange="show_vehicle(this.value);" required >
							   <option value="Nothing">Nothing</option>
								<option value="Motorcycle"> Motorcycle </option>
								<option value="Car"> Car </option>
								</select>
                          </div>
                        </div>
				
			</div>	
			
			
			<div class="row" style="display:none" id="show_vehicle">
				<div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Company:</label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="V_Company_Name" id="V_Company_Name" placeholder="Company Name" >
                          </div>
                        </div>
						
						<div class="col-md-6">
                          <label class="col-xs-3 control-label" style="color:red;">Registration No </label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="Registration_No" id="Registration_No" placeholder="Registration No" >
                          </div>
                        </div>
				
			</div>
			
			<div class="row">
				<div class="col-md-6">
                          <label class="col-xs-3 control-label" >Driving Licence:</label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="Driving_Licence" id="Driving_Licence" placeholder="Driving Licence" >
                          </div>
                        </div>
						
						<div class="col-md-6">
                          <label class="col-xs-3 control-label" >Passport No </label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="Passport_No" id="Passport_No" placeholder="Passport No" >
                          </div>
                        </div>
				
			</div>	
			
			<div class="row">
				<div class="col-md-6">
                          <label class="col-xs-3 control-label" >Offical Email:</label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="Email" id="Email" placeholder="Offical Email" >
                          </div>
                        </div>
						
					<div class="col-md-6">
                          <label class="col-xs-3 control-label" >Personal Email:</label>
                          <div class="controls col-xs-8">
                             <input type="text" class="input-border-btm" name="Email2" id="Email2" placeholder="Personal Email" >
                          </div>
                        </div>	
				
			</div>	
			
			
                      <div class="form-actions row">
                        <div class="col-sm-9 col-sm-offset-5"> 
						<button type="submit" class="btn vd_btn vd_bg-green vd_white" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-check-circle"></i></span> Save </Button>
						</div>
                      </div>
					</form>
					
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
			  <div class="col-md-1"></div>
			  
            </div>
            <!-- row -->
          </div>
          <!-- .vd_content-section --> 
    <!-- Middle Content End --> 
  </div>
  <!-- .container --> 
</div>
<!-- .content -->
<!-- Footer Start -->
  <?php 
  
  include('include/footer.php');

?>
<!-- Footer END -->
  
</div>

<!-- .vd_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<!-- Javascript =============================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script type="text/javascript" src="js/jquery.js"></script> 
<!--[if lt IE 9]>
  <script type="text/javascript" src="js/excanvas.js"></script>      
<![endif]-->
<script type="text/javascript" src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src='plugins/jquery-ui/jquery-ui.custom.min.js'></script>
<script type="text/javascript" src="plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript" src="js/caroufredsel.js"></script> 
<script type="text/javascript" src="js/plugins.js"></script>

<script type="text/javascript" src="plugins/breakpoints/breakpoints.js"></script>
<script type="text/javascript" src="plugins/dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="plugins/prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script> 

<script type="text/javascript" src="plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="plugins/tagsInput/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="plugins/bootstrap-switch/bootstrap-switch.min.js"></script>
<script type="text/javascript" src="plugins/blockUI/jquery.blockUI.js"></script>
<script type="text/javascript" src="plugins/pnotify/js/jquery.pnotify.min.js"></script>

<script type="text/javascript" src="js/theme.js"></script>
<script type="text/javascript" src="custom/custom.js"></script>
 
<!-- Specific Page Scripts Put Here --> 
<script type="text/javascript" src='plugins/tagsInput/jquery.tagsinput.min.js'></script>

<script type="text/javascript" src='plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'></script>
<script type="text/javascript" src='plugins/daterangepicker/moment.min.js'></script>
<script type="text/javascript" src='plugins/daterangepicker/daterangepicker.js'></script>

<script type="text/javascript">
$(window).load(function(){
	
	
	$( "#Date_Of_Birth" ).datepicker({ dateFormat: 'yy-mm-dd'});

	
})


function show_m_status(val){
	
	if(val=='Married'){
		$('#show_m_status').show();	 
		$('#show_c_status').show();	 
		$('#No_Child').attr('required', 'required');
		$('#Spouse_Disability').attr('required', 'required');
		$('#Total_Work').attr('required', 'required');
		$('#Child_Disability').attr('required', 'required');
		
	}else{
		
		$('#show_m_status').hide();	 
		$('#show_c_status').hide();	 
		$('#No_Child').removeattr('required', 'required');
		
		$('#Spouse_Disability').removeattr('required', 'required');
		$('#Child_Disability').removeattr('required', 'required');
		
	}
	
}

function show_previous(val){
	
	if(val=='No'){
		$('#show_previous').show();	 
		$('#show_previous2').show();	 
		$('#Last_Company').attr('required', 'required');
		$('#Last_Designation').attr('required', 'required');
		$('#Total_Work').attr('required', 'required');
		
	}else{
		
		$('#show_previous').hide();	 
		$('#show_previous2').hide();	 
		$('#Last_Company').removeattr('required', 'required');
		$('#Last_Designation').removeattr('required', 'required');
		$('#Total_Work').removeattr('required', 'required');
		
	}
	
}
function show_vehicle(val){
	
	if(val!='Nothing'){
		$('#show_vehicle').show();	 
	
		$('#V_Company_Name').attr('required', 'required');
		$('#Registration_No').attr('required', 'required');
		
	}else{
		
		$('#show_vehicle').hide();	 
		 
		$('#V_Company_Name').removeattr('required', 'required');
		$('#Registration_No').removeattr('required', 'required');
		
	}
	
}



</script>
<!-- Specific Page Scripts END -->

</body>
</html>