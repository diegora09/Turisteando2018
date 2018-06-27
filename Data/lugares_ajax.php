<?php
   # conectare la base de datos
	include_once 'Connection.php';
    $connection = new Connection();
    $con = $connection->getConnection();
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		include 'paginacion.php'; //incluir el archivo de paginación
		//las variables de paginación
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //la cantidad de registros que desea mostrar
		$adjacents  = 2; //brecha entre páginas después de varios adyacentes
		$offset = ($page - 1) * $per_page;
		//Cuenta el número total de filas de la tabla*/
		$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM lugaresturisticos ");
		if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
		$total_pages = ceil($numrows/$per_page);
		$reload = 'index.php';
		//consulta principal para recuperar los datos
		$query = mysqli_query($con,"SELECT * FROM lugaresturisticos  order by nombreLugar LIMIT $offset,$per_page");
		
		if ($numrows>0){
			?>
			
			<div class="wrapper row1">
			<div class="wrapper row3">
			<div class="sectiontitle" style="margin-top: 10px;">
				<h6 class="heading">Lugares Turisticos</h6>
			</div>

			<?php
			while($row = mysqli_fetch_array($query)){
				?>
					<div class="container-fluid"  style="background-color:#f9f9f9; height:300px;">
						<div class="form-group">
						    <div class="row"  style="background-color:#f9f9f9;">
							    <div class="col-sm-4" >
							    	<br><br><br>
							    	<div style="width: 300px;height: 200px;margin-left: 100px; margin-top: 30px;">
							    		
										<?php
									    	echo "<img src=\"../images/".$row['imagen']. "\">"; 
										?>	
							    	</div>
	
										<br>
						   
								</div>
							    <div class="col-sm-4" style="margin-top: 50px; text-align: center;">
							    	<br>
							    	<h2 style="color: #08a803">
							    		<?php echo $row['nombreLugar'];?>
							    	</h2>
							    	<br>
							    	<br>
							    	<a style="color: #000000;" >
							    		<?php echo $row['descripcion'];?>
									</a>
									
								</div>	
							    <div class="col-sm-4" style="margin-top: 100px; ">
									<img src="../images/icon8.png" onclick="javascript:cambia_de_pagina(<?php echo $row['id']; ?>);" title="Actualizar" style="width: 100px;height: 100px;margin-left: 100px;" alt="">
							    	<img src="../images/icon9.png" onclick="javascript:eliminar(<?php echo $row['id']; ?>);" title="Eliminar" style="width: 100px;height: 100px;margin-left: 100px;" alt="">


							    </div>
							</div>
						</div>
					</div>
					<br>
					
				<?php
			}
			?>
		
			  	<table class="table table-bordered" border="0">
					<tr>
						<td colspan=9><span class="pull-right">
						<?php
						 echo paginate($reload, $page, $total_pages, $adjacents);
						?></span></td>
					</tr>
			  	</table>
	
			<?php
			
		} else {
			?>
			<div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Aviso!!!</h4> No hay datos para mostrar
            </div>
			<?php
		}
	}
?>
<script>
	function cambia_de_pagina(id){
		location.href="../View/actualizar_lugar.php?id="+id
	}
	function eliminar(id){

		location.href="../Business/EliminarLugarAction.php?id="+id
	}
</script>