<?php 
include("../include/security.php");
include("../include/conn.php");

//checking username and password
if($_POST["CITY"]=="city"){

 $html='<td class="table_title"><input type="text" name="CityName" id="CityName" size="40" value="'.$_POST['NAME'].'"></td>
                      <td align="center"><a href="javascript:" onclick="editRec(\''.$_POST['ID'].'\');"><img src="img/group_green_edit.png" alt="edit"/></a></td>';
echo $html;
}//end of desgn 
//insert City
if($_GET["insert"]=="cities"){
$CityName=$_POST['CityName'];
$insert=mysqli_query($db,"insert into tblcities(CityName) value('".$CityName."')");
header("location: ../cities.php");

}

//end                   
elseif($_POST['GET_HTML']=='cities'){
   $Cityid      = $_POST['Cityid'];
   
   $select=mysqli_query($db,"select * from tblcities where Cityid='".$Cityid."'");
   $row=mysqli_fetch_array($select);
   
   $html='<td><input class="form-control" type="text" id="Cityid" name="Cityid" value="'.$row['Cityid'].'" style="width:35px;"; readonly></td>
          <td><input class="form-control" type="text" id="CityName'.$row['Cityid'].'" name="CityName'.$row['Cityid'].'" value="'.$row['CityName'].'"></td>
          <td><a data-original-title="Save" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow" onClick="edit('.$row['Cityid'].');"> <i class="fa fa-save"></i> </a>
		</td>';

echo $html;

}
elseif($_POST['DELETE']=='city'){
   $Cityid       = $_POST['Cityid'];
   
   $delete=mysqli_query($db,"Delete from tblcities where Cityid='".$Cityid."'");
   
   echo $Cityid;

}

elseif($_POST['EDIT']=='cities'){
   $Cityid       = $_POST['Cityid'];
   $CityName      = $_POST['CityName'];
   
   $select=mysqli_query($db,"UPDATE tblcities SET CityName='".$CityName."' where Cityid='".$Cityid."'");  
   $html='<td>'.$Cityid.'</td>
		<td>'.$CityName.'</td>
		<td><a data-original-title="Edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow" onClick="get_html('.$Cityid.');"> <i class="fa fa-pencil"></i> </a>
			<a data-original-title="Delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red" onClick="delete_city('.$city['Cityid'].');"> <i class="icon-trash"></i> </a>
			</td>';   


echo $html;

 
}



?> 

