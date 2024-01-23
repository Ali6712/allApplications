<?php include("include/security.php");?>
<?php include("include/conn.php");?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Development Listing</title>
   
    <?php include("include/head.php");?>
    <link rel="stylesheet" href="vendors/dataTable/responsive.bootstrap.min.css" type="text/css">
	
    <link rel="stylesheet" href="vendors/clockpicker/bootstrap-clockpicker.min.css" type="text/css">
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
        <a href="index-2.html">
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
                    <li class="breadcrumb-item active" aria-current="page">Development Listing</li>
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

            
                    <h6 class="card-title">Product Development Form - Rank 3</h6>
                    <div class="accordion accordion-success custom-accordion">
						<?php 
						$pls=mysqli_query($db,"select rpl.r1_pl_id,psl.pld_name,pl.pl_name
									from tblrank1productlines rpl,tblproductsublines psl,tblproductlines pl
									where
									rpl.r1_pl_id='".base64_decode($_GET['id'])."' and rpl.pld_id=psl.pld_id and psl.pl_id=pl.pl_id");
				        $pl = mysqli_fetch_array($pls); 
						$count = $count + 1;
						
						$check=mysqli_query($db,"select * from tblrank2detail where r1_pl_id='".$pl['r1_pl_id']."'");
						$num  = mysqli_num_rows($check);
						
						
						
						$row_c = mysqli_fetch_array($check);
						
						?>
						<form class="needs-validation" novalidate="" action="controllers/development.php?insert=rank3&id=<?php echo $_GET['id'];?>" method="POST"  enctype="multipart/form-data">
                        <div class="accordion-row" >
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
										<input type="text" class="form-control" id="pd_description<?php echo $pl['r1_pl_id'];?>" name="pd_description<?php echo $pl['r1_pl_id'];?>" value="<?php echo $row_c['pd_description'];?>" disabled>
									   
									</div>
								</div>
								
								 <div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Product Category  </label>
								<div class="input-group">
										<select id="pc_id<?php echo $pl['r1_pl_id'];?>" name="pc_id<?php echo $pl['r1_pl_id'];?>" class="form-control" disabled>
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
										<select id="standard_sample_arranged<?php echo $pl['r1_pl_id'];?>" name="standard_sample_arranged<?php echo $pl['r1_pl_id'];?>" class="form-control" disabled>
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
										<select id="substrate_sample_available<?php echo $pl['r1_pl_id'];?>" name="substrate_sample_available<?php echo $pl['r1_pl_id'];?>" class="form-control" disabled>
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
										<select id="finished_article_available<?php echo $pl['r1_pl_id'];?>" name="finished_article_available<?php echo $pl['r1_pl_id'];?>" class="form-control" disabled>
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
									   $dispatch_to_factory = explode('-',$row_c['dispatch_to_factory']);
									   
									   
									   ?>
									   
									   <select id="dispatch_to_factory1<?php echo $pl['r1_pl_id'];?>" name="dispatch_to_factory1<?php echo $pl['r1_pl_id'];?>" class="form-control" style="margin-right:10px;" disabled>
											   <option value="">Day</option>
											<?php 
											  
											   for($k=1;$k<=31;$k++ ){   
											   if(strlen($k)==1){
												   
												   $k='0'.$k;
											   }
											?>
											   <option value="<?php echo $k;?>" <?php if($k==$dispatch_to_factory[2]){echo "selected='selected'";}?>><?php echo $k;?></option>
											
											<?php } ?>
									   </select>
									   
									   <select id="dispatch_to_factory2<?php echo $pl['r1_pl_id'];?>" name="dispatch_to_factory2<?php echo $pl['r1_pl_id'];?>" class="form-control" style="margin-right:10px;" disabled>
											   <option value="">Month</option>
											<?php 
											   
											   for($j=1;$j<=12;$j++ ){   
											   if(strlen($j)==1){
												   
												   $j='0'.$j;
											   }
											?>
											   <option value="<?php echo $j;?>"  <?php if($j==$dispatch_to_factory[1]){echo "selected='selected'";}?>><?php echo $j;?></option>
											
											<?php } ?>
									   </select>
									   
									   <select id="dispatch_to_factory3<?php echo $pl['r1_pl_id'];?>" name="dispatch_to_factory3<?php echo $pl['r1_pl_id'];?>" class="form-control" disabled>
											   <option value="">Year</option>
											<?php 
											   $year=date('Y')+10;
											   for($i=2021;$i<=$year;$i++ ){   
											?>
											   <option value="<?php echo $i;?>"  <?php if($i==$dispatch_to_factory[0]){echo "selected='selected'";}?>><?php echo $i;?></option>
											
											<?php } ?>
									   </select>
									   
									   
									</div>
								</div>
								
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Marked To</label>
								<div class="input-group">
										<select id="marked_to_id<?php echo $pl['r1_pl_id'];?>" name="marked_to_id<?php echo $pl['r1_pl_id'];?>" class="form-control" disabled>
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
									   $required_date = explode('-',$row_c['required_date']);
									   
									   
									   ?>
									   <select id="required_date1<?php echo $pl['r1_pl_id'];?>" name="required_date1<?php echo $pl['r1_pl_id'];?>" class="form-control" style="margin-right:10px;" disabled>
											   <option value="">Day</option>
											<?php 
											  
											   for($k=1;$k<=31;$k++ ){   
											   if(strlen($k)==1){
												   
												   $k='0'.$k;
											   }
											?>
											   <option value="<?php echo $k;?>" <?php if($k==$required_date[2]){echo "selected='selected'";}?>><?php echo $k;?></option>
											
											<?php } ?>
									   </select>
									   
									   <select id="required_date2<?php echo $pl['r1_pl_id'];?>" name="required_date2<?php echo $pl['r1_pl_id'];?>" class="form-control" style="margin-right:10px;" disabled>
											   <option value="">Month</option>
											<?php 
											   
											   for($j=1;$j<=12;$j++ ){   
											   if(strlen($j)==1){
												   
												   $j='0'.$j;
											   }
											?>
											   <option value="<?php echo $j;?>" <?php if($j==$required_date[1]){echo "selected='selected'";}?>><?php echo $j;?></option>
											
											<?php } ?>
									   </select>
									   
									   <select id="required_date3<?php echo $pl['r1_pl_id'];?>" name="required_date3<?php echo $pl['r1_pl_id'];?>" class="form-control" disabled>
											   <option value="">Year</option>
											<?php 
											   $year=date('Y')+10;
											   for($i=2021;$i<=$year;$i++ ){   
											?>
											   <option value="<?php echo $i;?>" <?php if($i==$required_date[0]){echo "selected='selected'";}?>><?php echo $i;?></option>
											
											<?php } ?>
									   </select>
									</div>
								</div>
								
								<div class="col-md-4 mb-3">
								<label for="validationTooltipUsername">Attachment </label>
								<div class="input-group">
										<input type="file" class="form-control" id="attachment<?php echo $pl['r1_pl_id'];?>" name="attachment<?php echo $pl['r1_pl_id'];?>" disabled>
									</div>
								</div>
								<div class="col-md-2 mb-3">
								<label for="validationTooltipUsername"><br> </label>
								<div class="input-group">
										
									   <a href="upload/<?php echo $row_c['attachment'];?>">View Uploaded Attachment</a>
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Any other info/Remarks </label>
								<div class="input-group">
										<input type="text" class="form-control" id="remarks<?php echo $pl['r1_pl_id'];?>" name="remarks<?php echo $pl['r1_pl_id'];?>"  value="<?php echo $row_c['remarks'];?>" disabled>
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Total  Consumption (Kg)
 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="total_consumption<?php echo $pl['r1_pl_id'];?>" name="total_consumption<?php echo $pl['r1_pl_id'];?>"  value="<?php echo $row_c['total_consumption'];?>" disabled>
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Expected Volume (E.P) Kg/Month
 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="expected_volume_p_month<?php echo $pl['r1_pl_id'];?>" name="expected_volume_p_month<?php echo $pl['r1_pl_id'];?>"  value="<?php echo $row_c['expected_volume_p_month'];?>" disabled>
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Current Source
 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="current_source<?php echo $pl['r1_pl_id'];?>" name="current_source<?php echo $pl['r1_pl_id'];?>"  value="<?php echo $row_c['current_source'];?>" disabled>
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">FDA Requirement
 </label>
								<div class="input-group">
						
									   <select id="fda_requirement<?php echo $pl['r1_pl_id'];?>" name="fda_requirement<?php echo $pl['r1_pl_id'];?>" class="form-control" disabled>
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
										
									    <select id="pd_priority_status<?php echo $pl['r1_pl_id'];?>" name="pd_priority_status<?php echo $pl['r1_pl_id'];?>" class="form-control" disabled>
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
										<input type="text" class="form-control" id="t_base_resin_grade<?php echo $pl['r1_pl_id'];?>" name="t_base_resin_grade<?php echo $pl['r1_pl_id'];?>" value="<?php echo $row_c['t_base_resin_grade'];?>" disabled>
									   
									</div>
								</div>
								
								
									<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Dosage %
 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="t_dosage_per<?php echo $pl['r1_pl_id'];?>" name="t_dosage_per<?php echo $pl['r1_pl_id'];?>"  value="<?php echo $row_c['t_dosage_per'];?>" disabled>
									   
									</div>
								</div>
								
								
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Gloss
 </label>
								<div class="input-group">
						
									   <select id="t_gloss<?php echo $pl['r1_pl_id'];?>" name="t_gloss<?php echo $pl['r1_pl_id'];?>" class="form-control" disabled>
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
						
									   <select id="t_opacity<?php echo $pl['r1_pl_id'];?>" name="t_opacity<?php echo $pl['r1_pl_id'];?>" class="form-control" disabled>
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
						
									   <select id="t_heat_stability<?php echo $pl['r1_pl_id'];?>" name="t_heat_stability<?php echo $pl['r1_pl_id'];?>" class="form-control" disabled>
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
						
									   <select id="t_light_stability<?php echo $pl['r1_pl_id'];?>" name="t_light_stability<?php echo $pl['r1_pl_id'];?>" class="form-control" disabled>
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
						
									   <select id="t_flame_retardant<?php echo $pl['r1_pl_id'];?>" name="t_flame_retardant<?php echo $pl['r1_pl_id'];?>" class="form-control" disabled>
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
										<input type="text" class="form-control" id="t_any_o_requirment<?php echo $pl['r1_pl_id'];?>" name="t_any_o_requirment<?php echo $pl['r1_pl_id'];?>" value="<?php echo $row_c['t_any_o_requirment'];?>" disabled>
									   
									</div>
								</div>
								
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Required Sample Qty (Kg)

 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="t_required_sample<?php echo $pl['r1_pl_id'];?>" name="t_required_sample<?php echo $pl['r1_pl_id'];?>" value="<?php echo $row_c['t_required_sample'];?>" disabled>
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Target RMC

 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="t_target_rmc<?php echo $pl['r1_pl_id'];?>" name="t_target_rmc<?php echo $pl['r1_pl_id'];?>" value="<?php echo $row_c['t_target_rmc'];?>" disabled>
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Sales Price

 </label>
								<div class="input-group">
										<input type="text" class="form-control" id="t_sale_price<?php echo $pl['r1_pl_id'];?>" name="t_sale_price<?php echo $pl['r1_pl_id'];?>" value="<?php echo $row_c['t_sale_price'];?>" disabled>
									   
									</div>
								</div>
								
								
						
								
								
								</div>
								
								
								
                            </div>
                        </div>
						<?php 
						   $pd2rs=mysqli_query($db,"select * from tblpd2r where r1_pl_id='".$pl['r1_pl_id']."'");
						   $pd2r=mysqli_fetch_array($pd2rs);
						   
						
						
						?>
						 <div class="accordion-row" >
                            <a href="#" class="accordion-header">
                                <span>PD 2 (Recommendation)</span>
                                <i class="accordion-status-icon close fa fa-chevron-up"></i>
                                <i class="accordion-status-icon open fa fa-chevron-down"></i>
                            </a>
                            <div class="accordion-body">
							
							 <div class="form-row">
                              <div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">P.D Priority Status </label>
								<div class="input-group">
										<input type="text" class="form-control" id="pd_priority_status" name="pd_priority_status" value="<?php echo $row_c['pd_priority_status'];?>" disabled>
									   
									</div>
								</div>
								
								
								 <div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Closest Existing Grade</label>
								<div class="input-group">
										<input type="text" class="form-control" id="pd2r_closest_existing_grade" name="pd2r_closest_existing_grade" disabled value="<?php echo $pd2r['pd2r_closest_existing_grade'];?>">
									   
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Closest Trial Grade 		</label>
								<div class="input-group">
										<input type="text" class="form-control" id="pd2r_closest_trail_grade" name="pd2r_closest_trail_grade" disabled value="<?php echo $pd2r['pd2r_closest_trail_grade'];?>">
									   
									</div>
								</div>
								
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Recommendation (If Matched)</label>
								<div class="input-group">
										<input type="text" class="form-control" id="pd2r_recommendation" name="pd2r_recommendation" disabled value="<?php echo $pd2r['pd2r_recommendation'];?>">
									   
									</div>
								</div>
								
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Recommendation Date</label>
								<div class="input-group">
										<input type="text" class="form-control" id="pd2r_recommendation_date2" name="pd2r_recommendation_date2" disabled value="<?php echo $pd2r['pd2r_recommendation_date'];;?>">
									 
									</div>
								</div>
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">New development Required</label>
								<div class="input-group">
								 <select id="pd2r_new_dev_required" name="pd2r_new_dev_required" class="form-control"  disabled>
											   <option value="">Select</option>
											<?php 
											   $yno= mysqli_query($db,"SELECT * FROM tblyesno");
											   while($yn = mysqli_fetch_array($yno)){   
											?>
											   <option value="<?php echo $yn['yn_option'];?>" <?php if($yn['yn_option']==$pd2r['pd2r_new_dev_required']){echo "selected='selected'";}?>><?php echo $yn['yn_option'];?></option>
											
											<?php } ?>
									   </select>
									   
									 </div>
								</div>  
							    

                                
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Plan Date of Trails </label>
								<div class="input-group">
										<input type="text" class="form-control" id="pd2r_plan_date_trails2" name="pd2r_plan_date_trails2" disabled value="<?php echo $pd2r['pd2r_plan_date_trails'];?>"> 
									   
									</div>
								</div>		   
									   <div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Estimated Time of Completition For New development</label>
								<div class="input-group">
										<input type="text" class="form-control" id="pd2r_etd2" name="pd2r_etd2" aria-describedby="validationTooltipUsernamePrepend" disabled value="<?php echo $pd2r['pd2r_etd'];?>">
									   
									</div>
								</div>	
								

								
						     </div>
						    </div>
						 </div>
						
						
						
						
						 
						
						
						
						<div class="accordion-row" >
                            <a href="#" class="accordion-header">
                                <span>PD 3 (New Development)</span>
                                <i class="accordion-status-icon close fa fa-chevron-up"></i>
                                <i class="accordion-status-icon open fa fa-chevron-down"></i>
                            </a>
                            <div class="accordion-body">
							
							 <div class="form-row">
                             
								
								 <div class="col-md-3 mb-3">
								<label for="validationTooltipUsername">Development Starting Date</label>
								<div class="input-group">
										<input type="text" class="form-control" id="pd3r_dev_start_date2" name="pd3r_dev_start_date2" value="<?php echo $pd2r['pd3r_dev_start_date'];?>" disabled>
									   
									   
									   
									   
									</div>
								</div>
								 <div class="col-md-3 mb-3">
								<label for="validationTooltipUsername">Development Starting Time</label>
								 
								
									<input type="text" id="pd3r_dev_start_time2" name="pd3r_dev_start_time2" class="form-control" value="<?php echo $pd2r['pd3r_dev_start_time'];?>" disabled >
								
								</div>
								
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Status of Development </label>
								<div class="input-group">
									<select id="pd3r_dev_status" name="pd3r_dev_status" class="form-control" disabled>
											   <option value="">Select</option>
											<?php 
											   $dss= mysqli_query($db,"SELECT * FROM tbldevstatus");
											   while($ds = mysqli_fetch_array($dss)){   
											?>
											   <option value="<?php echo $ds['d_option'];?>" <?php if($ds['d_option']==$pd2r['pd3r_dev_status']){echo "selected='selected'";}?>><?php echo $ds['d_option'];?></option>
											
											<?php } ?>
									   </select>
									</div>
								</div>
								
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Stopped Reason </label>
								<div class="input-group">
									<select id="pd3r_dev_reason" name="pd3r_dev_reason" class="form-control" disabled>
											   <option value="">Select</option>
											<?php 
											   $rss= mysqli_query($db,"SELECT * FROM tblsreason");
											   while($rs = mysqli_fetch_array($rss)){   
											?>
											   <option value="<?php echo $rs['r_option'];?>" <?php if($rs['r_option']==$pd2r['pd3r_dev_reason']){echo "selected='selected'";}?>><?php echo $rs['r_option'];?></option>
											
											<?php } ?>
									   </select>
									</div>
								</div>
								 <div class="col-md-3 mb-3">
								<label for="validationTooltipUsername"> Development Completion Date</label>
								<div class="input-group">
										<input type="text" class="form-control" id="pd3r_dev_end_date2" name="pd3r_dev_end_date2" value="<?php echo $pd2r['pd3r_dev_end_date'];?>" disabled>
									   
									   
									   
									   
									</div>
								</div>
								 <div class="col-md-3 mb-3">
								<label for="validationTooltipUsername">Development Completion Time</label>
								
									
									<input type="text" id="pd3r_dev_end_time2" name="pd3r_dev_end_time2" class="form-control" value="<?php echo $pd2r['pd3r_dev_end_time'];?>" disabled >
								
								</div>
								
						
								
								
						     </div>
						    </div>
						 </div>
						
						
						<div class="accordion-row open" >
                            <a href="#" class="accordion-header">
                                <span>PD 4 (Developed Sample Dispatch)</span>
                                <i class="accordion-status-icon close fa fa-chevron-up"></i>
                                <i class="accordion-status-icon open fa fa-chevron-down"></i>
                            </a>
                            <div class="accordion-body">
							
							 <div class="form-row">
                             
								
								 <div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Final Report</label>
								<div class="input-group">
										<select id="pd4r_final_report" name="pd4r_final_report" class="form-control"  disabled>
											   <option value="">Select</option>
											<?php 
											   $rtypes= mysqli_query($db,"SELECT * FROM tblreporttypes where r_status='1'");
											   while($rtype = mysqli_fetch_array($rtypes)){   
											?>
											   <option value="<?php echo $rtype['r_name'];?>" <?php if($rtype['r_name']==$pd2r['pd4r_final_report']){echo "selected='selected'";}?>><?php echo $rtype['r_name'];?></option>
											
											<?php } ?>
									   </select>
									</div>
								</div>
							
							
								
									<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername"><br></label>
								<div class="input-group">
										
									   <a href="upload/<?php echo $pd2r['pd4r_final_report_att'];?>" class="btn btn-primary btn-square">View Attachment</a>
									</div>
								</div>	
							
								 <div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">  Sample Name/Code</label>
								<div class="input-group">
										<input type="text" class="form-control" id="pd4r_sample_code" name="pd4r_sample_code" value="<?php echo $pd2r['pd4r_sample_code'];?>" disabled>
								
									</div>
								</div>
								  <div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">  Sample Qty Prepared (Kg)</label>
								<div class="input-group">
										<input type="text" class="form-control" id="pd4r_sample_qty" name="pd4r_sample_qty" value="<?php echo $pd2r['pd4r_sample_qty'];?>" disabled>
								
									</div>
								</div>
								
		
								
							
								
								
						     </div>
						    </div>
						 </div>
						
						
						
						<div class="accordion-row open" >
                            <a href="#" class="accordion-header">
                                <span>Rank 3 (Developed Sample Received)</span>
                                <i class="accordion-status-icon close fa fa-chevron-up"></i>
                                <i class="accordion-status-icon open fa fa-chevron-down"></i>
                            </a>
                            <div class="accordion-body">
							
							 <div class="form-row">
                             
								
								 <div class="col-md-6 mb-3">
								<label for="validationTooltipUsername"> Sample Received From</label>
								<div class="input-group">
										<select id="r3_sample_received_from" name="r3_sample_received_from" class="form-control"  required>
											   <option value="">Select</option>
											<?php 
											   $rtypes= mysqli_query($db,"SELECT * FROM tblrectypes where r_status='1'");
											   while($rtype = mysqli_fetch_array($rtypes)){   
											?>
											   <option value="<?php echo $rtype['r_name'];?>"><?php echo $rtype['r_name'];?></option>
											
											<?php } ?>
									   </select>
									</div>
								</div>
							
							
								
								
							
								 <div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Sample Handover/Received By (Customer)</label>
								<div class="input-group">
										<input type="text" class="form-control" id="r3_handover" name="r3_handover" required>
								
									</div>
								</div>
								  <div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">S.O #</label>
								<div class="input-group">
										<input type="text" class="form-control" id="r3_so" name="r3_so" >
								
									</div>
								</div>
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername">Estimated Time of Customer feed back/Results</label>
								<div class="input-group">
										<input type="text" class="form-control" id="r3_etd_feedback" name="r3_etd_feedback" required >
								
									</div>
								</div>
			
								<div class="col-md-6 mb-3">
								<label for="validationTooltipUsername"><br></label>
								<div class="input-group">
											<input type="submit" class="btn btn-primary btn-square" value="Save">
									   
									</div>
								</div>	
								
								
						     </div>
						    </div>
						 </div>
						
						
				         </form>
                        
                  
                    </div>
                </div>
       

	   </div>
    </div>

</main>
<!-- end::main content -->

<!-- Plugin scripts -->
<script src="vendors/bundle.js"></script>
<!-- DataTable -->
<script src="vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="assets/js/examples/datatable.js"></script>
<!-- App scripts -->
<script src="vendors/datepicker/daterangepicker.js"></script>
<script src="assets/js/examples/datepicker.js"></script>
<script src="vendors/clockpicker/bootstrap-clockpicker.min.js"></script>
<script src="assets/js/examples/clockpicker.js"></script>
<script src="assets/js/app.min.js"></script>

<script>
function check_yn(val){
	
	if(val=='Yes'){
		$('#pd2r_plan_date_trails').attr('required', 'required');
		$('#pd2r_etd').attr('required', 'required');
	}else{
		$('#pd2r_plan_date_trails').removeAttr('required', 'required');
		$('#pd2r_etd').removeAttr('required', 'required');
	}
	
}

</script>
</body>

</html>