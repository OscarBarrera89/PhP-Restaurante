<?php
include_once("config.php");
$conexion = obtenerConexion();

$sql = "SELECT idplato, nombre, descripcion, precio, alergenos FROM menu;";

$resultado = mysqli_query($conexion, $sql);

include_once("cabecera.html");
?>
    <div class="container" id="formularios">
        <div class="row">
            <form class="form-horizontal" name="frmAltaMenu" id="frmAltaMenu" action="proceso_alta_menu.php" method="post">
				<fieldset>
					<!-- Form Name -->
					<legend>Alta de Menu</legend>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-xs-4 control-label" for="txtNombrePlato">Nombre del plato</label>
						<div class="col-xs-4">
							<input id="txtNombrePlato" name="txtNombrePlato" placeholder="Nombre del plato"
								class="form-control input-md" type="text">
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-xs-4 control-label" for="txtDescripcion">Descripcion del plato</label>
						<div class="col-xs-4">
							<input id="txtDescripcion" name="txtDescripcion" placeholder="Descripcion del plato" class="form-control input-md"
								type="text">
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group">
						<label class="col-xs-4 control-label" for="txtPrecio">Precio</label>
						<div class="col-xs-4">
							<input id="txtPrecio" name="txtPrecio" placeholder="2.32" class="form-control input-md"
								type="number" step="0.01">
						</div>
					</div>
					<div class="form-group">
						<label for="selectAlergenos">Alérgenos:</label>
						<select id="selectAlergenos" name="selectAlergenos" class="form-select">
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
					<!-- Button -->
					<div class="form-group">
						<label class="col-xs-4 control-label" for="btnAceptarAltaMenu"></label>
						<div class="col-xs-4">
							<input type="submit" id="btnAceptarAltaMenu" name="btnAceptarAltaMenu"
								class="btn btn-primary" value="Aceptar"/>
						</div>
					</div>
				</fieldset>
			</form>
        </div>
    </div>
</body>
</html>
