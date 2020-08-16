<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Donate</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />

	<script src="Js/jquery-3.5.0.min.js"></script>
	<script src="Js/script.js"></script>
	
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
						<li><a href="index.php"> Home </a></li>
						<li class="current"><a href="donate.php"> Donate </a></li>
						<li><a href="contact.php"> Contact Us </a></li>
						<li><a href="about.php"> About Sloths </a></li>
						<li><a href="shop.php"> Shop </a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="content">
		<div>
			<h3>Donate To Stoths</h3>
			<p>Help The Planet's Slowest Mammal.</p>
			<form action="#" id="donate">
				<div class="first">

					<div id="firstDo">
						<h2>Choose Your Donation Frequency</h2>
					
						<ul id="first">
							<li id="O1">One Time</li>
							<li id="O2">Monthly</li>
							<li id="O3">Quarterly</li>
							<li id="O4">Annually</li>
						</ul>
					</div>

					<div class="secondDo">

						<h2>Choose a Donation Level</h2>
					
						<ul class="Mlvl">
							<li id="M0"></li>
							<li id="M1"></li>
							<li id="M2"></li>
							<li id="M3"></li>
							<li id="M4"></li>
						</ul>
					
						<br>

						<fieldset>
							<span id="Dollar">$</span><input type="number" step="any" class="inputVal" id="money" value="" min="5" required="" placeholder="Donation Amount">
						</fieldset>			

						<input type="submit" value="" id="sendD" />
					</div>

					
				</div>
			</form>
		</div>
	</div>

	<div id="footer">
		<?php
			include "Footer.php";
		?>
	</div>

</body>
</html>