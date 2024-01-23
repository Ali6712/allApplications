<?php include("include/security.php");?>
<?php include("include/conn.php");?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>New Complaint</title>
   
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
                    <li class="breadcrumb-item"><a href="javascript:">New CPA Form</a></li>
                    
                </ol>
            </nav>
            <!-- end::breadcrumb -->
          <div class="d-flex align-items-center">
                <!-- begin::navbar navigation toggler -->
                <div class="d-xl-none d-lg-none d-sm-block navigation-toggler">
                    <a href="#">
                        <i class="ti-menu"></i>
                    </a>
                </div>
                <!-- end::navbar navigation toggler -->

                <!-- begin::navbar toggler -->
                <div class="d-xl-none d-lg-none d-sm-block navbar-toggler">
                    <a href="#">
                        <i class="ti-arrow-down"></i>
                    </a>
                </div>
                <!-- end::navbar toggler -->
            </div>
        </div>

    </div>
    <!-- end::header body -->

</div>
<!-- end::header -->

<!-- begin::main content -->
<main class="main-content">

<div class="card">
        <div class="card-body">
            <?php if(isset($_GET['Serno'])){?>
			<div class="alert alert-success" role="alert">
                        CPA Created Successfully. CPA No is <?php echo base64_decode($_GET['Serno']);?>
            </div>
			<?php } ?>
            <form class="needs-validation" novalidate="" action="controllers/cpa.php?insert=cpa" method="POST"  enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip01">Date</label>
                        <input type="text" class="form-control" id="FLD_ERDAT" name="FLD_ERDAT" value="<?php echo date('Y-m-d');?>" required="required" readonly>
                        
                    </div>
					 <div class="col-md-3 mb-3">
                        <label for="validationTooltip01">Time</label>
                        <input type="text" class="form-control" id="FLD_TIME" name="FLD_TIME" value="<?php echo date('H:i');?>" required="required" readonly>
                        
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip02">Issuing Department</label>
                        <select id="FLD_INAME" name="FLD_INAME" class="form-control">
                                
								 <option value="Compliance">Compliance </option>
						</select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Send to Department</label>
                        <div class="input-group">
                            <select id="FLD_DNAME" name="FLD_DNAME" class="form-control" required >
                                   <option value="">Select</option>
								<?php 
								   $departments= mysqli_query($db,"SELECT * FROM tbl_depts where FLD_DFLAG='Active' order by FLD_DNAME asc");
								   while($department = mysqli_fetch_array($departments)){   
								?>
								   <option value="<?php echo $department['FLD_ID'];?>"><?php echo $department['FLD_DNAME'];?></option>
								
								<?php } ?>
						   </select>
						    <div class="invalid-tooltip">
                                Please select department.
								 </div>
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">CPA Type</label>
                        <div class="input-group">
                           <select id="FLD_CTYPE" name="FLD_CTYPE" class="form-control" required>
                                   <option value="">Select</option>
								<?php 
								   $cpas= mysqli_query($db,"SELECT * FROM tbl_cpatypes where FLD_CPAFLAG='Active' order by FLD_CPANAME asc");
								   while($cpa = mysqli_fetch_array($cpas)){   
								?>
								   <option value="<?php echo $cpa['FLD_ID'];?>"><?php echo $cpa['FLD_CPANAME'];?></option>
								
								<?php } ?>
						   </select>
                            
                            <div class="invalid-tooltip">
                                Please select cpa type.
                            </div>
                        </div>
                    </div>
					
				    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Finding Raised By (Name)</label>
                        <div class="input-group">
                             <input type="text" class="form-control" id="FLD_CRBY" name="FLD_CRBY" aria-describedby="validationTooltipUsernamePrepend" required>
                           
                            <div class="invalid-tooltip">
                                Please select rasied by.
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Dated</label>
                        <div class="input-group">
                             <input type="text" class="form-control" id="FLD_CRDT" name="FLD_CRDT" aria-describedby="validationTooltipUsernamePrepend" required>
                           
                            <div class="invalid-tooltip">
                                Please select date.
                            </div>
                        </div>
                    </div>
					
					
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Finding Issue </label>
                         <div class="input-group">
                            <select id="FLD_FISU" name="FLD_FISU" class="form-control" required>
                                   <option value="">Select</option>
								<?php 
								   $issues= mysqli_query($db,"SELECT * FROM tbl_fissues where FLD_FFLAG='Active' order by FLD_FNAME asc");
								   while($issue = mysqli_fetch_array($issues)){   
								?>
								   <option value="<?php echo $issue['FLD_ID'];?>"><?php echo $issue['FLD_FNAME'];?></option>
								
								<?php } ?>
						   </select>
						    <div class="invalid-tooltip">
                                Please select finding issue.
                            </div>
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Finding Type </label>
                         <div class="input-group">
                            <select id="FLD_FTYPE" name="FLD_FTYPE" class="form-control" required>
                                   <option value="">Select</option>
								<?php 
								   $types= mysqli_query($db,"SELECT * FROM tbl_ftypes where FLD_FTFLAG='Active' order by FLD_FTNAME asc");
								   while($type = mysqli_fetch_array($types)){   
								?>
								   <option value="<?php echo $type['FLD_ID'];?>"><?php echo $type['FLD_FTNAME'];?></option>
								
								<?php } ?>
						   </select>
						    <div class="invalid-tooltip">
                                Please select finding types.
                            </div>
                        </div>
                    </div>

					
					
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Finding Description  ( Max 500 Char )</label>
                        <div class="input-group">
                           <textarea rows="6" style="width:100%;" class="form-control"  id="FLD_DESC" name="FLD_DESC" aria-describedby="validationTooltipUsernamePrepend" required></textarea>
                            <div class="invalid-tooltip">
                                Please enter finding description.
                            </div>
               
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Attachment (If Any)</label>
                        <div class="input-group">
                           
                            <input type="file" class="form-control" id="FLD_FILE" name="FLD_FILE" placeholder="File" aria-describedby="validationTooltipUsernamePrepend">
                        </div>
                    </div>
					<div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Complaint Created By</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="FLD_CRTBY"  name="FLD_CRTBY" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $_SESSION['FLD_BNAME'];?>" required readonly>
                           
                        </div>
                    </div>
					<div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                            </div>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="validationTooltipUsernamePrepend" required readonly value="<?php echo $_SESSION['FLD_EMAIL'];?>">
                            
                        </div>
                    </div>
					
					
                </div>
               
			   
				<button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>

</main>
<!-- end::main content -->

<!-- Plugin scripts -->
<script src="vendors/bundle.js"></script>
<script src="vendors/datepicker/daterangepicker.js"></script>
<script src="assets/js/examples/datepicker.js"></script>
<!-- App scripts -->
<script src="assets/js/app.min.js"></script>


</body>

</html>