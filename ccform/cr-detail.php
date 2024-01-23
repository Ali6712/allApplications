<?php include("include/security.php");?>
<?php include("include/conn.php");?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Complaint Detail</title>
   
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
                    					 
		       ?>
            <form class="needs-validation" novalidate="" action="controllers/complaints.php?edit=complaint&id=<?php echo base64_encode($complaint['Serno']);?>" method="POST"  enctype="multipart/form-data">
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
                          
							<input type="text" class="form-control" id="cust_name" name="cust_name" aria-describedby="validationTooltipUsernamePrepend" readonly value="<?php echo $complaint['cust_name'];?>">
					   </div>
                    </div>
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Section</label>
                        <div class="input-group">
                          
							<select id="si" name="si" class="form-control" onchange="get_machines(this.value);" required>
                                   <option value="">Select</option>
								<?php 
								   $sections= mysqli_query($db,"SELECT * FROM sections where dname='".$complaint['comp_for']."'and sstatus='1' order by sname asc");
								   while($section = mysqli_fetch_array($sections)){   
								?>
								   <option value="<?php echo $section['si'];?>"><?php echo $section['sname'];?></option>
								
								<?php } ?>
						   </select>
					   </div>
                    </div>
					
				    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Machine</label>
                        <div class="input-group">
                          
							<select id="mi" name="mi" class="form-control" onchange="get_op(this.value);">
							<option value="0"></option>
							</select>
					   </div>
                    </div>
					
					<div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Operator</label>
                        <div class="input-group">
                          
							<select id="oi" name="oi" class="form-control">
							<option value="0"></option>
							</select>
					   </div>
                    </div>
					
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Product Description</label>
                        <div class="input-group">
                            
                            <input type="text" class="form-control" id="prod_desc" name="prod_desc" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $complaint['prod_desc'];?>" >
                           
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Batch Code / Reel No</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="batch_code" name="batch_code" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $complaint['batch_code'];?>">
                            <div class="invalid-tooltip">
                                Please enter Batch Code / Reel No.
                            </div>
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">JC No / PO Number</label>
                        <div class="input-group">
                            
                            <input type="text" class="form-control" id="iso_no" name="iso_no" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $complaint['iso_no'];?>">
                            
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">DN Ref / Date Of Supply</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="dn_supp" name="dn_supp"  aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $complaint['dn_supp'];?>">
                          
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Reason</label>
                        <div class="input-group">
                            <select id="reason" name="reason" class="form-control">
                                   <option value="">Select</option>
								<?php 
								   $reasons= mysqli_query($db,"SELECT * FROM reason order by reasons asc");
								   while($reason = mysqli_fetch_array($reasons)){   
								?>
								   <option value="<?php echo $reason['reasons'];?>" <?php if($complaint['reason']==$reason['reasons']){echo "selected='selected'";}?>><?php echo $reason['reasons'];?></option>
								
								<?php } ?>
						   </select>
                           
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Defective Material %</label>
                        <div class="input-group">
                          
                            <input type="text" class="form-control" id="def_mat" name="def_mat" aria-describedby="validationTooltipUsernamePrepend" value="<?php echo $complaint['def_mat'];?>">
                           
                        </div>
                    </div>
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Complaint Description ( Max 500 Char )</label>
                        <div class="input-group">
                           <textarea rows="6" style="width:100%;"  id="comp_desc" name="comp_desc" aria-describedby="validationTooltipUsernamePrepend" required=""><?php echo $complaint['comp_desc'];?></textarea>
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
                        <label for="validationTooltipUsername">Status</label>
                        <div class="input-group">
                            <select id="status" name="status" class="form-control">
                                   <option value="Pending" <?php if($complaint['status']=='Pending'){echo "selected='selected'";}?>>Pending</option>
								   <option value="Rejected" <?php if($complaint['status']=='Rejected'){echo "selected='selected'";}?>>Rejected</option>
								   <option value="Approved" <?php if($complaint['status']=='Approved'){echo "selected='selected'";}?>>Approved</option>
								   
								
						   </select>
                           
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Attachment</label>
                        <div class="input-group">
                           
                            <a href="Uploads/<?php echo $complaint['cc_file'];?>"><?php echo $complaint['cc_file'];?></a>
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

<!-- App scripts -->
<script src="assets/js/app.min.js"></script>
</body>

</html>