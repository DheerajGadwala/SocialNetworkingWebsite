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
if(isset($_POST['newfriend']))
{
	$email=$_POST['newfriend'];
	$gemail=$_SESSION['global_email'];
	$sql1 = "select * from tieins where (uid_1='$email' and uid_2='$gemail');";
	$sql2 = "select * from tieins where (uid_1='$gemail' and uid_2='$email');";
	$sql12 = "select COUNT(*) from tieins where (uid_1='$email' and uid_2='$gemail');";
	$sql22 = "select COUNT(*) from tieins where (uid_1='$gemail' and uid_2='$email');";
	$str="";
	//echo $sql1."<br>".$sql2."<br>".$sql12."<br>".$sql22."<br>";
	$result = $con->query($sql12);
	$row = $result->fetch_assoc();
	$n1=$row['COUNT(*)'];
	$result = $con->query($sql22);
	$row = $result->fetch_assoc();
	$n2=$row['COUNT(*)'];
	
	echo "$n1 $n2";
	
	
	if ($n1>0 or $n2>0 )
	{
	
		if ($n1>0){
		$result = $con->query($sql1);
		while($row = $result->fetch_assoc())
		{
			if($row['conf_2']==1 && $row['conf_1']==1)
				{
					$str="You are already tied";
					}
			else if($row['conf_2']==1 && $row['conf_1']==0)
				{
					$str="Already sent a tie in request";
					}
			else if($row['conf_2']==0 && $row['conf_1']==1)
				{
					$str="You have already recieved a tie in request from your friend, please accept it.";
					}
			else if($row['conf_2']==0 && $row['conf_1']==0)
				{
					$sql="update tieins set conf_2=1 where (uid_1='$email' and uid_2='$gemail');";
					$con->query($sql);
					$str="Tie in request sent.";
					}
			
			}}
			
		if ($n2>0){
		$result = $con->query($sql2);
		while($row = $result->fetch_assoc())
		{
			if($row['conf_2']==1 && $row['conf_1']==1)
				{
					$str="You are already tied";
					}
			else if($row['conf_2']==1 && $row['conf_1']==0)
				{
					$str="You have already recieved a tie in request from your friend, please accept it";
					}
			else if($row['conf_2']==0 && $row['conf_1']==1)
				{
					$str="Already sent a tie in request";
					}
			else if($row['conf_2']==0 && $row['conf_1']==0)
				{
					$sql="update tieins set conf_1=1 where (uid_1='$gemail' and uid_2='$email');";
					$con->query($sql);
					$str="Tie in request sent.";
					}
			
			}}
			}
	else
	{
		$str="given email not found";
		}
	}
	else
	{
		$str="email not given";
		}
	$_SESSION['friend_request']=$str;
	header ("Location: tieins.php"); exit();

?>
