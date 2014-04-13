<!DOCTYPE html>
<html lang="en">
	<head>
		<title>History</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css" media="screen">
	</head>
	<body>
		<h1>Previous Matches.</h1>

		<div class="container-fluid">
			<?php 
			if(!empty($match_records)) {
				foreach($match_records as $team => $data) {
					if($data) {
						echo '<div class="row">';
							echo '<div class="col-xs-10 col-xs-offset-1">';
								echo "<div class='panel panel-default' >";
									echo "<div class='panel-heading'>";
										echo "<table>";
											echo "<tr>";
												echo "<td width='87.9%'>"; 
													echo "<h1 class='text-left panel-title'>" . $data['user_team'] . " vs. " . $data['opponent_team'] . "</h1>";
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
											echo " Loss";
										else
											echo " Draw";
									echo "</div>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
					}
				}
			}
			?>
		</div>

		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../bootstrap/jquery-2.1.0.min.js"></script>
	</body>
<html>