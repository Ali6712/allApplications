<?php include("include/security.php");?>
<?php include("include/conn.php");?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>CPA Detail</title>
   
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
                    <li class="breadcrumb-item"><a href="javascript:">CPA No <?php echo base64_decode($_GET['id']);?></a></li>
                    
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
            <?php 
				   $cpas= mysqli_query($db,"SELECT * FROM tbl_cpa where FLD_ID='".base64_decode($_GET['id'])."'");
				   $cpa = mysqli_fetch_array($cpas);
                    					 
		       ?>
            <form class="needs-validation" novalidate="" action="controllers/cpa.php?edit=dept-cpa&id=<?php echo $_GET['id'];?>" method="POST"  enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip01">Date</label>
                        <input type="text" class="form-control" id="FLD_ERDAT" name="FLD_ERDAT" value="<?php echo $cpa['FLD_ERDAT'];?>" readonly>
                        
                    </div>
					 <div class="col-md-3 mb-3">
                        <label for="validationTooltip01">Time</label>
                        <input type="text" class="form-control" id="FLD_TIME" name="FLD_TIME" value="<?php echo $cpa['FLD_TIME'];?>"  readonly>
                        
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip02">Issuing Department</label>
                        <select id="FLD_INAME" name="FLD_INAME" class="form-control" disabled>
                                
								 <option value="Compliance">Compliance </option>
						</select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Send to Department</label>
                        <div class="input-group">
                            <select id="FLD_DNAME" name="FLD_DNAME" class="form-control"  disabled >
                                   <option value="">Select</option>
								<?php 
								   $departments= mysqli_query($db,"SELECT * FROM tbl_depts where FLD_DFLAG='Active' order by FLD_DNAME asc");
								   while($department = mysqli_fetch_array($departments)){   
								?>
								   <option value="<?php echo $department['FLD_ID'];?>" <?php if($department['FLD_ID']==$cpa['FLD_DNAME']){echo "selected='selected'";}?>  ><?php echo $department['FLD_DNAME'];?></option>
								
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
                           <select id="FLD_CTYPE" name="FLD_CTYPE" class="form-control" disabled >
                                   <option value="">Select</option>
								<?php 
								   $cpast= mysqli_query($db,"SELECT * FROM tbl_cpatypes where FLD_CPAFLAG='Active' order by FLD_CPANAME asc");
								   while($cpat = mysqli_fetch_array($cpast)){   
								?>
								   <option value="<?php echo $cpat['FLD_ID'];?>" <?php if($cpat['FLD_ID']==$cpa['FLD_CTYPE']){echo "selected='selected'";}?>><?php echo $cpat['FLD_CPANAME'];?></option>
								
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
                             <input type="text" class="form-control" id="FLD_CRBY" name="FLD_CRBY" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $cpa['FLD_CRBY'];?>"  disabled>
                           
                            <div class="invalid-tooltip">
                                Please select rasied by.
                            </div>
                        </div>
                    </div>
				
					<div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Dated</label>
                        <div class="input-group">
                             <input type="text" class="form-control" id="FLD_CRDT2" name="FLD_CRDT2" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $cpa['FLD_CRDT'];?>"  disabled>
                           
                            <div class="invalid-tooltip">
                                Please select date.
                            </div>
                        </div>
                    </div>
					
					
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Finding Issue </label>
                         <div class="input-group">
                            <select id="FLD_FISU" name="FLD_FISU" class="form-control"  disabled>
                                   <option value="">Select</option>
								<?php 
								   $issues= mysqli_query($db,"SELECT * FROM tbl_fissues where FLD_FFLAG='Active' order by FLD_FNAME asc");
								   while($issue = mysqli_fetch_array($issues)){   
								?>
								   <option value="<?php echo $issue['FLD_ID'];?>" <?php if($issue['FLD_ID']==$cpa['FLD_FISU']){echo "selected='selected'";}?>><?php echo $issue['FLD_FNAME'];?></option>
								
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
                            <select id="FLD_FTYPE" name="FLD_FTYPE" class="form-control"  disabled>
                                   <option value="">Select</option>
								<?php 
								   $types= mysqli_query($db,"SELECT * FROM tbl_ftypes where FLD_FTFLAG='Active' order by FLD_FTNAME asc");
								   while($type = mysqli_fetch_array($types)){   
								?>
								   <option value="<?php echo $type['FLD_ID'];?>" <?php if($type['FLD_ID']==$cpa['FLD_FTYPE']){echo "selected='selected'";}?>><?php echo $type['FLD_FTNAME'];?></option>
								
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
                           <textarea rows="6" style="width:100%;" class="form-control"  id="FLD_DESC" name="FLD_DESC" aria-describedby="validationTooltipUsernamePrepend" disabled><?php echo $cpa['FLD_DESC'];?></textarea>
                            <div class="invalid-tooltip">
                                Please enter finding description.
                            </div>
               
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Attachment</label>
                        <div class="input-group">
                            <?php if($cpa['FLD_FILE']!=''){?>
                            <a href="Upload/<?php echo $cpa['FLD_FILE'];?>" target="_blank" style="color:green;">View Attachment</a>
							<?php } ?>
                        </div>
                    </div>
					
					
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Root Cause</label>
                        <div class="input-group">
                           <textarea rows="6" style="width:100%;" class="form-control"  id="FLD_ROOTC" name="FLD_ROOTC" aria-describedby="validationTooltipUsernamePrepend" disabled><?php echo $cpa['FLD_ROOTC'];?></textarea>
                            <div class="invalid-tooltip">
                                Please enter finding description.
                            </div>
               
                        </div>
                    </div>
					
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Corrective Action   </label>
                        <div class="input-group">
                           <textarea rows="6" style="width:100%;" class="form-control"  id="FLD_CORAC" name="FLD_CORAC" aria-describedby="validationTooltipUsernamePrepend" disabled><?php echo $cpa['FLD_CORAC'];?></textarea>
                            <div class="invalid-tooltip">
                                Please enter finding description.
                            </div>
               
                        </div>
                    </div>
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Target Date</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="FLD_TDATE2"  name="FLD_TDATE2" aria-describedby="validationTooltipUsernamePrepend" disabled value="<?php echo $cpa['FLD_TDATE'];?>" >
                           
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">CPA Status</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="FLD_CFLAG"  name="FLD_CFLAG" aria-describedby="validationTooltipUsernamePrepend" disabled value="<?php echo $cpa['FLD_CFLAG'];?>" >
                           
                        </div>
                    </div>

					
                </div>
               
			   
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