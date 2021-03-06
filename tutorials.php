<!DOCTYPE html>
<html>
	<head>
		<title>Tutorials</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.lettering.js"></script>
		<!-- Custom Theme files -->
		<!--theme-style-->
		<link href="css/style.css?v=1.3" rel="stylesheet" type="text/css" media="all" />	
		 <link href="https://cdn.jsdelivr.net/jquery.sidr/2.2.1/stylesheets/jquery.sidr.dark.min.css" rel="Stylesheet" />
		<!--//theme-style-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Scientist Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<?php
			include_once('includes/dbconnect.php');
			$sql = 'Select Header From Settings';
			$result = $connection->query($sql);
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();
				echo($row['Header']);
			 }
		?>
	</head>
	<body>
	<!--header-->
		<div id="header" class="purple" style="width:100%">
			<div class="container-fluid">
				<a href="index.html"><img src="images/coderdojo.png" class="coderdojo"></a>
				<div class="top-nav container-fluid">
					<span class="menu"><img src="images/menu.png" alt=""> </span>
					<div class="collapse navbar-collapse" id="myNavbar">
						<?php
							include('Content/siteNavigation.php');
						?>		
					</div>		
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<script src="https://cdn.jsdelivr.net/jquery.sidr/2.2.1/jquery.sidr.min.js"></script>
			<script>
				$(document).ready(function (){
					$('.menu').sidr({
						name: 'respNav',
						source: '.navbar-collapse',
						side: 'right'
					});			
				});
				$(document).bind("click", function(){
					$.sidr('close', 'respNav');
				});
			</script>
   		</div>
		<div class="content">
			<div class="container">
				<div class="row tutorials-container">
					<h3 style="text-align:center;">Scratch</h3>
					<div class="tutorial col-md-4">
						<img src="images/tutorial-scratch-shoot-the-ball.png" class="tutorial-type-tumbnail">
						<!-- Allows for this entire div to be a clickable link -->
						<figcaption><a href="tutorial-scratch-shoot-the-balls.php">Shoot the balls<span></span</a></a><figcaption>		
					</div>
				</div>
				<div class="row tutorials-container">
					<h3 style="text-align:center;">Unity 3D</h3>
					<div class="tutorial col-md-4">
						<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Unity_Technologies_logo.svg/2000px-Unity_Technologies_logo.svg.png" class="tutorial-type-tumbnail">
						<!-- Allows for this entire div to be a clickable link -->
						<figcaption><a href="https://unity3d.com/learn/tutorials">Unity 3D tutorials<span></span</a></a><figcaption>		
					</div>
				</div>
			</div>
			<div class="content-right">
				<div class="col-md content-right-top">
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer">
			<div class="container">
				<div class="col-md-4 footer-top">
					<h3><a href="http://www.coderdojo.com">coderdojo</a></h3>
				</div>
				<div class="col-md-4 footer-top1">
					<ul class="social">
						<li><a href="https://www.facebook.com/Coderdojo-Leixlip-216306561898011/?fref=ts"><i class="facebook"> </i></a></li>
						<li><a href="https://twitter.com/LPTCDojo"><i class="twitter"></i></a></li>
					</ul>
				</div>
				<div class="col-md-4 footer-top2">
					<p >Designed by <a href="http://rianscode.com/" target="_blank">Rían Errity</a> | Developed by <a href="http://beattbots.com/" target="_blank">Richard Beattie</a></p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</body>
</html>
