<?php include("../include/security.php");?>
<?php include("../include/conn.php");?>



<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?php echo $title;?>Reports</title>

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
<?php include("include/sidebar.php");?>
<!-- end::navigation -->

<!-- begin::header -->
<div class="header">

<!-- begin::header logo -->
<div class="header-logo">
<a href="../index.php">
<img class="large-logo" src="../assets/media/image/logo.png" alt="image">
<img class="small-logo" src="../assets/media/image/logo-sm.png" alt="image">
<img class="dark-logo" src="../assets/media/image/logo-dark.png" alt="image">
</a>
</div>
<!-- end::header logo -->

<!-- begin::header body 
<div class="header-body">

<div class="header-body-left">

<h3 class="page-title">Customer Complaint Management</h3>


<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Other</a></li>
<li class="breadcrumb-item active" aria-current="page">Reports</li>
</ol>
</nav>


</div>-->


</div>
<!-- end::header body -->

</div>
<!-- end::header -->

<!-- begin::main content -->
<main class="main-content">
<form  action="datewise-result.php" method="POST" target="_blank" >
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
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Finding Issue</label>
<div class="col-sm-8">
<select id="FLD_FISU" name="FLD_FISU" class="js-example-basic-single">
<option value="">Select</option>
<?php 
$issues= mysqli_query($db,"SELECT * FROM tbl_fissues where FLD_FFLAG='Active' order by FLD_FNAME asc");
while($issue = mysqli_fetch_array($issues)){   
?>
<option value="<?php echo $issue['FLD_ID'];?>"><?php echo $issue['FLD_FNAME'];?></option>

<?php } ?>
</select>
</div>
</div>
</div>


<div class="col-md-6">
<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Finding Type</label>
<div class="col-sm-8">
<select id="FLD_FTYPE" name="FLD_FTYPE" class="js-example-basic-single">
<option value="">Select</option>
<?php 
$types= mysqli_query($db,"SELECT * FROM tbl_ftypes where FLD_FTFLAG='Active' order by FLD_FTNAME asc");
while($type = mysqli_fetch_array($types)){   
?>
<option value="<?php echo $type['FLD_ID'];?>"><?php echo $type['FLD_FTNAME'];?></option>

<?php } ?>
</select>
</div>
</div>
</div>


<div class="col-md-6">
<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">CPA Type</label>
<div class="col-sm-8">
<select class="js-example-basic-single" id="FLD_CTYPE" name="FLD_CTYPE">
<option></option>
<?php 
$cpas= mysqli_query($db,"SELECT * FROM tbl_cpatypes where FLD_CPAFLAG='Active' order by FLD_CPANAME asc");
while($cpa = mysqli_fetch_array($cpas)){   
?>
<option value="<?php echo $cpa['FLD_ID'];?>"><?php echo $cpa['FLD_CPANAME'];?></option>

<?php } ?>
</select>
</div>
</div>
</div>


<?php if($_SESSION['FLD_BTYPE']=='Admin'){
$display='block';
}else{
$display='none';
}?>


<div class="col-md-6" style="display:<?php echo $display;?>">
<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Department Wise</label>
<div class="col-sm-8">


<select id="FLD_DNAME" name="FLD_DNAME" class="js-example-basic-single"  >
<option value="">Select</option>
<?php 
$departments= mysqli_query($db,"SELECT * FROM tbl_depts where FLD_DFLAG='Active' order by FLD_DNAME asc");
while($department = mysqli_fetch_array($departments)){   
?>
<option value="<?php echo $department['FLD_ID'];?>" <?php if($_SESSION['FLD_DNAME']==$department['FLD_ID'] and $_SESSION['FLD_BTYPE']!='Admin'){echo "selected='selected'";}?>><?php echo $department['FLD_DNAME'];?></option>

<?php } ?>
</select>

</div>
</div>
</div>


<div class="col-md-6">
<div class="form-group row">
<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Status Wise</label>
<div class="col-sm-8">
<select class="js-example-basic-single" id="FLD_CFLAG" name="FLD_CFLAG">
<option></option>
<option value="QA Followup">QA Followup</option>
<option value="Objected">Objected</option>
<option value="Task Delayed">Task Delayed</option>
<option value="Awareness Required">Awareness Required</option>
<option value="Completed">Closed</option>
<option value="Deleted">Deleted</option>
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