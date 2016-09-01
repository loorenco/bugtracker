<?php
session_start();
include('config.php');
include('mysql.php');
include('functions.php');
global $conn;
?><!DOCTYPE html>
<html lang="en">
<head>
  
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
  
  <title><?php echo $project_title; ?></title>
  
  <link href='http://fonts.googleapis.com/css?family=Lato:400,300,400italic,700,900' rel='stylesheet' type='text/css'>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="Techie Bootstrap 3 skin">
  <meta name="keywords" content="bootstrap 3, skin, flat">
  <meta name="author" content="bootstraptaste">
  
  <!-- Bootstrap css -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap.techie.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->


  <!-- Docs Custom styles -->
  <style>
body,html{overflow-x:hidden}body{padding:60px 20px 0}footer{border-top:1px solid #ddd;padding:30px;margin-top:50px}.row>[class*=col-]{margin-bottom:40px}.navbar-container{position:relative;min-height:100px}.navbar.navbar-fixed-bottom,.navbar.navbar-fixed-top{position:absolute;top:50px;z-index:0}.navbar.navbar-fixed-bottom .container,.navbar.navbar-fixed-top .container{max-width:90%}.btn-group{margin-bottom:10px}.form-inline input[type=password],.form-inline input[type=text],.form-inline select{width:180px}.input-group{margin-bottom:10px}.pagination{margin-top:0}.navbar-inverse{margin:110px 0}
.modal-dialog {
	z-index: 9999;
}
.pagination {
    margin: auto;
    display: table;
}
.mb10 {
	margin-bottom: 10px;
}
.table-filter {
	background: #eeeeee;
    border-top-left-radius: 6px;
    border-top-right-radius: 6px;
	padding: 10px 0px 0px 0px;
}
.header-nav {
	background: #eeeeee;
    border-radius: 6px;
}
.input-group {
	display: inline-table;
}
h1 {
    display: inline-block;
}
.accordion-toggle {
	cursor: pointer;
}
<?php if(isset($_SESSION['loged'])) { ?>
.not_loged_btn {
	display: none;
}
<?php } else { ?>
.loged_btn, .loged_td {
	display: none;
}
<?php } ?>
  </style>

</head>
<body>

  <div class="container">
  

 <div class="col-sm-12 col-lg-12 header-nav">
 <div class="col-sm-6 col-lg-6">
  <h1><?php echo $project_title; ?></h1>
  </div>
  <div class="col-sm-6 col-lg-6 text-right"><h1>
  
		<a data-toggle="modal" href="#signIn" class="btn btn-primary mb10 not_loged_btn">Sign In</a>
		<a data-toggle="modal" href="#signUp" class="btn btn-primary mb10 not_loged_btn">Sign Up</a>

		<a data-toggle="modal" href="#newIssue" class="btn btn-primary mb10 loged_btn">New Issue</a>
		<a data-toggle="modal" href="#profile" class="btn btn-primary mb10 loged_btn user_info">Profile</a>
		<a data-toggle="modal" href="#signOut" class="btn btn-primary mb10 loged_btn">Sign Out</a>
	</h1></div>
</div>

		<div id="signIn" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Sign In</h4>
                  </div>
                  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
						<label for="inputEmail" class="col-lg-2 control-label">Email</label>
						<div class="col-lg-10">
						  <input type="text" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword" class="col-lg-2 control-label">Password</label>
						<div class="col-lg-10">
						  <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
						</div>
					  </div>
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Sign In</button>
                  </div>

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
			<div id="newIssue" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">New Issue</h4>
                  </div>
                  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
						<label for="inputTitle" class="col-lg-2 control-label">Title</label>
						<div class="col-lg-10">
						  <input type="text" class="form-control" name="inputTitle" id="inputTitle" placeholder="Title">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputState" class="col-lg-2 control-label">State</label>
						<div class="col-lg-10">
						  <select class="form-control" name="inputState" id="inputState">
							<?php foreach($issues_states as $key => $value) {
								echo '<option value="'.$key.'">'.$value.'</option>';
							} ?>
						  </select>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputDescription" class="col-lg-2 control-label">Description</label>
						<div class="col-lg-10">
						  <textarea class="form-control" name="inputDescription" id="inputDescription" rows="3" placeholder="Description"></textarea>
						</div>
					  </div>
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add</button>
                  </div>

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
			<div id="editIssue" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Issue</h4>
                  </div>
                  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
						<label for="inputTitle" class="col-lg-2 control-label">Title</label>
						<div class="col-lg-10">
						  <input type="text" class="form-control" name="inputTitle" id="inputTitle" placeholder="Title">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputState" class="col-lg-2 control-label">State</label>
						<div class="col-lg-10">
						  <select class="form-control" name="inputState" id="inputState">
							<?php foreach($issues_states as $key => $value) {
								echo '<option value="'.$key.'">'.$value.'</option>';
							} ?>
						  </select>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputDescription" class="col-lg-2 control-label">Description</label>
						<div class="col-lg-10">
						  <textarea class="form-control" name="inputDescription" id="inputDescription" rows="3" placeholder="Description"></textarea>
						</div>
					  </div>
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Edit</button>
                  </div>

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
		<div id="signUp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
                  </div>
                  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
						<label for="inputFirstName" class="col-lg-3 control-label">First Name</label>
						<div class="col-lg-9">
						  <input type="text" class="form-control" name="inputFirstName" id="inputFirstName" placeholder="First Name">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputLastName" class="col-lg-3 control-label">Last Name</label>
						<div class="col-lg-9">
						  <input type="text" class="form-control" name="inputLastName" id="inputLastName" placeholder="Last Name">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail" class="col-lg-3 control-label">Email</label>
						<div class="col-lg-9">
						  <input type="text" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword" class="col-lg-3 control-label">Password</label>
						<div class="col-lg-9">
						  <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword2" class="col-lg-3 control-label">Repeat Password</label>
						<div class="col-lg-9">
						  <input type="password" class="form-control" name="inputPassword2" id="inputPassword2" placeholder="Repeat Password">
						</div>
					  </div>
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Sign Up</button>
                  </div>

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
			<div id="profile" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Profile</h4>
                  </div>
                  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
						<label for="inputFirstName" class="col-lg-4 control-label">First Name</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" name="inputFirstName" id="inputFirstName" placeholder="First Name">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputLastName" class="col-lg-4 control-label">Last Name</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" name="inputLastName" id="inputLastName" placeholder="Last Name">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail" class="col-lg-4 control-label">Email</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputCurrentPassword" class="col-lg-4 control-label">Current Password</label>
						<div class="col-lg-8">
						  <input type="password" class="form-control" name="inputCurrentPassword" id="inputCurrentPassword" placeholder="Current Password">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputNewPassword" class="col-lg-4 control-label">New Password</label>
						<div class="col-lg-8">
						  <input type="password" class="form-control" name="inputNewPassword" id="inputNewPassword" placeholder="New Password">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputNewPassword2" class="col-lg-4 control-label">Repeat New Password</label>
						<div class="col-lg-8">
						  <input type="password" class="form-control" name="inputNewPassword2" id="inputNewPassword2" placeholder="Repeat New Password">
						</div>
					  </div>
					</form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                  </div>

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
		<div id="signOut" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Sign Out</h4>
                  </div>
                  <div class="modal-body">
                    <h4>Are you sure you want to Sign Out?</h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Sign Out</button>
                  </div>

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
			<div id="deleteIssue" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Delete Issue</h4>
                  </div>
                  <div class="modal-body">
                    <h4>Are you sure you want to delete this issue?</h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Delete</button>
                  </div>

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
    <!-- Buttons -->
    <div class="row">
      <div class="col-sm-12 col-lg-12">
	  
		<div class="col-sm-4 col-lg-4 text-center">

      </div>
		

		
    </div>
    </div>

    <!-- Tables -->

    <div class="row">
      <div class="col-sm-12 col-lg-12">
	  <div class="col-sm-12 col-lg-12 table-filter">
	          <div class="col-sm-6 col-lg-6">
		<div class="btn-group" data-toggle="buttons" data-effect="fall">
		  <label class="btn btn-primary">
			<input type="checkbox"> New
		  </label>
		  <label class="btn btn-primary">
			<input type="checkbox"> Open
		  </label>
		  <label class="btn btn-primary">
			<input type="checkbox"> Fixed
		  </label>
		  <label class="btn btn-primary">
			<input type="checkbox"> Closed
		  </label>
		</div>
		</div>
		
		<div class="col-sm-6 col-lg-6">
		<div class="input-group">
              <input type="text" class="search form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
		</div>
	  </div>
<table class="table table-striped" data-effect="fade">
              <thead>
                <tr>
                  <th>№</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>State</th>
                  <th>Date</th>
                  <th class="loged_td">Actions</th>
                </tr>
              </thead>
              <tbody>
			  <?php
			  		$bugs = query("SELECT * FROM `bugs` ORDER BY `id` DESC");
					foreach($bugs as $bug){
						$user = query("SELECT * FROM `users` WHERE `id` = '".$bug['author']."'");
						$author = $user['0']['first_name'].' '.$user['0']['last_name'];
						echo '<tr class="bug-'.$bug['id'].'">
						  <td>'.$bug['id'].'</td>
						  <td class="b_title accordion-toggle" data-toggle="collapse" data-parent=".table-striped" href="#collapseOnePanel'.$bug['id'].'" aria-expanded="false">'.$bug['title'].'</td>
						  <td class="author">'.$author.'</td>
						  <td>
							<span data-id="'.$bug['state'].'" class="b_state label label-'.state_to_style($bug['state']).' pull-left" data-effect="pop">'.$issues_states[$bug['state']].'</span>
						  </td>
						  <td>'.date('d M Y h:i', $bug['date']).'</td>
						  <td class="loged_td">
							<a data-toggle="modal" data-id="'.$bug['id'].'" href="#editIssue" class="edit_bug_info btn btn-primary btn-sm">Edit</a>
							<a data-toggle="modal" data-id="'.$bug['id'].'" href="#deleteIssue" class="del_bug btn btn-warning btn-sm">Delete</a>
						  </td>
						</tr>
						<tr id="collapseOnePanel'.$bug['id'].'" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
						  <td colspan="6" class="panel-body">'.$bug['description'].'</td>
						</tr>';
					}
			  ?>

                
              </tbody>
            </table>
			<!--<div class="col-sm-12 col-lg-12">
	<ul class="pagination">
          <li><a href="#">«</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li class="disabled"><a href="#">»</a></li>
        </ul>
      </div>-->
      </div>
    </div>





    
  </div> <!-- /container -->

  <footer class="text-center">
    <p>
	Skin by <a href="http://bootstraptaste.com">Bootstraptaste</a> edited by Loorenco</p>
    <!-- 
        All links in the footer should remain intact. 
        Licenseing information is available at: http://bootstraptaste.com/license/
        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Techie
    -->
  </footer>

  <!-- Main Scripts-->
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/md5.js"></script>
  
  <!-- Bootstrap 3 has typeahead optionally
  <script src="assets/js/typeahead.min.js"></script> -->
  <script>
  var url = '<?php echo $url; ?>';
  function isEmail(email) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(email);
  }
  var delay = (function() {
    var timer = 0;
    return function(callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
    };
})();
  $(function() {
	  $(document).on('click', '#signUp .btn-primary', function(e){
		  var error = false;
		  if($('#signUp #inputFirstName').val().length < 3){
			  $('#signUp #inputFirstName').parent().parent().removeClass('has-success').addClass('has-error');
			  error = true;
		  } else {
			  $('#signUp #inputFirstName').parent().parent().removeClass('has-error').addClass('has-success');
		  }
		  if($('#signUp #inputLastName').val().length < 3){
			  $('#signUp #inputLastName').parent().parent().removeClass('has-success').addClass('has-error');
			  error = true;
		  } else {
			  $('#signUp #inputLastName').parent().parent().removeClass('has-error').addClass('has-success');
		  }
		  if($('#signUp #inputPassword').val().length < 3){
			  $('#signUp #inputPassword').parent().parent().removeClass('has-success').addClass('has-error');
			  error = true;
		  } else {
			  $('#signUp #inputPassword').parent().parent().removeClass('has-error').addClass('has-success');
		  }
		  if(!isEmail($('#signUp #inputEmail').val())){
			  $('#signUp #inputEmail').parent().parent().removeClass('has-success').addClass('has-error');
			  error = true;
		  } else {
			  $('#signUp #inputEmail').parent().parent().removeClass('has-error').addClass('has-success');
		  }
		  if($('#signUp #inputPassword2').val().length < 3 || $('#signUp #inputPassword2').val() != $('#signUp #inputPassword').val()){
			  $('#signUp #inputPassword2').parent().parent().removeClass('has-success').addClass('has-error');
			  error = true;
		  } else {
			  $('#signUp #inputPassword2').parent().parent().removeClass('has-error').addClass('has-success');
		  }
		  if(!error){
			$.post(url+'ajax.php?mode=sign_up',$(document).find('#signUp input:not(#inputPassword, #inputPassword2)').serialize()+'&inputPassword='+md5($('#signUp #inputPassword').val()), function(data) {
				if(data == 'success'){
					$('.loged_btn').css('display','inline-block');
					$('.loged_td').css('display','table-cell');
					$('.not_loged_btn').css('display','none');
					$('#signUp .btn-default').click();
				} else if('exists'){
					alert('Email already exists!');
				} else {
					alert('Something went wrong! Please contact administrators!');
				}
			})
		  } else {
			$('#signUp .has-error:first').find('input').focus();
		  }
	  })
	  $(document).on('click', '#profile .btn-primary', function(e){
		  var error = false;
		  if($('#profile #inputFirstName').val().length < 3){
			  $('#profile #inputFirstName').parent().parent().removeClass('has-success').addClass('has-error');
			  error = true;
		  } else {
			  $('#profile #inputFirstName').parent().parent().removeClass('has-error').addClass('has-success');
		  }
		  if($('#profile #inputLastName').val().length < 3){
			  $('#profile #inputLastName').parent().parent().removeClass('has-success').addClass('has-error');
			  error = true;
		  } else {
			  $('#profile #inputLastName').parent().parent().removeClass('has-error').addClass('has-success');
		  }
		  if($('#profile #inputCurrentPassword').val().length < 3){
			  $('#profile #inputCurrentPassword').parent().parent().removeClass('has-success').addClass('has-error');
			  error = true;
		  } else {
			  $('#profile #inputCurrentPassword').parent().parent().removeClass('has-error').addClass('has-success');
		  }
		  if(!isEmail($('#profile #inputEmail').val())){
			  $('#profile #inputEmail').parent().parent().removeClass('has-success').addClass('has-error');
			  error = true;
		  } else {
			  $('#profile #inputEmail').parent().parent().removeClass('has-error').addClass('has-success');
		  }
		  if(($('#profile #inputNewPassword').val() != '' ) && ($('#profile #inputNewPassword').val().length < 3 || $('#profile #inputNewPassword').val() != $('#profile #inputNewPassword2').val())){
			  $('#profile #inputNewPassword').parent().parent().removeClass('has-success').addClass('has-error');
			  $('#profile #inputNewPassword2').parent().parent().removeClass('has-success').addClass('has-error');
			  error = true;
		  } else {
			  $('#profile #inputNewPassword').parent().parent().removeClass('has-error').addClass('has-success');
			  $('#profile #inputNewPassword2').parent().parent().removeClass('has-error').addClass('has-success');
		  }
		  if(!error){
			$.post(url+'ajax.php?mode=edit_prodile',$(document).find('#profile input:not(#inputCurrentPassword, #inputNewPassword, #inputNewPassword2)').serialize()+'&inputCurrentPassword='+md5($('#profile #inputCurrentPassword').val())+'&inputNewPassword='+md5($('#profile #inputNewPassword').val()), function(data) {
				if(data == 'success'){
					$('#profile .btn-default').click();
				} else {
					$('#profile #inputCurrentPassword').parent().parent().removeClass('has-success').addClass('has-error');
					$('#profile .has-error:first').find('input').focus();
				}
			})
		  } else {
			$('#signUp .has-error:first').find('input').focus();
		  }
	  })
	  $(document).on('click', '#newIssue .btn-primary', function(e){
		  var error = false;
		  if($('#newIssue #inputTitle').val().length < 3){
			  $('#newIssue #inputTitle').parent().parent().removeClass('has-success').addClass('has-error');
			  error = true;
		  } else {
			  $('#newIssue #inputTitle').parent().parent().removeClass('has-error').addClass('has-success');
		  }
		  if($('#newIssue #inputDescription').val().length < 3){
			  $('#newIssue #inputDescription').parent().parent().removeClass('has-success').addClass('has-error');
			  error = true;
		  } else {
			  $('#newIssue #inputDescription').parent().parent().removeClass('has-error').addClass('has-success');
		  }

		  if(!error){
			$.post(url+'ajax.php?mode=add_bug',$(document).find('#newIssue input, #newIssue select, #newIssue textarea').serialize(), function(data) {
				$('.table-striped tbody').prepend(data);
				$('#newIssue .btn-default').click();
				$('#newIssue #inputTitle').val('');
				$('#newIssue #inputState').val('0');
				$('#newIssue #inputDescription').val('');
			})
		  } else {
			$('#newIssue .has-error:first').find('input').focus();
		  }
	  })
	  $(document).on('click', '#editIssue .btn-primary', function(e){
		  var id = $(this).data('id');
		  var author = $('.bug-'+id).find('.author').text();
		  var $emel = $('.bug-'+id);
		  var error = false;
		  if($('#editIssue #inputTitle').val().length < 3){
			  $('#editIssue #inputTitle').parent().parent().removeClass('has-success').addClass('has-error');
			  error = true;
		  } else {
			  $('#editIssue #inputTitle').parent().parent().removeClass('has-error').addClass('has-success');
		  }
		  if($('#editIssue #inputDescription').val().length < 3){
			  $('#editIssue #inputDescription').parent().parent().removeClass('has-success').addClass('has-error');
			  error = true;
		  } else {
			  $('#editIssue #inputDescription').parent().parent().removeClass('has-error').addClass('has-success');
		  }

		  if(!error){
			$.post(url+'ajax.php?mode=edit_bug','author='+author+'&id='+id+'&'+$(document).find('#editIssue input, #editIssue select, #editIssue textarea').serialize(), function(data) {
				$emel.after(data);
				$emel.remove();
				$('#editIssue .btn-default').click();
				$('#editIssue #inputTitle').val('');
				$('#editIssue #inputState').val('0');
				$('#editIssue #inputDescription').val('');
			})
		  } else {
			$('#editIssue .has-error:first').find('input').focus();
		  }
	  })
	  $(document).on('click', '#signIn .btn-primary', function(e){
		$.post(url+'ajax.php?mode=sign_in',$(document).find('#signIn input:not(#inputPassword)').serialize()+'&inputPassword='+md5($('#signIn #inputPassword').val()), function(data) {
			if(data == 'success'){
				$('.loged_btn').css('display','inline-block');
				$('.loged_td').css('display','table-cell');
				$('.not_loged_btn').css('display','none');
				$('#signIn .btn-default').click();
			} else {
				$('#signIn #inputEmail').parent().parent().removeClass('has-error').addClass('has-error');
				$('#signIn #inputPassword').parent().parent().removeClass('has-error').addClass('has-error');
				$('#signIn .has-error:first').find('input').focus();
			}
		})
	  })
	  $(document).on('click', '#signOut .btn-primary', function(e){
		$.post(url+'ajax.php?mode=sign_out');
		$('.loged_btn').css('display','none');
		$('.loged_td').css('display','none');
		$('.not_loged_btn').css('display','inline-block');
		$('#signOut .btn-default').click();
	  })
	  $(document).on('click', '.user_info', function(e){
		$.post(url+'ajax.php?mode=user_info', function(data) {
			data = $.parseJSON(data);
			$('#profile #inputFirstName').val(data.first_name)
			$('#profile #inputLastName').val(data.last_name)
			$('#profile #inputEmail').val(data.email)
			$('#profile #inputCurrentPassword').val('');
			$('#profile #inputNewPassword').val('');
			$('#profile #inputNewPassword2').val('');
		})
	  })
	  $(document).on('click', '.edit_bug_info', function(e){
		  $('#editIssue .btn-primary').data('id', $(this).data('id'));
			var desc = $('#collapseOnePanel'+$(this).data('id')).children().text();
			var title = $(this).parent().parent().find('.b_title').text();
			var state = $(this).parent().parent().find('.b_state').data('id');
			$('#editIssue #inputTitle').val(title);
			$('#editIssue #inputState').val(state);
			$('#editIssue #inputDescription').val(desc);
	  })
	  $(document).on('click', '.del_bug', function(e){
		  $('#deleteIssue .btn-primary').data('id', $(this).data('id'));
	  })
	  $(document).on('click', '#deleteIssue .btn-primary', function(e){
		var id = $(this).data('id');
		$('.bug-'+id).remove();
		$.post(url+'ajax.php?mode=delete_bug', {'id': id});
		$('#deleteIssue .btn-default').click();
	  })
	  $(document).on('change', 'input[type="checkbox"]', function(e){
		$('.table-striped tbody .panel-collapse').removeClass('in').attr('aria-expanded', 'false').attr('style', '');
		var states = [];
		var search = $('.search').val();
		$('input[type="checkbox"]:checked').each(function(e){
			states.push($(this).parent().text().trim());
		})
		$('.table-striped tbody tr:not(.panel-collapse)').each(function(e){
			if(states.indexOf($(this).find('.b_state').text().trim()) === -1  && (search.length > 3 && ($(this).find('.author').text().trim().includes(search) || $(this).find('.b_title').text().trim().includes(search))) ){
				$(this).css('display', 'table-row');
			} else if(states.indexOf($(this).find('.b_state').text().trim()) === -1  && search.length <= 3) {
				$(this).css('display', 'table-row');
			} else {
				$(this).css('display', 'none');
			}
		})
	  })
	  $(document).on('keyup cut paste', '.search', function(e){
		  delay(function(){
		$('.table-striped tbody .panel-collapse').removeClass('in').attr('aria-expanded', 'false').attr('style', '');
		var states = [];
		var search = $('.search').val();
		$('input[type="checkbox"]:checked').each(function(e){
			states.push($(this).parent().text().trim());
		})
		$('.table-striped tbody tr:not(.panel-collapse)').each(function(e){
			if(states.indexOf($(this).find('.b_state').text().trim()) === -1  && (search.length > 3 && ($(this).find('.author').text().trim().includes(search) || $(this).find('.b_title').text().trim().includes(search))) ){
				$(this).css('display', 'table-row');
			} else if(states.indexOf($(this).find('.b_state').text().trim()) === -1  && search.length <= 3) {
				$(this).css('display', 'table-row');
			} else {
				$(this).css('display', 'none');
			}
		})
		}, 500);
	  })
  })
  </script>
</body>
</html>