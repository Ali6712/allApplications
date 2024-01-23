<?php include("../include/security.php");?>
<?php include("../include/conn.php");?>

<?php 

$select_recents = mysqli_query($db,"select * from tbl_cpa where FLD_ID > 0 

and FLD_YEAR='".date('Y')."' and ( FLD_CFLAG='Pending' or FLD_CFLAG='Objected'
or FLD_CFLAG='Task Delayed' or FLD_CFLAG='Awareness Required')
order by FLD_ID desc limit 0,100");	


?>

<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?php echo $title;?>Report - Department Wise Pending List</title>

<!-- Favicon -->
<link rel="shortcut icon" href="../assets/media/image/favicon.png"/>

<!-- Plugin styles -->
<link rel="stylesheet" href="vendors/bundle.css" type="text/css">

<!-- Datepicker -->
<link rel="stylesheet" href="vendors/datepicker/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="assets/js/datatables/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="assets/js/datatables/buttons.dataTables.min.css">

<!-- App styles -->
<link rel="stylesheet" href="assets/css/app.min.css" type="text/css">
</head>
<body style="background-color:#fff !important;">

<!-- begin::page loader-->
<div class="page-loader">
<div class="spinner-border"></div>
</div>
<!-- end::page loader -->

<!-- begin::header -->
<div class="header" style="background-color:#fff !important;">

<!-- begin::header logo -->
<div class="header-logo">
<a href="../index.php">
<img class="large-logo" src="../assets/media/image/logo.png" alt="image">
<img class="small-logo" src="../assets/media/image/logo-sm.png" alt="image">
<img class="dark-logo" src="../assets/media/image/logo-dark.png" alt="image">
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
<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Report - Department Wise Pending List</li>
</ol>
</nav>
<!-- end::breadcrumb -->

</div>


</div>
<!-- end::header body -->

</div>
<!-- end::header -->

<!-- begin::main content -->
<main class="main-content" style="margin-left:0px !important;">

<div class="card">
<div class="card-body">
<table id="example1" class="table table-striped table-bordered">
<thead>
<tr>
<th>Sr No</th>
<th>Date & Time</th>
<th>CPA For</th>
<th>CPA Type</th>
<th>Finding Issue</th>
<th>Finding Type</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php  while($row_recent = mysqli_fetch_array($select_recents)){	

$depts=mysqli_query($db,"select * from tbl_depts where 
FLD_ID='".$row_recent["FLD_DNAME"]."'");
$dept =mysqli_fetch_array($depts);

$ctypes=mysqli_query($db,"select * from tbl_cpatypes where 
FLD_ID='".$row_recent["FLD_CTYPE"]."'");
$ctype =mysqli_fetch_array($ctypes);


$fissues=mysqli_query($db,"select * from tbl_fissues where 
FLD_ID='".$row_recent["FLD_FISU"]."'");
$fissue =mysqli_fetch_array($fissues);

$ftypes=mysqli_query($db,"select * from tbl_ftypes where 
FLD_ID='".$row_recent["FLD_FTYPE"]."'");
$ftype =mysqli_fetch_array($ftypes);


?>    
<tr>
<td><?php echo $row_recent['FLD_ID'];?></td>
                                <td><?php echo date("d-M-y", strtotime($row_recent['FLD_ERDAT']));?></td>
								<td><?php echo $dept['FLD_DNAME'];?></td>
								<td><?php echo $ctype['FLD_CPANAME'];?></td>
								<td><?php echo $fissue['FLD_FNAME'];?></td>
								<td><?php echo $ftype['FLD_FTNAME'];?></td>
								<td><?php if($row_recent['FLD_CFLAG']=='QA Pending'){
									echo 'Compliance Pending';
									
								}elseif($row_recent['FLD_CFLAG']=='QA Followup'){
									echo 'Compliance Followup';
									
								}elseif($row_recent['FLD_CFLAG']=='Completed'){
									echo 'Closed';
									
								}else{
									echo $row_recent['FLD_CFLAG'];
									
								};?>
								
								</td>
								<td>
							
								
								
								<a href="../completed-detail.php?id=<?php echo base64_encode($row_recent['FLD_ID']);?>" style="color:green;" target="_blank">Detail</a> 
								
                                
							   
								</td>
</tr>
<?php 

} ?>

</tbody>


</table>
</div>
</div>


</main>
<!-- end::main content -->

<!-- Plugin scripts -->
<script src="vendors/bundle.js"></script>
<script src="assets/js/examples/datatable.js"></script>


<script type="text/javascript" src="assets/js/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/jszip_3.1.3_jszip.min.js"></script>

<script type="text/javascript" src="assets/js/datatables/pdfmake.min.js
"></script>
<script type="text/javascript" src="assets/js/datatables/vfs_fonts.js
"></script>
<script type="text/javascript" src="assets/js/datatables/buttons.html5.min.js"></script>


<script src="assets/js/app.min.js"></script>
</body>

</html>