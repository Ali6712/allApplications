<?php include("include/security.php");?>
<?php include("include/conn.php");?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Concern Department Complaint Detail</title>
   
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

            <h3 class="page-title">Customer Complaint Management</h3>

            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:">Complaint No <?php echo base64_decode($_GET['id']);?></a></li>
                    
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
				   $complaints= mysqli_query($db,"SELECT * FROM complain where Serno='".base64_decode($_GET['id'])."'");
				   $complaint = mysqli_fetch_array($complaints);
				   
				   $ccomplaints= mysqli_query($db,"SELECT * FROM concern_dept where serno='".base64_decode($_GET['id'])."'");
				   $ccomplaint = mysqli_fetch_array($ccomplaints);
                    					 
		       ?>
            <form class="needs-validation" novalidate="" action="controllers/complaints.php?edit=c-complaint&id=<?php echo base64_encode($complaint['Serno']);?>" method="POST"  enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Date & Time:</label>
                        <input type="text" class="form-control" id="sub_date" name="sub_date" value="<?php echo $complaint['sub_date'];?>" required="" readonly>
                        
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip02">Issuing Department</label>
                 
						<input type="text" class="form-control" id="issue_dept" name="issue_dept" aria-describedby="validationTooltipUsernamePrepend" readonly value="<?php echo $complaint['issue_dept'];?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Customer Complaint For</label>
                        <div class="input-group">
           
						   <input type="text" class="form-control" id="comp_for" name="comp_for" aria-describedby="validationTooltipUsernamePrepend" readonly value="<?php echo $complaint['comp_for'];?>">
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Customer Name</label>
                        <div class="input-group">
                          
							<input type="text" class="form-control" id="cust_name" name="cust_name" aria-describedby="validationTooltipUsernamePrepend" readonly value="<?php echo $complaint['cust_name'];?>" >
					   </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Product Description</label>
                        <div class="input-group">
                            
                            <input type="text" class="form-control" id="prod_desc" name="prod_desc" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $complaint['prod_desc'];?>" readonly>
                           
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Batch Code / Reel No</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="batch_code" name="batch_code" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $complaint['batch_code'];?>" readonly>
                            <div class="invalid-tooltip">
                                Please enter Batch Code / Reel No.
                            </div>
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">JC No / PO Number</label>
                        <div class="input-group">
                            
                            <input type="text" class="form-control" id="iso_no" name="iso_no" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $complaint['iso_no'];?>" readonly>
                            
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">DN Ref / Date Of Supply</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="dn_supp" name="dn_supp"  aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $complaint['dn_supp'];?>" readonly>
                          
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Reason</label>
                        <div class="input-group">
						<input type="text" class="form-control" id="reason" name="reason"  aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $complaint['reason'];?>" readonly>
                            
                           
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Defective Material %</label>
                        <div class="input-group">
                          
                            <input type="text" class="form-control" id="def_mat" name="def_mat" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $complaint['def_mat'];?>" readonly>
                           
                        </div>
                    </div>
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Complaint Description ( Max 500 Char )</label>
                        <div class="input-group">
                           <textarea rows="6" style="width:100%;"  id="comp_desc" name="comp_desc" aria-describedby="validationTooltipUsernamePrepend" required="" readonly><?php echo $complaint['comp_desc'];?></textarea>
                            <div class="invalid-tooltip">
                                Please enter complaint description.
                            </div>
               
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Complaint Created By</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="ename"  name="ename" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $complaint['ename'];?>" readonly>
                            <div class="invalid-tooltip"  >
                                Please enter your name.
                            </div>
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                            </div>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="validationTooltipUsernamePrepend" required="" readonly value="<?php echo $complaint['email'];?>">
                            <div class="invalid-tooltip" >
                                Please enter valid email address.
                            </div>
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Extension Number</label>
                        <div class="input-group">
                            
                            <input type="number" class="form-control" id="phone" name="phone" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $complaint['phone'];?>" readonly>
                            <div class="invalid-tooltip" >
                                Please enter extension number.
                            </div>
                        </div>
                    </div>
					
					
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Attachment</label>
                        <div class="input-group">
                           
                            <a href="Uploads/<?php echo $complaint['cc_file'];?>"><?php echo $complaint['cc_file'];?></a>
                        </div>
                    </div>
					
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Action Taken To Correct The Problem (Product)</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="suggestion"  name="suggestion" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $ccomplaint['suggestion'];?>" readonly>
                            <div class="invalid-tooltip">
                                Please enter action taken.
                            </div>
               
                        </div>
                    </div>
					
					
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Root Cause Of Problem</label>
                        <div class="input-group">
						<input type="text" class="form-control" id="suggestion2"  name="suggestion2" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $ccomplaint['suggestion2'];?>" readonly>
						  <div class="invalid-tooltip">
                                Please enter root cause.
                            </div>
                         
               
                        </div>
                    </div>
					
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Corrective Action (To Prevent Re-Occurrence)</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="suggestion3"  name="suggestion3" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $ccomplaint['suggestion3'];?>" readonly>
                            <div class="invalid-tooltip">
                                Please enter corrective action.
                            </div>
               
                        </div>
                    </div>
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Attachment</label>
                        <div class="input-group">
                           
                          <a href="Uploads/<?php echo $ccomplaint['file_uploaded'];?>"><?php echo $ccomplaint['file_uploaded'];?></a>
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

<!-- App scripts -->
<script src="assets/js/app.min.js"></script>
</body>

</html>