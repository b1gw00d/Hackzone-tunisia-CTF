<?php
 
    //Start session
    session_start();
    $reponse="";
if (!isset($_SESSION['SESS_ADMIN_ID']))
{
$reponse="login";}
else{ 
	if (isset($_POST['id_delet'])){
		require_once('../config/connection.php');
		$id_delet =stripslashes($_POST['id_delet']);
		$id_delet = strip_tags($id_delet);
		$id_delet = mysql_real_escape_string($id_delet);
		$id_delet = htmlspecialchars($id_delet);
		$result = mysql_query("SELECT * FROM member where id='$id_delet'" );
		if (mysql_num_rows($result)==0){
			$reponse="0";}
		else {
				//delete solved//
			$result_solved= mysql_query("SELECT * FROM solved where team_id='$id_delet'" );
			if (mysql_num_rows($result_solved)==0){
				$reponse="1";}
			else {
				$delete_team_solved=mysql_query("DELETE FROM solved where team_id='$id_delet'" );
			}
			

			//Delte team //
			$delete_team=mysql_query("DELETE FROM member where id='$id_delet'" );
			if($delete_team) $reponse="4";
			else $reponse="5";
		}
	}
}
echo json_encode($reponse);  
?>
