<?php
require_once("config.php");
$conexion = obtenerConexion();

if (isset($_GET['txtTelefonoCliente']) || isset($_GET['txtNombreCliente']) || isset($_GET['txtEmail'])) {
    // Recuperar parámetro
    $telefono = $_GET['txtTelefonoCliente'];
    $nombre = $_GET['txtNombreCliente'];
    $email = $_GET['txtEmailCliente'];

    $sql = "SELECT * FROM cliente WHERE telefono = '$telefono' OR email = '$email' OR nombre = '$nombre' ORDER BY idcliente ASC;";

}else{
$sql = "SELECT * FROM cliente ORDER BY idcliente ASC;";
}
// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h2 class='text-center'>Listado de clientes</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr><th>IDCLIENTE</th><th>NOMBRE</th><th>EMAIL</th><th>TELEFONO</th><th>ACCIÓN</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['idcliente'] . "</td>";
    $mensaje .= "<td>" . $fila['nombre'] . "</td>";
    $mensaje .= "<td>" . $fila['email'] . "</td>";
    $mensaje .= "<td>" . $fila['telefono'] . "</td>";

    $mensaje .= "<td><form class='d-inline me-1' action='editar_cliente.php' method='post'>";
    $mensaje .= "<input type='hidden' name='cliente' value='" . htmlspecialchars(json_encode($fila),ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    $mensaje .= "<form class='d-inline' action='borrar_cliente.php' method='post'>";
    $mensaje .= "<input type='hidden' name='idcliente' value='" . $fila['idcliente']  . "' />";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

    $mensaje .= "</td></tr>";
    
}

// Cerrar tabla
$mensaje .= "</tbody></table>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;


