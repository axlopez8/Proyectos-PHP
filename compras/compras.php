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
						<h2>Tabla Compras</h2>
					</div>
					<div class="col-sm-6">
						<a href="#AñadirRegistro" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Añadir Compra</span></a>						
					</div>
				</div>
			</div>
			<?php
				include_once '../Conexion.php';
				$consulta = "SELECT  C.idCompra, C.Total_Monto, C.Total_Pagado, P.Nombre_Empresa, C.FK_Proveedor FROM compras AS C INNER JOIN proveedores AS P ON C.FK_Proveedor= P.idProveedor ORDER BY C.idCompra";
				$resultado = mysqli_query($conexion, $consulta) or die ("Si esta leyendo estoy significa que la consulta esta mal compras");
				While($columna=mysqli_fetch_array($resultado)){
					
				
			?>
			<div class="card bg-secondary text-white mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Compra No.<?php echo $columna[0] ?></h5>
                        <p class="card-text m-auto">Vendedor:<?php echo $columna[3] ?></p>  
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-striped table-bordered table-sm">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" scope="col">Cantidad.</th>
                                        <th class="text-center" scope="col">Producto</th>
                                        <th class="text-center" scope="col">Sub Total</th>
                                    </tr>
                                </thead>
								
                                <tbody>
								<?php 
								$consultad = "SELECT D.Cantidad, P.Nombre, D.sub_total FROM detalles_compras AS D INNER JOIN productos AS P ON D.FK_Producto = P.idProducto WHERE D.FK_Compra = $columna[0]";
								$resultadod= mysqli_query($conexion, $consultad) or die ("Si esta leyendo estoy significa que la consulta esta mal detalles");
								$total=0;
								While($columnad=mysqli_fetch_array($resultadod)){
								?>
                                    <tr>
                                        <td class="text-center table-secondary"><?php echo $columnad[0]?> </td>
                                        <td class="table-secondary"><?php echo $columnad[1]?> </td>
                                        <td class="text-center table-secondary"><?php echo $columnad[2]; $total= $total + $columnad[2]?> </td>
                                    </tr>
									<?php } ?>
                                    <tr>
                                        <td class="table-dark text-right" colspan="2">SubTotal</td>
                                        <td class="table-secondary text-center">Q.<?php echo $total; $total=0;?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="card-subtitle">Total: Q.<?php echo $columna[1];?></p>
                        <p class="card-subtitle">Pago: Q.<?php echo $columna[2];?> </p>
                    </div>
                </div>
			<?php } ?>
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
					<h4 class="modal-title">Añadir Compra</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div id="SEL2" class="form-group">  
                            
                            <label>Nombre del Proveedor</label> 

                            <select id="proveedor" class="form-control"  required>
                            <option selected >---- Nombre de los Proveedores ----</option>
                           
                            <?php
                                $consulta2 = "SELECT idProveedor, Nombre_Empresa from proveedores";
								$resultado2 = mysqli_query($conexion, $consulta2) or die ("Si esta leyendo estoy significa que la consulta esta mal");
								While($columna2=mysqli_fetch_array($resultado2)){
                            ?>
                            <option value="<?php echo $columna2[0]?>" ><?php echo $columna2[1]?></option>
                            <?php
                                }  
                            ?>
                            </select>
                            
                        </div>	
						<div id="SEL2" class="form-group">  
                            
                            <label>Nombre del Proveedor</label> 

                            <select id="proveedor" class="form-control"  required>
                            <option selected >---- Nombre de los Proveedores ----</option>
                           
                            <?php
                                $consulta2 = "SELECT idProveedor, Nombre_Empresa from proveedores";
								$resultado2 = mysqli_query($conexion, $consulta2) or die ("Si esta leyendo estoy significa que la consulta esta mal");
								While($columna2=mysqli_fetch_array($resultado2)){
                            ?>
                            <option value="<?php echo $columna2[0]?>" ><?php echo $columna2[1]?></option>
                            <?php
                                }  
                            ?>
                            </select>
                            
                        </div>	
				<div class="modal-body">					
					<div class="form-group">
						<label>Total_Monto</label>
						<input type="nomber" id="monto" class="form-control" required readonly>
					</div>
					<div class="form-group">
						<label>Total_Pagado</label>
						<input type="number" id="pago" class="form-control" required>
					</div>
					
					<div class="form-group">
						<label>Estado</label>
						<input type="text" id="estado" class="form-control" readonly required>
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
</body>
</html>
<script>
// java script para agregar valores de registros.
function agregar(){
	var Total_Monto = $('#Total_Monto').val();
	var Total_Pagado =  $('#Total_Pagado').val();
	var proveedor = $('#proveedor').val();
	var estado = $('#estado').val();
	var parametros = 'Total_Monto=' + Total_Monto + '&Total_Pagado=' + Total_Pagado + '&proveedor=' + proveedor + '&estado=' + estado;
	
	$.ajax({
		method: "POST",
		url: "crear.php",
		data: parametros,
		success:function(){
			location.reload();
		}
	})
}; 

</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    
$(document).on("change","#pago",function(){
    if(document.getElementById("monto").value >= document.getElementById("pago").value){
		document.getElementById('estado').value = "Cancelado"
	}else{
		document.getElementById('estado').value = "Deuda"
	}
});

</script>
