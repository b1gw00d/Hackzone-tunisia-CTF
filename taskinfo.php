<?php
 
    //Start session
 session_start();
if (!isset($_SESSION['SESS_USERNAME'])) {
	$array['reponse'] ="login";
	echo json_encode($array);}
else{ 
	$id_user=$_SESSION['SESS_MEMBER_ID'];
	$username=$_SESSION['SESS_USERNAME'];
	$solv=0;
    $reponse="";
    $surname="";
	$score="";
	$miss="";
	$hint="";
	$categ="";
	$categ_name="";
	require_once('./config/connection.php');
	$hackzone_statut = mysql_query("SELECT * FROM admin");
   	if (mysql_num_rows($hackzone_statut)==0)
		$reponse="ERREUR";
	else{
		while ($hackzone_row = mysql_fetch_assoc($hackzone_statut)){
			$statut = $hackzone_row['hackzone_statut'];}
			if($statut==0) {
				$reponse="Hackzone Not Yet Started";
				$array['reponse'] = $reponse;
				echo json_encode($array);}
			else if ($statut==2)  {
				$reponse="Game Is Over";
				$array['reponse'] = $reponse;
				echo json_encode($array);}
			else if($statut==1 ){
					if (isset($_POST['id_task'])){
						$id_task=stripslashes($_POST['id_task']);
						$id_task = strip_tags($id_task);
						$id_task = htmlspecialchars($id_task);
						$id_task = mysql_real_escape_string($id_task);
						$result = mysql_query("SELECT * FROM challenges where id='$id_task'" );
						if (mysql_num_rows($result)!=0) {
							while ($result_row = mysql_fetch_assoc($result)){
									$surname	=$result_row['surname'];
									$score      =$result_row['score'];
									$miss       =$result_row['miss'];
									$hint       =$result_row['hint'];
									$reponse=1;
							}
						$verifier_solved=mysql_query("SELECT * FROM solved 
									where id_task='$id_task' AND team_id='$id_user' ");
						if (mysql_num_rows($verifier_solved)!=0) 
							$solv=1;
						
							$array['surname'] = $surname;
							$array['score'] = $score;
							$array['miss'] = $miss;
							$array['hint'] = $hint;
							$array['solv'] = $solv;
							$array['reponse'] = $reponse;
							echo json_encode($array);
						} 
					}else if (isset($_POST['taskid'])&&isset($_POST['answer'])){

							$select_submit = mysql_query("SELECT * FROM  member WHERE id='$id_user'");
							$r=mysql_fetch_array($select_submit);
							$submit_time=$r['submit_time'];
							$time = time();
							if ($time-$submit_time >5){
							$taskid=stripslashes($_POST['taskid']) ;
							$taskid = strip_tags($taskid);
							$taskid = mysql_real_escape_string($taskid);
							$taskid = htmlspecialchars($taskid);
							$answer=$_POST['answer'];
							$answer = md5($answer);
							$verifier = mysql_query("SELECT * FROM solved where id_task='$taskid'
														 AND team_id='$id_user'");
								if (mysql_num_rows($verifier)==0) {
									$result = mysql_query("SELECT * FROM challenges where id='$taskid'" );
									if (mysql_num_rows($result)!=0) {
										while ($result_row = mysql_fetch_assoc($result)){
											$flag=$result_row['flag'];
											$categ_name=$result_row['categ'];
											$score=$result_row['score'];
											}
										$cat = mysql_query("SELECT * FROM categories where name='$categ_name'" );
										while ($cat_row = mysql_fetch_assoc($cat)){
											$categ=$cat_row['id'];}
										if($answer==$flag){
											$tm = (int) time();
											$score_select  = mysql_query("SELECT *  FROM member where id='$id_user'");
											while ($score_row = mysql_fetch_assoc($score_select)){
											$total=$score_row['total'];
											}
											$newscore=$score+$total;
											$insert_solved = mysql_query("INSERT INTO solved(team_id,categ_id,id_task,time) VALUES ('$id_user','$categ','$taskid','$tm')");
											$time = time();
											$updtate_score = mysql_query("UPDATE member SET total='$newscore',time='$time' WHERE id='$id_user'");
											$reponse="Congratulation !! This flag is Correct";
											$solv=1;
											} else {
												$reponse="Incorrect flag";
												$time = time();
												$updtate_submit = mysql_query("UPDATE member SET submit_time='$time' WHERE id='$id_user'");}
										} else $reponse="erreur";
								}else {
										$reponse="Task already validated";
										$time = time();
										$updtate_submit = mysql_query("UPDATE member SET submit_time='$time' WHERE id='$id_user'");
										$solv=1; }
								$array['categ_name'] = $categ_name;
								$array['categ'] = $categ;
								$array['reponse'] = $reponse;
								$array['solv'] = $solv;
						echo json_encode($array);
							}else{
								$time = time();
								$reponse="Next submit after: ".($submit_time+5-$time)." s";
								$array['reponse'] = $reponse;
								echo json_encode($array);
							}
						}
						else if (isset($_POST['taskid'])){
							$taskid=stripslashes($_POST['taskid']) ;
							$taskid = strip_tags($taskid);
							$taskid = mysql_real_escape_string($taskid);

						$verifier_solved=mysql_query("SELECT * FROM solved 
									where id_task='$taskid' AND team_id='$id_user' ");
						if (mysql_num_rows($verifier_solved)!=0) {
							$solv=1;
							$reponse="Task already validated";
							$array['reponse'] = $reponse;
							$array['solv'] = $solv;
							echo json_encode($array);}
						}

					}
			}
}

?>