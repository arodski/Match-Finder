<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Match Result</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css" media="screen">
	</head>
	<body>
		<h1>Match Result.</h1>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
					<div class="well">
						<form class="form-horizontal" action="save_match_record" method="post">
							<div class="form-group">
								<div class="col-xs-3 col-xs-offset-1">
									<?php echo "<h4>" . $this->session->userdata('team') . "</h4>"; ?>
								</div>
								<div class="col-xs-2 col-xs-offset-1">
									<?php echo "<h4>vs.</h4>"; ?>
								</div>
								<div class="col-xs-3 col-xs-offset-1">	
									<?php echo "<h4>" . $this->session->userdata('opponent') . "</h4>"; ?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-4 col-xs-offset-1">
									<?php echo "<input type='text' class='form-control' name='user_score' id='user_score' placeholder='Score'/>"; ?>
									<?php echo form_error('user_score'); ?>
								</div>
								<div class="col-xs-4 col-xs-offset-2">
									<?php echo "<input type='text' class='form-control' name='opponent_score' id='opponent_score' placeholder='Score'/>" ?>
									<?php echo form_error('opponent_score'); ?>
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-xs-2 col-xs-offset-1">Email:</label>
								<div class="col-xs-8">
									<input type="text" class="form-control" name="opponent_email" id="opponent_email" placeholder="Enter opponent's email"/>
									<?php echo form_error('opponent_email'); ?>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-2 col-xs-offset-5">
									<input type="submit" class="btn btn-primary" value="Submit"/>
								</div>
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