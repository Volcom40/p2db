<?php
	session_start();
	$_SESSION["connect"]=0;
	$_SESSION["type_account"]=NULL;
	$_SESSION["login"]=NULL;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tentations et Délices</title>
	<?php include_once("./includes/header.php") ?>
	<?php include_once("./includes/feuilledestyle.php") ?>
	<link rel="stylesheet" href="./css/login.css" type="text/css" media="screen" />
	<link rel="icon" type="image/png" href="img/favicon.png" />
</head>
<header class="header">
	<img src="img/logo.png" width="40%" height="140px" class="img-fluid rounded mx-auto d-block" alt="Responsive image">
</header>
<body>
	<div class="container">
        <div class="card card-container">
            <h1>Login</h1>
            <p id="profile-name" class="profile-name-card"></p>
           	<form class="form-signin" action="./php/connect.php" method="POST">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="login" id="login" class="form-control" placeholder="Login" required autofocus >
                <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Se souvenir de moi
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" >Se connecter</button>
            </form>
        </div>
    </div>
</body>
</html>
