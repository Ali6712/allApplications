<?php include("../include/security.php");?>
<?php include("../include/conn.php");?>

<?php 

$select_all = mysqli_query($db,"select * from complain where Serno > '0' and comp_for='".base64_decode($_GET['id'])."' and c_year='".date('Y')."'");
$count_all  = mysqli_num_rows($select_all);

$select_c_all = mysqli_query($db,"SELECT DISTINCT(cust_name) FROM complain where Serno > '0' and comp_for='".base64_decode($_GET['id'])."' and c_year='".date('Y')."' GROUP by cust_name");
$count_c_all  = mysqli_num_rows($select_c_all);

$select_n_c = mysqli_query($db,"SELECT * FROM complain where Serno > '0' and comp_for='".base64_decode($_GET['id'])."' and comp_sample='No' and c_year='".date('Y')."'");
$count_n_c  = mysqli_num_rows($select_n_c);


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Lab Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/media/image/favicon.png"/>

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

<!-- begin::navigation -->
<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li class="active" data-toggle="tooltip" title="Dashboard">
                <a href="#navigationDashboards" title="Dashboards">
                    <i class="icon ti-pie-chart"></i>
                    <span class="badge badge-warning">2</span>
                </a>
            </li>

          
        </ul>
       
    </div>
    <div class="navigation-menu-body">
        <ul id="navigationDashboards" class="navigation-active">
            <li class="navigation-divider">DASHBOARD</li>
            <li>
                <a class="active" href="dashboard-lab.php?id=<?php echo $_GET['id'];?>">Overview</a>
            </li>
           
            <li class="navigation-divider">Other</li>
           <li>
                <a href="#">Reports</a>
                <ul>
                    <li><a href="datewise-so.php?id=<?php echo $_SESSION['user_name'];?>">Datewise </a></li>

                    
                </ul>
            </li>
          
     
        </ul>
        
		
	
	</div>
</div>
<!-- end::navigation -->

<!-- begin::header -->
<div class="header">

    <!-- begin::header logo -->
    <div class="header-logo">
        <a href="dashboard-so.php?email=<?php echo $_SESSION['user_name'];?>">
            <img class="large-logo" src="../assets/media/image/logo.png" alt="image">
            <img class="small-logo" src="../assets/media/image/logo-sm.png" alt="image">
            <img class="dark-logo" src="../assets/media/image/logo-dark.png" alt="image">
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
                    <li class="breadcrumb-item"><a href="dashboard-so.php?email=<?php echo $_SESSION['user_name'];?>">Other</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reports</li>
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
<form  action="datewise-so-result.php" method="POST" target="_blank" >
    <div class="card">
        <div class="card-body">
          
  <h6 class="card-title">Datewise Report</h6>
             <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Date</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" name="simple-date-range-picker" >
                            </div>
                        </div>
             </div>
             
             <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Customers</label>
                            <div class="col-sm-8">
                                <select class="js-example-basic-single" id="cust_name" name="cust_name">
                                    <option></option>
                                   	<?php 
								   $customers= mysqli_query($db,"SELECT * FROM customers order by cName asc");
								   while($customer = mysqli_fetch_array($customers)){   
								?>
								   <option value="<?php echo $customer['cName'];?>"><?php echo $customer['cName'];?></option>
								
								<?php } ?>
                                </select>
                            </div>
                        </div>
             </div>
             
             
             <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Sale Officers</label>
                            <div class="col-sm-8">
                                <select class="js-example-basic-single" id="ename" name="ename">
                                    <option></option>
                                   	<?php 
								   $sos= mysqli_query($db,"SELECT DISTINCT(email) from complain where email='".$_SESSION['user_name']."' order by email asc");
								   while($so = mysqli_fetch_array($sos)){  
								       
								       $email = explode('@',$so['email']);
								       
								?>
								   <option value="<?php echo $so['email'];?>"><?php echo $email[0];?></option>
								
								<?php } ?>
                                </select>
                            </div>
                        </div>
             </div>
             
             
             <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Color</label>
                            <div class="col-sm-8">
                                <select class="js-example-basic-single" id="comp_color" name="comp_color">
                                    <option></option>
                                   		<?php 
								   $colors= mysqli_query($db,"SELECT * FROM colors order by colorName asc");
								   while($color = mysqli_fetch_array($colors)){   
								?>
								   <option value="<?php echo $color['colorName'];?>"><?php echo $color['colorName'];?></option>
								
								<?php } ?>
                                </select>
                            </div>
                        </div>
             </div>
             
             

             
             
              <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Department</label>
                            <div class="col-sm-8">
                               
                                
                                <select class="js-example-basic-single" id="comp_for" name="comp_for" class="form-control"  onchange="get_types(this.value);">
                                   <option value="">Select</option>
								<?php 
								   $departments= mysqli_query($db,"SELECT * FROM departments where dtype='Dept' AND dtflag='1' order by dname asc");
								   while($department = mysqli_fetch_array($departments)){   
								?>
								   <option value="<?php echo $department['di'];?>"><?php echo $department['dname'];?></option>
								
								<?php } ?>
						   </select>
                                
                            </div>
                        </div>
             </div>
             
             	<div id="get_types">
             	    
             	     <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Process Type</label>
                            <div class="col-sm-8">
                                 <select  id="process_type" name="process_type" class="form-control">
                                   <option value="">Select</option>
							
						   </select>
                            </div>
                        </div>
             </div>
             	    <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Defect Type</label>
                            <div class="col-sm-8">
                                 <select  id="process_type" name="process_type" class="form-control">
                                   <option value="">Select</option>
							
						   </select>
                            </div>
                        </div>
             </div>
             	    
             	    
             	    </div>

             
             
             <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Defective Sample</label>
                            <div class="col-sm-8">
                                <select class="js-example-basic-single" id="comp_sample" name="comp_sample">
                                    <option></option>
                                   	<option value="No">No</option>
								   <option value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>
             </div>
             
             
             
             <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Sales Response Wise</label>
                            <div class="col-sm-8">
                                <select class="js-example-basic-single" id="sRemarks" name="sRemarks">
                                    <option></option>
                                   	<option value="Discounted Sale">Discounted Sale</option>
								   <option value="Material Return">Material Return</option>
								   
								   <option value="Customer Consumed Material Conditionally">Customer Consumed Material Conditionally</option>
								   
								   <option value="Material Replaced">Material Replaced</option>
								   
								   <option value="Customer Satisfied">Customer Satisfied</option>
								   
								   <option value="Further trials recommended">Further trials recommended</option>
								   
								   <option value="Claimed">Claimed</option>
								   <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
             </div>
             
             
             
             <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"></label>
                            <div class="col-sm-8">
                                <input type="submit" class="btn btn-primary" value="Exceute">
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


<script>
  function get_types(id){

        $.post("../controllers/get_types2.php",{id:id},function(data){   
        				
        document.getElementById("get_types").innerHtml=$("#get_types").html(data);
        });	

}  
</script>

</body>

</html>