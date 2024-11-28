<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$idpedido = $_POST['idpedido'];
$fecha = $_POST['txtFecha'];
$camarero = $_POST['txtCamarero'];
$total = $_POST['txtTotal'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir consulta de actualización
$sql = "UPDATE pedido 
        SET fecha = '$fecha', camarero = '$camarero', total = $total
        WHERE idpedido = $idpedido;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje = "<h2 class='text-center mt-5'>Pedido actualizado correctamente</h2>";
}

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>
