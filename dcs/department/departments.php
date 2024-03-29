<?php
include('../include/security.php');
include('../include/conn.php');

$departments=mysqli_query($db,"SELECT * FROM tbl_depts WHERE FLD_ID > 0");
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
<link href="../assets/plugins/custom/datatables/datatables.bundled450.css?v=7.0.9" rel="stylesheet" type="text/css" />
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
			<div class="card card-custom">
				<div class="card-header py-3">
					<div class="card-title">
						<span class="card-icon">
							<i class="<?php echo $_GET['icon'];?> text-primary"></i>
						</span>
						<h3 class="card-label"><?php echo $_GET['name'];?></h3>
					</div>
				<div class="card-body">
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
						<thead>
							<tr>
								<th>ID</th>
								<th>Unit</th>
								<th>Department</th>
								<th>Status</th>
<th>Action</th>										</tr>
						</thead>
						<tbody>
							<?php while($department=mysqli_fetch_array($departments)){
								  $units=mysqli_query($db,"SELECT * FROM tbl_units	
								  WHERE FLD_ID='".$department['FLD_UNAME']."'");
								  $unit = mysqli_fetch_array($units);
								  
					
							?>
							<tr>
								<td><?php echo $department['FLD_ID'];?></td>
								<td><?php echo $unit['FLD_UNAME'];?> </td>
								<td><?php echo $department['FLD_DNAME'];?></td>
								
								<td>
								<?php 
								if($department['FLD_DFLAG']=='Inactive'){
								?>
								<span class="label label-lg font-weight-bold label-light-danger label-inline">Inactive</span>
								<?php }elseif($department['FLD_DFLAG']=='Active'){?>
								<span class="label label-lg font-weight-bold label-light-success label-inline">Active</span>
								<?php } ?>
								</td>
								<td>
							

<a href="<?php echo $url;?>/department/edit-department.php?FLD_ID=<?php echo $department['FLD_ID'];?>"> 
							
<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | 

path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-20-

140804/theme/html/demo5/dist/../src/media/svg/icons/Files/File.svg--><svg 

xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" 

height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<polygon points="0 0 24 0 24 24 0 24"/>
<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 

14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 

20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 

C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 

5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
<rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
<rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
</g>
</svg><!--end::Svg Icon--></span></a>
							

</td>

							</tr>
							
							<?php } ?>
						</tbody>
					</table>
					<!--end: Datatable-->
				</div>
			</div>
			<!--end::Card-->

		</div>
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
<!--begin::Page Vendors(used by this page)-->
<script src="../assets/plugins/custom/datatables/datatables.bundled450.js?v=7.0.9"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="../assets/js/pages/crud/datatables/extensions/buttonsd450.js?v=7.0.9"></script>
<!--end::Page Scripts-->
<script src="../assets/js/pages/crud/forms/validation/form-widgetsd450.js?v=7.0.9"></script>

</body>
<!--end::Body-->
</html>