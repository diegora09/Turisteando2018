<?php
// Estableciendo la conexion a la base de datos
include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("config/conexion.php");//Contiene de conexion a la base de datos

session_start();// Iniciando Sesion
// Guardando la sesion
$user_check=$_SESSION['login_user_sys'];
// SQL Query para completar la informacion del usuario
$ses_sql=mysqli_query($con, "select usuario from admin where usuario='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['usuario'];
if(!isset($login_session)){
mysqli_close($con); // Cerrando la conexion
header('Location: ../Sesion/index.php'); // Redirecciona a la pagina de inicio
}
?>