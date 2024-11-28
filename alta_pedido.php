<?php
include_once("config.php");
$conexion = obtenerConexion();

$sql = "SELECT idpedido, idcliente, fecha, camarero, total FROM pedido;";

$resultado = mysqli_query($conexion, $sql);

$sql2 = "SELECT idcliente, nombre, email, telefono FROM cliente;";

$resultado2 = mysqli_query($conexion, $sql2);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado2)) {
    // $tipos[] = $fila; // Insertar una fila al final
    $options .= " <option value='" . $fila["idcliente"] . "'>" . $fila["nombre"] . "</option>";
}

include_once("cabecera.html");
?>
    <div class="container" id="formularios">
        <div class="row">
		<form class="form-horizontal" name="frmAltaPedido" id="frmAltaPedido">
				<fieldset>
					<!-- Form Name -->
					<legend>Alta de Pedido</legend>
					<!-- Select input-->
					<div class="row mb-3">
                        <label class="col-2 control-label" for="lstCliente">Cliente</label>
                        <div class="col-3">
                            <select class="form-select" name="lstCliente" id="lstCliente">
                                <option value="Selecciona un cliente"><?php echo $options; ?></option>
                            </select>
                        </div>
                    </div>
					<!-- Fecha input-->
					<div class="row mb-3">
						<label for="txtFecha" class="form-label">Fecha</label>
						<div class="col-3">
							<input name="txtFecha" id="txtFecha" type="date"
								placeholder="Fecha" class="form-control input-md" />
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-xs-4 control-label" for="txtCamarero">Camarero</label>
						<div class="col-xs-4">
							<input id="txtCamarero" name="txtCamarero" placeholder="Nombre Camarero" class="form-control input-md"
								type="text">
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-xs-4 control-label" for="txtTotal">Total</label>
						<div class="col-xs-4">
							<input id="txtTotal" name="txtTotal" placeholder="2.32" class="form-control input-md"
								type="number" step="0.01">
						</div>
					</div>
					<!-- Button -->
					<div class="form-group">
						<label class="col-xs-4 control-label" for="btnAceptarAltaPedido"></label>
						<div class="col-xs-4">
							<input type="button" id="btnAceptarAltaPedido" name="btnAceptarAltaPedido"
								class="btn btn-primary" value="Aceptar" />
						</div>
					</div>
				</fieldset>
			</form>
        </div>
    </div>
</body>
</html>
