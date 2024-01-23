<?php include("../include/security.php");?>
<?php include("../include/conn.php");?>
<?php 

if(isset($_GET['id'])){

$select_recents = mysqli_query($db,"SELECT * FROM complain  where Serno > '0' and comp_for='".base64_decode($_GET['id'])."' and c_year='".date('Y')."'");

}else{    

	$select_recents = mysqli_query($db,"select * from complain where Serno > 0 
																 and c_year='".date('Y')."' order by Serno desc");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Complaints - <?php echo date("d-M-y", strtotime($from)) ;?> - <?php echo date("d-M-y", strtotime($to));?></title>

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
                    <li class="breadcrumb-item active" aria-current="page">Total Complaints - <?php echo date("Y");?></li>
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
                                <th>Date</th>
                                <th>Complaint For</th>
                                <th>Customer</th>
                                <th>Process Type<br>Defect Type</th>
								<th>Lab Response Date</th>
								<th>GM Response Date</th>
								<th>Sale Officer Response Date</th>
								<th>Final Remarks</th>
								<th>Lab Response Days</th>
								<th>GM Response Days</th>
                                <th>Sale Officer Response Days</th>
                    	<th>Action</th>
                    
                </tr>
                </thead>
                <tbody>
                <?php 


																 
								  while($row_recent     = mysqli_fetch_array($select_recents)){	

								  	$types=mysqli_query($db,"select * from types where id='".$row_recent["process_type"]."'");
									$row_type=mysqli_fetch_array($types);
									
									$process_type = $row_type['tname'];

									$defects=mysqli_query($db,"select * from defects where 
									id='".$row_recent["defect_type"]."'");
									$row_defect=mysqli_fetch_array($defects);
									
									$defect_type  = $row_defect['dname'];		

									$select_to=mysqli_query($db,"select * from departments where
									di='".mysqli_real_escape_string($db,$row_recent["comp_for"])."'");
									$row_to=mysqli_fetch_array($select_to);
									$dname  = $row_to['dname'];
									$date = $row_recent['sub_date'];
									$pieces = explode(" ", $date);
									
                                    $timestamp1 = $pieces[0];
									$timestamp2 = $row_recent['sDate'];
									$select_cd  = mysqli_query($db,"select * from concern_dept where 
									serno='".$row_recent['Serno']."'");
									$row_cd       = mysqli_fetch_array($select_cd);
									
                                    $app_date_con   = explode(" ", $row_cd['app_date_con']);
									$f_app_date_con = $app_date_con[0];
									
									$gm_app_date   = explode(" ", $row_recent['gm_app_date']);
									$f_gm_app_date = $gm_app_date[0];
									
							?>

                 <tr>
                                <td><a href="detail.php?id=<?php echo base64_encode($row_recent['Serno']);?>" target="_blank"><?php echo $row_recent['Serno'];?></a></td>
                                <td><?php echo date("d-M-y", strtotime($row_recent['sub_date']));?></td>
								<td><?php echo $dname;?></td>
								<td><?php echo $row_recent['cust_name'];?></td>
                                <td><?php echo $process_type;?><br><?php echo $defect_type;?></td>
								<td><?php if($app_date_con[0]!=''){echo date("d-M-y", strtotime($app_date_con[0]));}?></td>
								<td><?php if($gm_app_date[0]!=''){echo date("d-M-y", strtotime($gm_app_date[0]));}?></td>
								
                                <td><?php if($row_recent['sDate']!=''){echo date("d-M-y", strtotime($row_recent['sDate']));}?></td>
                                <td><?php echo $row_recent['sRemarks'];?></td>
								<td><?php 
								
								$diff   ="";
								$years  ="";
								$months ="";
								$days   ="";
								
								if($row_cd['app_date_con']!='' and $row_recent['sub_date']!=''){
								$diff   = abs(strtotime($f_app_date_con) - strtotime($timestamp1));
								$years  = floor($diff / (365*60*60*24));
								$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
								$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                
                                if($days==0){
								   $days = 1;	
									
								}
								echo $days;

								}
									
								
								
								?></td>
								
								
								<td><?php 
								
								
								$diff   ="";
								$years  ="";
								$months ="";
								$days   ="";
								
								if($row_recent['gm_app_date']!='' and $row_recent['sub_date']!=''){
								$diff   = abs(strtotime($f_gm_app_date) - strtotime($timestamp1));
								$years  = floor($diff / (365*60*60*24));
								$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
								$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                
                                if($days==0){
								   $days = 1;	
									
								}
								echo $days;

								}
								
								
								
								?></td>
								

								
								<td><?php 
								
								
								$diff   ="";
								$years  ="";
								$months ="";
								$days   ="";
								
								if($row_recent['sDate']!='' and $row_recent['sub_date']!=''){
								$diff   = abs(strtotime($timestamp2) - strtotime($timestamp1));
								$years  = floor($diff / (365*60*60*24));
								$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
								$days   = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                                                
                                if($days==0){
								   $days = 1;	
									
								}
								echo $days;

								}
								
								
								
								?></td>
								
									<td>
								<?php 
								if(isset($_SESSION['user_id'])){?>
								
                                <a href="delete-complaint.php?id=<?php echo base64_encode($row_recent['Serno']);?>" style="color:red;">Delete</a>
								
								<?php }
								?>
								
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