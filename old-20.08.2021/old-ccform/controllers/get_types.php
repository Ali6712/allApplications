<?php 
include("../include/security.php");
include("../include/conn.php");
if($_POST['id']!=5){
		$html.='<div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Product Dosage</label>
                        <div class="input-group">
                            <select id="prod_dos" name="prod_dos" class="form-control" required onchange="show_pd(this.value);">
                                   <option value=""></option>
								   <option value="Available">Available  </option>
								   <option value="Not-Applicable ">Not Applicable  </option>
						   </select>
                          
                          <div class="invalid-tooltip">
                                Please select product dosage.
                            </div>
                        </div>
                    </div><div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Comments</label>
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="prod_dos2" name="prod_dos2"  aria-describedby="validationTooltipUsernamePrepend" disabled>
                         
                        </div>
                    </div>';
}else{
	
	$html.='<div class="col-md-3 mb-3">
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
                    </div><div class="col-md-3 mb-3">
                        <label for="validationTooltipUsername">Dilution Ratio</label>
                        <div class="input-group">
                           
                            <input type="number" class="form-control" id="prod_dos2" name="prod_dos2"  aria-describedby="validationTooltipUsernamePrepend" disabled>
                         
                        </div>
                    </div>';
					
	
}
$html.='

					
			
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
                                   <option value="">Select</option>';
							
								   $types= mysqli_query($db,"SELECT * FROM types where di='".$_POST['id']."' order by tname asc");
								   while($type = mysqli_fetch_array($types)){   
							
								   $html.='<option value="'.$type['id'].'">'.$type['tname'].'</option>';
								
							} 
						    $html.='</select>
						    <div class="invalid-tooltip">
                                Please select process type.
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltipUsername">Defect Type </label>
                        <div class="input-group">
                          
                           <select id="defect_type" name="defect_type" class="form-control" required>
                                   <option value="">Select</option>';
							
								   $defects= mysqli_query($db,"SELECT * FROM defects where di='".$_POST['id']."' order by dname asc");
								   while($defect = mysqli_fetch_array($defects)){   
								
								   $html.=' <option value="'.$defect['id'].'">'.$defect['dname'].'</option>';
								
								 } 
						    $html.='</select>
						    <div class="invalid-tooltip">
                                Please select defect type.
                            </div>
                        </div>
                    </div>';


echo $html;
?> 

