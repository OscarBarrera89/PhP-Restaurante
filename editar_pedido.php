<?php

// Recupero datos de parámetro en forma de array asociativo
$pedido = json_decode($_POST['pedido'], true);

require_once("config.php");
$conexion = obtenerConexion();

$sql = "SELECT * FROM pedido;";

$resultado = mysqli_query($conexion, $sql);

$options = "";

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_modificar_pedido.php" name="frmModificarPedido" id="frmModificarPedido" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Modificación de Pedido</legend>
                <!-- Cliente input -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtCliente">ID Cliente</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $pedido['idcliente']; ?>" id="txtCliente" name="txtCliente" placeholder="ID del cliente" class="form-control input-md" type="number" required>
                    </div>
                </div>
                <!-- Fecha input -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtFecha">Fecha</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $pedido['fecha']; ?>" id="txtFecha" name="txtFecha" placeholder="Fecha del pedido" class="form-control input-md" type="date" required>
                    </div>
                </div>
                <!-- Camarero input -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtCamarero">Camarero</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $pedido['camarero']; ?>" id="txtCamarero" name="txtCamarero" placeholder="Nombre del camarero" class="form-control input-md" type="text" required>
                    </div>
                </div>
                <!-- Total input -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtTotal">Total</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $pedido['total']; ?>" id="txtTotal" name="txtTotal" placeholder="Total del pedido" class="form-control input-md" type="number" step="0.01" required>
                    </div>
                </div>
                <input value="<?php echo $pedido['idpedido']; ?>" type='hidden' name='idpedido' id='idpedido' />
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarModificarPedido"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarModificarPedido" name="btnAceptarModificarPedido" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>
