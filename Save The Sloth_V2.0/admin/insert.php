<?php
     
    require 'database.php';
 
    $nameError = $descriptionError = $priceError = $categoryError = $imageError = $name = $description = $price = $category = $image = "";

    if(!empty($_POST)) 
    {
        $name               = checkInput($_POST['name']);
        $description        = checkInput($_POST['description']);
        $price              = checkInput($_POST['price']);
        $category           = checkInput($_POST['category']); 
        $image              = checkInput($_FILES["image"]["name"]);
        $imagePath          = basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
        $isUploadSuccess    = false;
        
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
        // if(empty($category)) 
        // {
        //     $categoryError = 'This field can not be empty';
        //     $isSuccess = false;
        // }
        if(empty($image)) 
        {
            $imageError = 'This field can not be empty';
            $isSuccess = false;
        }
        else
        {
            $isUploadSuccess = true;
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
        
        if($isSuccess && $isUploadSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO items (name,description,price,category,image) values(?, ?, ?, ?, ?)");
            $statement->execute(array($name,$description,$price,$category,$image));
            Database::disconnect();
            header("Location: index.php");
        }
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
            <h3>Add an Item:</h3>
        </div>

        <div class="container admin">

            <div class="row">
            
                <div class="col-sm-6">
                    
                    <br>
                    <br>
                    
                    <form class="Item-info form" role="form" action="insert.php" method="post" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $name;?>">
                            <span class="help-inline"><?php echo $nameError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description;?>"></textarea>
                            <span class="help-inline"><?php echo $descriptionError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Price" value="<?php echo $price;?>">
                            <span class="help-inline"><?php echo $priceError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category">
                            <?php
                            $db = Database::connect();
                            foreach ($db->query('SELECT * FROM categories') as $row) 
                            {
                                    echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>';;
                            }
                            Database::disconnect();
                            ?>
                            </select>
                            <span class="help-inline"><?php echo $categoryError;?></span>
                        </div>
                        <div class="form-group">
                            <label for="image">Choose File:</label>
                            <input type="file" id="image" name="image"> 
                            <span class="help-inline"><?php echo $imageError;?></span>
                        </div>

                        <br>
                        <br>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Add</button>
                            <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                        </div>
                            
                        
                    </form>
                    <br>
                    

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