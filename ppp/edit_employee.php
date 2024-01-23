<?php 
include("include/security.php");
include("include/conn.php");

$employee=mysql_query("select * from tbluserinfodetail where Userid='".$_GET['Userid']."'");
$row=mysql_fetch_array($employee);

?>

<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html><!--<![endif]-->

<!-- Specific Page Data -->
<!-- End of Data -->


<!-- Mirrored from www.venmond.com/demo/vendroid/forms-wizard.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Dec 2016 18:06:04 GMT -->
<head>
    <meta charset="utf-8" />
    <title><?php echo $title;?> Edit Employee </title>
    <meta name="keywords" content="HTML5 Template, CSS3, Mega Menu, Admin Template, Elegant HTML Theme, Vendroid" />
    <meta name="description" content="Form Wizards - Responsive Admin HTML Template">
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
    
	<style>

.r{color:red;}
	  
	</style>
	
	<script>
			
function calculate(Probation_Period){

 var Date_Of_Joining = document.getElementById("Date_Of_Joining").value;
 
 if(Probation_Period=='N/A'){
	 
	 document.getElementById("Probation_Start").value="0000-00-00";
	 document.getElementById("Probation_End").value="0000-00-00";
 }else{
	 
	 document.getElementById("Probation_Start").value=Date_Of_Joining;
 
 $.post("controllars/employees.php",{Date_Of_Joining:Date_Of_Joining,Probation_Period:Probation_Period,Calculate:'Cal'},function(data){
			document.getElementById("Probation_End").value=data;
	});
 }
}

function incharge(){
 
 var Incharge_Code = document.getElementById("Incharge_Code").value;
 
 $.post("controllars/employees.php",{Incharge_Code:Incharge_Code,Incharge:'Name'},function(data){
			document.getElementById("Incharge_Name").value=data;
	});
 }
 
 
 function hod(){
 
 var HOD_Code = document.getElementById("HOD_Code").value;
 
 $.post("controllars/employees.php",{HOD_Code:HOD_Code,HOD:'Name'},function(data){
			document.getElementById("HOD_Name").value=data;
	});
 }
 
</script>

</head>    

<body id="forms" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed      responsive    clearfix" data-active="forms "  data-smooth-scrolling="1">     
<div class="vd_body">
<!-- Header Start -->

<?php include('include/header.php');?>

  <!-- Header Ends --> 
  
<div class="content">
  <div class="container">
  
  <!-- SideBar Start -->

<?php include('include/sidebar.php');?>

  <!-- SideBar Ends --> 
  
  
  
<!-- Middle Content Start -->
    
    <div class="vd_content-wrapper">
      <div class="vd_container">
        <div class="vd_content clearfix">
          <div class="vd_head-section clearfix">
            <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a href="main.php">Home</a> </li>
                <li><a href="employees-list.php">Employees List</a> </li>
                <li class="active">Edit Employee</li>
              </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      
</div>
 
            </div>
          </div>
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>Edit Employee <?php echo $_GET['Userid'];?></h1>
			</div>
          </div>
          <div class="vd_content-section clearfix">
			<div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-body">
                    <form class="form-horizontal" action="controllars/employees.php?edit=employee&Userid=<?php echo $_GET['Userid'];?>" role="form" method="post" enctype="multipart/form-data" data-parsley-validate >
                      <div id="wizard-2" class="form-wizard">
                        <ul>
                          <li><a href="#tab21" data-toggle="tab">
                            <div class="menu-icon"> 1 </div>
                            Employee Details </a></li>
                          <li><a href="#tab22" data-toggle="tab">
                            <div class="menu-icon"> 2 </div>
                            Personal Details </a></li>
						  <li><a href="#tab23" data-toggle="tab">
                            <div class="menu-icon"> 3 </div>
                            Family Details </a></li>
						  <li><a href="#tab24" data-toggle="tab">
                            <div class="menu-icon"> 4 </div>
                            Salary Details </a></li>
                          <li><a href="#tab25" data-toggle="tab">
                            <div class="menu-icon"> 5 </div>
                            Contact Details </a></li>
                          <li><a href="#tab26" data-toggle="tab">
                            <div class="menu-icon"> 6 </div>
                            Medical Details </a></li>
						  <li><a href="#tab27" data-toggle="tab">
                            <div class="menu-icon"> 7 </div>
                            Qualification Details </a></li>
						  <li><a href="#tab28" data-toggle="tab">
                            <div class="menu-icon"> 8 </div>
                            Work Experience </a></li>
						  <li><a href="#tab29" data-toggle="tab">
                            <div class="menu-icon"> 9 </div>
                            Reference Details </a></li>
						  <li><a href="#tab30" data-toggle="tab">
                            <div class="menu-icon"> 10 </div>
                            Documents </a></li>
                        </ul>
                        <div class="progress progress-striped active">
                          <div class="progress-bar progress-bar-info" > </div>
                        </div>
                        <div class="tab-content no-bd pd-25">
						
						<!-- Employee Details Start -->
						
                          <div class="tab-pane" id="tab21">
						  
							<div class="panel-heading">
								<h3 style="color:black;">
								Provide Employee's Personal Information
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
							  <label class="col-sm-2 control-label">CNIC <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="00000-0000000-0" name="CNIC" value="<?php echo $row['CNIC'];?>" readonly>
                              </div>
							  <label class="col-sm-3 control-label">Employee Image</label>
                              <div class="col-sm-3 controls">
                                <input type="file" name="Employee_Image" id="Employee_Image">
								<input type="hidden" name="Edit_Employee_Image" id="Edit_Employee_Image" value="<?php echo $row['Employee_Image']; ?>">
                              </div>
							  <div class="col-sm-1 controls">
							  <?php if($row['Employee_Image']!=''){?>
							  <a href="uploads/profile_image/<?php echo $row['Employee_Image'];?>" alt="<?php echo $row['Employee_Image']; ?>" data-rel="prettyPhoto[1]" target="_blank">
							  <img alt="<?php echo $row['Employee_Image']; ?>" src="uploads/profile_image/<?php echo $row['Employee_Image'];?>">
							  <?php }else{?>
								  <img src="img/user.png">
							  <?php } ?>
							  </a>
							  </div>
                            </div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Employee Code <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" id="Userid" name="Userid" placeholder="Employee Code" required="required" value="<?php echo $row['Userid'];?>" readonly>
                              </div>
                              
							  <label class="col-sm-3 control-label">Department</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Deptid" id="Deptid"> 
								
								<?php $dept=mysql_query("Select * from tbldept order by DeptName");
								
								while($dept_row=mysql_fetch_array($dept)){ ?>
								
								<option value="<?php echo $dept_row['Deptid'];?>" <?php if($dept_row['Deptid']==$row['Deptid']){echo "selected='selected'";}?> ><?php echo $dept_row['DeptName'];?>  </option>
								
								<?php }?>
								
								</select>
                              </div>
                            </div>
							
							<div class="form-group">
							<label class="col-sm-2 control-label">First Name <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="User_Name" placeholder="Employee Name" value="<?php echo $row['User_Name'];?>">
                              </div>
                             
							  <label class="col-sm-3 control-label">Additional(Dept.)</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="SDid" id="SDid">
								
								<?php $subdept=mysql_query("Select * from tblsubdepartments order by SDName");
								
								while($subdept_row=mysql_fetch_array($subdept)){ ?>
								
								<option value="<?php echo $subdept_row['SDid'];?>" <?php if($subdept_row['SDid']==$row['SDid']){echo "selected='selected'";}?> ><?php echo $subdept_row['SDName'];?>  </option>
								
								<?php }?>
								
								</select>
                              </div>
                            </div>
							
							<div class="form-group">
							 <label class="col-sm-2 control-label">Last Name <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Father_Name" placeholder="Father Name" value="<?php echo $row['Father_Name'];?>">
                              </div>
                              
                              <label class="col-sm-3 control-label">Designation</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Desigid" id="Desigid">
								
								<?php $desig=mysql_query("Select * from tbldesignations order by DesigName");
								while($desig_row=mysql_fetch_array($desig)){ ?>
								
								<option value="<?php echo $desig_row['Desigid'];?>" <?php if($desig_row['Desigid']==$row['Desigid']){echo "selected='selected'";}?>><?php echo $desig_row['DesigName'];?>  </option>
								
								<?php }?>
								
								</select>
                              </div>
                            </div>
							
							<div class="form-group">
							<label class="col-sm-2 control-label">Work Location</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Cityid" id="Cityid">
								
								<?php $city=mysql_query("Select * from tblcities order by CityName");
								
								while($city_row=mysql_fetch_array($city)){ ?>
								
								<option value="<?php echo $city_row['Cityid'];?>" <?php if($city_row['Cityid']==$row['Cityid']){echo "selected='selected'";}?>><?php echo $city_row['CityName'];?>  </option>
								
								<?php }?>
								</select>
                              </div>
                              
                             <label class="col-sm-3 control-label">Employee Induction </label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Emp_Induction" id="Emp_Induction">
									<option value="New-Hire" <?php if($row['Emp_Induction']=="New-Hire"){ echo "selected='selected'";} ?>> New-Hire </option>
									<option value="Re-Hire" <?php if($row['Emp_Induction']=="Re-Hire"){ echo "selected='selected'";} ?>> Re-Hire </option>
									<option value="Transfer" <?php if($row['Emp_Induction']=="Transfer"){ echo "selected='selected'";} ?>> Transfer </option>
								</select>
                              </div>
                            </div>
							
							<div class="form-group">
							<label class="col-sm-2 control-label"> Login As </label>
                              <div class="col-sm-3 controls">
								<select class="input-border-btm" name="Login_Type">
									<option value="user" <?php if($row['Login_Type']=='user'){echo "selected='selected'";}?> >User</option>
								<!--<option value="admin" <?php if($row['Login_Type']=='admin'){echo "selected='selected'";}?> >Admin</option>-->
									<option value="incharge" <?php if($row['Login_Type']=='incharge'){echo "selected='selected'";}?> >Incharge</option>
									<option value="hod" <?php if($row['Login_Type']=='hod'){echo "selected='selected'";}?> >HOD</option>
								</select>
                              </div>
                           
							   <label class="col-sm-3 control-label">Employee Status</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="ESid" id="ESid">
								
								<?php $status=mysql_query("Select * from tblempstatus order by EmpStatus");
								while($status_row=mysql_fetch_array($status)){ ?>
								
								<option value="<?php echo $status_row['ESid'];?>" <?php if($status_row['ESid']==$row['ESid']){echo "selected='selected'";}?> ><?php echo $status_row['EmpStatus'];?>  </option>
								
								<?php }?>
								</select>
                              </div>
                              
                            </div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Job Level</span></label>
									<div class="col-sm-3 controls">
										<input type="text" class="input-border-btm" name="Job_Level" value="<?php echo $row['Job_Level'];?>" id="Job_Level">
									</div>
								<label class="col-sm-3 control-label">Job Grade</span></label>
									<div class="col-sm-3 controls">
										<input type="text" class="input-border-btm" name="Job_Grade" value="<?php echo  $row['Job_Grade']; ?>" id="Job_Grade">
									</div>
							</div>
							<br><hr>
							
							<div class="panel-heading">
								<h3 style="color:black;">
									Employee Type
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
							<label class="col-sm-2 control-label"> Employee Type </label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="ETid" id="ETid">
								<?php $emptype=mysql_query("Select * from tblemptype order by ETid");
								
								while($emptype_row=mysql_fetch_array($emptype)){ ?>
								
								<option value="<?php echo $emptype_row['ETid'];?>"><?php echo $emptype_row['EmpType'];?>  </option>
								
								<?php }?>
								</select>
                              </div>
                             
							 <label class="col-sm-3 control-label">Probation Period</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Probation_Period" onChange="calculate(this.value);">
								<option value="N/A" <?php if($row['Probation_Period']=='0'){echo "selected='selected'";}?>>N/A</option>
								<option value="3" <?php if($row['Probation_Period']=='3'){echo "selected='selected'";}?>>3 Month</option>
								<option value="6" <?php if($row['Probation_Period']=='6'){echo "selected='selected'";}?>>6 Months</option>
								<option value="12" <?php if($row['Probation_Period']=='12'){echo "selected='selected'";}?>>12 Months</option>
								</select>
                              </div>
							  
                            </div>
							
                            <div class="form-group">
							  <label class="col-sm-2 control-label">Joining Date <span class="required r">*</span></label>
								<div class="col-sm-3 controls">
								  <div class="input-group">
									<input type="text" class="input-border-btm" placeholder="Joining Date" id="Date_Of_Joining" name="Date_Of_Joining" value="<?php echo $row['Date_Of_Joining'];?>">
									<span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#Date_Of_Joining"><i class="fa fa-calendar"></i></span> </div>
								</div>
							  
							  <label class="col-sm-3 control-label">Probation Start</label>
								<div class="col-sm-3 controls">
								  <div class="input-group">
									<input type="text" class="input-border-btm" placeholder="Probation Start" id="Probation_Start" name="Probation_Start" value="<?php if($row['Probation_Start']==""){ echo "0000-00-00"; }else{ echo $row['Probation_Start']; } ?>" readonly>
									<span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#Probation_Start"><i class="fa fa-calendar"></i></span> </div>
								</div>
								
							  
                            </div>
                            <div class="form-group">
							<label class="col-sm-2 control-label">Confirmation Date</label>
								<div class="col-sm-3 controls">
								  <div class="input-group">
									<input type="text" class="input-border-btm" placeholder="Confirmation Date" id="Confirmation_Date" name="Confirmation_Date" value="<?php if($row['Confirmation_Date']==""){ echo "0000-00-00"; }else{ echo $row['Confirmation_Date']; } ?>">
									<span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#Confirmation_Date"><i class="fa fa-calendar"></i></span> </div>
								</div>
                              
							  <label class="col-sm-3 control-label">Probation End</label>
								<div class="col-sm-3 controls">
								  <div class="input-group">
									<input type="text" class="input-border-btm" placeholder="Probation End" id="Probation_End" name="Probation_End" value="<?php if($row['Probation_End']==""){ echo "0000-00-00"; }else{ echo $row['Probation_End']; } ?>" readonly>
									<span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#Probation_End"><i class="fa fa-calendar"></i></span> </div>
								</div>
                              
                            </div>
							
							<br><hr>
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Reporting To
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label"> Report to <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Incharge Code" name="Incharge_Code" id="Incharge_Code" onblur="incharge();" value="<?php echo $row['Incharge_Code'];?>">
								<span class="help-inline">Please Give Incharge Employee Code </span>
                              </div>
                              <label class="col-sm-3 control-label"> HOD <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="HOD Code" name="HOD_Code" id="HOD_Code" onblur="hod();" value="<?php echo $row['HOD_Code'];?>">
								<span class="help-inline">Please Give HOD Employee Code</span>
                              </div>
                            </div>
							
							<div class="form-group">
							<label class="col-sm-2 control-label"> </label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" id="Incharge_Name" readonly>
                              </div>
							  <label class="col-sm-3 control-label"> </label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" id="HOD_Name" readonly>
                              </div>
                            </div>
							
							<br><hr>
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Facilities
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Facility</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Facilityid" id="Facilityid">
									<option> None </option>
								<?php $facility=mysql_query("Select * from tblfacility order by FacilityName");
								
								while($facility_row=mysql_fetch_array($facility)){ ?>
								
								<option value="<?php echo $facility_row['Facilityid'];?>"><?php echo $facility_row['FacilityName'];?>  </option>
								
								<?php }?>
								</select>
                              </div>
							  
                              <label class="col-sm-3 control-label">Description</label>
                              <div class="col-sm-3 controls">
                                <textarea class="input-border-btm" rows="3" name="Facility_Description" id="Facility_Description" placeholder="Facility Description"></textarea>
                              </div>
                            </div>
							
							<div class="form-group">  
                              <div class="col-sm-3 col-sm-offset-5 controls">
                                <input type="button" class="btn btn-success" onClick="add();" value="Add">
                              </div>
                            </div>
							
							<br>
							
							<div class="row" >
							  <div class="col-md-12">
								<div class="panel widget">
								  <div class="panel-body table-responsive">
									<table class="table table-hover" >
									  <thead>
										<tr>
										  <th>Facility</th>
										  <th>Description</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody id="Facility">
								<?php 
										
									$facility_detail=mysql_query("Select * from tblfacilitydetails where Userid='".$_GET['Userid']."' ");
								
									while($row_facility_detail=mysql_fetch_array($facility_detail)){
									
									$Facilit= mysql_query("SELECT FacilityName FROM tblfacility where Facilityid= '".$row_facility_detail['Facilityid']."'");
									while($row_facilit = mysql_fetch_array($Facilit)){
									 ?>
									
									<tr>
										<td><?php echo $row_facilit['FacilityName'];?></td>
										<td><?php echo $row_facility_detail['Description'];?></td>
										<td class="menu-action">
										  <a data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red" onClick="delete_facility(<?php echo $row_fac['Fid']; ?>);"> <i class="fa fa-times"></i></a>
										</td>
									</tr>
								
								<?php 
									}
								}
								?>
								
										
									  </tbody>
									</table>
								  </div>
								</div>
								<!-- Panel Widget --> 
							  </div>
							  <!-- col-md-12 --> 
							</div>
							<!-- row -->
							
							<br><hr>
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Benefits
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">EOBI#</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="EOBI No." name="EOBI" value="<?php echo $row['EOBI'];?>">
                              </div>
                              <label class="col-sm-3 control-label">Category</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Category" name="Benefit_Category" value="<?php echo $row['Benefit_Category'];?>">
                              </div>
                            </div>
							<div class="form-group">
                              <label class="col-sm-2 control-label">Health Insurance</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Health Insurance" name="Health_Insurance" value="<?php echo $row['Health_Insurance'];?>">
                              </div>
                              <label class="col-sm-3 control-label">Entitlement</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Entitlement" name="Entitlement" value="<?php echo $row['Entitlement'];?>">
                              </div>
                            </div>
                          </div>
						  
						  <!-- Employee Details End -->
						  
						  <!-- Personal Details Start -->
						  
                          <div class="tab-pane" id="tab22">
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Provide Employee's Personal Details
								</h3>
							</div>
							
							<br>
						  
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Date of Birth</label>
								<div class="col-sm-3 controls">
								  <div class="input-group">
									<input type="text" class="input-border-btm" placeholder="Date of Birth" id="Date_Of_Birth" name="Date_Of_Birth" value="<?php if($row['Date_Of_Birth']==""){ echo "0000-00-00"; }else{ echo $row['Date_Of_Birth'];} ?>">
									<span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#Date_Of_Birth"><i class="fa fa-calendar"></i></span> </div>
								</div>
								<label class="col-sm-3 control-label">Gender</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Gender">
								<option value="Male" <?php if($row['Gender']=='Male'){echo "selected='selected'";}?>> Male </option>
								<option value="Female" <?php if($row['Gender']=='Female'){echo "selected='selected'";}?>> Female </option>
								</select>
                              </div>
                              
                            </div>
							<div class="form-group">
                              
							  <label class="col-sm-2 control-label">Marital Status</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Maritial_Status">
								<option value="Single" <?php if($row['Maritial_Status']=='Single'){echo "selected='selected'";}?>> Single </option>
								<option value="Married"<?php if($row['Maritial_Status']=='Married'){echo "selected='selected'";}?>> Married </option>
								<option value="Divorced" <?php if($row['Maritial_Status']=='Divorced'){echo "selected='selected'";}?>> Divorced </option>
								</select>
                              </div>
                              <label class="col-sm-3 control-label">Nationality</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Nationality">
								<option value="Pakistani" <?php if($row['Nationality']=='Pakistani'){echo "selected='selected'";}?>>Pakistani</option>
								</select>
                              </div>
                            </div>
							<div class="form-group">
							<label class="col-sm-2 control-label">Mother Name</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Mother Name" name="Mother_Name" value="<?php echo $row['Mother_Name'];?>">
                              </div>
                              <label class="col-sm-3 control-label">Religion</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Religion">
								<option value="Muslim" <?php if($row['Religion']=='Muslim'){echo "selected='selected'";}?>> Muslim </option>
								<option value="Christain" <?php if($row['Religion']=='Christain'){echo "selected='selected'";}?>> Christain </option>
								<option value="Other" <?php if($row['Religion']=='Other'){echo "selected='selected'";}?>> Other </option>
								</select>
                              </div>
							  
                            </div>
							<div class="form-group">
                              
							  <label class="col-sm-2 control-label">Spouse Name <br><small>(if any)</small></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Wife & Children Name" name="Spouse_Name" id="Spouse_Name">
                              </div>
                            </div>
							
							<div class="form-group">  
                              <div class="col-sm-2 col-sm-offset-3 controls">
                                <input type="button" class="btn btn-success" onClick="add_spouse();" value="Add">
                              </div>
                            </div>
							
							<br>
							
							<div class="row" >
							  <div class="col-md-12">
								<div class="panel widget">
								  <div class="panel-body table-responsive">
									<table class="table table-hover" >
									  <thead>
										<tr>
										  <th>Spouse Name</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody id="Spouse">
									  
									<?php 									 
										 $Spouse= mysql_query("SELECT * FROM tblspousedetails where Userid='".$_GET['Userid']."'");
										   while($row_Spouse = mysql_fetch_array($Spouse)){
											   
										?>
									
										<tr>
											<td><?php echo $row_Spouse['Spouse_Name'];?></td>
											<td class="menu-action">
											  <a data-original-title="Delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red" onClick="delete_spouse(<?php echo $row_Spouse['SPid'];?>);"> <i class="fa fa-times"></i></a>
											</td>
										</tr>
									   <?php }?>
								
										
									  </tbody>
									</table>
								  </div>
								</div>
								<!-- Panel Widget --> 
							  </div>
							  <!-- col-md-12 --> 
							</div>
							<!-- row -->
							
							<br><hr>
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Social Media Details
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Linked In</label>
                              <div class="col-sm-3 controls">
                                <input type="email" class="input-border-btm" placeholder="Linked In ID" name="Linked_In" value="<?php echo $row['Linked_In'];?>">
                              </div>
							  <label class="col-sm-3 control-label">Facebook</label>
                              <div class="col-sm-3 controls">
                                <input type="email" class="input-border-btm" placeholder="Facebook ID" name="Facebook" value="<?php echo $row['Facebook'];?>">
                              </div>
                            </div>
							<div class="form-group">
                              <label class="col-sm-2 control-label">Skype</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Skype UserName" name="Skype" value="<?php echo $row['Skype'];?>">
                              </div>
							  <label class="col-sm-3 control-label">Twitter</label>
                              <div class="col-sm-3 controls">
                                <input type="email" class="input-border-btm" placeholder="Twitter ID" name="Twitter" value="<?php echo $row['Twitter'];?>">
                              </div>
                            </div>
                          </div>
						  
						  <!-- Personal Details End -->
						  
						  <!-- Family Details Start -->
						  
                          <div class="tab-pane" id="tab23">
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Provide Employee's Family Details
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Dependant Name</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Dependant_Name" id="Dependant_Name" placeholder="Dependant Name">
                              </div>
							  <label class="col-sm-3 control-label">Relation with Dependant</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Relationid" id="Relationid">
								
								<?php $relation=mysql_query("Select * from tblrelation order by Relationid");
								
								while($relation_row=mysql_fetch_array($relation)){ ?>
								
								<option value="<?php echo $relation_row['Relationid'];?>"><?php echo $relation_row['RelationName'];?>  </option>
								
								<?php }?>
								
								</select>
                              </div>
                            </div>
							<div class="form-group">
                              <label class="col-sm-2 control-label">Dependant CNIC</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Dependant_CNIC" id="Dependant_CNIC" placeholder="00000-0000000-0">
                              </div>
							  <label class="col-sm-3 control-label">Dependant Contact No</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Dependant_Contact_No" id="Dependant_Contact_No" placeholder="0300-0000000">
                              </div>
                            </div>
							<div class="form-group">
							  <label class="col-sm-2 control-label">Dependant Address</label>
                              <div class="col-sm-9 controls">
                                <input type="text" class="input-border-btm" name="Dependant_Address" id="Dependant_Address" placeholder="Dependant Address">
                              </div>
                            </div>
							
							<div class="form-group">  
                              <div class="col-sm-3 col-sm-offset-5 controls">
                                <input type="button" class="btn btn-success" onClick="add_family();" value="Add">
                              </div>
                            </div>
							
							<br>
							
							<div class="row" >
							  <div class="col-md-12">
								<div class="panel widget">
								  <div class="panel-body table-responsive">
									<table class="table table-hover" >
									  <thead>
										<tr>
										  <th>Name</th>
										  <th>Relation</th>
										  <th>CNIC</th>
										  <th>Contant No</th>
										  <th>Address</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody id="Family">
										
									<?php 
									   $Family= mysql_query("SELECT * FROM tblfamilydetails where Userid='".$_GET['Userid']."'");
									   while($row_family = mysql_fetch_array($Family)){
										   
									  $Relation= mysql_query("SELECT RelationName FROM tblrelation where Relationid= '".$row_family['Relationid']."'");
									   while($row_relation = mysql_fetch_array($Relation)){
									?>			
										<tr>
											<td><?php echo $row_family['Dependant_Name'];?></td>
											<td><?php echo $row_relation['RelationName'];?></td>
											<td><?php echo $row_family['Dependant_CNIC'];?></td>
											<td><?php echo $row_family['Dependant_Contact_No'];?></td>
											<td><?php echo $row_family['Dependant_Address'];?></td>
											<td class="menu-action">
											  <a data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red" onClick="delete_family(<?php echo $row_family['Familyid']; ?>);"> <i class="fa fa-times"></i></a>
											</td>
										</tr>
										
										<?php
										}
									   }
										?>
										
									  </tbody>
									</table>
								  </div>
								</div>
								<!-- Panel Widget --> 
							  </div>
							  <!-- col-md-12 --> 
							</div>
							<!-- row -->
							
                          </div>
						  
						  <!-- Family Details Start -->
						  
						  <!-- Salary Details Start -->
						  
                          <div class="tab-pane" id="tab24">
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Provide Employee's Salary Details
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Bank Name</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Bank Name" name="Bank_Name" value="<?php echo $row['Bank_Name'];?>">
                              </div>
                              <label class="col-sm-3 control-label">Account No.</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Account No." name="Account_No" value="<?php echo $row['Account_No'];?>">
                              </div>
                            </div>
							<div class="form-group">
							<label class="col-sm-2 control-label">Account Title</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Account Title" name="Account_Title" value="<?php echo $row['Account_Title'];?>">
                              </div>
							<label class="col-sm-3 control-label"> Starting Salary </label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Current Salary" name="Starting_Salary" value="<?php if($row['Starting_Salary']==""){echo "0"; } else{ echo $row['Starting_Salary']; } ?>">
                              </div>
							</div>
							
							<br><hr>
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Increment Detail
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Type/Reason</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="STid" id="STid">
								
								<?php $salarytype=mysql_query("Select * from tblincrementtype order by Increment_Type");
								
								while($salarytype_row=mysql_fetch_array($salarytype)){ ?>
								
								<option value="<?php echo $salarytype_row['STid'];?>"><?php echo $salarytype_row['Increment_Type'];?>  </option>
								
								<?php }?>
								</select>
                              </div>
                              <label class="col-sm-3 control-label"> Amount</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" placeholder="Increment Amount" name="Increment_Amount" id="Increment_Amount" value="0">
                              </div>
                            </div>
							<div class="form-group">
                              <label class="col-sm-2 control-label"> Date </label>
								<div class="col-sm-3 controls">
								  <div class="input-group">
									<input type="text" class="input-border-btm" placeholder="<?php echo date('Y-00-00'); ?>" id="Increment_Date" name="Increment_Date" value="<?php echo date('Y-m-d')?>">
									<span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#Increment_Date"><i class="fa fa-calendar"></i></span> </div>
								</div>
                            </div>
							
							<div class="form-group">  
                              <div class="col-sm-3 col-sm-offset-5 controls">
                                <input type="button" class="btn btn-success" onClick="add_increment();" value="Add">
                              </div>
                            </div>
							
							<br> 
							
							<div class="row" >
							  <div class="col-md-12">
								<div class="panel widget">
								  <div class="panel-body table-responsive">
									<table class="table table-hover" >
									  <thead>
										<tr>
										  <th>Type</th>
										  <th>Amount</th>
										  <th>Date</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody id="Increment">
									  
									<?php 
									   $Increment= mysql_query("SELECT * FROM tblincrementdetails where Userid='".$_GET['Userid']."'");
									   while($row_Increment = mysql_fetch_array($Increment)){
										   
									  $Incre= mysql_query("SELECT SalaryType FROM tblsalarytype where STid= '".$row_Increment['STid']."'");
									   while($row_Incre = mysql_fetch_array($Incre)){
									?>			
										<tr>
											<td><?php echo $row_Incre['SalaryType'];?></td>
											<td><?php echo $row_Increment['Increment_Amount'];?></td>
											<td><?php echo $row_Increment['Increment_Date'];?></td>
											<td class="menu-action">
											  <a data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red" onClick="delete_increment(<?php echo $row_Increment['Iid']; ?>);"> <i class="fa fa-times"></i></a>
											</td>
										</tr>
										
										<?php
										}
									   }
										?>
										
									  </tbody>
									</table>
								  </div>
								</div>
								<!-- Panel Widget --> 
							  </div>
							  <!-- col-md-12 --> 
							</div>
							<!-- row -->
							
                          </div>
						  
						  <!-- Salary Details Start -->
						  
						  <!-- Contact Details Start -->
						  
                          <div class="tab-pane" id="tab25">
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Provide Employee's Contact Details
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Personal No.</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Mobile_No_1" placeholder="0300-0000000" value="<?php echo $row['Mobile_No_1'];?>">
                              </div>
                              <label class="col-sm-3 control-label">Permanent Address</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Permanent_Address" placeholder="Permanent Address" value="<?php echo $row['Permanent_Address'];?>">
                              </div>
                            </div>
							<div class="form-group">
                              <label class="col-sm-2 control-label">Official No.</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Mobile_No_2" placeholder="0300-0000000" value="<?php echo $row['Mobile_No_2'];?>">
                              </div>
							  <div class="col-sm-3 controls"></div>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Per_Add_Cityid" id="Per_Add_Cityid">
									<?php $city=mysql_query("Select * from tblcities order by Cityid");
								
								while($city_row=mysql_fetch_array($city)){ ?>
								
								<option value="<?php echo $city_row['Cityid'];?>" <?php if($city_row['Cityid']==$row['Cityid']){echo "selected='selected'";}?> ><?php echo $city_row['CityName'];?>  </option>
								
								<?php }?>
								</select>
                              </div>
                            </div>
							<div class="form-group">
                              <label class="col-sm-2 control-label">Official Email</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Official_Email" placeholder="example@gmail.com" value="<?php echo $row['Official_Email'];?>">
                              </div>
                              <label class="col-sm-3 control-label">Tempraory Address</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Tempraory_Address" placeholder="Tempraory Address" value="<?php echo $row['Tempraory_Address'];?>">
                              </div>
                            </div>
							<div class="form-group">
                              <label class="col-sm-2 control-label">Personal Email</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Personal_Email" placeholder="example@gmail.com" value="<?php echo $row['Personal_Email'];?>">
                              </div>
							  <div class="col-sm-3 controls"></div>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Tem_Add_Cityid" id="Tem_Add_Cityid">
									<?php $city=mysql_query("Select * from tblcities order by Cityid");
								
								while($city_row=mysql_fetch_array($city)){ ?>
								
								<option value="<?php echo $city_row['Cityid'];?>" <?php if($city_row['Cityid']==$row['Cityid']){echo "selected='selected'";}?> ><?php echo $city_row['CityName'];?>  </option>
								
								<?php }?>
								</select>
                              </div>
                            </div>
							<div class="form-group">
                              <label class="col-sm-2 control-label">Home Phone</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Home_No" placeholder="0423-0000000" value="<?php echo $row['Home_No'];?>">
                              </div>
                              <label class="col-sm-3 control-label">Postal Address</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Postal_Address" placeholder="Postal Address" value="<?php echo $row['Postal_Address'];?>">
                              </div>
                            </div>
							<div class="form-group">
                              <label class="col-sm-2 control-label"></label>
                              <div class="col-sm-6 controls"></div>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Pos_Add_Cityid" id="Pos_Add_Cityid">
								
								<?php $city=mysql_query("Select * from tblcities order by Cityid");
								
								while($city_row=mysql_fetch_array($city)){ ?>
								
								<option value="<?php echo $city_row['Cityid'];?>" <?php if($city_row['Cityid']==$row['Cityid']){echo "selected='selected'";}?>><?php echo $city_row['CityName'];?>  </option>
								
								<?php }?>
								
								</select>
                              </div>
                            </div>
                          </div>
						  
						  <!-- Contact Details Start -->
						  
						  <!-- Medical Details Start -->
						  
						  <div class="tab-pane" id="tab26">
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Provide Employee's Medical Details
								</h3>
							</div>
							
							<br>
							
						   <div class="form-group">
                              <label class="col-sm-2 control-label">Blood Group</label>
                              <div class="col-sm-3 controls">
									<select class="input-border-btm" name="Blood_Type" id="Blood_Type">
									<option> Not Known </option>
									<option value="AB+" <?php if($row['Blood_Type']=='AB+'){echo "selected='selected'";}?>> AB+ </option>
									<option value="AB-" <?php if($row['Blood_Type']=='AB-'){echo "selected='selected'";}?>> AB- </option>
									<option value="A+" <?php if($row['Blood_Type']=='A+'){echo "selected='selected'";}?>> A+ </option>
									<option value="A-" <?php if($row['Blood_Type']=='A-'){echo "selected='selected'";}?>> A- </option>
									<option value="B+" <?php if($row['Blood_Type']=='B+'){echo "selected='selected'";}?>> B+ </option>
									<option value="B-" <?php if($row['Blood_Type']=='B-'){echo "selected='selected'";}?>> B- </option>
									<option value="O+" <?php if($row['Blood_Type']=='O+'){echo "selected='selected'";}?>> O+ </option>
									<option value="O-" <?php if($row['Blood_Type']=='O-'){echo "selected='selected'";}?>> O- </option>
								</select>
                              </div>
                              <label class="col-sm-3 control-label">Doctor's Name</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Doctor_Name" placeholder="Name of the Doctor" value="<?php echo $row['Doctor_Name'];?>">
                              </div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Name of Diseases/s <br> <small>(if any)</small></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Disease" placeholder="Name of the Disease" value="<?php echo $row['Disease'];?>">
                              </div>
                              <label class="col-sm-3 control-label">Doctor's Clinic Address</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Clinic_Address" placeholder="Doctor's Clinic Address" value="<?php echo $row['Clinic_Address'];?>">
                              </div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Physical Limitation</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Physical_Limitation" placeholder="Physical Limitation" value="<?php echo $row['Physical_Limitation'];?>">
                              </div>
                              <label class="col-sm-3 control-label">Medical Details</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Medical_Details" placeholder="Medical Details" value="<?php echo $row['Medical_Details'];?>">
                              </div>
                            </div>
							
							<div class="form-group">
							  <label class="col-sm-2 control-label">Doctor's Contact No.</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Doctor_Contact_No" placeholder="0300-0000000" value="<?php echo $row['Doctor_Contact_No'];?>">
                              </div>
                            </div>
							
							<br><hr>
							
							 <div class="panel-heading">
								<h3 style="color:black;">
								Emergency Contact Details
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Contact Name</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Emergency_Contact_Name" id="Emergency_Contact_Name" placeholder="Name">
                              </div>
							  <label class="col-sm-3 control-label">Contact Relation</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Emergency_Relationid" id="Emergency_Relationid">
								
								<?php $relation=mysql_query("Select * from tblrelation order by Relationid");
								
								while($relation_row=mysql_fetch_array($relation)){ ?>
								
								<option value="<?php echo $relation_row['Relationid'];?>"><?php echo $relation_row['RelationName'];?>  </option>
								
								<?php }?>
								
								</select>
                              </div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Contact Phone No</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Emergency_Contact_No" id="Emergency_Contact_No" placeholder="0300-0000000">
                              </div>
                              <label class="col-sm-3 control-label">Contact Email</label>
                              <div class="col-sm-3 controls">
                                <input type="email" class="input-border-btm" name="Emergency_Contact_Email" id="Emergency_Contact_Email" placeholder="example@gmail.com">
                              </div>
                            </div>
							
							<div class="form-group">
							<label class="col-sm-2 control-label">Contact Address</label>
                              <div class="col-sm-9 controls">
                                <input type="text" class="input-border-btm" name="Emergency_Contact_Address" id="Emergency_Contact_Address" placeholder="Address">
                              </div>
                              
                            </div>
							
							
							<div class="form-group">  
                              <div class="col-sm-3 col-sm-offset-5 controls">
                                <input type="button" class="btn btn-success" onClick="add_medical();" value="Add">
                              </div>
                            </div>
							
							<br>
							
							<div class="row" >
							  <div class="col-md-12">
								<div class="panel widget">
								  <div class="panel-body table-responsive">
									<table class="table table-hover">
									  <thead>
										<tr>
										  <th>Name</th>
										  <th>Relation</th>
										  <th>Contant No</th>
										  <th>Email</th>
										  <th>Address</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody id="Medical">
									  
										<?php 
										   $Medical= mysql_query("SELECT * From tblemergencydetails where Userid='".$_GET['Userid']."'");
										   while($row_medical = mysql_fetch_array($Medical)){
											   
										  $Relation= mysql_query("SELECT RelationName FROM tblrelation where Relationid= '".$row_medical['Emergency_Relationid']."'");
										   while($row_relation = mysql_fetch_array($Relation)){
										?>			
											<tr>
												<td><?php echo $row_medical['Emergency_Contact_Name'];?></td>
												<td><?php echo $row_relation['RelationName'];?></td>
												<td><?php echo $row_medical['Emergency_Contact_No'];?></td>
												<td><?php echo $row_medical['Emergency_Contact_Email'];?></td>
												<td><?php echo $row_medical['Emergency_Contact_Address'];?></td>
												<td class="menu-action">
												  <a data-original-title="Delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red" onClick="delete_medical(<?php echo $row_medical['ECid']; ?>);"> <i class="fa fa-times"></i></a>
												</td>
											</tr>
											
											<?php
											}
										   }
											?>
										
									  </tbody>
									</table>
								  </div>
								</div>
								<!-- Panel Widget --> 
							  </div>
							  <!-- col-md-12 --> 
							</div>
							<!-- row -->
							
                          </div>
						  
						  <!-- Medical Details End -->
						  
						  <!-- Qualification Details Start -->
						  
						  <div class="tab-pane" id="tab27">
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Provide Employee's Qualification Details
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Degree Title</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Degreeid" id="Degreeid">
								
								<?php $degree=mysql_query("Select * from tbldegree order by DegreeName");
								
								while($degree_row=mysql_fetch_array($degree)){ ?>
								
								<option value="<?php echo $degree_row['Degreeid'];?>"><?php echo $degree_row['DegreeName'];?>  </option>
								
								<?php }?>
								
								</select>
                              </div>
                              <label class="col-sm-3 control-label">Grade <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Grade" id="Grade" placeholder="Grade">
                              </div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">University</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Uniid" id="Uniid">
								
								<?php $university=mysql_query("Select * from tbluniversity order by Uniid");
								
								while($university_row=mysql_fetch_array($university)){ ?>
								
								<option value="<?php echo $university_row['Uniid'];?>"><?php echo $university_row['UniName'];?>  </option>
								
								<?php }?>
								
								</select>
                              </div>
                              <label class="col-sm-3 control-label">Duration <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Degree_Duration" id="Degree_Duration" placeholder="Degree Duration">
                              </div>
                            </div>
							<div class="form-group">
                              <label class="col-sm-2 control-label">Specialization</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Specialization" id="Specialization" placeholder="Specialization">
                              </div>
                              <label class="col-sm-3 control-label">Completion Year</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Degree_Completion_Year" id="Degree_Completion_Year" placeholder="Degree Completion Year">
                              </div>
                            </div>
							
							<div class="form-group">  
                              <div class="col-sm-3 col-sm-offset-5 controls">
                                <input type="button" class="btn btn-success" onClick="add_degree();" value="Add">
                              </div>
                            </div>
							
							<br>
							
							<div class="row" >
							  <div class="col-md-12">
								<div class="panel widget">
								  <div class="panel-body table-responsive">
									<table class="table table-hover">
									  <thead>
										<tr>
										  <th>Degree</th>
										  <th>Grade</th>
										  <th>University</th>
										  <th>Duration</th>
										  <th>Specialization</th>
										  <th>Completion Year</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody id="Degree">
									  
									  <?php 
										   $Degree= mysql_query("SELECT * FROM tbldegreedetails where Userid='".$_GET['Userid']."'");
										   while($row_Degree = mysql_fetch_array($Degree)){
											   
										  $degre= mysql_query("SELECT DegreeName FROM tbldegree where Degreeid= '".$row_Degree['Degreeid']."'");
										   while($row_degre = mysql_fetch_array($degre)){
											   
											$uni= mysql_query("SELECT UniName FROM tbluniversity where Uniid= '".$row_Degree['Uniid']."'");
										   while($row_uni = mysql_fetch_array($uni)){
											   
										?>			
											<tr>
												<td><?php echo $row_degre['DegreeName'];?></td>
												<td><?php echo $row_Degree['Grade'];?></td>
												<td><?php echo $row_uni['UniName'];?></td>
												<td><?php echo $row_Degree['Degree_Duration'];?></td>
												<td><?php echo $row_Degree['Specialization'];?></td>
												<td><?php echo $row_Degree['Degree_Completion_Year'];?></td>
												<td class="menu-action">
												  <a data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red" onClick="delete_degree(<?php echo $row_Degree['Did']; ?>);"> <i class="fa fa-times"></i></a>
												</td>
											</tr>
											
											<?php
											}
										   }
										  }
											?>
										
									  </tbody>
									</table>
								  </div>
								</div>
								<!-- Panel Widget --> 
							  </div>
							  <!-- col-md-12 --> 
							</div>
							<!-- row -->
							
							<br><hr>
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Tranings/Certifications
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Certificate <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Certificate" id="Certificate" placeholder="Tranings/Certificate">
                              </div>
                              <label class="col-sm-3 control-label">Duration</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Training_Duration" id="Training_Duration" placeholder="Duration">
                              </div>
                            </div>
							<div class="form-group">
                              <label class="col-sm-2 control-label">Institute <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Training_Institute" id="Training_Institute" placeholder="Institute Name">
                              </div>
                              <label class="col-sm-3 control-label">Institution Address</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Institution_Address" id="Institution_Address" placeholder="Institution Address">
                              </div>
                            </div>
							<div class="form-group">
                              <label class="col-sm-2 control-label">Completion Year</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Training_Completion_Year" id="Training_Completion_Year" placeholder="Completion Year">
                              </div>
                            </div>
							
							<div class="form-group">  
                              <div class="col-sm-3 col-sm-offset-5 controls">
                                <input type="button" class="btn btn-success" onClick="add_training();" value="Add">
                              </div>
                            </div>
							
							<br>
							
							<div class="row" >
							  <div class="col-md-12">
								<div class="panel widget">
								  <div class="panel-body table-responsive">
									<table class="table table-hover">
									  <thead>
										<tr>
										  <th>Training/Certificate</th>
										  <th>Duration</th>
										  <th>Institute Name</th>
										  <th>Institute Address</th>
										  <th>Completion Year</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody id="Training">
									  
									  <?php 
									   $Training= mysql_query("SELECT * FROM tbltrainingdetails where Userid='".$_GET['Userid']."'");
									   while($row_Training = mysql_fetch_array($Training)){
										   
									?>			
										<tr>
											<td><?php echo $row_Training['Certificate'];?></td>
											<td><?php echo $row_Training['Training_Duration'];?></td>
											<td><?php echo $row_Training['Training_Institute'];?></td>
											<td><?php echo $row_Training['Institution_Address'];?></td>
											<td><?php echo $row_Training['Training_Completion_Year'];?></td>
											<td class="menu-action">
											  <a data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red" onClick="delete_training(<?php echo $row_Training['Tid']; ?>);"> <i class="fa fa-times"></i></a>
											</td>
										</tr>
										
										<?php
										}
										?>
										
									  </tbody>
									</table>
								  </div>
								</div>
								<!-- Panel Widget --> 
							  </div>
							  <!-- col-md-12 --> 
							</div>
							<!-- row -->
							
							<br><hr>
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Add Skill
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Skill</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Skill" id="Skill" placeholder="Skill">
                              </div>
								<label class="col-sm-3 control-label">Rate (out of 100)</label>
								  <div class="col-sm-2 controls">
									<input type="text" class="input-border-btm width-40" name="Skill_Rate" id="Skill_Rate" placeholder="00" value="0">
								  </div>
							</div>
							
							<div class="form-group">  
                              <div class="col-sm-3 col-sm-offset-5 controls">
                                <input type="button" class="btn btn-success" onClick="add_skill();" value="Add">
                              </div>
                            </div>
							
							<br>
							
							<div class="row" >
							  <div class="col-md-12">
								<div class="panel widget">
								  <div class="panel-body table-responsive">
									<table class="table table-hover">
									  <thead>
										<tr>
										  <th>Skill</th>
										  <th>Skill Rate</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody id="Skills">
									  
										<?php 
										   $Skill= mysql_query("SELECT * FROM tblskilldetails where Userid='".$_GET['Userid']."'");
										   while($row_Skill = mysql_fetch_array($Skill)){
										?>			
											<tr>
												<td><?php echo $row_Skill['Skill'];?></td>
												<td><?php echo $row_Skill['Skill_Rate'];?></td>
												<td class="menu-action">
												  <a data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red" onClick="delete_skill(<?php echo $row_Skill['Sid']; ?>);"> <i class="fa fa-times"></i></a>
												</td>
											</tr>
											
											<?php
											}
											?>
			
									  </tbody>
									</table>
								  </div>
								</div>
								<!-- Panel Widget --> 
							  </div>
							  <!-- col-md-12 --> 
							</div>
							<!-- row -->
							
							<br><hr>
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Memberships
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Membership Title <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Membership_Title" id="Membership_Title" placeholder="Membership Title">
                              </div>
							  <label class="col-sm-3 control-label">Last Renewed</label>
                              <div class="col-sm-3 controls">
								  <div class="input-group">
									<input type="text" class="input-border-btm" placeholder="Last Renewed Membership" id="Last_Renewed_Membership" name="Last_Renewed_Membership" value="<?php echo date('Y-m-d')?>">
									<span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#Last_Renewed_Membership"><i class="fa fa-calendar"></i></span> </div>
								</div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Name Of Organization <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Organization_Name" id="Organization_Name" placeholder="Organization Name">
                              </div>
							  <label class="col-sm-3 control-label">Registration No.</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Membership_Registration_No" id="Membership_Registration_No" placeholder="Membership Registration No.">
                              </div>
                            </div>
							
							<div class="form-group">
							<label class="col-sm-2 control-label"> Validity <span class="required r">*</span></label>
                                <div class="col-sm-3 controls">
								  <div class="input-group">
									<input type="text" class="input-border-btm" placeholder="Membership Validity" id="Membership_Validity" name="Membership_Validity" value="<?php echo date('Y-m-d')?>">
									<span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#Membership_Validity"><i class="fa fa-calendar"></i></span>
								  </div>
								</div>
							  <label class="col-sm-3 control-label"> Subscription Amount <br> <small>(Rupees)</small> </label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Amount_Subscription" id="Amount_Subscription" placeholder="Subscription Amount" value="0">
                              </div>
                            </div>
							
							<div class="form-group">
							  <label class="col-sm-2 control-label">Paid By</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Paid_By" id="Paid_By">
									<option value="Individual">Individual</option>
									<option value="Institution">Institution</option>
									<option value="Third Party">Third Party</option>
								</select>
                              </div>
							  <label class="col-sm-3 control-label">Membership Since</label>
                              <div class="col-sm-3 controls">
								  <div class="input-group">
									<input type="text" class="input-border-btm" placeholder="Membership Since" id="Membership_Since" name="Membership_Since" value="<?php echo date('Y-m-d')?>">
									<span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#Membership_Since"><i class="fa fa-calendar"></i></span> </div>
                              </div>
                            </div>
							
							<div class="form-group">  
                              <div class="col-sm-3 col-sm-offset-5 controls">
                                <input type="button" class="btn btn-success" onClick="add_membership();" value="Add">
                              </div>
                            </div>
							
							<br>
							
							<div class="row" >
							  <div class="col-md-12">
								<div class="panel widget">
								  <div class="panel-body table-responsive">
									<table class="table table-hover">
									  <thead>
										<tr>
										  <th>Title</th>
										  <th>Renewed Date</th>
										  <th>Organization Name</th>
										  <th>Registration No.</th>
										  <th>Validity Date</th>
										  <th>Subscription Amount</th>
										  <th>Paid By</th>
										  <th>Membership Since</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody id="Membership">
									  
										<?php 
										   $Membership= mysql_query("SELECT * FROM tblmembershipdetails where Userid='".$_GET['Userid']."'");
										   while($row_Membership = mysql_fetch_array($Membership)){
										?>			
											<tr>
												<td><?php echo $row_Membership['Membership_Title'];?></td>
												<td><?php echo $row_Membership['Last_Renewed_Membership'];?></td>
												<td><?php echo $row_Membership['Organization_Name'];?></td>
												<td><?php echo $row_Membership['Membership_Registration_No'];?></td>
												<td><?php echo $row_Membership['Membership_Validity'];?></td>
												<td><?php echo $row_Membership['Amount_Subscription'];?></td>
												<td><?php echo $row_Membership['Paid_By'];?></td>
												<td><?php echo $row_Membership['Membership_Since'];?></td>
												<td class="menu-action">
												  <a data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red" onClick="delete_membership(<?php echo $row_Membership['MSid']; ?>);"> <i class="fa fa-times"></i></a>
												</td>
											</tr>
											
											<?php
											}
											?>
			
									  </tbody>
									</table>
								  </div>
								</div>
								<!-- Panel Widget --> 
							  </div>
							  <!-- col-md-12 --> 
							</div>
							<!-- row -->
							
							<br><hr>
							
							<div class="panel-heading">
								<h3 style="color:black;">
								License
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">License Title <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="License_Title" id="License_Title" placeholder="License Title">
                              </div>
							  <label class="col-sm-3 control-label">Last Renewed</label>
                                <div class="col-sm-3 controls">
								  <div class="input-group">
									<input type="text" class="input-border-btm" placeholder="Last Renewed License" id="Last_Renewed_License" name="Last_Renewed_License" value="<?php echo date('Y-m-d')?>">
									<span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#Last_Renewed_License"><i class="fa fa-calendar"></i></span> </div>
								</div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Issueing Organization <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Issueing_Organization" id="Issueing_Organization" placeholder="License Issueing Organization Name">
                              </div>
							  <label class="col-sm-3 control-label">Registration No.</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="License_Registration_No" id="License_Registration_No" placeholder="License Registration No">
                              </div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label"> Validity <span class="required r">*</span></label>
                                <div class="col-sm-3 controls">
								  <div class="input-group">
									<input type="text" class="input-border-btm" placeholder="License Validity" id="License_Validity" name="License_Validity" value="<?php echo date('Y-m-d')?>">
									<span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#License_Validity"><i class="fa fa-calendar"></i></span> </div>
								</div>
                            </div>
							
							<div class="form-group">  
                              <div class="col-sm-3 col-sm-offset-5 controls">
                                <input type="button" class="btn btn-success" onClick="add_license();" value="Add">
                              </div>
                            </div>
							
							<br>
							
							<div class="row" >
							  <div class="col-md-12">
								<div class="panel widget">
								  <div class="panel-body table-responsive">
									<table class="table table-hover">
									  <thead>
										<tr>
										  <th>Title</th>
										  <th>Renewed Date</th>
										  <th>Organization Name</th>
										  <th>Registration No.</th>
										  <th>Validity</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody id="License">
										
										<?php 
										   $License= mysql_query("SELECT * FROM tbllicensedetails where Userid='".$_GET['Userid']."'");
										   while($row_License = mysql_fetch_array($License)){
										?>			
											<tr>
												<td><?php echo $row_License['License_Title'];?></td>
												<td><?php echo $row_License['Last_Renewed_License'];?></td>
												<td><?php echo $row_License['Issueing_Organization'];?></td>
												<td><?php echo $row_License['License_Registration_No'];?></td>
												<td><?php echo $row_License['License_Validity'];?></td>
												<td class="menu-action">
												  <a data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red" onClick="delete_license(<?php echo $row_License['Lid']; ?>);"> <i class="fa fa-times"></i></a>
												</td>
											</tr>
											
											<?php
											}
											?>
										
									  </tbody>
									</table>
								  </div>
								</div>
								<!-- Panel Widget --> 
							  </div>
							  <!-- col-md-12 --> 
							</div>
							<!-- row -->
							
							
                          </div>
						  
						  <!-- Qualification Details End -->
						  
						  <!-- Work Experience Details Start -->
						  
						  <div class="tab-pane" id="tab28">
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Provide The Employee's Work Experience
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Company/Institution</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Company_Name" id="Company_Name" placeholder="Company Name">
                              </div>
							  <label class="col-sm-3 control-label">Nature of Business <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Business_Nature" id="Business_Nature" placeholder="Nature of Business">
                              </div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Location of Company</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Company_Location" id="Company_Location" placeholder="Company Location">
                              </div>
							  <label class="col-sm-3 control-label">Company Contact No <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Company_Contact_No" id="Company_Contact_No" placeholder="Contact No">
                              </div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Designation</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Designation" id="Designation" placeholder="Designation in Company">
                              </div>
							  <label class="col-sm-3 control-label">Last Salary <br><small>(rupees)</small> <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Last_Salary" id="Last_Salary" placeholder="Previous Salary" value="0">
                              </div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Date From <span class="required r">*</span></label>
								<div class="col-sm-3 controls">
								  <div class="input-group">
									<input type="text" class="input-border-btm" placeholder="Work Date From" id="Work_Date_From" name="Work_Date_From" value="<?php echo date('Y-m-d')?>">
									<span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#Work_Date_From"><i class="fa fa-calendar"></i></span> </div>
								</div>
							  <label class="col-sm-3 control-label">Date To <span class="required r">*</span></label>
								<div class="col-sm-3 controls">
								  <div class="input-group">
									<input type="text" class="input-border-btm" placeholder="Work Date To" id="Work_Date_To" name="Work_Date_To" value="<?php echo date('Y-m-d')?>">
									<span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#Work_Date_To"><i class="fa fa-calendar"></i></span> </div>
								</div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Reason of Leaving <span class="required r">*</span></label>
                              <div class="col-sm-9 controls">
                                <input type="text" class="input-border-btm" name="Reason_of_Leaving" id="Reason_of_Leaving" placeholder="Reason of Leaving">
                              </div>
                            </div>
							
							<div class="form-group">  
                              <div class="col-sm-3 col-sm-offset-5 controls">
                                <input type="button" class="btn btn-success" onClick="add_experience();" value="Add">
                              </div>
                            </div>
							
							<br> 
							
							<div class="row" >
							  <div class="col-md-12">
								<div class="panel widget">
								  <div class="panel-body table-responsive">
									<table class="table table-hover" >
									  <thead>
										<tr>
										  <th>Company Name</th>
										  <th>Nature of Work</th>
										  <th>Location</th>
										  <th>Contact No</th>
										  <th>Designation</th>
										  <th>Last Salary</th>
										  <th>Date From</th>
										  <th>Date To</th>
										  <th>Leaving Reason</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody id="Experience">
										
										<?php 
										   $Experience= mysql_query("SELECT * FROM tblworkexperiencedetails where Userid='".$_GET['Userid']."'");
										   while($row_experience = mysql_fetch_array($Experience)){
										?>			
											<tr>
												<td><?php echo $row_experience['Company_Name'];?></td>
												<td><?php echo $row_experience['Business_Nature'];?></td>
												<td><?php echo $row_experience['Company_Location'];?></td>
												<td><?php echo $row_experience['Company_Contact_No'];?></td>
												<td><?php echo $row_experience['Designation'];?></td>
												<td><?php echo $row_experience['Last_Salary'];?></td>
												<td><?php echo $row_experience['Work_Date_From'];?></td>
												<td><?php echo $row_experience['Work_Date_To'];?></td>
												<td><?php echo $row_experience['Reason_of_Leaving'];?></td>
												<td class="menu-action">
												  <a data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red" onClick="delete_experience(<?php echo $row_experience['WEid']; ?>);"> <i class="fa fa-times"></i></a>
												</td>
											</tr>
											
											<?php
											}
											?>
								
										
									  </tbody>
									</table>
								  </div>
								</div>
								<!-- Panel Widget --> 
							  </div>
							  <!-- col-md-12 --> 
							</div>
							<!-- row -->
							
                          </div>
						  
						  <!-- Work Experience Details End -->
						  
						  <!-- Reference Details Start -->
						  
						  <div class="tab-pane" id="tab29">
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Provide Employee's Reference Details
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
							  <label class="col-sm-2 control-label">Company</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Reference_Company_Name" id="Reference_Company_Name" placeholder="Company Name">
                              </div>
                              <label class="col-sm-3 control-label">Contact Name</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Reference_Name" id="Reference_Name" placeholder="Name">
                              </div>
							  
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Contact Relation</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Refid" id="Refid">
								
								<?php $Ref=mysql_query("Select * from tblreference order by Refid");
								
								while($Ref_row=mysql_fetch_array($Ref)){ ?>
								
								<option value="<?php echo $Ref_row['Refid'];?>"><?php echo $Ref_row['ReferenceRelation'];?>  </option>
								
								<?php }?>
								
								</select>
                              </div>
							  <label class="col-sm-3 control-label">Reference Type</label>
                              <div class="col-sm-3 controls">
                                <select class="input-border-btm" name="Reference_Type" id="Reference_Type">
									<option value="Personal">Personal</option>
									<option value="Professional">Professional</option>
								</select>
                              </div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Job Title</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Reference_Job_Title" id="Reference_Job_Title" placeholder="Job Title">
                              </div>
							  <label class="col-sm-3 control-label">Contact Phone</label>
                              <div class="col-sm-3 controls">
                                <input type="text" class="input-border-btm" name="Reference_Contact_No" id="Reference_Contact_No" placeholder="0300-0000000">
                              </div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label">Contact Address</label>
                              <div class="col-sm-9 controls">
                                <input type="text" class="input-border-btm" name="Reference_Address" id="Reference_Address" placeholder="Address">
                              </div>
                            </div>
							
							<div class="form-group">  
                              <div class="col-sm-3 col-sm-offset-5 controls">
                                <input type="button" class="btn btn-success" onClick="add_reference();" value="Add">
                              </div>
                            </div>
							
							<br> 
							
							<div class="row" >
							  <div class="col-md-12">
								<div class="panel widget">
								  <div class="panel-body table-responsive">
									<table class="table table-hover" >
									  <thead>
										<tr>
										  <th>Company Name</th>
										  <th>Name</th>
										  <th>Relation</th>
										  <th>Type</th>
										  <th>Job Title</th>
										  <th>Contact No</th>
										  <th>Address</th>
										  <th>Action</th>
										</tr>
									  </thead>
									  <tbody id="Reference">
									  
										<?php 
										   $Reference= mysql_query("SELECT * FROM tblreferencedetails where Userid='".$_GET['Userid']."'");
										   while($row_reference = mysql_fetch_array($Reference)){
											   
										  $Refer= mysql_query("SELECT ReferenceRelation FROM tblreference where Refid= '".$row_reference['Refid']."'");
										   while($row_refer = mysql_fetch_array($Refer)){
										?>			
											<tr>
												<td><?php echo $row_reference['Reference_Company_Name'];?></td>
												<td><?php echo $row_reference['Reference_Name'];?></td>
												<td><?php echo $row_refer['ReferenceRelation'];?></td>
												<td><?php echo $row_reference['Reference_Type'];?></td>
												<td><?php echo $row_reference['Reference_Job_Title'];?></td>
												<td><?php echo $row_reference['Reference_Contact_No'];?></td>
												<td><?php echo $row_reference['Reference_Address'];?></td>
												<td class="menu-action">
												  <a data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red" onClick="delete_reference(<?php echo $row_reference['Rid']; ?>);"> <i class="fa fa-times"></i></a>
												</td>
											</tr>
											
											<?php
											}
										   }
											?>
										
									  </tbody>
									</table>
								  </div>
								</div>
								<!-- Panel Widget --> 
							  </div>
							  <!-- col-md-12 --> 
							</div>
							<!-- row -->
							
                          </div>
						  
						  <!-- Reference Details End -->
						  
						  <!-- Documents Details Start -->
						  
						  <div class="tab-pane" id="tab30">
							
							<div class="panel-heading">
								<h3 style="color:black;">
								Provide Employee's Documents Details
								</h3>
							</div>
							
							<br>
							
							<div class="form-group">
							  <label class="col-sm-2 control-label"> CV/Resume <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="file" name="E_Resume" id="E_Resume" value="<?php echo $row['E_Resume'];?>">
                                <input type="hidden" name="Edit_E_Resume" id="Edit_E_Resume" value="<?php echo $row['E_Resume'];?>">
								<br>
								<a class="btn btn-primary" href="uploads/resumes/<?php echo $row['E_Resume'];?>" target="_blank"> View Resume </a>
                              </div>
							  <label class="col-sm-3 control-label"> Offer Letter <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="file" name="E_Offer_Letter" id="E_Offer_Letter" value="<?php echo $row['E_Offer_Letter'];?>">
                                <input type="hidden" name="Edit_E_Offer_Letter" id="Edit_E_Offer_Letter" value="<?php echo $row['E_Offer_Letter'];?>">
								<br>
								<a class="btn btn-primary"href="uploads/offer_letters/<?php echo $row['E_Offer_Letter'];?>" target="_blank"> View Offer Letter</a>
                              </div>
                            </div>
							
							<div class="form-group">
                              <label class="col-sm-2 control-label"> Joining Letter <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="file" name="E_Joining_Letter" id="E_Joining_Letter" value="<?php echo $row['E_Joining_Letter'];?>">
                                <input type="hidden" name="Edit_E_Joining_Letter" id="Edit_E_Joining_Letter" value="<?php echo $row['E_Joining_Letter'];?>">
								<br>
								<a class="btn btn-primary" href="uploads/joining_letters/<?php echo $row['E_Joining_Letter'];?>" target="_blank">View Joining Letter</a>
                              </div>
							  <label class="col-sm-3 control-label"> Contract/Agreement Letter <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="file" name="E_A_Letter" id="E_A_Letter" value="<?php echo $row['E_A_Letter'];?>">
                                <input type="hidden" name="Edit_E_A_Letter" id="Edit_E_A_Letter" value="<?php echo $row['E_A_Letter'];?>">
								<br>
								<a class="btn btn-primary" href="uploads/agreements/<?php echo $row['E_A_Letter'];?>" target="_blank">View Agreement Letter </a>
                              </div>
                            </div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label"> ID Proof <span class="required r">*</span></label>
                              <div class="col-sm-3 controls">
                                <input type="file" name="E_ID_Proof" id="E_ID_Proof" value="<?php echo $row['E_ID_Proof'];?>">
                                <input type="hidden" name="Edit_E_ID_Proof" id="Edit_E_ID_Proof" value="<?php echo $row['E_ID_Proof'];?>">
								<br>
								<a class="btn btn-primary" href="uploads/id_proof/<?php echo $row['E_ID_Proof'];?>" target="_blank">View ID Proof</a>
                              </div>
							  <label class="col-sm-3 control-label">Submission Date</label>
								<div class="col-sm-3 controls">
								  <div class="input-group">
									<input type="text" class="input-border-btm" placeholder="Submission Date" id="Doc_Submission_Date" name="Doc_Submission_Date" value="<?php if($row['Doc_Submission_Date']==""){ echo "0000-00-00"; }else{ echo $row['Doc_Submission_Date'];} ?>">
									<span class="input-group-addon" id="datepicker-icon-trigger" data-datepicker="#Doc_Submission_Date"><i class="fa fa-calendar"></i></span> 
								  </div>
								</div>
                            </div>
                          </div>
						  
						  <!-- Documents End -->
						  
                          <div class="form-actions-condensed wizard">
                            <div class="row mgbt-xs-0">
                              <div class="col-sm-9 col-sm-offset-2"> 
								  <a class="btn vd_btn prev" style="float:left;" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-left"></i></span> Previous</a> 
								  <a class="btn vd_btn next" style="float:right;" href="javascript:void(0);"> Next <span class="menu-icon"><i class="fa fa-fw fa-chevron-circle-right"></i></span></a> 
								  <button type="submit" class="btn vd_btn vd_bg-green finish" style="float:right;" href="javascript:void(0);"><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Finish</button> 
							  </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Panel Widget --> 
              </div>
              <!-- col-md-12 --> 
            </div>
            <!-- row -->
          </div>
          <!-- .vd_content-section --> 
        </div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 
    </div>
    <!-- .vd_content-wrapper --> 
    
    <!-- Middle Content End --> 
    
	<?php include('include/right-sidebar.php');?>
	
  </div>
  <!-- .container --> 
</div>
<!-- .content -->

<!-- Footer Start -->
 <?php include('include/footer.php');?>
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

<script type="text/javascript" src='plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js'></script>

	
<script>
		
$( ".slider-range-min" ).slider({
		range: "min",
		value: 0,
		min: 0,
		max: 100,
		slide: function( event, ui ) {
		$( ".slider-range-min-amount" ).val( "" + ui.value );
		}
	});
	$( ".slider-range-min-amount" ).val( "" + $( ".slider-range-min" ).slider( "value" ) );
	
	

$( "#Date_Of_Joining" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#Confirmation_Date" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#Probation_Start" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#Probation_End" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#Increment_Date" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#Date_Of_Birth" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#Family_Date" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#Last_Renewed_Membership" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#Membership_Validity" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#Membership_Since" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#Last_Renewed_License" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#License_Validity" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#Work_Date_From" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#Work_Date_To" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#Doc_Submission_Date" ).datepicker({ dateFormat: 'yy-mm-dd'});

	$( '[data-datepicker]' ).click(function(e){ 
		var data=$(this).data('datepicker');
		$(data).focus();
	});
</script>


<script type="text/javascript">
$(document).ready(function() {
	"use strict";
	
	$('#wizard-1').bootstrapWizard({
		'tabClass': 'nav nav-pills nav-justified',
		'nextSelector': '.wizard .next',
		'previousSelector': '.wizard .prev',
		'onTabShow' : function(){
			$('#wizard-1 .finish').hide();
			$('#wizard-1 .next').show();
			if ($('#wizard-1 .nav li:last-child').hasClass('active')){
				$('#wizard-1 .next').hide();
				$('#wizard-1 .finish').show();
			}
		},
		'onNext': function(){
			scrollTo('#wizard-1',-100);
		},
		'onPrevious': function(){
			scrollTo('#wizard-1',-100);
		}	
	});
	$('#wizard-2').bootstrapWizard({
		'tabClass': 'nav nav-pills nav-justified',
		'nextSelector': '.wizard .next',
		'previousSelector': '.wizard .prev',
		'onTabShow' :  function(tab, navigation, index){
			$('#wizard-2 .finish').hide();
			$('#wizard-2 .next').show();
			if ($('#wizard-2 .nav li:last-child').hasClass('active')){
				$('#wizard-2 .next').hide();
				$('#wizard-2 .finish').show();
			}
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#wizard-2').find('.progress-bar').css({width:$percent+'%'});			
		},
		'onTabClick': function(tab, navigation, index) {
			return true;
		},
		'onNext': function(){
			scrollTo('#wizard-2',-100);
		},
		'onPrevious': function(){
			scrollTo('#wizard-2',-100);
		}		
	});	

	$('#wizard-3').bootstrapWizard({
		'tabClass': 'nav nav-pills nav-justified',
		'nextSelector': '.wizard .next',
		'previousSelector': '.wizard .prev',
		'onTabShow' : function(){
			$('#wizard-3 .finish').hide();
			$('#wizard-3 .next').show();
			if ($('#wizard-3 .nav li:last-child').hasClass('active')){
				$('#wizard-3 .next').hide();
				$('#wizard-3 .finish').show();
			}
		},
		'onNext': function(){
			scrollTo('#wizard-3',-100);
		},
		'onPrevious': function(){
			scrollTo('#wizard-3',-100);
		}		
	});	
	$('#wizard-4').bootstrapWizard({
		'tabClass': 'nav nav-tabs nav-stacked',
		'nextSelector': '.wizard .next',
		'previousSelector': '.wizard .prev',
		'onTabShow' : function(){
			$('#wizard-4 .finish').hide();
			$('#wizard-4 .next').show();
			if ($('#wizard-4 .nav li:last-child').hasClass('active')){
				$('#wizard-4 .next').hide();
				$('#wizard-4 .finish').show();
			}
		},
		'onNext': function(){
			scrollTo('#wizard-4',-100);
		},
		'onPrevious': function(){
			scrollTo('#wizard-4',-100);
		}		
	});		
	$('#wizard-5').bootstrapWizard({
		'tabClass': 'nav nav-tabs nav-stacked',
		'nextSelector': '.wizard .next',
		'previousSelector': '.wizard .prev',
		'onTabShow' : function(){
			$('#wizard-5 .finish').hide();
			$('#wizard-5 .next').show();
			if ($('#wizard-5 .nav li:last-child').hasClass('active')){
				$('#wizard-5 .next').hide();
				$('#wizard-5 .finish').show();
			}
		},
		'onNext': function(){
			scrollTo('#wizard-5',-100);
		},
		'onPrevious': function(){
			scrollTo('#wizard-5',-100);
		}		
	});		
});
</script>
<!-- Specific Page Scripts END -->


<script>

    function add(){
	
		var Flag = "Edit";
		var Userid = document.getElementById("Userid").value;
        var Facilityid = document.getElementById("Facilityid").value;
        var Facility_Description = document.getElementById("Facility_Description").value;

		$.post("controllars/employees.php",{FLAG:Flag,USERID:Userid,FACILITYID:Facilityid,FACILITY_DESCRIPTION:Facility_Description,GET_HTML:'Facility'},function(data){
		                document.getElementById("Facility").innerHtml=$("#Facility").html(data);
	        });
		}
				
	function delete_facility(Fid){
		
	    	    $.post("controllars/employees.php",{FID:Fid,DELETE:'Facility'},function(data){
		                document.getElementById("Facility").innerHtml=$("#Facility").html(data);
	            });
    }
	
	function add_spouse(){
		
		var Flag = "Edit";
		var Userid = document.getElementById("Userid").value;
        var Spouse_Name = document.getElementById("Spouse_Name").value;
		
		$.post("controllars/employees.php",{FLAG:Flag,USERID:Userid,SPOUSE_NAME:Spouse_Name,GET_HTML:'Spouse'},function(data){
		document.getElementById("Spouse").innerHtml=$("#Spouse").html(data);

	        });
		}
				
	function delete_spouse(SPid){
		
	    	    $.post("controllars/employees.php",{SPID:SPid,DELETE:'Spouse'},function(data){
		                document.getElementById("Spouse").innerHtml=$("#Spouse").html(data);
	            });
    }

	function add_family(){
		
		var Flag = "Edit";
		var Userid = document.getElementById("Userid").value;
        var Dependant_Name = document.getElementById("Dependant_Name").value;
        var Relationid = document.getElementById("Relationid").value;
        var Dependant_CNIC = document.getElementById("Dependant_CNIC").value;
        var Dependant_Contact_No = document.getElementById("Dependant_Contact_No").value;
        var Dependant_Address = document.getElementById("Dependant_Address").value;
		
		$.post("controllars/employees.php",{FLAG:Flag,USERID:Userid,DEPENDANT_NAME:Dependant_Name,RELATIONID:Relationid,DEPENDANT_CNIC:Dependant_CNIC,DEPENDANT_CONTACT_NO:Dependant_Contact_No,DEPENDANT_ADDRESS:Dependant_Address,GET_HTML:'Family'},function(data){
		document.getElementById("Family").innerHtml=$("#Family").html(data);
	            });
    }
	
	function delete_family(Familyid){
		
	    	    $.post("controllars/employees.php",{FAMILYID:Familyid,DELETE:'Family'},function(data){
		                document.getElementById("Family").innerHtml=$("#Family").html(data);
	            });
    }
	
	
	function add_increment(){
		
		var Flag = "Edit";
		var Userid = document.getElementById("Userid").value;
        var STid = document.getElementById("STid").value;
        var Increment_Amount = document.getElementById("Increment_Amount").value;
        var Increment_Date = document.getElementById("Increment_Date").value;
		
		$.post("controllars/employees.php",{FLAG:Flag,USERID:Userid,STID:STid,INCREMENT_AMOUNT:Increment_Amount,INCREMENT_DATE:Increment_Date,GET_HTML:'Increment'},function(data){
		                document.getElementById("Increment").innerHtml=$("#Increment").html(data);
	            });
    }

	function delete_increment(Iid){
		
	    	    $.post("controllars/employees.php",{IID:Iid,DELETE:'Increment'},function(data){
		                document.getElementById("Increment").innerHtml=$("#Increment").html(data);
	            });
    }
	
	
	function add_medical(){
		
		var Flag = "Edit";
		var Userid = document.getElementById("Userid").value;
        var Emergency_Contact_Name = document.getElementById("Emergency_Contact_Name").value;
        var Emergency_Relationid = document.getElementById("Emergency_Relationid").value;
        var Emergency_Contact_No = document.getElementById("Emergency_Contact_No").value;
        var Emergency_Contact_Email = document.getElementById("Emergency_Contact_Email").value;
        var Emergency_Contact_Address = document.getElementById("Emergency_Contact_Address").value;
		
		$.post("controllars/employees.php",{FLAG:Flag,USERID:Userid,EMERGENCY_CONTACT_NAME:Emergency_Contact_Name,EMERGENCY_RELATIONID:Emergency_Relationid,EMERGENCY_CONTACT_NO:Emergency_Contact_No,EMERGENCY_CONTACT_EMAIL:Emergency_Contact_Email,EMERGENCY_CONTACT_ADDRESS:Emergency_Contact_Address,GET_HTML:'Medical'},function(data){
		                document.getElementById("Medical").innerHtml=$("#Medical").html(data);
	            });
    }
	
	function delete_medical(ECid){
		
	    	    $.post("controllars/employees.php",{ECID:ECid,DELETE:'Medical'},function(data){
		                document.getElementById("Medical").innerHtml=$("#Medical").html(data);
	            });
    }
	
	function add_degree(){
		
		var Flag = "Edit";
		var Userid = document.getElementById("Userid").value;
        var Degreeid = document.getElementById("Degreeid").value;
        var Grade = document.getElementById("Grade").value;
        var Uniid = document.getElementById("Uniid").value;
        var Degree_Duration = document.getElementById("Degree_Duration").value;
        var Specialization = document.getElementById("Specialization").value;
        var Degree_Completion_Year = document.getElementById("Degree_Completion_Year").value;
		
		$.post("controllars/employees.php",{FLAG:Flag,USERID:Userid,DEGREEID:Degreeid,GRADE:Grade,UNIID:Uniid,DEGREE_DURATION:Degree_Duration,SPECIALIZATION:Specialization,DEGREE_COMPLETION_YEAR:Degree_Completion_Year,GET_HTML:'Degree'},function(data){
		                document.getElementById("Degree").innerHtml=$("#Degree").html(data);
	            });
    }
	
	function delete_degree(Did){
		
	    	    $.post("controllars/employees.php",{DID:Did,DELETE:'Degree'},function(data){
		                document.getElementById("Degree").innerHtml=$("#Degree").html(data);
	            });
    }
	
	
	function add_training(){
		
		var Flag = "Edit";
		var Userid = document.getElementById("Userid").value;
        var Certificate = document.getElementById("Certificate").value;
        var Training_Duration = document.getElementById("Training_Duration").value;
        var Training_Institute = document.getElementById("Training_Institute").value;
        var Institution_Address = document.getElementById("Institution_Address").value;
        var Training_Completion_Year = document.getElementById("Training_Completion_Year").value;
		
        $.post("controllars/employees.php",{FLAG:Flag,USERID:Userid,CERTIFICATE:Certificate,TRAINING_DURATION:Training_Duration,TRAINING_INSTITUTE:Training_Institute,INSTITUTION_ADDRESS:Institution_Address,TRAINING_COMPLETION_YEAR:Training_Completion_Year,GET_HTML:'Training'},function(data){
		                document.getElementById("Training").innerHtml=$("#Training").html(data);
	            });
    }

	function delete_training(Tid){
		
	    	    $.post("controllars/employees.php",{TID:Tid,DELETE:'Training'},function(data){
		                document.getElementById("Training").innerHtml=$("#Training").html(data);
	            });
    }
	
	
	function add_skill(){
		
		var Flag = "Edit";
		var Userid = document.getElementById("Userid").value;
        var Skill = document.getElementById("Skill").value;
        var Skill_Rate = document.getElementById("Skill_Rate").value;
		
		$.post("controllars/employees.php",{FLAG:Flag,USERID:Userid,SKILL:Skill,SKILL_RATE:Skill_Rate,GET_HTML:'Skills'},function(data){
		                document.getElementById("Skills").innerHtml=$("#Skills").html(data);
	            });
    }
	
	function delete_skill(Sid){
		
	    	    $.post("controllars/employees.php",{SID:Sid,DELETE:'Skills'},function(data){
		                document.getElementById("Skills").innerHtml=$("#Skills").html(data);
	            });
    }
	
	
	function add_membership(){
		
		var Flag = "Edit";
		var Userid = document.getElementById("Userid").value;
        var Membership_Title = document.getElementById("Membership_Title").value;
        var Last_Renewed_Membership = document.getElementById("Last_Renewed_Membership").value;
        var Organization_Name = document.getElementById("Organization_Name").value;
        var Membership_Registration_No = document.getElementById("Membership_Registration_No").value;
        var Membership_Validity = document.getElementById("Membership_Validity").value;
        var Amount_Subscription = document.getElementById("Amount_Subscription").value;
        var Paid_By = document.getElementById("Paid_By").value;
        var Membership_Since = document.getElementById("Membership_Since").value;
		
		$.post("controllars/employees.php",{FLAG:Flag,USERID:Userid,MEMBERSHIP_TITLE:Membership_Title,LAST_RENEWED_MEMBERSHIP:Last_Renewed_Membership,ORGANIZATION_NAME:Organization_Name,MEMBERSHIP_REGISTRATION_NO:Membership_Registration_No,MEMBERSHIP_VALIDITY:Membership_Validity,AMOUNT_SUBSCRIPTION:Amount_Subscription,PAID_BY:Paid_By,MEMBERSHIP_SINCE:Membership_Since,GET_HTML:'Membership'},function(data){
		                document.getElementById("Membership").innerHtml=$("#Membership").html(data);
	            });
    }
	
	function delete_membership(MSid){
		
	    	    $.post("controllars/employees.php",{MSID:MSid,DELETE:'Membership'},function(data){
		                document.getElementById("Membership").innerHtml=$("#Membership").html(data);
	            });
    }
	
	
	function add_license(){
		
		var Flag = "Edit";
		var Userid = document.getElementById("Userid").value;
        var License_Title = document.getElementById("License_Title").value;
        var Last_Renewed_License = document.getElementById("Last_Renewed_License").value;
        var Issueing_Organization = document.getElementById("Issueing_Organization").value;
        var License_Registration_No = document.getElementById("License_Registration_No").value;
        var License_Validity = document.getElementById("License_Validity").value;
		
        $.post("controllars/employees.php",{FLAG:Flag,USERID:Userid,LICENSE_TITLE:License_Title,LAST_RENEWED_LICENSE:Last_Renewed_License,ISSUEING_ORGANIZATION:Issueing_Organization,LICENSE_REGISTRATION_NO:License_Registration_No,LICENSE_VALIDITY:License_Validity,GET_HTML:'License'},function(data){
		                document.getElementById("License").innerHtml=$("#License").html(data);
	            });
    }

	function delete_license(Lid){
		
	    	    $.post("controllars/employees.php",{LID:Lid,DELETE:'License'},function(data){
		                document.getElementById("License").innerHtml=$("#License").html(data);
	            });
    }
	
	
	function add_experience(){
		
		var Flag = "Edit";
		var Userid = document.getElementById("Userid").value;
        var Company_Name = document.getElementById("Company_Name").value;
        var Business_Nature = document.getElementById("Business_Nature").value;
        var Company_Location = document.getElementById("Company_Location").value;
        var Company_Contact_No = document.getElementById("Company_Contact_No").value;
        var Designation = document.getElementById("Designation").value;
        var Last_Salary = document.getElementById("Last_Salary").value;
        var Work_Date_From = document.getElementById("Work_Date_From").value;
        var Work_Date_To = document.getElementById("Work_Date_To").value;
        var Reason_of_Leaving = document.getElementById("Reason_of_Leaving").value;
		
        $.post("controllars/employees.php",{FLAG:Flag,USERID:Userid,COMPANY_NAME:Company_Name,BUSINESS_NATURE:Business_Nature,COMPANY_LOCATION:Company_Location,COMPANY_CONTACT_NO:Company_Contact_No,DESIGNATION:Designation,LAST_SALARY:Last_Salary,WORK_DATE_FROM:Work_Date_From,WORK_DATE_TO:Work_Date_To,REASON_OF_LEAVING:Reason_of_Leaving,GET_HTML:'Experience'},function(data){
		                document.getElementById("Experience").innerHtml=$("#Experience").html(data);
	            });
    }

	function delete_experience(WEid){
		
	    	    $.post("controllars/employees.php",{WEID:WEid,DELETE:'Experience'},function(data){
		                document.getElementById("Experience").innerHtml=$("#Experience").html(data);
	            });
    }
	
	
	function add_reference(){
		
		var Flag = "Edit";
		var Userid = document.getElementById("Userid").value;
        var Reference_Company_Name = document.getElementById("Reference_Company_Name").value;
        var Reference_Name = document.getElementById("Reference_Name").value;
        var Refid = document.getElementById("Refid").value;
        var Reference_Type = document.getElementById("Reference_Type").value;
        var Reference_Job_Title = document.getElementById("Reference_Job_Title").value;
        var Reference_Contact_No = document.getElementById("Reference_Contact_No").value;
        var Reference_Address = document.getElementById("Reference_Address").value;
		
        $.post("controllars/employees.php",{FLAG:Flag,USERID:Userid,REFERENCE_COMPANY_NAME:Reference_Company_Name,REFERENCE_NAME:Reference_Name,REFID:Refid,REFERENCE_TYPE:Reference_Type,REFERENCE_JOB_TITLE:Reference_Job_Title,REFERENCE_CONTACT_NO:Reference_Contact_No,REFERENCE_ADDRESS:Reference_Address,GET_HTML:'Reference'},function(data){
		                document.getElementById("Reference").innerHtml=$("#Reference").html(data);
	            });
    }

	function delete_reference(Rid){
		
	    	    $.post("controllars/employees.php",{RID:Rid,DELETE:'Reference'},function(data){
		                document.getElementById("Reference").innerHtml=$("#Reference").html(data);
	            });
    }
	
</script>

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->

<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-XXXXX-X']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script> 


</body>

<!-- Mirrored from www.venmond.com/demo/vendroid/forms-wizard.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Dec 2016 18:06:05 GMT -->
</html>