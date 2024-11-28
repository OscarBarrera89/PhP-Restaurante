<?php
require_once('config.php');
$conexion = obtenerConexion();

// Recoger datos de entrada
$idpedido = $_POST['idpedido'];  // Cambié de 'idplato' a 'idpedido'

// SQL para eliminar el pedido
$sql = "DELETE FROM pedido WHERE idpedido = $idpedido;";  // Cambié de 'menu' a 'pedido'

$resultado = mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Pedido con id $idpedido borrado</h2>"; 
}

include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>
