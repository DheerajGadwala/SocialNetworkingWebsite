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
<title>TieIn dashboard..</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/style.css"/>
<link rel="stylesheet" href="assets/css/admin.css"/>

			
</head>
<body>

<div class="header no-shadow">
<div class="container-fluid">
<div class="row">
<div class="col-sm-4">
<div class="logo">
<h1>TieIn</h1>
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
<div class="main" style='width:1200px;'>

<div class="col-sm-3 left-sidebar pull-left" style='width:200px;float: left;'>
<ul>
<li><a href="https://indiatimes.com">India Times</a></li>
<li><a href="./profile_edit.php" class="active">Settings</a></li>
<li><a href="./index.php">Logout</a></li>
</ul>	
</div>
<div class='container-fluid' style='width:700px;border:1px solid brown;float: left;'>
	<?php

$sql = "select * from posts order by pid desc;";

$str="";
$datac=mysqli_query($con,$sql);
$dataa=$datac->fetch_array();
$result = $con->query($sql);
while($row = $result->fetch_assoc())
{
	$email=$row['uid'];
	$sql="SELECT * FROM USERS WHERE email = '".$email."'";
	$result1 = $con->query($sql);
	$row1 = $result1->fetch_assoc();
	$fn=$row1['fname'];
	$ln=$row1['lname'];
	$am=$row1['about_me'];
	$dob=$row1['dob'];
	$gender=$row1['gender'];
	$em=$row1['email'];
	$pic=$row1['pic_loc'];
	$var1 = explode('.',$row['location']);
	$var2 = end($var1);
	$fl_ext=strtolower($var2);
	$extensions1= array("jpeg","jpg","png");
	$extensions2= array("mp4");
	if(in_array($fl_ext,$extensions1)=== true){
	$str=$str."
	<div class='main'>
		<div class='container-fluid' style='border-color:brown;width:600px;'>
			<div class='col-sm-12' style='border-color:brown;width:600px;' >
				<div class='post col-sm-12' style='border-color:brown;width:600px;'>
					<div class='row post-heading'  style='border-color:brown;width:600px;'>
						<div class='col-sm-12' style='border-color:brown;'>
								<img src=$pic class='profile-picture pull-left'/>&nbsp;
								<span class='post-user-name'>".$fn." ".$ln."</span><br/>&nbsp;
								<span class='pull-right'>".$row['time']."</spanspan><br/>&nbsp;
						</div>
					</div>
					
					<div class='row post-body'>
						<div class='col-sm-12'>".$row['content']."<br><br><br><img style='display: block;margin-left: auto;margin-right: auto;width: 50%;' width='300px' height='275px' src='".$row['location']."'><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
";}
/*	else if(in_array($fl_ext,$extensions2)=== true)
	{
	$str=$str."
	<div class='main'>
		<div class='container-fluid' style='border-color:brown;width:600px;'>
			<div class='col-sm-12' style='border-color:brown;width:600px;' >
				<div class='post col-sm-12' style='border-color:brown;width:600px;'>
					<div class='row post-heading'  style='border-color:brown;width:600px;'>
						<div class='col-sm-12' style='border-color:brown;'>
								<img src=$pic class='profile-picture pull-left'/>&nbsp;
								<span class='post-user-name'>".$fn." ".$ln."</span><br/>&nbsp;
								<span class='pull-right'>".$row['time']."</spanspan><br/>&nbsp;
						</div>
					</div>
					
					<div class='row post-body'>
						<div class='col-sm-12'>".$row['content']."<br><br><br><video controls width='400px' height='275px'><source src='".$row['location']."' type='video/mp4'  ></video><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
";		
		
		
		}*/
	else{
		$str=$str."
	<div class='main'>
		<div class='container-fluid'>
			<div class='col-sm-12' style='border-color:brown;width:600px;' >
				<div class='post col-sm-12' style='border-color:brown;width:600px;'>
					<div class='row post-heading'  style='border-color:brown;width:600px;'>
						<div class='col-sm-12' style='border-color:brown; width:600px;width:600px;'>
								<img src=$pic class='profile-picture pull-left'/>&nbsp;
								<span class='post-user-name'>".$fn." ".$ln."</span><br/>&nbsp;
								<span class='pull-right'>".$row['time']."</spanspan><br/>&nbsp;
						</div>
					</div>
					
					<div class='row post-body'>
						<div class='col-sm-12'>".$row['content']."<br><br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
";
		}
	}
	echo $str;
?>
</div>
<div class="col-sm-3 chat-users" style='width:200px;'>
<div class="row">
<h3>Other Users</h3>
</div>
<div class="row">

<?php
	
	$sql = "select * from users where uid != '".$_SESSION['global_email']."';";
	$datac2=mysqli_query($con,$sql);
	$dataa2=$datac2->fetch_array();
	$result2 = $con->query($sql);
	$str1="";
	while($row2 = $result2->fetch_assoc())
	{
		
		$email2=$row2['uid'];
		$fn2=$row2['fname'];
		$ln2=$row2['lname'];
		$am2=$row2['about_me'];
		$dob2=$row2['dob'];
		$gender2=$row2['gender'];
		$em2=$row2['email'];
		$pic2=$row2['pic_loc'];
		$str1=$str1."
		<div class='col-sm-12 chat-user online' style='width:250px'>
		<a href='profile_visit.php?visem=$email2'>
		<img src='$pic2' class='pull-left'/>
		&nbsp;
		$fn2"." "."$ln2
		</a>
		</div>
		
		
		";
		
}
echo $str1;
	?>


</div>
</div>

</div>

</body>
</html>
