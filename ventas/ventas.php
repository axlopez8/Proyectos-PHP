<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Tersa.gt</title>
<link rel="stylesheet" href="../css/estilos.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Tabla Ventas</h2>
					</div>
					<div class="col-sm-6">
						<a href="#AñadirRegistro" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Añadir Venta</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Direccion_Venta</th>
						<th>Total_Monto</th>
						<th>Total_Pagado</th>
						<th>Estado</th>
						<th> </th>

					</tr>
				</thead>
				<tbody>
				<?php
				include_once '../Conexion.php';
				$consulta = "SELECT p.idVenta, p.Direccion_Venta, P.Total_monto, P.total_pagado, Pro.Nombre, p.FK_Estado FROM ventas AS P INNER JOIN estados_deudas AS Pro ON P.FK_Estado = Pro.idEstado";
				$resultado = mysqli_query($conexion, $consulta) or die ("Si esta leyendo estoy significa que la consulta esta mal");
				While($columna=mysqli_fetch_array($resultado)){
					
				
			?>
					<tr>
						
						<td> <?php echo $columna[0] ?> </td>
						<td> <?php echo $columna[1] ?></td>
						<td> <?php echo $columna[2] ?></td>
						<td> <?php echo $columna[3] ?></td>
						<td> <?php echo $columna[4] ?></td>


						<td>
							<a href="#EditarRegistro" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit" onclick='EdiForm(<?php echo $columna[0] ?>,"<?php echo $columna[1] ?>",<?php echo $columna[2] ?>,<?php echo$columna[3] ?>,<?php echo $columna[4] ?>,<?php echo $columna[5] ?>)'> &#xE254;</i></a>
							<a href=""  class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete" onclick="eliminar(<?php echo $columna[0]?>,'<?php echo $columna[1]?>')">&#xE872;</i></a>
						</td>
					</tr>
					<?php
				}
					?>
					
				</tbody>
			</table>
			
		</div>
		<br>
	<br>
	<br>
	<center><button style="background-color:green" class="btn btn-secondary btn-lg active" onclick="window.location.href='/Proyectos%20PHP/menu.php'"> MENU</button></center>
	</div>        
</div>
<!-- Edit Modal HTML -->
<div id="AñadirRegistro" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="crear.php" method="POST" >
				<div class="modal-header">						
					<h4 class="modal-title">Añadir Venta</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Direccion_Venta</label>
						<input type="text" id="direccion_venta" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Total_Monto</label>
						<input type="number" id="total_monto" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Total_Pagado</label>
						<input type="number" id="total_pagado" step="0.01" class="form-control" required>

					</div>
					<div id="SEL2" class="form-group">  
                            
                            <label>Estado</label> 

                            <select id="estados" class="form-control"  required>
                            <option selected >---- Estados ----</option>
                           
                            <?php
                                $consulta2 = "SELECT idEstado, Nombre from estados_deudas";
								$resultado2 = mysqli_query($conexion, $consulta2) or die ("Si esta leyendo estoy significa que la consulta esta mal");
								While($columna2=mysqli_fetch_array($resultado2)){
                            ?>
                            <option value="<?php echo $columna2[0]?>" ><?php echo $columna2[1]?></option>
                            <?php
                                }  
                            ?>
                            </select>
                            
                        </div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="button" class="btn btn-success" value="Agregar" onclick="agregar()">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="EditarRegistro" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="" method="POST" >
				<div class="modal-header">						
					<h4 class="modal-title">Editar Venta</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>ID</label>
						<input type="number" id="id2" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Direccion_Venta</label>
						<input type="text" id="direccion_venta2" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Total_Monto</label>
						<input type="number" id="total_monto2" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Total_Pagado</label>
						<input type="number" id="total_pagado2" step="0.01" class="form-control" required>

					</div>
					<div id="SEL2" class="form-group">  
                            
                            <label>Nombre del Estado</label> 

                            <select id="estados2" class="form-control"  required>
                            <option selected >---- Estados----</option>
                           
                            <?php
                                $consulta2 = "SELECT idEstado, Nombre from estados_deudas";
								$resultado2 = mysqli_query($conexion, $consulta2) or die ("Si esta leyendo estoy significa que la consulta esta mal");
								While($columna2=mysqli_fetch_array($resultado2)){
                            ?>
                            <option value="<?php echo $columna2[0]?>" ><?php echo $columna2[1]?></option>
                            <?php
                                }  
                            ?>
                            </select>
                            
                        </div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="button" class="btn btn-success" value="Editar" onclick="Editar()">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
<script>
// java script para agregar valores de registros.
function agregar(){
	var direccion_venta = $('#direccion_venta').val();
	var total_monto =  $('#total_monto').val();
	var total_pagado = $('#total_pagado').val();
	var estados = $('#estados').val();
	var parametros = 'direccion_venta=' + direccion_venta + '&total_monto=' + total_monto + '&total_pagado=' + total_pagado +  '&estados=' + estados;
	
	$.ajax({
		method: "POST",
		url: "crear.php",
		data: parametros,
		success:function(){
			location.reload();
		}
	})
}; 

// java script para eliminar valores de registros.
function eliminar(id,direccion_venta){
	var C = confirm('Desea eliminar '+direccion_venta);
    if (C == true) {
	var parametros = 'idVenta=' + id;
	$.ajax({
		method: "POST",
		url: "borrar.php",
		data: parametros,
		success:function(){
					location.reload();
				}
	})
	}
};

// java script para obtener valores de registros.
function EdiForm(Id,direccion_venta,total_monto,total_pagado,estados){
	$("#id2").val(Id);
	$("#direccion_venta2").val(direccion_venta);
	$("#total_monto2").val(total_monto);
	$("#total_pagado2").val(total_pagado);
	$("#estados2").val(estados);
};

function Editar(){
	var ide = $('#id2').val();
	var direccion_ventae = $('#direccion_venta2').val();
	var total_montoe =  $('#total_monto2').val();
	var total_pagadoe = $('#total_pagado2').val();
	var estadose = $('#estados2').val();
	var parametros = 'direccion_venta=' + direccion_ventae + '&total_monto=' + total_montoe + '&total_pagado=' + total_pagadoe +
	'&estados=' + estadose + '&id=' + ide;
	$.ajax({
		method: "POST",
		url: "editar.php",
		data: parametros,
		success:function(){
			location.reload();
		}
	})
};
</script>
