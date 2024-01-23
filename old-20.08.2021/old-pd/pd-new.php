<?php include("include/security.php");?>
<?php include("include/conn.php");?>
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
        <a href="index-2.html">
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
                    <li class="breadcrumb-item active" aria-current="page">New Development - Rank 1</li>
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
            <?php if(isset($_GET['Serno'])){?>
			<div class="alert alert-success" role="alert">
                        Development Created Successfully. Development No is <?php echo base64_decode($_GET['Serno']);?>
            </div>
			<?php } ?>
            <form class="needs-validation" novalidate="" action="controllers/development.php?insert=rank1" method="POST"  enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Date & Time:</label>
                        <input type="text" class="form-control" id="sub_date" name="sub_date" value="<?php echo date('Y-m-d');?>" required="" readonly>
                        
                    </div>
                  
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Customer</label>
                        <div class="input-group">
                            <select id="r1_c_id" name="r1_c_id" class="form-control" required>
                                   <option value="">Select</option>
								<?php 
								   $customers= mysqli_query($db,"SELECT * FROM tblcustomers order by c_name asc");
								   while($customer = mysqli_fetch_array($customers)){   
								?>
								   <option value="<?php echo $customer['c_id'];?>"><?php echo $customer['c_name'];?></option>
								
								<?php } ?>
						   </select>
						    <div class="invalid-tooltip">
                                Please select customer.
								 </div>
                        </div>
                    </div>
					 <div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Relevant Product Lines </label>
                        <div class="input-group">
                             <select class="js-example-basic-single" multiple id="pld_id[]" name="pld_id[]">
									<option>Select</option>
									
									<?php 
									   $pls= mysqli_query($db,"SELECT * FROM tblproductlines where pl_status='1' order by pl_name asc");
									   while($pl = mysqli_fetch_array($pls)){   
									?>
									<optgroup label="<?php echo $pl['pl_name'];?>">
										<?php 
										   $pl_ds= mysqli_query($db,"SELECT * FROM tblproductsublines where pl_id='".$pl['pl_id']."' order by pld_name asc");
										   while($pl_d = mysqli_fetch_array($pl_ds)){   
										?>
										<option value="<?php echo $pl_d['pld_id'];?>"><?php echo $pl['pl_name'];?>-<?php echo $pl_d['pld_name'];?></option>
										<?php } ?>
										
										
									</optgroup>
									<?php } ?>
								</select>
						    <div class="invalid-tooltip">
                                Please select product lines.
								 </div>
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Ref. / Source </label>
                        <div class="input-group">
                           <select id="r1_rf_id" name="r1_rf_id" class="form-control" required>
                                   <option value="">Select</option>
								<?php 
								   $sources= mysqli_query($db,"SELECT * FROM tblrsource where rf_status='1' order by rf_id asc");
								   while($source = mysqli_fetch_array($sources)){   
								?>
								   <option value="<?php echo $source['rf_id'];?>"><?php echo $source['rf_name'];?></option>
								
								<?php } ?>
						   </select>
                            
                            <div class="invalid-tooltip">
                                Please select source.
                            </div>
                        </div>
                    </div>
					
				    	<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Concern Person Name </label>
                        <div class="input-group">
                           
                             <input type="text" class="form-control" id="r1_cp_name" name="r1_cp_name" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="invalid-tooltip">
                                Please enter Concern Person Name.
                            </div>
                        </div>
                    </div>
					
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Designation </label>
                        <div class="input-group">
                            
                            <select id="r1_cd_id" name="r1_cd_id" class="form-control" required>
                                   <option value="">Select</option>
								<?php 
								   $designations= mysqli_query($db,"SELECT * FROM tblcpdesignations where cd_status='1' order by cd_id asc");
								   while($designation = mysqli_fetch_array($designations)){   
								?>
								   <option value="<?php echo $designation['cd_id'];?>"><?php echo $designation['cd_name'];?></option>
								
								<?php } ?>
						   </select>
                            <div class="invalid-tooltip">
                                Please select Designation.
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Contact #  </label>
                        <div class="input-group">
                           
                             <input type="text" class="form-control" id="r1_cp_contact" name="r1_cp_contact" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="invalid-tooltip">
                                Please enter contact no.
                            </div>
                        </div>
                    </div>
					
			<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                            </div>
                            <input type="email" class="form-control" id="r1_cp_email" name="r1_cp_email" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="invalid-tooltip">
                                Please enter valid email address.
                            </div>
                        </div>
                    </div>
			
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Address</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="r1_cp_address" name="r1_cp_address" aria-describedby="validationTooltipUsernamePrepend" required>
							 <div class="invalid-tooltip">
                                Please enter address.
                            </div>
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

<!-- App scripts -->
<script src="assets/js/app.min.js"></script>
</body>


</html>