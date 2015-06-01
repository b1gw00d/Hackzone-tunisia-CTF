<?php
 
    //Start session
    session_start();
    $reponse="";
if (!isset($_SESSION['SESS_ADMIN_ID']))
{
$reponse="login";}
else{ 
	require_once('../config/connection.php');
	if (isset($_POST['status'])){
		$status =stripslashes($_POST['status']);
		$status = strip_tags($status);
		$status = mysql_real_escape_string($status);
		$status = htmlspecialchars($status);
		$result = mysql_query("SELECT * FROM admin " );
		if (mysql_num_rows($result)==0){
			$reponse="0";}
		else {
		while ($row_result = mysql_fetch_assoc($result)) {
                $hackzone_statut=$row_result['hackzone_statut'];
                }mysql_free_result($result);
            if($hackzone_statut!=$status){
            $update=mysql_query("UPDATE admin SET hackzone_statut='$status'");
			 $reponse="1";}
		}
	}else if (isset($_POST['signup'])){
		$signup =stripslashes($_POST['signup']);
		$signup = strip_tags($signup);
		$signup = mysql_real_escape_string($signup);
		$signup = htmlspecialchars($signup);
		$result = mysql_query("SELECT * FROM admin " );
		if (mysql_num_rows($result)==0){
			$reponse="0";}
		else {
		while ($row_result = mysql_fetch_assoc($result)) {
                $signup_statut=$row_result['signup'];
                }mysql_free_result($result);
            if($signup_statut!=$signup){
            $update=mysql_query("UPDATE admin SET signup='$signup'");
			$reponse="1";}
		}
	}
}
echo json_encode($reponse);  
?>
