<?php

include_once '../Data/Connection.php';

class AdminData {

    public function crearAdmin($inputArray) {
		$connection = new Connection();
        $conn = $connection->getConnection();
        $query = "INSERT INTO `admin`(`nombre`, `usuario`, `contraseña`, `borrar`) VALUES ('".$inputArray[0]."', '".$inputArray[1]."', '".$inputArray[2]."', 0)";
        $result = mysqli_query($conn, $query);
        $connection->closeConnection();
    }
    public function crearLugarAdmin($inputArray) {
        $connection = new Connection();
        $conn = $connection->getConnection();
        $query = "INSERT INTO `lugaresturisticos`(`tipoTurista`, `tipoActividad`, `tipoAtractivo`, `precio`, `nombreLugar`, `latitud`, `longitud`, `imagen`, `video`, `descripcion`) VALUES ('$inputArray[3]', '$inputArray[4]', '$inputArray[5]', '$inputArray[2]','$inputArray[0]','$inputArray[6]','$inputArray[7]','$inputArray[8]','$inputArray[9]','$inputArray[1]')";
        $result = mysqli_query($conn, $query);
        $connection->closeConnection();
    }

	public function listaAdmin() {
		$connection = new Connection();
        $conn = $connection->getConnection();
        $query = "SELECT * FROM `admin` WHERE `borrar`=0";
        $result = mysqli_query($conn, $query);
		$lista = array();
		while ($row = mysqli_fetch_array($result)) {
			array_push($lista, $row);
		}
        $connection->closeConnection();
		return $lista;
    }
	
	public function eliminarAdmin($id) {
		$connection = new Connection();
        $conn = $connection->getConnection();
        $query = "DELETE FROM `admin`  WHERE `id`=".$id;
        $result = mysqli_query($conn, $query);
        $connection->closeConnection();
    }
    
    public function eliminarLugar($id) {
        $connection = new Connection();
        $conn = $connection->getConnection();
        $query = "DELETE FROM `lugaresturisticos`  WHERE `id`=".$id;
        $result = mysqli_query($conn, $query);
        $connection->closeConnection();
    }
    public function actualizarAdmin($inputArray) {
        $connection = new Connection();
        $conn = $connection->getConnection();
        $query = "UPDATE admin SET nombre='".$inputArray[1]."', usuario='".$inputArray[2]."', contraseña='".$inputArray[3]."'
                            WHERE id='".$inputArray[0]."';";
        $result = mysqli_query($conn, $query);
        $connection->closeConnection();

    }
    public function actualizarLugar($inputArray) {
        $connection = new Connection();
        $conn = $connection->getConnection();

        if($inputArray[9] == NULL && $inputArray[10] != NULL){
            
            $query = "UPDATE lugaresturisticos SET nombreLugar='".$inputArray[1]."', descripcion='".$inputArray[2]."', precio='".$inputArray[3]."', tipoTurista='".$inputArray[4]."', tipoActividad='".$inputArray[5]."', tipoAtractivo='".$inputArray[6]."', latitud='".$inputArray[7]."', longitud='".$inputArray[8]."', video='".$inputArray[10]."'
                                WHERE id='".$inputArray[0]."';";
            $result = mysqli_query($conn, $query);

        } else if($inputArray[9] != NULL && $inputArray[10] == NULL){
           
            $query = "UPDATE lugaresturisticos SET nombreLugar='".$inputArray[1]."', descripcion='".$inputArray[2]."', precio='".$inputArray[3]."', tipoTurista='".$inputArray[4]."', tipoActividad='".$inputArray[5]."', tipoAtractivo='".$inputArray[6]."', latitud='".$inputArray[7]."', longitud='".$inputArray[8]."', imagen='".$inputArray[9]."'
                                WHERE id='".$inputArray[0]."';";
            $result = mysqli_query($conn, $query);

        } else if($inputArray[9] == NULL && $inputArray[10] == NULL){
            
            $query = "UPDATE lugaresturisticos SET nombreLugar='".$inputArray[1]."', descripcion='".$inputArray[2]."', precio='".$inputArray[3]."', tipoTurista='".$inputArray[4]."', tipoActividad='".$inputArray[5]."', tipoAtractivo='".$inputArray[6]."', latitud='".$inputArray[7]."', longitud='".$inputArray[8]."'
                                WHERE id='".$inputArray[0]."';";
            $result = mysqli_query($conn, $query);

        }else {
             $query = "UPDATE lugaresturisticos SET nombreLugar='".$inputArray[1]."', descripcion='".$inputArray[2]."', precio='".$inputArray[3]."', tipoTurista='".$inputArray[4]."', tipoActividad='".$inputArray[5]."', tipoAtractivo='".$inputArray[6]."', latitud='".$inputArray[7]."', longitud='".$inputArray[8]."', imagen='".$inputArray[9]."', video='".$inputArray[10]."'
                                WHERE id='".$inputArray[0]."';";
            $result = mysqli_query($conn, $query);

        }
            $connection->closeConnection();
    }

}