<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$idcliente = $_POST['lstCliente'];
$fecha = $_POST['txtFecha'];
$camarero =  $_POST['txtCamarero'];
$total = (float)$_POST['txtTotal'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir insert
$sql = "INSERT INTO pedido (`idpedido`, `idcliente`, `fecha`, `camarero`, `total`) 
        VALUES (null, '$idcliente', '$fecha', '$camarero', $total);";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Pedido insertado</h2>"; 
}
// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
header( "refresh:5;url=index.php" );

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>