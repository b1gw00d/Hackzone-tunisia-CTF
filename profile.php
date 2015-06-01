<?php
  //Start session	
  	 session_start();
  if (isset($_SESSION['SESS_USERNAME'])){
    require_once('./config/connection.php');
    $id=$_SESSION['SESS_MEMBER_ID'];
    $user   = mysql_query("SELECT * FROM member  where id='$id'" );
    while ($user_row = mysql_fetch_assoc($user))  $imguser=$user_row['img'];
        if(isset($_GET['id'])){
            $id_member = stripslashes($_GET['id']);
            $id_member = strip_tags($id_member);
            $id_member = mysql_real_escape_string($id_member);
            $id_member = htmlspecialchars($id_member);
            $result   = mysql_query("SELECT * FROM member  where id='$id_member'" );
            if (mysql_num_rows($result)==0)  header("location: index.php");
            else {
                while ($result_row = mysql_fetch_assoc($result)) {

                $img=$result_row['img'];
                $username=$result_row['username'];
                }mysql_free_result($result);
            }
        }
        else{
            $result   = mysql_query("SELECT * FROM member  where  id='$id'" );
            if (mysql_num_rows($result)==0)  header("location: index.php");
            else{
               while ($result_row = mysql_fetch_assoc($result)) {
                $img=$result_row['img'];
                $username = $result_row['username'];
                $id_member = $result_row['id'];
               }mysql_free_result($result);
            }
        }
      }
  else{
            require_once('./config/connection.php');
            if(isset($_GET['id'])){
              $id_member = stripslashes($_GET['id']);
              $id_member = strip_tags($id_member);
              $id_member = mysql_real_escape_string($id_member);
              $id_member = htmlspecialchars($id_member);
              $user   = mysql_query("SELECT * FROM member  where id='$id_member'" );
              if (mysql_num_rows($user)==0)  header("location: index.php");
              else {
                  while ($user_row = mysql_fetch_assoc($user)) {
                  $img=$user_row['img'];
                  $username=$user_row['username'];
                  }mysql_free_result($user);}
            }else header("location: index.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php  echo $username;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">


  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="favicon.ico">
	<link href="css/bootstrap.css" rel="stylesheet">
	
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
              <a href="rules.php"><span class="glyphicon glyphicon-lock"  >Rules</span></a>
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
                 <ul  class="dropdown-menu" >
                   <li class="active"><a href="profile.php"><i class="fa fa-square"></i> Profile</a></li>
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
                </li>               <li >
                  <a href="rules.php"><span class="glyphicon glyphicon-lock"  >Rules</span></a>
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
      </div>';}
?>
</div><br>
<hr class="">
<div class="container target">
    <div class="row">
        <div class="col-sm-10">
         <br>
        </div>
      <div class="col-sm-2"><a  class="pull-right"><img title="profile image" class="img-circle img-responsive" src="<?php echo $img ; ?>" height="200" width="200" ></a>

        </div>
    </div>
  <br>
    <div class="row">
        <div class="col-sm-3">
        </div>
        <!--/col-3-->
        <div class="col-sm-8" contenteditable="false" style="" style="margin-left:20px;">
            <div class="panel panel-default target" style="margin-left: 20px;margin-top: 20px;margin-right: 20px">
                <div align="center" class="panel-heading" contenteditable="false"><strong class="">Team Name: <?php echo $username ;?></strong></div>
                <h1>Solved Tasks</h1>
                <br>
                <?php
          require_once('./config/connection.php');
          $hackzone_statut = mysql_query("SELECT * FROM admin");
             if (mysql_num_rows($hackzone_statut)==0)
          $reponse="ERREUR";
         else{
          while ($hackzone_row = mysql_fetch_assoc($hackzone_statut)){
            $statut = $hackzone_row['hackzone_statut'];}
         }
         if($statut==1){

          $catge = mysql_query("SELECT * FROM categories order by id" );
            if (mysql_num_rows($catge)==0)
              echo "No categories" ;
            else {
              echo '<table><tbody><tr>';
              while ($row_catge = mysql_fetch_assoc($catge)) {
                $name_categ=$row_catge["name"];
                $categ_id=$row_catge["id"];
                echo '<td><a class="btn btn-default btn-lg"  style="background-color:#000000;" disabled>'.$name_categ.'</a></td>';
            
                    $solved = mysql_query("SELECT * FROM solved WHERE categ_id='$categ_id' AND team_id='$id_member'  order by time");
                    if (mysql_num_rows($solved)!=0)
                      while ($solved_row = mysql_fetch_assoc($solved)) {
                            $id_task=$solved_row['id_task'];
                            $result = mysql_query("SELECT * FROM challenges WHERE id='$id_task'" );
                            if (mysql_num_rows($result)!=0){
                              while ($row = mysql_fetch_assoc($result)) {
                                $surname=$row['surname'];
                                echo   '<td><a  class="btn btn-default btn-lg" style="background-color:#008000;">
                                  <strong style="color:#000000;">'.$surname.'</strong> </a> </td>';
                              }mysql_free_result($result);

                            }
                      }mysql_free_result($solved);
                        echo '</tr><tr>';
                      
              }mysql_free_result($catge);
              echo '</tr></tbody></table><br>';
            }
          }
        ?>  
                 
        </div>
              
    </div>
</div>
  
</div>
<br><br><br><br>  

    </div>
</div>
</body>
</html>
