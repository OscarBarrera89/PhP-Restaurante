<?php
require_once("config.php");
$conexion = obtenerConexion();

if (isset($_GET['lstCliente']) || isset($_GET['txtFecha']) || isset($_GET['txtCamarero'])) {
    // Recuperar parámetros
    $idcliente = $_GET['lstCliente'];
    $fecha = $_GET['txtFecha'];
    $camarero = $_GET['txtCamarero'];

    // Construir consulta con filtros
    $sql = "SELECT * FROM pedido WHERE idcliente = '$idcliente' OR fecha = '$fecha' OR camarero = '$camarero' ORDER BY idpedido ASC;";
} else {
    $sql = "SELECT * FROM pedido ORDER BY idpedido ASC;";
}

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si la consulta se ejecutó correctamente 
if (!$resultado) { 
    die("Error en la consulta SQL: " . mysqli_error($conexion)); 
}

// Generar tabla
$mensaje = "<h2 class='text-center'>Listado de pedidos</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr><th>IDPEDIDO</th><th>IDCLIENTE</th><th>FECHA</th><th>CAMARERO</th><th>TOTAL</th><th>ACCIÓN</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['idpedido'] . "</td>";
    $mensaje .= "<td>" . $fila['idcliente'] . "</td>";
    $mensaje .= "<td>" . $fila['fecha'] . "</td>";
    $mensaje .= "<td>" . $fila['camarero'] . "</td>";
    $mensaje .= "<td>" . $fila['total'] . "</td>";

    $mensaje .= "<td><form class='d-inline me-1' action='editar_pedido.php' method='post'>";
    $mensaje .= "<input type='hidden' name='pedido' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    $mensaje .= "<form class='d-inline' action='borrar_pedido.php' method='post'>";
    $mensaje .= "<input type='hidden' name='idpedido' value='" . $fila['idpedido'] . "' />";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

    $mensaje .= "</td></tr>";
}

// Cerrar tabla
$mensaje .= "</tbody></table>";

// Insertar cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>
