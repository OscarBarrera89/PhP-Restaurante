<?php

// Recupero datos de parametro en forma de array asociativo
$cliente = json_decode($_POST['cliente'],true);

require_once("config.php");
$conexion = obtenerConexion();

$sql = "SELECT * FROM cliente;";

$resultado = mysqli_query($conexion, $sql);

$options = "";

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_modificar_cliente.php" name="frmAltaCliente" id="frmAltaCliente" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Modificación de Cliente</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombreCliente">Nombre</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $cliente['nombre']?>" id="txtNombreCliente" name="txtNombreCliente" placeholder="Nombre del cliente" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtEmailCliente">Email</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $cliente['email']?>" id="txtEmailCliente" name="txtEmailCliente" placeholder="Email" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtTelefonoCliente">Telefono</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $cliente['telefono']?>" id="txtTelefonoCliente" name="txtTelefonoCliente" placeholder="Telefono" class="form-control input-md" type="number">
                    </div>
                </div>
                <input value="<?php echo $cliente['idcliente']?>" type='hidden' name='idcliente' id='idcliente' />
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarAltaCliente"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAltaCliente" name="btnAceptarAltaCliente" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>