<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$idcomponente = $_GET['txtIdComponente'];

// No validamos, suponemos que la entrada de datos es correcta

$sql = "SELECT c.*, p.descripcion AS tipodesc FROM componente c, tipo p 
WHERE c.idtipo = p.idtipo 
AND idcomponente = $idcomponente;";

$resultado = mysqli_query($conexion, $sql);

// Pedir una fila
$fila = mysqli_fetch_assoc($resultado);

if($fila){ // Mostrar tabla de datos ($fila != null)

    $mensaje = "<h2 class='text-center'>Componente localizado</h2>";
    $mensaje .= "<table class='table'>";
    $mensaje .= "<thead><tr><th>IDCOMPONENTE</th><th>NOMBRE</th><th>DESCRIPCION</th><th>PRECIO</th><th>TIPO</th><th>ACCION</th></tr></thead>";
    $mensaje .= "<tbody><tr>";
    $mensaje .= "<td>" . $fila['idcomponente'] . "</td>";
    $mensaje .= "<td>" . $fila['nombre'] . "</td>";
    $mensaje .= "<td>" . $fila['descripcion'] . "</td>";
    $mensaje .= "<td>" . $fila['precio'] . "</td>";
    $mensaje .= "<td>" . $fila['tipodesc'] . "</td>";

    // Formulario en la celda para procesar borrado del registro
    $mensaje .= "<td><form action='proceso_borrar_componente.php' method='post'>";
    // input hidden para enviar idcomponente a borrar
    $mensaje .= "<input type='hidden' name='idcomponente' value='$idcomponente'/>";  
    $mensaje .= "<input type='submit' value='Borrar' class='btn btn-primary'/> </form> </td>";

    $mensaje .= "</tr></tbody></table>";
    
} else { // No hay datos
   $mensaje = "<h2 class='text-center mt-5'>El componente con id $idcomponente no está registrado</h2>";
}

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>
