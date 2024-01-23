<?php include("include/security.php");?>
<?php include("include/conn.php");?>

<?php 


if($_POST['simple-date-range-picker']!=''){
    
$date  = explode('-',$_POST['simple-date-range-picker']);
$date1 = explode('/',$date[0]);
$date2 = explode('/',$date[1]);


$from  = trim($date1[2]).'-'.trim($date1[0]).'-'.trim($date1[1]);
$to    = trim($date2[2]).'-'.trim($date2[0]).'-'.trim($date2[1]);

$r1_creation_date="and r1_creation_date between '".$from."' and '".$to."'";

}

if($_POST['rank2']!='' and $_POST['rank2']!='0'){
    
$rank2    = explode('-',$_POST['rank2']);
$r2_date1 = explode('/',$rank2[0]);
$r2_date2 = explode('/',$rank2[1]);


$r2_from  = trim($r2_date1[2]).'-'.trim($r2_date1[0]).'-'.trim($r2_date1[1]);
$r2_to    = trim($r2_date2[2]).'-'.trim($r2_date2[0]).'-'.trim($r2_date2[1]);

$r1_rank2="and r1_rank2 between '".$r2_from."' and '".$r2_to."'";

}


if($_POST['pd4']!=''){
    
$pd4       = explode('-',$_POST['pd4']);
$pd4_date1 = explode('/',$pd4[0]);
$pd4_date2 = explode('/',$pd4[1]);


$pd4_from = trim($pd4_date1[2]).'-'.trim($pd4_date1[0]).'-'.trim($pd4_date1[1]);
$pd4_to   = trim($pd4_date2[2]).'-'.trim($pd4_date2[0]).'-'.trim($pd4_date2[1]);

$r1_pd4="and r1_pd4 between '".$pd4_from."' and '".$pd4_to."'";

}



if($_POST['r1_c_id']!='' and $_POST['r1_c_id']!='0'){
    
  $r1_c_id = 'and r1_c_id="'.$_POST['r1_c_id'].'"';    
    
}

if($_POST['pld_id']!='' and $_POST['pld_id']!='0'){
    
  $pld_id = 'and pld_id="'.$_POST['pld_id'].'"';    
    
}

if($_POST['r1_color']!='' and $_POST['r1_color']!='0'){
    
  $r1_color = 'and r1_color="'.$_POST['r1_color'].'"'; 
    
}

if($_POST['user_id']!='' and $_POST['user_id']!='0'){
    
  $user_id = 'and user_id="'.$_POST['user_id'].'"'; 
    
}

if($_POST['marked_to_id']!='' and $_POST['marked_to_id']!='0'){
    
  $lab_user_id = 'and lab_user_id="'.$_POST['marked_to_id'].'"';    
    
}

$select = mysqli_query($db,"select * from tbllogreport where r_id > 0  
$r1_c_id $pld_id $user_id $lab_user_id $r1_creation_date $r1_color 
$r1_rank2 $r1_pd4 order by r1_rank1 desc");



$select2 = mysqli_query($db,"select * from tbllogreport where r_id > 0  
$r1_c_id $pld_id $user_id $lab_user_id $r1_creation_date $r1_color 
$r1_rank2 $r1_pd4 order by r1_rank1 desc");


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?>Log Sheet - <?php echo date("d-M-y", strtotime($from)) ;?> - <?php echo date("d-M-y", strtotime($to));?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/media/image/favicon.png"/>

    <!-- Plugin styles -->
    <link rel="stylesheet" href="vendors/bundle.css" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="vendors/datepicker/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="assets/js/datatables/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="assets/js/datatables/buttons.dataTables.min.css">

    <!-- App styles -->
    <link rel="stylesheet" href="assets/css/app.min.css" type="text/css">
    
    <style>
    .th-color{background-color:#76933c !important;}    
    .th-color2{background-color:#92cddc !important;}     
    </style>
</head>
<body style="background-color:#fff !important;">

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
</div>
<!-- end::page loader -->

<!-- begin::header -->
<div class="header" style="background-color:#fff !important;">

    <!-- begin::header logo -->
    <div class="header-logo">
        <a href="index.php">
            <img class="large-logo" src="assets/media/image/logo.png" alt="image">
            <img class="small-logo" src="assets/media/image/logo-sm.png" alt="image">
            <img class="dark-logo" src="assets/media/image/logo-dark.png" alt="image">
        </a>
    </div>
    <!-- end::header logo -->

    <!-- begin::header body -->
    <div class="header-body">

        <div class="header-body-left">

            <h3 class="page-title">Product Development</h3>

            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Log Sheet - <?php echo date("d-M-y", strtotime($from)) ;?> - <?php echo date("d-M-y", strtotime($to));?></li>
                </ol>
            </nav>
            <!-- end::breadcrumb -->

        </div>

       
    </div>
    <!-- end::header body -->

</div>
<!-- end::header -->

<!-- begin::main content -->
<main class="main-content" style="margin-left:0px !important;">
   
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>PDF #</th>
                    <th class="th-color">Division</th>
                    <th class="th-color">Sample Description</th>
                    <th class="th-color">Product Category </th>
                    <th class="th-color">Customer Name</th>
                    <th class="th-color">Sales Person </th>
                    <th class="th-color">Lab Person </th>
                    <th class="th-color">Rank 1 Date  </th>
                    <th class="th-color">Rank 2 Date</th>
                    <!--<th>Rank 2B Date </th>
                    <th>Sample Received On </th>-->
                    
                    <th class="th-color2">Rank PD 1 Date  </th>
                    <th class="th-color2">Rank PD 2 Date </th>
                    <!--<th>Development Start Date  </th>
                    <th class="th-color2">Development End Date </th>-->
                    <th class="th-color2">Rank PD 3 Date  </th>
                    <th class="th-color2">Rank PD 3A Date  </th>
                    <th class="th-color2">Time Line/ Time for Completion </th>
                    
                    <th class="th-color2">Rank PD 4 Date  </th>
                    
                    <th class="th-color2">Dispatch Grade </th>
                    <!--<th class="th-color2">Date of Dispatch </th>-->
                    <th class="th-color2">Remarks </th>
                    
                    
                    <th class="th-color">Rank 3 Date </th>
                    <th class="th-color" style="color:red !important;">Rank 3A Date </th>
                    <th class="th-color">Rank 4 Date </th>
					
					<th class="th-color">Results </th>
                    <th class="th-color">Rank 5 Date </th>
                    <th class="th-color">Rank 6 Date </th>
                   
                    
                    
                    
                </tr>
                </thead>
                <tbody>
                <?php while($row=mysqli_fetch_array($select)){
                
                $customers= mysqli_query($db,"SELECT * FROM tblcustomers 
                where c_id='".$row['r1_c_id']."'");
				$customer = mysqli_fetch_array($customers);
				
				
				$pls= mysqli_query($db,"SELECT * FROM tblproductsublines
                where pld_id='".$row['pld_id']."'");
				$pl = mysqli_fetch_array($pls);
				
                $plines= mysqli_query($db,"SELECT * FROM tblproductlines
                where pl_id='".$pl['pl_id']."'");
				$pline = mysqli_fetch_array($plines);

				
				$sos= mysqli_query($db,"SELECT * FROM tblusers
                where user_id='".$row['user_id']."'");
				$so = mysqli_fetch_array($sos);
				
				$los= mysqli_query($db,"SELECT * FROM tblusers
                where user_id='".$row['lab_user_id']."'");
				$lo = mysqli_fetch_array($los);
				
				
				$categories= mysqli_query($db,"SELECT * FROM tblproductcategory where pc_id='".$row['r1_color']."'");
                $category = mysqli_fetch_array($categories);
				
                ?>    
                <tr>
                    <td><?php echo $pline['pl_name'];?>-<?php echo $row['r1_year'];?>-<?php echo $row['r1_id'];?></td>
                    <td><?php echo $pl['pld_name'];?></td>
                    <td><?php echo $row['pd_description'];?></td>
                    <td><?php echo $category['pc_name'];?></td>
                    <td><?php echo $customer['c_name'];?></td>
                    <td><?php echo $so['user_name'];?></td>
                    <td><?php echo $lo['user_name'];?></td>
                    <td><?php if($row['r1_rank1']!=''){echo date("d-M-y", strtotime($row['r1_rank1']));}?></td>
                   
                    <!--<td><?php //if($row['r1_rank2']!=''){echo date("d-M-y", strtotime($row['r1_rank2']));}?></td>-->
                    
                    <td><?php if($row['r1_rank2b']!=''){echo date("d-M-y", strtotime($row['r1_rank2b']));}?></td>
                    
                    <!--<td><?php //if($row['r1_sample_rec']!=''){ echo date("d-M-y", strtotime($row['r1_sample_rec']));}?></td>-->
                    
                    
                    
                    <td><?php if($row['r1_pd1']!=''){echo date("d-M-y", strtotime($row['r1_pd1']));}?></td>
                    
                    <td><?php if($row['r1_pd2']!=''){echo date("d-M-y", strtotime($row['r1_pd2']));
                    
                    $r1_comp_date = $row['r1_pd2'];
                    }?></td>
                    
                    <!--<td><?php //if($row['r1_dev_sdate']!=''){echo date("d-M-y", strtotime($row['r1_dev_sdate']));}?></td>
                    
                    <td><?php //if($row['r1_dev_edate']!=''){echo date("d-M-y", strtotime($row['r1_dev_edate']));}?></td>-->
                    
                    
                    <td><?php if($row['r1_pd3']!=''){echo date("d-M-y", strtotime($row['r1_pd3']));
                    
                    $r1_comp_date = $row['r1_pd3'];
                    }?></td>
                    
                    <td><?php if($row['r1_pd3a']!=''){echo date("d-M-y", strtotime($row['r1_pd3a']));
                    
                    $r1_comp_date = $row['r1_pd3a'];
                    }?></td>
                     
                     
                     
                     
                     
                     
                     
                     <td><?php if($row['r1_comp_date']!='' and $row['r1_comp_date']!='0000-00-00'){
                     
                     $r1_comp_date = $row['r1_comp_date'];
                     
                     }
                     
                     echo date("d-M-y", strtotime($r1_comp_date));
                     ?></td>
                     
                     
                     
                     
                       <td><?php if($row['r1_pd4']!=''){echo date("d-M-y", strtotime($row['r1_pd4']));}?></td>
                     
                     <td><?php echo $row['r1_disp_grade'];?></td>
                    
                    <!--<td><?php //if($row['r1_disp_date']!=''){echo date("d-M-y", strtotime($row['r1_disp_date']));}?></td>-->
                     <td><?php echo $row['r1_rec_remarks'];?></td>
                     
                  
                    
                    <td><?php if($row['r1_rank3']!=''){echo date("d-M-y", strtotime($row['r1_rank3']));}?></td>
                    
                    <td><?php if($row['r1_rank3']!=''){echo date("d-M-y", strtotime($row['r1_rank3']));}?></td>
                    
                    <td><?php if($row['r1_rank4']!=''){echo date("d-M-y", strtotime($row['r1_rank4']));}?></td>
                    <td><?php echo $row['r1_result'];?></td>
                     <td><?php if($row['r1_rank5']!=''){echo date("d-M-y", strtotime($row['r1_rank5']));}?></td>
                    
                    <td><?php if($row['r1_rank6']!=''){echo date("d-M-y", strtotime($row['r1_rank6']));}?></td>
                    
                    
                    
                    
                    
                    
                    
                    
                </tr>
                <?php } ?>
                <?php while($row2=mysqli_fetch_array($select2)){
                
                $customers= mysqli_query($db,"SELECT * FROM tblcustomers 
                where c_id='".$row2['r1_c_id']."'");
				$customer = mysqli_fetch_array($customers);
				
                $pls= mysqli_query($db,"SELECT * FROM tblproductsublines
                where pld_id='".$row2['pld_id']."'");
				$pl = mysqli_fetch_array($pls);
				
				
                $plines= mysqli_query($db,"SELECT * FROM tblproductlines
                where pl_id='".$pl['pl_id']."'");
				$pline = mysqli_fetch_array($plines);
				
				
				$sos= mysqli_query($db,"SELECT * FROM tblusers
                where user_id='".$row2['user_id']."'");
				$so = mysqli_fetch_array($sos);
				
				$los= mysqli_query($db,"SELECT * FROM tblusers
                where user_id='".$row2['lab_user_id']."'");
				$lo = mysqli_fetch_array($los);
				
				
				$categories= mysqli_query($db,"SELECT * FROM tblproductcategory where pc_id='".$row2['r1_color']."'");
                $category = mysqli_fetch_array($categories);
				
                ?>    
                                <tr>
                    <td><?php echo $pline['pl_name'];?>-<?php echo $row2['r1_year'];?>-R-<?php echo $row2['r_id'];?></td>
                    <td><?php echo $pl['pld_name'];?></td>
                    <td><?php echo $row2['pd_description'];?></td>
                    <td><?php echo $category['pc_name'];?></td>
                    <td><?php echo $customer['c_name'];?></td>
                    <td><?php echo $so['user_name'];?></td>
                    <td><?php echo $lo['user_name'];?></td>
                    <td><?php if($row2['r1_rank1']!=''){echo date("d-M-y", strtotime($row2['r1_rank1']));}?></td>
                   
                    <!--<td><?php //if($row['r1_rank2']!=''){echo date("d-M-y", strtotime($row['r1_rank2']));}?></td>-->
                    
                    <td><?php if($row2['r1_rank2b']!=''){echo date("d-M-y", strtotime($row2['r1_rank2b']));}?></td>
                    
                    <!--<td><?php //if($row['r1_sample_rec']!=''){ echo date("d-M-y", strtotime($row['r1_sample_rec']));}?></td>-->
                    
                    
                    
                    <td><?php if($row2['r1_pd1']!=''){echo date("d-M-y", strtotime($row2['r1_pd1']));}?></td>
                    
                    <td><?php if($row2['r1_pd2']!=''){echo date("d-M-y", strtotime($row2['r1_pd2']));
                    
                    
                     $r1_comp_date = $row2['r1_pd2'];
                    }?></td>
                    
                    <!--<td><?php //if($row['r1_dev_sdate']!=''){echo date("d-M-y", strtotime($row['r1_dev_sdate']));}?></td>
                    
                    <td><?php //if($row['r1_dev_edate']!=''){echo date("d-M-y", strtotime($row['r1_dev_edate']));}?></td>-->
                    
                    
                    <td><?php if($row2['r1_pd3']!=''){echo date("d-M-y", strtotime($row2['r1_pd3']));
                    
                     $r1_comp_date = $row2['r1_pd3'];
                    
                    }?></td>
                    
                    <td><?php if($row2['r1_pd3a']!=''){echo date("d-M-y", strtotime($row2['r1_pd3a']));
                    $r1_comp_date = $row2['r1_pd3a'];
                    
                    }?></td>
                     <td><?php if($row2['r1_comp_date']!='' and $row2['r1_comp_date']!='0000-00-00'){
                     
                     $r1_comp_date = $row2['r1_comp_date'];
                     }
                     echo date("d-M-y", strtotime($r1_comp_date));
                     
                     ?></td>
                       <td><?php if($row2['r1_pd4']!=''){echo date("d-M-y", strtotime($row2['r1_pd4']));}?></td>
                     
                     <td><?php echo $row['r1_disp_grade'];?></td>
                    
                    <!--<td><?php //if($row['r1_disp_date']!=''){echo date("d-M-y", strtotime($row['r1_disp_date']));}?></td>-->
                     <td><?php echo $row2['r1_rec_remarks'];?></td>
                     
                  
                    
                    <td><?php if($row2['r1_rank3']!=''){echo date("d-M-y", strtotime($row2['r1_rank3']));}?></td>
                    <td><?php if($row2['r1_rank3']!=''){echo date("d-M-y", strtotime($row2['r1_rank3']));}?></td>
                    <td><?php if($row2['r1_rank4']!=''){echo date("d-M-y", strtotime($row2['r1_rank4']));}?></td>
                    <td><?php echo $row2['r1_result'];?></td>
                     <td><?php if($row2['r1_rank5']!=''){echo date("d-M-y", strtotime($row2['r1_rank5']));}?></td>
                    
                    <td><?php if($row2['r1_rank6']!=''){echo date("d-M-y", strtotime($row2['r1_rank6']));}?></td>
                    
                    
                    
                    
                    
                    
                    
                    
                </tr>
                <?php } ?>
                </tbody>
               
            </table>
        </div>
    </div>

    
</main>
<!-- end::main content -->

<!-- Plugin scripts -->
<script src="vendors/bundle.js"></script>
<script src="assets/js/examples/datatable.js"></script>


<script type="text/javascript" src="assets/js/datatables/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="assets/js/datatables/jszip_3.1.3_jszip.min.js"></script>

<script type="text/javascript" src="assets/js/datatables/pdfmake.min.js
"></script>
<script type="text/javascript" src="assets/js/datatables/vfs_fonts.js
"></script>
<script type="text/javascript" src="assets/js/datatables/buttons.html5.min.js"></script>


<script src="assets/js/app.min.js"></script>
</body>

</html>