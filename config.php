<?php
/*
Este fichero hay que incluirlo en cada script del proyecto.
De esta manera:
 - podrás usar la información que aparece aquí en cualquier parte
 - sólo necesitas actualizar este fichero para reflejar cualquier
   cambio en toda la aplicación
*/

/* Array asociativo con la configuración de conexión a la base de datos */
$basedatos = array(
    "basedatos" => "restaurante",
    "usuario" => "root",
    "password" => "test",
    "servidor" => "db",
    "puerto" => 3306
);


/* ERROR REPORTING */
//Indica que sólo se mostrarán errores, no Warnings ni otros errores. 
//Valores posibles: E_ERROR | E_WARNING | E_PARSE | E_NOTICE
error_reporting(E_ERROR);

// Reporte de errores para mysql sin excepciones
mysqli_report(MYSQLI_REPORT_OFF);


/* FUNCIONES COMUNES */

function obtenerConexion()
{
    global $basedatos; //recuperamos el array con la conexión

    $conexion = mysqli_connect($basedatos["servidor"], $basedatos["usuario"], $basedatos["password"], $basedatos["basedatos"]) or die(mysqli_error($conexion));
    // $conexion = new mysqli($basedatos["servidor"], $basedatos["usuario"], $basedatos["password"], $basedatos["basedatos"], $basedatos["puerto"]) ;

    if ($conexion->connect_errno) {
        responder(null, true, "Error al conectar a la base de datos. \nCompruebe los parámetros de la conexión: " .
            $conexion->connect_error . " Código de error: " . $conexion->connect_errno, $conexion);
    }

    mysqli_set_charset($conexion, "utf8");
    //Si no se produjo un error devolvemos el objeto de la conexión
    return $conexion;
}