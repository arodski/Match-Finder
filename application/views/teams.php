<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Teams</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css" media="screen">
		<link type="text/css" rel="stylesheet" href="../bootstrap/css/style.css" media="screen">
	</head>
	<body>
		<div class="container-fluid">
			<?php
			$team = $this->session->userdata('team');
			echo "<h2 class='text-left'>" . $team . "</h2>";	
			?>
			<hr>
			<div id="current_ratings_div">
				<dl class='dl-horizontal'>
					<dt>Attack:</dt>
					<dd> <?php echo $attack; ?> </dd>

					<dt>Midfield:</dt>
					<dd> <?php echo $midfield ?> </dd>

					<dt>Defense:</dt>
					<dd> <?php echo $defense ?> </dd>

					<dd><button id="edit_ratings_btn" type='button' class='btn btn-link'>Edit</button></dd>
				</dl>
			</div>
			<div id="edit_ratings_div">
				<form action="team_ratings" method="post"> 
					<dl class='dl-horizontal'>
						<dt>Attack:</dt>
						<dd><input type="text" name="edit_attack" id="edit_attack" value="<?php echo $attack; ?>"/></dd>


						<dt>Midfield:</dt>
						<dd><input type="text" name="edit_midfield" id="edit_midfield" value="<?php echo $midfield; ?>"/></dd>

						<dt>Defense:</dt>
						<dd><input type="text" name="edit_defense" id="edit_defense" value="<?php echo $defense; ?>"/></dd>

						<dd>
							<input type='submit' class='btn btn-primary' value="Change"/>
							<button id="cancel_btn" type='button' class='btn btn-link'>Cancel</button>
						</dd>
					</dl>
				</form>
			</div>
			<?php
			$email = $this->session->userdata('email');
			
			echo "<h6><strong>Last Updated By: </strong>" . $updated_email . "</h6>";
			echo "<h6>" . $updated_date . "</h6>";

			echo "<hr>";

			echo "<a href=" . base_url() . 'main/add_fav_team' . ">Add to Favorite Teams<a>";
			?>
		</div>

		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../bootstrap/jquery-2.1.0.min.js"></script>
		<script src="../scripts/loadContent.js"></script>
	</body>
</html>