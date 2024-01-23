<?php 
include("include/security.php");
include("include/conn.php");
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html><!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title><?php echo $title;?> Cities </title>
    <meta name="keywords" content="People Performance Process" />
    <meta name="description" content="People Performance Process ">
    
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
	<link href="plugins/dataTables/css/jquery.dataTables.html" rel="stylesheet" type="text/css">
	<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">	
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
	
	<script>
	
	 function get_html(Cityid){
	    	    $.post("controllars/cities.php",{Cityid:Cityid,GET_HTML:'cities'},function(data){
		                document.getElementById("html"+Cityid).innerHtml=$("#html"+Cityid).html(data);
	            });
			}
		function delete_city(Cityid){
	    	    $.post("controllars/cities.php",{Cityid:Cityid,DELETE:'city'},function(data){
		                document.getElementById("html"+Cityid).innerHtml=$("#html"+Cityid).html(data);
						
						location.reload();
	            });
			}	
			
			function edit(Cityid){

			    var CityName = document.getElementById("CityName"+Cityid).value;
	    	    $.post("controllars/cities.php",{Cityid:Cityid,CityName:CityName,EDIT:'cities'},function(data){
		                document.getElementById("html"+Cityid).innerHtml=$("#html"+Cityid).html(data);
	            });
			}
			
</script>

</head>    

<body id="layouts" class="full-layout nav-top-fixed nav-right-small responsive clearfix" data-active="layouts " data-smooth-scrolling="1">
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
                <li class="active">Administration</li>
				<li class="active">Cities</li>
              </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      
				</div>
            </div>
          </div>
				  
          <div class="vd_title-section clearfix">
		  
		   <!-- Pop-Up Model Start -->
				<div class="pd-20">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg" style="float:right;"> New City + </button>
				</div>
                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" style="background-color:white;">
                      <div class="modal-content">

                        <div class="modal-header" style="background-color:#41b7de; color:white;">
                          <button type="button" class="close" style="color:white;" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel"> +New City</h4>
                        </div>
						<form action="controllars/cities.php?insert=cities" method="post" data-parsley-validate class="form-horizontal form-label-left">
							<div class="modal-body">
								<div class="item form-group">
									<label class="control-label col-xs-3"> City Name <span class="required">*</span>
									</label>
									<div class="col-xs-6">
										<input type="text" id="CityName" name="CityName" placeholder="City Name" required="required">
									</div>
								</div>
							</div>
							<div class="modal-footer" style="background-color:#F0F0F0;">
							  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  <button type="submit" class="btn btn-success" name="Save" id="Save" value="Save">Save</button>
							</div>
					   </form>
                      </div>
                    </div>
                  </div>
				  
				  <!-- Pop-Up Model End -->
				  
				  
            <div class="vd_panel-header">
              <h1>Cities</h1>
              <small class="subtitle"> All Cities </small>
              
            </div>
          </div>
          <!-- vd_title-section -->
          
          <div class="vd_content-section clearfix">
		  
		  <div class="row">
              <div class="col-md-12">
                <div class="panel widget light-widget panel-bd-left vd_bdl-yellow">
                  <div class="panel-body table-responsive">
                    <table class="table table-hover" id="data-tables">
                      <thead>
                        <tr>
						  <th>ID</th>
                          <th>City</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
							 <?php 
					   $dp= mysqli_query($db,"SELECT * FROM tblcities ORDER BY Cityid ASC");
					   while($city = mysqli_fetch_array($dp)){
					  
					  ?>
					  <tr id="html<?php echo $city['Cityid'];?>">
                          <td><?php echo $city['Cityid'];?></td>
                          <td><?php echo $city['CityName'];?></td>
                        <td><a data-original-title="Edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow" onClick="get_html(<?php echo $city['Cityid']; ?>);"> <i class="fa fa-pencil"></i> </a>
						<a data-original-title="Delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red" onClick="delete_city(<?php echo $city['Cityid']; ?>);"> <i class="icon-trash"></i> </a>
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

<?php include('include/footer.php');?>

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

<script type="text/javascript" src="plugins/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
				"use strict";
				$('#data-tables').dataTable();
		} );
</script>

</body>
</html>