

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Shop</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!-- <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'> -->

	<link rel="stylesheet" type="text/css" href="css/Shop_style.css" />
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css" /> -->

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
						<li><a href="contact.php"> Contact Us </a></li>
						<li><a href="about.php"> About Sloths </a></li>
						<li class="current"><a href="shop.php"> Shop </a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="contentShop">
		<div class="intro_login">

			<div id="Intro1">
				<h3>Shop</h3>
				<p>Your purchase will make a difference. As a non-profit organisation, we rely on your support to make our work possible. Proceeds from purchases made in our online store go towards supporting our conservation efforts.</p>
			</div>

			<div id="UserAccount">
				<?php
					require 'admin/database.php';
					session_start();

					if(isset($_SESSION['login_user_id'])){
						$db = Database::connect();
						
						$statement = $db->query('SELECT * FROM user WHERE ID='.(int)$_SESSION['login_user_id']);
						$user1 = $statement->fetch();

						echo "<u><b>Name:</u></b> ".$user1["First_name"]." ".$user1["Last_Name"]."<br><br>";
						
						// echo "ID: ".$user1["ID"];
						
						echo '<a href="admin/destroy.php"><button class="btn btn-order">LogOut <span class="glyphicon glyphicon-log-out"></button></a>';
	
					}
					else
					{
						echo '<a href="admin/login.php"><button class="btn btn-order">LogIn <span class="glyphicon glyphicon-log-in"></button></a>';
					}
					
				
				?>
				
			</div>	

		</div>

		<div class="container ShopCon">

			<?php				
				
				echo '<nav>
					<ul class="nav nav-pills nav-justified">';

						

				$db = Database::connect();
				$statement = $db->query('SELECT * FROM categories');
				$categories = $statement->fetchAll();
				foreach ($categories as $category) 
				{
					if($category['id'] == '1')
						echo '<li role="presentation" class="active"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
					else
						echo '<li role="presentation"><a href="#'. $category['id'] . '" data-toggle="tab">' . $category['name'] . '</a></li>';
				}

				echo    '</ul>
					</nav>';

					echo '<div class="tab-content">';

					foreach ($categories as $category) 
					{
						if($category['id'] == '1')
							echo '<div class="tab-pane active" id="' . $category['id'] .'">';
						else
							echo '<div class="tab-pane" id="' . $category['id'] .'">';
						
						echo '<div class="row">';
						
						$statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
						$statement->execute(array($category['id']));
						while ($item = $statement->fetch())
						{
							echo '<div class="col-sm-6 col-md-4">
									<div class="thumbnail">
									
										<img src= "'.$item['image'].'" alt="...">
									
										<div class="price">$' . number_format($item['price'], 2, '.', '').'</div>
										<div class="caption">
											<a href="admin/viewShop.php?id='.$item['id'].'"><h4>' . $item['name'] . '</h4></a>
											<p>' . $item['description'] . '</p>


											<form method="post" action="shop.php?action=add&id='.$item['id'].'" >
												<div class="btn-group-toggle" data-toggle="buttons">
													<button type="submit" class="btn btn-order" name="add">Add to Cart <span class="glyphicon glyphicon-shopping-cart"></button>
													<input type="hidden" name="product_id" value=' .$item['id'].'>
												</div>
											</form>

										</div>
									</div>
								</div>';
						}
					   
					   echo    '</div>
							</div>';
					}
					Database::disconnect();
					echo  '</div>';


			?>

		</div>
		
		<?php
			if(isset($_SESSION['login_user_id'])){
				echo'
					<div class="container admin">
						<div class="ShopCon">
							<h1>You Might Like This Too: </h1>';

							$db = Database::connect();
							$statement = $db->query(" SELECT Sim_Users FROM simuser WHERE simuser.ID_User=".$_SESSION['login_user_id']);
							$row= $statement->fetch();
							
							$SimUser=explode(',',$row['Sim_Users']);

							$x=rand(0,sizeof($SimUser)-1);

							$statement = $db->query("SELECT List_Items FROM orders WHERE orders.ID_User=".$SimUser[$x]);
							$row= $statement->fetch();

							$List_Items=explode(',',$row['List_Items']);

							for($i=0;$i<sizeof($List_Items);$i++){
                            
								$statement = $db->query("SELECT * FROM items WHERE items.id = ".$List_Items[$i]);
								
								while ($item = $statement->fetch())
								{
									echo '<div class="col-sm-6 col-md-4">
											<div class="thumbnail">
											
												<img src="'.$item['image'].'" alt="...">
											
												<div class="price">$' . number_format($item['price'], 2, '.', '').'</div>
												<div class="caption">
													<a href="admin/viewShop.php?id='.$item['id'].'"><h4>' . $item['name'] . '</h4></a>
													<p>' . $item['description'] . '</p>
	
	
													<form method="post" action="shop.php?action=add&id='.$item['id'].'" >
														<div class="btn-group-toggle" data-toggle="buttons">
															<button type="submit" class="btn btn-order" name="add">Add to Cart <span class="glyphicon glyphicon-shopping-cart"></button>
															<input type="hidden" name="product_id" value=' .$item['id'].'>
														</div>
													</form>
	
												</div>
											</div>
										</div>';
								}
							}
				echo'
						</div>
					</div>';
			}
		?>
	</div>

	<div id="footer">
		<div>
			<div class="first">
				<a href="index.php"><div id="LittleLogo"><img src="images/LittleLogo.png"> <span id="firstW">Nad</span><span id="secondW">Ze</span><span id="thirdW">Loth</span></div></a>
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
</html>