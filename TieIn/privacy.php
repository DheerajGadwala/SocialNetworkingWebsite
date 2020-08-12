<!DOCTYPE html>
<html>
<head>
<title>Privacy.</title>
<link rel="shortcut icon" type="image/x-icon" href="assets\imgs\logo.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="assets/css/style.css"/>
<link rel="stylesheet" href="assets/css/admin.css"/>
<style>
.box
{
background: rgba(255,255,255,1);
padding: 10px 20px;
border-radius: 2px;
box-shadow: 0px 0px 15px 5px rgba(0,0,0,0.4);
}
body{ background-image:url("assets/imgs/back.jpg");
position:relative;
}

</style>
</head>
<body>
<div class="header no-shadow">
<div class="container-fluid">
<div class="row">
<div class="col-sm-4">
<div class="logo">
<h1><a href="./dashboard.php">TieIn</a></h1>
</div>
</div>
<div class="col-sm-8">
<ul class="header-menu pull-right">
<li><a href="dashboard.php" class="">Dashboard</a></li>
<li><a href="requests.php" class="">Requests</a></li>
<li><a href="messages.php" class="">Messages</a></li>
<li><a href="notifications.php" class="">Notifications</a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="main">
<div class="container-fluid">
<div class="row">
<div class="col-sm-3 left-sidebar">
<ul>
<li><a href="settings.php">Settings</a></li>
<li><a href="privacy.php" class="active">Privacy</a></li>
<li><a href="index.php">Logout</a></li>
</ul>
</div>
<div class="col-sm-6">
<table style="width:100%" class="table table-striped">
<tr>
<td><strong>Who can see my stuff?</strong></td>
<td>Who can see your future posts?</td>
<td>
<input type="radio" name="option1" value="Public">Public		<br /><hr>
<input type="radio" name="option1" value="Only Me">Only-Me		<br /><hr>
<input type="radio" name="option1" value="Friends">Friends of Friends		<br /><hr>
<input type="radio" name="option1" value="Protected">Protected	<br /><hr>
</td>							
</tr>
<tr>
<td><strong>Who can contact me?</strong></td>
<td>Who can send you friend requests?</td>
<td>
<input type="radio" name="option2" value="Public">Public		<br /><hr>
<input type="radio" name="option2" value="Only Me">Only-Me		<br /><hr>
<input type="radio" name="option2" value="Friends">Friends of Friends		<br /><hr>
<input type="radio" name="option2" value="Protected">Protected	<br /><hr>
</td>                             
</tr>
<tr>
<td><strong>Who can look me up?</strong></td>
<td>Who can look you up using the email address you provided?</td>
<td>
<input type="radio" name="option3" value="Public">Public		<br /><hr>
<input type="radio" name="option3" value="Only Me">Only-Me		<br /><hr>
<input type="radio" name="option3" value="Friends">Friends of Friends		<br /><hr>
<input type="radio" name="option3" value="Protected">Protected	<br /><hr>
</td>					
</tr>
<tr>
</table>
</div>
<div class="col-sm-3 chat-users">
<div class="row">
<h3>Chat</h3>
</div>
<div class="row">
<div class="col-sm-12 chat-user online">
<a href="profile5shubham.php">
<img src="assets/imgs/1.jpg" class="pull-left"/>
&nbsp;
Shubham Kumar
</a>
</div>
<div class="col-sm-12 chat-user online">
<a href="profile1maninder.php">
<img src="assets/imgs/2.jpg" class="pull-left"/>
&nbsp;
Maninder Kaur
</a>
</div>
<div class="col-sm-12 chat-user online">
<a href="profile2divyanshu.html">
<img src="assets/imgs/3.jpg" class="pull-left"/>
&nbsp;
Divyanshu Gupta
</a>
</div>
<div class="col-sm-12 chat-user online">
<a href="profile4akshima.html">
<img src="assets/imgs/4.jpg" class="pull-left"/>
&nbsp;
Akshima Sharma
</a>
</div>
<div class="col-sm-12 chat-user online">
<a href="profile3sourabh.html">
<img src="assets/imgs/5.jpg" class="pull-left"/>
&nbsp;
Sourabh Thakur
</a>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="footer no-shadow">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">

</div>
</div>
</div>
&copy; TieIn 2019.
</div>

</body>
</html>
