<?php include("../include/security.php");?>
<?php include("../include/conn.php");?>

<?php 
$select_all = mysqli_query($db,"select * from complain where Serno > '0' and c_year='".date('Y')."'");
$count_all  = mysqli_num_rows($select_all);

$select_c_all = mysqli_query($db,"SELECT DISTINCT(cust_name) FROM complain where Serno > '0' and c_year='".date('Y')."' GROUP by cust_name");
$count_c_all  = mysqli_num_rows($select_c_all);

$select_n_c = mysqli_query($db,"SELECT * FROM complain where Serno > '0' and comp_sample='No' and c_year='".date('Y')."'");
$count_n_c  = mysqli_num_rows($select_n_c);


$date  = explode('-',$_POST['simple-date-range-picker']);
$date1 = explode('/',$date[0]);
$date2 = explode('/',$date[1]);


$from  = trim($date1[2]).'-'.trim($date1[0]).'-'.trim($date1[1]);
$to    = trim($date2[2]).'-'.trim($date2[0]).'-'.trim($date2[1]);





if($_POST['cust_name']!=''){
    
  $cust_name = 'and cust_name='.$_POST['cust_name'];    
    
}

if($_POST['ename']!=''){
    
  $ename = 'and email='.$_POST['ename'];    
    
}

if($_POST['comp_color']!=''){
    
  $comp_color = 'and comp_color='.$_POST['comp_color'];    
    
}

if($_POST['end_app']!=''){
    
  $end_app = 'and end_app='.$_POST['end_app'];    
    
}

if($_POST['prod_desc']!=''){
    
  $prod_desc = 'and prod_desc='.$_POST['prod_desc'];    
    
}

if($_POST['comp_sample']!=''){
    
  $comp_sample = 'and comp_sample='.$_POST['comp_sample'];    
    
}


$select = mysqli_query($db,"select * from complain where Serno > 0 and sub_date between '".$from."' and '".$to."' $comp_color $cust_name $prod_desc $end_app $comp_sample $ename order by sub_date asc");


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Report - <?php echo date("d-M-y", strtotime($from)) ;?> - <?php echo date("d-M-y", strtotime($to));?></title>

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

            <h3 class="page-title">Customer Complaint Management</h3>

            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Report - <?php echo date("d-M-y", strtotime($from)) ;?> - <?php echo date("d-M-y", strtotime($to));?></li>
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
                    <th>Sr.No</th>
                    <th>Concern Dept</th>
                    <th>Customer</th>
                    <th>Color</th>
                    <th>Complaint Stage </th>
                    <th>End Application </th>
                    <th>Process Type  </th>
                    <th>Defect Type  </th>
                    <th>Defective Sample </th>
                    <th>Sale Officer </th>
                    <th>Creation Date </th>
                    
                    
                </tr>
                </thead>
                <tbody>
                <?php while($row=mysqli_fetch_array($select)){
                
                	$types=mysqli_query($db,"select * from types where id='".$row["process_type"]."'");
                	$row_type=mysqli_fetch_array($types);
                	
                	$process_type = $row_type['tname'];
                	
                	$defects=mysqli_query($db,"select * from defects where 
                	id='".$row["defect_type"]."'");
                	$row_defect=mysqli_fetch_array($defects);
                	
                	$defect_type  = $row_defect['dname'];
                    
                    
                    $select_to=mysqli_query($db,"select * from departments where
                	di='".$row['comp_for']."'");
                	$row_to=mysqli_fetch_array($select_to);
                
                ?>    
                <tr>
                    <td><?php echo $row['Serno'];?></td>
                    <td><?php echo $row_to['dname'];?></td>
                    <td><?php echo $row['cust_name'];?></td>
                    <td><?php echo $row['comp_color'];?></td>
                    <td><?php echo $row['comp_stage'];?></td>
                    <td><?php echo $row['end_app'];?></td>
                    <td><?php echo $process_type;?></td>
                    <td><?php echo $defect_type;?></td>
                    <td><?php echo $row['comp_sample'];?></td>
                    <td><?php echo $row['ename'];?></td>
                    <td><?php echo date("d-M-y", strtotime($row['sub_date']));?></td>
                    
                    
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