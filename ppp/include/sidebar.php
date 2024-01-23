<div class="vd_navbar vd_nav-width vd_navbar-tabs-menu vd_navbar-left  ">

	<div class="navbar-menu clearfix">
	
		<div class="vd_panel-menu hidden-xs">
            <span data-original-title="Expand All" data-toggle="tooltip" data-placement="bottom" data-action="expand-all" class="menu" data-intro="<strong>Expand Button</strong><br/>To expand all menu on left navigation menu." data-step=4 >
                <i class="fa fa-sort-amount-asc"></i>
            </span>                   
        </div>
		
		<br>
		<br>
        

        <div class="vd_menu">
        	 <ul>
              
               
                         
				
				<li>
                    <a href="main.php">
                        <span class="menu-icon"><i class="fa fa-circle"></i></span> 
                        <span class="menu-text">Welcome</span>
                    </a> 
                </li>
				<?php if($_SESSION['UserType']=='admin'){
					
					$count_emp=mysqli_query($db,'select * from tbluserinfodetail where ESid="1"');
                    $num_emp=mysqli_num_rows($count_emp);
                    
                    $count_ppp=mysqli_query($db,'select * from tblpppstatus where YearEnd="1"');
                    $num_ppp=mysqli_num_rows($count_ppp);
                    
                    
					?>
				 <li>			
				<a href="javascript:void(0);" data-action="click-trigger">
					<span class="menu-icon"><i class="fa fa-circle"></i></span> 
					<span class="menu-text">Administration</span>  
					<span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
				</a>
					
			 <div class="child-menu"  data-action="click-target">
			 <ul>
                <li>
                    <a href="javascript:void(0);" data-action="click-trigger">
                        <span class="menu-icon"><i class="fa fa-users"></i></span> 
                        <span class="menu-text">Employee Management</span>  
                        <span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
                    </a>
					
                    <div class="child-menu"  data-action="click-target">
						<ul>
							<!--<li>
								<a href="javascript:void(0);" data-action="click-trigger">
									<span class="menu-icon"><i class="fa fa-user"></i></span> 
									<span class="menu-text">Profile</span>  
									<span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
								</a>
								
								<div class="child-menu"  data-action="click-target">
									<ul>
										 <li><a href="cities.php">Cities</a></li>
										 
										 <li><a href="departments.php">Departments</a></li>
										 <li><a href="designations.php">Designations</a></li>
									</ul>
								</div>
							</li>-->
							
							<li>
								<a href="javascript:void(0);" data-action="click-trigger">
									<span class="menu-icon"><i class="icon-ellipsis"></i></span> 
									<span class="menu-text">Other</span>  
									<span class="menu-badge"><span class="badge vd_bg-black-30"><i class="fa fa-angle-down"></i></span></span>
								</a>
								
								<div class="child-menu"  data-action="click-target">
									<ul>
										 <li><a href="users.php">Users</a></li>			
									</ul>
								</div>
							</li>
						</ul>
                    </div>
					</li>
				</ul>
				</div>
                </li>  
				 <li>
                    <a href="employees-list.php">
                        <span class="menu-icon"><i class="fa fa-circle"></i></span> 
                        <span class="menu-text">Employees</span>
						<span class="menu-badge"><span class="badge vd_bg-red"><?php echo $num_emp;?></span></span>
                    </a> 
                </li>
				<li>
                    <a href="evaluated-employees-list.php">
                        <span class="menu-icon"><i class="fa fa-circle"></i></span> 
                        <span class="menu-text">Evaluated Employees</span>
						<span class="menu-badge"><span class="badge vd_bg-red"><?php echo $num_ppp;?></span></span>
                    </a> 
                </li>
				
				<?php }else{ ?>
			  <li>
                    <a href="my-profile.php">
                        <span class="menu-icon"><i class="fa fa-circle"></i></span> 
                        <span class="menu-text">My Profile</span>
                    </a> 
                </li>
                <?php if($_SESSION['KPIFlag']=='N'){
                      $menu_1  = 'Performance Planning';
                      $menu_2  = 'Mid-Year Review';
                      $menu_3  = 'Year-End Review';
                }else{
                
                      $menu_1  = 'My Performance Planning';
                      $menu_2  = 'My Mid-Year Review';
                      $menu_3  = 'My Year-End Review';
                }?>
                
                
                 <li>
                    <a href="phase-1.php">
                        <span class="menu-icon"><i class="fa fa-circle"></i></span> 
                        <span class="menu-text"><?php echo $menu_1;?></span>
                    </a> 
                </li>
				
				
				<li>
                    <a href="phase-2.php">
                        <span class="menu-icon"><i class="fa fa-circle"></i></span> 
                        <span class="menu-text"><?php echo $menu_2;?></span>
                    </a> 
                </li>
				
				<li>
                    <a href="phase-3.php">
                        <span class="menu-icon"><i class="fa fa-circle"></i></span> 
                        <span class="menu-text"><?php echo $menu_3;?></span>
                    </a> 
                </li>
                <?php 
                
					$count_emp=mysqli_query($db,'select * from tbluserinfodetail where ESid="1" and Incharge_Code="'.$_SESSION['UserName'].'"');
                    $num_emp=mysqli_num_rows($count_emp);
                    
                    $count_ppp=mysqli_query($db,'select * from tblpppstatus where YearEnd="1"');
                    $num_ppp=mysqli_num_rows($count_ppp);
                ?>
                <?php if($_SESSION['IsIncharge']==1){?>
                <li>
                    <a href="evaluated-employees-list.php">
                        <span class="menu-icon"><i class="fa fa-circle"></i></span> 
                        <span class="menu-text">Evaluated Employees</span>
						<span class="menu-badge"><span class="badge vd_bg-red"><?php echo $num_ppp;?></span></span>
                    </a> 
                </li>
                	<?php } ?>
				<?php } ?>
				<li>
                    <a href="ppp-guide.pptx">
                        <span class="menu-icon"><i class="fa fa-circle"></i></span> 
                        <span class="menu-text">PPP User Guide</span>
                    </a> 
                </li>
				
				<!--<li>
                    <a href="main.php">
                        <span class="menu-icon"><i class="fa fa-circle"></i></span> 
                        <span class="menu-text">PPP FAQ's</span>
                    </a> 
                </li>-->
             </ul>
        </div>
		
		
		
        
    </div>
    <div class="navbar-spacing clearfix"></div>
    <div class="vd_menu vd_navbar-bottom-widget">
        <ul>
            <li>
                <a href="logout.php">
                    <span class="menu-icon"><i class="fa fa-sign-out"></i></span>          
                    <span class="menu-text">Logout</span>             
                </a>
            </li>
        </ul>
    </div>     
</div>