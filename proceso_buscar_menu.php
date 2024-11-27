<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$nombre = $_GET['txtNombreMenu'];

// No validamos, suponemos que la entrada de datos es correcta

$sql = "SELECT * FROM menu WHERE nombre = '$nombre';";

$resultado = mysqli_query($conexion, $sql);

// Pedir una fila
$fila = mysqli_fetch_assoc($resultado);

if($fila){ // Mostrar tabla de datos ($fila != null)

    $mensaje = "<h2 class='text-center'>Menu localizado</h2>";
    $mensaje .= "<table class='table'>";
    $mensaje .= "<thead><tr><th>IDPLATO</th><th>NOMBRE</th><th>DESCRIPCION</th><th>PRECIO</th><th>ALERGENOS</th><th>ACCION</th></tr></thead>";
    $mensaje .= "<tbody><tr>";
    $mensaje .= "<td>" . $fila['idplato'] . "</td>";
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

    $mensaje .= "</tr></tbody></table>";
    
} else { // No hay datos
   $mensaje = "<h2 class='text-center mt-5'>El menu con nombre: $nombre no está registrado</h2>";
}

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>