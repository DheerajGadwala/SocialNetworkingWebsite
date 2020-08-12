<?php
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
<!DOCTYPE html>
<html>
<head>
<title>TieIn - The Social Network</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/style.css"/>
<style>
.login-form{
background: rgba(255,255,255,1);
padding: 10% 20px;
border-radius: 2px;
box-shadow: 0px 0px 15px 5px rgba(0,0,0,0.4);
}
.main{
min-height:100vh;
padding:10% 0px;
}
</style>



</head>
<body>
<div class="header">
<div class="container-fluid">
<div class="row">
<div class="col-sm-9">
<div class="logo">
<h1>TieIn</h1>
</div>
</div>
                
</div>
</div>
</div>
<div class="main">
<div class="container-fluid">
<div class="row">
<div class="pull-left text-center col-sm-3">
</div>
<div class="pull-right col-sm-6 text-center">
<div class="login-form" style="background-color: rgba(255, 255, 255, .70)">
<p class="h3">Log in to TieIn</p>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" href="dashboard.php" method="post" style="max-width:400px;margin:0px auto;">
<div class="form-group">
<input type="email" name="email" placeholder="Email" id = "email" class="input-lg col-sm-12"/>
</div>
<div class="form-group">
<input type="password" placeholder="Password" name="pwd" id = "password" class="input-lg col-sm-12"/>
</div>
<div class="form-group">


<input type="submit" name="submit" value="Login" id="submit" class="btn btn-success input-lg col-sm-12" />

<br>
<br>
<br><br><br>
<a href="index.php">Signup for TieIn</a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="footer">
<div class="container-fluid">
</div>
</div>
<?php
if(isset($_POST['submit']))
{
	if(!empty($_POST['email']) && !empty($_POST['pwd'])){
	$email=$_POST['email'];
	//$pass=$_POST['pwd'];
	$sql = "SELECT * FROM USERS WHERE email = '".$email."'";
	$passa=mysqli_query($con,"select password('".$_POST['pwd']."')");
	$pass=$passa->fetch_array();
	$result = $con->query($sql);
	$a=0;
	if ($row = $result->fetch_assoc()) {$a=1;}
	echo $pass[0];
	if($a==1){if($row["pass"]===$pass[0]){echo "<script type='text/javascript'>alert('Login Succesful');</script>";
		
session_start();
		$_SESSION['global_email']=$_POST['email'];
		header ("Location: profile_template.php"); exit();
		}
	else{echo "<script type='text/javascript'>alert('Please enter the correct password');</script>";}}
	else{echo "<script type='text/javascript'>alert('No Account exists by the given e-mail');</script>";}
	}
	else{echo "<script type='text/javascript'>alert('Please enter your login credentials');</script>";}}
?>
</body>
</html>
