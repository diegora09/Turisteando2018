<?php

include_once '../Data/EuclidesData.php';

class EuclidesBusiness {

    public function EuclidesBusiness() {
        $this->euclidesData = new EuclidesData();
    }
	
    public function determinarLugares($filtros) {
        $result = $this->euclidesData->determinarLugares($filtros);
    }
	
}
