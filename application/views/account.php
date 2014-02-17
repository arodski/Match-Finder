<!DOCTYPE html>
<html>
	<head>
		<title>Account Settings</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
	</head>
	<body>
		<center>
			<h1>Account Settings.</h1>

			<div class="well" style="width:40%;">
				<dl class="dl-horizontal">
					<dt>Email:</dt>
					<dd> <?php echo $this->session->userdata('email')?> </dd>

					<dt>Change password:</dt>
					<dd>
						<?php echo validation_errors(); ?>
						<?php echo form_open('main/change_password'); ?>
							<div class="form-group">
								<input type="password" name="password" id="password" placeholder="Password"/> 
							</div>
							<div class="form-group">
								<input type="submit" name="changep_submit" id="changep_submit" class="btn btn-primary" value="Change"/> 
							</div>
						</form>
					</dd>
					<dd><a href="<?php echo base_url() . 'main/delete_account'?>">Delete Account</a></dd>

					<hr>

					<dt>Favorite Teams:</dt>
					<dd>
						<ul>
							<li><?php echo $fav_team1 ?></li>
							<li><?php echo $fav_team2 ?></li>
							<li><?php echo $fav_team3 ?></li>
						</ul>
					</dd>
				</dl>
			</div>
		</center>
	</body>
</html>