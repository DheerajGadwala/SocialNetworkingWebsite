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
	
	$idq =$_GET['id'];
	
	$sql = "update tieins set conf_1=1 where (uid_1='".$_SESSION['global_email']."' and uid_2='$idq')";
	$con->query($sql);
	
	header ("Location: tieins.php"); exit();
	
	?>
