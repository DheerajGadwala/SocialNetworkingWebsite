<!DOCTYPE html>
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
$_POST['error']="";
$_POST['E']=1;
$fnameErr = $lnameErr = $emailErr = $genderErr = $passErr = $dobErr = "";
$a=1;
if(isset($_POST['submit'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "*First Name is required"."<br>";$a=0;
  }
   if (empty($_POST["lname"])) {
    $lnameErr = "*Last Name is required"."<br>";$a=0;
  }
  if (empty($_POST["email"])) {
    $emailErr = "*Email is required"."<br>";$a=0;
  }
  if (empty($_POST["sex"])) {
    $genderErr = "*Gender is required"."<br>";$a=0;
  }
  if (empty($_POST["password"])) {
    $passErr = "*Password is required"."<br>";$a=0;
  }
  if (empty($_POST["datecal"])) {
    $dobErr = "*Birthdate is require"."<br>";$a=0;
  }
  if($a==1)
  { 	
$fn = $_POST['fname'];
$ln = $_POST['lname'];
$email = $_POST['email'];
$pass = $_POST['password'];
$uid = $_POST['email'];
$dob = $_POST['datecal'];
$gender = $_POST['sex'];
$uname = $_POST['fname']."_".$_POST['lname'];
$sql = "SELECT * FROM USERS WHERE email = '".$email."'";
$result = $con->query($sql);
$b=0;
while ($row = $result->fetch_assoc()) {
    $b=1;
}
if ($b==0){
$_POST['error']="";
$_POST['E']=0;
$sql = "INSERT INTO USERS VALUES('$uid','$uname','$pass','$fn','$ln','$email','$dob','$gender','','assets/imgs/default_profile.png');";
$con->query($sql);
$con->query("commit");
}
else{$_POST['E']=1;$_POST['error']="Email already exists.<br>";}
}

}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<html>
<head>
<title>TieIn - The Social Network</title>
<link rel="shortcut icon" type="image/x-icon" href="assets\imgs\logo.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/style.css"/>
<style>
.error {color: #FF0000;}
.signup-form{
background: rgba(255,255,255,1);
padding: 10px 20px;
border-radius: 2px;
box-shadow: 0px 0px 15px 5px rgba(0,0,0,0.4);
}
</style>
<script>
function validateEmail(email) 
{
var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
return re.test(String(email).toLowerCase());
}
function abc()
{
var x = getElementById("email1").value;
var mailformat=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(mailformat.test(x))
{
alert("You Entered the Valid email address!");
}
else
{
alert("You have entered an invalid email address!");
}



var pass1=document.myform.password.value;
if(pass1==null||pass1=="")
{
alert("password can't be blank");
return false;
}
else if(password.length<8)
{
alert("Password must be at least 8 characters long.");
return false;

}
}
</script>
</head>
<body>
<div class="header">
<div class="container-fluid">
<div class="row">
<div class="col-sm-4">
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
<div class="pull-left text-center col-sm-7">
<div style="display:none">
<h3 class="text-primary">Dostibook helps you connect and share with the people in your life.</h3>
<img src="assets/imgs/globe.png" class="img-responsive"/>                            
</div>
</div>
<div class="pull-right col-sm-5">
<div class="signup-form">
<h1>Create a new account</h1>
<p class="h3">Social Networking Platform.</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="form-group">
<input type="text" placeholder="First Name" name="fname" class="input-lg col-sm-6"> 
<input type="text" placeholder="Last Name" name="lname" class="input-lg col-sm-6">
</div>
<div class="form-group">
<input type="email" placeholder="Email Address" id ="email1" name="email" class="input-lg col-sm-12" >
</div>
<div class="form-group">
<input type="password" placeholder="New Password" id="pass1" name="password" class="input-lg col-sm-12" >

</div>
<div class="form-group">
<p style="font-size:20px">Birthday</p>

<input type="date" id="myDate" name="datecal" value="n">

<p id="demo"></p>

<script>
function myFunction() {
  var x = document.getElementById("myDate").value;
  document.getElementById("demo").innerHTML = x;
}
</script>
<div class="form-group">
<label for="sex_male" class="input-lg">
<input type="radio" name="sex" value="male" id="sex_male"> Male
</label>
<label for="sex_female" class="input-lg">
<input type="radio" name="sex" value="female" id="sex_female"> Female
</label>
</div>
<div class="form-group">
<small class="text-mute">By clicking Create Account, you agree to our Terms and confirm that you have read our Data Policy, including our Cookie Use Policy. You may receive SMS message notifications from TieIn and can opt out at any time.</small>
</div>
<div  class="form-group">
								
<input type="submit" value="Sign up"  name="submit" class="btn btn-success input-lg" ></a>				

		   
<a href="login.php" type="submit" class="btn btn-success input-lg"  >Login</a>
<br><br>
<span class="error"><?php echo $_POST['error'];$_POST['error']="";
?><?php echo $fnameErr;?><?php echo $lnameErr;?><?php echo $emailErr;?><?php echo $genderErr;?><?php echo $passErr;?><?php echo $dobErr;?></span>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-12">
&copy; TieIn 2019.

<?php 
if($_POST['E']==0)
{
	echo "<script type='text/javascript'>alert('Registered Successfully');</script>";
	$_POST['E']=1;
}

?>
</div>
        
</body>
</html>

