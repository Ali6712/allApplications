<?php 
include("../include/security.php");
include("../include/conn.php");


//insert dept
 if($_GET["insert"]=="departments"){
$DeptName=$_POST['DeptName'];
$insert=mysqli_query($db,"insert into tbldept(DeptName) value('".$DeptName."')");
header("location: ../departments.php");

}
elseif($_POST['GET_HTML']=='departments'){
   $Deptid      = $_POST['Deptid'];

   $select=mysqli_query($db,"select * from tbldept where Deptid='".$Deptid."'");
   $row=mysqli_fetch_array($select);
   
   $html='<td><input class="form-control" type="text" id="Deptid" name="Deptid" value="'.$row['Deptid'].'" style="width:30px;"; readonly></td>
          <td><input class="form-control" type="text" id="DeptName'.$row['Deptid'].'" name="DeptName'.$row['Deptid'].'" value="'.$row['DeptName'].'"></td>
		  <td><a data-original-title="Save" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow" onClick="edit('.$row['Deptid'].');"> <i class="fa fa-save"></i> </a>
		</td>';   

echo $html;

 
}

elseif($_POST['EDIT']=='departments'){
   $Deptid        = $_POST['Deptid'];
   $DeptName      = $_POST['DeptName'];
   
   
   $select=mysqli_query($db,"UPDATE tbldept SET DeptName='".$DeptName."' where Deptid='".$Deptid."'");

   
   $html='<td>'.$Deptid.'</td>
          <td>'.$DeptName.'</td>
		  <td><a data-original-title="Edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow" onClick="get_html('.$Deptid.');"> <i class="fa fa-pencil"></i> </a>
		</td>';   


echo $html;

 
}




?> 

