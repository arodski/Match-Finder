<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css" media="screen">
	</head>
	<body>
		<h1>Log In.</h1>
		<h6 class="text-center">Get matched!</h6>

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
					<div class="well">
						<?php echo form_open('main/login_validation'); ?>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" class="form-control" name="email" id="email" value="<?php echo $this->input->post('email') ?>" placeholder="Enter email"/>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Password"/> 
								<?php echo form_error('email'); ?>	
							</div>
							<div class="form-group">
								<input type="submit"  class="btn btn-primary" name="login_submit" id="login_submit" value="Login"/> 
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../bootstrap/jquery-2.1.0.min.js"></script>
	</body>
</html>