

<?php

$sqlq1 = "select * from tieins where (uid_1='".$_SESSION['global_email']."' and conf_1=1 and conf_2=0);";
$sqlq2 = "select * from tieins where (uid_2='".$_SESSION['global_email']."' and conf_2=1 and conf_1=0);";
$resultq1 = $con->query($sqlq1);
$resultq2 = $con->query($sqlq2);
$strq="";
while($rowq1 = $resultq1->fetch_assoc()){
	$sqlsubq1="select * from users where uid='".$row['uid_2']."'";
	$resultsubq1 = $con->query($sqlsubq1);
	$rowsubq1 = $resultsubq1->fetch_assoc();
	$strq=$strq."
	
	<div style='width =1100px' align='center'>
<div style='width: 700px;' align='center'>	
<table style='width:100%' class='table table-striped' align='center'>
<tr>
<td><strong>Email</strong></td>
<td></td>
<td><input name='accept' value = 'Accept' type='button' class='btn btn-success input-lg'></td>
<td><input name='reject' value = 'Reject' type='button' class='btn btn-success input-lg'></td>
</tr>
</table>
</div>
</div>
	
	
	";
	
	}
while($rowq2 = $resultq2->fetch_assoc();){}





?>
