<?php

include_once '../Data/Connection.php';

class EuclidesData {

    //este metodo ejecuta el algoritmo de euclides y determina cuales son los lugares mas similares segun los filtros seleccionados
    public function determinarLugares() {
        // esto se debe recibir por parametros
        $filtros = [];
        array_push($filtros, 1);
        array_push($filtros, 10);
        array_push($filtros, 10);
        array_push($filtros, 10);
        //conecta con la base de datos y ejecuta una consulta
        $connection = new Connection();
        $conn = $connection->getConnection();
        $query = "SELECT * FROM lugaresturisticos;";
        $result = mysqli_query($conn, $query);

        //variable donde se guarda y se envia los lugarea para mostrar en las rutas
        $lugaresParaMostrar = [];
        $valoresDeEntrada = [];
        //en este arrayList se guardan los valores de las columnas obtenidos desde la base de datos

        $cont = 0;
        $valorMasBajo = 0;
        $id = 0;

        while ($row = $result->fetch_assoc()) {

            if (strcmp($row['precio'], "0 a 25000") == 0) {
                array_push($valoresDeEntrada, 1);
            } else if (strcmp($row['precio'], "26000 a 50000") == 0) {
                array_push($valoresDeEntrada, 2);
            } else if (strcmp($row['precio'], "51000 a 100000") == 0) {
                array_push($valoresDeEntrada, 3);
            } else if (strcmp($row['precio'], "Mas de 100000") == 0) {
                array_push($valoresDeEntrada, 4);
            }

            if (strcmp($row['tipoTurista'], "Aventurero") == 0) {
                array_push($valoresDeEntrada, 10);
            } else if (strcmp($row['tipoTurista'], "Cultural") == 0) {
                array_push($valoresDeEntrada, 20);
            } else if (strcmp($row['tipoTurista'], "Gastronomico") == 0) {
                array_push($valoresDeEntrada, 30);
            } else if (strcmp($row['tipoTurista'], "Familiar") == 0) {
                array_push($valoresDeEntrada, 40);
            }

            if (strcmp($row['tipoActividad'], "Alimentacion") == 0) {
                array_push($valoresDeEntrada, 10);
            } else if (strcmp($row['tipoActividad'], "AireLibre") == 0) {
                array_push($valoresDeEntrada, 20);
            } else if (strcmp($row['tipoActividad'], "PMNacional") == 0) {
                array_push($valoresDeEntrada, 30);
            } else if (strcmp($row['tipoActividad'], "Alojamiento") == 0) {
                array_push($valoresDeEntrada, 40);
            }

            if (strcmp($row['tipoAtractivo'], "Restaurantes") == 0) {
                array_push($valoresDeEntrada, 10);
            } else if (strcmp($row['tipoAtractivo'], "Monumentos") == 0) {
                array_push($valoresDeEntrada, 20);
            } else if (strcmp($row['tipoAtractivo'], "Miradores") == 0) {
                array_push($valoresDeEntrada, 30);
            } else if (strcmp($row['tipoAtractivo'], "Hoteles") == 0) {
                array_push($valoresDeEntrada, 40);
            }

            $suma = 0;

            //inicia la ejecucion del algoritmo de distancia de euclides
            //el ciclo se mueve desde cero y hasta el tamaño del array mas pequeño
            //va sumando el resultado de la resta entre los contenidos de cada array en la posicion i, elevada a la 2, es decir, (X-Y)^2
            for ($i = 0; $i < min(count($filtros), count($valoresDeEntrada)); $i++) {
                $suma += pow((int) $valoresDeEntrada[$i] - (int) $filtros[$i], 2);
            }
            //se obtiene la raiz cuadrada de la suma
            //este es el resultado final del algoritmo
            $resultado = sqrt($suma);

            //pregunta si es la primera vez que se ejecuta el ciclo
            if ($cont == 0) {
                $valorMasBajo = $resultado;
            }
            //si el resultado final del algoritmo es menor al valor mas bajo actual entonces el valor mas bajo pasa
            //a vale lo mismo que el resultado
            //y se guarda el estilo actual
            else if ($resultado <= $valorMasBajo) {
                $valorMasBajo = $resultado;
                $id = $row['id'];

                if (count($lugaresParaMostrar) < 12) {
                    array_push($lugaresParaMostrar, $row);
                }
            }

            $valoresDeEntrada = [];
            $cont++;
        }

        return $lugaresParaMostrar;
    }

}

include_once '../Data/EuclidesData.php';
$obj = new EuclidesData();
$lugares = $obj->determinarLugares();
foreach ($lugares as $valor) {
    echo $valor['id'] . " --- ";
}