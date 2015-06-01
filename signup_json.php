<?php
   
    //Start session
    session_start();
if (isset($_SESSION['SESS_USERNAME']))
	$reponse="login";
else{
	function generate_password($length = 20){
			$chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
            '0123456789';
			$str = '';
			$max = strlen($chars) - 1;
			for ($i=0; $i < $length; $i++)
			$str .= $chars[mt_rand(0, $max)];
			return $str;}

	if (isset($_POST['g-recaptcha-response'])&&isset($_POST['username'])&&isset($_POST['npassword'])&&isset($_POST['npassword'])&&isset($_POST['email'])){
		require_once('./config/connection.php');
		$result = mysql_query("SELECT * FROM admin " );
            while ($row_result = mysql_fetch_assoc($result)) {
                $signup_statut=$row_result['signup'];
                }mysql_free_result($result);
            if ($signup_statut==0) $reponse="Signup closed";
            else {
				$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';   
				//Sanitize the POST values
				 //username
				$username = stripslashes($_POST['username']);
				$username = strip_tags($username);
				$username = mysql_real_escape_string($username);
				$username = htmlspecialchars($username);
				//New password
				$npassword = stripslashes($_POST['npassword']);
				$npassword = strip_tags($npassword);
				$npassword = mysql_real_escape_string($npassword);
				$npassword = htmlspecialchars($npassword);
		     	//Confirm password
				$cpassword = stripslashes($_POST['cpassword']);
				$cpassword = strip_tags($cpassword);
				$cpassword = mysql_real_escape_string($cpassword);
				$cpassword = htmlspecialchars($cpassword);
		  		//email
				$email = stripslashes($_POST['email']);
				$email = strip_tags($email);
				$email = mysql_real_escape_string($email);
				$email = htmlspecialchars($email);
		        //captcha
				$captcha=$_POST['g-recaptcha-response'];
				$pos = strpos($username, "0x");
				if ($pos !== false) $reponse="Bad name";
				$pos = strpos($username, "0X");
				if ($pos !== false) $reponse="Bad name";
		  /** Validate Recaptcha */
				$recaptcha_secret = "6LdEhgITAAAAAN4gmuLD9VIi9D9_W0u2nnT06mwx";
		        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$captcha);
		        $response = json_decode($response, true);
		        if($response["success"] === false)
		           $reponse="Invalid captcha";
				else{
					if ($npassword != $cpassword) $reponse="Passwords do not match";
					else{
						if (preg_match($pattern, $email) === 1){
							// emailaddress is valid
							if ((strlen($username)<6) or (strlen($npassword)<6))
								$reponse="password and login should be at least 6 characters";
							else{
								//encrypt password
								$password = md5($npassword);
								//check if username already taken
								$check = mysql_query("SELECT * FROM member WHERE username='$username'");
								if (mysql_num_rows($check)>=1)  $reponse="Username already taken";
								else{
									$checkemail = mysql_query("SELECT * FROM member WHERE email='$email'");
									if (mysql_num_rows($checkemail)>=1) $reponse="email already taken";
									else{
										//generate random code
										$code = generate_password(15);
										$initcode =generate_password(15) ;
										//send activation email
										$to = $email;
										$subject = "Activate your account";
										$headers = "From: ".WEBSIT_LINK;
										$body = "Hello $username,\nYou registered and need to activate your account.Click the link below or paste it into the URL bar of your browser\n".WEBSIT_LINK."/activate.php?code=$code\nThanks!.\n
										login   :$username\n
										password:$npassword\n";
										if (!mail($to,$subject,$body,$headers))
											$reponse=="We couldn't sign you up at this time. Please try again later.";
										else{
											$img = "./img/user/0.jpg" ;
											//register into database
											$register = mysql_query("INSERT INTO member (username,password,img,email,code,initcode,etat,total) VALUES ('$username','$password','$img','$email','$code','$initcode','OK','0')");
											if(!$register) $reponse="erreur !!" ;
											else $reponse="You have been registered successfully! Please check your email ($email) to activate your account";
		                                 }
									}
								}
							}
						} else $reponse="email not working";                                    
					}
				}
			}
	} else $reponse="Please fill out all fields";
}

echo json_encode($reponse);    
?>