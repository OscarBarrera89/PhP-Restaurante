<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_buscar_cliente.php" name="frmBuscarCliente" id="frmBuscarCliente" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar un cliente</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombreCliente">Nombre</label>
                    <div class="col-xs-4">
                        <input id="txtNombreCliente" name="txtNombreCliente" placeholder="Nombre del cliente" class="form-control input-md" type="text">
                    </div>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarCliente"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarCliente" name="btnAceptarBuscarCliente" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>
