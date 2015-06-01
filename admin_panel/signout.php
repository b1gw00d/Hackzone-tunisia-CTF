<?php
//Start session	
	 session_start();

    //Unset the variables stored in session
    unset($_SESSION['SESS_ADMIN_ID']);
    unset($_SESSION['SESS_ADMIN_LOGIN']);
    unset($_SESSION['SESS_ADMIN_PASSWORD']);
    header("location: index.php");	
?>
