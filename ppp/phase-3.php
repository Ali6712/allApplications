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
<title><?php echo $title;?> Phase 3 </title>
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

<body id="layouts" class="full-layout nav-top-fixed nav-right-small responsive clearfix breakpoint-975 nav-left-medium" data-active="layouts " data-smooth-scrolling="1" >
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
<li class="active">Phase 3</li>
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

<h1>
People Performance Process
</h1>

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
<div class="panel widget light-widget panel-bd-top">

<div class="panel-body">
<table class="table table-striped table-bordered jambo_table">
<thead>
<tr>
<th colspan="2">Standards of Performance</th>
<th colspan="1">Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>1</strong></td>
<td><strong>Unsatisfactory</strong></td>
<td>Does not fulfill the requirement and demands of the job.</td>
</tr>
<tr>
<td><strong>2</strong></td>
<td><strong>Partially Meets Goals</strong></td>
<td>Meets some requirements and demands of the job. The outcome is mostly in line with what is expected. Some gaps exist between expected performance and actual performance.</td>
</tr>
<tr>
<td><strong>3</strong></td>
<td><strong>Fully Meets Goals</strong></td>
<td>Fulfills requirements and demands of the job. The outcome is fully in line with what is expected.</td>
</tr>
<tr>
<td><strong>4</strong></td>
<td><strong>Stretch<br>Exceeds Goal</strong></td>
<td>Exceeds requirements and demands of the job. The outcome is better than what is expected.</td>
</tr>
<tr>
<td><strong>5</strong></td>
<td><strong>Dream<br>Far Exceeds Goal</strong></td>
<td>Clearly exceeds requirements and demands of the job. The outcome notably surpasses the expectations.</td>
</tr>
</tbody>
</table>
</div>
</div>
<!-- Panel Widget --> 

</div>

<div class="col-sm-12">			
<div class="tabs widget">
<ul class="nav nav-tabs widget">
    
    
    <?php if($_SESSION['KPIFlag']!='N'){
     
     
      $active_y = 'active'; 
      $active_n = '';
     }elseif($_SESSION['KPIFlag']=='N'){
    
      $active_y = ''; 
      $active_n = 'active';
      
    
    
     }?>
      <?php if($_SESSION['KPIFlag']!='N'){?>
<li class="<?php echo $active_y;?>"> <a data-toggle="tab" href="#profile-tab"> My Year-End Review <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>
<?php } ?>


<li class="<?php echo $active_n;?>"> <a data-toggle="tab" href="#pe-tab"> Year-End Review (Direct Reports) <span class="menu-active"><i class="fa fa-caret-up"></i></span> </a></li>





</ul>
<div class="tab-content">
 <?php if($_SESSION['KPIFlag']!='N'){?>
<div id="profile-tab" class="tab-pane <?php echo $active_y;?>">
<div class="pd-20"> 
<h3 class="mgbt-xs-15 mgtp-10 font-semibold"><i class="icon-newspaper mgr-10 profile-icon"></i> My Year-End Review</h3>
<div class="row">
<table class="table table-striped  jambo_table " style="width: 100% !important;
max-width: 100%;
margin-bottom: 20px;">
<thead style="background: #41b7de;
color: #ECF0F1;">
<tr class="headings">
<th class="column-title" style="vertical-align: middle;text-align: center;width:25%" rowspan="3">My Performance Objectives </th>
<th class="column-title" style="vertical-align: middle;text-align: center;width:25%" rowspan="3">Action To Be Taken </th>
<th class="column-title" style="vertical-align: middle;text-align: center;width:5%" rowspan="3">Weightage<br>(100%)</th>
<th class="column-title" style="vertical-align: middle;border-bottom: 2px solid #657280;text-align: center;" rowspan="1" colspan="5">Standards of Performance</th>
<th class="column-title" style="vertical-align: middle;text-align: center;" rowspan="2">Outcome </th>
<th class="column-title" style="vertical-align: middle;text-align: center;" rowspan="2">Comments </th>
</tr>
<tr class="headings">
<th class="column-title" style="width:8%; background:#657280;text-align:center">1</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">2</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">3</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">4</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">5</th>
</tr>
<tr class="headings">
<th class="column-title" style="width:8%; background:#657280;text-align:center">Unsatisfactory</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">Partially Meets Objectives</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">Fully Meets Objectives</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">Exceeds Objectives</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">Far Exceeds Objectives</th>
<th class="column-title" style="vertical-align: middle;text-align: center;" colspan="2"></th>
</tr>
</thead>
<tbody>

<?php 

$select=mysqli_query($db,"select * from tblobjectives where 
Userid='".$_SESSION['UserName']."' and 
OYear='".date('Y')."'");


while($row = mysqli_fetch_array($select)){	
$count=$count+1;
$select2=mysqli_query($db,"select * from tblobjectivereview where 
Oid='".$row['Oid']."' and 
OYear='".date('Y')."'");
$row2 = mysqli_fetch_array($select2);



$w=$w+$row['Weightage'];
$oc=($row['Weightage'] / 5) * $row2['OOutComes'];
$foc=$foc + $oc;



if($row['Objective']=='BEHAVIORAL COMPETENCIES'){
    
    $h1='Punctuality<br>';
    $h2='Adaptability<br>';
    $h3='Team_Work<br>';
    $h4='Response_Time<br>';
    $h5='Self_Initiation<br>';
}else{
    
    $h1='';
    $h2='';
    $h3='';
    $h4='';
    $h5='';
}



$num=mysqli_num_rows($select2);
if($num==0 and $count==1){?>

<div class="alert alert-danger"> <span class="vd_alert-icon"><i class="fa fa-exclamation-circle vd_red"></i></span>Year-End Review has not been initiated by your Supervisor.</div>

<?php   }
?>

<tr>
<td><?php echo $row['Objective'];?></td>
<td><?php echo $row['ActionToBe'];?></td>
<td align="center"><?php echo round($row['Weightage']);?></td>
<td align="center"><?php echo $h1.$row['SP1'];?></td>
<td align="center"><?php echo $h2.$row['SP2'];?></td>
<td align="center"><?php echo $h3.$row['SP3'];?></td>
<td align="center"><?php echo $h4.$row['SP4'];?></td>
<td align="center"><?php echo $h5.$row['SP5'];?></td>
<td align="center"><?php echo round($row2['OOutComes']);?> = <?php echo $oc;?></td>
<td><?php echo $row2['OFComments'];?></td>
</tr>
<?php } ?>

<tr>
	<td colspan="2" align="right">Total Weightage</td>
	<td><?php echo round($w);?> %</td>
	<td></td>
	<td></td>
	<td></td>
	<td colspan="2" align="right">Total Marks</td>
	<td align="center"><?php echo $foc;?>%</td>
	<td></td>
	</tr>

</tbody>
</table>

</div> 



</div>
<!-- pd-20 --> 
</div>
<?php } ?>

<div id="pe-tab" class="tab-pane <?php echo $active_n;?>">
<div class="pd-20"> 
<h3 class="mgbt-xs-15 mgtp-10 font-semibold"><i class="icon-newspaper mgr-10 profile-icon"></i> My Direct Reports' Year-End Review</h3>
<div class="row">
<?php if($_SESSION['IsIncharge']==1){?>
<div class="form-group">
<div class="col-xs-3">
<select id="Reportee" name="Reportee" onchange="get_reportee(this.value);">
<option> Select Any... </option>

<?php

$rept= mysqli_query($db,"SELECT * FROM tbluserinfodetail where Incharge_Code='".$_SESSION['UserName']."' order by User_Name asc");
while($rep = mysqli_fetch_array($rept)){


?>

<option value="<?php echo $rep['Userid'];?>"><?php echo $rep['User_Name'];?> </option>

<?php

}
?>

</select>
</div>


</div>

<div class="pd-20"> 
<div class="row" id="get_reportee_3">

</div>

</div>
<?php }else{?>
<p class="mgbt-xs-15 mgtp-10 font-semibold">You have no Direct Report. </p>
<?php } ?>
</div> 



</div>
<!-- pd-20 --> 
</div>





<div id="dr-tab" class="tab-pane">
<div class="pd-20"> 
<h3 class="mgbt-xs-15 mgtp-10 font-semibold"><i class="icon-newspaper mgr-10 profile-icon"></i> My Direct Report's Goals</h3>
<div class="row">



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

<script>

function get_reportee(Userid){


$.post("controllars/objectives.php",{Userid:Userid,get_reportee_3:'get_reportee_3'},function(data){
document.getElementById("get_reportee_3").innerHtml=$("#get_reportee_3").html(data);


});


}

</script>

</body>


</html>