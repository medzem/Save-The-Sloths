<?php
    require 'database.php';
 
    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    if(!empty($_POST)) 
    {
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM items WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php"); 
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Delete</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/Shop_style.css" />
	
</head>
<body>


    <div id="header">
		<div>
			<div id="logo">
				<a href="../index.php"><img src="../images/Logo.png" alt="Logo" /></a>
			</div>
			<div id="navigation">
				<div>
					<ul>
						<li><a href="../index.php"> Home </a></li>
						<li><a href="../donate.php"> Donate </a></li>
						<li><a href="../contact.php"> Contact Us </a></li>
						<li><a href="../about.php"> About Sloths </a></li>
						<li><a href="../shop.php"> Shop </a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>


    <div id="contentShop">
        <div id="Intro1">
            <br>
            <h3>Delete an Item:</h3>
        </div>


        <div class="container admin">
            <div class="row">
                <br>
                <form class="form" action="delete.php" role="form" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <p class="alert alert-warning">Are you sure you want to delete this product?</p>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-warning">Yes</button>
                      <a class="btn btn-default" href="index.php">No</a>
                    </div>
                </form>
            </div>
        </div> 



    </div>




    <div id="footer">
		<div>
			<div class="first">
				<a href="../index.php"><div id="LittleLogo"><img src="../images/LittleLogo.png"> <span id="firstW">Nad</span><span id="secondW">Ze</span><span id="thirdW">Loth</span></div></a>
				<p>If you've landed on this page it's because YOU want to make even more of a difference, thank you! We wouldn't exist without the support of awesome, passionate people like you.</p>
				<div>
					<p>Telephone. :<span><br>99-258-198<br>26-680-010</span></p>
					<p>Email :<span><br>hazemben@gmail.com<br>yahyaoui.nadiaa@gmail.com</span></p>
				</div>
			</div>
			<div>
				<h3>Get Social with us!</h3>
				<p>Know what's going on! Like us on Facebook and follow us on Twitter to see our latest events.</p>
				<div>
					<a href="#" class="facebook" target="_blank"></a>
					<a href="#" class="twitter" target="_blank"></a>
					<a href="#" class="linked-in"></a>
				</div>
			</div>
			<div>
				<h3>Share your thoughts!</h3>
				<p>Enter your email to request an invite to join us.</p>
				<form action="#">
					<label for="subscribe"><input type="text" id="subscribe" maxlength="30" placeholder="email address" /></label>
					<input class="submit" type="submit" value="" />
				</form>
				<p>Copyright &copy; SaveTheSloths.com <br> Designed by NadZem</p>
			</div>
		</div>
	</div>


</body>

</body>
</html>