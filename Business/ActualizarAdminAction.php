<?php

include_once './AdminBusiness.php';

$id = $_POST['id'];
$name = $_POST['name'];
$user = $_POST['user'];
$password = $_POST['password'];

$adminArray = [];
array_push($adminArray, $id);
array_push($adminArray, $name);
array_push($adminArray, $user);
array_push($adminArray, $password);

$adminBusines = new AdminBusiness();
$adminBusines->actualizarAdmin($adminArray);

header("location:../View/ListaAdmin.php?name=".$name);
