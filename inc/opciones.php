<?php 
$mod = isset($_GET['mod']) ? str_replace('.', '', $_GET['mod']) : '';


if($mod) {
	$dir = "pages/{$mod}.php";
	
	if($dir) {	
			include($dir);
		
	} else {
		echo('El modulo no existe');
	}
	
} else {
	echo 'Selecciona una opcion del menu.';
} 

//$swphp_contenido = ob_get_clean();                                                                                                                         