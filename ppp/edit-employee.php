<?php
include("include/security.php");
include("include/conn.php");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="ie ie8"> <![endif]-->
<!--[if IE 9]> <html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html><!--<![endif]-->

<!-- Specific Page Data -->

<!-- End of Data -->


<!-- Mirrored from www.venmond.com/demo/vendroid/layouts-double-sidenav.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Dec 2016 18:04:10 GMT -->
<head>
    <meta charset="utf-8" />
    <title><?php echo $title;?> New Employee </title>
    <meta name="keywords" content="HTML5 Template, CSS3, All Purpose Admin Template, Vendroid" />
    <meta name="description" content="Layout Double Side Nav - Responsive Admin HTML Template ">
    <meta name="author" content="Venmond">
   
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
   
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.html">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="img/ico/favicon.png">
   
<?php include('include/head.php');?>

<style>

.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.cropit-preview {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 7px;
        width:300px;
        height:250px;
      }

      .cropit-preview-image-container {
        cursor: move;
      }

      .image-size-label {
        margin-top: 10px;
      }
 
</style>
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
                <li><a href="employees-list.php">Employees List</a></li>
                <li class="active">Edit Employee</li>
              </ul>
              <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
    <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
      <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
      <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
     
</div>
            </div>
          </div>
 
          <div class="vd_title-section clearfix">
            <div class="vd_panel-header">
              <h1>New Employee</h1>
          </div>
 
          <div class="vd_content-section clearfix">
            <div class="row">
              <div class="col-sm-12">
                <div class="panel widget light-widget">
                  <div class="panel-heading no-title"> </div>
 
                  <form action="controllars/emp.php?edit=employee" method="post" data-parsley-validate enctype="multipart/form-data" class="form-horizontal" role="form">
                    <div  class="panel-body">
                      <div class="row">
                       
                        <div class="col-sm-9">
                           <?php 
					        $ud= mysql_query("SELECT * FROM tbluserinfodetail where Userid='".$_GET['Userid']."'");
					        $user = mysql_fetch_array($ud);
						   
						     
					  
					  ?>
                          <h3 class="mgbt-xs-15">Profile Detail</h3>
						  
						  <div class="form-group">
                            <label class="col-sm-3 control-label">Company</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <select id="Cid" name="Cid">
<option> Select Any... </option>

<?php

$company= mysql_query("SELECT * FROM tblcompany");
while($cm = mysql_fetch_array($company)){

?>

<option value="<?php echo $cm['Cid'];?>"   <?php if($user['Cid']==$cm['Cid']){echo "selected='selected'";}?>><?php echo $cm['CName'];?>  </option>

<?php

}
?>

 </select>
                                </div>
                                <!-- col-xs-9 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
						  
						  
<div class="form-group">
                            <label class="col-sm-3 control-label">Employee Code</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" id="Userid" name="Userid" placeholder="Employee Code" value="<?php echo $user['Userid'];?>" readonly>
                                </div>
                                <!-- col-xs-12 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>                         
						 <div class="form-group">
                            <label class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" id="User_Name" name="User_Name" placeholder=" Employee Name" value="<?php echo $user['User_Name'];?>" required>
                                </div>
                                <!-- col-xs-9 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <!-- form-group -->
<?php if($user['Gender']=='Male'){ $Male="checked='checked'";}?>
<?php if($user['Gender']=='Female'){ $Female="checked='checked'";}?> 
                         
                          <!-- form-group -->
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Gender</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <span class="vd_radio radio-info">
                                    <input type="radio" name="Gender" value="Male" id="optionsRadios3" <?php echo $Male;?>>
                                    <label for="optionsRadios3"> Male </label>
                                  </span>
                                  <span class="vd_radio  radio-danger">
                                    <input type="radio" name="Gender" value="Female" id="optionsRadios4" <?php echo $Female;?>>
                                    <label for="optionsRadios4"> Female </label>
                                  </span>
                                </div>
                                <!-- col-xs-9 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <!-- form-group -->
       
                          <div class="form-group">
                            <label class="col-sm-3 control-label">CNIC</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" id="CNIC" name="CNIC"  value="<?php echo $user['CNIC'];?>" required>
                                </div>
                                <!-- col-xs-12 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 --> 
                          </div>
                          <!-- form-group -->
 
                           <div class="form-group">
                            <label class="col-sm-3 control-label">DOB</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" id="Date_Of_Birth" name="Date_Of_Birth" placeholder="YYYY-MM-DD" value="<?php echo $user['Date_Of_Birth'];?>" >
                                </div>
                                <!-- col-xs-12 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <!-- form-group -->
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Contact No</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <input type="text" id="Mobile_No_1" name="Mobile_No_1" placeholder="0323-4787340" value="<?php echo $user['Mobile_No_1'];?>" >
                                </div>
                                <!-- col-xs-12 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <!-- form-group -->
 
 
                        <div class="form-group">
                            <label class="col-sm-3 control-label">City</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <select id="Cityid" name="Cityid" required>
<option value='0'> Select Any... </option>

<?php

$dq= mysql_query("SELECT * FROM tblcities ORDER BY Cityid");
while($dept = mysql_fetch_array($dq)){

?>

<option value="<?php echo $dept['Cityid'];?>"   <?php if($user['Cityid']==$dept['Cityid']){echo "selected='selected'";}?>><?php echo $dept['CityName'];?>  </option>

<?php

}
?>

 </select>
                                </div>
                                <!-- col-xs-9 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <!-- form-group -->
 
 
 <hr/>
                          <h3 class="mgbt-xs-15">Company Detail</h3>
                         
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Department</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <select id="Deptid" name="Deptid" required>
<option value='0'> Select Any... </option>

<?php

$dp= mysql_query("SELECT * FROM tbldept ORDER BY DeptName ASC");
while($dept = mysql_fetch_array($dp)){

?>

<option value="<?php echo $dept['Deptid'];?>" <?php if($user['Deptid']==$dept['Deptid']){echo "selected='selected'";}?>><?php echo $dept['DeptName'];?>  </option>

<?php

}
?>

 </select>
                                </div>
                                <!-- col-xs-9 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <!-- form-group -->
 
 <div class="form-group">
                            <label class="col-sm-3 control-label">Designation</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <select id="Desigid" name="Desigid" required>
<option value='0'> Select Any... </option>

<?php

$dq= mysql_query("SELECT * FROM tbldesignations ORDER BY DesigName ASC");
while($dept = mysql_fetch_array($dq)){

?>

<option value="<?php echo $dept['Desigid'];?>" <?php if($user['Desigid']==$dept['Desigid']){echo "selected='selected'";}?>><?php echo $dept['DesigName'];?>  </option>

<?php

}
?>

 </select>
                                </div>
                                <!-- col-xs-9 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <!-- form-group -->
 
  <div class="form-group">
                            <label class="col-sm-3 control-label">Reporting to</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <select id="Incharge_Code" name="Incharge_Code" required>
 <option value='0'> Select Any... </option>

<?php

$rept= mysql_query("SELECT Userid FROM tbluserinfodetail order by User_Name asc");
while($rep = mysql_fetch_array($rept)){
   $reptn= mysql_query("SELECT User_Name FROM tbluserinfodetail where Userid='".$rep['Userid']."'");
$repn = mysql_fetch_array($reptn);

?>

<option value="<?php echo $rep['Userid'];?>" <?php if($user['Incharge_Code']==$rep['Userid']){echo "selected='selected'";}?>><?php echo $repn['User_Name'].'-'.$rep['Userid'];?>  </option>

<?php

}
?>

 </select>
                                </div>
                                <!-- col-xs-9 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>

  <div class="form-group">
                            <label class="col-sm-3 control-label">HOD</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <select id="HOD_Code" name="HOD_Code" required>
 <option value='0'> Select Any... </option>

<?php

$rept= mysql_query("SELECT Userid FROM tbluserinfodetail order by User_Name asc");
while($rep = mysql_fetch_array($rept)){
   $reptn= mysql_query("SELECT User_Name FROM tbluserinfodetail where Userid='".$rep['Userid']."'");
$repn = mysql_fetch_array($reptn);

?>

<option value="<?php echo $rep['Userid'];?>" <?php if($user['HOD_Code']==$rep['Userid']){echo "selected='selected'";}?>><?php echo $repn['User_Name'].'-'.$rep['Userid'];?>  </option>

<?php

}
?>

 </select>
                                </div>
                                <!-- col-xs-9 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
 
 <div class="form-group">
                            <label class="col-sm-3 control-label">Date Of Joining</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
<input type="text" name="Date_Of_Joining" placeholder="YYYY/MM/DD" id="Date_Of_Joining" value="<?php echo $user['Date_Of_Joining'];?>" required>
                                </div>
                                <!-- col-xs-12 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <!-- form-group -->
 
 <!-- form-group -->
                         
<?php if($user['ESid']==1){ $_1="checked='checked'";}?>
<?php if($user['ESid']==2){ $_2="checked='checked'";}?> 
 <!-- form-group -->
                          <div class="form-group">
                            <label class="col-sm-3 control-label"> Employee Status </label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                  <span class="vd_radio radio-info">
                                    <input type="radio" name="ESid" value="1" id="optionsRadios11" <?php echo $_1;?> >
                                    <label for="optionsRadios11"> Active </label>
                                  </span>
                                  <span class="vd_radio  radio-danger">
                                    <input type="radio" name="ESid" value="2" id="optionsRadios12" <?php echo $_2;?>>
                                    <label for="optionsRadios12"> Inactive </label>
                                  </span>
                                </div>
                                <!-- col-xs-9 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
                          <!-- form-group -->

 <div class="form-group">
                            <label class="col-sm-3 control-label">Hiring Month</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                <select id="MO" name="MO" class="col-sm-5 controls" >
                               <option value="" ></option>  
                               <option value="01" <?php if($user['HiringMonth']=='01'){echo 'selected="selected"';}?>>Jan</option>  
                               <option value="02" <?php if($user['HiringMonth']=='02'){echo 'selected="selected"';}?>>Feb</option> 
                               <option value="03" <?php if($user['HiringMonth']=='03'){echo 'selected="selected"';}?>>Mar</option> 
                               <option value="04" <?php if($user['HiringMonth']=='04'){echo 'selected="selected"';}?>>Apr</option> 
                               <option value="05" <?php if($user['HiringMonth']=='05'){echo 'selected="selected"';}?>>May</option> 
                               <option value="06" <?php if($user['HiringMonth']=='06'){echo 'selected="selected"';}?>>Jun</option> 
                               <option value="07" <?php if($user['HiringMonth']=='07'){echo 'selected="selected"';}?>>Jul</option>
                               <option value="08" <?php if($user['HiringMonth']=='08'){echo 'selected="selected"';}?>>Aug</option> 
                               <option value="09" <?php if($user['HiringMonth']=='09'){echo 'selected="selected"';}?>>Sep</option> 
                               <option value="10" <?php if($user['HiringMonth']=='10'){echo 'selected="selected"';}?>>Oct</option>
                               <option value="11" <?php if($user['HiringMonth']=='11'){echo 'selected="selected"';}?>>Nov</option>  
                               <option value="12" <?php if($user['HiringMonth']=='12'){echo 'selected="selected"';}?>>Dec</option>    
                               
                          
                          </select>
                                </div>
                                <!-- col-xs-12 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
						  
						  
						   <div class="form-group">
                            <label class="col-sm-3 control-label">Year</label>
                            <div class="col-sm-9 controls">
                              <div class="row mgbt-xs-0">
                                <div class="col-xs-9">
                                <select id="YR" name="YR" class="col-sm-5 controls">
                               <?php $year='2011';?>
                               <option value=""></option>
                               <?php 
							        
								  while($i<=18){
								  $i=$i+1;
								  $year=$year + 1;
								  
									
								   ?>
                                  <option value="<?php echo $year;?>" <?php if($user['HiringYear']==$year){echo 'selected="selected"';}?>><?php echo $year;?></option>
                                 <?php } ?>
                              
                              
                               
                          
                          </select>
                                </div>
                                <!-- col-xs-12 -->
                              </div>
                              <!-- row -->
                            </div>
                            <!-- col-sm-10 -->
                          </div>
						  
                        </div>
                        <!-- col-sm-12 -->
                      </div>
                      <!-- row -->
                     
                    </div>
                    <!-- panel-body -->
                    <div class="pd-20" align="center">
                      <button class="btn vd_btn vd_bg-green col-md-offset-3" ><span class="menu-icon"><i class="fa fa-fw fa-check"></i></span> Save </button>
                    </div>
                  </form>
                </div>
                <!-- Panel Widget -->
              </div>
              <!-- col-sm-12-->
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
<!-- .vc_body END  -->
<a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

<!--
<a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

<?php //include('include/head-footer.php');?>
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
 
<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src='plugins/tagsInput/jquery.tagsinput.min.js'></script>

<script type="text/javascript" src='plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'></script>
<script type="text/javascript" src='plugins/daterangepicker/moment.min.js'></script>
<script type="text/javascript" src='plugins/daterangepicker/daterangepicker.js'></script>
<script type="text/javascript" src='plugins/colorpicker/colorpicker.js'></script>
<script type="text/javascript" src='plugins/ckeditor/ckeditor.js'></script>
<script type="text/javascript" src='plugins/ckeditor/adapters/jquery.js'></script>

<script type="text/javascript" src="plugins/bootstrap-wysiwyg/js/wysihtml5-0.3.0.min.js"></script>
<script type="text/javascript" src="plugins/bootstrap-wysiwyg/js/bootstrap-wysihtml5-0.0.2.js"></script>



<script type="text/javascript">
$(window).load(function()
{

$( "#Date_Of_Birth" ).datepicker({ dateFormat: 'yy-mm-dd'});
$( "#Date_Of_Joining" ).datepicker({ dateFormat: 'yy-mm-dd'});

    $('#timepicker-default').timepicker();
$('#timepicker-full').timepicker({
minuteStep: 1,
template: false,
showSeconds: true,
showMeridian: false,
});






})
</script>

<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="../../../blueimp.github.io/JavaScript-Load-Image/js/load-image.min.html"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="../../../blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="plugins/jquery-file-upload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="plugins/jquery-file-upload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="plugins/jquery-file-upload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="plugins/jquery-file-upload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="plugins/jquery-file-upload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="plugins/jquery-file-upload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="plugins/jquery-file-upload/js/jquery.fileupload-validate.js"></script>


<script src="js/jquery.cropit.js"></script>
<script src="js/jquery-3.1.1.min"></script>
<script>
      $(function() {
        $('.image-editor').cropit({
          imageState: {
            src: 'http://lorempixel.com/500/400/',
          },
        });

        $('.rotate-cw').click(function() {
          $('.image-editor').cropit('rotateCW');
        });
        $('.rotate-ccw').click(function() {
          $('.image-editor').cropit('rotateCCW');
        });
      });
    </script>

<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'plugins/jquery-file-upload/server/php/',
        uploadButton = $('<button/>')
            .addClass('btn vd_btn vd_bg-blue')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 5000000, // 5 MB
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append($('<span class="text-danger"/>').text(file.error));
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .progress-bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            if (file.url) {
                var link = $('<a>')
                    .attr('target', '_blank')
                    .prop('href', file.url);
                $(data.context.children()[index])
                    .wrap(link);
            } else if (file.error) {
                var error = $('<span class="text-danger"/>').text(file.error);
                $(data.context.children()[index])
                    .append('<br>')
                    .append(error);
            }
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index, file) {
            var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');


$('#wysiwyghtml').wysihtml5();
});
</script>
<!-- Specific Page Scripts END -->

</body>

<!-- Mirrored from www.venmond.com/demo/vendroid/layouts-double-sidenav.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Dec 2016 18:04:10 GMT -->
</html>