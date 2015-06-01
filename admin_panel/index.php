<?php

//Start session 
     session_start();
if (isset($_SESSION['SESS_ADMIN_ID']))
header("location: admin.php");
require_once('../config/connection.php');
if($_SERVER['REQUEST_METHOD'] == "POST") {
    if ((isset($_POST['admin'])) &&(isset($_POST['admin']))){

         $admin = stripslashes($_POST['admin']);
         $admin = strip_tags($admin);
         $admin = mysql_real_escape_string($admin);
         $admin = htmlspecialchars($admin);

         $password = stripslashes($_POST['password']);
         $password = strip_tags($password);
         $password = mysql_real_escape_string($password);
         $password = htmlspecialchars($password);
         //log in
         $login = mysql_query("SELECT * FROM admin WHERE login='$admin'");
         if (mysql_num_rows($login)==0)
             $reponse="No such user";
         else{
              while ($login_row = mysql_fetch_assoc($login)){
                 //get database password
                $password_db = $login_row['password'];
                 //encrypt form password
                $password = md5($password);
                //check password
                if ($password!=$password_db)
                 $reponse="Incorrect password";
                else{
                $_SESSION['SESS_ADMIN_ID'] =$login_row['id'];
                $_SESSION['SESS_ADMIN_LOGIN'] =$admin;
                $_SESSION['SESS_ADMIN_PASSWORD'] = $password;
                $reponse="login success";
                header("location: admin.php");
                exit(1);
                                }
                 
                }
              }
    }
}
else{
        $reponse="Enter a login and password";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">


    <link rel="icon" type="image/png" href="../favicon.png">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">


    <script type="text/javascript" src="js/login.js"></script>


    </head>
    <body style="background:#f2f2f2;">
    <div class="container">
    <div class="login-container">
            <div id="output"></div>
            <div class="avatar"></div>
            <div class="form-box">
            <h1> Admin Login </h1>
                <form action="index.php" method="post">
                    <input name="admin" type="text" placeholder="Login">
                    <div class="password">
                        <input type="password" name="password"  id="passwordfield" placeholder="password">
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </div>
                    <button class="btn btn-info btn-block login" type="submit">Login</button>
                   <?php
                if($_SERVER['REQUEST_METHOD'] == "POST")
                echo '
                <br><div id="div_signup_response" class="alert alert-info alert-dismissable" style="display: block;" >
                <a class="panel-close close" data-dismiss="alert">×</a> 
                <i id="signup_response" class="fa fa-coffee">'.$reponse.'</i></div>'
                ?>
                </form>
            </div>

        </div>       
</div>
</body>
</html>