<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Account</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css" media="screen">
	</head>
	<body>
		<h1>Account Information.</h1>

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
					<div class="well">
						<dl class="dl-horizontal">
							<dt>Email</dt>
							<dd> <?php echo $this->session->userdata('email')?> </dd>

							<dt>Change password</dt>
							<dd>
								<?php echo form_open('main/change_password'); ?>
									<div class="form-group">
										<input type="password" class="form-control" name="password" id="password" placeholder="Password"/> 
									</div>
									<?php echo validation_errors(); ?>
									<div class="form-group">
										<input type="submit" class="btn btn-primary" name="changep_submit" id="changep_submit" value="Change"/> 
									</div>
								</form>
							</dd>
							<dd><a href="<?php echo base_url() . 'main/delete_account'?>">Delete Account</a></dd>

							<hr>

							<dt>Favorite Teams</dt>
							<dd><?php echo $fav_team1 ?></dd>
							<dd><?php echo $fav_team2 ?></dd>
							<dd><?php echo $fav_team3 ?></dd>
						</dl>
					</div>
				</div>
			</div>
		</div>

		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../bootstrap/jquery-2.1.0.min.js"></script>
	</body>
</html>