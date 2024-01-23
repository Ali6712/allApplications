<?php include("include/security.php");?>
<?php include("include/conn.php");?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Dashboard</title>

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
<?php include("include/header.php");?>
<!-- end::header -->

<!-- begin::main content -->
<main class="main-content">

    <div class="card">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between align-items-center">
                <h6>Complaints</h6>
                <div class="slick-single-arrows">
                    <a class="btn btn-outline-light btn-sm">
                        <i class="ti-angle-left"></i>
                    </a>
                    <a class="btn btn-outline-light btn-sm">
                        <i class="ti-angle-right"></i>
                    </a>
                </div>
            </div>
            <div class="row slick-single-item">
                <div class="col-xl-4 col-lg-6 col-lg-6 col-sm-12">
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="icon-block icon-block-sm bg-danger icon-block-floating mr-2">
                                        <i class="fa fa-money"></i>
                                    </div>
                                </div>
								<?php 
								   $p_complaints= mysqli_query($db,"SELECT * FROM complain where status='Pending'");
								   $p_complaint = mysqli_num_rows($p_complaints); 
														 
							   ?>
                                <span class="text-uppercase font-size-11">Pending</span>
                                <h2 class="mb-0 ml-auto font-weight-bold text-danger"><?php echo $p_complaint;?></h2>
                            </div>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"
                                     aria-valuenow="71" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-4 col-lg-6 col-lg-6 col-sm-12">
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <div class="icon-block icon-block-sm bg-info icon-block-floating mr-2">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
								<?php 
								   $r_complaints= mysqli_query($db,"SELECT * FROM complain where status='Rejected'");
								   $r_complaint = mysqli_num_rows($r_complaints); 
														 
							   ?>
                                <span class="text-uppercase font-size-11">Rejected</span>
                                <h2 class="mb-0 ml-auto font-weight-bold text-info"><?php echo $r_complaint;?></h2>
                            </div>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 100%"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
				
                <div class="col-xl-4 col-lg-6 col-lg-6 col-sm-12">
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="icon-block icon-block-sm bg-success icon-block-floating mr-2">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                </div>
								<?php 
								   $a_complaints= mysqli_query($db,"SELECT * FROM complain where status='Approved'");
								   $a_complaint = mysqli_num_rows($a_complaints);
														 
							   ?>
                                <span class="text-uppercase font-size-11">Approved</span>
                                <h2 class="mb-0 ml-auto font-weight-bold text-success"><?php echo $a_complaint;?></h2>
                            </div>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                     aria-valuenow="39"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- <div class="row">
        <div class="col-xl-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Month Wise</h6>
                    <div class="row mb-4">
                        <div class="col-xl-6 col-md-12 text-success">
                            <h5 class="font-size-23">1500</h5>
                            <h6 class="text-uppercase font-size-11">Total Complaints</h6>
                        </div>
                        <div class="col-xl-6 col-md-12 text-primary">
                            <h5 class="font-size-23">200</h5>
                            <h6 class="text-uppercase font-size-11">Pending</h6>
                        </div>
                    </div>
                    <canvas id="chart_demo_1"></canvas>
                </div>
            </div>         
		</div>
        <div class="col-xl-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Complaints</h6>
                    <canvas id="chart_demo_9"></canvas>
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <h5 class="font-size-23 text-primary font-weight-bold">134.234,076</h5>
                            <h6 class="text-uppercase font-size-11 mb-0">Total Completed</h6>
                        </div>
                        <div class="col-md-4 mt-3">
                            <h5 class="font-size-23 text-warning font-weight-bold">1.620,076</h5>
                            <h6 class="text-uppercase font-size-11 mb-0">Pending</h6>
                        </div>
                        <div class="col-md-4 mt-3">
                            <h5 class="font-size-23 text-danger font-weight-bold">20,076</h5>
                            <h6 class="text-uppercase font-size-11 mb-0">Rejected</h6>
                        </div>
                    </div>
                </div>
            </div>
           
          
		
		</div>
    </div>
               -->


			   <div class="row">
               <?php 
			  $qaf_complaints= mysqli_query($db,"select * from concern_dept where status_ip='Approved' and status_followup='Pending' and region ='PKGS'");
			   $qaf_complaint = mysqli_num_rows($qaf_complaints);
									 
		   ?>
                <div class="col-xl-4 col-md-12">
                    <div class="card">
                        <div class="card-header">QA Follow Up</div>
                        <div class="card-body text-center">
                            <div class="mb-2">
                                <span class="bar-3">2,5,9,6,5,2,4,3,7,5</span>
                            </div>
                            <div class="font-size-40 mb-2 font-weight-bold text-danger"><?php echo $qaf_complaint;?></div>
                           
                        </div>
                    </div>
                </div> 
				<?php 
			  $qa_complaints= mysqli_query($db,"SELECT * FROM concern_dept where status_ip='Pending' and region ='PKGS'");
			   $qa_complaint = mysqli_num_rows($qa_complaints);
									 
		   ?>
				 <div class="col-xl-4 col-md-12">
                    <div class="card">
                        <div class="card-header">QA Pending</div>
                        <div class="card-body text-center">
                            <div class="mb-2">
                                <span class="bar-3">2,5,9,6,5,2,4,3,7,5</span>
                            </div>
                            <div class="font-size-40 mb-2 font-weight-bold text-warning"><?php echo $qa_complaint;?></div>
                           
                        </div>
                    </div>
                </div>
				<?php 
			  $qaa_complaints= mysqli_query($db,"SELECT * FROM concern_dept where status_ip='Approved' and region ='PKGS'");
			   $qaa_complaint = mysqli_num_rows($qaa_complaints);
									 
		   ?>
				<div class="col-xl-4 col-md-12">
                    <div class="card">
                        <div class="card-header">QA Approved</div>
                        <div class="card-body text-center">
                            <div class="mb-2">
                                <span class="bar-3">2,5,9,6,5,2,4,3,7,5</span>
                            </div>
                            <div class="font-size-40 mb-2 font-weight-bold text-success"><?php echo $qaa_complaint;?></div>
                           
                        </div>
                    </div>
                </div>
            </div>
   
   
</main>
<!-- end::main content -->

<!-- Plugin scripts -->
<script src="vendors/bundle.js"></script>

<!-- Chartjs -->
<script src="vendors/charts/chartjs/chart.min.js"></script>

<!-- Circle progress -->
<script src="vendors/circle-progress/circle-progress.min.js"></script>

<!-- Peity -->
<script src="vendors/charts/peity/jquery.peity.min.js"></script>
<script src="assets/js/examples/charts/peity.js"></script>

<!-- Datepicker -->
<script src="vendors/datepicker/daterangepicker.js"></script>

<!-- Slick -->
<script src="vendors/slick/slick.min.js"></script>

<!-- Vamp -->
<script src="vendors/vmap/jquery.vmap.min.js"></script>
<script src="vendors/vmap/maps/jquery.vmap.usa.js"></script>
<script src="assets/js/examples/vmap.js"></script>

<!-- Dashboard scripts -->
<script src="assets/js/examples/dashboard.js"></script>


<!-- App scripts -->
<script src="assets/js/app.min.js"></script>
</body>

</html>