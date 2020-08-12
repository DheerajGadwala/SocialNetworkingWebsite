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
if(isset($_SESSION['global_email']))
{
	//echo $_SESSION['global_email'];
	$email= $_SESSION['global_email'];
	$sql="SELECT * FROM USERS WHERE email = '".$email."'";
	$result = $con->query($sql);
	$row = $result->fetch_assoc();
	$fn=$row['fname'];
	$ln=$row['lname'];
	$am=$row['about_me'];
	$dob=$row['dob'];
	$gender=$row['gender'];
	$em=$row['email'];
	$pic=$row['pic_loc'];
	} 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	echo "success";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$_SESSION['v1']=0;
	header ("Location: profile_edit.php"); exit();
	}}
	?>

<head>
<title>TieIn</title>
<link rel="shortcut icon" type="image/x-icon" href="assets\imgs\logo.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/style.css"/>
<link rel="stylesheet" href="assets/css/admin.css"/>

<style type="css">
</style>
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

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="profileBox">	
	
<img class ="imgprop" src="<?php echo $pic;?>">
</div>
<div class="protexBox"> 
	<br><br>
<h4 align = center><?php echo$fn." ".$ln?></h4>
    
</br>    
<div>
	
<h5>Status</h5><br>                         
<p align = center> <h4><?php echo $am?></h4>
<br><br>
<table class="table table-striped">
<tr><h5><td>contact me:</td><td><?php echo $em;?></td></h5></tr>
<tr><h5><td>gender:</td><td><?php echo $gender;?></td></h5></tr>
<tr><h5><td>date of birth:</td><td><?php echo $dob;?></td></h5></tr>
<div id="mydiv"></div>
</table>
<br><br>

<input type="submit" value="update your profile"  name="upd" id="upd" class="btn btn-success input-lg">
<br><br>
</form>
<br>
<br>
<form method="post"  enctype="multipart/form-data" action = "posting.php">
<h5>What's on your mind: </h5>
<p align = center> <h4><textarea rows="7" cols="80" name="post_content"></textarea></h4></p>
<input style="border:none" type="file" name="post_attachement" id="post_attachement">
<br><br><br>
<input type="submit" value="POST"  name="post1" id="post1" class="btn btn-success input-lg">
<br>
</form>

<br><br>
<form>
<div class='container-fluid' style='width:700px;border:1px solid brown;'>
	<br>
<h5>Your Posts: </h5><br>

<?php

$sql = "select * from posts where uid='$email' order by pid desc;";

$str="";
$datac=mysqli_query($con,$sql);
$dataa=$datac->fetch_array();
$result = $con->query($sql);
while($row = $result->fetch_assoc())
{
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
						<div class='col-sm-12'>".$row['content']."<br><br><br><img style = 'display: block;margin-left: auto;margin-right: auto;width: 50%;' width='300px' height='275px' src='".$row['location']."'><br>
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
	$_SESSION['friend_request']="Enter a mail address to send a tie in request";
?>
</div>
</form>
<br><br>
</p>
</div>
</div>
             
</body>
</html>
