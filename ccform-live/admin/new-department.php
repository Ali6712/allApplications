<?php include("../include/security.php");?>
<?php include("../include/conn.php");?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>New Department</title>
   
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
                    <li class="breadcrumb-item"><a href="javascript:">New Department</a></li>
                    
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
            
            <form class="needs-validation" novalidate="" action="controllers/departments.php?insert=department" method="POST"  enctype="multipart/form-data">
     
				    <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Type</label>
                            <div class="col-sm-3">
                                 <select id="dtype" name="dtype" class="form-control" required onchange="show_dep(this.value);">
                                 <option value="Dept">Dept</option>
								 <option value="GM">GM</option>
							
						</select>
                            </div>
                        </div>
					<div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Department Name</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control form-control-sm" id="dname" name="dname" required>
                            </div>
                    </div>
					
					<div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control form-control-sm" id="dpassword" name="dpassword" required>
                            </div>
                    </div>
					<div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control form-control-sm" id="demail" name="demail" required>
                            </div>
                    </div>
					<div style="display:none;" id="dep">
					<div class="form-group row" >
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Departments</label>
                           <div class="form-group form-check">
                                <?php $select=mysqli_query($db,"select * from departments where dtype='Dept'");
								while($row=mysqli_fetch_array($select)){
								?>  
								<input type="checkbox" class="form-check-input" id="dept[]" name="dept[]" value="<?php echo $row['di'];?>">  <label class="form-check-label" for="exampleCheck1"><?php echo $row['dname'];?></label>
<br>								


								<?php } ?>
</div>
                           
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
<script>
function show_dep(val){
 

if(val=='GM'){
	
	document.getElementById("dep").style.display='block';
	
}else{
	
	document.getElementById("dep").style.display='none';
} 
	
}
</script>
</body>

</html>