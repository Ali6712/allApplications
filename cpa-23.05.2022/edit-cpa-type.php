<?php include("include/security.php");?>
<?php include("include/conn.php");?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Edit CPA Type</title>
   
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
                    <li class="breadcrumb-item"><a href="javascript:">Edit CPA Type</a></li>
                    
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

<?php $select=mysqli_query($db,"select * from tbl_cpatypes where FLD_ID='".base64_decode($_GET['id'])."'");
      $row=mysqli_fetch_array($select);
?>

<div class="card">
        <div class="card-body">
            
            <form class="needs-validation" novalidate="" action="controllers/cpa-types.php?edit=cpa-type&id=<?php echo base64_decode($_GET['id']);?>" method="POST"  enctype="multipart/form-data">
     
				  
					<div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control form-control-sm" id="FLD_CPANAME" name="FLD_CPANAME" value="<?php echo $row['FLD_CPANAME'];?>" required>
                            </div>
                    </div>
					
				
					<div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Status</label>
                            <div class="col-sm-3">
                               <select class="form-control form-control-solid" id="FLD_CPAFLAG" name="FLD_CPAFLAG" >
                            		 <option value="Active" <?php if($row['FLD_CPAFLAG']=='Active'){echo "selected='selected'";}?>>Active</option>
                                     <option value="Inactive" <?php if($row['FLD_CPAFLAG']=='Inactive'){echo "selected='selected'";}?>>Inactive</option>
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