<?php
include 'inc/functionBD.php';

// Crear una instancia de la clase GestarBD
$gestarBD = new GestarBD();

// Ejecutar una consulta de prueba
$resultado = $gestarBD->consulta("SELECT * FROM productos");

// Mostrar los resultados
if ($resultado) {
    while ($fila = $gestarBD->mostrar_registros()) {
        echo "ID: " . $fila['id_productos'] . " - Modelo: " . $fila['modelo'] . "<br>";
    }
} else {
    echo "No se encontraron registros.";
}
?>
