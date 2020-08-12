<!DOCTYPE html>
<html>
	<?php
	session_start();
	$user='root';
$pass='';
$con = mysqli_connect('localhost',$user,$pass);
if(!$con)
{
	echo'Not Connected To Server';
	}
	
if(!mysqli_select_db($con,'iwp_1'))
{
	echo'Database not selected';
	}
	?>
<head>
<title>Tie In</title>
<link rel="shortcut icon" type="image/x-icon" href="assets\imgs\logo.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/style.css"/>
<link rel="stylesheet" href="assets/css/admin.css"/>
<style>
.box{
background: rgba(255,255,255,1);
padding: 10px 20px;
border-radius: 2px;
box-shadow: 0px 0px 15px 5px rgba(0,0,0,0.4);
}
			
</style>
   
</head>
<body>
<div class="header no-shadow">
<div class="container-fluid">
<div class="row">
<div class="col-sm-4">
<div class="logo">
<h1><a href="./dashboard.php">TieIn</a></h1>
</div>
</div>
<div class="col-sm-8">
<ul class="header-menu pull-right">
<li><a href="tieins.php" class="">TieIns</a></li>
<li><a href="dashboard.php" class="">Dashboard</a></li>
<li><a href="profile_template.php" class="">Profile</a></li>
<li><a href="messages.php" class="">Messages</a></li>
<li><a href="login.php" class="">Log Out</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="main">
<div class="container-fluid">
<div class="row" style='width =1100px'>
<div class="col-sm-3 left-sidebar" style='width: 200px; float: left;'>
<ul>
<li><a href="./profile_edit.php" class="active">Settings</a></li>
<li><a href="./index.php">Logout</a></li>
</ul>
</div>
<div class="col-sm-6" style='width: 700px; float: left;'>
<form method = 'post' action='sendreq.php'>
<table style="width:100%" class="table table-striped">
<tr><td colspan=3><b>Send a TieIn request</b></td></tr>
<tr>
<td><strong>Email</strong></td>
<td><input id="newfriend" name="newfriend" type="text"></td>
<td><input name="add_friend" value = "Tie In" type="submit" class="btn btn-success input-lg"></td>
</tr>
<tr><td colspan=3><?php echo $_SESSION['friend_request'];?></td></tr>
</table>
</form>
</div>
<div class="col-sm-3 chat-users" style='width: 200px; float: left;'>
<div class="row">
<h3>Tie Ins</h3>
</div>
<div class="row">
<?php
	
	$sql8 = "select * from tieins where uid_1= '".$_SESSION['global_email']."' and conf_1=1 and conf_2=1;";
	$sql9 = "select * from tieins where uid_2= '".$_SESSION['global_email']."' and conf_1=1 and conf_2=1;";
	$result4 = $con->query($sql8);
	$result5 = $con->query($sql9);
	$str4="";
	//echo $sql8."<br>".$sql9;
	while($row5 = $result4->fetch_assoc())
	{
		$emxyz=$row5['uid_2'];
		$result7 = $con->query("select * from users where uid ='$emxyz';");
		$row4 = $result7->fetch_assoc();
		$email4=$row4['uid'];
		$fn4=$row4['fname'];
		$ln4=$row4['lname'];
		$am4=$row4['about_me'];
		$dob4=$row4['dob'];
		$gender4=$row4['gender'];
		$em4=$row4['email'];
		$pic4=$row4['pic_loc'];
		$str4=$str4."
		<div class='col-sm-12 chat-user online' style='width:250px'>
		<a href='profile_visit.php?visem=$email4'>
		<img src='$pic4' class='pull-left'/>
		&nbsp;
		$fn4"." "."$ln4
		</a>
		</div>
		
		
		";
		
}
while($row5 = $result5->fetch_assoc())
	{
		$emxyz=$row5['uid_1'];
		$result7 = $con->query("select * from users where uid ='$emxyz';");
		$row4 = $result7->fetch_assoc();
		$email4=$row4['uid'];
		$fn4=$row4['fname'];
		$ln4=$row4['lname'];
		$am4=$row4['about_me'];
		$dob4=$row4['dob'];
		$gender4=$row4['gender'];
		$em4=$row4['email'];
		$pic4=$row4['pic_loc'];
		$str4=$str4."
		<div class='col-sm-12 chat-user online' style='width:250px'>
		<a href='profile_visit.php?visem=$email4'>
		<img src='$pic4' class='pull-left'/>
		&nbsp;
		$fn4"." "."$ln4
		</a>
		</div>
		
		
		";
		
}
echo $str4;
	?>
</div>
</div>
</div>
<br><br><br><br>
<?php
$sqlq1 = "select * from tieins where (uid_1='".$_SESSION['global_email']."' and conf_1=0 and conf_2=1);";
$sqlq2 = "select * from tieins where (uid_2='".$_SESSION['global_email']."' and conf_2=0 and conf_1=1);";
$resultq1 = $con->query($sqlq1);
$resultq2 = $con->query($sqlq2);
$strq=

"<div style='width =1100px' align='center'>
<div style='width: 700px;' align='center'>	
<table style='width:100%' class='table table-striped' align='center'>
<tr><td colspan=4><b>People who want to TieIn with you</b></td></tr>";

while($rowq1 = $resultq1->fetch_assoc()){
	$sqlsubq1="select * from users where uid='".$rowq1['uid_2']."'";
	$resultsubq1 = $con->query($sqlsubq1);
	$rowsubq1 = $resultsubq1->fetch_assoc();
	$strq=$strq."
<tr>
<td><strong>".$rowsubq1['uid']."</strong></td>
<td>".$rowsubq1['fname']." ".$rowsubq1['lname']."</td>
<td><a href='accreq1.php?id=".$rowsubq1['uid']."'><input name='accept".$rowsubq1['uid']."' value = 'Accept' type='button' class='btn btn-success input-lg'></a></td>
<td><a href='rejreq1.php?id=".$rowsubq1['uid']."'><input name='reject".$rowsubq1['uid']."' value = 'Reject' type='button' class='btn btn-success input-lg'></a></td>
</tr>
	";
	
	}
while($rowq2 = $resultq2->fetch_assoc()){
	
	$sqlsubq2="select * from users where uid='".$rowq2['uid_1']."'";
	$resultsubq2 = $con->query($sqlsubq2);
	$rowsubq2 = $resultsubq2->fetch_assoc();
	$strq=$strq."
<tr>
<td><strong>".$rowsubq2['uid']."</strong></td>
<td>".$rowsubq2['fname']." ".$rowsubq2['lname']."</td>
<td><a href='accreq2.php?id=".$rowsubq2['uid']."'><input name='accept".$rowsubq2['uid']."' value = 'Accept' type='button' class='btn btn-success input-lg'></a></td>
<td><a href='rejreq2.php?id=".$rowsubq2['uid']."'><input name='reject".$rowsubq2['uid']."' value = 'Reject' type='button' class='btn btn-success input-lg'></a></td>
</tr>
	";
	}
$strq=$strq."
<tr><td colspan=4></td></tr>
</table>
</div>
</div>";
echo $strq;
?>
</div>
</div>
</div>
</div>
</body>
</html>
