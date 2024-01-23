<?php 
include("../include/security.php");
include("../include/conn.php");

$html.='

		<div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Process Type</label>
                            <div class="col-sm-8">
                                <select id="process_type" name="process_type" class="form-control">
                                   <option value="">Select</option>';
							
								   $types= mysqli_query($db,"SELECT * FROM types where di='".$_POST['id']."' order by tname asc");
								   while($type = mysqli_fetch_array($types)){   
							
								   $html.='<option value="'.$type['id'].'">'.$type['tname'].'</option>';
								
							} 
						    $html.='</select>
                            </div>
                        </div>
             </div>			
				
 <div class="col-md-6">
            <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Defect Type</label>
                            <div class="col-sm-8">
                                 <select  id="defect_type" name="defect_type" class="form-control">
                                   <option value="">Select</option>';
							
								   $defects= mysqli_query($db,"SELECT * FROM defects where di='".$_POST['id']."' order by dname asc");
								   while($defect = mysqli_fetch_array($defects)){   
								
								   $html.=' <option value="'.$defect['id'].'">'.$defect['dname'].'</option>';
								
								 } 
						    $html.='</select>
                            </div>
                        </div>
             </div>';


echo $html;
?> 

