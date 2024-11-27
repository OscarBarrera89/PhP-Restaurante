<?php

// Recupero datos de parametro en forma de array asociativo
$menu = json_decode($_POST['menu'],true);

require_once("config.php");
$conexion = obtenerConexion();

$sql = "SELECT * FROM menu;";

$resultado = mysqli_query($conexion, $sql);

$options = "";

// Cabecera HTML que incluye navbar
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_modificar_menu.php" name="frmAltaMenu" id="frmAltaMenu" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Modificación de Menu</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombre">Nombre</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $menu['nombre']?>" id="txtNombre" name="txtNombre" placeholder="Nombre del menu" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtDescripcion">Descripción</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $menu['descripcion']?>" id="txtDescripcion" name="txtDescripcion" placeholder="Descripcion" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtPrecio">Precio</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $menu['precio']?>" id="txtPrecio" name="txtPrecio" placeholder="Precio" class="form-control input-md" type="number" step="0.01">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="selectAlergenos">Tipo</label>
                    <div class="col-xs-4">
                        <select name="selectAlergenos" id="selectAlergenos" class="form-select" aria-label="Default select example">
                            <option value="<?php echo $menu['alergenos'] ?>" checked><?php echo $menu['alergenos'] ?></option>
                            <option value="gluten">Gluten</option>
							<option value="crustaceos">Crustáceos</option>
							<option value="huevos">Huevos</option>
							<option value="pescado">Pescado</option>
							<option value="cacahuetes">Cacahuetes</option>
							<option value="soja">Soja</option>
							<option value="lacteos">Leche y derivados (incluyendo lactosa)</option>
							<option value="frutos_cascara">Frutos de cáscara (almendras, avellanas, nueces, etc.)</option>
							<option value="apio">Apio</option>
							<option value="mostaza">Mostaza</option>
							<option value="sesamo">Sésamo</option>
							<option value="sulfitos">Sulfitos</option>
							<option value="altramuces">Altramuces</option>
							<option value="moluscos">Moluscos</option>
                        </select>
                    </div>
                </div>
                <input value="<?php echo $menu['idplato']?>" type='hidden' name='idplato' id='idplato' />
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarAltaMenu"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAltaMenu" name="btnAceptarAltaMenu" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
</body>

</html>