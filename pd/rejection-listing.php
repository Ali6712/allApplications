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
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Rejection # </th>
					<th>Customer</th>
					<th>Product Description</th>
					<th>Product Category</th>
					<th>Old Sample Name/Code</th>
					<th>Old Sample Qty (Kg)</th>
					<th>Prepared By</th>
					<th>Current Status/Rank</th>
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
							
							$statuss= mysqli_query($db,"SELECT * FROM tblrstatus where r_id='".$rejection["r_id"]."' order by pd_id desc limit 0,1");
				            $status = mysqli_fetch_array($statuss);
                    		if($rejection['rf_status']=='Completed Successfully'){
                    		 $color="#3CB371";
                    		}else{
                    		 $color="#fff";   
                    		    
                    		}
		       ?>
                <tr style="background-color:<?php echo $color;?>;">
                                <td><?php echo $rejection['r_id'];?></td>
                               
								<td><?php echo $customer['c_name'];?></td>
								<td><?php echo $row_recent['pd_description'];?></td>
                                <td><?php echo $pc['pc_name'];?></td>
								<td><?php echo $row_c['pd4r_sample_code'];?></td>
								<td><?php echo $row_c['pd4r_sample_qty'];?></td>
                                <td><?php echo $user['user_name'];?></td>
                               
                                <td><span class="badge badge-pill badge-danger"><?php if($status['r1_status']==''){echo 'Rank 3A (Rejection Listing)';}else{echo $status['r1_status'];}?></span></td>
								<td>
								<?php if($_SESSION['user_type']=='User'){?>
								
									<?php if($rejection['rf_status']=='Active'){?>
									<a href="rejection-detail.php?r_id=<?php echo base64_encode($rejection['r_id']);?>&id=<?php echo base64_encode($pl['r1_id']);?>&r1_pl_id=<?php echo base64_encode($row_recent['r1_pl_id']);?>" class="btn btn-outline-light btn-sm">
									View Detail </a>
									<?php } ?>
								   
								   	<?php if($rejection['rf_status']=='Sample Ready'){?>
									<a href="rank3a.php?r_id=<?php echo base64_encode($rejection['r_id']);?>&id=<?php echo base64_encode($pl['r1_id']);?>&r1_pl_id=<?php echo base64_encode($row_recent['r1_pl_id']);?>" class="btn btn-outline-light btn-sm">
									Rank 3A </a>
									<?php } ?>
								   
								   	<?php if($rejection['rf_status']=='Received'){?>
									<a href="rank4a.php?r_id=<?php echo base64_encode($rejection['r_id']);?>&id=<?php echo base64_encode($pl['r1_id']);?>&r1_pl_id=<?php echo base64_encode($row_recent['r1_pl_id']);?>" class="btn btn-outline-light btn-sm">
									Rank 4A (Customer Feedback) </a>
									<?php } ?>
									
									<?php if($rejection['rf_status']=='Pass'){?>
									<a href="rank5a.php?r_id=<?php echo base64_encode($rejection['r_id']);?>&id=<?php echo base64_encode($pl['r1_id']);?>&r1_pl_id=<?php echo base64_encode($row_recent['r1_pl_id']);?>" class="btn btn-outline-light btn-sm">
									Rank 5A </a>
									<?php } ?>
									
									<?php if($rejection['rf_status']=='Rank 6'){?>
									<a href="rank6a.php?r_id=<?php echo base64_encode($rejection['r_id']);?>&id=<?php echo base64_encode($pl['r1_id']);?>&r1_pl_id=<?php echo base64_encode($row_recent['r1_pl_id']);?>" class="btn btn-outline-light btn-sm">
									Rank 6A </a>
									<?php } ?>
									
									<?php if($rejection['rf_status']=='Completed Successfully'){?>
									<a href="pd-rejecetd-completed-detail.php?r_id=<?php echo base64_encode($rejection['r_id']);?>&id=<?php echo base64_encode($pl['r1_id']);?>&r1_pl_id=<?php echo base64_encode($row_recent['r1_pl_id']);?>" class="btn btn-outline-light btn-sm">
									Detail View </a>
									<?php } ?>
									
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
<script src="assets/js/app.min.js"></script>
</body>

</html>