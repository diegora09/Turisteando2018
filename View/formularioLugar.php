<?php
include "../Data/Connection.php";

$connection = new Connection();
$conn = $connection->getConnection();
$sql1= "select * from lugaresturisticos where id = ".$_GET["id"];
$query = $conn->query($sql1);
$person = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $person=$r;
  break;
}

  }
?>

<?php if($person!=null):?>


<div class="wrapper row1">
  <div class="container border border-success" style="width: 1100px;">    
  <form class="form-horizontal" name="crearAdmin" action="../Business/ActualizarLugarAction.php" method="post">
    <div class="form-group " >
      <figure style="text-align: center;"><a><img src="../images/icon4.png" style="text-align: center; width: 200px;height: 200px;" alt=""></a>
      </figure>
      <br>
      <h3 style="text-align: center;"" class="text-success">Actualizar Lugares Turisticos</h3>
      <br>
      <label for="Nombre" class="control-label col-md-4">Nombre:</label>
      <div class="col-md-4">
        <input class="form-control" type="text" placeholder="Nombre" id="Nombre" name="Nombre" value="<?php echo $person->nombreLugar; ?>">
      </div>
    </div>

  <div class="form-group">
    <label for="descripcion" class="control-label col-md-4 ">Descripción: </label>
    <div class="col-md-4">
	    <textarea rows="4" cols="50" rows="3" cols="50" style="width: 342px; height: 200px; overflow: scroll;" placeholder="Descripción" id="descripcion" name="descripcion"><?php echo $person->descripcion;?>
		</textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="ubicacion" class="control-label col-md-4 ">Precios: </label>
    <div class="dropdown col-md-4">
      <select class="form-control" id="precio" name="precio" value="<?php echo $person->precio; ?>">
        <option value="1"> 0 a 25000 </option>
        <option value="2"> 26000 a 50000 </option>
        <option value="3"> 51000 a 100000 </option>
        <option value="4"> Mas de 100000 </option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="ubicacion" class="control-label col-md-4 ">Tipo de turista: </label>
    <div class="dropdown col-md-4">
      <select class="form-control" id="turista" name="turista" value="<?php echo $person->tipoTurista; ?>">
        <option value="1"> Aventurero </option>
         <option value="2"> Cultural </option>
         <option value="3"> Gastronomico </option>
         <option value="4"> Convencional </option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="ubicacion" class="control-label col-md-4 ">Tipo de actividad: </label>
    <div class="dropdown col-md-4">
      <select class="form-control" id="act" name="act" value="<?php echo $person->tipoActividad; ?>">
        <option value="1"> Alojamiento </option>
         <option value="2"> Aire libre </option>
         <option value="3"> Volcanes </option>
         <option value="4"> Senderismo </option>
         <option value="5"> Kayak </option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="ubicacion" class="control-label col-md-4 ">Tipo de atractivo: </label>
    <div class="dropdown col-md-4">
      <select class="form-control" id="atractivo" name="atractivo" value="<?php echo $person->tipoAtractivo; ?>">
        <option value="1"> Bibliotecas </option>
         <option value="2"> Galería de artes </option>
         <option value="3"> Museos </option>
         <option value="4"> Jardines </option>
         <option value="5"> Hoteles 
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label for="ubicacion" class="control-label col-md-4 ">Ubicación: </label>
    <div class="col-md-2">
      <input class="form-control" type="text" placeholder="Latitud" id="lat" name="lat" value="<?php echo $person->latitud; ?>">
    </div>
    <div class="col-md-2">
      <input class="form-control" type="text" placeholder="Longitud" id="long" name="long" value="<?php echo $person->longitud; ?>">
    </div>
  </div>
  <div class="form-group ">
      <label for="file" class="control-label col-md-4 ">Seleccione una imagen</label>
      <div class="col-md-4">
        <input type="file" class="form-control-file btn btn-secundary dropdown-toggle col-md-12" id="imagen" name="imagen" value="<?php echo $person->imagen; ?>">
      </div>
  </div>

  <div class="form-group ">
      <label for="file" class="control-label col-md-4 ">Seleccione un video</label>
      <div class="col-md-4">
        <input type="file" class="form-control-file btn btn-secundary dropdown-toggle col-md-12" id="video" name="video" value="<?php echo $person->video; ?>">
      </div>
  </div>
<input type="hidden" id="id" name="id" value="<?php echo $person->id; ?>">

  <div class="form-group ">
      <div class="col-md-6 col-md-offset-4">
        <input type="submit" class="btn btn-success col-md-8" value="Guardar" id="BtnGuardar">
      </div>
  </div>
  
    </form>
</div>
</div>

<br>
<?php else:?>
<p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>