<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_buscar_menu.php" name="frmBuscarmenu" id="frmBuscarmenu" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar un menu</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombreMenu">Nombre</label>
                    <div class="col-xs-4">
                        <input id="txtNombreMenu" name="txtNombreMenu" placeholder="Nombre del menu" class="form-control input-md" type="text">
                    </div>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarMenu"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarMenu" name="btnAceptarBuscarMenu" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
</body>

</html>