<?php
$servidor = 'localhost';
$usuario = 'root';
$pass = '';
$base_datos = 'basecelulares';

$conexion = new mysqli($servidor, $usuario, $pass, $base_datos);

if ($conexion->connect_error) {
    die('Error de conexión (' . $conexion->connect_errno . ') ' . $conexion->connect_error);
} else {
    echo 'Conexión exitosa a la base de datos ' . $base_datos;
}

$conexion->close();
?>
