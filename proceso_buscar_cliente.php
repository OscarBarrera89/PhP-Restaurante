<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$nombre = $_GET['txtNombreCliente'];

// No validamos, suponemos que la entrada de datos es correcta

$sql = "SELECT * FROM cliente WHERE nombre = '$nombre';";

$resultado = mysqli_query($conexion, $sql);

// Pedir una fila
$fila = mysqli_fetch_assoc($resultado);

if($fila){ // Mostrar tabla de datos ($fila != null)

    $mensaje = "<h2 class='text-center'>Cliente localizado</h2>";
    $mensaje .= "<table class='table'>";
    $mensaje .= "<thead><tr><th>IDCLIENTE</th><th>NOMBRE</th><th>EMAIL</th><th>TELEFONO</th><th>ACCION</th></tr></thead>";
    $mensaje .= "<tbody><tr>";
    $mensaje .= "<td>" . $fila['idcliente'] . "</td>";
    $mensaje .= "<td>" . $fila['nombre'] . "</td>";
    $mensaje .= "<td>" . $fila['email'] . "</td>";
    $mensaje .= "<td>" . $fila['telefono'] . "</td>";
    $mensaje .= "<td><form class='d-inline me-1' action='editar_cliente.php' method='post'>";
    $mensaje .= "<input type='hidden' name='cliente' value='" . htmlspecialchars(json_encode($fila),ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    $mensaje .= "<form class='d-inline' action='borrar_cliente.php' method='post'>";
    $mensaje .= "<input type='hidden' name='idcliente' value='" . $fila['idcliente']  . "' />";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

    $mensaje .= "</tr></tbody></table>";
    
} else { // No hay datos
   $mensaje = "<h2 class='text-center mt-5'>El cliente con nombre: $nombre no está registrado</h2>";
}

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>