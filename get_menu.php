<?php
require_once("config.php");
$conexion = obtenerConexion();

if (isset($_GET['selectAlergenos']) || isset($_GET['txtNombrePlato']) || isset($_GET['txtDescripcion'])) {
    // Recuperar parámetro
    $alergenos = $_GET['selectAlergenos'];
    $nombre = $_GET['txtNombrePlato'];
    $descripcion = $_GET['txtDescripcion'];

    $sql = "SELECT * FROM menu WHERE alergenos = '$alergenos' OR descripcion = '$descripcion' OR nombre = '$nombre' ORDER BY idplato ASC;";

}else{
$sql = "SELECT * FROM menu ORDER BY idplato ASC;";
}
// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h2 class='text-center'>Listado de menus</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr><th>IDPLATO</th><th>NOMBRE</th><th>DESCRIPCION</th><th>PRECIO</th><th>ALERGENOS</th><th>ACCIÓN</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['idplato'] . "</td>";
    $mensaje .= "<td>" . $fila['nombre'] . "</td>";
    $mensaje .= "<td>" . $fila['descripcion'] . "</td>";
    $mensaje .= "<td>" . $fila['precio'] . "</td>";
    $mensaje .= "<td>" . $fila['alergenos'] . "</td>";

    $mensaje .= "<td><form class='d-inline me-1' action='editar_menu.php' method='post'>";
    $mensaje .= "<input type='hidden' name='menu' value='" . htmlspecialchars(json_encode($fila),ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    $mensaje .= "<form class='d-inline' action='borrar_menu.php' method='post'>";
    $mensaje .= "<input type='hidden' name='idplato' value='" . $fila['idplato']  . "' />";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

    $mensaje .= "</td></tr>";
    
}

// Cerrar tabla
$mensaje .= "</tbody></table>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;


