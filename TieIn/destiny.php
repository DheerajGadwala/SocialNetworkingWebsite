<?php
echo"yo";
$fnameErr = $lnameErr = $emailErr = $genderErr = $websiteErr = "";
if(isset($_POST['submit'])){
	$a=0;
	echo"yo";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "Name is required";$a=1;echo"please enter lname";
  }
   if (empty($_POST["lname"])) {
    $lnameErr = "Name is required";$a=1;
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";$a=1;
  }
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";$a=1;
  }
  if($a==0)
  { header("Location:db_ins.php");
  exit();
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
