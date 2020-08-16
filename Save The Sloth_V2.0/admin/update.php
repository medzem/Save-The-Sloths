<?php

    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    $nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category = $image = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $description        = checkInput($_POST['description']);
        $price              = checkInput($_POST['price']);
        $category           = checkInput($_POST['category']); 
        $image              = checkInput($_FILES["image"]["name"]);
        $imagePath          = '../images/Shop'. basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
       
        if(empty($name)) 
        {
            $nameError = 'This field can not be empty';
            $isSuccess = false;
        }
        if(empty($description)) 
        {
            $descriptionError = 'This field can not be empty';
            $isSuccess = false;
        } 
        if(empty($price)) 
        {
            $priceError = 'This field can not be empty';
            $isSuccess = false;
        } 
         
        if(empty($category)) 
        {
            $categoryError = 'This field can not be empty';
            $isSuccess = false;
        }
        if(empty($image)) // le input file est vide, ce qui signifie que l'image n'a pas ete update
        {
            $isImageUpdated = false;
        }
        else
        {
            $isImageUpdated = true;
            $isUploadSuccess =true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Only (.jpg, .jpeg, .png, .gif) are allowed";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $imageError = "The file already exists.";
                $isUploadSuccess = false;
            }
            if($_FILES["image"]["size"] > 500000) 
            {
                $imageError = "Size must less than 500KB.";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "There was an error during the upload.";
                    $isUploadSuccess = false;
                } 
            } 
        }
         
        if (($isSuccess && $isImageUpdated && $isUploadSuccess) || ($isSuccess && !$isImageUpdated)) 
        { 
            $db = Database::connect();
            if($isImageUpdated)
            {
                $statement = $db->prepare("UPDATE items  set name = ?, description = ?, price = ?, category = ?, image = ? WHERE id = ?");
                $statement->execute(array($name,$description,$price,$category,$image,$id));
            }
            else
            {
                $statement = $db->prepare("UPDATE items  set name = ?, description = ?, price = ?, category = ? WHERE id = ?");
                $statement->execute(array($name,$description,$price,$category,$id));
            }
            Database::disconnect();
            header("Location: index.php");
        }
        else if($isImageUpdated && !$isUploadSuccess)
        {
            $db = Database::connect();
            $statement = $db->prepare("SELECT * FROM items where id = ?");
            $statement->execute(array($id));
            $item = $statement->fetch();
            $image          = $item['image'];
            Database::disconnect();
           
        }
    }
    else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM items where id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $name           = $item['name'];
        $description    = $item['description'];
        $price          = $item['price'];
        $category       = $item['category'];
        $image          = $item['image'];
        Database::disconnect();
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
            <h3>Modify an Item:</h3>
        </div>

        <div class="container admin">

            <div class="row">
                <div class="col-sm-6">
                    
                    <form class="form" action="<?php echo 'update.php?id='.$id;?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name:
                            <textarea type="text" class="form-control" id="name" name="name" placeholder="Name" value="" cols="30" rows="2"><?php echo $name;?></textarea>
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:
                            <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" value="" cols="30" rows="3"><?php echo $description;?></textarea>
                            <span class="help-inline"><?php echo $descriptionError;?></span>
                        </div>
                        <div class="form-group">
                        <label for="Price">Price:
                            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo $price;?>">
                            <span class="help-inline"><?php echo $priceError;?></span>
                        </div>


                        <div class="form-group">
                            <label for="category">Category:
                            <select class="form-control" id="category" name="category">
                            <?php
                               $db = Database::connect();
                               foreach ($db->query('SELECT * FROM categories') as $row) 
                               {
                                    if($row['id'] == $category)
                                        echo '<option selected="selected" value="'. $row['id'] .'">'. $row['name'] . '</option>';
                                    else
                                        echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>';;
                               }
                               Database::disconnect();
                            ?>
                            </select>
                            <span class="help-inline"><?php echo $categoryError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <p><?php echo $image;?></p>
                            <label for="image">Choose File:</label>
                            <input type="file" id="image" name="image"> 
                            <span class="help-inline"><?php echo $imageError;?></span>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modify</button>
                            <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                       </div>
                    </form>
                </div>
                <div class="col-sm-6 site">
                    <div class="thumbnail">
                        <img src="<?php echo "../".$image;?>" alt="...">
                        <div class="price"><?php echo '$'.number_format((float)$price, 2, '.', '');?></div>
                    </div>
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