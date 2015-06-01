<?php
     session_start();
if (!isset($_SESSION['SESS_ADMIN_ID']))
header("location: index.php");
else{
    require_once('../config/connection.php');
    $users   = mysql_query("SELECT * FROM member" );
    $challenges   = mysql_query("SELECT * FROM challenges" );
    $categories   = mysql_query("SELECT * FROM categories" );
    $number_users=mysql_num_rows($users);
    $number_challenges=mysql_num_rows($challenges);
    $number_categories=mysql_num_rows($categories);}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Users</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">


    <link rel="icon" type="image/png" href="../favicon.png">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/manager.js"></script>

</head>

<body style="background:#f2f2f2;">
<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>

            </button> <a class="navbar-brand droppedHover" href="admin.php">Admin</a>

        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">    
            <li><a href="signout.php" class=""><i class="glyphicon glyphicon-lock"></i> Logout</a>

            </li>
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /Header -->
<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <!-- Left column --> <a href="#" class=""><strong><i class="glyphicon glyphicon-wrench"></i> Tools</strong></a> 
            <hr class="">
                <ul class="list-unstyled">
                    <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu" class="">
          <h5 class="">Settings <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>

                        <ul class="list-unstyled collapse in" id="userMenu">
                            <li class="active"> <a href="admin.php" class=""><i class="glyphicon glyphicon-home"></i> Users 
                            <span class="badge badge-info"><?php echo $number_users; ?></span></a>
                            </li>
                            <li ><a href="challenges.php" class=""><i class="glyphicon glyphicon-flag"></i> Challenges 
                            </a>
                            </li>
                            <li ><a href="add_challenge.php" class=""><i class="glyphicon glyphicon-plus-sign"></i> Add Challenge 
                            <span class="badge badge-info"><?php echo $number_challenges; ?></span></a>
                            </li>
                            <li ><a href="add_category.php" class=""><i class="glyphicon glyphicon-folder-open"></i> Add Gategory 
                            <span class="badge badge-info"><?php echo $number_categories; ?></span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
        </div>
        <!-- /col-3 -->
        <div class="col-sm-9">
            <!-- column 2 -->
            <a href="" class=""><strong><i class="glyphicon glyphicon-dashboard"></i> USERS   </strong></a> 
            <hr class="">
                <div class="row">
                    <!-- center left-->
                    <div class="col-sm-9" contenteditable="false" style="">
                        <hr class="">
                <br><br>
                <?php
                $button_start_disabled="";
                $button_stop_disabled="";
                $button_over_disabled="";
                require_once('../config/connection.php');
                $result = mysql_query("SELECT * FROM admin " );
                while ($row_result = mysql_fetch_assoc($result)) {
                $hackzone_statut=$row_result['hackzone_statut'];
                }mysql_free_result($result);
                if ($hackzone_statut==0) {
                    echo '<h5>Hackzone Info: Hackzone Not Yet Started</h5>';
                    $button_stop_disabled="disabled";
                }
                else if ($hackzone_statut==1) {
                    echo '<h5>Hackzone Info: Hackzone Started</h5>';
                    $button_start_disabled="disabled";
                }
                else {
                    echo '<h5>Hackzone Info: Hackzone Over</h5>';
                    $button_over_disabled="disabled";
                }
             
                ?>
                
                <div class="row" align="center">
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Started</th>
                                <th>Not Yet Started</th>
                                <th>Games Over</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                            <td></td>
                            <?php
                            echo '
                            <td><a '.$button_start_disabled.' class="btn btn-success btn-lg"
                                onclick="status(1)" role="button" >
                                Start it
                                </a></td>
                            <td><a '.$button_stop_disabled.'  class="btn btn-danger btn-lg"
                                onclick="status(0)" role="button" >
                                Stop it
                                </a></td>
                            <td><a '.$button_over_disabled.'  class="btn btn-warning btn-lg"
                                onclick="status(2)" role="button" >
                                Over it
                                </a></td> ';
                                ?>   
                            </tr>  
                        </tbody>
                    </table>
                </div>
                <br>
                <?php
                $button_on_disabled="";
                $button_off_disabled="";
                require_once('../config/connection.php');
                $result = mysql_query("SELECT * FROM admin " );
                while ($row_result = mysql_fetch_assoc($result)) {
                $signup_statut=$row_result['signup'];
                }mysql_free_result($result);
                if ($signup_statut==1) {
                    echo '<h5>Signup Info: Signup open</h5>';
                    $button_on_disabled="disabled";
                }
                else {
                    echo '<h5>Signup Info: Signup closed</h5>';
                    $button_off_disabled="disabled";
                }
                ?>
                <div class="row" align="center">
                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Signup</th>
                                <th>On</th>
                                <th>Off</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                            <td></td>
                            <?php
                            echo '
                            <td><a '.$button_on_disabled.' class="btn btn-success btn-lg"
                                onclick="sig(1)" role="button" >
                                Open Signup
                                </a></td>
                            <td><a '.$button_off_disabled.'  class="btn btn-danger btn-lg"
                                onclick="sig(0)" role="button" >
                                Close Signup
                                </a></td>';
                                ?>   
                            </tr>  
                        </tbody>
                    </table>
                </div>

                <div class="row" align="center">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Username</th>
                <th>email</th>
                <th>Account activated</th>
                <th>ETAT</th>
                <th>Delete</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>id</th>
                <th>Username</th>
                <th>email</th>
                <th>Account activated</th>
                <th>ETAT</th>
                <th>Delete</th>
            </tr>
        </tfoot>
 
        <tbody>
                <?php
                $size=0;
                require_once('../config/connection.php');
                $result = mysql_query("SELECT * FROM member " );
                while ($row_result = mysql_fetch_assoc($result)) {
                $id[]=$row_result['id'];
                $username[]=$row_result['username'];
                $email[]=$row_result['email'];
                $active[]=$row_result['active'];
                $etat[]=$row_result['etat'];
                $size++;
                }
                 mysql_free_result($result);
                
                if($size!=0){   
                for($i=0;$i<$size;$i++){
                   echo '<span id="deleteuser'.$id[$i].'" >
                <tr >
                <td>'.$id[$i].'</td>
                <td>'.$username[$i].'</td>  
                <td>'.$email[$i].'</td>
                <td>'.$active[$i].'</td>
                <td>'.$etat[$i].'</td>
                <td><button id="user_delete_button" onclick="del_user('.$id[$i].')" class="btn btn-danger" >Delete</button>
                          </tr></span>';
                    
                }
            }
                ?>
            
            
        </tbody>
    </table>
                </div>
                <br><br>
        </div>
</div>

</body>
</html>