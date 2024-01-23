<?php 
session_start();
include("../include/conn.php");
include("../include/security.php");
$id     = $_GET['id'];
$action = base64_decode($_GET['action']);

$sub_menus = mysqli_query($db,"SELECT FLD_PARENT,FLD_OBJECT_NAME,FLD_MENU_ICON,FLD_OBJECT_FUNC FROM tbl_tadir WHERE FLD_ID='".$id."'");
$sub_menu  = mysqli_fetch_array($sub_menus);

$menus     = mysqli_query($db,"SELECT FLD_MENU_NAME FROM tbl_tadir WHERE FLD_ID='".$sub_menu['FLD_PARENT']."'");
$menu      = mysqli_fetch_array($menus);

$string    = $menu['FLD_MENU_NAME'].'-'.$sub_menu['FLD_OBJECT_FUNC']; 

if($action == $string){
    
    $FLD_UNAME     = mysqli_real_escape_string($db,$_POST['FLD_UNAME']);
	$FLD_DNAME     = mysqli_real_escape_string($db,$_POST['FLD_DNAME']);
	$FLD_DFLAG     = 'Active';
	
	try {
    $insert = mysqli_query($db,"insert into tbl_depts 
			(FLD_UNAME, FLD_DNAME, FLD_DFLAG)
			 values('".$FLD_UNAME."', '".$FLD_DNAME."', '".$FLD_DFLAG."'
			 )");

			
	if(!$insert){
	   throw new Exception(mysqli_error($db));	
	}
    $select     = mysqli_query($db,"SELECT FLD_ID FROM tbl_depts order by FLD_ID desc limit 0,1");
    $row        = mysqli_fetch_array($select);
    $FLD_ID     = $row['FLD_ID'];     	
	$message='Your details have been saved successfully.';	
	$FLD_OBJECT_NAME = $sub_menu['FLD_OBJECT_NAME'].'?id='.$id.'&name='.$menu['FLD_MENU_NAME'].
	'&function='.$sub_menu['FLD_OBJECT_FUNC'].'&icon='.$sub_menu['FLD_MENU_ICON'].'&message='.$message;		
    header("location: $FLD_OBJECT_NAME");
	}
	catch(Exception $e) {
	  echo 'Error: ' .$e->getMessage();
	}	
	
	
 
}elseif($_GET['action'] == 'edit'){

$update = mysqli_query($db,"update tbl_tbl_depts set FLD_UNAME='".$_POST['FLD_UNAME']."',
						FLD_DNAME='".$_POST['FLD_DNAME']."' WHERE 
						FLD_ID='".$_GET['FLD_ID']."'");
header("location: department.php?id=107&name=Departments&function=Display&icon=flaticon-list-2");


}

?> 

