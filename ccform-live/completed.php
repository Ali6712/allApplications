<?php include("include/security.php");?>
<?php include("include/conn.php");?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Completed Complaints</title>
   
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
                    <li class="breadcrumb-item"><a href="javascript:">Completed Complaints</a></li>
                    
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
            <h6 class="card-title">Please select year to view completed complaints.</h6>
            <form class="needs-validation" novalidate="" action="completed-list.php" method="POST"  enctype="multipart/form-data">
     
	
						<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Year</label>
								<div class="col-sm-3">
									<select id="year" name="year" class="form-control">
									   <?php for($i=2009;$i<=date('Y');$i++){?>
									   <option value="<?php echo $i;?>" <?php if($i==date('Y')){echo "selected='selected'";}?>><?php echo $i;?></option>
									   
									   <?php } ?>
									
							   </select>
								</div>
						</div>
						<div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Department</label>
                            <div class="col-sm-3">
                                 <select id="comp_for" name="comp_for" class="form-control" required>
                                 <option value="">Select</option>
								<?php 
								   $departments= mysqli_query($db,"SELECT * FROM  departments where dtype='Dept' order by dname asc");
								   while($department = mysqli_fetch_array($departments)){   
								?>
								   <option value="<?php echo $department['di'];?>"><?php echo $department['dname'];?></option>
								
								<?php } ?>
						</select>
                            </div>
                        </div>
               <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"></label>
                            <div class="col-sm-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
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