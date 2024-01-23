<?php include("include/security.php");?>
<?php include("include/conn.php");?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Completed Complaints</title>
   
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

            <h3 class="page-title">Customer Complaint Management</h3>

            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:">Completed Complaints</a></li>
                    
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
                   <th>Serial</th>
                    <th>Complaint for</th>
                    <th>Issue Department</th>
                    <th>Customer</th>
                    <th>Product Grade </th>
                     <th>Complaint Stage</th>
                    <th>Process Type</th>
                    <th>Defect Type</th>
					<th>Completed Date</th>
					<th>Final Remarks</th>
                </tr>
                </thead>
                <tbody>
				<?php 
				
				  $concern_complaints= mysqli_query($db,"select * from complain where comp_for='".$_POST["comp_for"]."'                  and c_year = '".$_POST["year"]."' and sRemarks!='' 
					  order by comp_for,Serno");
				   while($concern_complaint = mysqli_fetch_array($concern_complaints)){  
				   $complaints= mysqli_query($db,"SELECT * FROM complain where Serno='".$concern_complaint['serno']."'");
				   $complaint = mysqli_fetch_array($complaints);
                   
                   $types=mysqli_query($db,"select * from types where id='".$concern_complaint["process_type"]."'");
                	$row_type=mysqli_fetch_array($types);
                	
                	$process_type = $row_type['tname'];
                	
                	$defects=mysqli_query($db,"select * from defects where 
                	id='".$concern_complaint["defect_type"]."'");
                	$row_defect=mysqli_fetch_array($defects);
                	
                	$defect_type  = $row_defect['dname'];
                    
                    
                    $select_to=mysqli_query($db,"select * from departments where
                	di='".$concern_complaint['comp_for']."'");
                	$row_to=mysqli_fetch_array($select_to);
                   
                       					 
		       ?>
		       
		       
		        <tr>
                 <td><a href="completed-detail.php?id=<?php echo base64_encode($concern_complaint['Serno']);?>"><?php echo $concern_complaint['Serno'];?></a></td> 
                <td><?php echo $row_to['dname'];?></td>
                <td><?php echo $concern_complaint['issue_dept'];?></td>
                <td><?php echo $concern_complaint['cust_name'];?></td>
                <td><?php echo $concern_complaint['prod_desc'];?></td>
                <td><?php echo $concern_complaint['comp_stage'];?></td>
				<td><?php echo $process_type;?></td>
				<td><?php echo $defect_type;?></td>
				<td><?php echo $concern_complaint['sDate'];?></td>
					<td><?php echo $concern_complaint['sRemarks'];?></td>
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
<!-- DataTable -->
<script src="vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="assets/js/examples/datatable.js"></script>
<!-- App scripts -->
<script src="assets/js/app.min.js"></script>
</body>

</html>