<?php
include_once("config.php");
$conexion = obtenerConexion();

$sql = "SELECT idcliente, nombre, email, telefono, FROM cliente;";

$resultado = mysqli_query($conexion, $sql);

include_once("cabecera.html");
?>
    <div class="container" id="formularios">
        <div class="row">
            <form class="form-horizontal" name="frmAltaCliente" id="frmAltaCliente" action="proceso_alta_cliente.php" method="post">
				<fieldset>
					<!-- Form Name -->
					<legend>Alta de cliente</legend>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-xs-4 control-label" for="txtNombreCliente">Nombre del cliente</label>
						<div class="col-xs-4">
							<input id="txtNombreCliente" name="txtNombreCliente" placeholder="Nombre del cliente"
								class="form-control input-md" type="text">
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-xs-4 control-label" for="txtEmailCliente">Email del Cliente</label>
						<div class="col-xs-4">
							<input id="txtemailCliente" name="txtemailCliente" placeholder="Email del Cliente" class="form-control input-md"
								type="text">
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-xs-4 control-label" for="txttelefonoCliente">Telefono</label>
						<div class="col-xs-4">
							<input id="txttelefonoCliente" name="txttelefonoCliente" placeholder="Telefono del cliente" class="form-control input-md"
								type="number">
						</div>
					</div>
					<!-- Button -->
					<div class="form-group">
						<label class="col-xs-4 control-label" for="btnAceptarAltacliente"></label>
						<div class="col-xs-4">
							<input type="submit" id="btnAceptarAltacliente" name="btnAceptarAltacliente"
								class="btn btn-primary" value="Aceptar"/>
						</div>
					</div>
				</fieldset>
			</form>
        </div>
    </div>
</body>
</html>

