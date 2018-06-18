<?php

class LugarTuristico {
	
	private $id;
	private $tipoTurista;
	private $tipoActividad;
	private $tipoAtractivo;
	private $precio;
	private $nombreLugar;
	private $latitud;
	private $longitud;
	private $imagen;
	private $video;
	private $descripcion;

    public function LugarTuristico($id, $tipoTurista, $tipoActividad, $tipoAtractivo, $precio, $nombreLugar, $latitud, $longitud, $imagen, $video, $descripcion){
		$this->id = $id;
		$this->tipoTurista = $tipoTurista;
		$this->tipoActividad = $tipoActividad;
		$this->tipoAtractivo = $tipoAtractivo;
		$this->precio = $precio;
		$this->nombreLugar = $nombreLugar;
		$this->latitud = $latitud;
		$this->longitud = $longitud;
		$this->imagen = $imagen;
		$this->video = $video;
		$this->descripcion = $descripcion;
    }
	
	public function getId(){
        return $this->id;
    }
     
    public function setId($id){
        $this->id = $id;
    }
	
	public function getTipoTurista(){
        return $this->tipoTurista;
    }
     
    public function setTipoTurista($tipoTurista){
        $this->tipoTurista = $tipoTurista;
    }
	public function getTipoActividad(){
        return $this->tipoActividad;
    }
     
    public function setTipoActividad($tipoActividad){
        $this->tipoActividad = $tipoActividad;
    }
	public function getTipoAtractivo(){
        return $this->tipoAtractivo;
    }
     
    public function setTipoAtractivo($tipoAtractivo){
        $this->tipoAtractivo = $tipoAtractivo;
    }
	public function getPrecio(){
        return $this->precio;
    }
     
    public function setPrecio($precio){
        $this->precio = $precio;
    }
	public function getNombreLugar(){
        return $this->nombreLugar;
    }
     
    public function setNombreLugar($nombreLugar){
        $this->nombreLugar = $nombreLugar;
    }
	public function getLatitud(){
        return $this->latitud;
    }
     
    public function setLatitud($latitud){
        $this->latitud = $latitud;
    }
	public function getLongitud(){
        return $this->longitud;
    }
     
    public function setLongitud($longitud){
        $this->longitud = $longitud;
    }
	public function getImagen(){
        return $this->imagen;
    }
     
    public function setImagen($imagen){
        $this->imagen = $imagen;
    }
	public function getVideo(){
        return $this->video;
    }
     
    public function setVideo($video){
        $this->video = $video;
    }
	public function getDescripcion(){
        return $this->descripcion;
    }
     
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
}