   <?php
if(isset($_POST['upd2']))
{
	
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
      }}
     else{
		 $fin_im=$pic;
		 }
     if(empty($error)==true){
         move_uploaded_file($im_tmp,$fin_im);
        $sql="DELETE FROM USERS WHERE email = '".$email."'";
	$result = $con->query($sql);
         $sql="INSERT INTO USERS VALUES('$uid','$uname','$ps','$fn','$ln','$email','$dob','$gender','$upst','$fin_im');";
		if($result = $con->query($sql)){
		$_SESSION['global_email']=$_POST['upem'];
		header ("Location: profile_template.php"); exit();
	}
	else{echo mysqli_error($con);}
	}
      else{
		  
         $error="*extension not allowed, please choose a JPEG or PNG file.";
      }}
?>
