<!DOCTYPE html>
<html>
	<head>
		<title>Sign Up</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
	</head>
	<body>
		<center>
			<h1>Join Now.</h1>
			<h6>Create a free account and search for teams!</h6>

			<div class="well" style="width:40%;">
				<?php echo validation_errors(); ?>
				<?php echo form_open('main/signup_validation'); ?>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="email" id="email" value="<?php echo $this->input->post('email') ?>" class="form-control" style="width:90%" placeholder="Enter email"/>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" name="password" id="password" class="form-control" style="width:90%" placeholder="Password"/> 
					</div>
					<div class="form-group">
						<label for="cpassword">Confirm Password:</label>
						<input type="password" name="cpassword" id="cpassword" class="form-control" style="width:90%" placeholder="Confirm password"/> 
					</div>
					<div class="form-group">
						<input type="submit" name="signup_submit" id="signup_submit" class="form-control btn btn-primary" style="width:20%" value="Sign Up"/> 
					</div>
				</form>
			</div>
		</center>

		<script src="../bootstrap/js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../jquery-2.0.3.js"></script>
		<script src="../loadContent.js"></script>
	</body>
</html>