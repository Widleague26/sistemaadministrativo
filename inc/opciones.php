<?php 
$mod = isset($_GET['mod']) ? str_replace('.', '', $_GET['mod']) : '';


if($mod) {
	$dir = "pages/{$mod}.php";
	
	if($dir) {
		// Mostrar el valor de $dir para depuración
		var_dump($dir);
		
		// Verificar si el archivo existe antes de incluirlo
		if (file_exists($dir)) {
			include($dir);
		} else {
			echo "El archivo no existe: " . $dir;
	}
	
} else {
	echo 'Selecciona una opcion del menu.';
} 
}                                                                                                                