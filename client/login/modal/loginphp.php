<?php
	session_start();
	include_once 'include/class.user.php';
	$user = new User();

	if (isset($_REQUEST['submit'])) { 
		extract($_REQUEST);   
	    $login = $user->check_login($emailusername, $password);
	    if ($login) {
	        // Registration Success
	       header("location:../../agarcup/start.php");
	    } else {
	        // Registration Failed
	       echo "<script> alert('잘못된 아이디거나 페스워드입니다!'); history.back();</script>";
	    }
	}
?>