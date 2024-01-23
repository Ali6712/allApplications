<!-- Header Start -->
  <header class="header-1" id="header">
      <div class="vd_top-menu-wrapper">
        <div class="container ">
          <div class="vd_top-nav vd_nav-width  ">
          <div class="vd_panel-header">
          	<div class="logo">
            	<a href="main.php"><img alt="logo" src="img/logo2.png" height="60"  style="margin-top:-16px; margin-left:10px;"></a>
            </div>
            <!-- logo -->
            <div class="vd_panel-menu  hidden-sm hidden-xs" data-intro="<strong>Minimize Left Navigation</strong><br/>Toggle navigation size to medium or small size. You can set both button or one button only. See full option at documentation." data-step=1>
            	<span class="nav-medium-button menu" data-toggle="tooltip" data-placement="bottom" data-original-title="Medium Nav Toggle" data-action="nav-left-medium">
	                    <i class="fa fa-bars"></i>
                    </span>
                                		                    
                	<span class="nav-small-button menu" data-toggle="tooltip" data-placement="bottom" data-original-title="Small Nav Toggle" data-action="nav-left-small">
	                    <i class="fa fa-ellipsis-v"></i>
                    </span> 
            </div>
			
            <div class="vd_panel-menu left-pos visible-sm visible-xs">
                                 
                        <span class="menu" data-action="toggle-navbar-left">
                            <i class="fa fa-ellipsis-v"></i>
                        </span>  
                            
                              
            </div>
			
            <div class="vd_panel-menu visible-sm visible-xs">
				<span class="menu visible-xs" data-action="submenu">
					<i class="fa fa-bars"></i>
				</span>        
                          
				<span class="menu visible-sm visible-xs" data-action="toggle-navbar-right">
					<i class="fa fa-comments"></i>
				</span>                   
                   	 
            </div>                                     
            <!-- vd_panel-menu -->
          </div>
          <!-- vd_panel-header -->
            
          </div>    
          <div class="vd_container">
          	<div class="row">
            	<div class="col-sm-5 col-xs-12">
                </div>
                <div class="col-sm-7 col-xs-12">
              		<div class="vd_mega-menu-wrapper">
                    	<div class="vd_mega-menu pull-right">
            				<ul class="mega-ul">
							
							<?php   $select=mysqli_query($db,"Select * from tblusers where UserName='".$_SESSION['UserName']."' and (UserType='incharge')");
									//$select=mysqli_query($db,"Select * from tbluserinfodetail where Incharge_Code='".$_SESSION['UserName']."' or Incharge_Code='".$_SESSION['UserName']."'");
									$num=mysqli_num_rows($select);
									$type=mysqli_fetch_array($select);
									
									if($num!=0){
										
									if($_SESSION['UserType']=="user"){
										?>
											
									<li class="one-icon mega-li"> 
									  <a class="mega-link" href="shift-to-incharge.php" title="Shift To Incharge Panel">
										<span class="mega-icon"><i class="fa fa-users"></i></span>
									  </a>
									</li>  
									
									<?php }elseif($_SESSION['UserType']=="incharge"){?>
											
									<li class="one-icon mega-li"> 
									  <a class="mega-link" href="shift-to-incharge.php" title="Shift To User Panel">
										<span class="mega-icon"><i class="fa fa-user"></i></span>
									  </a>
									</li>  
									
								<?php 		
										}
									} ?>
							
<?php if($_SESSION['UserType']=="user"){ ?>
      
		
		<?php 
			     
			     $notify=mysqli_query($db,"SELECT * FROM tblnotifications where Userid='".$_SESSION['UserName']."' and Read_Flag='0' order by Nid desc");
				 $num_iemp=mysqli_num_rows($notify);
					
					
				?>
		
		
	<li id="top-menu-3"  class="one-icon mega-li"> 
      <a href="javascript:" class="mega-link" data-action="click-trigger" title="Notifications">
    	<span class="mega-icon"><i class="fa fa-globe"></i></span> 
		<span class="badge vd_bg-red"><?php echo $num_iemp; ?></span> <!-- Number of Notification-->     
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">  
           <div class="title"> Notifications </div>   
		   <div class="content-list">	
           	   <div  data-rel="scroll" style="overflow-y:scroll;">	
               <ul  class="list-wrapper pd-lr-10">
			   <?php 
			   
			 
			           	$notify=mysqli_query($db,"SELECT * FROM tblnotifications where Userid='".$_SESSION['UserName']."' and Read_Flag='0' order by Nid desc");
			     
			   
				
						while($row_notify=mysqli_fetch_array($notify)){
					
					
				?>
					<li> 
						<a href="#">
                    		<div class="menu-icon vd_blue"><i class="fa fa-envelope"></i></div> 
                            <div class="menu-text">
								<?php echo $row_notify['Notification_Msg']; ?>
							</div> 
							<!-- Notification Message -->
						</a>
					</li>
					
				<?php } ?>
				
               </ul>
               </div>                                                                       
           </div>                              
        </div> <!-- child-menu -->                      
      </div>   <!-- vd_mega-menu-content -->         
    </li>  
<?php }elseif($_SESSION['UserType']=="incharge"){ ?>
        
		<?php 
		
			$count_iemp=mysqli_query($db,"SELECT * FROM tblnotifications where Incharge_Code='".$_SESSION['UserName']."' and Incharge_Flag='0'");
			$num_iemp=mysqli_num_rows($count_iemp);
		?>
		
	<li id="top-menu-3"  class="one-icon mega-li"> 
      <a href="javascript:" class="mega-link" data-action="click-trigger" title="Notifications"> 
    	<span class="mega-icon"><i class="fa fa-globe"></i></span> 
		<span class="badge vd_bg-red"><?php echo $num_iemp; ?></span> <!-- Number of Notification-->     
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">  
           <div class="title"> Notifications </div>   
		   <div class="content-list">	
           	   <div  data-rel="scroll" style="overflow-y:scroll;">	
               <ul  class="list-wrapper pd-lr-10">
			   <?php 
					$notify=mysqli_query($db,"SELECT * FROM tblnotifications where Incharge_Code='".$_SESSION['UserName']."' and Incharge_Flag='0' order by Nid desc");
					while($row_notify=mysqli_fetch_array($notify)){
				
					if($row_notify['Ntype'] == 'New Leave'){
				?>
					<li> 
						<a href="leave-application.php?LAid=<?php echo $row_notify['LAid'];?>&Nid=<?php echo $row_notify['Nid'];?>">
                    		<div class="menu-icon vd_blue"><i class="fa fa-envelope"></i></div> 
                            <div class="menu-text">
								<?php echo $row_notify['Notification_Msg']; ?>
							</div> 
							<!-- Notification Message -->
						</a>
					</li>
					<?php }if($row_notify['Ntype'] == 'New Missing'){?>
					<li> 
						<a href="missing-attendance.php?MAid=<?php echo $row_notify['LAid'];?>&Nid=<?php echo $row_notify['Nid'];?>">
                    		<div class="menu-icon vd_blue"><i class="fa fa-envelope"></i></div> 
                            <div class="menu-text">
								<?php echo $row_notify['Notification_Msg']; ?>
							</div> 
							<!-- Notification Message -->
						</a>
					</li>
					<?php }if($row_notify['Ntype'] == 'New CTO'){?>
					
					<li> 
						<a href="compensation_for_time_off.php?CTOid=<?php echo $row_notify['LAid'];?>&Nid=<?php echo $row_notify['Nid'];?>">
                    		<div class="menu-icon vd_blue"><i class="fa fa-envelope"></i></div> 
                            <div class="menu-text">
								<?php echo $row_notify['Notification_Msg']; ?>
							</div> 
							<!-- Notification Message -->
						</a>
					</li>
					
					<?php }	?>
				<?php } ?>
				
               </ul>
               </div>                                                                       
           </div>                              
        </div> <!-- child-menu -->                      
      </div>   <!-- vd_mega-menu-content -->         
    </li>        
		
<?php }elseif($_SESSION['UserType']=="hod"){ ?>
        
		<?php 
		
			$count_iemp=mysqli_query($db,"SELECT * FROM tblnotifications where Incharge_Code='".$_SESSION['UserName']."' and Incharge_Flag='0'");
			$num_iemp=mysqli_num_rows($count_iemp);
		?>
		
	<li id="top-menu-3"  class="one-icon mega-li"> 
      <a href="javascript:" class="mega-link" data-action="click-trigger" title="Notifications">
    	<span class="mega-icon"><i class="fa fa-globe"></i></span> 
		<span class="badge vd_bg-red"><?php echo $num_iemp; ?></span> <!-- Number of Notification-->     
      </a>
      <div class="vd_mega-menu-content  width-xs-3 width-sm-4  center-xs-3 left-sm" data-action="click-target">
        <div class="child-menu">  
           <div class="title"> Notifications </div>   
		   <div class="content-list">	
           	   <div  data-rel="scroll" style="overflow-y:scroll;">	
               <ul  class="list-wrapper pd-lr-10">
			   <?php 
					$notify=mysqli_query($db,"SELECT * FROM tblnotifications where Incharge_Code='".$_SESSION['UserName']."' and Incharge_Flag='0' order by Nid desc");
						while($row_notify=mysqli_fetch_array($notify)){
							
					if($row_notify['Ntype'] == 'New Leave'){
						
						$select_la=mysqli_query($db,"select from tblleaveapplication where LAid='".$row_notify['LAid']."'");
							$row_la=mysqli_fetch_array($select_la);
					
					if($row_la['Days']>3){
				?>
					<li> 
						<a href="leave-application.php?LAid=<?php echo $row_notify['LAid'];?>&Nid=<?php echo $row_notify['Nid'];?>">
                    		<div class="menu-icon vd_blue"><i class="fa fa-envelope"></i></div> 
                            <div class="menu-text">
								<?php echo $row_notify['Notification_Msg']; ?>
							</div> 
							<!-- Notification Message -->
						</a>
					</li>
					<?php }elseif($row_la['Days'] < 3){?>
					<li> 
						<a href="#">
							<div class="menu-icon vd_blue"><i class="fa fa-envelope"></i></div> 
							<div class="menu-text">
								<?php echo $row_notify['Notification_Msg']; ?>
							</div> 
							<!-- Notification Message -->
						</a>
					</li>
					<?php } ?>
					<?php }if($row_notify['Ntype'] == 'New Missing'){?>
					<li> 
						<a href="missing-attendance.php?MAid=<?php echo $row_notify['LAid'];?>&Nid=<?php echo $row_notify['Nid'];?>">
                    		<div class="menu-icon vd_blue"><i class="fa fa-envelope"></i></div> 
                            <div class="menu-text">
								<?php echo $row_notify['Notification_Msg']; ?>
							</div> 
							<!-- Notification Message -->
						</a>
					</li>
					<?php }if($row_notify['Ntype'] == 'New CTO'){?>
					
					<li> 
						<a href="compensation_for_time_off.php?CTOid=<?php echo $row_notify['LAid'];?>&Nid=<?php echo $row_notify['Nid'];?>">
                    		<div class="menu-icon vd_blue"><i class="fa fa-envelope"></i></div> 
                            <div class="menu-text">
								<?php echo $row_notify['Notification_Msg']; ?>
							</div> 
							<!-- Notification Message -->
						</a>
					</li>
					
					<?php }	?>
				<?php } ?>
				
               </ul>
               </div>                                                                       
           </div>                              
        </div> <!-- child-menu -->                      
      </div>   <!-- vd_mega-menu-content -->         
    </li>        
		
<?php }elseif($_SESSION['UserType']=="admin"){ ?>
        


	
	
	<?php } ?>
	 
	 
    <li id="top-menu-profile" class="profile mega-li"> 
        <a href="#" class="mega-link"  data-action="click-trigger">
            <span  class="mega-image">
                <?php  $select_image=mysqli_query($db,'Select Employee_Image from tbluserinfodetail where Userid="'.$_SESSION['UserName'].'"');
						
						$user=mysqli_fetch_array($select_image);
						if($user['Employee_Image']!=""){?>
				  <img src="uploads/profile_image/<?php echo $user['Employee_Image'];?>" >
				  <?php }else{?>
				  <img src="img/avatar/user.png">
				  <?php } ?>            
            </span>
            <span class="mega-name">
                <?php if($_SESSION['UserType']=='admin'){?> 
                <?php echo $_SESSION['UserName'];?> <i class="fa fa-caret-down fa-fw"></i> 
                <?php }else{
				      $select_name=mysqli_query($db,'select User_Name from tbluserinfodetail where Userid="'.$_SESSION['UserName'].'"');
					  $row_n=mysqli_fetch_array($select_name);
				?>
                <?php echo $row_n['User_Name'];?>
				<i class="fa fa-caret-down fa-fw"></i> 
                <?php } ?>
                
                
            </span>
        </a> 
      <div class="vd_mega-menu-content  width-xs-2  left-xs left-sm" data-action="click-target">
        <div class="child-menu"> 
        	<div class="content-list content-menu">
                <ul class="list-wrapper pd-lr-10">
				
				<!--<li> <a href="logout.php"> <div class="menu-icon"><i class=" fa fa-sign-out"></i></div>  
					<div class="menu-text">Change Profile Image</div> </a> </li>
					-->
                    <li class="line"></li>
					<li> <a href="change_password.php"> <div class="menu-icon"><i class=" fa fa-lock"></i></div>  
					<div class="menu-text">Change Password</div> </a> </li>
                    <li class="line"></li>
                    <li> <a href="logout.php"> <div class="menu-icon"><i class=" fa fa-sign-out"></i></div>  
					<div class="menu-text">Sign Out</div> </a> </li>
                    <li class="line"></li>                
                    
                </ul>
            </div> 
        </div> 
      </div>     
    </li>               
	</ul>
<!-- Head menu search form ends -->                         
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- container --> 
      </div>
      <!-- vd_primary-menu-wrapper --> 

  </header>
  <!-- Header Ends --> 