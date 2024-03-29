<?php include("include/security.php");?>
<?php include("include/conn.php");?>

<?php 
$developments= mysqli_query($db,"SELECT * FROM tblrank1 where r1_id='".base64_decode($_GET['id'])."' and r1_created_by='".$_SESSION['user_id']."'");
$development = mysqli_fetch_array($developments);

$developments_r2= mysqli_query($db,"SELECT * FROM tblrank2 where r1_id='".base64_decode($_GET['id'])."'");
$development_r2 = mysqli_fetch_array($developments_r2);
?>

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
        <a href="dashboard.php">
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
                    <li class="breadcrumb-item active" aria-current="page">New Development - Rank 2B</li>
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
  <div class="col-md-12">

            
                    <h6 class="card-title">Product Development Form - General Requirement</h6>
                    <div class="accordion accordion-success custom-accordion">
						<?php 
						$pls=mysqli_query($db,"select rpl.r1_pl_id,psl.pld_name,pl.pl_name
									from tblrank1productlines rpl,tblproductsublines psl,tblproductlines pl
									where
									rpl.r1_id='".base64_decode($_GET['id'])."' and rpl.pld_id=psl.pld_id and psl.pl_id=pl.pl_id");
				        while($pl = mysqli_fetch_array($pls)){  
						$count = $count + 1;
						
						$check=mysqli_query($db,"select * from tblrank2detail where r1_pl_id='".$pl['r1_pl_id']."'");
						$num  = mysqli_num_rows($check);
						
						if($num>0){
							
							$background='style="background: #0abb87 !important;border-bottom: 2px solid #fff !important;"';
							
						}else{
							
							$background='';
						}
						
						$row_c = mysqli_fetch_array($check);
						
						?><form method="post" action="controllers/development.php?r1_pl_id=<?php echo $pl['r1_pl_id'];?>&insert=rank_2b&id=<?php echo $_GET['id'];?>" enctype="multipart/form-data">
                        <div class="accordion-row open" <?php echo $background;?>>
                            <a href="#" class="accordion-header">
                                <span><?php echo $count;?> - <?php echo $pl['pl_name'];?> - <?php echo $pl['pld_name'];?></span>
                                <i class="accordion-status-icon close fa fa-chevron-up"></i>
                                <i class="accordion-status-icon open fa fa-chevron-down"></i>
                            </a>
                            <div class="accordion-body">
							
							 <div class="form-row">
                              <div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Product Description </label>
								<div class="input-group">
										<input type="text" class="form-control" id="pd_description<?php echo $pl['r1_pl_id'];?>" name="pd_description<?php echo $pl['r1_pl_id'];?>" value="<?php echo $row_c['pd_description'];?>" >
									   
									</div>
								</div>
								
								 <div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Product Category  </label>
								<div class="input-group">
										<select id="pc_id<?php echo $pl['r1_pl_id'];?>" name="pc_id<?php echo $pl['r1_pl_id'];?>" class="form-control">
											   <option value="">Select</option>
											<?php 
											   $categories= mysqli_query($db,"SELECT * FROM tblproductcategory where pc_status='1' order by pc_name asc");
											   while($category = mysqli_fetch_array($categories)){   
											?>
											   <option value="<?php echo $category['pc_id'];?>" <?php if($category['pc_id']==$row_c['pc_id']){echo "selected='selected'";}?>><?php echo $category['pc_name'];?></option>
											
											<?php } ?>
									   </select>
									   
									</div>
								</div>
								
								 <div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Standard Sample Arranged</label>
								<div class="input-group">
										<select id="standard_sample_arranged<?php echo $pl['r1_pl_id'];?>" name="standard_sample_arranged<?php echo $pl['r1_pl_id'];?>" class="form-control">
											   <option value="">Select</option>
											<?php 
											   $yno= mysqli_query($db,"SELECT * FROM tblyesno");
											   while($yn = mysqli_fetch_array($yno)){   
											?>
											   <option value="<?php echo $yn['yn_option'];?>" <?php if($yn['yn_option']==$row_c['standard_sample_arranged']){echo "selected='selected'";}?>><?php echo $yn['yn_option'];?></option>
											
											<?php } ?>
									   </select>
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Substrate Sample Available</label>
								<div class="input-group">
										<select id="substrate_sample_available<?php echo $pl['r1_pl_id'];?>" name="substrate_sample_available<?php echo $pl['r1_pl_id'];?>" class="form-control">
											   <option value="">Select</option>
											<?php 
											   $yno= mysqli_query($db,"SELECT * FROM tblyesno");
											   while($yn = mysqli_fetch_array($yno)){   
											?>
											   <option value="<?php echo $yn['yn_option'];?>" <?php if($yn['yn_option']==$row_c['substrate_sample_available']){echo "selected='selected'";}?>><?php echo $yn['yn_option'];?></option>
											
											<?php } ?>
									   </select>
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Finished Article Available</label>
								<div class="input-group">
										<select id="finished_article_available<?php echo $pl['r1_pl_id'];?>" name="finished_article_available<?php echo $pl['r1_pl_id'];?>" class="form-control">
											   <option value="">Select</option>
											<?php 
											   $yno= mysqli_query($db,"SELECT * FROM tblyesno");
											   while($yn = mysqli_fetch_array($yno)){   
											?>
											   <option value="<?php echo $yn['yn_option'];?>" <?php if($yn['yn_option']==$row_c['finished_article_available']){echo "selected='selected'";}?>><?php echo $yn['yn_option'];?></option>
											
											<?php } ?>
									   </select>
									   
									</div>
								</div>
								
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Date of dispatch to factory</label>
								<div class="input-group">
								
									   <?php 
									   
									   
									   if($row_c["dispatch_to_factory"]!=''){
									       
									       $dispatch_to_factory = explode('-',$row_c['dispatch_to_factory']);
                						$dispatch_to_factory = explode('-',$row_c['dispatch_to_factory']);
                	                    $dispatch_to_factory = $dispatch_to_factory[1].'/'.$dispatch_to_factory[2].'/'.$dispatch_to_factory[0];
                						}
									   ?>
									   <input type="text" class="form-control" id="dispatch_to_factory" name="dispatch_to_factory" value="<?php echo $dispatch_to_factory;?>" >
									  
									   
									   
									</div>
								</div>
								
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Marked To</label>
								<div class="input-group">
										<select id="marked_to_id<?php echo $pl['r1_pl_id'];?>" name="marked_to_id<?php echo $pl['r1_pl_id'];?>" class="form-control">
											   <option value="">Select</option>
											<?php 
											   $users= mysqli_query($db,"SELECT * FROM tblusers where user_type='Lab' and user_login_flag='1'");
											   while($user = mysqli_fetch_array($users)){   
											?>
											   <option value="<?php echo $user['user_id'];?>" <?php if($user['user_id']==$row_c['marked_to_id']){echo "selected='selected'";}?>><?php echo $user['user_name'];?></option>
											
											<?php } ?>
									   </select>
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Required Date</label>
								<div class="input-group">
									
									   <?php 
									  
									   
									   if($row_c["required_date"]!=''){
									       
									        $required_date = explode('-',$row_c['required_date']);
                						$required_date = explode('-',$row_c['required_date']);
                	                    $required_date = $required_date[1].'/'.$required_date[2].'/'.$required_date[0];
                						}
									   ?>
									   <input type="text" class="form-control" id="required_date" name="required_date" value="<?php echo $required_date;?>" >
									</div>
								</div>
								
								<div class="col-md-4 mb-3">
								<label for="validationTooltipUsername">Attachment </label>
								<div class="input-group">
										<input type="file" class="form-control" id="attachment<?php echo $pl['r1_pl_id'];?>" name="attachment<?php echo $pl['r1_pl_id'];?>" >
									</div>
								</div>
								<div class="col-md-2 mb-3">
								<label for="validationTooltipUsername"><br> </label>
								<div class="input-group">
										
									   <a href="upload/<?php echo $row_c['attachment'];?>" target="_blank">View Uploaded Attachment</a>
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Any other info/Remarks </label>
								<div class="input-group">
										<input type="text" class="form-control" id="remarks<?php echo $pl['r1_pl_id'];?>" name="remarks<?php echo $pl['r1_pl_id'];?>"  value="<?php echo $row_c['remarks'];?>">
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Total  Consumption (Kg)
 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="total_consumption<?php echo $pl['r1_pl_id'];?>" name="total_consumption<?php echo $pl['r1_pl_id'];?>"  value="<?php echo $row_c['total_consumption'];?>">
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Expected Volume (E.P) Kg/Month
 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="expected_volume_p_month<?php echo $pl['r1_pl_id'];?>" name="expected_volume_p_month<?php echo $pl['r1_pl_id'];?>"  value="<?php echo $row_c['expected_volume_p_month'];?>">
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Current Source
 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="current_source<?php echo $pl['r1_pl_id'];?>" name="current_source<?php echo $pl['r1_pl_id'];?>"  value="<?php echo $row_c['current_source'];?>">
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">FDA Requirement
 </label>
								<div class="input-group">
						
									   <select id="fda_requirement<?php echo $pl['r1_pl_id'];?>" name="fda_requirement<?php echo $pl['r1_pl_id'];?>" class="form-control">
											   <option value="">Select</option>
											<?php 
											   $yno= mysqli_query($db,"SELECT * FROM tblyesno");
											   while($yn = mysqli_fetch_array($yno)){   
											?>
											   <option value="<?php echo $yn['yn_option'];?>" <?php if($yn['yn_option']==$row_c['fda_requirement']){echo "selected='selected'";}?>><?php echo $yn['yn_option'];?></option>
											
											<?php } ?>
									   </select>
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">PD Priority Status  </label>
								<div class="input-group">
										
									    <select id="pd_priority_status<?php echo $pl['r1_pl_id'];?>" name="pd_priority_status<?php echo $pl['r1_pl_id'];?>" class="form-control">
											   <option value="">Select</option>
											<?php 
											   $priorities= mysqli_query($db,"SELECT * FROM tblpriority");
											   while($priority = mysqli_fetch_array($priorities)){   
											?>
											   <option value="<?php echo $priority['p_option'];?>" <?php if($priority['p_option']==$row_c['pd_priority_status']){echo "selected='selected'";}?>><?php echo $priority['p_option'];?></option>
											
											<?php } ?>
									   </select>
									</div>
								</div>
								
								
								
								</div>
								
								<h6 class="card-title">Technical Requirement</h6>
								<div class="form-row">
								
									<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Base Resin Grade
 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="t_base_resin_grade<?php echo $pl['r1_pl_id'];?>" name="t_base_resin_grade<?php echo $pl['r1_pl_id'];?>" value="<?php echo $row_c['t_base_resin_grade'];?>" >
									   
									</div>
								</div>
								
								
									<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Dosage %
 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="t_dosage_per<?php echo $pl['r1_pl_id'];?>" name="t_dosage_per<?php echo $pl['r1_pl_id'];?>"  value="<?php echo $row_c['t_dosage_per'];?>">
									   
									</div>
								</div>
								
								
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Gloss
 </label>
								<div class="input-group">
						
									   <select id="t_gloss<?php echo $pl['r1_pl_id'];?>" name="t_gloss<?php echo $pl['r1_pl_id'];?>" class="form-control">
											   <option value="">Select</option>
											<?php 
											   $hlo= mysqli_query($db,"SELECT * FROM tblhighlow");
											   while($hl = mysqli_fetch_array($hlo)){   
											?>
											   <option value="<?php echo $hl['hl_option'];?>" <?php if($hl['hl_option']==$row_c['t_gloss']){echo "selected='selected'";}?>><?php echo $hl['hl_option'];?></option>
											
											<?php } ?>
									   </select>
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Opacity
 </label>
								<div class="input-group">
						
									   <select id="t_opacity<?php echo $pl['r1_pl_id'];?>" name="t_opacity<?php echo $pl['r1_pl_id'];?>" class="form-control">
											   <option value="">Select</option>
											<?php 
											   $opacities= mysqli_query($db,"SELECT * FROM tblopacity");
											   while($opacity = mysqli_fetch_array($opacities)){   
											?>
											   <option value="<?php echo $opacity['o_option'];?>" <?php if($opacity['o_option']==$row_c['t_opacity']){echo "selected='selected'";}?>><?php echo $opacity['o_option'];?></option>
											
											<?php } ?>
									   </select>
									</div>
								</div>
								
								
									
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Heat Stability 
 </label>
								<div class="input-group">
						
									   <select id="t_heat_stability<?php echo $pl['r1_pl_id'];?>" name="t_heat_stability<?php echo $pl['r1_pl_id'];?>" class="form-control">
											   <option value="">Select</option>
											<?php 
											   $heats= mysqli_query($db,"SELECT * FROM tblheat");
											   while($heat = mysqli_fetch_array($heats)){   
											?>
											   <option value="<?php echo $heat['h_option'];?>" <?php if($heat['h_option']==$row_c['t_heat_stability']){echo "selected='selected'";}?>><?php echo $heat['h_option'];?></option>
											
											<?php } ?>
									   </select>
									</div>
								</div>
								
										<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Light Stabilty 

 </label>
								<div class="input-group">
						
									   <select id="t_light_stability<?php echo $pl['r1_pl_id'];?>" name="t_light_stability<?php echo $pl['r1_pl_id'];?>" class="form-control">
											   <option value="">Select</option>
											<?php 
											   $lights= mysqli_query($db,"SELECT * FROM tbllight");
											   while($light = mysqli_fetch_array($lights)){   
											?>
											   <option value="<?php echo $light['l_option'];?>" <?php if($light['l_option']==$row_c['t_light_stability']){echo "selected='selected'";}?>><?php echo $light['l_option'];?></option>
											
											<?php } ?>
									   </select>
									</div>
								</div>
								
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Flame Retardant
 </label>
								<div class="input-group">
						
									   <select id="t_flame_retardant<?php echo $pl['r1_pl_id'];?>" name="t_flame_retardant<?php echo $pl['r1_pl_id'];?>" class="form-control">
											   <option value="">Select</option>
											<?php 
											   $yno= mysqli_query($db,"SELECT * FROM tblyesno");
											   while($yn = mysqli_fetch_array($yno)){   
											?>
											   <option value="<?php echo $yn['yn_option'];?>" <?php if($yn['yn_option']==$row_c['t_flame_retardant']){echo "selected='selected'";}?>><?php echo $yn['yn_option'];?></option>
											
											<?php } ?>
									   </select>
									</div>
								</div>
								
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Any Special Requirement
 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="t_any_o_requirment<?php echo $pl['r1_pl_id'];?>" name="t_any_o_requirment<?php echo $pl['r1_pl_id'];?>" value="<?php echo $row_c['t_any_o_requirment'];?>" >
									   
									</div>
								</div>
								
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Required Sample Qty (Kg)

 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="t_required_sample<?php echo $pl['r1_pl_id'];?>" name="t_required_sample<?php echo $pl['r1_pl_id'];?>" value="<?php echo $row_c['t_required_sample'];?>" >
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Target RMC

 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="t_target_rmc<?php echo $pl['r1_pl_id'];?>" name="t_target_rmc<?php echo $pl['r1_pl_id'];?>" value="<?php echo $row_c['t_target_rmc'];?>" >
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Sales Price

 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="t_sale_price<?php echo $pl['r1_pl_id'];?>" name="t_sale_price<?php echo $pl['r1_pl_id'];?>" value="<?php echo $row_c['t_sale_price'];?>">
									   
									</div>
								</div>
								
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername"><br>

 </label>
								<div class="input-group">
								        
										
									    
										<?php if($num>0 and $row_c['r2_send_flag']=='N'){?>
										<input type="button" class="btn btn-danger  btn-square" value="Send To Lab" onclick="send_to_lab('<?php echo $pl['r1_pl_id'];?>','');">
										<?php }elseif($num==0){?>
										<input type="submit" class="btn btn-primary btn-square" value="Save" style="margin-right:10px;">
										<?php }?>
										
										
									</div>
								</div>
								
								
								</div>
								
								
								
                            </div>
                        </div>
						</form>
                        <?php } ?>
                  
                    </div>
                </div>
          

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
<script src="vendors/datepicker/daterangepicker.js"></script>
<script src="assets/js/examples/datepicker.js"></script>
<!-- App scripts -->
<script src="assets/js/app.min.js"></script>


<script>

function send_to_lab(r1_pl_id){
	
	    var marked_to_id = $('#marked_to_id'+r1_pl_id).val();
	    var pc_id        = $('#pc_id'+r1_pl_id).val();
        var id           = '<?php echo base64_decode($_GET['id']);?>';
        $.post("controllers/development.php",{r1_pl_id:r1_pl_id,marked_to_id:marked_to_id,id:id,pc_id:pc_id,action:'send'},function(data){   
        		window.location.reload();		
        });	
	
	
}

</script>

</body>


</html>