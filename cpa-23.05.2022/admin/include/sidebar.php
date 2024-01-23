<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <?php if($_SESSION['FLD_BTYPE']=='Admin' ){?>
			<li data-toggle="tooltip" title="Administration">
                <a href="#navigationDH">
                    <i class="icon ti-pie-chart"></i>
                </a>
            </li>
			
            <li class="active" data-toggle="tooltip" title="CPA Registeration">
                <a href="#navigationCR">
                    <i class="icon ti-agenda"></i>
                </a>
            </li>
			<li data-toggle="tooltip" title="Compliance">
                <a href="#navigationGM" title="Compliance Display">
                    <i class="icon ti-book"></i>
                </a>
            </li>
			<?php }else{?>
            <li data-toggle="tooltip" title="Concern Dept Display">
                <a href="#navigationCDD" title="Concern Dept Display">
                    <i class="icon ti-user"></i>
                </a>
            </li>
			<?php }?>
			<li data-toggle="tooltip" title="Closed">
                <a href="#navigationCPT" title="Closed">
                    <i class="icon ti-list"></i>
                </a>
            </li>
        </ul>
		
		<ul>
          
            <li data-toggle="tooltip" title="Logout">
                <a href="../logout.php" class="go-to-page">
                    <i class="icon ti-power-off"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">
        <?php if($_SESSION['FLD_BTYPE']=='Admin'){?>
		
		 
		<ul id="navigationDH">
		<?php if($_SESSION['FLD_EMAIL']=='a.gohar@binrasheed.com'){?>
            <li class="navigation-divider">Administration</li>
             <li><a href="../departments.php">Departments </a></li>
             <li><a href="../cpa-types.php">CPA Types </a></li>
             <li><a href="../finding-issues.php">Finding Issues </a></li>
             <li><a href="../finding-types.php">Finding Types </a></li>
             <li><a href="../users.php">Users </a></li>
             
              <li class="navigation-divider">Other</li>
			  <?php } ?>
           <li>
                <a href="#">Reports</a>
                <ul>
                    <li><a href="../admin/datewise.php">Datewise </a></li>

                    
                </ul>
            </li>
             
        </ul>
		
		<ul id="navigationCR" class="navigation-active">
            <li class="navigation-divider">CPA Registeration</li>
            <li><a href="../new.php">New CPA </a></li>
        </ul>
		<ul id="navigationGM">
            <li class="navigation-divider">Compliance</li>
            <li>
                <a href="../qa-pending.php">Pending</a>
				<a href="../qa-followup.php">Followup</a>
            </li>
        </ul>
		<?php }else{?>
        <ul id="navigationCDD">
            <li class="navigation-divider">Concern Dept Display</li>
            <li><a href="../listing.php">Listing</a>
            </li>
        </ul>
		<?php } ?>
		
		  <ul id="navigationCPT">
            <li class="navigation-divider">Closed</li>
            <li><a href="../completed.php">Closed </a></li>
        </ul>
		 
    </div>
</div>


