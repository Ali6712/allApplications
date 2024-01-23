<?php include("../include/security.php");?>
<?php include("../include/conn.php");?>

<?php 


if(isset($_GET['id'])){

$select = mysqli_query($db,"SELECT * FROM complain  where Serno > '0' and comp_for='".base64_decode($_GET['id'])."' and c_year='".date('Y')."' and sRemarks!=''");
$url = 'dashboard-lab.php?id='.$_GET['id'];

}elseif(isset($_GET['email'])){

$select = mysqli_query($db,"SELECT * FROM complain  where Serno > '0' and email='".$_SESSION['user_name']."' and c_year='".date('Y')."' and sRemarks!=''");
 $url = 'dashboard-so.php?email='.$_GET['email'];
}
else{    

$select = mysqli_query($db,"SELECT * FROM complain  where Serno > '0' and c_year='".date('Y')."' and sRemarks!=''");
$url = 'index.php';
}

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
        <a href="<?php echo $url;?>">
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
                    <li class="breadcrumb-item"><a href="<?php echo $url;?>">Dashboard</a></li>
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
					<th>Creation Date </th>
                    <th>Concern Dept</th>
                    <th>Customer</th>
                    <th>Grade PO No.</th>
					<th>Color</th>
					<th>Process Type  </th>
                    <th>Defect Type  </th>
                    <th>Complaint Stage </th>
                    <th>End Application </th>
					<th>Product Dosage </th>
					<th>Base/Substrate </th>
                    <th>Defective Sample </th>
					<th>Complaint Detail </th>
					<th>Sale Officer </th>
					<th>Action Taken by Lab </th>
					<th>Root Cause Identified By Lab </th>
					<th>Corrective Action (To Prevent Re-Occurrence) by Lab </th>
					<th>Production Line  </th>  
                    <th>Shift</th>
                    <th>Complaint Nature</th>
					<th>Lab Respone Date</th>
                    <th>GM Respone</th>
					<th>GM Date</th>
                    <th>Final Remarks by Sale Person</th>
					<th>Complaint Closing Date</th>
					<th>Complaint Closing Duration</th>
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
					
					
					$select_detail=mysqli_query($db,"select * from concern_dept where
                	serno='".$row['Serno']."'");
                	$row_detail=mysqli_fetch_array($select_detail);
					$sub_date = $concern_complaint['sub_date']; 
					$close    = $row['sDate'];
					$diff   ="";
					$years  ="";
					$months ="";
					$days   ="";
					
					if($sub_date!='' and $close!=''){
					$diff   = abs(strtotime($close) - strtotime($sub_date));
					$years  = floor($diff / (365*60*60*24));
					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
					}
					
					$app_date_con   = explode(" ", $row_detail['app_date_con']);
					$f_app_date_con = $app_date_con[0];
									
					$gm_app_date   = explode(" ", $row['gm_app_date']);
					$f_gm_app_date = $gm_app_date[0];
 
					
                ?>    
                <tr>
                    <td><?php echo $row['Serno'];?></td>
					<td><?php echo date("d-M-y", strtotime($row['sub_date']));?></td>
                    <td><?php echo $row_to['dname'];?></td>
                    <td><?php echo $row['cust_name'];?></td>
					<td><?php echo $row['prod_desc'];?></td>
                    <td><?php echo $row['comp_color'];?></td>
					<td><?php echo $process_type;?></td>
                    <td><?php echo $defect_type;?></td>
                    <td><?php echo $row['comp_stage'];?></td>
                    <td><?php echo $row['end_app'];?></td>
					
					<td><?php echo $row['prod_dos'];?></td>
					<td><?php echo $row['material'];?></td>
                    
					<td><?php echo $row['comp_sample'];?></td>
					<td><?php echo $row['comp_desc'];?></td>
					<td><?php echo $row['ename'];?></td>
					
					
					<td><?php echo $row_detail['suggestion'];?></td>
					<td><?php echo $row_detail['suggestion2'];?></td>
					<td><?php echo $row_detail['suggestion3'];?></td>
					<td><?php echo $row_detail['production_line'];?></td>
					<td><?php echo $row_detail['shifts'];?></td>
					
					<td><?php echo $row_detail['comp_nature'];?></td>
					<td><?php if($f_app_date_con!=''){echo date("d-M-y", strtotime($f_app_date_con));}?></td>
					<td><?php echo $row_detail['objection'];?></td>
					<td><?php if($f_gm_app_date!=''){echo date("d-M-y", strtotime($f_gm_app_date));}?></td>
					<td><?php echo $row['sRemarks'];?></td>
					<td><?php if($row['sDate']!=''){echo date("d-M-y", strtotime($row['sDate']));}?></td>
					<td><?php echo $days;?></td>
					
					
                    
                    
                    
                    
                    
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