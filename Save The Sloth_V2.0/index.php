<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Save The Sloth</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

	<div id="header">
		<div>
			<div id="logo">
				<a href="index.php"><img src="images/Logo.png" alt="Logo" /></a>
			</div>
			<div id="navigation">
				<div>
					<ul>
						<li class="current"><a href="index.php"> Home </a></li>
						<li><a href="donate.php"> Donate </a></li>
						<li><a href="contact.php"> Contact Us </a></li>
						<li><a href="about.php"> About Sloths </a></li>
						<li><a href="shop.php"> Shop </a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="content">
		<div id="section">

			<div id="intro">

				<br>
				<h1>Sloths: The World's Slowest Mammals</h1>
				<br>

				<p>
					If you've landed on this page it's because YOU want to make even more of a difference, 
					thank you! We wouldn't exist without the support of awesome, 
					passionate people like you.
				</p>

				<br>

			</div>

			<div id="figure">

				<img src="images/55.jpg" alt="Image" />
				<span></span>
				
			</div>

			<span class="background"></span>
			
			
		</div>

		<div id="featured">
			<ul>
				<li class="first">
					<a href="about.php"><img src="images/44.jpg" alt="Image" /></a>
					<span></span>
					<a class="link" href="about.php">Get to know The Sloths</a>
				</li>
				<li>
					<a href="donate.php"><img src="images/22.jpg" alt="Image" /></a>
					<span></span>
					<a class="link" href="donate.php">Help us to make their lives better</a>
				</li>
				<li>
					<a href="shop.php"><img src="images/33.jpg" alt="Image" /></a>
					<span></span>
					<a class="link" href="shop.php">Shop Online</a>
				</li>
			</ul>
		</div>

	</div>

	<div id="footer">
		<?php
			include "Footer.php";
		?>
	</div>
	
</body>
</html>