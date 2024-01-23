<?php 
$db = mysqli_connect("localhost", "solunnjr_pd", "&pqS.]Vqfw}I","solunnjr_ccform");

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
    header("location: http://125.209.111.116:8183/applications/ccform-live/thank-you.php?id=$id&message=$message");
    
    
    
}
?> 

