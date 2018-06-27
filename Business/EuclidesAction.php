<?php

include_once './EuclidesBusiness.php';

$precio = $_POST['precio'];
$tipoTurista = $_POST['turista'];
$tipoActividad = $_POST['actividad'];
$tipoAtractivo = $_POST['atractivo'];

$filtros = [];
array_push($filtros, $precio);
array_push($filtros, $tipoTurista);
array_push($filtros, $tipoActividad);
array_push($filtros, $tipoAtractivo);

$euclidesBusines = new EuclidesBusiness();
$lugares = $euclidesBusines->determinarLugares($filtros);
//$variable = [];
/*
foreach ($lugares as $valor) {
    /*foreach ($valor as $xxx) {
        echo $xxx->getId(). " --- ";
    }
	$variable = $valor;
}
*/

header("location:../View/maps.php?precio=".$precio."&turista=".$tipoTurista."&actividad=".$tipoActividad."&atractivo=".$tipoAtractivo);
