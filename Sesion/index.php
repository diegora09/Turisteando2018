<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user_sys'])){
header("location: ../View/inicio.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Signika:400,600' rel='stylesheet' type='text/css'>
<!--google fonts-->
</head>
<body style="background: url(../images/lugar.jpg); background-size: cover;">
<!--header start here-->
<br><br><br><br><br><br>
<div class="header agile">
	<div class="wrap">
		<div class="login-main wthree">
			<div class="login">
			<h3>Ingresar</h3>
			<img id="profile-img" class="profile-img-card" src="../images/icon.png" style="width: 200px; height: 200px;" />

			<form action="#" method="post">
				<input type="text" placeholder="Usuario" name="username" >
				<input type="password" placeholder="Contraseña" name="password">
				<input name="submit" class="btn btn-success" type="submit" value="Ingresar">
				<a href="../View/filtradoLugares.php" class="btn btn-lg btn-success btn-block btn-signin" > Volver </a>


			</form>

			<div class="clear"> </div>
				<span><?php echo $error; ?></span>
			</div>
			
			
		</div>
	</div>
</div>

</body>
</html>