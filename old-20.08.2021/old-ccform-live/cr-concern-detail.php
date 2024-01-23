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
                    
                   $depts= mysqli_query($db,"SELECT * FROM departments where di='".$complaint['comp_for']."'");
				   $dept = mysqli_fetch_array($depts);  
				   
				   
				   $types=mysqli_query($db,"select * from types where id='".$complaint["process_type"]."'");
                   $row_type=mysqli_fetch_array($types);
                	
                   $process_type = $row_type['tname'];
                	
                   $defects=mysqli_query($db,"select * from defects where 
                	id='".$complaint["defect_type"]."'");
                   $row_defect=mysqli_fetch_array($defects);
                	
                   $defect_type  = $row_defect['dname'];
                      
                    
                    					 
		       ?>
            <form class="needs-validation" novalidate="" action="controllers/complaints.php?edit=c-complaint&id=<?php echo base64_encode($complaint['Serno']);?>" method="POST"  enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Date & Time:</label>
                        <input type="text" class="form-control" id="sub_date" name="sub_date" value="<?php echo $complaint['sub_date'];?>" required="" readonly>
                        
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip02">Issuing Department</label>
                 
						<input type="text" class="form-control" id="issue_dept" name="issue_dept" aria-describedby="validationTooltipUsernamePrepend" readonly value="<?php echo $complaint['issue_dept'];?>">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Customer Complaint For</label>
                        <div class="input-group">
           
						   <input type="text" class="form-control" id="comp_for" name="comp_for" aria-describedby="validationTooltipUsernamePrepend" readonly value="<?php echo $dept['dname'];?>">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Color</label>
                        <div class="input-group">
           
						   <input type="text" class="form-control" id="comp_color" name="comp_color" aria-describedby="validationTooltipUsernamePrepend" readonly value="<?php echo $complaint['comp_color'];?>">
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Customer Name</label>
                        <div class="input-group">
                          
							<input type="text" class="form-control" id="cust_name" name="cust_name" aria-describedby="validationTooltipUsernamePrepend" readonly value="<?php echo $complaint['cust_name'];?>" >
					   </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Product Grade</label>
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
                        <label for="validationTooltipUsername">Complaint Stage </label>
                         <div class="input-group">
						   <input type="text" class="form-control" id="batch_code" name="batch_code" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $complaint['comp_stage'];?>" readonly>
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">End Application </label>
                        <div class="input-group">
                           <input type="text" class="form-control" id="end_app" name="end_app" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $complaint['end_app'];?>" readonly>
                          
                        </div>
                    </div>
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Product Dosage %</label>
                        <div class="input-group">
                             <input type="text" class="form-control" id="prod_dos" name="prod_dos" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $complaint['prod_dos'];?>" readonly>
                            
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Base Material / Substrate </label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="material" name="material" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $complaint['material'];?>" readonly>
                           
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Process Type </label>
                        <div class="input-group">
                           <input type="text" class="form-control" id="process_type" name="process_type" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $process_type;?>" readonly>
                           
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Defect Type </label>
                         <div class="input-group"> <input type="text" class="form-control" id="defect_type" name="defect_type" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $defect_type;?>" readonly>
                          
                           
                        </div>
                    </div>
					
					<div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Defective Sample Sent To Concern ?
 </label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="comp_sample" name="comp_sample" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $complaint['comp_sample'];?>" readonly>
                          
                        </div>
                    </div>
					
					<div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Sample Detail
 </label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="sample_detail" name="sample_detail" aria-describedby="validationTooltipUsernamePrepend" required="" value="<?php echo $complaint['sample_detail'];?>" readonly>
                          
                        </div>
                    </div>
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Attachment</label>
                        <div class="input-group">
                           
                            <a href="Upload/<?php echo $complaint['cc_file'];?>"><?php echo $complaint['cc_file'];?></a>
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
				
					
					
					
								
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Action Taken To Correct The Problem (Product)</label>
                        <div class="input-group">
                          
                          
                          <textarea rows="6" style="width:100%;"  id="suggestion" name="suggestion" aria-describedby="validationTooltipUsernamePrepend" required><?php echo $ccomplaint['suggestion'];?></textarea>
                          
                          
                            <div class="invalid-tooltip">
                                Please enter action taken.
                            </div>
               
                        </div>
                    </div>
					
					
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Root Cause Of Problem</label>
                        <div class="input-group">
                            
                            
                        <textarea rows="6" style="width:100%;"  id="suggestion2" name="suggestion2" aria-describedby="validationTooltipUsernamePrepend" required><?php echo $ccomplaint['suggestion2'];?></textarea>
                        
					
						  <div class="invalid-tooltip">
                                Please enter root cause.
                            </div>
                         
               
                        </div>
                    </div>
					
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Corrective Action (To Prevent Re-Occurrence)</label>
                        <div class="input-group">
						    
<textarea rows="6" style="width:100%;"  id="suggestion3" name="suggestion3" aria-describedby="validationTooltipUsernamePrepend" required><?php echo $ccomplaint['suggestion3'];?></textarea>
                           
                            <div class="invalid-tooltip">
                                Please enter corrective action.
                            </div>
               
                        </div>
                    </div>
					<?php 
					if($complaint['comp_for'] == '2' or $complaint['comp_for'] == '31'){
						
					
					?>
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">	Production Line</label>
                        <div class="input-group">
						    

                             <select id="production_line" name="production_line" class="form-control" required>
                                   <option value=""></option>
                                   <?php 
								   if($complaint['comp_for'] == '2'){
								   ?>
								   <option value="Line-1">Line 1 </option>
								   <option value="Line-3">Line 3 </option>
                                   <option value="Line-5">Line 5 </option>
                                   <option value="Line-6">Line 6 </option>
                                   <option value="Line-7">Line 7 </option>
                                   <option value="Line-8">Line 8 </option>
                                   <option value="Line-10">Line 10 </option>
								   <?php } ?>
								   <?php 
								   if($complaint['comp_for'] == '31'){
								   ?>
								   <option value="Line-1">Line 1 </option>
								   <option value="Line-2">Line 2 </option>
								   <option value="Line-3">Line 3 </option>
                                   
								   <?php } ?>

						   </select>
						   <div class="invalid-tooltip">
                                Please select one option atleast.
                            </div>
				
               
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">	Shifts</label>
                        <div class="input-group">
						    

                             <select id="shifts" name="shifts" class="form-control" required>
                                   <option value=""></option>
                                   
								   <option value="Morning">Morning </option>
								   <option value="Evening">Evening</option>
                                   <option value="Night">Night</option>
                                  
                                   
						   </select>
						   <div class="invalid-tooltip">
                                Please select one option atleast.
                            </div>
				
               
                        </div>
                    </div>
					<?php } ?>
			
                    	<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">	Complaint Nature</label>
                        <div class="input-group">
						    

                             <select id="comp_nature" name="comp_nature" class="form-control" required>
                                   <option value=""></option>
								   <option value="Justified">Justified </option>
								   <option value="Not-Justified
">Not-Justified
</option>
 <option value="Insufficient-Information
">Insufficient Information
</option>
						   </select>
						   <div class="invalid-tooltip">
                                Please select one option atleast.
                            </div>
				
               
                        </div>
                    </div>
                   
					
					
					<?php 
					if ($complaint["cstatus"] != "Objected"){
					?>
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Attachment</label>
                        <div class="input-group">
                           
                           <input type="file" class="form-control" id="file" name="file" placeholder="File" aria-describedby="validationTooltipUsernamePrepend">
                        </div>
                    </div>
					
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Objection(s) By GM</label>
                        <div class="input-group">

                            <input type="text" class="form-control" id="objection"  name="objection" aria-describedby="validationTooltipUsernamePrepend" readonly >
               
                        </div>
                    </div>
					<?php } ?>
					
					
					<?php 
					if ($complaint["cstatus"] == "Objected"){
					?>
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Concern Department Attachment</label>
                        <div class="input-group">
                           
                          <a href="Upload/<?php echo $ccomplaint['file_uploaded'];?>"><?php echo $ccomplaint['file_uploaded'];?></a>
						  <input type="hidden" class="form-control" id="file2" name="file2" value="<?php echo $ccomplaint['file_uploaded'];?>">
                        </div>
                    </div>
					
					
					
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Objection(s) By GM</label>
                        <div class="input-group">
<textarea rows="6" style="width:100%;"  id="objection" name="objection" aria-describedby="validationTooltipUsernamePrepend" required><?php echo $ccomplaint['objection'];?></textarea>
                           

                        </div>
                    </div>
					
					
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Remarks For Objection(s)</label>
                        <div class="input-group">
<textarea rows="6" style="width:100%;"  id="objremarks" name="objremarks" aria-describedby="validationTooltipUsernamePrepend" required><?php echo $ccomplaint['objremarks'];?></textarea>
                           
               
                        </div>
                    </div>
					<?php } ?>
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

<script>
						
function get_op(mi,oi){
	
	if(mi>0){
		$.post("controllers/complaints.php",{mi:mi,oi:oi,get_op:'get_op'},function(data){
			
			document.getElementById("get_op").innerHtml=$("#get_op").html(data);
			
		});
	}
	
}
</script>	

</body>

</html>