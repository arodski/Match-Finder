<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Sign Up</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css" media="screen">
		<link type="text/css" rel="stylesheet" href="../bootstrap/css/style.css" media="screen">
	</head>
	<body>
		<h1>Join Now.</h1>
		<h6 class="text-center">Create a free account and find your perfect match!</h6>

		<div clas="container-fluid">
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
					<div class="well">
						<?php echo form_open('main/signup_validation'); ?>
							<div class="form-group">
								<label for="email">Email</label><br>
								<input type="text" class="form-control" name="email" id="email" value="<?php echo $this->input->post('email') ?>" placeholder="Your email"/>
								<?php echo form_error('email'); ?>
							</div>
							<div class="form-group">
								<label for="password">Password</label><br>
								<input type="password" class="form-control" name="password" id="password" placeholder=" New Password"/> 
								<?php echo form_error('password'); ?>
							</div>
							<div class="form-group">
								<label for="cpassword">Confirm Password</label><br>
								<input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm password"/> 
								<?php echo form_error('cpassword'); ?>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" name="signup_submit" id="signup_submit" value="Sign Up"/> 
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