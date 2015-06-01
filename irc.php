	<?php

//Start session	
	 session_start();
if (!isset($_SESSION['SESS_USERNAME']))header("location: index.php");
else
{
require_once('./config/connection.php');
$id_member=$_SESSION['SESS_MEMBER_ID'];
$user   = mysql_query("SELECT * FROM member  where id='$id_member'" );
while ($user_row = mysql_fetch_assoc($user))  $img=$user_row['img'];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>IRC</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" href="favicon.ico">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/manager.js"></script>
<!-- google recaptcha -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>

</head>
<body style="background:#f2f2f2;">
<div class="container" >
	<div class="row clearfix">
		<div class="col-md-12 column">
		  <div class="col-md-12 column">
			<nav  class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
					 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
					 <span class="icon-bar"></span><span class="icon-bar"></span></button>
					  <a class="navbar-brand" href="index.php"><span ><img src="img/logo-hack.png" alt="logo" height="25" width="25" class="profile-image img-circle"/>Hack-Zone</span></a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li >
							<a href="index.php"><span class="glyphicon glyphicon-home">Home</span></a>
						</li>
   						
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<?php

      					
						if (isset($_SESSION['SESS_USERNAME']))
						{
 						$name=$_SESSION['SESS_USERNAME'];
 						echo '
 						<li >
							<a href="rules.php"><span class="glyphicon glyphicon-lock"	>Rules</span></a>
						</li>
						<li >
							<a href="scoreboard.php"><span class="glyphicon glyphicon-signal">Scoreboard</span></a>
						</li>
						<li >
							<a href="challenges.php"><span class="glyphicon glyphicon-flag">Challenges</span></a>
						</li>
						<li class="active">
							<a href="irc.php"><span class="glyphicon glyphicon-check">Irc</span></a>
						</li>
 						<li class="dropdown">
    						 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    						 <img src="'.$img.'" height="20" width="20" class="profile-image img-circle"> '.$name.' <b class="caret"></b></a>
    						 <ul  class="dropdown-menu">
        					 <li><a href="profile.php"><i class="fa fa-square"></i> Profile</a></li>
        					 <li class="divider"></li>
       						 <li><a href="signout.php"><i class="fa fa-sign-out"></i> Sign-out</a></li>
   							 </ul>
						     </li>
						     <li margin-left:20px;>/<li>';	
 					}
 						else
 							echo '
		 						<li >
									<a href="scoreboard.php"><span class="glyphicon glyphicon-signal">Scoreboard</span></a>
								</li>		 						<li >
									<a href="rules.php"><span class="glyphicon glyphicon-lock"	>Rules</span></a>
								</li>
								<li >
									<a href="contact.php"><span class="glyphicon glyphicon-comment">Contact</span></a>
								</li>
								<li >
									<a href="sponsors.php"><span class="glyphicon glyphicon-shopping-cart">Sponsors</span></a>
								</li>
								<li >
									<a href="media.php"><span class="glyphicon glyphicon-camera">Media</span></a>
								</li>
 								<li margin-left:10px;>
								 <a id="modal-signup" href="#modal-container-signup" role="button" class="btn" data-toggle="modal">SIGN UP</a>
								 </li>
								 <li margin-right:20px;>
								 <a id="modal-login" href="#modal-container-login" role="button" class="btn" data-toggle="modal">LOGIN</a>
								 </li>
								 <li>/<li>';
  					    ?>
					</ul>
				</div>
				
			</nav>
			</div>
	</div>
			<br><br><br>


		
</div>
<br><br>
<div class="container" >
	<div class="row clearfix" >
		<div class="col-sm-12" contenteditable="false" >
    		<h2 >IRC</h2>
			<center>
			<div>
			<iframe src="http://webchat.freenode.net?channels=%23hackzone&uio=d4" width="1000" height="400"></iframe>
			</div>
			</center>
		</div>
	</div>
</div>	
<br><br>	

	</div>
	<div>
</div>
</body>
</html>
