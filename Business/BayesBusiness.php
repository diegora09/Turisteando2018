<?php

include_once '../Data/BayesData.php';

class BayesBusiness {

    public function BayesBusiness() {
        $this->bayesData = new BayesData();
    }
	

	
	public function determinarLugares($filtros) {
        $result = $this->bayesData->determinarLugares($filtros);
        return $result;
    }
	

}
