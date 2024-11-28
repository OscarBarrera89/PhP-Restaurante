<?php
require_once("config.php");

$conexion = obtenerConexion();

$sql = "SELECT * FROM pedido ORDER BY idpedido ASC;";

$resultado = mysqli_query($conexion, $sql);

include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" name="frmParametrizadoPedido" id="frmParametrizadoPedido" action="get_pedidos.php" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Listado de pedidos parametrizados</legend>
                <h5>Rellene uno de los tres apartados para obtener datos</h5>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstCliente">ID Cliente</label>
                    <div class="col-xs-4">
                        <input id="lstCliente" name="lstCliente" placeholder="ID del cliente"
                               class="form-control input-md" type="number">
                    </div>
                </div>
                <!-- Date input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtFecha">Fecha</label>
                    <div class="col-xs-4">
                        <input id="txtFecha" name="txtFecha" placeholder="Fecha del pedido" class="form-control input-md" type="date">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtCamarero">Camarero</label>
                    <div class="col-xs-4">
                        <input id="txtCamarero" name="txtCamarero" placeholder="Nombre del camarero" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnBuscarParametrizadoPedido"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnBuscarParametrizadoPedido" name="btnBuscarParametrizadoPedido"
                               class="btn btn-primary" value="Buscar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>
