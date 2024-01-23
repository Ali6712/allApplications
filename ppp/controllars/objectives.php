<?php
include("../include/security.php");
include("../include/conn.php");

if($_GET["insert"]=="objectives"){


for($i=1;$i<=5;$i++){
$insert=mysqli_query($db,"insert into tblobjectives
(Userid, OYear, Objective, ActionToBe, Weightage, 
SP1, 
SP2, 
SP3, 
SP4, 
SP5
)
values
('".$_SESSION['UserName']."', '".date('Y')."', 
'".mysqli_real_escape_string($db,$_POST['Objective'.$i])."',  
'".mysqli_real_escape_string($db,$_POST['ActionToBe'.$i])."',
'".$_POST['Weightage'.$i]."',
'".mysqli_real_escape_string($db,$_POST['SP1'.$i])."',
'".mysqli_real_escape_string($db,$_POST['SP2'.$i])."',
'".mysqli_real_escape_string($db,$_POST['SP3'.$i])."',
'".mysqli_real_escape_string($db,$_POST['SP4'.$i])."',
'".mysqli_real_escape_string($db,$_POST['SP5'.$i])."'
)");



}

$insert = mysqli_query($db,"insert into tblpppstatus 
	(Userid, MidYear, YearEnd, 	EDate, EYear	)
	values
	('".$_SESSION['UserName']."', '0', 	'0', '".date('Y-m-d')."','".date('Y')."')");


$select = mysqli_query($db,"select Userid,User_Name,Incharge_Code from tbluserinfodetail where 
Userid='".$_SESSION['UserName']."'");
$row    = mysqli_fetch_array($select);

$User_Name = $row['User_Name'];

$select2 = mysqli_query($db,"select Userid,User_Name,Incharge_Code from tbluserinfodetail where 
Userid='".$row['Incharge_Code']."'");
$row2    = mysqli_fetch_array($select2);




$Notification_Msg='<b>'.$User_Name.'</b> submit their <b>Goals for the year '.date('Y').'.</b>';

$insert = mysqli_query($db,"insert into tblnotifications 
	(Ntype, Userid, Read_Flag, 
	Notification_Msg, 
	NDate
	)
	values
	('Objective', '".$row['Incharge_Code']."', 
	'0', 
	'".$Notification_Msg."', 
	'".date('Y-m-d')."'
	)");




header("location:../phase-1.php");
}



elseif($_POST['get_reportee']=='get_reportee'){



$select=mysqli_query($db,"select * from tblobjectives where Userid='".$_POST['Userid']."' and 
						OYear='".date('Y')."' and Objective!='BEHAVIORAL COMPETENCIES'");
$num=mysqli_num_rows($select);
if($num>0){
$html='<table class="table table-striped jambo_table " id="objectives_table">
<thead style="background: #41b7de;
color: #ECF0F1;">
<tr class="headings">
<th class="column-title" style="vertical-align: middle;text-align: center;width:25%" rowspan="5">My Performance Goals </th>
<th class="column-title" style="vertical-align: middle;text-align: center;width:25%" rowspan="5"> Actions To Be Taken To Achieve The Goal</th>
<th class="column-title" style="vertical-align: middle;text-align: center;width:5%" rowspan="5">Weightage<br>(75%)</th>
<th class="column-title" style="vertical-align: middle;border-bottom: 2px solid #657280;text-align: center;" rowspan="1" colspan="5">Standards of Performance</th>
</tr>
<tr class="headings">
<th class="column-title" style="width:10%; background:#657280;text-align:center">1</th>
<th class="column-title" style="width:10%; background:#657280;text-align:center">2</th>
<th class="column-title" style="width:10%; background:#657280;text-align:center">3</th>
<th class="column-title" style="width:10%; background:#657280;text-align:center">4</th>
<th class="column-title" style="width:10%; background:#657280;text-align:center">5</th>
</tr>
<tr class="headings">
<th class="column-title" style="width:10%; background:#657280;text-align:center" rowspan="3">Unsatisfactory</th>
<th class="column-title" style="width:10%; background:#657280;text-align:center" rowspan="3">Partially Meets Goal</th>
<th class="column-title" style="width:10%; background:#5d8025;text-align:center" rowspan="1">Target</th>
<th class="column-title" style="width:10%; background:#18800f;text-align:center" colspan="2">Ambition</th>
</tr>
<tr class="headings">
<th class="column-title" style="width:10%; background:#657280;text-align:center" rowspan="2">Fully Meets Goal</th>
<th class="column-title" style="width:10%; background:#007e80;text-align:center">Stretch</th>
<th class="column-title" style="width:10%; background:#007e80;text-align:center">Dream</th>
</tr>
<tr class="headings">
<th class="column-title" style="width:10%; background:#657280;text-align:center">Exceeds Goal</th>
<th class="column-title" style="width:10%; background:#657280;text-align:center">Far Exceeds Goal</th>
</tr>

</thead>
<tbody>';
  
  
  
while($row = mysqli_fetch_array($select)){	  

$html.='<tr>   
<td>
'.$row['Objective'].'</td>
<td>'.$row['ActionToBe'].'</td>
<td>'.round($row['Weightage']).'</td>
<td>'.$row['SP1'].'</td>
<td>'.$row['SP2'].'</td>
<td>'.$row['SP3'].'</td>
<td>'.$row['SP4'].'</td>
<td>'.$row['SP5'].'</td>
</tr>';

$w=$w+$row['Weightage'];
}

$html.='<tr>
<td colspan="1"></td>
<td colspan="1"><input style="text-align:center" class="form-control" type="text" value="'.$w.'%" disabled=""></td>      <td colspan="6"></td>
</tr>';
}else{

$html='<div class="alert alert-info"> <span class="vd_alert-icon"><i class="fa fa-info-circle vd_blue"></i></span><strong>User not submit their objectives yet.</div>';
} 

$html.='</tbody>
</table>';

echo $html;

}


elseif($_POST['get_reportee_2']=='get_reportee_2'){



$select=mysqli_query($db,"select o.*,omr.* from tblobjectives o,tblobjectivereview omr where 
				   o.Userid='".$_POST['Userid']."' and 
				   o.OYear='".date('Y')."' and o.Oid=omr.Oid and o.Objective!='BEHAVIORAL COMPETENCIES'");
$num=mysqli_num_rows($select);
if($num>0){
$html=' <table class="table table-striped jambo_table " id="tbl_mid_year_review_self">
<tbody>
</tbody><thead style="background: #41b7de;
color: #ECF0F1;">
<tr class="headings">
<th class="column-title" style="vertical-align: middle;text-align: center;width:40%;">My Performance Goal</th>
<th class="column-title" style="vertical-align: middle;text-align: center;width:40%">Action To Be Taken</th>
<th class="column-title" style="vertical-align: middle;text-align: center;width:10%">Comment on Progress (by Immediate Supervisor)</th>
<th class="column-title" style="vertical-align: middle;text-align: center;width:10%">Deadline</th>
</tr>
</thead><tbody>';
  
  
  
while($row = mysqli_fetch_array($select)){	  


$html.='<tr>
<td>'.$row['Objective'].'</td>
<td>'.$row['ActionToBe'].'</td>
<td>'.$row['OMComments'].'</td>
<td>'.$row['OMDeadline'].'</td>
</tr>';


}

$html.=' </tbody>
</table>'; 
}else{
$html='<form action="controllars/objectives.php?insert=objectives_mid_year&Userid='.$_POST['Userid'].'" id="form" name="form" method="POST">
<table class="table table-striped jambo_table " id="tbl_mid_year_review_self">
<tbody>
</tbody><thead style="background: #41b7de;
color: #ECF0F1;">
<tr class="headings">
<th class="column-title" style="vertical-align: middle;text-align: center;width:40%;">My Performance Goal</th>
<th class="column-title" style="vertical-align: middle;text-align: center;width:40%">Action To Be Taken</th>
<th class="column-title" style="vertical-align: middle;text-align: center;width:10%">Comment on Progress (by Immediate Supervisor)</th>
<th class="column-title" style="vertical-align: middle;text-align: center;width:10%">Deadline</th>
</tr>
</thead><tbody>'; 	 
$select=mysqli_query($db,"select * from tblobjectives where Userid='".$_POST['Userid']."' and 
						OYear='".date('Y')."'");
$num=mysqli_num_rows($select);
if($num>0){
while($row = mysqli_fetch_array($select)){	  
$i=$i+1;
$html.='<tr>
<td>'.$row['Objective'].'</td>
<td>'.$row['ActionToBe'].'</td>
<td><textarea cols="3" rows="1" id="OMComments'.$i.'" name="OMComments'.$i.'" required></textarea></td>
<td><textarea cols="3" rows="1" id="OMDeadline'.$i.'" name="OMDeadline'.$i.'" required></textarea></td>
</tr>';

}	

$html.=' <tr>
<td colspan="2"></td>
<td colspan="2"><input style="text-align:center" class="form-control" type="submit" value="Save"></td>     

</tr>';
}else{
  
 $html.=' <tr>
<td colspan="4"><div class="alert alert-info"> <span class="vd_alert-icon"><i class="fa fa-info-circle vd_blue"></i></span><strong>User not submit their objectives yet.</div></td>


</tr>';  
}
$html.='</tbody>
</table></form>';
} 



echo $html;

}
elseif($_GET["insert"]=="objectives_mid_year"){


$select=mysqli_query($db,"select * from tblobjectives where Userid='".$_GET['Userid']."' and 
						OYear='".date('Y')."'");
while($row = mysqli_fetch_array($select)){	  
$i=$i+1;							
$insert=mysqli_query($db,"insert into tblobjectivereview
(Oid, OYear, OMComments, OMDeadline,OOutComes, OMDateTime, 
Userid
)
values
('".$row['Oid']."', '".date('Y')."', 
'".mysqli_real_escape_string($db,$_POST['OMComments'.$i])."',  
'".mysqli_real_escape_string($db,$_POST['OMDeadline'.$i])."',
'0',
'".date('Y-m-d H:i')."',
'".$_SESSION['UserName']."'
)");

}



$update = mysqli_query($db,"update tblpppstatus 
set MidYear='1',MDate='".date('Y-m-d H:i')."' 
where Userid='".$_GET['Userid']."'");


$select = mysqli_query($db,"select Userid,User_Name,Incharge_Code from tbluserinfodetail where 
Userid='".$_GET['Userid']."'");
$row    = mysqli_fetch_array($select);

$User_Name = $row['User_Name'];



$Notification_Msg='<b> Dear '.$User_Name.'</b> your mid year reviews has been submitted by your incharge.</b>';

$insert = mysqli_query($db,"insert into tblnotifications 
	(Ntype, Userid, Read_Flag, 
	Notification_Msg, 
	NDate
	)
	values
	('Objective', '".$_GET['Userid']."', 
	'0', 
	'".$Notification_Msg."', 
	'".date('Y-m-d')."'
	)");




header("location: ../phase-2.php");



}elseif($_POST['get_reportee_3']=='get_reportee_3'){



$select=mysqli_query($db,"select o.*,omr.* from tblobjectives o,tblobjectivereview omr where 
   o.Userid='".$_POST['Userid']."' and 
   o.OYear='".date('Y')."' and o.Oid=omr.Oid and OOutComes!=''");
$num=mysqli_num_rows($select);

if($num==0){

$html='<form action="controllars/objectives.php?update=objectives_year_end&Userid='.$_POST['Userid'].'" id="form" name="form" method="POST"><table class="table table-striped  jambo_table " style="width: 100% !important;
max-width: 100%;
margin-bottom: 20px;">
<thead style="background: #41b7de;
color: #ECF0F1;">
<tr class="headings">
<th class="column-title" style="vertical-align: middle;text-align: center;width:25%" rowspan="3">My Performance Objectives </th>
<th class="column-title" style="vertical-align: middle;text-align: center;width:25%" rowspan="3">Action To Be Taken </th>
<th class="column-title" style="vertical-align: middle;text-align: center;width:5%" rowspan="3">Weightage<br>(75%)</th>
<th class="column-title" style="vertical-align: middle;border-bottom: 2px solid #657280;text-align: center;" rowspan="1" colspan="5">Standards of Performance</th>
<th class="column-title" style="vertical-align: middle;text-align: center;" rowspan="2">Outcome </th>
<th class="column-title" style="vertical-align: middle;text-align: center;" rowspan="2">Comments </th>
</tr>
<tr class="headings">
<th class="column-title" style="width:8%; background:#657280;text-align:center">1</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">2</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">3</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">4</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">5</th>
</tr>
<tr class="headings">
<th class="column-title" style="width:8%; background:#657280;text-align:center">Unsatisfactory</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">Partially Meets Objectives</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">Fully Meets Objectives</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">Exceeds Objectives</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">Far Exceeds Objectives</th>
<th class="column-title" style="vertical-align: middle;text-align: center;" colspan="2"></th>
</tr>
</thead>
<tbody>';

$select3=mysqli_query($db,"select * from tblobjectives where 
Userid='".$_POST['Userid']."' and 
OYear='".date('Y')."'");

$num2=mysqli_num_rows($select3);
if($num2>0){
while($row = mysqli_fetch_array($select3)){	
$count=$count+1;
$select2=mysqli_query($db,"select * from tblobjectivereview where 
Oid='".$row['Oid']."' and 
OYear='".date('Y')."'");
$row2 = mysqli_fetch_array($select2);
	
$html.='<tr>
	<td>'.$row['Objective'].'</td>
	<td>'.$row['ActionToBe'].'</td>
	<td>'.round($row['Weightage']).'</td>
	<td>'.$row['SP1'].'</td>
	<td>'.$row['SP2'].'</td>
	<td>'.$row['SP3'].'</td>
	<td>'.$row['SP4'].'</td>
	<td>'.$row['SP5'].'</td>
	<td><select id="OOutComes'.$count.'" name="OOutComes'.$count.'" required>
	<option value=""></option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	</select></td>
	<td><textarea cols="3" rows="1" id="OFComments'.$count.'" name="OFComments'.$count.'" required></textarea></td>
	</tr>';

}


$html.='

<tr>   

<td colspan="10" style="text-align:center;">BEHAVIORAL COMPETENCIES</td>

</tr>


<tr>   

<td colspan="2" style="text-align:right;"><select id="Punctuality" name="Punctuality" required style="width:200px;">
	<option value="">Punctuality</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	</select></td>
<td colspan="2"><select id="Adaptability" name="Adaptability" required>
	<option value="">Adaptability</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	</select></td>
<td colspan="2"><select id="Team_Work" name="Team_Work" required>
	<option value="">Team Work</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	</select></td>
<td colspan="2"><select id="Response_Time" name="Response_Time" required>
	<option value="">Response Time</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	</select></td>
<td colspan="2"><select id="Self_Initiation" name="Self_Initiation" required>
	<option value="">Self initiation</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	</select></td>

</tr>


<tr>
<td colspan="2"></td>
<td colspan="6"><input style="text-align:center" class="form-control" type="submit" value="Save"></td>     
<td colspan="2"></td>
</tr>';

}else{
 $html.=' <tr>
<td colspan="10"><div class="alert alert-info"> <span class="vd_alert-icon"><i class="fa fa-info-circle vd_blue"></i></span><strong>User not submit their objectives yet.</div></td>


</tr>';

}
$html.='</tbody>
</table></form>
';
echo $html;


}else{

$html='<table class="table table-striped  jambo_table " style="width: 100% !important;
max-width: 100%;
margin-bottom: 20px;">
<thead style="background: #41b7de;
color: #ECF0F1;">
<tr class="headings">
<th class="column-title" style="vertical-align: middle;text-align: center;width:25%" rowspan="3">My Performance Objectives </th>
<th class="column-title" style="vertical-align: middle;text-align: center;width:25%" rowspan="3">Action To Be Taken </th>
<th class="column-title" style="vertical-align: middle;text-align: center;width:5%" rowspan="3">Weightage<br>(100%)</th>
<th class="column-title" style="vertical-align: middle;border-bottom: 2px solid #657280;text-align: center;" rowspan="1" colspan="5">Standards of Performance</th>
<th class="column-title" style="vertical-align: middle;text-align: center;" rowspan="2">Outcome </th>
<th class="column-title" style="vertical-align: middle;text-align: center;" rowspan="2">Comments </th>
</tr>
<tr class="headings">
<th class="column-title" style="width:8%; background:#657280;text-align:center">1</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">2</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">3</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">4</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">5</th>
</tr>
<tr class="headings">
<th class="column-title" style="width:8%; background:#657280;text-align:center">Unsatisfactory</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">Partially Meets Objectives</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">Fully Meets Objectives</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">Exceeds Objectives</th>
<th class="column-title" style="width:8%; background:#657280;text-align:center">Far Exceeds Objectives</th>
<th class="column-title" style="vertical-align: middle;text-align: center;" colspan="2"></th>
</tr>
</thead>
<tbody>';

$select=mysqli_query($db,"select * from tblobjectives where 
Userid='".$_POST['Userid']."' and 
OYear='".date('Y')."'");


while($row = mysqli_fetch_array($select)){	
$count=$count+1;
$select2=mysqli_query($db,"select * from tblobjectivereview where 
Oid='".$row['Oid']."' and 
OYear='".date('Y')."'");
$row2 = mysqli_fetch_array($select2);

if($row['Objective']=='BEHAVIORAL COMPETENCIES'){
    
    $h1='Punctuality<br>';
    $h2='Adaptability<br>';
    $h3='Team_Work<br>';
    $h4='Response_Time<br>';
    $h5='Self_Initiation<br>';
}else{
    
    $h1='';
    $h2='';
    $h3='';
    $h4='';
    $h5='';
}


	
$html.='<tr>
	<td>'.$row['Objective'].'</td>
	<td>'.$row['ActionToBe'].'</td>
	<td align="center">'.round($row['Weightage']).'</td>
	<td align="center">'.$h1.$row['SP1'].'</td>
	<td align="center">'.$h2.$row['SP2'].'</td>
	<td align="center">'.$h3.$row['SP3'].'</td>
	<td align="center">'.$h4.$row['SP4'].'</td>
	<td align="center">'.$h5.$row['SP5'].'</td>
	<td align="center">'.$row2['OOutComes'].'</td>
	<td>'.$row2['OFComments'].'</td>
	</tr>';
$w=$w+$row['Weightage'];
$oc=($row['Weightage'] / 5) * $row2['OOutComes'];
$foc=$foc + $oc;

}
$html.='<tr>
	<td colspan="2" align="right">Total Weightage</td>
	<td>'.round($w).'%</td>
	<td></td>
	<td></td>
	<td></td>
	<td colspan="2" align="right">Total Marks</td>
	<td align="center">'.$foc.'%</td>
	<td></td>
	</tr>';
$html.='</tbody>
</table>
';
echo $html;		

}




}elseif($_GET["update"]=="objectives_year_end"){


$select3=mysqli_query($db,"select * from tblobjectives where 
Userid='".$_GET['Userid']."' and 
OYear='".date('Y')."'");

while($row = mysqli_fetch_array($select3)){	
$count=$count+1;
$select2=mysqli_query($db,"select * from tblobjectivereview where 
Oid='".$row['Oid']."' and OYear='".date('Y')."'");
$row2 = mysqli_fetch_array($select2);

	$update = mysqli_query($db,"update tblobjectivereview set OOutComes='".$_POST['OOutComes'.$count]."',
	                            OFComments='".$_POST['OFComments'.$count]."'  where OMid='".$row2['OMid']."'");
	
}


$insert=mysqli_query($db,"insert into tblobjectives
(Userid, OYear, Objective, ActionToBe, Weightage, 
SP1, 
SP2, 
SP3, 
SP4, 
SP5
)
values
('".$_GET['Userid']."', '".date('Y')."', 
'BEHAVIORAL COMPETENCIES',  
'',
'25',
'".mysqli_real_escape_string($db,$_POST['Punctuality'])."',
'".mysqli_real_escape_string($db,$_POST['Adaptability'])."',
'".mysqli_real_escape_string($db,$_POST['Team_Work'])."',
'".mysqli_real_escape_string($db,$_POST['Response_Time'])."',
'".mysqli_real_escape_string($db,$_POST['Self_Initiation'])."'
)");

$OOutComes =  $_POST['Punctuality']  + $_POST['Adaptability']  +
              $_POST['Team_Work']  + $_POST['Response_Time']  +
              $_POST['Self_Initiation'] ;
             
$OOutComes = ( $OOutComes / 5 );       

$select=mysqli_query($db,"select * from tblobjectives where Userid='".$_GET['Userid']."' and OYear='".date('Y')."' and Objective='BEHAVIORAL COMPETENCIES'");

$row=mysqli_fetch_array($select);


$insert=mysqli_query($db,"insert into tblobjectivereview
(Oid, OYear, OMComments, OMDeadline, OOutComes, 
OMDateTime, 
Userid
)
values
('".$row['Oid']."', '".date('Y')."', 
'',  
'',
'".$OOutComes."',
'".date('Y-m-d H:i')."',
'".$_SESSION['UserName']."'
)");





$update = mysqli_query($db,"update tblpppstatus 
set YearEnd='1',YDate='".date('Y-m-d H:i')."' 
where Userid='".$_GET['Userid']."'");


$select = mysqli_query($db,"select Userid,User_Name,Incharge_Code from tbluserinfodetail where 
Userid='".$_GET['Userid']."'");
$row    = mysqli_fetch_array($select);

$User_Name = $row['User_Name'];



$Notification_Msg='<b> Dear '.$User_Name.'</b> your year end reviews has been submitted by your incharge.</b>';

$insert = mysqli_query($db,"insert into tblnotifications 
	(Ntype, Userid, Read_Flag, 
	Notification_Msg, 
	NDate
	)
	values
	('Objective', '".$_GET['Userid']."', 
	'0', 
	'".$Notification_Msg."', 
	'".date('Y-m-d')."'
	)");

header("location:../phase-3.php");
}



?>