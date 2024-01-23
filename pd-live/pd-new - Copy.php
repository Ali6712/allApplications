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

            <h3 class="page-title">Customer Complaint Management</h3>

            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:">New Complaint Form</a></li>
                    
                </ol>
            </nav>
            <!-- end::breadcrumb -->
           <div class="d-flex align-items-right">
                <!-- begin::navbar navigation toggler -->
                <div class="d-sm-none d-sm-none d-sm-block navigation-toggler">
                    <a href="#">
                        <i class="ti-menu"></i>
                    </a>
                </div>
                <!-- end::navbar navigation toggler -->

                
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
                        Complaint Created Successfully. Complaint No is <?php echo base64_decode($_GET['Serno']);?>
            </div>
			<?php } ?>
            <form class="needs-validation" novalidate="" action="controllers/complaints.php?insert=complaint" method="POST"  enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Date & Time:</label>
                        <input type="text" class="form-control" id="sub_date" name="sub_date" value="<?php echo date('Y-m-d');?>" required="" readonly>
                        
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip02">Issuing Department</label>
                        <select id="issue_dept" name="issue_dept" class="form-control">
                                
								 <option value="Sales">Sales</option>
						</select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Send to Department</label>
                        <div class="input-group">
                            <select id="comp_for" name="comp_for" class="form-control" required onchange="get_types(this.value);">
                                   <option value="">Select</option>
								<?php 
								   $departments= mysqli_query($db,"SELECT * FROM departments where dtype='Dept' AND dtflag='1' order by dname asc");
								   while($department = mysqli_fetch_array($departments)){   
								?>
								   <option value="<?php echo $department['di'];?>"><?php echo $department['dname'];?></option>
								
								<?php } ?>
						   </select>
						    <div class="invalid-tooltip">
                                Please select department.
								 </div>
                        </div>
                    </div>
					 <div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Color</label>
                        <div class="input-group">
                            <select id="comp_color" name="comp_color" class="form-control" required >
                                   <option value="">Select</option>
								<?php 
								   $colors= mysqli_query($db,"SELECT * FROM colors order by colorName asc");
								   while($color = mysqli_fetch_array($colors)){   
								?>
								   <option value="<?php echo $color['colorName'];?>"><?php echo $color['colorName'];?></option>
								
								<?php } ?>
						   </select>
						    <div class="invalid-tooltip">
                                Please select color.
								 </div>
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Customer</label>
                        <div class="input-group">
                           <select id="cust_name" name="cust_name" class="form-control" required>
                                   <option value="">Select</option>
								<?php 
								   $customers= mysqli_query($db,"SELECT * FROM customers order by cName asc");
								   while($customer = mysqli_fetch_array($customers)){   
								?>
								   <option value="<?php echo $customer['cName'];?>"><?php echo $customer['cName'];?></option>
								
								<?php } ?>
						   </select>
                            
                            <div class="invalid-tooltip">
                                Please select customer name.
                            </div>
                        </div>
                    </div>
					
				    	<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Product Grade</label>
                        <div class="input-group">
                            <select id="prod_desc" name="prod_desc" class="form-control" required >
                                   <option value="">Select</option>
								<?php 
								   $ptypes= mysqli_query($db,"SELECT * FROM producttypes order by pdtname asc");
								   while($ptype = mysqli_fetch_array($ptypes)){   
								?>
								   <option value="<?php echo $ptype['pdtname'];?>"><?php echo $ptype['pdtcode'];?> - <?php echo $ptype['pdtname'];?></option>
								
								<?php } ?>
						   </select>
                           
                            <div class="invalid-tooltip">
                                Please select product grade.
                            </div>
                        </div>
                    </div>
					
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">P.O / Batch No</label>
                        <div class="input-group">
                            
                            <input type="text" class="form-control" id="batch_code" name="batch_code" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="invalid-tooltip">
                                Please enter P.O / Batch No.
                            </div>
                        </div>
                    </div>
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Complaint Stage </label>
                         <div class="input-group">
                            <select id="comp_stage" name="comp_stage" class="form-control" required>
                                   <option value="">Select</option>
								<?php 
								   $stages= mysqli_query($db,"SELECT * FROM stages where sstatus='1' order by sname asc");
								   while($stage = mysqli_fetch_array($stages)){   
								?>
								   <option value="<?php echo $stage['sname'];?>"><?php echo $stage['sname'];?></option>
								
								<?php } ?>
						   </select>
						    <div class="invalid-tooltip">
                                Please select complaint stage.
                            </div>
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">End Application </label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="end_app" name="end_app"  aria-describedby="validationTooltipUsernamePrepend" required>
                           <div class="invalid-tooltip">
                                Please enter end application.
                            </div>
                        </div>
                    </div>
					<div id="get_types" class="row col-md-12">
					<div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Product Dosage</label>
                        <div class="input-group">
                            <select id="prod_dos" name="prod_dos" class="form-control" required onchange="show_pd(this.value);">
                                   <option value=""></option>
								   <option value="Pure">Pure </option>
								   <option value="Diluted">Diluted </option>
						   </select>
                          
                          <div class="invalid-tooltip">
                                Please select product dosage.
                            </div>
                        </div>
                    </div>
					
					
					<div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Dilution Ratio</label>
                        <div class="input-group">
                           
                            <input type="number" class="form-control" id="prod_dos2" name="prod_dos2"  aria-describedby="validationTooltipUsernamePrepend" disabled>
                         
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Base Material / Substrate </label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="material" name="material"  aria-describedby="validationTooltipUsernamePrepend" required>
                          <div class="invalid-tooltip">
                                Please enter base material.
                            </div>
                        </div>
                    </div>
					
                   
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Process Type </label>
                        <div class="input-group">
                          
                           <select id="process_type" name="process_type" class="form-control" required>
                                   <option value="">Select</option>
							
						   </select>
						    <div class="invalid-tooltip">
                                Please select process type.
                            </div>
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Defect Type </label>
                        <div class="input-group">
                          
                           <select id="defect_type" name="defect_type" class="form-control" required>
                                   <option value="">Select</option>
								
						   </select>
						    <div class="invalid-tooltip">
                                Please select defect type.
                            </div>
                        </div>
                    </div>
					 </div>
					<div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Defective Sample Sent To Concern ?
 </label>
                        <div class="input-group">
                          
                           <select id="comp_sample" name="comp_sample" class="form-control" required onchange="show_ss(this.value);">
                                   <option value=""></option>
								   <option value="No">No</option>
								   <option value="Yes">Yes</option>
						   </select>
						   <div class="invalid-tooltip">
                                Please select yes/no.
                            </div>
                        </div>
                    </div>
					<div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Sample Detail</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="sample_detail" name="sample_detail" aria-describedby="validationTooltipUsernamePrepend" disabled>
                        </div>
                    </div>
					
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Attachment (If Any)</label>
                        <div class="input-group">
                           
                            <input type="file" class="form-control" id="file" name="file" placeholder="File" aria-describedby="validationTooltipUsernamePrepend">
                        </div>
                    </div>
					<div class="col-md-12 mb-3">
                        <label for="validationTooltipUsername">Complaint Detail ( Max 500 Char )</label>
                        <div class="input-group">
                           <textarea rows="6" style="width:100%;" class="form-control"  id="comp_desc" name="comp_desc" aria-describedby="validationTooltipUsernamePrepend" required></textarea>
                            <div class="invalid-tooltip">
                                Please enter complaint description.
                            </div>
               
                        </div>
                    </div>
					<div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Complaint Created By</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="ename"  name="ename" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="invalid-tooltip">
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
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="validationTooltipUsernamePrepend" required>
                            <div class="invalid-tooltip">
                                Please enter valid email address.
                            </div>
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


<script>
  function get_types(id){

        $.post("controllers/get_types.php",{id:id},function(data){   
        				
        document.getElementById("get_types").innerHtml=$("#get_types").html(data);
        });	

}  

function show_pd(val){
	
	if(val=='Diluted'){
		
		
		$('#prod_dos2').attr('required', 'required');
		$('#prod_dos2').removeAttr('disabled', 'disabled');
		
	}else if(val=='Available'){
		
		
		$('#prod_dos2').attr('required', 'required');
		$('#prod_dos2').removeAttr('disabled', 'disabled');
		
	}
	else{
		$('#prod_dos2').attr('disabled', 'disabled');
		$('#prod_dos2').removeAttr('required', 'required');
	}
}


function show_ss(val){
	
	if(val=='Yes'){
		
		
		$('#sample_detail').attr('required', 'required');
		$('#sample_detail').removeAttr('disabled', 'disabled');
		
	}else{
		$('#sample_detail').attr('disabled', 'disabled');
		$('#sample_detail').removeAttr('required', 'required');
	}
}
</script>


</body>

</html>