<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
	</head>
	<body>
		<center>
			<div class="well" style="width:40%;">
				<?php echo validation_errors(); ?>
				<?php echo form_open('main/login_validation'); ?>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="email" id="email" value="<?php echo $this->input->post('email') ?>" class="form-control" style="width:90%" placeholder="Enter email"/>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" name="password" id="password" class="form-control" style="width:90%" placeholder="Password"/> 
					</div>
					<div class="form-group">
						<input type="submit" name="login_submit" id="login_submit" class="form-control btn btn-primary" style="width:20%" value="Login"/> 
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