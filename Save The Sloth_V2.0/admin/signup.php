<?php
     
    require 'database.php';

    function checkInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $FnameError=$LnameError=$EmailError=$PasswordError="";

    if(!empty($_POST)) 
    {
        $F_name = checkInput($_POST['F_name']);
        $L_name = checkInput($_POST['L_name']);
        $email = checkInput($_POST['email']);
        $password = checkInput($_POST['password']);
        $isSuccess = true;

        if(empty($F_name)) 
        {
            $FnameError = 'This field can not be empty';
            $isSuccess = false;
        }
        if(empty($L_name)) 
        {
            $LnameError = 'This field can not be empty';
            $isSuccess = false;
        }
        if(empty($email)) 
        {
            $EmailError = 'This field can not be empty';
            $isSuccess = false;
        }
        if(empty($password)) 
        {
            $PasswordError = 'This field can not be empty';
            $isSuccess = false;
        }

        if($isSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO user (First_name,Last_Name,Email,Password) values(?, ?, ?, ?)");
            $statement->execute(array($F_name,$L_name,$email,$password));
            
            $statement = $db->prepare("SELECT id FROM user WHERE email= ? and password= ?");
            $statement->execute(array($email,$password));

            $user = $statement->fetch();
            
            session_start();
            
            $_SESSION['login_user_id'] = $user[0];
            
            Database::disconnect();
            
            header("Location: ../shop.php");
        }

    }

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Sign In</title>

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
                <h3>Create account:</h3>
            </div>

                <div class="container admin">
                
                    <form action="" method="POST">

                        <div class="form-group row">
                        <label for="inputName3" class="col-sm-2 col-form-label">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="F_name" id="inputF_Name3" placeholder="Your First Name">
                                <span class="help-inline"><?php echo $FnameError;?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="inputName3" class="col-sm-2 col-form-label">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="L_name" id="inputL_Name3" placeholder="Your Last Name">
                                <span class="help-inline"><?php echo $LnameError;?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                <span class="help-inline"><?php echo $EmailError;?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                <span class="help-inline"><?php echo $PasswordError;?></span>
                            </div>
                        </div>

                        <div class="form-group row">
                        
                            <label for="inputAgree3" class="col-sm-5 col-form-label">I agree all statements in  <a href="#">Terms of service</a></label>                            
                            <div class="col-sm-2">
                                <input type="checkbox" name="agree-term" id="agree-term" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Sign up"/>
                        </div>

                    </form>
                    <label>
                        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </label>
                
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