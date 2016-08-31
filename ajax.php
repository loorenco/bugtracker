<?php
session_start();
include('config.php');
include('mysql.php');
global $conn;
$mode = GET('mode');

if(isset($_SESSION['loged'])){
	if($mode == 'sign_out'){
		session_destroy();
	} else if($mode == 'add_bug'){
		
	} else if($mode == 'edit_bug'){
		
	} else if($mode == 'delete_bug'){
		
	} else if($mode == 'edit_prodile'){
		
	} else {
		exit;
	}
} else {
	if($mode == 'sign_up'){
		
		$first_name = POST('inputFirstName');
		$last_name = POST('inputLastName');
		$email = POST('inputEmail');
		$password = POST('inputPassword');
		if(query("SELECT * FROM `users` WHERE `email` = '".$email."'")){
			echo 'exists';
		} elseif(query("INSERT INTO `users` VALUES ('', '".$email."', '".$password."', '".$first_name."', '".$last_name."', '1')")){
			$_SESSION['loged'] = time();
			echo 'success';
		} else {
			echo 'error';
		}
		
	} else if($mode == 'sign_in'){
		$email = POST('inputEmail');
		$password = POST('inputPassword');
		if(query("SELECT * FROM `users` WHERE `email` = '".$email."' AND `password` = '".$password."'")){
			$_SESSION['loged'] = time();
			echo 'success';
		} else {
			echo 'error';
		}
	} else {
		exit;
	}
}