
<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li class="active" data-toggle="tooltip" title="" data-original-title="Dashboard">
                <a href="#navigationDashboards" title="Dashboards">
                    <i class="icon ti-pie-chart"></i>
                    <span class="badge badge-warning">2</span>
                </a>
            </li>
            <li  data-toggle="tooltip" title="Product Development">
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
                <a class="active" href="dashboard.php">Overview</a>
            </li>
           
            <li class="navigation-divider">Other</li>
           <li>
                <a href="#">Reports</a>
                <ul>
                    <li><a href="">Datewise </a></li>

                    
                </ul>
            </li>
          
            <li class="navigation-divider">Summary</li>
            <li>
                <a href="" target="_blank">
                    <div class="d-flex align-items-center mb-2">
                        <div>
                            <div class="icon-block bg-warning text-white mr-3">
                                <i class="ti-bar-chart"></i>
                            </div>
                        </div>
                        <div>
                            <h6 class="text-uppercase font-size-11" style="font-size:9px !important;">Total Developments</h6>
                            <h4 class="m-b-0">0</h4>
                        </div>
                    </div>
                </a>
            </li>
        
        </ul>
		
		<ul id="navigationCR" >
            <li class="navigation-divider">Product Development</li>
            
			<?php if($_SESSION['user_type']=='User'){?>
			<li><a href="pd-new.php">New Development</a></li>
			<li><a href="pd-listing.php">Development Listing </a></li>
			<li><a href="pd-feedback-pending-listing.php">Feedback Pending Listing </a></li>
			<li><a href="pd-completed.php">Completed Developments </a></li>
			<?php } ?>
            <?php if($_SESSION['user_type']=='Lab'){?>
			<li><a href="pd-lab-listing.php">Development Listing </a></li>
			<li><a href="pd-lab-dispatch-listing.php">Dispatched Samples  </a></li>
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

