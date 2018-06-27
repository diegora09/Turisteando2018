<?php

include_once '../Data/AdminData.php';

class AdminBusiness {

    public function AdminBusiness() {
        $this->adminData = new AdminData();
    }
	
	public function crearAdmin($inputArray) {
        $result = $this->adminData->crearAdmin($inputArray);
    }

    public function crearLugarAdmin($inputArray) {
        $result = $this->adminData->crearLugarAdmin($inputArray);
    }
	
	public function listaAdmin() {
        $result = $this->adminData->listaAdmin();
        return $result;
    }
	
	public function eliminarAdmin($id) {
        $result = $this->adminData->eliminarAdmin($id);
    }
    public function eliminarLugar($id) {
        $result = $this->adminData->eliminarLugar($id);
    }

    public function actualizarAdmin($inputArray) {
        $result = $this->adminData->actualizarAdmin($inputArray);
    }

    public function actualizarLugar($inputArray) {
        $result = $this->adminData->actualizarLugar($inputArray);
    }
}
