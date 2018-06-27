<?php

include_once './AdminBusiness.php';

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$tipo = $_POST['tipo'];
$actividad = $_POST['actividad'];
$atractivo = $_POST['atractivo'];
$lat = $_POST['lat'];
$long = $_POST['long'];
$imagen = $_POST['imagen'];
$video = $_POST['video'];


$adminArray = [];
array_push($adminArray, $nombre);
array_push($adminArray, $descripcion);
array_push($adminArray, $precio);
array_push($adminArray, $tipo);
array_push($adminArray, $actividad);
array_push($adminArray, $atractivo);
array_push($adminArray, $lat);
array_push($adminArray, $long);
array_push($adminArray, $imagen);
array_push($adminArray, $video);



$adminBusines = new AdminBusiness();
$adminBusines->crearLugarAdmin($adminArray);

header("location:../View/lugar_turistico.php");
