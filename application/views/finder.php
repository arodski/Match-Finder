<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Similar Rated Teams</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css" media="screen">
	</head>
	<body>
		<div class="list-group">
			<?php
			$current_league = "";
			foreach($similar_teams as $team) {
				if($current_league != $team['league']) {
					$current_league = $team['league'];
					echo "<h2 class='text-left'>". $team['league'] ."</h2>";
				}

				$team_no_spaces = str_replace(' ', '_', $team['name']);
				$team_no_spaces = str_replace("'", '~', $team_no_spaces);
				echo "<a class='list-group-item' href=" . base_url() . "main/match_result/" . $team_no_spaces . ">";
					echo "<dl class='dl-horizontal'>";
						echo "<dt>Name:</dt>";
						echo "<dd>" . $team['name'] . "</dd>";

						echo "<dt>Attack:</dt>";
						echo "<dd>" . $team['attack'] . "</dd>";

						echo "<dt>Midfield:</dt>";
						echo "<dd>" . $team['midfield'] . "</dd>";

						echo "<dt>Defense:</dt>";
						echo "<dd>" . $team['defense'] . "</dd>";
					echo "</dl>";
				echo "</a>";
			}
			?>
		</div>

		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../bootstrap/jquery-2.1.0.min.js"></script>
	</body>
</html>