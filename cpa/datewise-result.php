<?php include("include/security.php");?>
<?php include("include/conn.php");?>

<?php 
$date  = explode('-',$_POST['simple-date-range-picker']);
$date1 = explode('/',$date[0]);
$date2 = explode('/',$date[1]);


$from  = trim($date1[2]).'-'.trim($date1[0]).'-'.trim($date1[1]);
$to    = trim($date2[2]).'-'.trim($date2[0]).'-'.trim($date2[1]);


if($_POST['FLD_FISU']!=''){
    
  $FLD_FISU = 'and FLD_FISU='.$_POST['FLD_FISU'];    
    
}



if($_POST['FLD_FTYPE']!=''){
    
  $FLD_FTYPE = 'and FLD_FTYPE="'.$_POST['FLD_FTYPE'].'"';    
    
}

if($_POST['FLD_CTYPE']!=''){
    
  $FLD_CTYPE = 'and FLD_CTYPE="'.$_POST['FLD_CTYPE'].'"';   
    
}

if($_POST['FLD_DNAME']!=''){
    
  $FLD_DNAME = 'and FLD_DNAME="'.$_POST['FLD_DNAME'].'"';    
    
}



if($_POST['FLD_CFLAG']!=''){
    
  $FLD_CFLAG = 'and FLD_CFLAG="'.$_POST['FLD_CFLAG'].'"';   
    
}




$select = mysqli_query($db,"select * from tbl_cpa where FLD_ID > 0 and FLD_ERDAT between '".$from."' and '".$to."' $FLD_FISU $FLD_FTYPE $FLD_CTYPE $FLD_DNAME $FLD_CFLAG order by FLD_ERDAT asc");



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Report - <?php echo date("d-M-y", strtotime($from)) ;?> - <?php echo date("d-M-y", strtotime($to));?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/media/image/favicon.png"/>

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
                    <th>Sr No</th>
					<th>Date & Time</th>
					<th>CPA Type</th>
					<th>Finding Issue</th>
					<th>Finding Type</th>
					<th>Raised By</th>
					<th>Marked to</th>
					<th>Department Response (Date)</th>
					<th>Department Response (Days)</th>
					<th>Root Cause</th>
					<th>Corrective Action</th>
					<th>Target Date</th>
					<th>CPA Status</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row=mysqli_fetch_array($select)){
                
                	$depts=mysqli_query($db,"select * from tbl_depts where 
					FLD_ID='".$row["FLD_DNAME"]."'");
					$dept =mysqli_fetch_array($depts);
				  
					$ctypes=mysqli_query($db,"select * from tbl_cpatypes where 
					FLD_ID='".$row["FLD_CTYPE"]."'");
					$ctype =mysqli_fetch_array($ctypes);

					$fissues=mysqli_query($db,"select * from tbl_fissues where 
					FLD_ID='".$row["FLD_FISU"]."'");
					$fissue =mysqli_fetch_array($fissues);

					$ftypes=mysqli_query($db,"select * from tbl_ftypes where 
					FLD_ID='".$row["FLD_FTYPE"]."'");
					$ftype =mysqli_fetch_array($ftypes);
				   
 					$users=mysqli_query($db,"select * from tbl_usr02 where 
					FLD_ID='".$row["FLD_CRTBY"]."'");
					$user =mysqli_fetch_array($users);        

                    if($row['FLD_DDATE']!=''){
                    $timestamp1 = strtotime($row['FLD_DDATE']);
					$timestamp2 = strtotime($row['FLD_ERDAT']);			
						
						
					$diff = abs($timestamp2 - $timestamp1);
                    $years = floor($diff / (365*60*60*24));
                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));							
					}
 
					
                ?>    
                <tr>
                     <td><a href="completed-detail.php?id=<?php echo base64_encode($row['FLD_ID']);?>" style="color:green;" target="_blank"><?php echo $row['FLD_ID'];?></a>
</td>
				<td><?php echo date("d-M-y", strtotime($row['FLD_ERDAT']));?></td>
				
				<td><?php echo $ctype['FLD_CPANAME'];?></td>
				<td><?php echo $fissue['FLD_FNAME'];?></td>
				<td><?php echo $ftype['FLD_FTNAME'];?></td>
				<td><?php echo $user['FLD_BNAME'];?></td>
				<td><?php echo $dept['FLD_DNAME'];?></td>
				<td><?php echo date("d-M-y", strtotime($row['FLD_DDATE']));?></td>
			   
				<td><?php 
								if($days==0){
								   $days = 1;	
									
								}
								echo $days;
								?>
				</td>
				 <td><?php echo $row['FLD_ROOTC'];?></td>
			    <td><?php echo $row['FLD_CORAC'];?></td>
				<td><?php echo date("d-M-y", strtotime($row['FLD_TDATE']));?></td>
				<td><?php echo $row['FLD_CFLAG'];?></td>
		
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