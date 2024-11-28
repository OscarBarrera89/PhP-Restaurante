<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$camarero = $_GET['txtCamarero'];

// No validamos, suponemos que la entrada de datos es correcta

$sql = "SELECT * FROM pedido WHERE camarero = '$camarero';";

$resultado = mysqli_query($conexion, $sql);

// Pedir una fila
$fila = mysqli_fetch_assoc($resultado);

if($fila){ // Mostrar tabla de datos ($fila != null)

    $mensaje = "<h2 class='text-center'>Pedido localizado</h2>";
    $mensaje .= "<table class='table'>";
    $mensaje .= "<thead><tr><th>IDPEDIDO</th><th>FECHA</th><th>CAMARERO</th><th>TOTAL</th><th>ACCION</th></tr></thead>";
    $mensaje .= "<tbody><tr>";
    $mensaje .= "<td>" . $fila['idpedido'] . "</td>";
    $mensaje .= "<td>" . $fila['fecha'] . "</td>";
    $mensaje .= "<td>" . $fila['camarero'] . "</td>";
    $mensaje .= "<td>" . $fila['total'] . "</td>";
    $mensaje .= "<td><form class='d-inline me-1' action='editar_pedido.php' method='post'>";
    $mensaje .= "<input type='hidden' name='pedido' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    $mensaje .= "<form class='d-inline' action='borrar_pedido.php' method='post'>";
    $mensaje .= "<input type='hidden' name='idpedido' value='" . $fila['idpedido'] . "' />";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

    $mensaje .= "</tr></tbody></table>";
    
} else { // No hay datos
   $mensaje = "<h2 class='text-center mt-5'>No se encontró ningún pedido para el camarero: $camarero</h2>";
}

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>
