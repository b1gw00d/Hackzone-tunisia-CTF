<?php

 //Start session
    session_start();
if (isset($_SESSION['SESS_USERNAME']))
{
header("location: challenges.php");
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Media</title>
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
								<li class="active">
									<a href="media.php"><span class="glyphicon glyphicon-camera">Media</span></a>
								</li>
 								<li margin-left:10px;>
								 <a id="modal-signup" href="#modal-container-signup" role="button" class="btn" data-toggle="modal">SIGN UP</a>
								 </li>
								 <li margin-right:20px;>
								 <a id="modal-login" href="#modal-container-login" role="button" class="btn" data-toggle="modal">LOGIN</a>
								 </li>
								 <li></li>
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
			</div>';
?>

<br><br>
<div class="container" >
	<div class="row clearfix" >
		<div class="col-sm-12" contenteditable="false" align="center">
    		<h2 class="wsite-content-title" style="text-align:left;">Media</h2>
				<center>
				<table >
				<tr>
				 <td>
				

			<tr>
				 <td>
				
				<a href="http://radiomannoubastation.com/" target="_blank" >
				<img style="display: block; margin-left: auto; margin-right: auto; " src="./img/radio-mannouba-station.png">
				</a>
				 </td>
					<td height="142"></td>
				
				 <td>
				<iframe width="300" height="300" src="https://www.mixcloud.com/widget/iframe/?autoplay=&amp;embed_type=widget_standard&amp;embed_uuid=91806946-ba98-4a3b-b758-5ae8b4c22ecd&amp;feed=%2Fkhalfaoui-nejd%2F18-03%25D8%25B2%25D9%2588%25D9%2585-%25D8%25B9%25D9%2584%25D9%2589-%25D8%25A7%25D9%2584%25D8%25AC%25D9%2585%25D8%25B9%25D9%258A%25D8%25A7%25D8%25AA%2F&amp;hide_artwork=&amp;hide_cover=&amp;hide_tracklist=&amp;light=&amp;mini=&amp;replace=0&amp;stylecolor=" frameborder="0"></iframe><div style="clear:both; height:3px; width:300;"></div><p style="display:block; font-size:11px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; margin:0; padding: 3px 4px; color:#999; width:300;"> 2015-18-03 <br> زوم على الجمعيات</p><div style="clear:both; height:3px;"></div>
				<h3> Mannouba Radio Station </h3>
				 </td>
			</tr>


			</table>
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
