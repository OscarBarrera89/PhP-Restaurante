<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$idcliente = $_POST['idcliente'];
$nombre = $_POST['txtNombreCliente'];
$email = $_POST['txtEmailCliente'];
$telefono = $_POST['txtPrecioCliente'];
$alergenos = $_POST['selectAlergenosCliente'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir update
$sql = "UPDATE cliente SET nombre = '" . $nombre . "' , email = '" . $email . "' , telefono = $telefono WHERE idcliente = $idcliente;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Menu actualizado</h2>"; 
}

// Aquí empieza la página
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>