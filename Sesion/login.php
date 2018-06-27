<?php
session_start(); // Iniciando sesion
$error=''; // Variable para almacenar el mensaje de error
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
$username=$_POST['username'];
$password=$_POST['password'];

include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("config/conexion.php");//Contiene de conexion a la base de datos

// Para proteger de Inyecciones SQL 
$username    = mysqli_real_escape_string($con,(strip_tags($username,ENT_QUOTES)));
$password =  mysqli_real_escape_string($con,(strip_tags($password,ENT_QUOTES)));

$sql = "SELECT usuario, contraseña FROM admin WHERE usuario = '" . $username . "' AND contraseña='".$password."';";
$query=mysqli_query($con,$sql);
$counter=mysqli_num_rows($query);
if ($counter==1){
		$_SESSION['login_user_sys']=$username; // Iniciando la sesion
		header("location: profile.php"); // Redireccionando a la pagina profile.php
	
	
} else {
$error = "El nombre de usuario o la contraseña es inválida.".$username.$password;	
}
}
}
?>