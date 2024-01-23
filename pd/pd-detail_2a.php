<?php include("include/security.php");?>
<?php include("include/conn.php");?>

<?php 
$developments= mysqli_query($db,"SELECT * FROM tblrank1 where r1_id='".base64_decode($_GET['id'])."' and r1_created_by='".$_SESSION['user_id']."'");
$development = mysqli_fetch_array($developments);

$developments_r2= mysqli_query($db,"SELECT * FROM tblrank2 where r1_id='".base64_decode($_GET['id'])."'");
$development_r2 = mysqli_fetch_array($developments_r2);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>New Development</title>

 <?php include("include/head.php");?>
</head>
<body>

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
</div>
<!-- end::page loader -->

<!-- begin::sidebar user profile -->
<?php include("include/user-sidebar.php");?>
<!-- end::sidebar user profile -->

<?php include("include/sidebar.php");?>

<!-- begin::header -->
<div class="header">

    <!-- begin::header logo -->
    <div class="header-logo">
        <a href="dashboard.php">
            <img class="large-logo" src="assets/media/image/logo.png" alt="image">
            <img class="small-logo" src="assets/media/image/logo-sm.png" alt="image">
            <img class="dark-logo" src="assets/media/image/logo-dark.png" alt="image">
        </a>
    </div>
    <!-- end::header logo -->

    <!-- begin::header body -->
    <div class="header-body">

        <div class="header-body-left">

            <h3 class="page-title">Product Development </h3>

            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">New Development - Rank 2A</li>
                </ol>
            </nav>
            <!-- end::breadcrumb -->

        </div>

        <?php include("include/notification.php");?>

    </div>
    <!-- end::header body -->

</div>
<!-- end::header -->

<!-- begin::main content -->
<main class="main-content">

<div class="card">
        <div class="card-body">
            <?php if(isset($_GET['msg'])){?>
			<div class="alert alert-success" role="alert">
                        Record Saved Successfully. Development No is <?php echo base64_decode($_GET['id']);?>
            </div>
			<?php } ?>
			
            <form class="needs-validation" novalidate="" action="controllers/development.php?insert=rank2&id=<?php echo $_GET['id'];?>" method="POST"  enctype="multipart/form-data">
			<h6 class="card-title">Rank 1</h6>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Date & Time:</label>
                        <input type="text" class="form-control" id="sub_date" name="sub_date" value="<?php echo $development['r1_created_on'];?> <?php echo $development['r1_creation_time'];?>" readonly>
                        
                    </div>
                  
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Customer</label>
                        <div class="input-group">
                            <select id="r1_c_id" name="r1_c_id" class="form-control"  disabled>
                                   <option value="">Select</option>
								<?php 
								   $customers= mysqli_query($db,"SELECT * FROM tblcustomers order by c_name asc");
								   while($customer = mysqli_fetch_array($customers)){   
								?>
								   <option value="<?php echo $customer['c_id'];?>" <?php if($customer['c_id']==$development['r1_c_id']){echo "selected='selected'";}?>><?php echo $customer['c_name'];?></option>
								
								<?php } ?>
						   </select>
						   
                        </div>
                    </div>
					 <div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Relevant Product Lines </label>
                        <div class="input-group">
                             <select class="js-example-basic-single" multiple id="pld_id[]" name="pld_id[]" disabled>
									<option>Select</option>
									
									<?php 
									   $pls= mysqli_query($db,"SELECT * FROM tblproductlines where pl_status='1' order by pl_name asc");
									   while($pl = mysqli_fetch_array($pls)){   
									?>
									<optgroup label="<?php echo $pl['pl_name'];?>">
										<?php 
										   $pl_ds= mysqli_query($db,"SELECT * FROM tblproductsublines where pl_id='".$pl['pl_id']."' order by pld_name asc");
										   while($pl_d = mysqli_fetch_array($pl_ds)){   
										   
										    $pls_check=mysqli_query($db,"select * from tblrank1productlines
											where
											r1_id='".base64_decode($_GET['id'])."' and pld_id='".$pl_d['pld_id']."'");
										    $pl_num = mysqli_num_rows($pls_check);
											if($pl_num>0){
											   $selected='selected="selected"';	
											}else{
											   $selected='';	
											}
										   
										?>
										<option value="<?php echo $pl_d['pld_id'];?>" <?php echo $selected;?>><?php echo $pl['pl_name'];?>-<?php echo $pl_d['pld_name'];?></option>
										<?php } ?>
										
										
									</optgroup>
									<?php } ?>
								</select>
						    
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Ref. / Source </label>
                        <div class="input-group">
                           <select id="r1_rf_id" name="r1_rf_id" class="form-control"  disabled>
                                   <option value="">Select</option>
								<?php 
								   $sources= mysqli_query($db,"SELECT * FROM tblrsource where rf_status='1' order by rf_id asc");
								   while($source = mysqli_fetch_array($sources)){   
								?>
								   <option value="<?php echo $source['rf_id'];?>" <?php if($source['rf_id']==$development['r1_rf_id']){echo "selected='selected'";}?>><?php echo $source['rf_name'];?></option>
								
								<?php } ?>
						   </select>
                            
                            
                        </div>
                    </div>
					
				    	<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Concern Person Name </label>
                        <div class="input-group">
                           
                             <input type="text" class="form-control" id="r1_cp_name" name="r1_cp_name" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $development['r1_cp_name'];?>" readonly>
                           
                        </div>
                    </div>
					
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Designation </label>
                        <div class="input-group">
                            
                            <select id="r1_cd_id" name="r1_cd_id" class="form-control" disabled>
                                   <option value="">Select</option>
								<?php 
								   $designations= mysqli_query($db,"SELECT * FROM tblcpdesignations where cd_status='1' order by cd_id asc");
								   while($designation = mysqli_fetch_array($designations)){   
								?>
								   <option value="<?php echo $designation['cd_id'];?>" <?php if($designation['cd_id']==$development['r1_cd_id']){echo "selected='selected'";}?>><?php echo $designation['cd_name'];?></option>
								
								<?php } ?>
						   </select>
                           
                        </div>
                    </div>
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Contact #  </label>
                        <div class="input-group">
                           
                             <input type="text" class="form-control" id="r1_cp_contact" name="r1_cp_contact" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $development['r1_cp_contact'];?>" readonly>
                          
                        </div>
                    </div>
					
			<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                            </div>
                            <input type="email" class="form-control" id="r1_cp_email" name="r1_cp_email" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $development['r1_cp_email'];?>" readonly>
                           
                        </div>
                    </div>
			
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Address</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="r1_cp_address" name="r1_cp_address" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $development['r1_cp_address'];?>" readonly>
							
                        </div>
                    </div>
					 </div>
		<h6 class="card-title">Rank 2</h6>
			   <div class="form-row">
			   	<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Initial Meeting Type </label>
                        <div class="input-group">
                            
                            <select id="r2_mt_id" name="r2_mt_id" class="form-control" required>
                                   <option value="">Select</option>
								<?php 
								   $types= mysqli_query($db,"SELECT * FROM tblmeetingtypes where mt_status='1' order by mt_id asc");
								   while($type = mysqli_fetch_array($types)){   
								?>
								   <option value="<?php echo $type['mt_id'];?>" <?php if($type['mt_id']==$development_r2['r2_mt_id']){echo "selected='selected'";}?>><?php echo $type['mt_name'];?></option>
								
								<?php } ?>
						   </select>
						    <div class="invalid-tooltip">
                                Please select Meeting Type.
                            </div>
                           
                        </div>
                    </div>
					    <?php 
						if($development_r2["r2_meeting_date"]!=''){
						$r2_meeting_date = explode('-',$development_r2["r2_meeting_date"]);
	                    $r2_meeting_date = $r2_meeting_date[1].'/'.$r2_meeting_date[2].'/'.$r2_meeting_date[0];
						}
						?>
						<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Initial Meeting Date </label>
                        <div class="input-group">
                            
                            <input type="text" class="form-control" id="r2_meeting_date" name="r2_meeting_date" aria-describedby="validationTooltipUsernamePrepend"  required value="<?php echo $r2_meeting_date;?>">
							<div class="invalid-tooltip">
                                Please enter Initial Meeting Date.
                            </div>
                        </div>
                    </div>
			   	<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Attendees/Concern </label>
                        <div class="input-group">
                            
                            <select id="r2_attendees" name="r2_attendees" class="form-control" required>
                                   <option value="">Select</option>
								<?php 
								   $designations= mysqli_query($db,"SELECT * FROM tblcpdesignations where cd_status='1' order by cd_id asc");
								   while($designation = mysqli_fetch_array($designations)){   
								?>
								   <option value="<?php echo $designation['cd_id'];?>" <?php if($designation['cd_id']==$development_r2['r2_attendees']){echo "selected='selected'";}?>><?php echo $designation['cd_name'];?></option>
								
								<?php } ?>
						   </select>
                           <div class="invalid-tooltip">
                                Please select Attendees/Concern.
                            </div>
                        </div>
                    </div>
					
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Payment Terms </label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="r2_payment_type" name="r2_payment_type" aria-describedby="validationTooltipUsernamePrepend" required value="<?php echo $development_r2['r2_payment_type'];?>">
							 <div class="invalid-tooltip">
                                Please select Payment Terms.
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Register/Unregistered Purchase Ratio</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="r2_register_ratio" name="r2_register_ratio" aria-describedby="validationTooltipUsernamePrepend" required value="<?php echo $development_r2['r2_register_ratio'];?>">
							 <div class="invalid-tooltip">
                                Please select Register/Unregistered Purchase Ratio.
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">International/National Certifications </label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="r2_int_nat_cert" name="r2_int_nat_cert" aria-describedby="validationTooltipUsernamePrepend" required value="<?php echo $development_r2['r2_int_nat_cert'];?>">
							 <div class="invalid-tooltip">
                                Please enter International/National Certifications.
                            </div>
                        </div>
                    </div>
					
					
					   <div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Repute W.R.T Payment</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="r2_repute_wrt_payment" name="r2_repute_wrt_payment" aria-describedby="validationTooltipUsernamePrepend" required placeholder="A (best),B (plus minus in dates) ,C (extensive follow up) ,D (stuck, too much delays), E (exit, dead)" value="<?php echo $development_r2['r2_repute_wrt_payment'];?>">
							
                        </div>
                    </div>
					
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Any other Remarks/Minutes</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="r2_remarks" name="r2_remarks" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $development_r2['r2_remarks'];?>">
							
                        </div>
                    </div>
					
					
					
                </div>
               
			
				<button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>

</main>
<!-- end::main content -->

<!-- Plugin scripts -->
<script src="vendors/bundle.js"></script>

<!-- Select2 -->
<script src="vendors/select2/js/select2.min.js"></script>
<script src="assets/js/examples/select2.js"></script>

<!-- Range slider -->
<script src="vendors/range-slider/js/ion.rangeSlider.min.js"></script>
<script src="assets/js/examples/range-slider.js"></script>

<!-- Input mask -->
<script src="vendors/input-mask/jquery.mask.js"></script>
<script src="assets/js/examples/input-mask.js"></script>

<!-- Tagsinput -->
<script src="vendors/tagsinput/bootstrap-tagsinput.js"></script>
<script src="assets/js/examples/tagsinput.js"></script>
<script src="vendors/datepicker/daterangepicker.js"></script>
<script src="assets/js/examples/datepicker.js"></script>
<!-- App scripts -->
<script src="assets/js/app.min.js"></script>
</body>


</html>