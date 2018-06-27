<?php

include_once '../Data/Connection.php';
include_once '../Domain/LugarTuristico.php';

class BayesData {

    //este metodo ejecuta el algoritmo de euclides y determina cuales son los lugares mas similares segun los filtros seleccionados
    public function determinarLugares($filtros) {
        //$filtros = [];
        //array_push($filtros, 1);
        //array_push($filtros, 10);
        //array_push($filtros, 10);
        //array_push($filtros, 10);
        //

        /* Calcular las probabilidades para cada tipo de profesor */
        $probRest = $this->calcularProbabilidad($filtros[0], $filtros[1], $filtros[2], "Restaurantes");
        $probMonu = $this->calcularProbabilidad($filtros[0], $filtros[1], $filtros[2], "Monumentos");
        $probMira = $this->calcularProbabilidad($filtros[0], $filtros[1], $filtros[2], "Miradores");
        $probHote = $this->calcularProbabilidad($filtros[0], $filtros[1], $filtros[2], "Hoteles");

        //calcular cual de las probabilidades es mayor
        if ($probRest > $probMonu && $probRest > $probMira && $probRest > $probHote) {
            $clase = "Restaurantes";
        } else if ($probMonu > $probRest && $probMonu > $probMira && $probMonu > $probHote) {
            $clase = "Monumentos";
        } else if ($probMira > $probRest && $probMira > $probMonu && $probMira > $probHote) {
            $clase = "Miradores";
        } else {
            $clase = "Hoteles";
        }

        echo $clase;
        
        $lugaresParaMostrar = [];
        $lugaresParaMostrar = $this->euclides($filtros, $clase);
        return $lugaresParaMostrar;
    }

    /* este m�todo ejecuta el calculo de la probabilidad para cada tipo de profesor */

    public function calcularProbabilidad($precio, $turista, $actividad, $clase) {
        //variables de la ecuacion
        $totalInstanciasN = 0;
        $probAtributosP = 1 / 3;
        $cantidadAtributosM = 3;
        $resulProb = 0;

        /*         * Calcular las variables de la ecuacion** */
        //calcular cuantos registros tienen el tipo de profesor que recibe por parametros
        //conecta con la base de datos y ejecuta una consulta
        $connection = new Connection();
        $conn = $connection->getConnection();
        $query = "SELECT * FROM lugaresturisticos where tipoAtractivo = '" . $clase . "';";
        $result = mysqli_query($conn, $query);
        foreach ($result as $registroActual) {
            if (strcmp($registroActual['tipoAtractivo'], $clase) == 0) {
                $totalInstanciasN += 1;
            }//end if
        }//end foreach
        //calcular variables de la ecuacion
        $probTipo = $totalInstanciasN / count($result);
        $totalPrecio = 0;
        $totalTurista = 0;
        $totalActividad = 0;
        //recorrer los registros para calcular la cantidad de veces que se tiene 
        //cada atributo con el estilo*/
        foreach ($result as $registroActual) {
            if ($registroActual['precio'] == $precio) {
                $totalPrecio += 1;
            }//
            if ($registroActual['tipoTurista'] == $turista) {
                $totalTurista += 1;
            }//
            if ($registroActual['tipoActividad'] == $actividad) {
                $totalActividad += 1;
            }//
        }//end foreach
        //se calcula la ecuacion para cada atributo
        $resulA = ($totalPrecio + ($cantidadAtributosM * $probAtributosP)) / ($totalInstanciasN + $cantidadAtributosM);
        $resulB = ($totalTurista + ($cantidadAtributosM * $probAtributosP)) / ($totalInstanciasN + $cantidadAtributosM);
        $resulC = ($totalActividad + ($cantidadAtributosM * $probAtributosP)) / ($totalInstanciasN + $cantidadAtributosM);

        //se multiplican los resultados
        $resulProb = ($resulA * $resulB * $resulC);

        //se multiplica el resultado por la probabilidad del tipo de profesor
        $resultFinal = $resulProb * $probTipo;

        return $resultFinal;
    }

//end calcularProbabilidad
    //este metodo ejecuta el algoritmo de euclides y determina cuales son los lugares mas similares segun los filtros seleccionados
    public function euclides($filtros, $clase) {

        //conecta con la base de datos y ejecuta una consulta
        $connection = new Connection();
        $conn = $connection->getConnection();
        $query = "SELECT * FROM lugaresturisticos where tipoAtractivo = '" . $clase . "';";
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
            else if ($resultado <= $valorMasBajo + 10) {
                $valorMasBajo = $resultado;
                $id = $row['id'];

                if (count($lugaresParaMostrar) < 12) {
                    $lugar = new LugarTuristico($row['id'],$row['tipoTurista'],$row['tipoActividad'],$row['tipoAtractivo'],$row['precio'],$row['nombreLugar'],
                            $row['latitud'],$row['longitud'],$row['imagen'],$row['video'],$row['descripcion']);
                    array_push($lugaresParaMostrar, $lugar);
                }
            }

            $valoresDeEntrada = [];
            $cont++;
        }

        //echo '---------- ';
        //echo count($lugaresParaMostrar);
        $Op1 = [];
        $Op2 = [];
        $Op3 = [];

        if (count($lugaresParaMostrar) == 6) {
            for ($i = 0; $i <= count($lugaresParaMostrar); $i++) {
                if ($i < 2) {
                    array_push($Op1, $lugaresParaMostrar[$i]);
                } else if ($i < 4) {
                    array_push($Op2, $lugaresParaMostrar[$i]);
                } else {
                    array_push($Op3, $lugaresParaMostrar[$i]);
                }
            }
        } else if (count($lugaresParaMostrar) > 6) {
            if (count($lugaresParaMostrar) == 7) {
                for ($i = 0; $i <= count($lugaresParaMostrar)-1; $i++) {
                    if ($i < 3) {
                        array_push($Op1, $lugaresParaMostrar[$i]);
                    } else if ($i < 5) {
                        array_push($Op2, $lugaresParaMostrar[$i]);
                    } else {
                        array_push($Op3, $lugaresParaMostrar[$i]);
                    }
                }
            } else if (count($lugaresParaMostrar) == 8 || count($lugaresParaMostrar) == 9) {
                for ($i = 0; $i <= count($lugaresParaMostrar)-1; $i++) {
                    if ($i < 3) {
                        array_push($Op1, $lugaresParaMostrar[$i]);
                    } else if ($i < 6) {
                        array_push($Op2, $lugaresParaMostrar[$i]);
                    } else {
                        array_push($Op3, $lugaresParaMostrar[$i]);
                    }
                }
            } else {
                for ($i = 0; $i <= count($lugaresParaMostrar)-1; $i++) {
                    if ($i < 4) {
                        array_push($Op1, $lugaresParaMostrar[$i]);
                    } else if ($i < 8) {
                        array_push($Op2, $lugaresParaMostrar[$i]);
                    } else {
                        array_push($Op3, $lugaresParaMostrar[$i]);
                    }
                }
            }
        }

        $lugaresParaMostrar = [];
        array_push($lugaresParaMostrar, $Op1);
        array_push($lugaresParaMostrar, $Op2);
        array_push($lugaresParaMostrar, $Op3);

        return $lugaresParaMostrar;
    }

}