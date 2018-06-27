<?php
include "../Data/Connection.php";

$connection = new Connection();
$conn = $connection->getConnection();
$sql1= "select * from admin where id = ".$_GET["id"];
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
			<form class="form-horizontal" name="crearAdmin" action="../Business/ActualizarAdminAction.php" method="post">
				<div class="form-group " >
					<figure style="text-align: center;"><a><img src="../images/icon2.png" style="text-align: center; width: 200px;height: 200px;" alt=""></a>
		        	</figure>
		        	<br>
					<h3 style="text-align: center;"" class="text-success">Actualizar Administrador</h3>

					
					</div>
					<br>
						<div class="form-group " >
						<label for="name" class="control-label col-md-4">Nombre:</label>
						<div class="col-md-4">
							<input class="form-control" type="text" value="<?php echo $person->nombre; ?>" placeholder="name" id="name" name="name">
						</div> 
						</div>
						<div class="form-group " >
						<label for="user" class="control-label col-md-4">Usuario:</label>
						<div class="col-md-4">
							<input class="form-control" type="text" value="<?php echo $person->usuario; ?>" placeholder="user" id="user" name="user">
						</div>
						</div>
						<div class="form-group " >
						<label for="password" class="control-label col-md-4">Contraseña:</label>
						<div class="col-md-4">
							<input class="form-control" type="text" value="<?php echo $person->contraseña; ?>" placeholder="password" id="password" name="password">
						</div> 
						<input type="hidden" id="id" name="id" value="<?php echo $person->id; ?>">

						</div>
						<div class="form-group ">
							<div class="col-md-6 col-md-offset-4">
								<input type="submit" class="btn btn-success col-md-8" value="Actualizar" id="btnActualizar">
							</div>
						</div>
				</div>
			</form>
	</div>>
</div>
<?php else:?>
<p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>