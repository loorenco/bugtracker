<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
  
  <title>Issue Tracker</title>
  
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
.input-group {
   // display: inline-table;
   // vertical-align: bottom;
}
.mb10 {
	margin-bottom: 10px;
}
.left {
	//float: left;
}
.right {
	//float: right;
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
  </style>
  
</head>

<body>

  <div class="container">
  

 <div class="col-sm-12 col-lg-12 header-nav">
 <div class="col-sm-6 col-lg-6">
  <h1>Issue Tracker</h1>
  </div>
  <div class="col-sm-6 col-lg-6 text-right"><h1>
  
		<a data-toggle="modal" href="#signIn" class="btn btn-primary mb10 right">Sign In</a>
		<a data-toggle="modal" href="#signUp" class="btn btn-primary mb10 right">Sign Up</a>

		<a data-toggle="modal" href="#newIssue" class="btn btn-primary mb10 right">New Issue</a>
		<a data-toggle="modal" href="#profile" class="btn btn-primary mb10 right">Profile</a>
		<a data-toggle="modal" href="#signOut" class="btn btn-primary mb10 right">Sign Out</a>
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
						  <input type="text" class="form-control" id="inputEmail" placeholder="Email">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword" class="col-lg-2 control-label">Password</label>
						<div class="col-lg-10">
						  <input type="password" class="form-control" id="inputPassword" placeholder="Password">
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
						  <input type="text" class="form-control" id="inputTitle" placeholder="Title">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputState" class="col-lg-2 control-label">State</label>
						<div class="col-lg-10">
						  <select class="form-control" id="inputState">
							<option>New</option>
							<option>Open</option>
							<option>Fixed</option>
							<option>Closed</option>
						  </select>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputDescription" class="col-lg-2 control-label">Description</label>
						<div class="col-lg-10">
						  <textarea class="form-control" id="inputDescription" rows="3" placeholder="Description"></textarea>
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
						  <input type="text" class="form-control" id="inputTitle" placeholder="Title">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputDate" class="col-lg-2 control-label">Date</label>
						<div class="col-lg-10">
						  <input type="text" class="form-control" id="inputDate" placeholder="Date">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputState" class="col-lg-2 control-label">State</label>
						<div class="col-lg-10">
						  <select class="form-control" id="inputState">
							<option>New</option>
							<option>Open</option>
							<option>Fixed</option>
							<option>Closed</option>
						  </select>
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputDescription" class="col-lg-2 control-label">Description</label>
						<div class="col-lg-10">
						  <textarea class="form-control" id="inputDescription" rows="3" placeholder="Description"></textarea>
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
						  <input type="text" class="form-control" id="inputFirstName" placeholder="First Name">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputLastName" class="col-lg-3 control-label">Last Name</label>
						<div class="col-lg-9">
						  <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail" class="col-lg-3 control-label">Email</label>
						<div class="col-lg-9">
						  <input type="text" class="form-control" id="inputEmail" placeholder="Email">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword" class="col-lg-3 control-label">Password</label>
						<div class="col-lg-9">
						  <input type="password" class="form-control" id="inputPassword" placeholder="Password">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword2" class="col-lg-3 control-label">Repeat Password</label>
						<div class="col-lg-9">
						  <input type="password" class="form-control" id="inputPassword2" placeholder="Repeat Password">
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
						  <input type="text" class="form-control" id="inputFirstName" placeholder="First Name">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputLastName" class="col-lg-4 control-label">Last Name</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" id="inputLastName" placeholder="Last Name">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail" class="col-lg-4 control-label">Email</label>
						<div class="col-lg-8">
						  <input type="text" class="form-control" id="inputEmail" placeholder="Email">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputCurrentPassword" class="col-lg-4 control-label">Current Password</label>
						<div class="col-lg-8">
						  <input type="password" class="form-control" id="inputCurrentPassword" placeholder="Current Password">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputNewPassword" class="col-lg-4 control-label">New Password</label>
						<div class="col-lg-8">
						  <input type="password" class="form-control" id="inputNewPassword" placeholder="New Password">
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputNewPassword2" class="col-lg-4 control-label">Repeat New Password</label>
						<div class="col-lg-8">
						  <input type="password" class="form-control" id="inputNewPassword2" placeholder="Repeat New Password">
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
              <input type="text" class="form-control" placeholder="Search">
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
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>bug 1</td>
                  <td>admin</td>
                  <td>
					<span class="label label-info pull-left" data-effect="pop">New</span>
				  </td>
                  <td>25 Mar 2016 16:40</td>
                  <td>
					<a data-toggle="modal" href="#editIssue" class="btn btn-primary btn-sm">Edit</a>
					<a data-toggle="modal" href="#deleteIssue" class="btn btn-warning btn-sm">Delete</a>
				  </td>
                </tr>
				<tr>
                  <td>2</td>
                  <td>bug 2</td>
                  <td>admin</td>
                  <td>
					<span class="label label-warning pull-left" data-effect="pop">Open</span>
				  </td>
                  <td>25 Mar 2016 16:40</td>
                  <td>
					<a class="btn btn-primary btn-sm" href="#">Edit</a>
					<a class="btn btn-warning btn-sm" href="#">Delete</a>
				  </td>
                </tr>
				<tr>
                  <td>3</td>
                  <td>bug 3</td>
                  <td>admin</td>
                  <td>
					<span class="label label-success pull-left" data-effect="pop">Fixed</span>
				  </td>
                  <td>25 Mar 2016 16:40</td>
                  <td>
					<a class="btn btn-primary btn-sm" href="#">Edit</a>
					<a class="btn btn-warning btn-sm" href="#">Delete</a>
				  </td>
                </tr>
				<tr>
                  <td>4</td>
                  <td>bug 4</td>
                  <td>admin</td>
                  <td>
					<span class="label label-default pull-left" data-effect="pop">Closed</span>
				  </td>
                  <td>25 Mar 2016 16:40</td>
                  <td>
					<a class="btn btn-primary btn-sm" href="#">Edit</a>
					<a class="btn btn-warning btn-sm" href="#">Delete</a>
				  </td>
                </tr>
                
              </tbody>
            </table>
			<div class="col-sm-12 col-lg-12">
	<ul class="pagination">
          <li><a href="#">«</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li class="disabled"><a href="#">»</a></li>
        </ul>
      </div>
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
  
  <!-- Bootstrap 3 has typeahead optionally
  <script src="assets/js/typeahead.min.js"></script> -->

</body>
</html>