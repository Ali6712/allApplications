<?php include("include/security.php");?>
<?php include("include/conn.php");?>

<?php 
$select_all = mysqli_query($db,"select * from complain where Serno > '0' and c_year='".date('Y')."'");
$count_all  = mysqli_num_rows($select_all);

$select_c_all = mysqli_query($db,"SELECT DISTINCT(cust_name) FROM complain where Serno > '0' and c_year='".date('Y')."' GROUP by cust_name");
$count_c_all  = mysqli_num_rows($select_c_all);

$select_n_c = mysqli_query($db,"SELECT * FROM complain where Serno > '0' and comp_sample='No' and c_year='".date('Y')."'");
$count_n_c  = mysqli_num_rows($select_n_c);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Log Sheet</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/media/image/favicon.png"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="vendors/bundle.css" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="vendors/datepicker/daterangepicker.css">

 <!-- Select2 -->
    <link rel="stylesheet" href="vendors/select2/css/select2.min.css" type="text/css">

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
                    <li class="breadcrumb-item active" aria-current="page">Log Sheet</li>
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
<form class="needs-validation" novalidate="" action="log-sheet-result.php" method="POST" target="_blank" >
    <div class="card">
        <div class="card-body">
          
  <h6 class="card-title">Datewise Log Sheet</h6>
             <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Date range of report</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" name="simple-date-range-picker" >
                            </div>
                        </div>
             </div>
             
             <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Customers</label>
                            <div class="col-sm-8">
                                <select id="r1_c_id" name="r1_c_id" class="js-example-basic-single">
                                   <option value="0">Select</option>
								<?php 
								   $customers= mysqli_query($db,"SELECT * FROM tblcustomers order by c_name asc");
								   while($customer = mysqli_fetch_array($customers)){   
								?>
								   <option value="<?php echo $customer['c_id'];?>"><?php echo $customer['c_name'];?></option>
								
								<?php } ?>
						   </select>
                            </div>
                        </div>
             </div>
             
             
             <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Product Lines</label>
                            <div class="col-sm-8">
                                <select class="js-example-basic-single" id="pld_id" name="pld_id">
									<option value="0">Select</option>
									
									<?php 
									   $pls= mysqli_query($db,"SELECT * FROM tblproductlines where pl_status='1' order by pl_name asc");
									   while($pl = mysqli_fetch_array($pls)){   
									?>
									<optgroup label="<?php echo $pl['pl_name'];?>">
										<?php 
										   $pl_ds= mysqli_query($db,"SELECT * FROM tblproductsublines where pl_id='".$pl['pl_id']."' order by pld_name asc");
										   while($pl_d = mysqli_fetch_array($pl_ds)){   
										?>
										<option value="<?php echo $pl_d['pld_id'];?>"><?php echo $pl['pl_name'];?>-<?php echo $pl_d['pld_name'];?></option>
										<?php } ?>
										
										
									</optgroup>
									<?php } ?>
								</select>
                            </div>
                        </div>
             </div>
             
             
             <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Color</label>
                            <div class="col-sm-8">
                               <select id="r1_color" name="r1_color" class="js-example-basic-single">
											   <option value="0">Select</option>
											<?php 
											   $categories= mysqli_query($db,"SELECT * FROM tblproductcategory where pc_status='1' order by pc_name asc");
											   while($category = mysqli_fetch_array($categories)){   
											?>
											   <option value="<?php echo $category['pc_id'];?>"><?php echo $category['pc_name'];?></option>
											
											<?php } ?>
                                </select>
                            </div>
                        </div>
             </div>
             
             
             
 <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Sales Person</label>
                            <div class="col-sm-8">
                               <select id="user_id" name="user_id" class="js-example-basic-single">
											   <option value="0">Select</option>
											<?php 
											   $users= mysqli_query($db,"SELECT * FROM tblusers where user_type='User' and user_login_flag='1'");
											   while($user = mysqli_fetch_array($users)){   
											?>
											   <option value="<?php echo $user['user_id'];?>" ><?php echo $user['user_name'];?></option>
											
											<?php } ?>
									   </select>
                            </div>
                        </div>
             </div>
             
              <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Lab Person</label>
                            <div class="col-sm-8">
                                <select id="marked_to_id" name="marked_to_id" class="js-example-basic-single">
											   <option value="0">Select</option>
											<?php 
											   $users= mysqli_query($db,"SELECT * FROM tblusers where user_type='Lab' and user_login_flag='1'");
											   while($user = mysqli_fetch_array($users)){   
											?>
											   <option value="<?php echo $user['user_id'];?>" ><?php echo $user['user_name'];?></option>
											
											<?php } ?>
									   </select>
                            </div>
                        </div>
             </div>
             
             
             <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Date range of Sent to Lab (Rank 2)</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" name="rank2" >
                            </div>
                        </div>
             </div>
             
             <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Date range of Received From lab (Rank 4)</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" name="pd4" >
                            </div>
                        </div>
             </div>
             <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"></label>
                            <div class="col-sm-8">
                                <button class="btn btn-primary" type="submit">Exceute</button>
                            </div>
                        </div>
             </div>
             
    </div>
          
        </div>
   </form>
    
</main>
<!-- end::main content -->

<!-- Plugin scripts -->
<script src="vendors/bundle.js"></script>
<!-- Select2 -->
<script src="vendors/select2/js/select2.min.js"></script>
<script src="assets/js/examples/select2.js"></script>
<script src="vendors/datepicker/daterangepicker.js"></script>
<script src="assets/js/examples/datepicker.js"></script>
<script src="assets/js/app.min.js"></script>
</body>

</html>