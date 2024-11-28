<?php
require_once("config.php");

$conexion = obtenerConexion();

$sql = "SELECT * FROM cliente ORDER BY idcliente ASC;";

$resultado = mysqli_query($conexion, $sql);

include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
    <form class="form-horizontal" name="frmParametrizadoCliente" id="frmParametrizadoCliente" action="get_cliente.php" method="get">
				<fieldset>
					<!-- Form Name -->
					<legend>Listado de los clientes parametrizados por este formulario</legend>
					<h5>Rellene uno de los tres apartados para obtener datos</h5>
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
						<label class="col-xs-4 control-label" for="txtEmailCliente">Email del cliente</label>
						<div class="col-xs-4">
							<input id="txtEmailCliente" name="txtEmailCliente" placeholder="Email del cliente" class="form-control input-md"
								type="text">
						</div>
					</div>
                    <!-- Text input-->
					<div class="form-group">
						<label class="col-xs-4 control-label" for="txtTelefonoCliente">Telefono del cliente</label>
						<div class="col-xs-4">
							<input id="txtTelefonoCliente" name="txtTelefonoCliente" placeholder="Telefono del cliente" class="form-control input-md"
								type="text">
						</div>
					</div>
					
					<!-- Button -->
					<div class="form-group">
						<label class="col-xs-4 control-label" for="btnBuscarParametrizadoCliente"></label>
						<div class="col-xs-4">
							<input type="submit" id="btnBuscarParametrizadoCliente" name="btnBuscarParametrizadoCliente"
								class="btn btn-primary" value="Buscar" />
						</div>
                    </div>
                </fieldset>
        </form>
    </div>
</div>
</body>

</html>