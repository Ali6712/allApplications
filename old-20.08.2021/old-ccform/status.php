<?php 
$db = mysqli_connect("localhost", "solution_binrasheed", "-gH]b?kN~g9m","solution_ccform");

if($_GET['update']=='status'){
    
        $select=mysqli_query($db,"select * from complain where
    	Serno='".($_GET["id"])."'");
    	$row=mysqli_fetch_array($select);
    
    if($row['sDate']==''){
        
        $update=mysqli_query($db,"update complain set 
        sDate='".date('Y-m-d')."',
        sRemarks='".base64_decode($_GET["action"])."' where
    	Serno='".($_GET["id"])."'");
    	$message = 'successfully';
        
    }else{
        
        $message = 'already';
    }/**/
    
    $id=$_GET["id"];
    header("location: http://solutionly.com.pk/projects/binrasheed/ccform/thank-you.php?id=$id&message=$message");
    
    
    
}
?> 

