<?php include 'header.php'; ?>
<div class="container">
	<div class="row" style="margin-top:10%">
		<div class="col-lg-1"></div>
		<div class="col-lg-4">
			<form action="functions/login.php" method="post">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<i class="fa fa-lock"></i> Sign In
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label>Username:</label>
							<input type="text" class="form-control" name="login_username">
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input type="password" class="form-control" name="login_pass">
						</div>
					</div>
					<div class="panel-footer">
						<button type="submit" class="btn btn-info" id="btnSignIn">Sign In</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-lg-6">
			<form id="frmSignUp" enctype="multipart/form-data" action="functions/register.php" method="post">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<i class="fa fa-users"></i> Sign Up
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label>Display Name:</label>
							<input type="text" class="form-control" id="txtName" name="name">
						</div>
						<div class="form-group">
							<label>Username:</label>
							<input type="text" class="form-control" id="txtUser" name="reg_username">
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input type="password" class="form-control" id="txtPass" name="reg_pass">
						</div>
					</div>
					<div class="panel-footer">
					<input type="submit" class="btn btn-warning" id="btnSignUp" name="action" value="Sign Up">
					</div>
				</div>
			</form>
		</div>
		<div class="col-lg-1"></div>
	</div>
</div>
<?php include 'footer.php'; ?>