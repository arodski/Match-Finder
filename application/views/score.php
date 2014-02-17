<!DOCTYPE html>
<hmtl>
	<head>
		<title>Score</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
	</head>
	<body>
		<center>
			<div class="well" style="width: 40%" style="text-align: center">
				<form action="save_match_record" method="post">
					<div class="form-group">
						<table>
							<tr align="center">
								<?php
								echo "<td>";
									echo "<h4>" . $this->session->userdata('team') . "</h4>";
									echo "<input type='text' name='user_score' id='user_score' placeholder='Score'/>";
								echo "</td>";
								echo "<td><h4>vs.</h4></td>";
								echo "<td>";
									echo "<h4>" . $this->session->userdata('opponent') . "</h4>";
									echo "<input type='text' name='opponent_score' id='opponent_score' placeholder='Score'/>";
								echo "</td>";
								?>
							</tr>
						</table>
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="opponent_email" id="opponent_email" style="width:50%" placeholder="Enter opponent's email"/>
					</div>
					<table>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Submit"/>
						</div>
					</form>
				</table>
			</div>
		</center>

		<script src="../bootstrap/js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../jquery-2.0.3.js"></script>
		<script src="../loadContent.js"></script>
	</body>
</html>