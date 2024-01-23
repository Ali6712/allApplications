<?php 
$select_call = mysqli_query($db,"select * from complain where Serno > '0' and c_year='".date('Y')."'");
$count_call  = mysqli_num_rows($select_call);

$select_c_all = mysqli_query($db,"SELECT DISTINCT(cust_name) FROM complain where Serno > '0' and c_year='".date('Y')."' GROUP by cust_name");
$count_c_all  = mysqli_num_rows($select_c_all);

$select_n_c = mysqli_query($db,"SELECT * FROM complain where Serno > '0' and comp_sample='No' and c_year='".date('Y')."'");
$count_n_c  = mysqli_num_rows($select_n_c);

?>
<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li class="active" data-toggle="tooltip" title="" data-original-title="Dashboard">
                <a href="#navigationDashboards" title="Dashboards">
                    <i class="icon ti-pie-chart"></i>
                    <span class="badge badge-warning">2</span>
                </a>
            </li>
            <li  data-toggle="tooltip" title="Setup Screens">
                <a href="#navigationCR">
                    <i class="icon ti-agenda"></i>
                </a>
            </li>
			
			  
            <!--<li data-toggle="tooltip" title="Concern Dept Display">
                <a href="#navigationCDD" title="Concern Dept Display">
                    <i class="icon ti-user"></i>
                </a>
            </li>
			<li data-toggle="tooltip" title="GM">
                <a href="#navigationGM" title="GM Display">
                    <i class="icon ti-book"></i>
                </a>
            </li>
			
			<li data-toggle="tooltip" title="Completed">
                <a href="#navigationCPT" title="Completed">
                    <i class="icon ti-list"></i>
                </a>
            </li>-->
        </ul>
		<ul>
           
            <li data-toggle="tooltip" title="Logout">
                <a href="logout.php" class="go-to-page">
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
                <a href="complaints.php" target="_blank">
                    <div class="d-flex align-items-center mb-2">
                        <div>
                            <div class="icon-block bg-warning text-white mr-3">
                                <i class="ti-bar-chart"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-uppercase font-size-11" style="font-size:9px !important;">Total Complaints</h6>
                            <h4 class="m-b-0"><?php echo $count_call;?></h4>
                        </div>
                    </div>
                </a>
            </li>
           
		   
		   <li>
                <a href="without-samples.php" target="_blank">
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
		
		<ul id="navigationCR" >
            <li class="navigation-divider">Customer Complaints</li>
            
			<?php if(isset($_SESSION['user_id'])){?>
			<li><a href="departments.php">Departments</a></li>
			<li><a href="complaint-stage.php">Complaint Stage  </a></li>
			<li><a href="product-grade.php">Product Grade </a></li>
			<li><a href="process-type.php">Process Types </a></li>
			<li><a href="defect-types.php">Defect Types </a></li>
			<li><a href="production-line.php">Production line </a></li>
			<?php } ?>
            
        </ul>
		<!--<ul id="navigationGM">
            <li class="navigation-divider">GM</li>
            
            <li>
                <a href="gm-pending.php">Pending</a>
            </li>
		
          
        </ul>
		  <ul id="navigationCPT">
            <li class="navigation-divider">Completed</li>
            <li><a href="completed.php">Completed </a></li>
        </ul>-->

    </div>
</div>

