<?php

include_once './AdminBusiness.php';

$id = $_GET['id'];

$adminBusines = new AdminBusiness();
$adminBusines->eliminarAdmin($id);
header("location:../View/ListaAdmin.php?id=".$id);
