<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_buscar_pedido_camarero.php" name="frmBuscarPedido" id="frmBuscarPedido" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar Pedido por Camarero</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtCamarero">Camarero</label>
                    <div class="col-xs-4">
                        <input id="txtCamarero" name="txtCamarero" placeholder="Nombre del camarero" class="form-control input-md" type="text">
                    </div>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarPedido"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarPedido" name="btnAceptarBuscarPedido" class="btn btn-primary" value="Buscar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>
