<?php

 //Start session
    session_start();
if (isset($_SESSION['SESS_USERNAME']))
	$reponse="login";
else{
	//Include database connection details
	require_once('./config/connection.php');
	$code = stripslashes($_GET['code']);
	$code = strip_tags($code);
	$code = mysql_real_escape_string($code);
	$code = htmlspecialchars($code);
	if (!$code) $reponse="No code supplied";
	else{
		$check = mysql_query("SELECT * FROM member WHERE code='$code'");
		if ($r=mysql_num_rows($check)){
			$r1=mysql_fetch_array($check);
			if ((int)$r1['active']==1)
				$reponse="You have already activated your account";
			else if((int)$r1['active']==0){
				$activate = mysql_query("UPDATE member SET active='1' WHERE code='$code'");
				$reponse="Your account has been activated!";}
		}
		else $reponse="this code is not well";
	}
}

echo json_encode($reponse);
?>
