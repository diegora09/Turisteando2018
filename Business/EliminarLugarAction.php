<?php

include_once './AdminBusiness.php';

$id = $_GET['id'];

$adminBusines = new AdminBusiness();
$adminBusines->eliminarLugar($id);
header("location:../View/lugar_turistico.php");
