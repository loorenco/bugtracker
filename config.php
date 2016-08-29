<?php 
global $mysql;

$mysql = array(	'host' => 'localhost',
				'db' => 'bug_tracker',
				'user' => 'loorenco',
				'password' => 'tralala');

$project_title = 'Issue Tracker';
$project_slogun = 'Stay Stable';

$issues_states = array(	'0' => 'New',
						'1' => 'Open',
						'2' => 'Fixed',
						'3' => 'Closed');

?>