<?php 
include("include/security.php");
include('include/conn.php');
?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html><!--<![endif]-->


<head>
    <meta charset="utf-8" />
    <title><?php echo $title;?> Evaluated Employees List </title>
    <meta name="keywords" content="People Performance Process" />
    <meta name="description" content="People Performance Process">
    
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
	<link href="plugins/dataTables/css/jquery.dataTables.html" rel="stylesheet" type="text/css"><link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">	
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

<body id="ui" class="full-layout  nav-right-hide nav-right-start-hide  nav-top-fixed      responsive    clearfix" data-active="ui "  data-smooth-scrolling="1">     
<div class="vd_body">
<!-- Header Start -->
  <?php include('include/header.php');?>
  <!-- Header Ends --> 
<div class="content">
<div class="container">
<?php include('include/sidebar.php');?>
  
  <div class="vd_content-wrapper">
    <div class="vd_container">
      <div class="vd_content clearfix">
        <div class="vd_head-section clearfix">
          <div class="vd_panel-header">
              <ul class="breadcrumb">
                <li><a href="main.php">Home</a> </li>
                <li class="active">Employees</li>
              </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
      
			</div>
            </div>
        </div>
		<div class="vd_content-section clearfix">
        
		<div class="vd_panel-header">
		
			<!--<a href="new-employee.php" class="btn vd_btn vd_bg-green col-md-offset-3" style="float:right;">New Employee +</a>-->
			
		  <h1>Employees</h1>
		  <small class="subtitle"> All Employees </small>
		</div>
		
        <div class="vd_content-section clearfix">
          <!-- row -->
          <div class="row">
            <div class="col-sm-12">
              <div class="panel widget light-widget panel-bd-left vd_bdl-yellow">
                <div class="panel-heading">
                  
                <!-- panel-heading -->
                
                <div class="row">
              <div class="col-md-12">
                <div class="panel widget">
                  <div class="panel-body table-responsive">
                    <table class="table table-striped" id="data-tables">
                      <thead>
                        <tr>
						  
                          <th>Code</th>
                          <th>Full Name</th>
                          <th>Designation<br>Deptartment </th>
                          <th>Reporting To</th>
                          <th>Reporting To Name </th>
						  <th>DOJ</th>
						  <th>Evaluated Year</th>
                          <th>Marks</th>
                        </tr>
                      </thead>
                      <tbody>
					  
					  <?php 
					   
					   
					   if($_SESSION['UserType']=='admin'){
					   $ud= mysqli_query($db,"SELECT * FROM tbluserinfodetail,tblpppstatus where tbluserinfodetail.Userid=tblpppstatus.Userid and tbluserinfodetail.ESid = '1' and tblpppstatus.EYear='".date('Y')."'");
					   
					   }else{
					        $ud= mysqli_query($db,"SELECT * FROM tbluserinfodetail,tblpppstatus where tbluserinfodetail.Userid=tblpppstatus.Userid and tbluserinfodetail.ESid = '1' and tbluserinfodetail.Incharge_Code='".$_SESSION['UserName']."' and tblpppstatus.EYear='".date('Y')."'");
					        
					       
					   }
					   while($user = mysqli_fetch_array($ud)){
						   
						     /*$dept=mysqli_query($db,'select DeptName from tbldept where Deptid="'.$user['Deptid'].'"');
                             $row_dept=mysqli_fetch_array($dept);	

                             $desg=mysqli_query($db,'select DesigName from tbldesignations where Desigid="'.$user['Desigid'].'"');
                             $row_desg=mysqli_fetch_array($desg);
							 
							 $city=mysqli_query($db,'select CityName from tblcities where Cityid="'.$user['Cityid'].'"');
                             $row_city=mysqli_fetch_array($city);
							 
							 $status=mysqli_query($db,'select EmpStatus from tblempstatus where ESid="'.$user['ESid'].'"');
                             $row_status=mysqli_fetch_array($status);*/
							 
							 $reporting=mysqli_query($db,'select User_Name from tbluserinfodetail where Userid="'.$user['Incharge_Code'].'"');
                             $row_reporting=mysqli_fetch_array($reporting);
					
                             $foc="";
                             $w="";
                             $oc="";
                             
                             $select=mysqli_query($db,"select * from tblobjectives where 
                             Userid='".$user['Userid']."' and 
                             OYear='".date('Y')."'");
                            
                              
                             while($row = mysqli_fetch_array($select)){	
                             $count=$count+1;
                             $select2=mysqli_query($db,"select * from  tblobjectivereview where 
                             Oid='".$row['Oid']."' and 
                             OYear='".date('Y')."'");
                             $row2 = mysqli_fetch_array($select2);
                            	
                         
                             $w=$w+$row['Weightage'];
                             $oc=($row['Weightage'] / 5) * $row2['OOutComes'];
                             $foc=$foc + $oc;
                            
                            }
                             
                             
					  
					  ?>
					  <tr id="html<?php echo $user['Userid'];?>">
					      
                          <td><?php echo $user['Userid'];?></td>
						  <td><?php echo $user['User_Name'];?> </td>		  
						  <td><?php echo $user['Designation'];?> <br>
							  <?php echo $user['Department'];?></td> 
						  <td><?php echo $user['Incharge_Code'];?></td> 
						  <td><?php echo $row_reporting['User_Name'];?> </td>
						  <td><?php echo $user['Date_Of_Joining'];?>
						  </td>
						  <td><?php echo $user['EYear'];?></td>
                          <td><?php echo $foc;?></td>
                          
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
              <!-- panel --> 
            </div>
            <!-- col-sm-4 --> 
          </div>
          <!-- row -->
        </div>
          <!-- .vd_content-section --> 
        </div>
		</div>
        <!-- .vd_content --> 
      </div>
      <!-- .vd_container --> 
    </div>
    <!-- .vd_content-wrapper --> 
    
    <!-- Middle Content End --> 
	
    <?php include("include/right-sidebar.php");?>
	
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

<script type="text/javascript" src="plugins/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
				"use strict";
				$('#data-tables').dataTable();
		} );
</script>


</body>

</html>