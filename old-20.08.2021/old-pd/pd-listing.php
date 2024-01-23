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
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Customer</th>
                    <th>Product Lines</th>
                    <th>Concern Person Name </th>
                    <th>Designation </th>
                    <th>Contact # </th>
					<th>Date In</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				
				  
				   $developments= mysqli_query($db,"SELECT * FROM tblrank1 where r1_created_by='".$_SESSION['user_id']."' order by r1_id");
				  
				   while($development = mysqli_fetch_array($developments)){  
				   
				   $count='';
				   
				   $customers= mysqli_query($db,"SELECT * FROM tblcustomers where c_id='".$development['r1_c_id']."'");
				   $customer = mysqli_fetch_array($customers);  
				   
				   $desginations= mysqli_query($db,"SELECT * FROM tblcpdesignations where cd_id='".$development['r1_cd_id']."'");
				   $desgination = mysqli_fetch_array($desginations);  
                    					 
		       ?>
                <tr>
                <td><?php echo $development['r1_id'];?></td> 
                <td><?php echo $customer['c_name'];?></td>
                <td><?php 
				$pls=mysqli_query($db,"select psl.pld_name,pl.pl_name
									from tblrank1productlines rpl,tblproductsublines psl,tblproductlines pl
									where
									rpl.r1_id='".$development['r1_id']."' and rpl.pld_id=psl.pld_id and psl.pl_id=pl.pl_id");
				while($pl = mysqli_fetch_array($pls)){  
                      $count=$count+1;
					  echo '<span class="badge badge-pill badge-secondary">'.$count.'-'.$pl['pl_name'].'-'.$pl['pld_name'].'</span>';
					  echo '<br>';
				}				
				?></td>
                <td><?php echo $development['r1_cp_name'];?></td>
				 <td><span class="badge badge-pill badge-warning"><?php echo $desgination['cd_name'];?></span></td>
                <td><span class="badge badge-pill badge-info"><?php echo $development['r1_cp_contact'];?></span></td>
				<td><?php echo $development['r1_created_on'];?> <?php echo $development['r1_creation_time'];?></td>
				<td>
				<a href="pd-detail_2a.php?id=<?php echo base64_encode($development['r1_id']);?>" class="btn btn-outline-light btn-sm">Rank 2A</a>
				<a href="pd-detail_2b.php?id=<?php echo base64_encode($development['r1_id']);?>" class="btn btn-outline-light btn-sm">Rank 2B</a>
				</td>
                </tr>
			   <?php } ?>
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