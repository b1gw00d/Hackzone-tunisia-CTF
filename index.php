	<?php

//Start session	
	 session_start();
if (isset($_SESSION['SESS_USERNAME']))
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
<title>Home</title>
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
						<li class="active">
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
						     <li margin-left:20px;></li>';	
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
								 <li ></li>';
  					    ?>
					</ul>
				</div>
				
			</nav>
			</div>
	</div>
			<br><br><br>
<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="jumbotron" style="background-image: url(./img/hack.jpg);">
				<center><h1 style="color:#000000 ;"><span  >Hack Zone CTF</span></h1></center>
	
				<center><iframe  src="http://free.timeanddate.com/countdown/i4lg9cvk/n253/cf12/cm0/cu4/ct0/cs0/ca0/co0/cr0/ss0/000000/000000/pct/tcfff/fn3/fs350/szw576/szh243/iso2015-04-04T18:00:00" allowTransparency="true" frameborder="0" width="658" height="171" ></iframe></center>
				
			</div>
		</div>
	</div>

		
</div>

<?php
if (!isset($_SESSION['SESS_USERNAME'])){
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
											<i id="login_response" class="fa fa-coffee"></i>
											</div><br>
                       		    </div>
                   			</div>
						</div>
					</div>
				</div>
			</div>';}
?>

<br><br>
<div class="container" >
	<div class="row clearfix" >
		<div class="col-sm-12" contenteditable="false" align="center">
    		<div class="panel panel-default target" align="center">
				<center><h2 class="wsite-content-title" style="color:#000000" >Hack Zone ctf<br /></h2></center>

<div class="paragraph" style="text-align:left;"><center>The Hack Zone event is a scientific event which deals with computer security and encloses the theoretical to the practical in order to meet the knowledge and good security practices in the IT world.<br/>
Throughout this 24-hour event, participants will be able to learn about computer security during conferences, discuss and ask questions during the workshops and practice during the challenge which will last 14 hours.<br/>
This year, in its second edition, this event became national in scope and almost all security clubs in Tunisia have registered, <br/>even computer security experts will attend and share with us some of their knowledge.<br><br>
  <img width=70% height=70% src="./img/Programme.jpg" alt="logo"/>
 <br><br>
 <iframe style="margin-left:auto; margin-right:0" width="560" height="315" src="https://www.youtube.com/embed/DUZs6I1ORtM" frameborder="0" allowfullscreen></iframe> 
 </center></div>

<center>
<table>
<td>
<tr>
<a class="btn btn-social-icon btn-lg btn-facebook" href="https://www.facebook.com/HACK.ZONE.TUNISIA">
<i class="fa fa-facebook"></i></a>
</tr>
<tr>
<a class="btn btn-social-icon btn-lg btn-twitter" href="https://twitter.com/csi_ensi">
<i class="fa fa-twitter"></i></a>
</tr>
<tr>
<a class="btn btn-social-icon btn-lg btn-google-plus" href="mailto:ensi.csi@gmail.com">
<i class="fa fa-google-plus"></i></a>
</tr>
</td>
</table></center>

<div>

   				<h3 style="color:#000000 ;align:right; text-align:center" > SPONSORED BY</h3>
				<center>
				<table>
				<tr>
				<td>
				<a href="https://www.accessnow.org/" target="_blank" >
				<img src="./img/logo-access.png" width=120%>
				</a>
				</td>
				 
				 <td>
				<a href="http://www.ansi.tn/" target="_blank" >
				<img src="./img/logo-ansi.png" width=100%> 
				</a>
				 </td>
				 
				 <td>
				<a href="http://www.sifaris.fr/" target="_blank" >
				<img src="./img/logo-sifaris.png" width=100% >
				</a>
				 </td>
				 
				 <td>
				<a href="http://www.tac-tic.tn/" target="_blank" >
				<img src="./img/tactic.png" width=70%>
				</a>
				 </td>
				 
				</tr>
				</table>
				</center>

		 			</div>
		 			<br>
				</div>
			</div>
		</div>
</div>	
<br><br>	

	</div>
	<div>
</div>
</body>
</html>
