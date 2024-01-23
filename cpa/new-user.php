<?php include("include/security.php");?>
<?php include("include/conn.php");?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>New User</title>
   
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

            <h3 class="page-title">CPA Management</h3>

            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:">New User</a></li>
                    
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
            
            <form class="needs-validation" novalidate="" action="controllers/users.php?insert=user" method="POST"  enctype="multipart/form-data">
     
				   
					<div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Role</label>
                            <div class="col-sm-3">
                                <select id="FLD_BTYPE" name="FLD_BTYPE" class="form-control" required>
                                 <option value="Admin">Admin</option>
								 <option value="HOD">HOD</option>
								 <option value="User">User</option>
							
						</select>
                            </div>
                    </div>
				
                    <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Department</label>
                            <div class="col-sm-3">
                                <select id="FLD_DNAME" name="FLD_DNAME" class="form-control" required >
                                   <option value="">Select</option>
								<?php 
								   $departments= mysqli_query($db,"SELECT * FROM tbl_depts where FLD_DFLAG='Active' order by FLD_DNAME asc");
								   while($department = mysqli_fetch_array($departments)){   
								?>
								   <option value="<?php echo $department['FLD_ID'];?>"><?php echo $department['FLD_DNAME'];?></option>
								
								<?php } ?>
						   </select>
                            </div>
                    </div>
                    
                     <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
                            <div class="col-sm-3">
                    
                    <input type="text" class="form-control" id="FLD_BNAME" name="FLD_BNAME" required>
                    
                    
                      </div>
                        </div>
                        
                         <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                            <div class="col-sm-3">
                    
                    <input type="email" class="form-control" id="FLD_EMAIL" name="FLD_EMAIL" required>
                    
                    
                      </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
                            <div class="col-sm-3">
                    
                    <input type="text" class="form-control" id="FLD_BCODE" name="FLD_BCODE" required>
                    
                    
                      </div>
                        </div>
                        
                    <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Status</label>
                            <div class="col-sm-3">
                                 <select id="FLD_UFLAG" name="FLD_UFLAG" class="form-control" required>
                                 <option value="Active">Active</option>
								 <option value="Inactive">Inactive</option>
							
						</select>
                            </div>
                        </div>
					
					
               <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm"></label>
                            <div class="col-sm-3">
                                <button class="btn btn-primary" type="submit">Save</button>
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