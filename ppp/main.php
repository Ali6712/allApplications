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
    <title><?php echo $title;?> </title>
    <meta name="keywords" content="People Performance Process" />
    <meta name="description" content="People Performance Process ">
    <meta name="author" content="Venmond">
    
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
                <li class="active">Welcome</li>
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
              
					<h1 >People Performance Process</h1>
			 
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
<div class="col-sm-12">
                <div class="panel widget light-widget panel-bd-left">
                
                  <div class="panel-body">
                    <h2 class="mgtp--5"> Welcome </h2>
                   <div class="col-md-8 col-lg-6 col-sm-12">

				   <p>  Welcome to the BINRASHEED Group People Performance Process (PPP).</p>
                    <p style="text-align:justify">The fundamental goal of performance management is to promote and improve employee effectiveness. It is a continuous process where managers and employees work together to plan, monitor and review an employee’s work objectives or goals and his or her overall contribution to the organization.

Before we create a effective performance management system for our clients, we review the following:</p>
<ul>
                           <li>Establish your own performance goals for a given year after you have discussed them with your immediate supervisor </li>
                           <li>Conduct a mid-year review to ensure that you are on the right track</li>
                           <li>Evaluate performance at the end of the year</li>
                         </ul>
						 
						 <p style="text-align:justify">At the heart of PPP is the dialogue meeting with your immediate supervisor – during goal setting, mid-year review and year-end review. Indeed, in the absence of these dialogue meetings, the PPP tool loses its essence. Hence you and your immediate supervisor are required to have a dialogue during each of the three stages of the PPP.
</p>


 <p style="text-align:justify">The PPP tool will bring greater clarity to your role and the expectations from your role. Similarly, it will help to determine your actual value addition during the year. While this transparency is beneficial for you, it will also enable the organization to differentiate between employees based on individual contributions. 
</p>



<p style="text-align:justify">The management joins me in wishing you the very best in your performance endeavors. 
</p>


<p style="text-align:justify"> Yours Sincerely, 
</p>



<p style="text-align:justify">  Human Resources BINRASHEED
</p>
                     </div>
					 
					 
					  <div class="col-md-4 col-lg-6 col-sm-12">
					  <img src="img/ppp.png">
					  
					  </div>
                  </div>
                </div>
                <!-- Panel Widget --> 
                
              </div>
			 
			 </div>
            <!-- .row -->
            
          </div>
          <!-- .vd_content-section --> 
		  
		  

		  
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

<?php FUNCTION getTimeDiff($dtime,$atime){
 
 $nextDay=$dtime>$atime?1:0;
 $dep=EXPLODE(':',$dtime);
 $arr=EXPLODE(':',$atime);
 $diff=ABS(MKTIME($dep[0],$dep[1],0,DATE('n'),DATE('j'),DATE('y'))-MKTIME($arr[0],$arr[1],0,DATE('n'),DATE('j')+$nextDay,DATE('y')));
 $hours=FLOOR($diff/(60*60));
 $mins=FLOOR(($diff-($hours*60*60))/(60));
 $secs=FLOOR(($diff-(($hours*60*60)+($mins*60))));
 IF(STRLEN($hours)<2){$hours="0".$hours;}
 IF(STRLEN($mins)<2){$mins="0".$mins;}
 IF(STRLEN($secs)<2){$secs="0".$secs;}
 RETURN $hours.':'.$mins.':'.$secs;
}
?>

<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<?php include('include/head-footer.php');?>

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
	
	

$( "#A_Date" ).datepicker({ dateFormat: 'yy-mm-dd'});


	$( '[data-datepicker]' ).click(function(e){ 
		var data=$(this).data('datepicker');
		$(data).focus();
	});
</script>

</body>

<!-- Mirrored from www.venmond.com/demo/vendroid/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Dec 2016 18:04:02 GMT -->
</html>