	<?php

//Start session	
	require_once('./config/connection.php');
	 session_start();
if (isset($_SESSION['SESS_USERNAME']))
{

$id_member=$_SESSION['SESS_MEMBER_ID'];
$user   = mysql_query("SELECT * FROM member  where id='$id_member'" );
while ($user_row = mysql_fetch_assoc($user))  $img=$user_row['img'];}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Rules</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link rel="icon" type="image/png" href="favicon.ico">
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
 						<li class="active">
							<a href="rules.php"><span class="glyphicon glyphicon-lock"	>Rules</span></a>
						</li>
						<li >
							<a href="scoreboard.php"><span class="glyphicon glyphicon-signal">Scoreboard</span></a>
						</li>
						<li >
							<a href="challenges.php"><span class="glyphicon glyphicon-flag">Challenges</span></a>
						</li>
						<li >
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
								</li >		 						
								<li class="active">
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

<?php
if (!isset($_SESSION['SESS_USERNAME']))	
echo '<!--SIGNUP dialog-->			
			<div class="modal fade" id="modal-container-signup" role="dialog" aria-labelledby="signup" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							 <h4 class="modal-title" id="signupLabel">
								Sign Up
							</h4>
						</div>
						<div class="modal-body">
								<div class="row">
                       		    <div class="col-md-8 col-sm-8 col-xs-12 login-box">
                               		 <form  id="signup" action="signup_json.php" method="post" >
                            			<div class="input-group">
                               			  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                			 <input type="text" class="form-control" placeholder="Username" name="username" required autofocus />
                            			</div>
                            			<div class="input-group">
                                			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                			<input type="password" class="form-control" placeholder="Password" name="npassword" required />
                            			</div>
                            			<div class="input-group">
                                			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                			<input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required />
                            			</div>
                            			<div class="input-group">
                                			<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                			<input type="text" class="form-control" placeholder="Email" name="email" required />
                            			</div>
                            			<br>
                            			<div class="row">
							 				<div class="col-xs-6 col-sm-6 col-md-6">
											<div class="g-recaptcha" data-sitekey="6LdEhgITAAAAAGigEVKR5jrozGcVwVr0gva8EzmT"></div>
											</div>
										</div><br>
										<div class="col-xs-6 col-sm-6 col-md-6">
       									 	<button class="btn btn-labeled btn-success" id="signup-button">Sign Up</button>
       								 	</div>
                            		</form>
                            				<br><br><div id="div_signup_response" class="alert alert-info alert-dismissable" style="display: none;" >
											<a class="panel-close close" data-dismiss="alert">×</a> 
											<i id="signup_response" class="fa fa-coffee"></i>
											</div><br>
                       		    </div>
                   			</div>
						</div>
					</div>
				</div>
			</div>
<!--Login dialog-->			
			<div class="modal fade" id="modal-container-login" role="dialog" aria-labelledby="login" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							 <h4 class="modal-title" id="loginLabel">
								Login
							</h4>
						</div>
						<div class="modal-body">
							<div class="row">
                       		    <div class="col-md-8 col-sm-8 col-xs-12 login-box">
                               		 <form id="login" action="login_json.php" method="post" >
                            			<div class="input-group">
                               			  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                			 <input type="text" class="form-control" placeholder="Username" name="username" required autofocus />
                            			</div>
                            			<div class="input-group">
                                			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                			<input type="password" class="form-control" placeholder="Password" name="password" required />
                            			</div>
                            			<div class="checkbox">
                               			 <label>
                                   			 <input type="checkbox" value="Remember">
                                   			 Remember me
                                		</label>
                           			   </div>
                            			
                               			 <a href="init.php" >Find Your Account?</a>
                               			 <br>
									<div class="col-xs-6 col-sm-6 col-md-6">
       									<button class="btn btn-labeled btn-success" id="login-button">LogIn</button>
       							 	</div>
                            		</form>
                            				<br><br><div id="div_login_response" class="alert alert-info alert-dismissable" style="display: none;" >
											<a class="panel-close close" data-dismiss="alert">×</a> 
											<i id="login_response" class="fa fa-coffee"></i>
											</div><br>
                       		    </div>
                   			</div>
						</div>
					</div>
				</div>
			</div>';
?>

<br><br>
<div class="container" >
	<div class="row clearfix" >
		<div class="col-sm-12" contenteditable="false" >
    		<h1>HackZone Capture The Flag Rules</h1><br>
<strong>The Hackzone Capture The Flag will be held online on saturday, April 19, 2014 (20:00 GMT, duration 14 hours) </strong>

<h3>->Scoreboard:</h3><strong> Is accessible at <a href="<?php echo WEBSIT_LINK."/scoreboard.php" ;?>"><?php echo WEBSIT_LINK."/scoreboard.php" ;?></a></strong>
<h3>->IRC:</h3> <strong> If you have any question, ask it there.</strong>
<h3>->Submit:</h3><strong>For each mission  if a team submitted more than 2 times per seconde, it will be considered as bruteforce attempt <br>	and they will be blocked for 10 minutes.</strong>
<h3>->Attacking</h3><strong>the Hackzone infrastructure is forbidden. This includes scanning, DDos, exploiting possible vulnerabilities, sabotage, etc.<br> Each team has its own flag, Do not try to submit a flag obtained by another team.</strong>

<h3>->Brute Force and Denial of service attacks</h3><strong> on any challenge will not be tolerated, unless the challenge calls for such an attack</strong>

<strong>If you find any bugs in our challenges,<br> please report it for possible bonus points.</strong>

<h3>[Acknowledgements:]</h3><strong> Some of the rules obtained from previous CTF's held around the world :)</strong>

<h3>Please obey to the following rules, disregarding to the rules can result in your disqualification</h3>
<br/><br/>
<h2 class="wsite-content-title" style="text-align:left;">Prices</h2>
<strong>Only one team will win the contest. The gift they will win will depend on the total score accumulated at the end of the challenge.
<br>three categories of gifts are available. Try to do your best !</strong>
		</div>
	</div>
</div>	
<br><br>	

	</div>
	<div>
</div>
</body>
</html>
