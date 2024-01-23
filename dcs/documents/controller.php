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

$string      = $menu['FLD_MENU_NAME'].'-'.$sub_menu['FLD_OBJECT_FUNC']; 
$delete_file     = 'delete-file';
$change_document = 'change-document';
if($action == $string){
    
    $FLD_DNAME     = mysqli_real_escape_string($db,$_POST['FLD_DNAME']);
    $FLD_FOLDS     = mysqli_real_escape_string($db,$_POST['FLD_FOLDS']);
	$FLD_DTYPE     = mysqli_real_escape_string($db,$_POST['FLD_DTYPE']);
	$FLD_DTITL     = mysqli_real_escape_string($db,$_POST['FLD_DTITL']);
	$FLD_DCNUM     = mysqli_real_escape_string($db,$_POST['FLD_DCNUM']);
	$FLD_ISTAT     = mysqli_real_escape_string($db,$_POST['FLD_ISTAT']);
	$FLD_RPRD      = mysqli_real_escape_string($db,$_POST['FLD_RPRD']);
	$FLD_DLOC      = mysqli_real_escape_string($db,$_POST['FLD_DLOC']);
	$FLD_TINC      = mysqli_real_escape_string($db,$_POST['FLD_TINC']);
	$FLD_TINDT     = mysqli_real_escape_string($db,$_POST['FLD_TINDT']);
	$FLD_VISBL     = mysqli_real_escape_string($db,$_POST['FLD_VISBL']);
	$FLD_ANAME     = $aname;
	$FLD_ERDAT     = $date;
	$FLD_ERTIM     = $time;
	$FLD_DNAME2    = $_POST['FLD_DNAME2'];
	$FLD_DFLAG     = 'Active';
	try {
		
	$date           = date("Y-m-dhis");
	$filename       = $_FILES["FLD_DFILE"]["name"];
	$filename       = preg_replace("/[^A-Za-z0-9\-_.\/]/", "", $filename);
	$file_basename1 = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_basename  = $FLD_DNAME.'-'.$date.'-'.$file_basename1;
	$file_ext       = substr($filename, strripos($filename, '.')); // get file name
	if($filename!=""){
	$FLD_DFILE = $file_basename.$file_ext;
	move_uploaded_file($_FILES["FLD_DFILE"]["tmp_name"], "../browse/" . $FLD_DFILE);
	}

    $insert = mysqli_query($db,"insert into tbl_docs 
			(FLD_DNAME, FLD_FOLDS , FLD_DTYPE, FLD_DTITL,
			 FLD_DCNUM,
			 FLD_ISTAT,
			 FLD_RPRD, 
			 FLD_DLOC,
			 FLD_TINC,
			 FLD_TINDT,
			 FLD_DFILE,
			 FLD_VISBL,
			 FLD_ANAME,
			 FLD_ERDAT,
			 FLD_ERTIM,
			 FLD_DFLAG
			
			)
			 values('".$FLD_DNAME."','".$FLD_FOLDS."', '".$FLD_DTYPE."', 
			 '".$FLD_DTITL."',
			 '".$FLD_DCNUM."',
			 '".$FLD_ISTAT."',
			 '".$FLD_RPRD."',
			 '".$FLD_DLOC."',
			 '".$FLD_TINC."',
			 '".$FLD_TINDT."',
			 '".$FLD_DFILE."',
			 '".$FLD_VISBL."',
			 '".$FLD_ANAME."',
			 '".$FLD_ERDAT."',
			 '".$FLD_ERTIM."',
			 '".$FLD_DFLAG."'
			 )");

	
		if(!$insert){
	       throw new Exception(mysqli_error($db));	
     	}
    
	$departments = mysqli_query($db,"select FLD_DNAME from tbl_depts where FLD_ID='".$FLD_DNAME."'");
	$department  = mysqli_fetch_array($departments);

	$folders     = mysqli_query($db,"select FLD_FTYPE from tbl_folds where FLD_ID='".$FLD_FOLDS."'");
	$folder      = mysqli_fetch_array($folders);
    
    if($FLD_DTITL==''){
        $FLD_DTITL = 'New Document';
        
    }
    
	$FLD_LOG     = $FLD_DTITL.' is added in '.mysqli_real_escape_string($db,$folder['FLD_FTYPE']).' of '.mysqli_real_escape_string($db,$department['FLD_DNAME']);
	
	
	
			 
    $select     = mysqli_query($db,"SELECT FLD_ID FROM tbl_docs order by FLD_ID desc limit 0,1");
    $row        = mysqli_fetch_array($select);
    $FLD_ID     = $row['FLD_ID'];     	

	$insert = mysqli_query($db,"insert into tbl_logs 
	(FLD_DTITL, FLD_DNAME, FLD_FOLD, FLD_LOG, FLD_ANAME, FLD_ERDAT, FLD_ERTIM
	)
	values
	('".$FLD_ID."', '".$FLD_DNAME."', '".$FLD_FOLDS."', '".$FLD_LOG."', '".$FLD_ANAME."', '".$FLD_ERDAT."', '".$FLD_ERTIM."'
	)");	
	
	for($i=0;$i<count($FLD_DNAME2);$i++){

    $insert = mysqli_query($db,"insert into tbl_depts_docs 
			(FLD_DTITL, 
			 FLD_DNAME, 
			 FLD_ANAME, 
			 FLD_ERDAT, 
	         FLD_ERTIM
			
			)
			 values('".$FLD_ID."','".$FLD_DNAME2[$i]."',
			 '".$FLD_ANAME."',
			 '".$FLD_ERDAT."',
			 '".$FLD_ERTIM."'
			 )");
	}			 
			
	if(!$insert){
	   throw new Exception(mysqli_error($db));	
	}
    

	$message='Your details have been saved successfully.';	
	$FLD_OBJECT_NAME = $sub_menu['FLD_OBJECT_NAME'].'?id='.$id.'&name='.$menu['FLD_MENU_NAME'].
	'&function='.$sub_menu['FLD_OBJECT_FUNC'].'&icon='.$sub_menu['FLD_MENU_ICON'].'&message='.$message;		
    header("location: $FLD_OBJECT_NAME");
	}
	catch(Exception $e) {
	  echo 'Error: ' .$e->getMessage();
	}	
	
	
 
}
elseif($action == $change_document){
	
	$FLD_DNAME     = mysqli_real_escape_string($db,$_POST['FLD_DNAME']);
    $FLD_FOLDS     = mysqli_real_escape_string($db,$_POST['FLD_FOLDS']);
	$FLD_DTYPE     = mysqli_real_escape_string($db,$_POST['FLD_DTYPE']);
	$FLD_DTITL     = mysqli_real_escape_string($db,$_POST['FLD_DTITL']);
	$FLD_DCNUM     = mysqli_real_escape_string($db,$_POST['FLD_DCNUM']);
	$FLD_ISTAT     = mysqli_real_escape_string($db,$_POST['FLD_ISTAT']);
	$FLD_RPRD      = mysqli_real_escape_string($db,$_POST['FLD_RPRD']);
	$FLD_DLOC      = mysqli_real_escape_string($db,$_POST['FLD_DLOC']);
	$FLD_TINC      = mysqli_real_escape_string($db,$_POST['FLD_TINC']);
	$FLD_TINDT     = mysqli_real_escape_string($db,$_POST['FLD_TINDT']);
	$FLD_VISBL     = mysqli_real_escape_string($db,$_POST['FLD_VISBL']);
	$FLD_ANAME     = $aname;
	$FLD_ERDAT     = $date;
	$FLD_ERTIM     = $time;
	$FLD_DNAME2    = $_POST['FLD_DNAME2'];
	$FLD_DFLAG     = 'Active';
	
	
	
	$documents     = mysqli_query($db,"select * from tbl_docs where FLD_ID='".$_GET['id']."'");
	$document      = mysqli_fetch_array($documents);
	
    $insert = mysqli_query($db,"insert into tbl_docs_hist 
			(FLD_DR_ID, FLD_DNAME, FLD_FOLDS , FLD_DTYPE, FLD_DTITL,
			 FLD_DCNUM,
			 FLD_ISTAT,
			 FLD_RPRD, 
			 FLD_DLOC,
			 FLD_TINC,
			 FLD_TINDT,
			 FLD_DFILE,
			 FLD_VISBL,
			 FLD_ANAME,
			 FLD_ERDAT,
			 FLD_ERTIM,
			 FLD_DFLAG
			
			)
			 values('".$_GET['id']."',
			 '".mysqli_real_escape_string($db,$document['FLD_DNAME'])."',
			 '".mysqli_real_escape_string($db,$document['FLD_FOLDS'])."', 
			 '".mysqli_real_escape_string($db,$document['FLD_DTYPE'])."', 
			 '".mysqli_real_escape_string($db,$document['FLD_DTITL'])."',
			 '".mysqli_real_escape_string($db,$document['FLD_DCNUM'])."',
			 '".mysqli_real_escape_string($db,$document['FLD_ISTAT'])."',
			 '".mysqli_real_escape_string($db,$document['FLD_RPRD'])."',
			 '".mysqli_real_escape_string($db,$document['FLD_DLOC'])."',
			 '".mysqli_real_escape_string($db,$document['FLD_TINC'])."',
			 '".mysqli_real_escape_string($db,$document['FLD_TINDT'])."',
			 '".$document['FLD_DFILE']."',
			 '".$document['FLD_VISBL']."',
			 '".$document['FLD_ANAME']."',
			 '".$document['FLD_ERDAT']."',
			 '".$document['FLD_ERTIM']."',
			 '".$document['FLD_DFLAG']."'
			 )");

	
		if(!$insert){
	       throw new Exception(mysqli_error($db));	
     	}	


    
	
	
	$date           = date("Y-m-dhis");
	$filename       = $_FILES["FLD_DFILE"]["name"];
	$filename       = preg_replace("/[^A-Za-z0-9\-_.\/]/", "", $filename);
	$file_basename1 = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_basename  = $document['FLD_DNAME'].'-'.$date.'-'.$file_basename1;
	$file_ext       = substr($filename, strripos($filename, '.')); // get file name
	if($filename!=""){
	$FLD_DFILE = $file_basename.$file_ext;
	move_uploaded_file($_FILES["FLD_DFILE"]["tmp_name"], "../browse/" . $FLD_DFILE);		
		
	}else{
	$FLD_DFILE = $_POST['FLD_DFILE2'];	
	}	
    
	
    try{
		
    $update = mysqli_query($db,"update tbl_docs set 
			 FLD_DTYPE='".$FLD_DTYPE."', 
			 FLD_DTITL='".mysqli_real_escape_string($db,$FLD_DTITL)."',
			 FLD_DCNUM='".mysqli_real_escape_string($db,$FLD_DCNUM)."',
			 FLD_ISTAT='".$FLD_ISTAT."',
			 FLD_RPRD='".$FLD_RPRD."', 
			 FLD_DLOC='".$FLD_DLOC."',
			 FLD_TINC='".$FLD_TINC."',
			 FLD_TINDT='".$FLD_TINDT."',
			 FLD_DFILE='".mysqli_real_escape_string($db,$FLD_DFILE)."',
			 FLD_ANAME='".$FLD_ANAME."',
			 FLD_ERDAT='".$FLD_ERDAT."',
			 FLD_ERTIM='".$FLD_ERTIM."',
			 FLD_DFLAG='".$FLD_DFLAG."'
			 
			 where FLD_ID='".$_GET['id']."'");

	
		if(!$update){
	       throw new Exception(mysqli_error($db));	
     	}
		
		
		$departments = mysqli_query($db,"select FLD_DNAME from tbl_depts where FLD_ID='".$document['FLD_DNAME']."'");
		$department  = mysqli_fetch_array($departments);

		$folders     = mysqli_query($db,"select FLD_FTYPE from tbl_folds where FLD_ID='".$document['FLD_FOLDS']."'");
		$folder      = mysqli_fetch_array($folders);

		
		if($FLD_DTITL==''){
        $FLD_DTITL = 'Document';
        
         }
    
    	$FLD_LOG     = $FLD_DTITL.' is changed in '.mysqli_real_escape_string($db,$folder['FLD_FTYPE']).' of '.mysqli_real_escape_string($db,$department['FLD_DNAME']).'.';
		

		
		
		
		$FLD_LOG     = $FLD_LOG.'<br>'.'Document is '.mysqli_real_escape_string($db,$document['FLD_DTITL']);
		$FLD_ID     = '0';     	

		$insert = mysqli_query($db,"insert into tbl_logs 
		(FLD_DTITL, FLD_DNAME, FLD_FOLD, FLD_LOG, FLD_ANAME, FLD_ERDAT, FLD_ERTIM
		)
		values
		('".$FLD_ID."', '".$document['FLD_DNAME']."', '".$document['FLD_FOLDS']."', '".$FLD_LOG."', '".$aname."', '".$date."', '".$time."'
		)");			
		
		
		
		$id=$_GET['id'];
		$folder = base64_encode($_GET['folder']);
		$message='Your details have been saved successfully.';	
		$FLD_OBJECT_NAME = '../documents/edit-document.php?id='.$id.'&folder='.$folder.'&name=Documents&function=Change&message='.$message;		
		header("location: $FLD_OBJECT_NAME");
		
		}
		catch(Exception $e) {
		  echo 'Error: ' .$e->getMessage();
		}	
	
	
}elseif($_POST['SHOW']=='DOCUMENTS'){
	
$_SESSION['ID'] = $_POST['ID'];
$_SESSION['DEPARTMENT'] = $_POST['DEPARTMENT'];	

}elseif($_POST['DELETE']=='DOCUMENTS'){
    
    
    
    
    $documents = mysqli_query($db,"select * from tbl_docs where 
    FLD_ID='".$_POST['ID']."'");
    $document = mysqli_fetch_array($documents);
    $FLD_DFILE = '../browse/'.$document['FLD_DFILE'];
    unlink($FLD_DFILE);
    
	$FLD_DTITL = $document['FLD_DTITL'];
    $departments = mysqli_query($db,"select FLD_DNAME from tbl_depts where FLD_ID='".$document['FLD_DNAME']."'");
	$department  = mysqli_fetch_array($departments);

	$folders     = mysqli_query($db,"select FLD_FTYPE from tbl_folds where FLD_ID='".$document['FLD_FOLDS']."'");
	$folder      = mysqli_fetch_array($folders);

	
			if($FLD_DTITL==''){
                $FLD_DTITL = 'Document';
        
            }
    
    	$FLD_LOG     = $FLD_DTITL.' is deleted in '.mysqli_real_escape_string($db,$folder['FLD_FTYPE']).' of '.mysqli_real_escape_string($db,$department['FLD_DNAME']).'.';
	
	

    $FLD_ID     = '0';     	

	$insert = mysqli_query($db,"insert into tbl_logs 
	(FLD_DTITL, FLD_DNAME, FLD_FOLD, FLD_LOG, FLD_ANAME, FLD_ERDAT, FLD_ERTIM
	)
	values
	('".$FLD_ID."', '".$document['FLD_DNAME']."', '".$document['FLD_FOLDS']."', '".$FLD_LOG."', '".$aname."', '".$date."', '".$time."'
	)");		
	
	
	$delete = mysqli_query($db,"delete from tbl_docs where 
    FLD_ID='".$_POST['ID']."'");
 
    
}

?> 

