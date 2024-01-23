<?php include("include/security.php");?>
<?php include("include/conn.php");
session_destroy();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Concern Department Pending Complaints</title>
   
    <?php include("include/head.php");?>

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
                    <li class="breadcrumb-item"><a href="javascript:">Change Password</a></li>
                    
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
            
             <?php if(isset($_GET['error'])){?>
			<div class="alert alert-danger" role="alert">
                        Old Password is incorrect!
            </div>
			<?php } ?>
            
            <h6 class="card-title">Change Password</h6>
            <form class="needs-validation" novalidate="" action="controllers/complaints.php?change=password&id=<?php echo $_GET['id'];?>" method="POST"  enctype="multipart/form-data">
     
				  <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Old Password</label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control form-control-sm" id="odpassword" name="odpassword">
                            </div>
                    </div>
						
						 
						
					<div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">New Password</label>
                            <div class="col-sm-3">
                                <input type="password" class="form-control form-control-sm" id="ndpassword" name="ndpassword">
                            </div>
                    </div>
               <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"></label>
                            <div class="col-sm-3">
                                <button class="btn btn-primary" type="submit">Change</button>
                            </div>
                    </div>
			   
				
            </form>
        </div>
    </div>

</main>
<!-- end::main content -->

<!-- Plugin scripts -->
<script src="vendors/bundle.js"></script>

<!-- App scripts -->
<script src="assets/js/app.min.js"></script>

	
</body>

</html>