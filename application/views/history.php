<!DOCTYPE html>
<html>
	<head>
		<title>MatchFinder</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
	</head>

	<body>
		<?php 
		if(!empty($match_records)) {
			foreach($match_records as $team => $data) {
				if($data) {
					echo "<div class='panel panel-default' >";
						echo "<div class='panel-heading'>";
							echo "<table>";
								echo "<tr>";
									echo "<td width='87.9%'>"; 
										echo "<h3 class='panel-title'>" . $data['user_team'] . " vs. " . $data['opponent_team'] . "</h3>";
									echo "</td>";
									echo "<td>";
										echo "<h6 class='panel-title' align='right'>" . $data['date_posted'] . "</h6>";
									echo "</td>";
								echo "</tr>";
							echo "</table>";
						echo "</div>";
						echo "<div class='panel-body'>";
							echo "Final Score: " . $data['user_score'] . " - " . $data['opponent_score'];
							if($data['user_score'] > $data['opponent_score'])
								echo " Win";
							else if($data['user_score'] < $data['opponent_score'])
								echo " Lost";
							else
								echo " Draw";
						echo "</div>";
					echo "</div>";
				}
			}
		}
		?>

		<script src="../bootstrap/js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../bootstrap/jquery-2.0.3.js"></script>
		<script src="../scripts/loadContent.js"></script>
	</body>
<html>