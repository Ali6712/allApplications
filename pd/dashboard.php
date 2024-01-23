<?php include("include/security.php");?>
<?php include("include/conn.php");?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/media/image/favicon.png"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="vendors/bundle.css" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="vendors/datepicker/daterangepicker.css">

    <!-- Slick -->
    <link rel="stylesheet" href="vendors/slick/slick.css">
    <link rel="stylesheet" href="vendors/slick/slick-theme.css">

    <!-- Vmap -->
    <link rel="stylesheet" href="vendors/vmap/jqvmap.min.css">

    <!-- App styles -->
    <link rel="stylesheet" href="assets/css/app.min.css" type="text/css">
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

            <h3 class="page-title">Product Development</h3>

            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Overview</li>
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
            <div class="card-title d-flex justify-content-between align-items-center">
                <h6>Developments</h6>
                <div class="slick-single-arrows">
                    <a class="btn btn-outline-light btn-sm">
                        <i class="ti-angle-left"></i>
                    </a>
                    <a class="btn btn-outline-light btn-sm">
                        <i class="ti-angle-right"></i>
                    </a>
                </div>
            </div>
            <div class="row slick-single-item">
                <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="icon-block icon-block-sm bg-danger icon-block-floating mr-2">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                </div>
                                <span class="text-uppercase font-size-11">Total Developments</span>
                                <h2 class="mb-0 ml-auto font-weight-bold text-danger"><?php echo $count_all;?></h2>
                            </div>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 71%"
                                     aria-valuenow="71" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-lg-6 col-sm-12">
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="icon-block icon-block-sm bg-success icon-block-floating mr-2">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                </div>
                               <a href="lab-pending.php" target="_blank"> <span class="text-uppercase font-size-11">Lab - Pending Approvals</span></a>
                               <a href="lab-pending.php" target="_blank"> <h2 class="mb-0 ml-auto font-weight-bold text-success"><?php echo $count_qc;?></h2></a>
                            </div>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 39%"
                                     aria-valuenow="39"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <div class="icon-block icon-block-sm bg-facebook icon-block-floating mr-2">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                </div>
                                <a href="so-pending.php" target="_blank"><span class="text-uppercase font-size-11">Sale Officer - Pending Approvals</span></a>
                                <a href="so-pending.php" target="_blank"><h2 class="mb-0 ml-auto font-weight-bold text-facebook"><?php echo $count_so;?></h2></a>
                            </div>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar bg-facebook" role="progressbar" style="width: 50%"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <div class="icon-block icon-block-sm bg-whatsapp icon-block-floating mr-2">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                </div>
                                <a href="completed.php" target="_blank"><span class="text-uppercase font-size-11">Completed</span></a>
                                <a href="completed.php" target="_blank"><h2 class="mb-0 ml-auto font-weight-bold text-whatsapp"><?php echo $count_cp;?></h2></a>
                            </div>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar bg-whatsapp" role="progressbar" style="width: 50%"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
               
			   
			
			</div>
        </div>
    </div>

 <?php 
 
 if($_SESSION['user_type']=='Lab'){
	 ?>

              <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Sample Receiving - Pending</h6>
                    
                    <div class="table-responsive">
                        <table class="table m-b-0">
                            <thead>
                            <tr>
                                <th>PDF # </th>
                                <th>Date In</th>
                                <th>Customer</th>
                                <th>Product Description</th>
                                <th>Product Category</th>
								<th>Requested By</th>
								<th>Remarks(if received with Delay)</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php 
					
						  $select_recents = mysqli_query($db,"select *
						  from tblrank2detail r2d,tblrank1productlines rpl,tblrank1 r1
						  where r2d.r1_pl_id=rpl.r1_pl_id  and r2d.marked_to_id='".$_SESSION['user_id']."' and 
						  r2d.r2_send_flag = 'Y'
						  and r2d.r2_lab_received_flag='N' and rpl.r1_id=r1.r1_id ");
														 
						  while($row_recent     = mysqli_fetch_array($select_recents)){	

                            $customers=mysqli_query($db,"select * from tblcustomers where 
							c_id='".$row_recent["r1_c_id"]."'");
							$customer=mysqli_fetch_array($customers);
							
							$pcs=mysqli_query($db,"select * from tblproductcategory where 
							pc_id='".$row_recent["pc_id"]."'");
							$pc=mysqli_fetch_array($pcs);
							
							$users=mysqli_query($db,"select * from tblusers where 
							user_id='".$row_recent["r2_d_created_by"]."'");
							$user=mysqli_fetch_array($users);
                            				  
					?>
							
                            <tr>
                                <td><?php echo $row_recent['r1_pl_id'];?></td>
                                <td><?php echo $row_recent['r2_send_datetime'];?></td>
								<td><?php echo $customer['c_name'];?></td>
								<td><?php echo $row_recent['pd_description'];?></td>
                                <td><?php echo $pc['pc_name'];?></td>
                                <td><?php echo $user['user_name'];?></td>
                                <td><textarea id="r2_late_received_remarks<?php echo $row_recent['r1_pl_id'];?>" name="r2_late_received_remarks<?php echo $row_recent['r1_pl_id'];?>" ></textarea></td>
								<td><div class="icon-block icon-block-floating icon-block-outline-success m-r-20">
                            <a href="javascript:" onclick="save_lab_rec('<?php echo $row_recent['r1_pl_id'];?>','<?php echo $row_recent['r1_id'];?>');"><i class="fa fa-check"></i></a>
                        </div></td>
                            </tr>
							<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
              <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Rejected Sample Receiving - Pending</h6>
                    
                    <div class="table-responsive">
                        <table class="table m-b-0">
                            <thead>
                            <tr>
                                <th>Rejection # </th>
                                
                                <th>Customer</th>
                                <th>Product Description</th>
                                <th>Product Category</th>
								<th>Reporting Date</th>
								<th>Rejection Type </th>
								<th>Reason of failure </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php 
					
						  $select_recents= mysqli_query($db,"select *
						  from tblrank2detail r2d,tblrank1productlines rpl,tblrank1 r1
						  where r2d.r1_pl_id=rpl.r1_pl_id  and r2d.marked_to_id='".$_SESSION['user_id']."' 
						  and r2d.r2_lab_received_flag='Y' and r2d.final_status is null and rpl.r1_id=r1.r1_id ");
				  
				   while($row_recent     = mysqli_fetch_array($select_recents)){	

                            $customers=mysqli_query($db,"select * from tblcustomers where 
							c_id='".$row_recent["r1_c_id"]."'");
							$customer=mysqli_fetch_array($customers);
							
							$pcs=mysqli_query($db,"select * from tblproductcategory where 
							pc_id='".$row_recent["pc_id"]."'");
							$pc=mysqli_fetch_array($pcs);
							
							
							
							$pd2rs=mysqli_query($db,"select * from tblpd2r where 
							r1_pl_id='".$row_recent["r1_pl_id"]."'");
							$num=mysqli_num_rows($pd2rs);
							$row_c=mysqli_fetch_array($pd2rs);
							if($row_c['pd3r_flag']=='F'){
							
                            $users=mysqli_query($db,"select * from tblusers where 
							user_id='".$row_c["pd4r_updated_by"]."'");
							$user=mysqli_fetch_array($users);

							
							$rank3s=mysqli_query($db,"select * from tblrank3 where 
							r1_pl_id='".$row_recent["r1_pl_id"]."'");
							$rank3_c=mysqli_fetch_array($rank3s);	
							if($rank3_c['r3_status']=='Received'){
								
							$rank4s=mysqli_query($db,"select * from tblrank4 where 
							r1_pl_id='".$row_recent["r1_pl_id"]."'");
							$num4=mysqli_num_rows($rank4s);
							$rank4_c=mysqli_fetch_array($rank4s);	
							
							
							$pls=mysqli_query($db,"select r1_id from tblrank1productlines where 
							r1_pl_id='".$row_recent["r1_pl_id"]."'");
							$pl=mysqli_fetch_array($pls);
							
							
							
						    //if($num5==0 and $rank4_c['r5_flag']=='Y'){
						    if($num4==0 or $rank4_c['r4_result']=='Fail' ){
							
							
							$rejections=mysqli_query($db,"select * from tblrejections where 
							r1_pl_id='".$row_recent["r1_pl_id"]."' order by r_id desc");
							$rejection=mysqli_fetch_array($rejections);
							
							if($rejection['r3a_lab_received_flag']==''){
                            				  
					?>
							
                            <tr>
                                <td><?php echo $rejection['r_id'];?></td>
								<td><?php echo $customer['c_name'];?></td>
								<td><?php echo $row_recent['pd_description'];?></td>
                                <td><?php echo $pc['pc_name'];?></td>
                                <td><?php echo $rejection['rf_reporting_date'];?></td>
                                <td><?php echo $rejection['rf_type'];?></td>
								<td><?php echo $rejection['rf_reason'];?></td>
								<td><div class="icon-block icon-block-floating icon-block-outline-success m-r-20">
                            <a href="javascript:" onclick="save_rej_lab_rec('<?php echo $rejection['r_id'];?>','<?php echo $rejection['r1_id'];?>','<?php echo $rejection['r1_pl_id'];?>');"><i class="fa fa-check"></i></a>
                        </div></td>
                            </tr>
							<?php } 
							}
							}
							}
							}?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    	
	 
	 <?php 
 }
 ?>
 
 
  <?php 
 
 if($_SESSION['user_type']=='User'){
	 ?>

              <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Sample Receiving - Pending</h6>
                    
                    <div class="table-responsive">
                        <table class="table m-b-0">
                            <thead>
                            <tr>
                                <th>PDF # </th>
                                <th>Date In</th>
                                <th>Customer</th>
                                <th>Product Description</th>
                                <th>Product Category</th>
								<th>Final Report</th>
								<th>Sample Code</th>
								<th>Date In</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php 
					
						  $select_recents= mysqli_query($db,"select *
						  from tblrank2detail r2d,tblrank1productlines rpl,tblrank1 r1
						  where r2d.r1_pl_id=rpl.r1_pl_id  and r2d.r2_d_created_by='".$_SESSION['user_id']."' 
						  and r2_lab_received_flag='Y' and rpl.r1_id=r1.r1_id ");
				  
				   while($row_recent     = mysqli_fetch_array($select_recents)){	

                            $customers=mysqli_query($db,"select * from tblcustomers where 
							c_id='".$row_recent["r1_c_id"]."'");
							$customer=mysqli_fetch_array($customers);
							
							$pcs=mysqli_query($db,"select * from tblproductcategory where 
							pc_id='".$row_recent["pc_id"]."'");
							$pc=mysqli_fetch_array($pcs);
							
							$users=mysqli_query($db,"select * from tblusers where 
							user_id='".$row_recent["r2_d_created_by"]."'");
							$user=mysqli_fetch_array($users);
							
							$pd2rs=mysqli_query($db,"select * from tblpd2r where 
							r1_pl_id='".$row_recent["r1_pl_id"]."'");
							$num=mysqli_num_rows($pd2rs);
							$row_c=mysqli_fetch_array($pd2rs);
							if($row_c['pd3r_flag']=='F'){
								
							$rank3s=mysqli_query($db,"select * from tblrank3 where 
							r1_pl_id='".$row_recent["r1_pl_id"]."'");
							$rank3_num=mysqli_num_rows($rank3s);	
							
							
							
							$pls=mysqli_query($db,"select r1_id from tblrank1productlines where 
							r1_pl_id='".$row_recent["r1_pl_id"]."'");
							$pl=mysqli_fetch_array($pls);
							
							
							
							if($rank3_num==0){
                            				  
					?>
							
                            <tr>
                                <td><?php echo $row_recent['r1_pl_id'];?></td>
                                <td><?php echo $row_recent['r2_send_datetime'];?></td>
								<td><?php echo $customer['c_name'];?></td>
								<td><?php echo $row_recent['pd_description'];?></td>
                                <td><?php echo $pc['pc_name'];?></td>
                                <td><?php echo $row_c['pd4r_final_report'];?></td>
								<td><?php echo $row_c['pd4r_sample_code'];?></td>
								<td><?php echo $row_c['pd4r_updated_on'];?></td>
								<td><div class="icon-block icon-block-floating icon-block-outline-success m-r-20">
                                <a href="rank3.php?id=<?php echo base64_encode($pl['r1_id']);?>&r1_pl_id=<?php echo base64_encode($row_recent['r1_pl_id']);?>"><i class="fa fa-check"></i></a>
                        </div></td>
                            </tr>
							<?php } 
							}
							
				   }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	
	  <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Re-Developed Sample Receiving - Pending</h6>
                    
                    <div class="table-responsive">
                        <table class="table m-b-0">
                            <thead>
                             <tr>
                    <th>Rejection # </th>
					<th>Customer</th>
					<th>Product Description</th>
					<th>Product Category</th>
					<th>Sample Name/Code</th>
					<th>Sample Qty (Kg)</th>
					<th>Prepared By</th>
					<th>Action</th>
					</tr>
                </thead>
                <tbody>
						<?php 
			
				 $select_recents= mysqli_query($db,"select *
						  from tblrank2detail r2d,tblrank1productlines rpl,tblrank1 r1
						  where r2d.r1_pl_id=rpl.r1_pl_id  and r2d.r2_d_created_by='".$_SESSION['user_id']."' 
						  and r2d.r2_lab_received_flag='Y' and r2d.final_status is null and rpl.r1_id=r1.r1_id ");
				  
				   while($row_recent     = mysqli_fetch_array($select_recents)){	

                            $customers=mysqli_query($db,"select * from tblcustomers where 
							c_id='".$row_recent["r1_c_id"]."'");
							$customer=mysqli_fetch_array($customers);
							
							$pcs=mysqli_query($db,"select * from tblproductcategory where 
							pc_id='".$row_recent["pc_id"]."'");
							$pc=mysqli_fetch_array($pcs);
							
							
							
							
							
                            $users=mysqli_query($db,"select * from tblusers where 
							user_id='".$row_c["pd4r_updated_by"]."'");
							$user=mysqli_fetch_array($users);

							
							$rank3s=mysqli_query($db,"select * from tblrank3 where 
							r1_pl_id='".$row_recent["r1_pl_id"]."'");
							$rank3_c=mysqli_fetch_array($rank3s);	
							if($rank3_c['r3_status']=='Received'){
								
							$rank4s=mysqli_query($db,"select * from tblrank4 where 
							r1_pl_id='".$row_recent["r1_pl_id"]."'");
							$num4=mysqli_num_rows($rank4s);
							$rank4_c=mysqli_fetch_array($rank4s);	
							
							
							$pls=mysqli_query($db,"select r1_id from tblrank1productlines where 
							r1_pl_id='".$row_recent["r1_pl_id"]."'");
							$pl=mysqli_fetch_array($pls);
							
							
							
						    //if($num5==0 and $rank4_c['r5_flag']=='Y'){
						    if($num4==0 or $rank4_c['r4_result']=='Fail' ){
							
							
							$rejections=mysqli_query($db,"select * from tblrejections where 
							r1_pl_id='".$row_recent["r1_pl_id"]."' order by r_id desc");
							$rejection=mysqli_fetch_array($rejections);
							if($rejection['rf_status']=='Sample Ready'){
                    		
                    		$pd3ars=mysqli_query($db,"select * from tblpd3ar where 
							r_id='".$rejection["r_id"]."'");
							$num=mysqli_num_rows($pd3ars);
							$row_c=mysqli_fetch_array($pd3ars);
							if($row_c['pd3r_flag']=='F'){			
		       ?>
                <tr>
                                <td><?php echo $rejection['r_id'];?></td>
								<td><?php echo $customer['c_name'];?></td>
								<td><?php echo $row_recent['pd_description'];?></td>
                                <td><?php echo $pc['pc_name'];?></td>
								<td><?php echo $row_c['pd4r_sample_code'];?></td>
								<td><?php echo $row_c['pd4r_sample_qty'];?></td>
                                <td><?php echo $user['user_name'];?></td>
                                
								<td>
							
								
									
									<a href="rank3a.php?r_id=<?php echo base64_encode($rejection['r_id']);?>&id=<?php echo base64_encode($pl['r1_id']);?>&r1_pl_id=<?php echo base64_encode($row_recent['r1_pl_id']);?>" class="btn btn-outline-light btn-sm">
									Rank 3A </a>
									
								
                                <?php }?>
								
								
							
								</td>
                            </tr>
				
			   <?php }  
							}
			   }
			   }
			   ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	 <?php 
 }
 ?>
 
 
</main>
<!-- end::main content -->

<!-- Plugin scripts -->
<script src="vendors/bundle.js"></script>

<!-- Chartjs -->
<script src="vendors/charts/chartjs/chart.min.js"></script>

<!-- Circle progress -->
<script src="vendors/circle-progress/circle-progress.min.js"></script>

<!-- Peity -->
<script src="vendors/charts/peity/jquery.peity.min.js"></script>
<script src="assets/js/examples/charts/peity.js"></script>

<!-- Datepicker -->
<script src="vendors/datepicker/daterangepicker.js"></script>

<!-- Slick -->
<script src="vendors/slick/slick.min.js"></script>

<!-- Vamp -->
<script src="vendors/vmap/jquery.vmap.min.js"></script>
<script src="vendors/vmap/maps/jquery.vmap.usa.js"></script>
<script src="assets/js/examples/vmap.js"></script>

<!-- Dashboard scripts 
<script src="assets/js/examples/dashboard.js"></script>-->


<script>

$(document).ready(function () {

    var colors = {
        primary: $('.colors .bg-primary').css('background-color'),
        primaryLight: $('.colors .bg-primary-bright').css('background-color'),
        secondary: $('.colors .bg-secondary').css('background-color'),
        secondaryLight: $('.colors .bg-secondary-bright').css('background-color'),
        info: $('.colors .bg-info').css('background-color'),
        infoLight: $('.colors .bg-info-bright').css('background-color'),
        success: $('.colors .bg-success').css('background-color'),
        successLight: $('.colors .bg-success-bright').css('background-color'),
        danger: $('.colors .bg-danger').css('background-color'),
        dangerLight: $('.colors .bg-danger-bright').css('background-color'),
        warning: $('.colors .bg-warning').css('background-color'),
        warningLight: $('.colors .bg-warning-bright').css('background-color'),
    };

    /**
     *  Slick slide example
     **/

    if ($('.slick-single-item').length) {
        $('.slick-single-item').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            prevArrow: '.slick-single-arrows a:eq(0)',
            nextArrow: '.slick-single-arrows a:eq(1)',
            responsive: [
                {
                    breakpoint: 1300,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 540,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }

    if ($('.reportrange').length > 0) {
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('.reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('.reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    }

    var chartColors = {
        primary: {
            base: '#3f51b5',
            light: '#c0c5e4'
        },
        danger: {
            base: '#f2125e',
            light: '#fcd0df'
        },
        success: {
            base: '#0acf97',
            light: '#cef5ea'
        },
        warning: {
            base: '#ff8300',
            light: '#ffe6cc'
        },
        info: {
            base: '#00bcd4',
            light: '#e1efff'
        },
        dark: '#37474f',
        facebook: '#3b5998',
        twitter: '#55acee',
        linkedin: '#0077b5',
        instagram: '#517fa4',
        whatsapp: '#25D366',
        dribbble: '#ea4c89',
        google: '#DB4437',
        borderColor: '#e8e8e8',
        fontColor: '#999'
    };

    if ($('body').hasClass('dark')) {
        chartColors.borderColor = 'rgba(255, 255, 255, .1)';
        chartColors.fontColor = 'rgba(255, 255, 255, .4)';
    }

    /// Chartssssss

    chart_demo_1();

    chart_demo_2();
    
	chart_qc_lmd();
	
	chart_qc_pcc();
	
	chart_qc_smd();
	
	chart_qc_smd_2();
	
    chart_demo_3();

    chart_demo_4();

    chart_demo_5();

    chart_demo_6();

    chart_demo_7();

    chart_demo_8();

    chart_demo_9();

    chart_demo_10();

    function chart_demo_1() {
        if ($('#chart_demo_1').length) {
            var element = document.getElementById("chart_demo_1");
            element.height = 146;
            new Chart(element, {
                type: 'bar',
                data: {
                    labels: [<?php echo $m;?>],
                    datasets: [
                        {
                            label: "Total Complaints",
                            backgroundColor: colors.primary,
                            data: [<?php echo $m_comp;?>]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                color: chartColors.borderColor
                            }
                        }],
                    }
                }
            })
        }
    }

	
	    function chart_qc_smd() {
        if ($('#chart_qc_smd').length) {
            var element = document.getElementById("chart_qc_smd");
            element.height = 146;
            new Chart(element, {
                type: 'bar',
                data: {
                    labels: [<?php echo $m_smd;?>],
                    datasets: [
                        {
                            label: "Total Complaints",
                            backgroundColor: colors.primary,
                            data: [<?php echo $m_comp_smd;?>]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                color: chartColors.borderColor
                            }
                        }],
                    }
                }
            })
        }
    }


	    function chart_qc_lmd() {
        if ($('#chart_qc_lmd').length) {
            var element = document.getElementById("chart_qc_lmd");
            element.height = 146;
            new Chart(element, {
                type: 'bar',
                data: {
                    labels: [<?php echo $m_lmd;?>],
                    datasets: [
                        {
                            label: "Total Complaints",
                            backgroundColor: colors.primary,
                            data: [<?php echo $m_comp_lmd;?>]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                color: chartColors.borderColor
                            }
                        }],
                    }
                }
            })
        }
    }


	    function chart_qc_pcc() {
        if ($('#chart_qc_pcc').length) {
            var element = document.getElementById("chart_qc_pcc");
            element.height = 146;
            new Chart(element, {
                type: 'bar',
                data: {
                    labels: [<?php echo $m_pcc;?>],
                    datasets: [
                        {
                            label: "Total Complaints",
                            backgroundColor: colors.primary,
                            data: [<?php echo $m_comp_pcc;?>]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                color: chartColors.borderColor
                            }
                        }],
                    }
                }
            })
        }
    }

		    function chart_qc_smd_2() {
        if ($('#chart_qc_smd_2').length) {
            var element = document.getElementById("chart_qc_smd_2");
            element.height = 146;
            new Chart(element, {
                type: 'bar',
                data: {
                    labels: [<?php echo $m_smd_2;?>],
                    datasets: [
                        {
                            label: "Total Complaints",
                            backgroundColor: colors.primary,
                            data: [<?php echo $m_comp_smd_2;?>]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                color: chartColors.borderColor
                            }
                        }],
                    }
                }
            })
        }
    }
	
	
    function chart_demo_2() {
        if ($('#chart_demo_2').length) {
            var ctx = document.getElementById('chart_demo_2').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jun 2016", "Jul 2016", "Aug 2016", "Sep 2016", "Oct 2016", "Nov 2016", "Dec 2016", "Jan 2017", "Feb 2017", "Mar 2017", "Apr 2017", "May 2017"],
                    datasets: [{
                        label: "Rainfall",
                        backgroundColor: chartColors.primary.light,
                        borderColor: chartColors.primary.base,
                        data: [26.4, 39.8, 66.8, 66.4, 40.6, 55.2, 77.4, 69.8, 57.8, 76, 110.8, 142.6],
                    }]
                },
                options: {
                    legend: {
                        display: false,
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    title: {
                        display: true,
                        text: 'Precipitation in Toronto',
                        fontColor: chartColors.fontColor,
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Precipitation in mm',
                                fontColor: chartColors.fontColor,
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }

    function chart_demo_3() {
        if ($('#chart_demo_3').length) {
            var element = document.getElementById("chart_demo_3"),
                ctx = element.getContext("2d");


            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: 'Success',
                        borderColor: colors.success,
                        data: [-10, 30, -20, 0, 25, 44, 30, 15, 20, 10, 5, -5],
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        borderDash: [2, 2],
                        fill: false
                    }, {
                        label: 'Return',
                        fill: false,
                        borderDash: [2, 2],
                        borderColor: colors.danger,
                        data: [20, 0, 22, 39, -10, 19, -7, 0, 15, 0, -10, 5],
                        pointRadius: 5,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false,
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    title: {
                        display: false,
                        fontColor: chartColors.fontColor
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: false,
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                display: false
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                min: -50,
                                max: 50
                            }
                        }],
                    }
                }
            });

        }
    }

    function chart_demo_4() {
        if ($('#chart_demo_4').length) {
            var ctx = document.getElementById("chart_demo_4").getContext("2d");
            var densityData = {
                backgroundColor: chartColors.primary.light,
                data: [10, 20, 40, 60, 80, 40, 60, 80, 40, 80, 20, 59]
            };
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [densityData]
                },
                options: {
                    scaleFontColor: "#FFFFFF",
                    legend: {
                        display: false,
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                min: 0,
                                max: 100,
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }

    function chart_demo_5() {
        if ($('#chart_demo_5').length) {
            var ctx = document.getElementById('chart_demo_5').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May'],
                    datasets: [
                        {
                            label: 'Dataset 1',
                            backgroundColor: [
                                chartColors.info.base,
                                chartColors.success.base,
                                chartColors.danger.base,
                                chartColors.dark,
                                chartColors.warning.base,
                            ],
                            yAxisID: 'y-axis-1',
                            data: [33, 56, -40, 25, 45]
                        },
                        {
                            label: 'Dataset 2',
                            backgroundColor: chartColors.info.base,
                            yAxisID: 'y-axis-2',
                            data: [23, 86, -40, 5, 45]
                        }
                    ]
                },
                options: {
                    legend: {
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Chart.js Bar Chart - Multi Axis',
                        fontColor: chartColors.fontColor
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            }
                        }],
                        yAxes: [
                            {
                                type: 'linear',
                                display: true,
                                position: 'left',
                                id: 'y-axis-1',
                            },
                            {
                                gridLines: {
                                    color: chartColors.borderColor
                                },
                                ticks: {
                                    fontColor: chartColors.fontColor
                                }
                            },
                            {
                                type: 'linear',
                                display: true,
                                position: 'right',
                                id: 'y-axis-2',
                                gridLines: {
                                    drawOnChartArea: false
                                },
                                ticks: {
                                    fontColor: chartColors.fontColor
                                }
                            }
                        ],
                    }
                }
            });
        }
    }

    function chart_demo_6() {
        if ($('#chart_demo_6').length) {
            var ctx = document.getElementById("chart_demo_6").getContext("2d");
            var speedData = {
                labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
                datasets: [{
                    label: "Car Speed (mph)",
                    borderColor: chartColors.primary.base,
                    backgroundColor: 'rgba(0, 0, 0, 0',
                    data: [0, 59, 75, 20, 20, 55, 40]
                }]
            };
            var chartOptions = {
                legend: {
                    scaleFontColor: "#FFFFFF",
                    position: 'top',
                    labels: {
                        fontColor: chartColors.fontColor
                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            color: chartColors.borderColor
                        },
                        ticks: {
                            fontColor: chartColors.fontColor
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            color: chartColors.borderColor
                        },
                        ticks: {
                            fontColor: chartColors.fontColor
                        }
                    }]
                }
            };
            new Chart(ctx, {
                type: 'line',
                data: speedData,
                options: chartOptions
            });
        }
    }

    function chart_demo_7() {
        if ($('#chart_demo_7').length) {
            var ctx = document.getElementById("chart_demo_7").getContext("2d");
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [<?php echo $cs_total;?>],
                        backgroundColor: [
                            colors.success,
                            colors.danger,
                            colors.warning
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        <?php echo $cs_name;?>
                    ]
                },
                options: {
                    elements: {
                        arc: {
                            borderWidth: 0
                        }
                    },
                    responsive: true,
                    legend: {
                        display: true
                    },
                    title: {
                        display: true
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                }
            });
        }
    }

    function chart_demo_8() {
        if ($('#chart_demo_8').length) {
            new Chart(document.getElementById("chart_demo_8"), {
                type: 'radar',
                data: {
                    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                    datasets: [
                        {
                            label: "1950",
                            fill: true,
                            backgroundColor: "rgba(179,181,198,0.2)",
                            borderColor: "rgba(179,181,198,1)",
                            pointBorderColor: "#fff",
                            pointBackgroundColor: "rgba(179,181,198,1)",
                            data: [-8.77, -55.61, 21.69, 6.62, 6.82]
                        }, {
                            label: "2050",
                            fill: true,
                            backgroundColor: "rgba(255,99,132,0.2)",
                            borderColor: "rgba(255,99,132,1)",
                            pointBorderColor: "#fff",
                            pointBackgroundColor: "rgba(255,99,132,1)",
                            data: [-25.48, 54.16, 7.61, 8.06, 4.45]
                        }
                    ]
                },
                options: {
                    legend: {
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    scale: {
                        gridLines: {
                            color: chartColors.borderColor
                        }
                    },
                    title: {
                        display: true,
                        text: 'Distribution in % of world population',
                        fontColor: chartColors.fontColor
                    }
                }
            });
        }
    }

    function chart_demo_9() {
        if ($('#chart_demo_9').length) {
            new Chart(document.getElementById("chart_demo_9"), {
                type: 'horizontalBar',
                data: {
                    labels: [<?php echo $qc_name;?>],
                    datasets: [
                        {
                            label: "Complaints",
                            backgroundColor: colors.primary,
                            data: [<?php echo $qc_total;?>]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                display: false
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor,
                                display: false
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            },
                            barPercentage: 0.5
                        }]
                    }
                }
            });
        }
    }

    function chart_demo_10() {
        if ($('#chart_demo_10').length) {
            var element = document.getElementById("chart_demo_10");
            new Chart(element, {
                type: 'bar',
                data: {
                    labels: ["1900", "1950", "1999", "2050"],
                    datasets: [
                        {
                            label: "Europe",
                            type: "line",
                            borderColor: "#8e5ea2",
                            data: [408, 547, 675, 734],
                            fill: false
                        },
                        {
                            label: "Africa",
                            type: "line",
                            borderColor: "#3e95cd",
                            data: [133, 221, 783, 2478],
                            fill: false
                        },
                        {
                            label: "Europe",
                            type: "bar",
                            backgroundColor: chartColors.primary.base,
                            data: [408, 547, 675, 734],
                        },
                        {
                            label: "Africa",
                            type: "bar",
                            backgroundColor: chartColors.primary.light,
                            data: [133, 221, 783, 2478]
                        }
                    ]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Population growth (millions): Europe & Africa',
                        fontColor: chartColors.fontColor
                    },
                    legend: {
                        display: true,
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            }
                        }]
                    }
                }
            });
        }
    }

    if ($('#circle-1').length) {
        $('#circle-1').circleProgress({
            startAngle: 1.55,
            value: 0.65,
            size: 110,
            thickness: 10,
            fill: {
                color: colors.primary
            }
        });
    }

    if ($('#sales-circle-graphic').length) {
        $('#sales-circle-graphic').circleProgress({
            startAngle: 1.55,
            value: 0.65,
            size: 180,
            thickness: 30,
            fill: {
                color: colors.primary
            }
        });
    }

    if ($('#circle-2').length) {
        $('#circle-2').circleProgress({
            startAngle: 1.55,
            value: 0.35,
            size: 110,
            thickness: 10,
            fill: {
                color: colors.success
            }
        });
    }

    ////////////////////////////////////////////

    if ($(".dashboard-pie-1").length) {
        $(".dashboard-pie-1").peity("pie", {
            fill: [colors.primaryLight, colors.primary],
            radius: 30
        });
    }

    if ($(".dashboard-pie-2").length) {
        $(".dashboard-pie-2").peity("pie", {
            fill: [colors.successLight, colors.success],
            radius: 30
        });
    }

    if ($(".dashboard-pie-3").length) {
        $(".dashboard-pie-3").peity("pie", {
            fill: [colors.warningLight, colors.warning],
            radius: 30
        });
    }

    if ($(".dashboard-pie-4").length) {
        $(".dashboard-pie-4").peity("pie", {
            fill: [colors.infoLight, colors.info],
            radius: 30
        });
    }

    ////////////////////////////////////////////

    function bar_chart() {
        if ($('#chart-ticket-status').length > 0) {
            var dataSource = [
                {country: "USA", hydro: 59.8, oil: 937.6, gas: 582, coal: 564.3, nuclear: 187.9},
                {country: "China", hydro: 74.2, oil: 308.6, gas: 35.1, coal: 956.9, nuclear: 11.3},
                {country: "Russia", hydro: 40, oil: 128.5, gas: 361.8, coal: 105, nuclear: 32.4},
                {country: "Japan", hydro: 22.6, oil: 241.5, gas: 64.9, coal: 120.8, nuclear: 64.8},
                {country: "India", hydro: 19, oil: 119.3, gas: 28.9, coal: 204.8, nuclear: 3.8},
                {country: "Germany", hydro: 6.1, oil: 123.6, gas: 77.3, coal: 85.7, nuclear: 37.8}
            ];

            // Return with commas in between
            var numberWithCommas = function (x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            };

            var dataPack1 = [40, 47, 44, 38, 27, 40, 47, 44, 38, 27, 40, 27];
            var dataPack2 = [10, 12, 7, 5, 4, 10, 12, 7, 5, 4, 10, 12];
            var dataPack3 = [17, 11, 22, 18, 12, 17, 11, 22, 18, 12, 17, 11];
            var dates = ["Jan", "Jan", "Jan", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];

            var bar_ctx = document.getElementById('chart-ticket-status');

            bar_ctx.height = 115;

            new Chart(bar_ctx, {
                    type: 'bar',
                    data: {
                        labels: dates,
                        datasets: [
                            {
                                label: 'Pending Tickets',
                                data: dataPack1,
                                backgroundColor: colors.primaryLight,
                                hoverBorderWidth: 0
                            },
                            {
                                label: 'Solved Tickets',
                                data: dataPack2,
                                backgroundColor: colors.successLight,
                                hoverBorderWidth: 0
                            },
                            {
                                label: 'Open Tickets',
                                data: dataPack3,
                                backgroundColor: colors.dangerLight,
                                hoverBorderWidth: 0
                            },
                        ]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        animation: {
                            duration: 10,
                        },
                        tooltips: {
                            mode: 'label',
                            callbacks: {
                                label: function (tooltipItem, data) {
                                    return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
                                }
                            }
                        },
                        scales: {
                            xAxes: [{
                                stacked: true,
                                gridLines: {display: false},
                                ticks: {
                                    fontSize: 11,
                                    fontColor: chartColors.fontColor
                                }
                            }],
                            yAxes: [{
                                stacked: true,
                                ticks: {
                                    callback: function (value) {
                                        return numberWithCommas(value);
                                    },
                                    fontSize: 11,
                                    fontColor: chartColors.fontColor
                                },
                            }],
                        }
                    },
                    plugins: [{
                        beforeInit: function (chart) {
                            chart.data.labels.forEach(function (value, index, array) {
                                var a = [];
                                a.push(value.slice(0, 5));
                                var i = 1;
                                while (value.length > (i * 5)) {
                                    a.push(value.slice(i * 5, (i + 1) * 5));
                                    i++;
                                }
                                array[index] = a;
                            })
                        }
                    }]
                }
            );
        }
    }

    bar_chart();

    function users_chart() {
        if ($('#users-chart').length > 0) {
            var element = document.getElementById("users-chart");

            element.height = 110;

            new Chart(element, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Fen", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Europe",
                        type: "bar",
                        backgroundColor: colors.primary,
                        data: [408, 547, 675, 734, 122, 323, 94, 312, 282, 500, 800, 1050],
                    }, {
                        label: "Africa",
                        type: "bar",
                        backgroundColor: colors.info,
                        data: [133, 221, 783, 1478, 821, 321, 400, 200, 820, 300, 511, 100]
                    }]
                },
                options: {
                    title: {
                        display: false
                    },
                    legend: {display: false},
                    scales: {
                        yAxes: [{
                            fontSize: 11,
                            fontColor: chartColors.fontColor
                        }],
                        xAxes: [{
                            gridLines: {display: false},
                            ticks: {
                                display: false
                            }
                        }]
                    }
                }
            });
        }
    }

    users_chart();

    function device_session_chart() {
        if ($('#device_session_chart').length > 0) {
            var element = document.getElementById("device_session_chart");
            element.height = 155;
            new Chart(element, {
                type: 'line',
                data: {
                    labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
                    datasets: [{
                        data: [2186, 2000, 1900, 2300, 2150, 2100, 2350, 2500, 2400, 2390],
                        label: "Mobile",
                        backgroundColor: colors.primary,
                        borderColor: colors.primary,
                        fill: false
                    }, {
                        data: [1282, 1000, 1290, 1302, 1400, 1250, 1350, 1402, 1700, 1967],
                        label: "Desktop",
                        backgroundColor: colors.success,
                        borderColor: colors.success,
                        fill: false
                    }, {
                        data: [500, 700, 900, 800, 600, 850, 900, 550, 750, 690],
                        label: "Other",
                        backgroundColor: colors.warning,
                        borderColor: colors.warning,
                        fill: false
                    }]
                },
                options: {
                    title: {
                        display: false
                    },
                    legend: {display: false},
                    scales: {
                        yAxes: [{
                            gridLines: {display: false},
                            ticks: {
                                display: false
                            }
                        }],
                        xAxes: [{
                            gridLines: {display: false},
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            }
                        }],
                    }
                }
            });
        }
    }

    device_session_chart();

});


function save_lab_rec(r1_pl_id,r1_id){
	
	    var r2_late_received_remarks  = $('#r2_late_received_remarks'+r1_pl_id).val();
        $.post("controllers/development.php",{r1_pl_id:r1_pl_id,r1_id:r1_id,r2_late_received_remarks:r2_late_received_remarks,action:'save_lab_rec'},function(data){   
        		window.location.reload();		
        });	
}

function save_rej_lab_rec(r_id,r1_id,r1_pl_id){
	

        $.post("controllers/development.php",{r_id:r_id,r1_pl_id:r1_pl_id,r1_id:r1_id,action:'save_rej_lab_rec'},function(data){   
        		window.location.reload();		
        });	
}

</script>


<div class="colors"> <!-- To use theme colors with Javascript -->
    <div class="bg-primary"></div>
    <div class="bg-primary-bright"></div>
    <div class="bg-secondary"></div>
    <div class="bg-secondary-bright"></div>
    <div class="bg-info"></div>
    <div class="bg-info-bright"></div>
    <div class="bg-success"></div>
    <div class="bg-success-bright"></div>
    <div class="bg-danger"></div>
    <div class="bg-danger-bright"></div>
    <div class="bg-warning"></div>
    <div class="bg-warning-bright"></div>
</div>

<!-- App scripts -->
<script src="assets/js/app.min.js"></script>
</body>

</html>