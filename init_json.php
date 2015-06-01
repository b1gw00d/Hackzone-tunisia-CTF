<?php
//Start session	
	 session_start();
if (isset($_SESSION['SESS_USERNAME']))
{
$reponse="login";
}else{
require_once('./config/connection.php');
//generate password
function generate_password($length = 20){
  $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
            '0123456789';
  $str = '';
  $max = strlen($chars) - 1;
  for ($i=0; $i < $length; $i++)
    $str .= $chars[mt_rand(0, $max)];
  return $str;
}
//email
if($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_POST['email'])) {
		 $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD'; 
		 $email = stripslashes($_POST['email']);
		 $email = strip_tags($email);
		 $email = mysql_real_escape_string($email);
		 $email = htmlspecialchars($email);
	if (preg_match($pattern, $email) === 1){
		 $qry="SELECT * FROM member where email='$email'";
		 $result=mysql_query($qry);
		 $r1=mysql_fetch_array($result);
		 if (mysql_num_rows($result)==0){
			 $reponse="Bad information. We couldn't find your email.";}
		else{
              //generate random code
               $code = generate_password(15);
			  //send  email
               $to = $email;
               $subject = "Reset your password";
               $headers = "From: ".WEBSIT_LINK;;
               $body = "Hello ".$r1['username'].",\n\nSomebody recently asked to reset your password.Click here to change your password.\n\n".WEBSIT_LINK."/init.php?code=$code\n\nThanks!.\n \n";
               if (!mail($to,$subject,$body,$headers)){
				   $reponse="We couldn't find your account. Please try again later.";}
               else{
                    //register into database
                    $register = mysql_query("UPDATE  member SET initcode='$code' where email='$email'");
				    $reponse="Check your email ($email) -we sent you an email with a link to reset your password";}
			 }
    }
    else{
		 $reponse="email not working";}
	}
	else{ 
		 $reponse="Please enter your email";}
}
else if($_SERVER['REQUEST_METHOD'] == 'GET') 
{
	 if (isset($_GET['code'])) {
         $code = stripslashes($_GET['code']);
		 $code = strip_tags($code);
		 $code = mysql_real_escape_string($code);
		 $code = htmlspecialchars($code);
		 $check = mysql_query("SELECT * FROM member WHERE initcode='$code'");
    	 if (mysql_num_rows($check)==1){
			$r1=mysql_fetch_array($check);
			$password = generate_password(12);
			$md5password = md5($password);
            $email=$r1['email'] ;
			 //send  email
            $to = $email;
            $subject = "Reset password ";
            $headers = "From: ".WEBSIT_LINK;
            $body = "Hi ".$r1['username']." ,\n,Your password has been changed successfully\nlogin:".$r1['username']."\npassword:$password\n";
            if (!mail($to,$subject,$body,$headers)){
				$reponse="We couldn't find your account. Please try again later.";}
            else{
				//generate random code
                $initcode = generate_password(15);
                 //update into database
                $register = mysql_query("UPDATE  member SET password='$md5password',initcode='$initcode' where email='$email'");
				$reponse="Check your email (".$email.") - we sent you an email with a new password";}
		  }
    	  else{
				$reponse="this code is not well";}
	 }
	 else{$reponse="Please enter your code";}
} else {
		$reponse="try later";}
}

echo json_encode($reponse);
?>