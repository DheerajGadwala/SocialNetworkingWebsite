<div id="pass_change" class="modal" style="display='none'">
    
        <div class="imgcontainer">
   <span onclick="document.getElementById('pass_change').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        
        
 
    <form class="modal-content animate" style="margin-top:0;background-color:grey;border-radius:0 0 5px 5px" action="" method="post"><div style="color:black;margin:3%"><h3>Change Password<h3></div>
        <div class="container" style="border-radius:5px;margin:30px"> 
            <label for="cpass"><b>Current Password</b></label><br>
            <input type="password" placeholder="Enter Current Password" name="cpass"><br>
            <label for="npass"><b>New Password</b></label><br>
            <input type="password" placeholder="Enter New Password" name="npass" ><br>
            <label for="cnpass"><b>Confirm New Password</b></label><br>
            <input type="password" placeholder="Confirm New Password" name="cnpass"><br>
            <button class="btn btn-success input-lg" type="submit" name="updpass">Update</button><br>
        
        </div>
    </form>
    <?php 
        $opass="";
        $npass="";
        $cnpass="";
        if(isset($_POST['updpass']))
        {
            $opass=$_POST['cpass'];
            $npass=$_POST['npass'];
            $cnpass=$_POST['cnpass'];
            $con=mysqli_connect("localhost","root","","iwp_1");
                $query=("select * from users where uid='".$em."';");
                mysqli_query($con,$query);
                echo "<div style='color:white;margin:3%'>$em</div>";
                if(mysqli_affected_rows($con)>0)
                {
                    $query="select * from users where uid='".$em."' and pass=PASSWORD('".$opass."');";
                    $result=mysqli_query($con,$query);
                    $array=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    if(mysqli_affected_rows($con)>0)
                    {
						if($npass == $cnpass)
						{
						$query = "update users set pass = password('$npass') where uid = '$em';";
						$result=mysqli_query($con,$query);
						
						$ps=$npass;
						echo "<script>alert('Password updated successfuly');</script>";
                        //echo("Login Succesful");
                        //echo "<script>showDiv()</script>";
                        echo "<script>document.getElementById('pass_change').style.display='none'</script>";
                        //exit(header("Location:profile_edit.php"));
                        ob_end_flush();}
                        else
                        {
							echo "<script>alert('Passwords do not match.');</script>";
							}
                    }
                else
                {
                    echo "<script>
                    alert('Invalid Password,please enter the correct password to change to a new password.');
                    </script>";
                }  }
            
        }
    ?>
</div>
