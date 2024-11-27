<?php
require_once('config.php');
$conexion = obtenerConexion();

// Recoger datos de entrada
$idplato = $_POST['idplato'];

// SQL
$sql = "DELETE FROM menu WHERE idplato = $idplato;";

$resultado = mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Menu con id $idplato borrado</h2>"; 
}

include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>