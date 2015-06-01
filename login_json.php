<?php
 //Start session
    session_start();
if (isset($_SESSION['SESS_USERNAME']))
{
header("location: profile.php");
exit();
}
if (isset($_POST['username'])&&isset($_POST['password'])){

   		//Include database connection details
   		 require_once('./config/connection.php');
   		 $hackzone_statut = mysql_query("SELECT * FROM admin");
   	    		 if (mysql_num_rows($hackzone_statut)==0)
					$reponse="ERREUR";
				 else{
				 	while ($hackzone_row = mysql_fetch_assoc($hackzone_statut)){
				 		$statut = $hackzone_row['hackzone_statut'];}
				 }
		 		 //get form data
				 $username = stripslashes($_POST['username']);
				 $username = strip_tags($username);
				 $username = mysql_real_escape_string($username);
				 $username = htmlspecialchars($username);

				 $password = stripslashes($_POST['password']);
				 $password = strip_tags($password);
				 $password = mysql_real_escape_string($password);
				 $password = htmlspecialchars($password);
   
				   	if($statut==1 or $username=="root"){					
				  		 if (!$username||!$password)
								$reponse="Enter a username and password";
				                else
				                {
								 $pos = strpos($username, "0x");
								 if ($pos !== false) 
									$reponse="Bad name";
								 $pos = strpos($username, "0X");
								 if ($pos !== false)
									$reponse="Bad name";
								 $pos = strpos($password, "0x");
								 if ($pos !== false)
									$reponse="Bad password";
								 $pos = strpos($password, "0X");
								 if ($pos !== false)
									$reponse="Bad password";
				                //log in
								 $login = mysql_query("SELECT * FROM member WHERE username='$username'");
				   	    		 if (mysql_num_rows($login)==0)
									$reponse="Incorrect login or password";
								 else{
				    			      while ($login_row = mysql_fetch_assoc($login)){
											//get database password
				      				       $password_db = $login_row['password'];
											//encrypt form password
				      				       $password = md5($password);
											//check password
				      					   if ($password!=$password_db)
											   $reponse="Incorrect login or password";
				       				       else{
												//check if active
												$active = $login_row['active'];
												$email = $login_row['email'];
												if ($active==0)
													$reponse='You didn \'t activated your account, please check your email ('.$email.')';
												else{
													$_SESSION['SESS_MEMBER_ID'] =$login_row['id'];
													$_SESSION['SESS_USERNAME'] =$username;
													$_SESSION['SESS_PASSWORD'] = $password;
													$reponse="success";
													 session_write_close();}
				                             }
				                        }
				                     }
				                 }
				              }
		              else if($statut==2) 
		              	$reponse="Game Is Over";
		              else $reponse="Hackzone Not Yet Started";
		}else
		  $reponse="Please fill out all fields";

echo json_encode($reponse);   


?>
