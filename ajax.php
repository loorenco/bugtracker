<?php
session_start();
include('config.php');
include('mysql.php');
include('functions.php');
global $conn;
$mode = GET('mode');

if(isset($_SESSION['loged'])){
	if($mode == 'sign_out'){
		session_destroy();
	} else if($mode == 'add_bug'){
		$title = POST('inputTitle');
		$description = POST('inputDescription');
		$state = POST('inputState');
		$time = time();
		$bug = query("INSERT INTO `bugs` VALUES ('', '".$title."', '".$description."', '".$_SESSION['user']."', '".$time."', '".$state."')");
		$user = query("SELECT * FROM `users` WHERE `id` = '".$_SESSION['user']."'");
		$author = $user['0']['first_name'].' '.$user['0']['last_name'];
		echo '<tr class="bug-'.$bug.'">
		  <td>'.$bug.'</td>
		  <td class="b_title accordion-toggle" data-toggle="collapse" data-parent=".table-striped" href="#collapseOnePanel'.$bug.'" aria-expanded="false">'.$title.'</td>
		  <td class="author">'.$author.'</td>
		  <td>
			<span data-id="'.$state.'" class="b_state label label-'.state_to_style($state).' pull-left" data-effect="pop">'.$issues_states[$state].'</span>
		  </td>
		  <td>'.date('d M Y h:i', $time).'</td>
		  <td class="loged_td">
			<a data-toggle="modal" data-id="'.$bug.'" href="#editIssue" class="edit_bug_info btn btn-primary btn-sm">Edit</a>
			<a data-toggle="modal" data-id="'.$bug.'" href="#deleteIssue" class="del_bug btn btn-warning btn-sm">Delete</a>
		  </td>
		</tr>
		<tr id="collapseOnePanel'.$bug.'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
		  <td colspan="6" class="panel-body">'.$description.'</td>
		</tr>';
	} else if($mode == 'edit_bug'){
		$id = POST('id');
		$title = POST('inputTitle');
		$description = POST('inputDescription');
		$state = POST('inputState');
		$bug = query("UPDATE `bugs` SET 
				`title` = '".$title."',
				`description` = '".$description."',
				`state` = '".$state."'
				WHERE `id` = '".$id."'");
		$author = POST('author');
		echo '<tr class="bug-'.$id.'">
		  <td>'.$id.'</td>
		  <td class="b_title accordion-toggle" data-toggle="collapse" data-parent=".table-striped" href="#collapseOnePanel'.$id.'" aria-expanded="false">'.$title.'</td>
		  <td class="author">'.$author.'</td>
		  <td>
			<span data-id="'.$state.'" class="b_state label label-'.state_to_style($state).' pull-left" data-effect="pop">'.$issues_states[$state].'</span>
		  </td>
		  <td>'.date('d M Y h:i', $time).'</td>
		  <td class="loged_td">
			<a data-toggle="modal" data-id="'.$id.'" href="#editIssue" class="edit_bug_info btn btn-primary btn-sm">Edit</a>
			<a data-toggle="modal" data-id="'.$id.'" href="#deleteIssue" class="del_bug btn btn-warning btn-sm">Delete</a>
		  </td>
		</tr>
		<tr id="collapseOnePanel'.$id.'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
		  <td colspan="6" class="panel-body">'.$description.'</td>
		</tr>';
	} else if($mode == 'delete_bug'){
		$id = POST('id');
		query("DELETE FROM `bugs` WHERE `id` = '".$id."'");
	} else if($mode == 'user_info'){
		$user = query("SELECT `first_name`, `last_name`, `email` FROM `users` WHERE `id` = '".$_SESSION['user']."'");
		echo json_encode($user['0']);
	} else if($mode == 'edit_prodile'){
		$first_name = POST('inputFirstName');
		$last_name = POST('inputLastName');
		$email = POST('inputEmail');
		$password = POST('inputCurrentPassword');
		$new_password = POST('inputNewPassword');
		if(query("SELECT * FROM `users` WHERE `password` = '".$password."'")){
			if($new_password != 'd41d8cd98f00b204e9800998ecf8427e'){
				query("UPDATE `users` SET 
				`email` = '".$email."',
				`first_name` = '".$first_name."',
				`last_name` = '".$last_name."'
				WHERE `id` = '".$_SESSION['user']."'");
			} else {
				query("UPDATE `users` SET 
				`email` = '".$email."',
				`password` = '".$new_password."',
				`first_name` = '".$first_name."',
				`last_name` = '".$last_name."'
				WHERE `id` = '".$_SESSION['user']."'");
			}
			echo 'success';
		} else {
			echo 'error';
		}
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
		} elseif($user = query("INSERT INTO `users` VALUES ('', '".$email."', '".$password."', '".$first_name."', '".$last_name."', '1')")){
			$_SESSION['loged'] = time();
			$_SESSION['user'] = $user;
			echo 'success';
		} else {
			echo 'error';
		}
		
	} else if($mode == 'sign_in'){
		$email = POST('inputEmail');
		$password = POST('inputPassword');
		if($user = query("SELECT * FROM `users` WHERE `email` = '".$email."' AND `password` = '".$password."'")){
			$_SESSION['loged'] = time();
			$_SESSION['user'] = $user['0']['id'];
			echo 'success';
		} else {
			echo 'error';
		}
	} else {
		exit;
	}
}