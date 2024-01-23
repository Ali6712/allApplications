<?php include("include/security.php");?>
<?php include("include/conn.php");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>QA Followup</title>
   
    <?php include("include/head.php");?>
    <link rel="stylesheet" href="vendors/dataTable/responsive.bootstrap.min.css" type="text/css">
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
                    <li class="breadcrumb-item"><a href="javascript:">QA Followup</a></li>
                    
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
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Sr No</th>
					<th>Date & Time</th>
					<th>CPA Type</th>
					<th>Finding Issue</th>
					<th>Finding Type</th>
					<th>Raised By</th>
					<th>Marked to</th>
					<th>Department Response (Date)</th>
					<th>Department Response (Days)</th>
					<th>Target Date</th>
					<th>CPA Status</th>
					<th>Action</th>
		        </tr>
                </thead>
                <tbody>
				<?php 
								
				  if($_SESSION['FLD_BTYPE']=='Admin'){
					$select_recents = mysqli_query($db,"select * from tbl_cpa where FLD_ID > 0 and FLD_CRTBY='".$_SESSION['FLD_ID']."'
														and FLD_YEAR='".date('Y')."' and FLD_CFLAG='QA Followup'
														order by FLD_ID desc");
					}
				   
				    while($row_recent = mysqli_fetch_array($select_recents)){	 
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
				   
 					$users=mysqli_query($db,"select * from tbl_usr02 where 
					FLD_ID='".$row_recent["FLD_CRTBY"]."'");
					$user =mysqli_fetch_array($users);        

                    if($row_recent['FLD_DDATE']!=''){
                    $timestamp1 = strtotime($row_recent['FLD_DDATE']);
					$timestamp2 = strtotime($row_recent['FLD_ERDAT']);			
						
						
					$diff = abs($timestamp2 - $timestamp1);
                    $years = floor($diff / (365*60*60*24));
                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));			
					}

					
		       ?>
                <tr>
                <td><a href="qa-followup-detail.php?id=<?php echo base64_encode($row_recent['FLD_ID']);?>" ><?php echo $row_recent['FLD_ID'];?></a></td>
				<td><?php echo date("d-M-y", strtotime($row_recent['FLD_ERDAT']));?></td>
				
				<td><?php echo $ctype['FLD_CPANAME'];?></td>
				<td><?php echo $fissue['FLD_FNAME'];?></td>
				<td><?php echo $ftype['FLD_FTNAME'];?></td>
				<td><?php echo $user['FLD_BNAME'];?></td>
				<td><?php echo $dept['FLD_DNAME'];?></td>
			<td><?php echo date("d-M-y", strtotime($row_recent['FLD_DDATE']));?></td>
				<td><?php 
								if($days==0){
								   $days = 1;	
									
								}
								echo $days;
								?>
				</td>
				<td><?php echo date("d-M-y", strtotime($row_recent['FLD_TDATE']));?></td>
				<td><?php if($row_recent['FLD_CFLAG']=='QA Pending'){
									echo 'Compliance Pending';
									
								}elseif($row_recent['FLD_CFLAG']=='QA Followup'){
									echo 'Compliance Followup';
									
								}else{
									echo $row_recent['FLD_CFLAG'];
									
								};?></td>
				<td>
				<?php 
								if($_SESSION['FLD_BTYPE']=='Admin'){?>
								
                                <a href="qa-followup-detail.php?id=<?php echo base64_encode($row_recent['FLD_ID']);?>" style="color:green;">Detail</a></a>
								
								<?php }
								?>
								 
								</td>
                </tr>
			   <?php 
			   $diff='';
			   $years='';
			   $months='';
			   $days='';
			   
			   } ?>
				</tbody>
               
            </table>
        </div>
    </div>

</main>
<!-- end::main content -->

<!-- Plugin scripts -->
<script src="vendors/bundle.js"></script>
<!-- DataTable -->
<script src="vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="assets/js/examples/datatable.js"></script>
<!-- App scripts -->
<script src="assets/js/app.min.js"></script>
</body>

</html>