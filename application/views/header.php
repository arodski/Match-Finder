<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css" media="screen">
	</head>
	<body>
		<nav class="navbar navbar-static-top navbar-inverse" role="navigation">
			<div class="container-fluid">	
				<a class="logo" href="<?php echo base_url() . 'main/home'?>"><img src="../images/match_finder_logo_copy.png" alt="MatchFinder soccer ball logo"></a>			
				<?php if($this->session->userdata('is_logged_in')) { ?>
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
	        				<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="navbar-ex">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php echo base_url() . 'main/home'?>">Home</a></li>
							<li><a href="<?php echo base_url() . 'main/find_match'?>">Find Match</a></li>
							<li><a href="<?php echo base_url() . 'main/history'?>">Match History</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
								<ul class="dropdown-menu">
									<?php echo "<li><a class='navbar-link' href=" . base_url() . "main/account>" . $this->session->userdata('email') . "</a></li>"; ?>
									<?php echo "<li><a class='navbar-link' href=" . base_url() . 'main/logout' . ">Log Out</a></li>"; ?>
								</ul>
							</li>
						</ul>
					</div>
				<?php 
				} 
				else {
					echo "<div class='btn-group navbar-button'>";
						echo "<a class='btn btn-default' href=" . base_url() . "main/login" . ">Sign In</a>";
						echo "<a class='btn btn-warning' href=" . base_url() . "main/signup" . ">Join Now</a>";
					echo "</div>";
				}
				?>
			</div>
		</nav>

		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../bootstrap/jquery-2.1.0.min.js"></script>
	</body>
</html>