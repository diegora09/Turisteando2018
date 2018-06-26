<?php

include_once './EuclidesBusiness.php';

$precio = $_POST['precio'];
$tipoTurista = $_POST['tipoTurista'];
$tipoActividad = $_POST['tipoActividad'];
$tipoAtractivo = $_POST['tipoAtractivo'];

$filtros = [];
array_push($filtros, $precio);
array_push($filtros, $tipoTurista);
array_push($filtros, $tipoActividad);
array_push($filtros, $tipoAtractivo);

$euclidesBusines = new EuclidesBusiness();
$euclidesBusines->determinarLugares($filtros);
header("location:");
