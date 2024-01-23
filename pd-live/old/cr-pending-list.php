<?php include("include/security.php");?>
<?php include("include/conn.php");?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Pending Complaints</title>
   
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

<!-- end::sidebar user profile -->

<!-- begin::sidebar settings -->
<?php include("include/sidebar.php");?>

<!-- end::sidebar settings -->

<!-- begin::header -->
<div class="header">

    <!-- begin::header logo -->
    <div class="header-logo">
        <a href="index.php">
            <img class="large-logo" src="assets/media/image/logo.png" alt="image">
            <img class="small-logo" src="assets/media/image/logo-sm.png" alt="image">
            <img class="dark-logo" src="assets/media/image/logo-dark.png" alt="image">
        </a>
    </div>
    <!-- end::header logo -->

    <!-- begin::header body -->
    <div class="header-body">

        <div class="header-body-left">

            <h3 class="page-title">Customer Complaint Management</h3>

            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:">Pending Complaints</a></li>
                    
                </ol>
            </nav>
            <!-- end::breadcrumb -->

        </div>

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
                    <th>Complaint for</th>
                    <th>Issue Department</th>
                    <th>Customer</th>
                    <th>Product Description</th>
                    <th>Reason</th>
					<th>Date In</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				   $complaints= mysqli_query($db,"SELECT * FROM complain where issue_dept='".$_SESSION['dname']."' and status='Pending' order by Serno");
				   while($complaint = mysqli_fetch_array($complaints)){  
                    					 
		       ?>
                <tr>
                <td><a href="cr-detail.php?id=<?php echo base64_encode($complaint['Serno']);?>"><?php echo $complaint['Serno'];?></a></td> 
                <td><?php echo $complaint['comp_for'];?></td>
                <td><?php echo $complaint['issue_dept'];?></td>
                <td><?php echo $complaint['cust_name'];?></td>
                <td><?php echo mysqli_real_escape_string($db,$complaint['prod_desc']);?></td>
				<td><?php echo $complaint['reason'];?></td>
				<td><?php echo $complaint['sub_date'];?></td>
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