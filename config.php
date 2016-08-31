<?php 
$mysql = array(	'host' => 'localhost',
				'db' => 'xpoldecl_bug',
				'user' => 'xpoldecl_bug',
				'password' => 'Alabala1');

$url = '';

$project_title = 'Issue Tracker';

$issues_states = array(	'0' => 'New',
						'1' => 'Open',
						'2' => 'Fixed',
						'3' => 'Closed');
if(isset($_SESSION['loged'])){
	if((time() - $_SESSION['loged']) < 1800){
		$_SESSION['loged'] = time();
	} else {
		session_destroy();
	}
}
?>