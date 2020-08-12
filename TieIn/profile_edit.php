<!DOCTYPE html>
<?php
session_start();

	
$user='root';
$pass='';
$con = mysqli_connect('localhost',$user,$pass);
$error="";
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
	$ps=$row['pass'];
	$pic=$row['pic_loc'];
	} 
	?>

<html>
<?php
if(isset($_POST['upd2']))
{
	
	
	$fn = $_POST['upfn'];
	$ln = $_POST['upln'];
	//$pass = $_POST['upps'];
	$dob = $_POST['updb'];
	$gender = $_POST['upgn'];
	$uname = $_POST['upfn']."_".$_POST['upln'];
	$upst = $_POST['abme'];
	if(!empty($_FILES['upimg']['name'])){
	$im_name=$_FILES['upimg']['name'];
	$im_tmp=$_FILES['upimg']['tmp_name'];
	$im_type=$_FILES['upimg']['type'];
	$var1 = explode('.',$_FILES['upimg']['name']);
	$var2 = end($var1);
	$im_ext=strtolower($var2);
	$extensions= array("jpeg","jpg","png");
	$fin_im="assets/imgs/".$im_name;		
	if(in_array($im_ext,$extensions)=== false){
         $error="*extension not allowed, please choose a JPEG or PNG file.";
         $fin_im=$pic;
      }
      else
      {move_uploaded_file($im_tmp,$fin_im);}}
     else{
		 $fin_im=$pic;
		 }
     if(empty($error)==true){
         
        $sql="update users set fname='$fn', lname='$ln', dob='$dob', gender='$gender', about_me=\"$upst\", pic_loc='$fin_im' where uid = '$email'";
        //echo "<br>".$sql."<br>";
		if($result = $con->query($sql))
		{
		header ("Location: profile_template.php"); exit();
		}
		else
		{echo mysqli_error($con);}
	}
      else{
		  
         $error="*extension not allowed, please choose a JPEG or PNG file.";
      }}
	//$uppth='assets/imgs/'.$im;	
	//move_uploaded_file($im,$uppth);
	//copy($_FILES['upimg']['name'],'assets/imgs/'.$_FILES['upimg']['name']);
	//echo $im." bum ".realpath($im);
?>
<head>
<title>TieIn</title>
<link rel="shortcut icon" type="image/x-icon" href="assets\imgs\logo.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/style.css"/>
<link rel="stylesheet" href="assets/css/admin.css"/>
<link rel="stylesheet" type="text/css" href="assets/css/pop_up.css">
<style type="css">
.error {color: #FF0000;}
</style>
</head>
<body>
<script>
	$(document).ready(function () {
	$("input[type='image']").click(function() {
    $("input[id='fileToUpload']").focus().click();});
});
</script> 
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
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" > 
<div class="profileBox">
	<label for="image">
	<input style="border:none" type="file" name="upimg" id="fileToUpload" style="display: none;">
	<input type="image" class ="imgprop" src="<?php echo $pic;?>">	
	</label>
</div>

<div class="protexBox">
<br><br>
<h4 align = center><input type="text" value="<?php echo $fn;?>" name="upfn"><?php echo" ";?><input type="text" value="<?php echo $ln;?>" name="upln"></h4>
</br>    
<div>
<h5>Status</h5><br>                         
<p align = center> <h4><textarea rows="4" cols="50" name="abme"><?php echo $am?></textarea></h4></p>
<h5>contact me @    <input type="text" value="<?php echo $em;?>" name="upem" disabled></h5>
<h5>gender: 	 	<input type="text" value="<?php echo $gender;?>" name="upgn"></h5>
<h5>date of birth:  <input type="text" value="<?php echo $dob;?>" name="updb"></h5>
                <br><br>
                <span class="li01"><button onclick="showDiv()" class="btn btn-success input-lg" name="set1">Change Password</button></span>

        <?php 
        if(isset($_POST['set1']))
			$_SESSION['v1']=1;
        if(!$_SESSION['v1']==0)        
                include('pass_change.php');

        ?>
<div id="mydiv"></div>
<br><br>
<input type="submit" value="update"  name="upd2" id="upd2" class="btn btn-success input-lg">
<span class="error"><?php echo "<br>".$error; ?></span>
<br><br><br>
</form>


</div>
</div>
<script>
	function showDiv() {
			document.getElementById('pass_change').style.display = "block";
}
	</script>
</body>
</html>
