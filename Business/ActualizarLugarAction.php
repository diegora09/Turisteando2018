<?php

include_once './AdminBusiness.php';

$id = $_POST['id'];
$nombre = $_POST['Nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$turista = $_POST['turista'];
$act = $_POST['act'];
$atractivo = $_POST['atractivo'];
$lat = $_POST['lat'];
$long = $_POST['long'];
$imagen = $_POST['imagen'];
$video = $_POST['video'];


$adminArray = [];
array_push($adminArray, $id);
array_push($adminArray, $nombre);
array_push($adminArray, $descripcion);
array_push($adminArray, $precio);
array_push($adminArray, $turista);
array_push($adminArray, $act);
array_push($adminArray, $atractivo);
array_push($adminArray, $lat);
array_push($adminArray, $long);
array_push($adminArray, $imagen);
array_push($adminArray, $video);

$adminBusines = new AdminBusiness();
$adminBusines->actualizarLugar($adminArray);

header("location:../View/lugar_turistico.php");
