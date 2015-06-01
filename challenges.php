<?php
	session_start();
	require_once('./config/connection.php');
	if (!isset($_SESSION['SESS_USERNAME']))header("location: index.php");
else
{
	$id_member=$_SESSION['SESS_MEMBER_ID'];
$user   = mysql_query("SELECT * FROM member  where id='$id_member'" );
while ($user_row = mysql_fetch_assoc($user))  $img=$user_row['img'];
$n=0 ;
$qr="SELECT  hint FROM challenges ";
$re=mysql_query($qr);
	while($r=mysql_fetch_array($re))
	{
	if ($r[0]!="no hint")
  	 {
	$n++;
  	 }
	}
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Challenges</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" href="favicon.ico">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/challenges.js"></script>
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
						<li class="active">
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
	</div><br><br><br>	
</div>


<!-- dialog flag -->
<div  class="modal fade" id="flag_modal" role="dialog" aria-labelledby="signup" aria-hidden="true">
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header"  style="background-color:#000000;" >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4  style="color:#FFFFFF; " class="modal-title"id="taskname"></h4>
				<p style="color:#FFFFFF; " id="taskscore"></p>
			</div>
			<div class="modal-body">
				<p id="taskmiss"></p><br>
				<p id="taskhint"></p >
		    	<form class="form-inline" id="form_flag" action="taskinfo.php" method="post">
		            <div class="form-group">
		                <input style="width: 400px" name="answer" id="answer" class="form-control" value="" type="text" placeholder="submit flag" />
		                <input name="taskid" id="taskid" class="form-control" value="O" type="hidden"  />
		            </div>
		            <div class="form-group">
		            <button  class="btn btn-labeled btn-success" id="btn_flag">Submit</button>
		            </div>
		        </form>
		        <br><div id="div_flag_response" class="alert alert-info alert-dismissable" style="display: none;" >
							<i id="flag_response" class="fa fa-coffee"></i>
							</div><br>
    </div>
</div>
</div>
</div>

<br><br>
		<h2>Challenges:</h2>
				<div class="panel panel-default target"  >	
					<div class="row clearfix" >
						<div class="col-md-2 column">
						</div>
						<div class="col-md-6 column">
						<br><br>		
						
						
				<?php
					
					if (isset($_SESSION['SESS_USERNAME'])) $id_member=$_SESSION['SESS_MEMBER_ID'];
					require_once('./config/connection.php');
					$catge = mysql_query("SELECT * FROM categories order by id" );
						if (mysql_num_rows($catge)==0)
							echo "No categories" ;
						else
							while ($row_catge = mysql_fetch_assoc($catge)) {
								$name_categ=$row_catge["name"];
								echo '<table>
									  <tbody><tr>
									  <td><a class="btn btn-default btn-lg"  style="background-color:#000000;height:80px;width:150px;" disabled>
											<strong style="	color:#800000;"">'.$name_categ.'</strong>		
											</a></td>
									  ' ;
						
										$result = mysql_query("SELECT * FROM challenges WHERE categ='$name_categ'  order by id" );
										if (mysql_num_rows($result)!=0)
											while ($row = mysql_fetch_assoc($result)) {
												$surname=$row['surname'];
						        				$score=$row['score'];
						        				$categ=$row['categ'];
						        				$id_task=$row['id'];
						        				$miss=$row['miss'];
						        				$hint=$row['hint'];
						        				$dis= mysql_query("SELECT * FROM solved  
						        					where team_id='$id_member' AND id_task='$id_task'" );
												if (mysql_num_rows($dis)==0) $color="#FFFFFF";
												else  $color="#008000";
												echo   '<td><a    id="task'.$id_task.'"
														class="btn btn-default btn-lg" href="#flag_modal" 
														onclick="openflag('.$id_task.')" role="button"  data-toggle="modal" style="background-color:'.$color.';height:80px;width:150px;">
																	<strong style="color:#000000;">'.$surname.'</strong>
															</a>
														</td>';
											}mysql_free_result($result);
											echo '</tr></tbody>
  													</table>';

							}mysql_free_result($catge);
				?>		
							
						</div>
						<div class="col-md-4 column">
						</div>
					</div><br><br>
				</div>
		 			
<br><br>	
</div>
</body>
</html>