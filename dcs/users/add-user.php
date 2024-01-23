<?php
include('../include/security.php');
include('../include/conn.php');

$pages=mysqli_query($db,"SELECT * FROM tbl_tadir WHERE FLD_ID > 0");
?>
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
<meta charset="utf-8" />
<title><?php echo $title;?> - <?php echo $_GET['name'];?></title>
<meta name="description" content="<?php echo $_GET['name'];?> - <?php echo $_GET['function'];?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<link rel="canonical" href="https://solutionly.com.pk/" />
<!--begin::Fonts-->
<link rel="stylesheet" href="../assets/css/fonts.css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendors Styles(used by this page)-->
<link href="../assets/css/pages/wizard/wizard-1d450.css?v=7.0.9" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="../assets/plugins/global/plugins.bundled450.css?v=7.0.9" rel="stylesheet" type="text/css" />
<link href="../assets/css/style.bundled450.css?v=7.0.9" rel="stylesheet" type="text/css" />
<!--end::Global Theme Styles-->
<!--begin::Layout Themes(used by all pages)-->
<!--end::Layout Themes-->
<link rel="shortcut icon" href="../assets/media/logos/logo-letter-1.png" />

</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">

<!--begin::Main-->
<!--begin::Header Mobile-->
<?php include('../include/mobile-header.php');?>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
<!--begin::Page-->
<div class="d-flex flex-row flex-column-fluid page">
<!--begin::Aside-->
<?php include('../include/sidebar.php');?>
<!--end::Aside-->
<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
<!--begin::Header-->
<?php include('../include/header.php');?>
<!--end::Header-->
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Subheader-->
	<div class="subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap mr-1">
				<!--begin::Page Heading-->
				<div class="d-flex align-items-baseline flex-wrap mr-5">
					<!--begin::Page Title-->
					<h2 class="subheader-title text-dark font-weight-bold my-1 mr-3"><?php echo $_GET['name'];?></h2>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
						<li class="breadcrumb-item">
							<a href="#" class="text-muted"><?php echo $_GET['function'];?></a>
						</li>
						
					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page Heading-->
			</div>
			<!--end::Info-->
			
		</div>
	</div>
	<!--end::Subheader-->
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Notice-->
			<!--<div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
				
				<div class="alert-text">The foundation for DataTables is progressive enhancement, so it is very adept at reading table information directly from the DOM. This example shows how easy it is to add searching, ordering and paging to your HTML table by simply running DataTables on it. See official documentation 
				<a class="font-weight-bold" href="https://datatables.net/examples/data_sources/dom.html" target="_blank">here</a>.</div>
			</div>-->
			<!--end::Notice-->
			<!--begin::Card-->
			    <?php if($_GET['message']){?>
				<div class="alert alert-success" role="alert"><?php echo $_GET['message'];?>
				</div>
				<?php } ?>
<!--begin::Form-->						
<div class="card card-custom">
				<div class="card-body p-0">
					<!--begin::Wizard-->
					<div class="wizard wizard-1" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="false">
						<!--begin::Wizard Nav-->
						<div class="wizard-nav border-bottom">
							<div class="wizard-steps p-8 p-lg-10">
								<!--begin::Wizard Step 1 Nav-->
								<div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
									<div class="wizard-label">
										<i class="wizard-icon flaticon-list"></i>
										<h3 class="wizard-title">User Setup</h3>
									</div>
								
								</div>
								<!--end::Wizard Step 1 Nav-->
								
								
							</div>
						</div>
						<!--end::Wizard Nav-->
						<!--begin::Wizard Body-->
						<div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
							<div class="col-xl-12 col-xxl-7">
								<!--begin::Wizard Form-->
								<form class="form" id="kt_form" action="controller.php?action=<?php echo base64_encode($_GET['name'].'-'.$_GET['function']);?>&id=<?php echo $_GET['id'];?>" method="POST">
									<!--begin::Wizard Step 1-->
									<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
										<h3 class="mb-10 font-weight-bold text-dark">User Setup</h3>
										<!--begin::Input-->
										
										<div class="row">
											
											<div class="col-xl-6">
												<!--begin::Select-->
												<div class="form-group">
													<label>User Role</label>
													<select class="form-control form-control-solid" id="FLD_BTYPE" name="FLD_BTYPE" required>
													 <option value=""></option>
													 <option value="Admin">Admin</option>
													 <option value="Dept">Department Admin</option>
													 <option value="Viewer">Viewer</option>
													</select>
													
												
												</div>
												<!--end::Select-->
											</div>
											
										<div class="col-xl-6">
												<!--begin::Input-->
												<div class="form-group">
													<label>Department</label>
													<select class="form-control form-control-solid" id="FLD_DNAME" name="FLD_DNAME" required>
													
													
													 <option value=""></option>
													 
													  <?php 
												    $units = mysqli_query($db,"SELECT * FROM tbl_units WHERE FLD_UFLAG = 'Active'");
													while($unit = mysqli_fetch_array($units)){   
												    ?>	
													 <optgroup label="<?php echo $unit['FLD_UNAME'];?>">
													 
													 
													 
													 <?php $departments = mysqli_query($db,"SELECT * FROM tbl_depts WHERE FLD_UNAME = '".$unit['FLD_ID']."' AND FLD_DFLAG='Active'");
													 while($department = mysqli_fetch_array($departments)){   
													
												    ?>	
													 <option value="<?php echo $department['FLD_ID'];?>"><?php echo $department['FLD_DNAME']?></option>
													 <?php 	   }
													 ?>
													 </optgroup>
													 <?php 	   }
													 ?>
													</select>
														</div>
														<!--end::Input-->
													</div>
										</div>
									
									
										<!--begin::Input-->
										<div class="form-group">
											<label>Username</label>
											<input type="text" class="form-control form-control-solid form-control-lg" name="FLD_BNAME" placeholder="administrator" maxlength="40" required  />
										</div>
										<!--end::Input-->
										<!--begin::Input-->
										<div class="form-group">
											<label>Password</label>
											<input type="password" class="form-control form-control-solid form-control-lg" name="FLD_BCODE" placeholder="**********" maxlength="40"   />
										</div>
										<!--end::Input-->
										<!--begin::Input-->
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control form-control-solid form-control-lg" name="FLD_EMAIL" placeholder="admin@company.com"  required  />
										</div>
										<!--end::Input-->
									
									</div>
									<!--end::Wizard Step 1-->
								
									
									<!--begin::Wizard Actions-->
									<div class="d-flex justify-content-between border-top mt-5 pt-10">
										<div class="mr-2">
											<button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
										</div>
										<div>
											<button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
											<button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
										</div>
									</div>
									<!--end::Wizard Actions-->
								</form>
								<!--end::Wizard Form-->
							</div>
						</div>
						<!--end::Wizard Body-->
					</div>
					<!--end::Wizard-->
				</div>
				<!--end::Wizard-->
			</div>
		
<!--end::Form-->
		
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!--end::Content-->
<!--begin::Footer-->
<?php include('../include/footer.php');?>
<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Main-->
<!-- begin::Notifications Panel-->
<?php include('../include/notifications.php');?>
<!-- end::Notifications Panel-->
<!--begin::Quick Actions Panel-->
<?php include('../include/quick-actions.php');?>
<!--end::Quick Actions Panel-->
<!-- begin::User Panel-->
<?php include('../include/user-panel.php');?>
<!-- end::User Panel-->
<!--begin::Quick Panel-->
<?php include('../include/quick-panel.php');?>
<!--end::Quick Panel-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
<span class="svg-icon">
<!--begin::Svg Icon | path:/metronic/../assets/media/svg/icons/Navigation/Up-2.svg-->
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	<polygon points="0 0 24 0 24 24 0 24" />
	<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
	<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
</g>
</svg>
<!--end::Svg Icon-->
</span>
</div>
<!--end::Scrolltop-->
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="../assets/plugins/global/plugins.bundled450.js?v=7.0.9"></script>
<script src="../assets/js/scripts.bundled450.js?v=7.0.9"></script>
<!--end::Global Theme Bundle-->
<script src="../assets/js/pages/custom/wizard/wizard-customers.js?v=7.0.9"></script>
<script src="../assets/js/pages/crud/forms/validation/form-widgetsd450.js?v=7.0.9"></script>

</body>
<!--end::Body-->
</html>