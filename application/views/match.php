<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Search Teams</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css" media="screen">
	</head>
	<body>
		<div class="well">
			<form class="form-inline" action="find_match" method="post">
				<div class="form-group">
					<label for="attack">Attack:</label>
					<input type="search" name="attack_min" id="attack_min" value="<?php echo $this->input->post('attackMin') ?>" placeholder="min"/>
					<input type="search" name="attack_max" id="attack_max" value="<?php echo $this->input->post('attackMax') ?>" placeholder="max"/>
				</div>
				<div class="form-group">
					<label for="midfield">Midfield:</label>
					<input type="search" name="midfield_min" id="midfield_min" value="<?php echo $this->input->post('midfieldMin') ?>" placeholder="min"/>
					<input type="search" name="midfield_max" id="midfield_max" value="<?php echo $this->input->post('midfieldMax') ?>" placeholder="max"/>
				</div>
				<div class="form-group">
					<label for="defense">Defense:</label>
					<input type="search" name="defense_min" id="defense_min" value="<?php echo $this->input->post('defenseMin') ?>" placeholder="min"/>
					<input type="search" name="defense_max" id="defense_max" value="<?php echo $this->input->post('defenseMax') ?>" placeholder="max"/>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default btn-sm" name="search_submit" id="search_submit" value="Search"/> 
				</div>
			</form>
		</div>
		
		<p class="text-center"> ---or Click Your Favorite Team--- </p>
		<br/>
		<table align="center">
			<tr>
				<?php
				if(!empty($favTeams)) { 
					foreach($favTeams as $team => $fav) {
						if($fav) {
							$fav_no_spaces = str_replace(' ', '_', $fav);
							$fav_no_spaces = str_replace("'", '~', $fav_no_spaces);
							echo "<td><a href=" . base_url() . "main/find_similar_team/" . $fav_no_spaces . "><img src='../images/logos/" . $fav . ".gif'></a></td>";
						}
					}
				}
				?>
			</tr>
		</table>

		<hr>

		<div class="list-group">
			<?php
			if($teams_filtered != 0) {
				foreach ($teams_filtered as $key => $team) {
					$team_no_spaces = str_replace(' ', '_', $team['name']);
					$team_no_spaces = str_replace("'", '~', $team_no_spaces);
					echo "<a class='list-group-item' href=" . base_url() . "main/selected_team/" . $team_no_spaces . "><strong>" . $team['name'] . "</strong>" . " - A:" . $team['attack'] . " M:" . $team['midfield'] . " D:" . $team['defense'] . "</a>";
				}
			}
			?>
		</div>

		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../bootstrap/jquery-2.1.0.min.js"></script>
	</body>
</html>