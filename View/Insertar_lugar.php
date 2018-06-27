<?php
include('../Sesion/session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php 
  include("navbar.php");
?>
<div class="wrapper row1">
  <div class="container border border-success" style="width: 1100px;">    
    <figure style="text-align: center;"><a><img src="../images/icon3.png" style="text-align: center; width: 200px;height: 200px;" alt=""></a>
    </figure>
    <br>
    <h3 style="text-align: center;"" class="text-success">Insertar Lugares Turisticos</h3>
    <br>
    <form name="crearLugar" class="form-horizontal" action="../Business/CrearLugarAction.php" method="post">
      <div class="form-group " >
        <label for="Nombre" class="control-label col-md-4">Nombre:</label>
        <div class="col-md-4">
          <input class="form-control" type="text" placeholder="Nombre" name="nombre" id="nombre">
        </div>
      </div>
      <div class="form-group">
        <label for="descripcion" class="control-label col-md-4 ">Descripción: </label>
        <div class="col-md-4">
          <input class="form-control" type="textarea" placeholder="Descripción" name="descripcion" id="descripcion">
        </div>
      </div>
      <div class="form-group">
        <label for="ubicacion" class="control-label col-md-4 ">Precios: </label>
        <div class="dropdown col-md-4">
          <select class="form-control" id="precio" name="precio">
            <option value="0 a 25000"> 0 a 25000 </option>
            <option value="26000 a 50000"> 26000 a 50000 </option>
            <option value="51000 a 100000"> 51000 a 100000 </option>
            <option value="Mas de 100000"> Mas de 100000 </option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="ubicacion" class="control-label col-md-4 ">Tipo de turista: </label>
        <div class="dropdown col-md-4">
          <select class="form-control" id="tipo" name="tipo">
            <option value="Aventurero"> Aventurero </option>
            <option value="Cultural"> Cultural </option>
            <option value="Gastronomico"> Gastronomico </option>
            <option value="Convencional"> Convencional </option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="ubicacion" class="control-label col-md-4 ">Tipo de actividad: </label>
        <div class="dropdown col-md-4">
          <select class="form-control" id="actividad" name="actividad">
            <option value="Alojamiento"> Alojamiento </option>
             <option value="Aire libre"> Aire libre </option>
             <option value="Volcanes"> Volcanes </option>
             <option value="Senderismo"> Senderismo </option>
             <option value="Kayak"> Kayak </option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="ubicacion" class="control-label col-md-4 ">Tipo de atractivo: </label>
        <div class="dropdown col-md-4">
          <select class="form-control" id="atractivo" name="atractivo">
            <option value="Bibliotecas"> Bibliotecas </option>
             <option value="Galería de artes"> Galería de artes </option>
             <option value="Museos"> Museos </option>
             <option value="Jardines"> Jardines </option>
             <option value="Hoteles"> Hoteles </option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="ubicacion" class="control-label col-md-4 ">Ubicación: </label>
        <div class="col-md-2">
          <input class="form-control" type="text" placeholder="Latitud" name="lat" id="lat">
        </div>
        <div class="col-md-2">
          <input class="form-control" type="text" placeholder="Longitud" name="long" id="long">
        </div>
      </div>
      <div class="form-group ">
          <label for="file" class="control-label col-md-4 ">Seleccione una imagen</label>
          <div class="col-md-4">
            <input type="file" class="form-control-file btn btn-secundary dropdown-toggle col-md-12" name="imagen"  id="imagen">
          </div>
      </div>
      <div class="form-group ">
          <label for="file" class="control-label col-md-4 ">Seleccione un video</label>
          <div class="col-md-4">
            <input type="file" class="form-control-file btn btn-secundary dropdown-toggle col-md-12" name="video" id="video">
          </div>
      </div>
      <div class="form-group ">
          <div class="col-md-6 col-md-offset-4">
            <input type="submit" class="btn btn-success col-md-8" value="Guardar" id="BtnGuardar">
          </div>
      </div>
    </form>
  </div>
</div>
<br>
<?php
  include("footer.php");
  ?>
  </body>
</html>