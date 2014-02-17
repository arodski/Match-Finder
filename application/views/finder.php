<!DOCTYPE html>
<hmtl>
	<head>
		<title>Find Match</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
	</head>
	<body>
		<div class="list-group">
			<?php
			$current_league = "";
			foreach($similar_teams as $team) {
				if($current_league != $team['league']) {
					$current_league = $team['league'];
					echo "<h3>". $team['league'] ."</h3>";
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

		<script src="../bootstrap/js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../jquery-2.0.3.js"></script>
		<script src="../loadContent.js"></script>
	</body>
</html>