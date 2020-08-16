<?php
    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }
     
    $db = Database::connect();
    $statement = $db->prepare("SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
    Database::disconnect();

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>View</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!-- <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'> -->

	<link rel="stylesheet" type="text/css" href="../css/Shop_style.css" />
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css" /> -->

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
            <h3>View an Item:</h3>
        </div>

        <div class="container admin">

            <div class="row">
            
                <div class="col-sm-6">

                <form class="Item-info">
                    <br><br><br>
                    <table class="table">
                        <tr>
                        <div class="form-group">
                            <td><label>Name:</label></td><td><?php echo '  '. $item['name']; ?></td>
                        </div>
                        </tr>
                        <tr>
                        <div class="form-group">
                            <td><label>Description:</label></td><td><?php echo '  '. $item['description']; ?></td>
                        </div>
                        </tr>
                        <tr>
                        <div class="form-group">
                            <td><label>Price:</label></td><td><?php echo '  $'. number_format($item['price'], 2, '.', ''); ?></td>
                        </div>
                        </tr>
                        <tr>
                        <div class="form-group">
                            <td><label>Category:</label></td><td><?php echo '  '. $item['category']; ?></td>
                        </div>
                        </tr>

                    </table>
                </form>

                        <?php
                            session_start();

                            if(isset($_SESSION['login_user_id'])){

                                echo 
                                '<table class="table">
                                    <tr>
                                        <div class="form-group">
                                            <td>
                                                <label>Rate:</label>
                                            </td>
                                            <td>
                                                <form action="" method="post">
                                                    
                                                    
                                                    <div class="d-flex justify-content-center my-4">
                                                        <div class="w-75">
                                                        <input type="range" name="rate" class="custom-range" id="customRange11" step="0.5" min="0" max="10">
                                                        </div>
                                                        <span class="font-weight-bold text-primary ml-2 valueSpan2"></span>
                                                        
                                                    </div>

                                                    <input type="submit" name="submit2" value="Rate">
                                                </form>
                                            </td>
                                        </div>
                                    </tr>
                                </table>';  

                                if (isset($_POST['submit2']))
                                {
                                    $db = Database::connect();
                                    $statement = $db->prepare("INSERT INTO review (User_ID,Item_ID,Rating) values(?, ?, ?) ON DUPLICATE KEY UPDATE Rating= ?");
                                    $statement->execute(array($_SESSION['login_user_id'],$item['id'],$_POST['rate'],$_POST['rate']));
                                    Database::disconnect();
                                    
                                }
                            }
                        ?>
                <br>
                
                <br>
                <div class="form-action">
                    <a class="btn btn-primary" href="../shop.php"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                </div>

                </div>
                
                <div class="col-sm-6">
                    <div class="thumbnail">

                        <img src="<?php echo '../'.$item['image']; ?>" alt="">

                        <div class="price"><?php echo '$'. number_format($item['price'], 2, '.', ''); ?></div>

                    </div>

                </div>


            </div>
        </div>
        <br>
        <div class="container admin">
            <div class="ShopCon">
                <h1>Similar to that: </h1>

                <div class="row">

                    <?php
                        $db = Database::connect();
                        $statement = $db->query(" SELECT Sim_Items FROM simitem WHERE simitem.ID_Item=".$_GET['id']);
                        $row= $statement->fetch();
                        
                        $SimItem=explode(',',$row['Sim_Items']);
                        
                        for($i=0;$i<sizeof($SimItem);$i++){
                            
                            $statement = $db->query("SELECT * FROM items WHERE items.id = ".$SimItem[$i]);
                            
                            while ($item = $statement->fetch())
                            {
                                echo '<div class="col-sm-6 col-md-4">
                                        <div class="thumbnail">
                                        
                                            <img src="../'.$item['image'].'" alt="...">
                                        
                                            <div class="price">$' . number_format($item['price'], 2, '.', '').'</div>
                                            <div class="caption">
                                                <a href="viewShop.php?id='.$item['id'].'"><h4>' . $item['name'] . '</h4></a>
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

                    ?>
                </div>
            </div>


        </div>

        <br>
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

<script src="../Js/jquery-3.5.0.min.js"></script>
<script src="../Js/script.js"></script>

</html>
