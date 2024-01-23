<?php 
include("../include/security.php");
include("../include/conn.php");


//insert dept
 if($_GET["insert"]=="designations"){
$DesigName=$_POST['DesigName'];
$insert=mysqli_query($db,"insert into tbldesignations(DesigName) value('".$DesigName."')");
header("location: ../designations.php");

}
elseif($_POST['GET_HTML']=='designations'){
   $Desigid      = $_POST['Desigid']; 
   $select=mysqli_query($db,"select * from tbldesignations where Desigid='".$Desigid."'");
   $row=mysqli_fetch_array($select);
   
   $html='<td><input class="form-control" type="text" id="desigid" name="Desigid" value="'.$row['Desigid'].'" style="width:45px;"; readonly></td>
          <td><input class="form-control" type="text" id="DesigName'.$row['Desigid'].'" name="DesigName'.$row['Desigid'].'" value="'.$row['DesigName'].'"></td>
		  <td><a data-original-title="Save" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow" onClick="edit('.$row['Desigid'].');"><i class="fa fa-save"></i> </a>
		</td>';   

echo $html;
}

elseif($_POST['EDIT']=='designations'){
   $Desigid        = $_POST['Desigid'];
   $DesigName      = $_POST['DesigName'];
   
   
   $select=mysqli_query($db,"UPDATE tbldesignations SET DesigName='".$DesigName."' where Desigid='".$Desigid."'");
   $row=mysqli_fetch_array($select);
   
   $html='<td>'.$Desigid.'</td>
          <td>'.$DesigName.'</td>
		  <td><a data-original-title="Edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow" onClick="get_html('.$Desigid.');"><i class="fa fa-pencil"></i> </a>
		</td>';   

		
echo $html;

}

?> 

