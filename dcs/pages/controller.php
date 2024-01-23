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
    
    $FLD_OBJECT_TYPE  = mysqli_real_escape_string($db,$_POST['FLD_OBJECT_TYPE']);
    $FLD_OBJECT       = mysqli_real_escape_string($db,$_POST['FLD_OBJECT']);
    $FLD_OBJECT_NAME  = mysqli_real_escape_string($db,$_POST['FLD_OBJECT_NAME']);
	$FLD_MENU_ICON    = mysqli_real_escape_string($db,$_POST['FLD_MENU_ICON']);
    $FLD_MENU_NAME    = mysqli_real_escape_string($db,$_POST['FLD_MENU_NAME']);
	$FLD_SHORT_CODE   = mysqli_real_escape_string($db,$_POST['FLD_SHORT_CODE']);
    $FLD_OBJECT_FUNC  = mysqli_real_escape_string($db,$_POST['FLD_OBJECT_FUNC']);
	$FLD_ANAME        = mysqli_real_escape_string($db,$_SESSION['FLD_ID']);
	$FLD_ERDAT        = $date;
	$FLD_STATUS       = 'Active';
	
	
	if($FLD_OBJECT=='Parent'){
	   $select          = mysqli_query($db,"SELECT max(FLD_ID) as FLD_ID FROM tbl_tadir");
       $row             = mysqli_fetch_array($select);
	   $FLD_PARENT      = $row['FLD_ID'] + 1;
	   $FLD_MENU_ICON   = '';
	   $FLD_SHORT_CODE  = '';
	   $FLD_OBJECT_FUNC = '';
	}else{
	   
	   $FLD_PARENT = $_POST['FLD_PARENT'];
		
	}
	
	try {
    $insert = mysqli_query($db,"insert into tbl_tadir 
			(FLD_OBJECT_TYPE, FLD_OBJECT, FLD_PARENT, FLD_OBJECT_NAME, 
			FLD_MENU_ICON, 
			FLD_MENU_NAME, 
			FLD_SHORT_CODE, 
			FLD_OBJECT_FUNC, 
			FLD_ANAME, 
			FLD_ERDAT, 
			FLD_STATUS
			)
			values
			('".$FLD_OBJECT_TYPE."', '".$FLD_OBJECT."', '".$FLD_PARENT."', '".$FLD_OBJECT_NAME."', 
			'".$FLD_MENU_ICON."', 
			'".$FLD_MENU_NAME."', 
			'".$FLD_SHORT_CODE."', 
			'".$FLD_OBJECT_FUNC."', 
			'".$FLD_ANAME."', 
			'".$FLD_ERDAT."', 
			'".$FLD_STATUS."'
			)");

			
	if(!$insert){
	   throw new Exception(mysqli_error($db));	
	}
    $select     = mysqli_query($db,"SELECT FLD_ID FROM tbl_tadir order by FLD_ID desc limit 0,1");
    $row        = mysqli_fetch_array($select);
    $FLD_ID     = $row['FLD_ID'];     	
	$message='Your details have been saved successfully.<a href="edit-page.php?id='.$FLD_ID.'" class="alert-link">View</a>';	
	$FLD_OBJECT_NAME = $sub_menu['FLD_OBJECT_NAME'].'?id='.$id.'&name='.$menu['FLD_MENU_NAME'].
	'&function='.$sub_menu['FLD_OBJECT_FUNC'].'&icon='.$sub_menu['FLD_MENU_ICON'].'&message='.$message;		
    header("location: $FLD_OBJECT_NAME");
	}
	catch(Exception $e) {
	  echo 'Error: ' .$e->getMessage();
	}	
	
	
 
}

?> 

