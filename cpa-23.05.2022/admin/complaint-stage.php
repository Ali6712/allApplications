<?php include("../include/security.php");?>
<?php include("../include/conn.php");
if(!isset($_SESSION['user_id'])){
	header("location:../login.php");
}

$select_all = mysqli_query($db,"select * from stages");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Admin Dashboard</title>
   
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
<?php //include("include/user-sidebar.php");?>
<!-- end::sidebar user profile -->

<?php include("include/sidebar.php");?>

<!-- begin::header -->
<div class="header">

    <!-- begin::header logo -->
    <div class="header-logo">
        <a href="index.php">
            <img class="large-logo" src="../assets/media/image/logo.png" alt="image">
            <img class="small-logo" src="../assets/media/image/logo-sm.png" alt="image">
            <img class="dark-logo" src="../assets/media/image/logo-dark.png" alt="image">
        </a>
    </div>
    <!-- end::header logo -->

    <!-- begin::header body -->
    <div class="header-body">

        <div class="header-body-left">

            <h3 class="page-title">Customer Complaint Management </h3>

            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Complaint Stages</li>
                </ol>
            </nav>
            <!-- end::breadcrumb -->

        </div>

        <?php //include("include/notification.php");?>

    </div>
    <!-- end::header body -->

</div>
<!-- end::header -->

<!-- begin::main content -->
<main class="main-content">

    <div class="card">

        <div class="card-body">
<div style="float:right;margin-right: 10px;"><a class="btn btn-primary" href="new-complaint-stage.php">New Complaint Stage</a></div>
		<br>
		<br>
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                <tr>
					<th>Name</th>
                    <th>Action</th>
					
                </tr>
                </thead>
                <tbody>
				<?php while($row=mysqli_fetch_array($select_all)){
                
                	
 
					
                ?>    
                 <tr>
                    <td><?php echo $row['sname'];?></td>
					<td><a href="edit-complaint-stage.php?si=<?php echo $row['si'];?>">Edit</a></td>
  
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