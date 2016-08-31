<?php
session_start();
include('config.php');
include('mysql.php');
global $conn;
$mode = $_GET['mode'];

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
		
	} else if($mode == 'sign_in'){
		$email = mysqli_real_escape_string($conn, $email);
		$password = mysqli_real_escape_string($conn, $password);
		if(query("SELECT * FROM `users` WHERE `email` = '".$email."' AND `password` = '".$password."'")){
			$_SESSION['loged'] = time();
			echo 'error';
		} else {
			echo 'error';
		}
	} else {
		exit;
	}
}