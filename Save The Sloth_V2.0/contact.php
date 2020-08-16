<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Contact Us</title>
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
						<li><a href="index.php"> Home </a></li>
						<li><a href="donate.php"> Donate </a></li>
						<li class="current"><a href="contact.php"> Contact Us </a></li>
						<li><a href="about.php"> About Sloths </a></li>
						<li><a href="shop.php"> Shop </a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="content">
		<div>
			<h3>Get in touch with Us!</h3>
			<p>We're listening,<br>Tell us what you think and help make us even better</p>
			<form action="#">
				<table>
					<tr>
						<td><label for="name"><strong>Name:<strong></label></td>
						<td><input type="text" maxlength="30" id="name" /> </td>
						<td><label class="email" for="email">Email:</label></td> 
						<td><input type="text" maxlength="30" id="email" /></td>
					</tr>
					<tr>
						<td><label for="subject"><strong>Subject:</strong></label></td>
						<td><input type="text" maxlength="30" id="subject" /></td>
					</tr>
					<tr>
						<td class="message"><label for="message"><strong>Message:</strong></label></td>
						<td colspan="3"><textarea name="message" id="message" cols="30" rows="10"></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td colspan="2"></td>
						<td colspan="1"><input type="submit" value="" id="send" /></td>
					</tr>
				</table>
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