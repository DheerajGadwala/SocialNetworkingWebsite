<!DOCTYPE html>
<html>

<head>
	<title>TieIn dashboard..</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css"/>
	<link rel="stylesheet" href="assets/css/admin.css"/>
</head>

<body>
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
			<div class="col-sm-3 left-sidebar">	
			</div>
			<div class="col-sm-6" style="border-color:brown;" >
				<div class="post col-sm-12" style="border-color:brown;" id="post_1">
					<div class="row post-heading"  style="border-color:brown;">
						<div class="col-sm-12" style="border-color:brown;">
							<a href="profile1maninder.php">
								<img src="assets/imgs/2.jpg" class="profile-picture pull-left"/>&nbsp;
								<span class="post-user-name">Lakshita Rahoria</span><br/>&nbsp;
								<small class="post-date text-mute">31th March, 2019 2:08PM</small>
							</a>
						</div>
					</div>
					<div class="row post-body">
						<div class="col-sm-12">You meet thousands of people, and none of them really mean anything to you. And then you meet one person, and your life is changed forever.<strong><b>#Smile is every thing..!!!!</b></strong>
							<strong><b>#Inspirational Video!!!!</b></strong>
							<strong><b>#Plesaes do watch.!!!!</b></strong><video controls width="400px" height="275px"><source src="assets/imgs/smile.mp4" type="video/mp4"  ></video>
						</div>
					</div>
					<div class="row post-action" style="border-color:brown;">
						<ul class="post-action-menu">
							<li><a href="#;" class="text-mute" onclick="like(1);">Like</a></li>
							<li><a href="#;" class="text-mute" onclick="comment(1);">Comment</a></li>
							<li class="pull-right"><a href="#" class="text-mute"><span id="post_like_count_1">12</span> Likes</a></li>
							<li class="pull-right"><a href="#" class="text-mute"><span id="post_comment_count_1">56</span> Comments</a></li>
						</ul>	
					</div>
				</div>
			</div>
		</div>
	</div>

<script>
function like(id){
var elem = document.getElementById("post_like_count_"+id);
var count = parseInt(elem.innerHTML);
elem.innerHTML = count+1;

}
function share(id){
var elem = document.getElementById("post_share_count_"+id);
var count = parseInt(elem.innerHTML);
elem.innerHTML = count+1;
                
}
function comment(id){
var elem = document.getElementById("post_comment_count_"+id);
var count = parseInt(elem.innerHTML);
elem.innerHTML = count+1;
	
}
			
</script>
</body>
</html>
