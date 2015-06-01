<?php
//Start session	
	 session_start();

    //Unset the variables stored in session
    unset($_SESSION['SESS_MEMBER_ID']);
    unset($_SESSION['SESS_USERNAME']);
    unset($_SESSION['SESS_SESS_PASSWORD']);
    header("location: index.php");	
?>
