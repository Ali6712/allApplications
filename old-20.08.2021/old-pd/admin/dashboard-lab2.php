<?php include("../include/security.php");?>
<?php include("../include/conn.php");?>
<?php 

$select_all = mysqli_query($db,"select * from complain where Serno > '0' and comp_for='".base64_decode($_GET['id'])."' and c_year='".date('Y')."'");
$count_all  = mysqli_num_rows($select_all);

$select_qc = mysqli_query($db,"SELECT * FROM complain where Serno > '0' and comp_for='".base64_decode($_GET['id'])."' and (cstatus='Pending' or cstatus='Objected' )
                               and c_year='".date('Y')."'");
$count_qc  = mysqli_num_rows($select_qc);

$select_gm = mysqli_query($db,"SELECT * FROM complain  where Serno > '0' and comp_for='".base64_decode($_GET['id'])."' and cstatus='Approved' and c_year='".date('Y')."'");
$count_gm  = mysqli_num_rows($select_gm);

$select_so = mysqli_query($db,"SELECT * FROM complain  where Serno > '0' and comp_for='".base64_decode($_GET['id'])."' and cstatus='Completed' and c_year='".date('Y')."' and sRemarks is null");
$count_so  = mysqli_num_rows($select_so);

$select_cp = mysqli_query($db,"SELECT * FROM complain  where Serno > '0' and comp_for='".base64_decode($_GET['id'])."' and c_year='".date('Y')."' and sRemarks!=''");
$count_cp  = mysqli_num_rows($select_cp);


$today_date = date('Y-m-d');
$current_month = date('M');
$current_year  = date('Y');
$current_month_in_no = '01';


$start_month=$current_month_in_no;
$current_month=12;
for($i=$start_month;$i<=$current_month;$i++){
$month = date('M', mktime(0, 0, 0, $i, 10));	
if(strlen($i)=='1'){
	$i='0'.$i;
}
$mn=$year.$i;

$total_complaints="";

$complaints= mysqli_query($db,"SELECT * FROM complain where Serno > '0' and comp_for='".base64_decode($_GET['id'])."' and c_month='".$month."' and c_year='".date('Y')."'");
while($complaint = mysqli_fetch_array($complaints)){

$total_complaints=$total_complaints + 1;	
}




$m.='"'.$month.'",';
$m_comp.='"'.$total_complaints.'",';


} 
$m=substr($m, 0, -1);
$m_comp=substr($m_comp, 0, -1);


$select_qcw = mysqli_query($db,"SELECT * FROM departments where di='".base64_decode($_GET['id'])."' and dtype='Dept'");
while($row_qc     = mysqli_fetch_array($select_qcw)){
	$row_qc_2='';
	
	$select_qcw_2 = mysqli_query($db,"SELECT * FROM complain WHERE Serno > '0' and comp_for='".$row_qc['di']."' 
	                                  and c_year='".date('Y')."'");
    $row_qc_2     = mysqli_num_rows($select_qcw_2);
	
	$qc_name.='"'.$row_qc['dname'].'",';
    $qc_total.='"'.$row_qc_2.'",';
	
	
}

$qc_name=substr($qc_name, 0, -1);
$qc_total=substr($qc_total, 0, -1);


$select_cs   = mysqli_query($db,"SELECT comp_stage,count(*) as cs_total FROM complain where Serno > 0 and comp_for='".base64_decode($_GET['id'])."'
                                 and c_year='".date('Y')."' group by comp_stage");
while($row_cs = mysqli_fetch_array($select_cs)){
	
	
	$cs_name.='"'.$row_cs['comp_stage'].'",';
    $cs_total.='"'.$row_cs['cs_total'].'",';
	
	
}

$cs_name=substr($cs_name, 0, -1);
$cs_total=substr($cs_total, 0, -1);


$select_c_all = mysqli_query($db,"SELECT DISTINCT(cust_name) FROM complain where Serno > '0' and comp_for='".base64_decode($_GET['id'])."' and c_year='".date('Y')."' GROUP by cust_name");
$count_c_all  = mysqli_num_rows($select_c_all);

$select_n_c = mysqli_query($db,"SELECT * FROM complain where Serno > '0' and comp_for='".base64_decode($_GET['id'])."' and comp_sample='No' and c_year='".date('Y')."'");
$count_n_c  = mysqli_num_rows($select_n_c);


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Lab Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/media/image/favicon.png"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="vendors/bundle.css" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="vendors/datepicker/daterangepicker.css">

    <!-- Slick -->
    <link rel="stylesheet" href="vendors/slick/slick.css">
    <link rel="stylesheet" href="vendors/slick/slick-theme.css">

    <!-- Vmap -->
    <link rel="stylesheet" href="vendors/vmap/jqvmap.min.css">

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
<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li class="active" data-toggle="tooltip" title="Dashboard">
                <a href="#navigationDashboards" title="Dashboards">
                    <i class="icon ti-pie-chart"></i>
                    <span class="badge badge-warning">2</span>
                </a>
            </li>

          
        </ul>
        <ul>
           
            <li data-toggle="tooltip" title="Logout">
                <a href="login.html" class="go-to-page">
                    <i class="icon ti-power-off"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">
        <ul id="navigationDashboards" class="navigation-active">
            <li class="navigation-divider">DASHBOARD</li>
            <li>
                <a class="active" href="index.php">Overview</a>
            </li>
           
            <li class="navigation-divider">Other</li>
           <li>
                <a href="#">Reports</a>
                <ul>
                    <li><a href="datewise.php">Datewise </a></li>

                    
                </ul>
            </li>
          
            <li class="navigation-divider">Summary</li>
            <li>
                <a href="complaints.php?id=<?php echo $_GET['id'];?>" target="_blank">
                    <div class="d-flex align-items-center mb-2">
                        <div>
                            <div class="icon-block bg-warning text-white mr-3">
                                <i class="ti-bar-chart"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-uppercase font-size-11" style="font-size:9px !important;">Total Complaints</h6>
                            <h4 class="m-b-0"><?php echo $count_all;?></h4>
                        </div>
                    </div>
                </a>
            </li>
           
		   
		   <li>
                <a href="without-samples.php?id=<?php echo $_GET['id'];?>" target="_blank">
                    <div class="d-flex align-items-center mb-2">
                        <div>
                            <div class="icon-block bg-danger text-white mr-3">
                                <i class="ti-bar-chart"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-uppercase font-size-11" style="font-size:9px !important;">Without Sample</h6>
                            <h4 class="m-b-0"><?php echo $count_n_c;?></h4>
                        </div>
                    </div>
                </a>
            </li>
		   
            <li>
                <a href="#">
                    <div class="d-flex align-items-center">
                        <div>
                            <div class="icon-block bg-info text-white mr-3">
                                <i class="ti-user"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-uppercase font-size-11" style="font-size:9px !important;">Unique Customers</h6>
                            <h4 class="m-b-0"><?php echo $count_c_all;?></h4>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
        
		
	
	</div>
</div>
<!-- end::navigation -->

<!-- begin::header -->
<div class="header">

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
                    <li class="breadcrumb-item active" aria-current="page">Overview</li>
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
                <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="icon-block icon-block-sm bg-danger icon-block-floating mr-2">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                </div>
                                <span class="text-uppercase font-size-11">Total Complaints</span>
                                <h2 class="mb-0 ml-auto font-weight-bold text-danger"><?php echo $count_all;?></h2>
                            </div>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 71%"
                                     aria-valuenow="71" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-lg-6 col-sm-12">
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <div class="icon-block icon-block-sm bg-success icon-block-floating mr-2">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                </div>
                               <a href="lab-pending.php?id=<?php echo $_GET['id'];?>" target="_blank"> <span class="text-uppercase font-size-11">Lab - Pending Approvals</span></a>
                               <a href="lab-pending.php" target="_blank"> <h2 class="mb-0 ml-auto font-weight-bold text-success"><?php echo $count_qc;?></h2></a>
                            </div>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 39%"
                                     aria-valuenow="39"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <div class="icon-block icon-block-sm bg-info icon-block-floating mr-2">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                </div>
                                <a href="gm-pending.php?id=<?php echo $_GET['id'];?>" target="_blank"><span class="text-uppercase font-size-11">GM - Pending Approvals</span></a>
                                <a href="gm-pending.php" target="_blank"><h2 class="mb-0 ml-auto font-weight-bold text-info"><?php echo $count_gm;?></h2></a>
                            </div>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <div class="icon-block icon-block-sm bg-facebook icon-block-floating mr-2">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                </div>
                                <a href="so-pending.php?id=<?php echo $_GET['id'];?>" target="_blank"><span class="text-uppercase font-size-11">Sale Officer - Pending Approvals</span></a>
                                <a href="so-pending.php" target="_blank"><h2 class="mb-0 ml-auto font-weight-bold text-facebook"><?php echo $count_so;?></h2></a>
                            </div>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar bg-facebook" role="progressbar" style="width: 50%"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                    <div class="card border mb-0">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <div class="icon-block icon-block-sm bg-whatsapp icon-block-floating mr-2">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                </div>
                                <a href="completed.php?id=<?php echo $_GET['id'];?>" target="_blank"><span class="text-uppercase font-size-11">Completed</span></a>
                                <a href="completed.php" target="_blank"><h2 class="mb-0 ml-auto font-weight-bold text-whatsapp"><?php echo $count_cp;?></h2></a>
                            </div>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar bg-whatsapp" role="progressbar" style="width: 50%"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
               
			   
			
			</div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Yearly Overview - <?php echo date('Y');?></h6>
                   
                    <canvas id="chart_demo_1"></canvas>
                </div>
            </div>
             </div>
		    <div class="col-xl-6 col-md-12">
		        
		        
		        
            <div class="card">
                <div class="card-header">Complaints Stage Wise</div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-10 offset-1">
                            <canvas id="chart_demo_7"></canvas>
                        </div>
                    </div>
                
                </div>
            </div>
        
			</div>	
				
       
        <div class="col-xl-6 col-md-12">
            <!--<div class="card">
                <div class="card-body">
                    <h6 class="card-title">QC-Lab Wise - <?php //echo date('Y');?></h6>
                    <canvas id="chart_demo_9"></canvas>
                    <div class="row">
					
					    <?php 
						/*$select_qcw = mysqli_query($db,"SELECT * FROM departments where  di='".base64_decode($_GET['id'])."' and dtype='Dept'");
						while($row_qc     = mysqli_fetch_array($select_qcw)){
							$row_qc_2='';
							
							$select_qcw_2 = mysqli_query($db,"SELECT * FROM complain WHERE Serno > '0' 
							                             and comp_for='".$row_qc['di']."' and c_year='".date('Y')."'");
							$row_qc_2     = mysqli_num_rows($select_qcw_2);*/
							


						?>
					
                        <div class="col-md-3 mt-3">
                            <h5 class="font-size-23 text-warning font-weight-bold"><?php //echo $row_qc_2;?></h5>
                            <h6 class="text-uppercase font-size-11 mb-0"><?php //echo $row_qc['dname'];?></h6>
                        </div>
						
						<?php //} ?>
                    </div>
                </div>
            </div>-->
            
           
		
		</div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Your Most Recent Closed Complaints</h6>
                    
                    <div class="table-responsive">
                        <table class="table m-b-0">
                            <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Date</th>
                                <th>Complaint For</th>
                                <th>Customer</th>
                                <th>Process Type<br>Defect Type</th>
								<th>Closed Date</th>
								<th>Final Remarks</th>
                                <th>Days</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php 
					
							$select_recents = mysqli_query($db,"select * from complain where Serno > 0 and comp_for='".base64_decode($_GET['id'])."'
																 and c_year='".date('Y')."' and sRemarks!=''
																 order by Serno desc limit 0,20");
																 
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
									
                                    $timestamp1 = strtotime($pieces[0]);
									$timestamp2 = strtotime($row_recent['sDate']);
									
							?>
							
                            <tr>
                                <td><a href="detail.php?id=<?php echo base64_encode($row_recent['Serno']);?>" target="_blank"><?php echo $row_recent['Serno'];?></a></td>
                                <td><?php echo date("d-M-y", strtotime($row_recent['sub_date']));?></td>
								<td><?php echo $dname;?></td>
								<td><?php echo $row_recent['cust_name'];?></td>
                                <td><?php echo $process_type;?><br><?php echo $defect_type;?></td>
                                <td><?php echo date("d-M-y", strtotime($row_recent['sDate']));?></td>
                                <td><?php echo $row_recent['sRemarks'];?></td>
								<td><?php $duration = round(abs($timestamp2 - $timestamp1)/(60*60),2);
								if($duration==0){
								   $duration = 1;	
									
								}
								echo $duration;
								?></td>
                            </tr>
							<?php } ?>
                            </tbody>
                        </table>
                    </div>
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

<!-- Dashboard scripts 
<script src="assets/js/examples/dashboard.js"></script>-->


<script>

$(document).ready(function () {

    var colors = {
        primary: $('.colors .bg-primary').css('background-color'),
        primaryLight: $('.colors .bg-primary-bright').css('background-color'),
        secondary: $('.colors .bg-secondary').css('background-color'),
        secondaryLight: $('.colors .bg-secondary-bright').css('background-color'),
        info: $('.colors .bg-info').css('background-color'),
        infoLight: $('.colors .bg-info-bright').css('background-color'),
        success: $('.colors .bg-success').css('background-color'),
        successLight: $('.colors .bg-success-bright').css('background-color'),
        danger: $('.colors .bg-danger').css('background-color'),
        dangerLight: $('.colors .bg-danger-bright').css('background-color'),
        warning: $('.colors .bg-warning').css('background-color'),
        warningLight: $('.colors .bg-warning-bright').css('background-color'),
    };

    /**
     *  Slick slide example
     **/

    if ($('.slick-single-item').length) {
        $('.slick-single-item').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            prevArrow: '.slick-single-arrows a:eq(0)',
            nextArrow: '.slick-single-arrows a:eq(1)',
            responsive: [
                {
                    breakpoint: 1300,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 540,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }

    if ($('.reportrange').length > 0) {
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('.reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('.reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);
    }

    var chartColors = {
        primary: {
            base: '#3f51b5',
            light: '#c0c5e4'
        },
        danger: {
            base: '#f2125e',
            light: '#fcd0df'
        },
        success: {
            base: '#0acf97',
            light: '#cef5ea'
        },
        warning: {
            base: '#ff8300',
            light: '#ffe6cc'
        },
        info: {
            base: '#00bcd4',
            light: '#e1efff'
        },
        dark: '#37474f',
        facebook: '#3b5998',
        twitter: '#55acee',
        linkedin: '#0077b5',
        instagram: '#517fa4',
        whatsapp: '#25D366',
        dribbble: '#ea4c89',
        google: '#DB4437',
        borderColor: '#e8e8e8',
        fontColor: '#999'
    };

    if ($('body').hasClass('dark')) {
        chartColors.borderColor = 'rgba(255, 255, 255, .1)';
        chartColors.fontColor = 'rgba(255, 255, 255, .4)';
    }

    /// Chartssssss

    chart_demo_1();

    chart_demo_2();
    
	chart_qc_lmd();
	
	chart_qc_pcc();
	
	chart_qc_smd();
	
	chart_qc_smd_2();
	
    chart_demo_3();

    chart_demo_4();

    chart_demo_5();

    chart_demo_6();

    chart_demo_7();

    chart_demo_8();

    chart_demo_9();

    chart_demo_10();

    function chart_demo_1() {
        if ($('#chart_demo_1').length) {
            var element = document.getElementById("chart_demo_1");
            element.height = 146;
            new Chart(element, {
                type: 'bar',
                data: {
                    labels: [<?php echo $m;?>],
                    datasets: [
                        {
                            label: "Total Complaints",
                            backgroundColor: colors.primary,
                            data: [<?php echo $m_comp;?>]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                color: chartColors.borderColor
                            }
                        }],
                    }
                }
            })
        }
    }

	
	    function chart_qc_smd() {
        if ($('#chart_qc_smd').length) {
            var element = document.getElementById("chart_qc_smd");
            element.height = 146;
            new Chart(element, {
                type: 'bar',
                data: {
                    labels: [<?php echo $m_smd;?>],
                    datasets: [
                        {
                            label: "Total Complaints",
                            backgroundColor: colors.primary,
                            data: [<?php echo $m_comp_smd;?>]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                color: chartColors.borderColor
                            }
                        }],
                    }
                }
            })
        }
    }


	    function chart_qc_lmd() {
        if ($('#chart_qc_lmd').length) {
            var element = document.getElementById("chart_qc_lmd");
            element.height = 146;
            new Chart(element, {
                type: 'bar',
                data: {
                    labels: [<?php echo $m_lmd;?>],
                    datasets: [
                        {
                            label: "Total Complaints",
                            backgroundColor: colors.primary,
                            data: [<?php echo $m_comp_lmd;?>]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                color: chartColors.borderColor
                            }
                        }],
                    }
                }
            })
        }
    }


	    function chart_qc_pcc() {
        if ($('#chart_qc_pcc').length) {
            var element = document.getElementById("chart_qc_pcc");
            element.height = 146;
            new Chart(element, {
                type: 'bar',
                data: {
                    labels: [<?php echo $m_pcc;?>],
                    datasets: [
                        {
                            label: "Total Complaints",
                            backgroundColor: colors.primary,
                            data: [<?php echo $m_comp_pcc;?>]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                color: chartColors.borderColor
                            }
                        }],
                    }
                }
            })
        }
    }

		    function chart_qc_smd_2() {
        if ($('#chart_qc_smd_2').length) {
            var element = document.getElementById("chart_qc_smd_2");
            element.height = 146;
            new Chart(element, {
                type: 'bar',
                data: {
                    labels: [<?php echo $m_smd_2;?>],
                    datasets: [
                        {
                            label: "Total Complaints",
                            backgroundColor: colors.primary,
                            data: [<?php echo $m_comp_smd_2;?>]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                color: chartColors.borderColor
                            }
                        }],
                    }
                }
            })
        }
    }
	
	
    function chart_demo_2() {
        if ($('#chart_demo_2').length) {
            var ctx = document.getElementById('chart_demo_2').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jun 2016", "Jul 2016", "Aug 2016", "Sep 2016", "Oct 2016", "Nov 2016", "Dec 2016", "Jan 2017", "Feb 2017", "Mar 2017", "Apr 2017", "May 2017"],
                    datasets: [{
                        label: "Rainfall",
                        backgroundColor: chartColors.primary.light,
                        borderColor: chartColors.primary.base,
                        data: [26.4, 39.8, 66.8, 66.4, 40.6, 55.2, 77.4, 69.8, 57.8, 76, 110.8, 142.6],
                    }]
                },
                options: {
                    legend: {
                        display: false,
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    title: {
                        display: true,
                        text: 'Precipitation in Toronto',
                        fontColor: chartColors.fontColor,
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Precipitation in mm',
                                fontColor: chartColors.fontColor,
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }

    function chart_demo_3() {
        if ($('#chart_demo_3').length) {
            var element = document.getElementById("chart_demo_3"),
                ctx = element.getContext("2d");


            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: 'Success',
                        borderColor: colors.success,
                        data: [-10, 30, -20, 0, 25, 44, 30, 15, 20, 10, 5, -5],
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        borderDash: [2, 2],
                        fill: false
                    }, {
                        label: 'Return',
                        fill: false,
                        borderDash: [2, 2],
                        borderColor: colors.danger,
                        data: [20, 0, 22, 39, -10, 19, -7, 0, 15, 0, -10, 5],
                        pointRadius: 5,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false,
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    title: {
                        display: false,
                        fontColor: chartColors.fontColor
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: false,
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                display: false
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                min: -50,
                                max: 50
                            }
                        }],
                    }
                }
            });

        }
    }

    function chart_demo_4() {
        if ($('#chart_demo_4').length) {
            var ctx = document.getElementById("chart_demo_4").getContext("2d");
            var densityData = {
                backgroundColor: chartColors.primary.light,
                data: [10, 20, 40, 60, 80, 40, 60, 80, 40, 80, 20, 59]
            };
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [densityData]
                },
                options: {
                    scaleFontColor: "#FFFFFF",
                    legend: {
                        display: false,
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                min: 0,
                                max: 100,
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }

    function chart_demo_5() {
        if ($('#chart_demo_5').length) {
            var ctx = document.getElementById('chart_demo_5').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May'],
                    datasets: [
                        {
                            label: 'Dataset 1',
                            backgroundColor: [
                                chartColors.info.base,
                                chartColors.success.base,
                                chartColors.danger.base,
                                chartColors.dark,
                                chartColors.warning.base,
                            ],
                            yAxisID: 'y-axis-1',
                            data: [33, 56, -40, 25, 45]
                        },
                        {
                            label: 'Dataset 2',
                            backgroundColor: chartColors.info.base,
                            yAxisID: 'y-axis-2',
                            data: [23, 86, -40, 5, 45]
                        }
                    ]
                },
                options: {
                    legend: {
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Chart.js Bar Chart - Multi Axis',
                        fontColor: chartColors.fontColor
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            }
                        }],
                        yAxes: [
                            {
                                type: 'linear',
                                display: true,
                                position: 'left',
                                id: 'y-axis-1',
                            },
                            {
                                gridLines: {
                                    color: chartColors.borderColor
                                },
                                ticks: {
                                    fontColor: chartColors.fontColor
                                }
                            },
                            {
                                type: 'linear',
                                display: true,
                                position: 'right',
                                id: 'y-axis-2',
                                gridLines: {
                                    drawOnChartArea: false
                                },
                                ticks: {
                                    fontColor: chartColors.fontColor
                                }
                            }
                        ],
                    }
                }
            });
        }
    }

    function chart_demo_6() {
        if ($('#chart_demo_6').length) {
            var ctx = document.getElementById("chart_demo_6").getContext("2d");
            var speedData = {
                labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
                datasets: [{
                    label: "Car Speed (mph)",
                    borderColor: chartColors.primary.base,
                    backgroundColor: 'rgba(0, 0, 0, 0',
                    data: [0, 59, 75, 20, 20, 55, 40]
                }]
            };
            var chartOptions = {
                legend: {
                    scaleFontColor: "#FFFFFF",
                    position: 'top',
                    labels: {
                        fontColor: chartColors.fontColor
                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            color: chartColors.borderColor
                        },
                        ticks: {
                            fontColor: chartColors.fontColor
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            color: chartColors.borderColor
                        },
                        ticks: {
                            fontColor: chartColors.fontColor
                        }
                    }]
                }
            };
            new Chart(ctx, {
                type: 'line',
                data: speedData,
                options: chartOptions
            });
        }
    }

    function chart_demo_7() {
        if ($('#chart_demo_7').length) {
            var ctx = document.getElementById("chart_demo_7").getContext("2d");
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [<?php echo $cs_total;?>],
                        backgroundColor: [
                            colors.success,
                            colors.danger,
                            colors.warning
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        <?php echo $cs_name;?>
                    ]
                },
                options: {
                    elements: {
                        arc: {
                            borderWidth: 0
                        }
                    },
                    responsive: true,
                    legend: {
                        display: true
                    },
                    title: {
                        display: true
                    },
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                }
            });
        }
    }

    function chart_demo_8() {
        if ($('#chart_demo_8').length) {
            new Chart(document.getElementById("chart_demo_8"), {
                type: 'radar',
                data: {
                    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                    datasets: [
                        {
                            label: "1950",
                            fill: true,
                            backgroundColor: "rgba(179,181,198,0.2)",
                            borderColor: "rgba(179,181,198,1)",
                            pointBorderColor: "#fff",
                            pointBackgroundColor: "rgba(179,181,198,1)",
                            data: [-8.77, -55.61, 21.69, 6.62, 6.82]
                        }, {
                            label: "2050",
                            fill: true,
                            backgroundColor: "rgba(255,99,132,0.2)",
                            borderColor: "rgba(255,99,132,1)",
                            pointBorderColor: "#fff",
                            pointBackgroundColor: "rgba(255,99,132,1)",
                            data: [-25.48, 54.16, 7.61, 8.06, 4.45]
                        }
                    ]
                },
                options: {
                    legend: {
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    scale: {
                        gridLines: {
                            color: chartColors.borderColor
                        }
                    },
                    title: {
                        display: true,
                        text: 'Distribution in % of world population',
                        fontColor: chartColors.fontColor
                    }
                }
            });
        }
    }

    function chart_demo_9() {
        if ($('#chart_demo_9').length) {
            new Chart(document.getElementById("chart_demo_9"), {
                type: 'horizontalBar',
                data: {
                    labels: [<?php echo $qc_name;?>],
                    datasets: [
                        {
                            label: "Complaints",
                            backgroundColor: colors.primary,
                            data: [<?php echo $qc_total;?>]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                display: false
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor,
                                display: false
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            },
                            barPercentage: 0.5
                        }]
                    }
                }
            });
        }
    }

    function chart_demo_10() {
        if ($('#chart_demo_10').length) {
            var element = document.getElementById("chart_demo_10");
            new Chart(element, {
                type: 'bar',
                data: {
                    labels: ["1900", "1950", "1999", "2050"],
                    datasets: [
                        {
                            label: "Europe",
                            type: "line",
                            borderColor: "#8e5ea2",
                            data: [408, 547, 675, 734],
                            fill: false
                        },
                        {
                            label: "Africa",
                            type: "line",
                            borderColor: "#3e95cd",
                            data: [133, 221, 783, 2478],
                            fill: false
                        },
                        {
                            label: "Europe",
                            type: "bar",
                            backgroundColor: chartColors.primary.base,
                            data: [408, 547, 675, 734],
                        },
                        {
                            label: "Africa",
                            type: "bar",
                            backgroundColor: chartColors.primary.light,
                            data: [133, 221, 783, 2478]
                        }
                    ]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Population growth (millions): Europe & Africa',
                        fontColor: chartColors.fontColor
                    },
                    legend: {
                        display: true,
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            }
                        }]
                    }
                }
            });
        }
    }

    if ($('#circle-1').length) {
        $('#circle-1').circleProgress({
            startAngle: 1.55,
            value: 0.65,
            size: 110,
            thickness: 10,
            fill: {
                color: colors.primary
            }
        });
    }

    if ($('#sales-circle-graphic').length) {
        $('#sales-circle-graphic').circleProgress({
            startAngle: 1.55,
            value: 0.65,
            size: 180,
            thickness: 30,
            fill: {
                color: colors.primary
            }
        });
    }

    if ($('#circle-2').length) {
        $('#circle-2').circleProgress({
            startAngle: 1.55,
            value: 0.35,
            size: 110,
            thickness: 10,
            fill: {
                color: colors.success
            }
        });
    }

    ////////////////////////////////////////////

    if ($(".dashboard-pie-1").length) {
        $(".dashboard-pie-1").peity("pie", {
            fill: [colors.primaryLight, colors.primary],
            radius: 30
        });
    }

    if ($(".dashboard-pie-2").length) {
        $(".dashboard-pie-2").peity("pie", {
            fill: [colors.successLight, colors.success],
            radius: 30
        });
    }

    if ($(".dashboard-pie-3").length) {
        $(".dashboard-pie-3").peity("pie", {
            fill: [colors.warningLight, colors.warning],
            radius: 30
        });
    }

    if ($(".dashboard-pie-4").length) {
        $(".dashboard-pie-4").peity("pie", {
            fill: [colors.infoLight, colors.info],
            radius: 30
        });
    }

    ////////////////////////////////////////////

    function bar_chart() {
        if ($('#chart-ticket-status').length > 0) {
            var dataSource = [
                {country: "USA", hydro: 59.8, oil: 937.6, gas: 582, coal: 564.3, nuclear: 187.9},
                {country: "China", hydro: 74.2, oil: 308.6, gas: 35.1, coal: 956.9, nuclear: 11.3},
                {country: "Russia", hydro: 40, oil: 128.5, gas: 361.8, coal: 105, nuclear: 32.4},
                {country: "Japan", hydro: 22.6, oil: 241.5, gas: 64.9, coal: 120.8, nuclear: 64.8},
                {country: "India", hydro: 19, oil: 119.3, gas: 28.9, coal: 204.8, nuclear: 3.8},
                {country: "Germany", hydro: 6.1, oil: 123.6, gas: 77.3, coal: 85.7, nuclear: 37.8}
            ];

            // Return with commas in between
            var numberWithCommas = function (x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            };

            var dataPack1 = [40, 47, 44, 38, 27, 40, 47, 44, 38, 27, 40, 27];
            var dataPack2 = [10, 12, 7, 5, 4, 10, 12, 7, 5, 4, 10, 12];
            var dataPack3 = [17, 11, 22, 18, 12, 17, 11, 22, 18, 12, 17, 11];
            var dates = ["Jan", "Jan", "Jan", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];

            var bar_ctx = document.getElementById('chart-ticket-status');

            bar_ctx.height = 115;

            new Chart(bar_ctx, {
                    type: 'bar',
                    data: {
                        labels: dates,
                        datasets: [
                            {
                                label: 'Pending Tickets',
                                data: dataPack1,
                                backgroundColor: colors.primaryLight,
                                hoverBorderWidth: 0
                            },
                            {
                                label: 'Solved Tickets',
                                data: dataPack2,
                                backgroundColor: colors.successLight,
                                hoverBorderWidth: 0
                            },
                            {
                                label: 'Open Tickets',
                                data: dataPack3,
                                backgroundColor: colors.dangerLight,
                                hoverBorderWidth: 0
                            },
                        ]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        animation: {
                            duration: 10,
                        },
                        tooltips: {
                            mode: 'label',
                            callbacks: {
                                label: function (tooltipItem, data) {
                                    return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
                                }
                            }
                        },
                        scales: {
                            xAxes: [{
                                stacked: true,
                                gridLines: {display: false},
                                ticks: {
                                    fontSize: 11,
                                    fontColor: chartColors.fontColor
                                }
                            }],
                            yAxes: [{
                                stacked: true,
                                ticks: {
                                    callback: function (value) {
                                        return numberWithCommas(value);
                                    },
                                    fontSize: 11,
                                    fontColor: chartColors.fontColor
                                },
                            }],
                        }
                    },
                    plugins: [{
                        beforeInit: function (chart) {
                            chart.data.labels.forEach(function (value, index, array) {
                                var a = [];
                                a.push(value.slice(0, 5));
                                var i = 1;
                                while (value.length > (i * 5)) {
                                    a.push(value.slice(i * 5, (i + 1) * 5));
                                    i++;
                                }
                                array[index] = a;
                            })
                        }
                    }]
                }
            );
        }
    }

    bar_chart();

    function users_chart() {
        if ($('#users-chart').length > 0) {
            var element = document.getElementById("users-chart");

            element.height = 110;

            new Chart(element, {
                type: 'bar',
                data: {
                    labels: ["Jan", "Fen", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Europe",
                        type: "bar",
                        backgroundColor: colors.primary,
                        data: [408, 547, 675, 734, 122, 323, 94, 312, 282, 500, 800, 1050],
                    }, {
                        label: "Africa",
                        type: "bar",
                        backgroundColor: colors.info,
                        data: [133, 221, 783, 1478, 821, 321, 400, 200, 820, 300, 511, 100]
                    }]
                },
                options: {
                    title: {
                        display: false
                    },
                    legend: {display: false},
                    scales: {
                        yAxes: [{
                            fontSize: 11,
                            fontColor: chartColors.fontColor
                        }],
                        xAxes: [{
                            gridLines: {display: false},
                            ticks: {
                                display: false
                            }
                        }]
                    }
                }
            });
        }
    }

    users_chart();

    function device_session_chart() {
        if ($('#device_session_chart').length > 0) {
            var element = document.getElementById("device_session_chart");
            element.height = 155;
            new Chart(element, {
                type: 'line',
                data: {
                    labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
                    datasets: [{
                        data: [2186, 2000, 1900, 2300, 2150, 2100, 2350, 2500, 2400, 2390],
                        label: "Mobile",
                        backgroundColor: colors.primary,
                        borderColor: colors.primary,
                        fill: false
                    }, {
                        data: [1282, 1000, 1290, 1302, 1400, 1250, 1350, 1402, 1700, 1967],
                        label: "Desktop",
                        backgroundColor: colors.success,
                        borderColor: colors.success,
                        fill: false
                    }, {
                        data: [500, 700, 900, 800, 600, 850, 900, 550, 750, 690],
                        label: "Other",
                        backgroundColor: colors.warning,
                        borderColor: colors.warning,
                        fill: false
                    }]
                },
                options: {
                    title: {
                        display: false
                    },
                    legend: {display: false},
                    scales: {
                        yAxes: [{
                            gridLines: {display: false},
                            ticks: {
                                display: false
                            }
                        }],
                        xAxes: [{
                            gridLines: {display: false},
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            }
                        }],
                    }
                }
            });
        }
    }

    device_session_chart();

});

</script>


<div class="colors"> <!-- To use theme colors with Javascript -->
    <div class="bg-primary"></div>
    <div class="bg-primary-bright"></div>
    <div class="bg-secondary"></div>
    <div class="bg-secondary-bright"></div>
    <div class="bg-info"></div>
    <div class="bg-info-bright"></div>
    <div class="bg-success"></div>
    <div class="bg-success-bright"></div>
    <div class="bg-danger"></div>
    <div class="bg-danger-bright"></div>
    <div class="bg-warning"></div>
    <div class="bg-warning-bright"></div>
</div>

<!-- App scripts -->
<script src="assets/js/app.min.js"></script>
</body>

</html>