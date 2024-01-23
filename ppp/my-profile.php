<?php 
include("include/security.php");
include("include/conn.php");

?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html><!--<![endif]-->

<!-- Specific Page Data -->

<!-- End of Data -->

<head>
<meta charset="utf-8" />
<title><?php echo $title;?> My Profile </title>
<meta name="keywords" content="People Performance Process" />
<meta name="description" content="People Performance Process ">

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">    

<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/favicon.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/favicon.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/favicon.png">
<link rel="apple-touch-icon-precomposed" href="img/ico/favicon.png">
<link rel="shortcut icon" href="img/ico/favicon.png">

<?php include('include/head.php');?>


</head>    

<body id="layouts" class="full-layout nav-top-fixed nav-right-small responsive clearfix" data-active="layouts " data-smooth-scrolling="1" >
<div class="vd_body">

<?php include('include/header.php');?>

<div class="content">
<div class="container">

<?php include('include/sidebar.php');?>

<!-- Middle Content Start -->

<div class="vd_content-wrapper">
<div class="vd_container">
<div class="vd_content clearfix">
<div class="vd_head-section clearfix">
<div class="vd_panel-header">
<ul class="breadcrumb">
<li><a href="main.php">Home</a> </li>
<li class="active">My Profile</li>
</ul>
<div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
<div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
<div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
<div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>

</div>

</div>
</div>
<!-- vd_head-section -->

<div class="vd_title-section clearfix">
<div class="vd_panel-header">

	<h1>My Profile</h1>

<!--              <small class="subtitle">Default dashboard for multipurpose demonstration</small>
-->              <div class="vd_panel-menu  hidden-xs">
<div class="menu no-bg vd_red" data-original-title="Start Layout Tour Guide" data-toggle="tooltip" data-placement="bottom" onClick="javascript:introJs().setOption('showBullets', false).start();"> <span class="menu-icon font-md"><i class="fa fa-question-circle"></i></span> </div>

</div>
<!-- vd_panel-menu --> 
</div>
<!-- vd_panel-header --> 
</div>
<!-- vd_title-section -->

<div class="vd_content-section clearfix">
<div class="row">
<div class="col-sm-3">
<div class="panel widget light-widget panel-bd-top">
  <div class="panel-heading no-title"> </div>
  <div class="panel-body">
	<?php 
	  $ud= mysqli_query($db,"SELECT * FROM tbluserinfodetail where Userid='".$_SESSION['UserName']."' and ESid='1'");
			 $user = mysqli_fetch_array($ud);
			 
			 /*$dept=mysqli_query($db,'select DeptName from tbldept where Deptid="'.$user['Deptid'].'"');
			 $row_dept=mysqli_fetch_array($dept);	
			 
			 $desig=mysqli_query($db,'select DesigName from tbldesignations where Desigid="'.$user['Desigid'].'"');
			 $row_desig=mysqli_fetch_array($desig);	*/
			 
			 $city=mysqli_query($db,'select CityName from tblcities where Cityid="'.$user['Cityid'].'"');
			 $row_city=mysqli_fetch_array($city);
			 
			 $reporting=mysqli_query($db,'select User_Name from tbluserinfodetail where Userid="'.$user['Incharge_Code'].'"');
			 $row_r=mysqli_fetch_array($reporting);
			 
			 $hod=mysqli_query($db,'select User_Name from tbluserinfodetail where Userid="'.$user['HOD_Code'].'"');
			 $row_h=mysqli_fetch_array($hod);
			 
			 $status=mysqli_query($db,'select EmpStatus from tblempstatus where ESid="'.$user['ESid'].'"');
			 $row_status=mysqli_Fetch_array($status);
	
	?>

	<div class="text-center vd_info-parent">
	
	<h2 class="font-semibold mgbt-xs-5"><?php echo $user['Userid'];?></h2>
	
			<?php 
			$filename = "uploads/profile_image/".$user['Userid'].'.png';
			if (file_exists($filename)) {
				$file=$filename;
			} else {
				$file='img/avatar/user.png';
			}?>
				 <img class="image-responsive" src="<?php echo $file;?>">
				
				
	</div>
	<br>
	<h3 class="font-semibold mgbt-xs-5"><?php echo $user['User_Name'];?></h3>
	<br>
	<h6><b><?php echo $user['Designation'];?></b></h6>
	
	<div class="mgtp-20" style="margin-left:-20px">
	  <table class="table table-striped table-hover">
		<tbody>
		  <tr>
			<td style="width:60%;">Department</td>
			<td><?php echo $user['Department'];?></td>
		  </tr>
		  <tr>
			<td style="width:60%;">DOJ</td>
			<td><?php echo $user['Date_Of_Joining'];
			
			?></td>
		  </tr>
		  <tr>
			<td style="width:60%;">Work Location</td>
			<td><?php echo $row_city['CityName'];?></td>
		  </tr>
		  <tr>
			<td style="width:60%;">Reporting To</td>
			<td><?php echo $row_r['User_Name'];?></td>
		  </tr>
		  <tr>
			<td style="width:60%;">Status</td>
			<td><?php echo $row_status['EmpStatus'];?></td>
		  </tr>
		</tbody>
	  </table>
	</div>
  </div>
</div>
<!-- panel widget -->                

<!-- panel widget --> 
</div>

<div class="col-sm-9">			
<div class="tabs widget">
<ul class="nav nav-tabs widget">
<li class="active"> <a data-toggle="tab" href="#profile-tab"> Profile <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
</ul>
<div class="tab-content">

<div id="profile-tab" class="tab-pane active">
<div class="pd-20"> 
<h3 class="mgbt-xs-15 mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> ABOUT</h3>
<div class="row">
<div class="col-sm-6">
<div class="row mgbt-xs-0">
<label class="col-xs-4 control-label">Name:</label>
<div class="col-xs-7 controls"><?php echo $user['User_Name'];?></div>
<!-- col-sm-10 --> 
</div>
</div>
<div class="col-sm-6">
<div class="row mgbt-xs-0">
<label class="col-xs-4 control-label">Father Name:</label>
<div class="col-xs-7 controls"><?php echo $user['Father_Name'];?></div>
<!-- col-sm-10 --> 
</div>
</div>
<div class="col-sm-6">
<div class="row mgbt-xs-0">
<label class="col-xs-4 control-label">Designation:</label>
<div class="col-xs-7 controls"><?php echo $user['Designation'];?></div>
<!-- col-sm-10 --> 
</div>
</div>
<div class="col-sm-6">
<div class="row mgbt-xs-0">
<label class="col-xs-4 control-label">Department:</label>
<div class="col-xs-7 controls"><?php echo $user['Department'];?></div>
<!-- col-sm-10 --> 
</div>
</div>
<div class="col-sm-6">
<div class="row mgbt-xs-0">
<label class="col-xs-4 control-label">Country:</label>
<div class="col-xs-7 controls">Pakistan</div>
<!-- col-sm-10 --> 
</div>
</div>
<div class="col-sm-6">
<div class="row mgbt-xs-0">
<label class="col-xs-4 control-label">City:</label>
<div class="col-xs-7 controls"><?php echo $row_city['CityName'];?></div>
<!-- col-sm-10 --> 
</div>
</div>
<div class="col-sm-6">
<div class="row mgbt-xs-0">
<label class="col-xs-4 control-label">Email:</label>
<div class="col-xs-7 controls"><?php echo $user['Official_Email'];?></div>
<!-- col-sm-10 --> 
</div>
</div>
<div class="col-sm-6">
<div class="row mgbt-xs-0">
<label class="col-xs-4 control-label">Birthday:</label>
<div class="col-xs-7 controls"><?php echo $user['Date_Of_Birth'];?></div>
<!-- col-sm-10 --> 
</div>
</div>
<div class="col-sm-6">
<div class="row mgbt-xs-0">
<label class="col-xs-4 control-label">CNIC:</label>
<div class="col-xs-7 controls"><?php echo $user['CNIC'];?></div>
<!-- col-sm-10 --> 
</div>
</div>
<div class="col-sm-6">
<div class="row mgbt-xs-0">
<label class="col-xs-4 control-label">Phone:</label>
<div class="col-xs-7 controls"><?php echo $user['Mobile_No_1'];?></div>
<!-- col-sm-10 --> 
</div>
</div>
<br>
<br>
<div class="col-sm-6">
<div class="row mgbt-xs-0">
<label class="col-xs-4 control-label">Reporting to:</label>
<div class="col-xs-7 controls"><?php echo $row_r['User_Name'];?></div>
<!-- col-sm-10 --> 
</div>
</div>

</div> 



</div>
<!-- pd-20 --> 
</div>



</div><!-- tab-content --> 
</div><!-- tabs-widget -->
</div>
</div><!-- row -->
</div><!-- User Dashboard End-->



</div><!-- .vd_content --> 
</div><!-- .vd_container --> 
</div><!-- .vd_content-wrapper --> 

<!-- Middle Content End --> 

<?php include('include/right-sidebar.php');?>

</div>
<!-- .container --> 
</div>
<!-- .content -->

<?php include('include/footer.php');?>

</div>
<!-- .vc_body END  -->


<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<?php include('include/head-footer.php');?>


</body>


</html>