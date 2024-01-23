<!--begin:Nav-->
<div class="navi navi-hover navi-active navi-link-rounded navi-bold navi-icon-center navi-light-icon">


<?php 
if($_SESSION['FLD_BTYPE']=='Admin'){
$units = mysqli_query($db,"SELECT * FROM tbl_units WHERE FLD_UFLAG = 'Active'");
while($unit = mysqli_fetch_array($units)){   
?>	

<div class="navi-section mt-7 mb-2 font-size-h6  pb-0"><?php echo $unit['FLD_UNAME'];?></div>
<!--begin:Item-->

<?php 

$departments = mysqli_query($db,"SELECT * FROM tbl_depts WHERE 
FLD_UNAME = '".$unit['FLD_ID']."' AND FLD_DFLAG='Active'");
while($department = mysqli_fetch_array($departments)){   
$documents = mysqli_query($db,"SELECT COUNT(*) as all_total FROM tbl_docs 
WHERE FLD_DNAME='".$department['FLD_ID']."'");
$document  = mysqli_fetch_array($documents);
?>	

<div class="navi-item my-2">
<a href="javascript:" onclick="show_documents('<?php echo base64_encode($department['FLD_ID']);?>','All');" class="navi-link">
<span class="navi-icon mr-4">
<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-20-140804/theme/html/demo5/dist/../src/media/svg/icons/Layout/Layout-arrange.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<path d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z" fill="#000000"/>
<path d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z" fill="#000000" opacity="0.3"/>
</g>
</svg><!--end::Svg Icon--></span>
</span>
<span class="navi-text  font-size-lg"><?php echo $department['FLD_DNAME']?></span>
<span class="navi-label">
<span class="label label-rounded label-light-warning"><?php echo $document['all_total'];?></span>
</span>
</a>
</div>
<!--end:Item-->
<?php } ?>
<?php }

}elseif($_SESSION['FLD_BTYPE']=='Dept' OR $_SESSION['FLD_BTYPE']=='Viewer'){

$documents = mysqli_query($db,"SELECT COUNT(*) as total FROM tbl_docs 
WHERE FLD_DNAME='1'");
$document  = mysqli_fetch_array($documents);	
?>

<div class="navi-section mt-7 mb-2 font-size-h6 font-weight-bold pb-0">Common</div>
<!--begin:Item-->

<div class="navi-item my-2">
<a href="javascript:" onclick="show_documents('<?php echo base64_encode('1');?>','Compliance');" class="navi-link">
<span class="navi-icon mr-4">
<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-20-140804/theme/html/demo5/dist/../src/media/svg/icons/Layout/Layout-arrange.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<path d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z" fill="#000000"/>
<path d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z" fill="#000000" opacity="0.3"/>
</g>
</svg><!--end::Svg Icon--></span>
</span>
<span class="navi-text  font-size-lg">Compliance</span>
<span class="navi-label">
<span class="label label-rounded label-light-warning "><?php echo $document['total'];?></span>
</span>
</a>
</div>
<!--end:Item-->

<?php 
$departments = mysqli_query($db,"SELECT d.*,u.FLD_UNAME
FROM tbl_depts d,tbl_units u WHERE 
d.FLD_ID = '".$_SESSION['FLD_DNAME']."' AND d.FLD_UNAME=u.FLD_ID");	
$department = mysqli_fetch_array($departments);

$documents = mysqli_query($db,"SELECT COUNT(*) as own_total FROM tbl_docs 
WHERE FLD_DNAME='".$_SESSION['FLD_DNAME']."'");
$document  = mysqli_fetch_array($documents);	
if($_SESSION['FLD_DNAME']!=1){
?>

<div class="navi-section mt-7 mb-2 font-size-h6 font-weight-bold pb-0"><?php echo $department['FLD_UNAME'];?></div>
<!--begin:Item-->

<div class="navi-item my-2">
<a href="javascript:" onclick="show_documents('<?php echo base64_encode($_SESSION['FLD_DNAME']);?>','Own');" class="navi-link">
<span class="navi-icon mr-4">
<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-20-140804/theme/html/demo5/dist/../src/media/svg/icons/Layout/Layout-arrange.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<path d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z" fill="#000000"/>
<path d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z" fill="#000000" opacity="0.3"/>
</g>
</svg><!--end::Svg Icon--></span>
</span>
<span class="navi-text  font-size-lg"><?php echo $department['FLD_DNAME']?></span>
<span class="navi-label">
<span class="label label-rounded label-light-warning "><?php echo $document['own_total'];?></span>
</span>
</a>
</div>
<!--end:Item-->

<?php } ?>


<?php 
$other_departments = mysqli_query($db,"SELECT 
distinct(d.FLD_DNAME) as FLD_DNAME FROM 
tbl_depts_docs dd,tbl_docs d
WHERE dd.FLD_DTITL = d.FLD_ID AND 
dd.FLD_DNAME = '".$_SESSION['FLD_DNAME']."' and d.FLD_DNAME!='".$_SESSION['FLD_DNAME']."' AND d.FLD_DNAME != '1'");	


$num = mysqli_num_rows($other_departments);
if($num > 0){




?>
<div class="navi-section mt-7 mb-2 font-size-h6 font-weight-bold pb-0">Others</div>
<!--begin:Item-->
<?php 												 
while($other_department = mysqli_fetch_array($other_departments)){

$select = mysqli_query($db,"SELECT 
FLD_DNAME FROM 
tbl_depts WHERE FLD_ID = '".$other_department['FLD_DNAME']."'");

$row = mysqli_fetch_array($select);


$documents = mysqli_query($db,"SELECT 
count(FLD_ID) as other_total FROM 
tbl_depts_docs where FLD_DNAME = '".$_SESSION['FLD_DNAME']."'");
$document  = mysqli_fetch_array($documents);	 	   

?>
<div class="navi-item my-2">
<a href="javascript:" onclick="show_documents('<?php echo base64_encode($other_department['FLD_DNAME']);?>','Others');" class="navi-link">
<span class="navi-icon mr-4">
<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-08-20-140804/theme/html/demo5/dist/../src/media/svg/icons/Layout/Layout-arrange.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<path d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z" fill="#000000"/>
<path d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z" fill="#000000" opacity="0.3"/>
</g>
</svg><!--end::Svg Icon--></span>
</span>
<span class="navi-text font-weight-bolder font-size-lg"><?php echo $row['FLD_DNAME']?></span>
<span class="navi-label">
<span class="label label-rounded label-light-warning font-weight-bolder"><?php echo $document['other_total'];?></span>
</span>
</a>
</div>
<!--end:Item-->
<?php } ?>

<?php }
}
?>

</div>
<!--end:Nav-->