<!DOCTYPE html>
<html>
	<head>
		<title>MatchFinder</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
	</head>

	<body>
		<!-- Two navigation bars at the top of the page. 
		Top most contains form and lower containes links to the other pages.-->
		<div class="navbar navbar-static-top navbar-inverse">
			<div class="navbar-inner">
				<img src="../images/match_finder_logo.png" class="navbar-brand">

				<ul class="nav navbar-nav navbar-right">
					<?php
					if($this->session->userdata('is_logged_in') != 1) { 
						echo "<li><a class='btn btn-xs btn-default navbar-link' href=" . base_url() . "main/login" . ">Sign In</a></li>";
						echo "<li>||</li>";
						echo "<li><a class='btn btn-xs btn-warning navbar-link' href=" . base_url() . "main/signup" . ">Join Now</a></li>";
					}
					else {
						echo "<li><a class='navbar-link' href=" . base_url() . "main/account>" . $this->session->userdata('email') . "</a></li>";
					}
					?>
				</ul>
			</div>
		</div>
		<div class="navbar navbar-static-top navbar-default">
			<div class="navbar-inner">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url() . 'main/home'?>">Home</a></li>
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">Teams <span class="caret"></span></a>
						<ul class="dropdown-menu">
				  			<?php
							foreach($queryCountry->result() as $row) {
								echo "<li class='dropdown-submenu'>";
									echo "<a href=" . "#>" . $row->country . "</a>";

									$this->db->select('league');
									$this->db->where('country', $row->country); 
									$query = $this->db->get('leagues');
									
									echo "<ul class='dropdown-menu'>";
										foreach ($query->result() as $row) {
											echo "<li class='dropdown-submenu'>";
												echo "<a href=" . "#>" . $row->league . "</a>";

												$this->db->select('team');
												$this->db->where('league', $row->league); 
												$query = $this->db->get('teams');

												echo "<ul class='dropdown-menu'>";
													foreach($query->result() as $row) {
														echo "<li>";
															$team_no_spaces = str_replace(' ', '_', $row->team);
															$team_no_spaces = str_replace("'", '~', $team_no_spaces);
															echo "<a href=" . base_url() . "main/selected_team/" . $team_no_spaces . ">" . $row->team . "</a>";
														echo "</li>";
													}
												echo "</ul>";
											echo "</li>";
										}
									echo "</ul>";
								echo "</li>";
							}
							?>
						</ul>
					</li>
					<li><a href="<?php echo base_url() . 'main/find_match'?>">Find Match</a></li>
					<li><a href="<?php echo base_url() . 'main/history'?>">See Match History</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php
					if($this->session->userdata('is_logged_in') == 1)
						echo "<li><a class='navbar-link' href=" . base_url() . 'main/logout' . ">Log Out</a></li>";
					?>
				</ul>
			</div>
		</div>

		<br/><br/>

		<script src="../bootstrap/js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../bootstrap/jquery-2.0.3.js"></script>
		<script src="../scripts/loadContent.js"></script>
	</body>
<html>