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
<title>Scoreboard</title>
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
<body style="background:#f2f2f2;" onContextMenu="return anti_clic();" lang="en" onLoad="window.setTimeout('history.go(0)', 10000)"  class='landing-page  wsite-theme-light wsite-page-index'>
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
						<li class="active">
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
		 						<li class="active">
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
								 <li></li>';
  					    ?>
					</ul>
				</div>
			</nav>
		</div>
	</div><br><br><br>
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
		<div class="col-sm-12"  align="center">
    		
    		  <h2>Scoreboard</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Rank</th>
        <th>Team</th>
        <th>Score</th>
      </tr>
    </thead>
    <tbody>
    <?php
    	require_once('./config/connection.php');
		$qry="SELECT * FROM member   order by  total desc, time";
		$result=mysql_query($qry);
		$i=1;
		if (mysql_num_rows($result)!=0){}
			while($row=mysql_fetch_array($result))
			{	
				$id =$row["id"];
				$score=$row["total"];
				$team =$row["username"];
				if($team!="root"){
				echo'	<tr class="info">
				        <td>#'.$i.'</td>
				        <td><a href="'.WEBSIT_LINK.'/profile.php?id='.$id.'">'.$team.'</a></td>
				        <td>'.$score.'</td></tr>';
				$i++;}
			}
			
	?>
    </tbody>
  </table>

		</div>
	</div>
</div>	
<br><br>	
</div>
</body>
</html>
