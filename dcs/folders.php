<?php
include('include/security.php');
include('include/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
<meta charset="utf-8" />
<title><?php echo $title;?> - Dashboard</title>
<meta name="description" content="Dashboard and Statistics" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<link rel="canonical" href="https://solutionly.com.pk/" />
<!--begin::Fonts-->
<link rel="stylesheet" href="assets/css/fonts.css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendors Styles(used by this page)-->
<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundled450.css?v=7.0.9" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
<!--begin::Global Theme Styles(used by all pages)-->
<link href="assets/plugins/global/plugins.bundled450.css?v=7.0.9" rel="stylesheet" type="text/css" />
<link href="assets/css/style.bundled450.css?v=7.0.9" rel="stylesheet" type="text/css" />
<link href="assets/plugins/custom/datatables/datatables.bundled450.css?v=7.0.9" rel="stylesheet" type="text/css" />

<!--end::Global Theme Styles-->
<!--begin::Layout Themes(used by all pages)-->
<!--end::Layout Themes-->
<link rel="shortcut icon" href="assets/media/logos/fav.png" />

</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-static page-loading">

<!--begin::Main-->
<!--begin::Header Mobile-->
<?php include('include/mobile-header.php');?>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
<!--begin::Page-->
<div class="d-flex flex-row flex-column-fluid page">
<!--begin::Aside-->
<?php include('include/sidebar.php');?>
<!--end::Aside-->
<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
<!--begin::Header-->
<?php include('include/header.php');?>
<!--end::Header-->
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
<!--begin::Subheader-->
<div class="subheader py-3 py-lg-8 subheader-transparent" id="kt_subheader">
<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
<!--begin::Info-->
<div class="d-flex align-items-center flex-wrap mr-1">
<!--begin::Mobile Toggle-->
<button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
<span></span>
</button>
<!--end::Mobile Toggle-->
<!--begin::Page Heading-->
<div class="d-flex align-items-baseline flex-wrap mr-5">
<!--begin::Page Title-->
<h2 class="subheader-title text-dark font-weight-bold my-1 mr-3">Documents</h2>
<!--end::Page Title-->

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
<!--begin::Todo Docs-->
<div class="d-flex flex-row">
<!--begin::Aside-->
<div class="flex-row-auto offcanvas-mobile w-200px w-xxl-275px" id="kt_todo_aside">
<!--begin::Card-->
<div class="card card-custom card-stretch">
<!--begin::Body-->
<div class="card-body px-5">
<?php include("sidebar.php");?>
</div>
<!--end::Body-->
</div>
<!--end::Card-->
</div>
<!--end::Aside-->
<!--begin::List-->
<div class="flex-row-fluid d-flex flex-column ml-lg-8">
<div class="d-flex flex-column flex-grow-1">

<!--begin::Card-->
<div class="card card-custom d-flex flex-grow-1">
<!--begin::Body-->
<div class="card-body flex-grow-1">
<!--begin::Row-->
<div class="row">

<!--begin::Col-->
<div class="col-lg-12">
<?php 

if($_SESSION['DEPARTMENT']=='All'){

$documents=mysqli_query($db,"SELECT * FROM tbl_docs WHERE FLD_ID > 0
AND FLD_DNAME='".base64_decode($_SESSION['ID'])."'");
$departments = mysqli_query($db,"SELECT * FROM tbl_depts WHERE 
FLD_ID = '".base64_decode($_SESSION['ID'])."'");
$department = mysqli_fetch_array($departments);

?>


<?php }elseif($_SESSION['DEPARTMENT']=='Compliance'){
$documents=mysqli_query($db,"SELECT * FROM tbl_docs WHERE FLD_ID > 0
AND FLD_DNAME='1'");
$departments = mysqli_query($db,"SELECT * FROM tbl_depts WHERE 
FLD_ID = '1'");
$department = mysqli_fetch_array($departments);


?>

<?php }elseif($_SESSION['DEPARTMENT']=='Own'){
$documents=mysqli_query($db,"SELECT * FROM tbl_docs WHERE FLD_ID > 0
AND FLD_DNAME='".$_SESSION['FLD_DNAME']."'");	

$departments = mysqli_query($db,"SELECT * FROM tbl_depts WHERE 
		     FLD_ID = '".$_SESSION['FLD_DNAME']."'");
$department = mysqli_fetch_array($departments);
				  
?>	



<?php }elseif($_SESSION['DEPARTMENT']=='Others'){
$documents = mysqli_query($db,"SELECT * FROM 
tbl_depts_docs dd,tbl_docs d
WHERE dd.FLD_DTITL = d.FLD_ID AND 
dd.FLD_DNAME = '".$_SESSION['FLD_DNAME']."' AND d.FLD_DNAME != '1'");		
$departments = mysqli_query($db,"SELECT * FROM tbl_depts WHERE 
FLD_ID = '".base64_decode($_SESSION['ID'])."'");
$department = mysqli_fetch_array($departments);
?>

<?php } ?>

<!--begin::Card-->
<div class="card card-custom card-custom gutter-t">
<div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
<div class="alert-icon">
<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-20-140804/theme/html/demo5/dist/../src/media/svg/icons/Files/Selected-file.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<polygon points="0 0 24 0 24 24 0 24"/>
<path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
<path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero"/>
</g>
</svg><!--end::Svg Icon--></span>
</div>

<div class="alert-text"><?php echo $department['FLD_DNAME'];?>
</div>
</div>
<div class="card-body">

<div class="col-xl-12">
<!--begin::Nav Panel Widget 1-->

<!--begin::Body-->
<div>
<!--begin::Nav Tabs-->


<?php      
if($_SESSION['DEPARTMENT']=='All'){
$folders = mysqli_query($db,"select distinct(FLD_FOLDS) as FLD_FOLDS 
from tbl_docs where FLD_DNAME = '".base64_decode($_SESSION['ID'])."'");  
$FLD_DNAME = base64_decode($_SESSION['ID']);
}elseif($_SESSION['DEPARTMENT']=='Compliance'){
$folders = mysqli_query($db,"select distinct(FLD_FOLDS) as FLD_FOLDS 
from tbl_docs where FLD_DNAME = '1'");  
$FLD_DNAME = 1;

}elseif($_SESSION['DEPARTMENT']=='Own'){
$folders = mysqli_query($db,"select distinct(FLD_FOLDS) as FLD_FOLDS 
from tbl_docs where FLD_DNAME = '".base64_decode($_SESSION['ID'])."'");  
$FLD_DNAME = base64_decode($_SESSION['ID']);

}elseif($_SESSION['DEPARTMENT']=='Others'){
$folders = mysqli_query($db,"SELECT distinct(d.FLD_FOLDS) as FLD_FOLDS FROM 
tbl_depts_docs dd,tbl_docs d
WHERE dd.FLD_DTITL = d.FLD_ID AND 
dd.FLD_DNAME = '".$_SESSION['FLD_DNAME']."' AND d.FLD_DNAME != '1'"); 

$FLD_DNAME = base64_decode($_SESSION['ID']);		
}




while($folder = mysqli_fetch_array($folders)){

$select = mysqli_query($db,"select * from tbl_folds where FLD_ID = '".$folder['FLD_FOLDS']."'");
$row = mysqli_fetch_array($select);

$docments = mysqli_query($db,"select count(*) as total from tbl_docs where
FLD_DNAME='".$FLD_DNAME."' and FLD_FOLDS = '".  $folder['FLD_FOLDS']."'");
$docment = mysqli_fetch_array($docments);
	


?>
<div class="col-xl-4" style="float:left;">
<!--begin::Tiles Widget 11-->
<div class="card card-custom gutter-b" style="height: 150px">
<div class="card-body">
<span class="svg-icon svg-icon-3x svg-icon-primary">
	<!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Communication/Group.svg-->
	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
</g>
	</svg>
	<!--end::Svg Icon-->
</span>
<div class="text-dark font-weight-bolder font-size-h2 mt-3"><?php echo $docment['total'];?></div>
<a href="documents.php?folder=<?php echo base64_encode($folder['FLD_FOLDS']);?>&name=<?php echo base64_encode($row['FLD_FTYPE']);?>" class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1"><?php echo $row['FLD_FTYPE'];?></a>
</div>
</div>
<!--end::Tiles Widget 11-->
</div>
<!--end::Item-->



<?php } ?>

<!--end::Nav Tabs-->

</div>
<!--end::Body-->

<!--begin::Nav Panel Widget 1-->
</div>




</div>
</div>
<!--end::Card-->
</div>
<!--end::Col-->
</div>
<!--end::Row-->
</div>
<!--end::Body-->
</div>
<!--end::Card-->
</div>
</div>
<!--end::List-->
</div>
<!--end::Todo Docs-->
</div>
<!--end::Container-->
</div>
<!--end::Entry-->
</div>
<!--end::Content-->
<!--begin::Footer-->
<?php include('include/footer.php');?>
<!--end::Footer-->
</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Main-->
<!-- begin::Notifications Panel-->
<?php include('include/notifications.php');?>
<!-- end::Notifications Panel-->
<!--begin::Quick Actions Panel-->
<?php include('include/quick-actions.php');?>
<!--end::Quick Actions Panel-->
<!-- begin::User Panel-->
<?php include('include/user-panel.php');?>
<!-- end::User Panel-->
<!--begin::Quick Panel-->
<?php include('include/quick-panel.php');?>
<!--end::Quick Panel-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
<span class="svg-icon">
<!--begin::Svg Icon | path:/metronic/assets/media/svg/icons/Navigation/Up-2.svg-->
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
<script src="assets/plugins/global/plugins.bundled450.js?v=7.0.9"></script>
<script src="assets/js/scripts.bundled450.js?v=7.0.9"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/pages/widgetsd450.js?v=7.0.9"></script>
<script src="assets/js/pages/custom/todo/todod450.js?v=7.0.9"></script>
<script src="assets/js/pages/crud/forms/validation/form-widgetsd450.js?v=7.0.9"></script>

<!--begin::Page Vendors(used by this page)-->
<script src="assets/plugins/custom/datatables/datatables.bundled450.js?v=7.0.9"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="assets/js/pages/crud/datatables/extensions/buttonsd450.js?v=7.0.9"></script>
<!--end::Page Scripts-->

<script>
function show_documents(id,department){

$.post("documents/controller.php",{ID:id,DEPARTMENT:department,SHOW:'DOCUMENTS'},function(data){
window.location='folders.php';			
});

}
</script>
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>