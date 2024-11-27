<?php
require_once("config.php");

$conexion = obtenerConexion();

$sql = "SELECT * FROM menu ORDER BY idplato ASC;";

$resultado = mysqli_query($conexion, $sql);

include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
    <form class="form-horizontal" name="frmParametrizado" id="frmParametrizado" action="get_menu.php" method="get">
				<fieldset>
					<!-- Form Name -->
					<legend>Listado de los menus parametrizados por este formulario</legend>
					<h5>Rellene uno de los tres apartados para obtener datos</h5>
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
						<label class="col-xs-4 control-label" for="btnBuscarParametrizado"></label>
						<div class="col-xs-4">
							<input type="submit" id="btnBuscarParametrizado" name="btnBuscarParametrizado"
								class="btn btn-primary" value="Buscar" />
						</div>
                    </div>
                </fieldset>
        </form>
    </div>
</div>
</body>

</html>