<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css" media="screen">
		<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:800,600'>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css" media="screen">
	</head>
	<body>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item active">
					<img class="img-banner" src="../images/fifabanner1.jpg" alt="FIFA banner 1">
					<div class="carousel-caption">
						<h1 class="carousel-text">SEARCH.</h1>
					</div>
				</div>
				<div class="item">
					<img class="img-banner" src="../images/fifabanner3.jpg" alt="FIFA banner 2">
					<div class="carousel-caption">
						<h1 class="carousel-text">MATCH.</h1>
					</div>
				</div>
				<div class="item">
					<img class="img-banner" src="../images/fifabanner2.jpg" alt="FIFA banner 3">
					<div class="carousel-caption">
						<h1 class="carousel-text">PLAY.</h1>
					</div>
				</div>
			</div>

			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>

		<div class="info-text container-fluid">
			<div class="row info-content">
				<div class="col-xs-4 col-sm-4 col-md-4">
					<div class=" center-block glyphicon-circle">
						<span class="glyphicon glyphicon-search"></span>
					</div>
					<h4>What is MatchFinder?</h4>
					<h4><small>MatchFinder is a tool used to quickly and easily find a fair match when playing with friends locally.</small></h4>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4">
					<div class=" center-block glyphicon-circle glyphicon-green">
						<span class="glyphicon glyphicon-resize-small"></span>
					</div>
					<h4>Who is it for?</h4>
					<h4><small>Built for FIFA enthusiast. MatchFinder lets you search for similar rated teams.</small></h4>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4">
					<div class=" center-block glyphicon-circle glyphicon-yellow">
						<span class="glyphicon glyphicon-play-circle"></span>
					</div>
					<h4>Why use it?</h4>
					<h4><small>Life is too short to manually search through over 600 clubs. Narrow down your choices faster.</small></h4>
				</div>
			</div>
		</div>
		
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="../bootstrap/jquery-2.1.0.min.js"></script>
	</body>
</html>