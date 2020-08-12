<!DOCTYPE html>
<?php
session_start();

ini_set('upload_max_filesize', '200M'); 	
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
<?php
if(isset($_POST['post1']))
{
	
	
	$im_name=$_FILES['post_attachement']['name'];
	$im_tmp=$_FILES['post_attachement']['tmp_name'];
	$im_type=$_FILES['post_attachement']['type'];
	$var1 = explode('.',$_FILES['post_attachement']['name']);
	$var2 = end($var1);
	$im_ext=strtolower($var2);
	$extensions= array("jpeg","jpg","png");
	$fin_im="assets/post_content/".$im_name;		
	if(in_array($im_ext,$extensions)=== false){
         $error="*extension not allowed, please choose a JPEG or PNG file.";
         $fin_im=$pic;
      }
     if(empty($error)==true){
   
		 $sql = "select * from posts";
		 mysqli_query($con,$sql);
		 $num1=mysqli_affected_rows($con)+1;
		 $temp = explode(".", $_FILES["post_attachement"]["name"]);
		 $newfilename = $em.$num1 . '.' . end($temp);
		 if(move_uploaded_file($_FILES["post_attachement"]["tmp_name"],"assets/post_content/".$newfilename))
				echo "Success";
		else
			echo "error";
		 $fin_im="assets/post_content/" . $newfilename;
         //move_uploaded_file($im_tmp,$fin_im);
        //$sql="DELETE FROM USERS WHERE email = '".$email."'";
		//$result = $con->query($sql);
         $sql="insert into posts (uid,content,location,time) values ('$em',\"".$_POST['post_content']."\",'$fin_im',NOW())";
		if($result = $con->query($sql)){
			header ("Location: profile_template.php"); exit();
	}
	else{echo mysqli_error($con);}
	}
      else{
		  $sql="insert into posts (uid,content,location,time) values ('$em',\"".$_POST['post_content']."\",'',NOW());";
		  if($result = $con->query($sql)){
			header ("Location: profile_template.php"); exit();
	}
	else
		{echo $sql."<br>".mysqli_error($con);}
	
         
      }}
?>
