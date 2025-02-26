<?php 


date_default_timezone_set('America/caracas');
$hora = date('H:i:s a');
$fecha = date('d-m-Y ');
//------------------------------------------------------------------------------------------
//  Definiciones
$a = date("d-m-Y");
$b = date("H-m-s");

//  Conexión con la Base de Datos.
$db_server   = "localhost"; 
$db_name     = "farmacos"; 
$db_username = "root"; 
$db_password = ""; 

//  Nombre del archivo.
$filename = "farmacos_$a._.$b.sql";

//------------------------------------------------------------------------------------------
//  No tocar
error_reporting(E_ALL & ~E_NOTICE);
define('Str_VERS', "1.1.1");
define('Str_DATE', "$fecha");
//------------------------------------------------------------------------------------------
?>

<center>
<?php
//------------------------------------------------------------------------------------------
//  Funciones

error_reporting(E_ALL & ~E_NOTICE);

function fetch_table_dump_sql($table, $fp = 0, $conn) {
    global $hay_Zlib;

    $tabledump = "--\n";
    fwrite($fp, $tabledump);
    
    $tabledump = "-- Table structure for table `$table`\n";
    fwrite($fp, $tabledump);
    
    $tabledump = "--\n\n";
    fwrite($fp, $tabledump);

    $result = $conn->query("SHOW CREATE TABLE $table");
    $row = $result->fetch_assoc();
    $tabledump = "DROP TABLE IF EXISTS `$table`;\n" . $row['Create Table'] . ";\n\n";
    fwrite($fp, $tabledump);

    $tabledump = "--\n";
    fwrite($fp, $tabledump);
    
    $tabledump = "-- Dumping data for table `$table`\n";
    fwrite($fp, $tabledump);
    
    $tabledump = "--\n\n";
    fwrite($fp, $tabledump);

    $tabledump = "LOCK TABLES `$table` WRITE;\n";
    fwrite($fp, $tabledump);

    $result = $conn->query("SELECT * FROM `$table`");
    while ($row = $result->fetch_assoc()) {
        $tabledump = "INSERT INTO `$table` VALUES(";
        $fieldcounter = 0;
        foreach ($row as $key => $value) {
            if ($fieldcounter > 0) {
                $tabledump .= ', ';
            }
            $tabledump .= is_null($value) ? 'NULL' : "'" . $conn->real_escape_string($value) . "'";
            $fieldcounter++;
        }
        $tabledump .= ");\n";
        fwrite($fp, $tabledump);
    }
    $tabledump = "UNLOCK TABLES;\n";
    fwrite($fp, $tabledump);
}

function problemas($msg) {
    $errdesc = mysqli_error();
    $errno = mysqli_errno();
    $message  = "<br>";
    $message .= "- Ha habido un problema accediendo a la Base de Datos<br>";
    $message .= "- Error: $msg<br>";
    $message .= "- Error mysqli: $errdesc<br>";
    $message .= "- Error número mysqli: $errno<br>";
    $message .= "- Script: " . getenv("REQUEST_URI") . "<br>";
    $message .= "- Referer: " . getenv("HTTP_REFERER") . "<br>";

    echo( "</strong><br><br><hr><center><small>" );
    setlocale(LC_TIME, "spanish");
    echo strftime("%A %d %B %Y&nbsp;-&nbsp;%H:%M:%S", time());
    echo(" vers." . Str_VERS . "<br>");
    echo("</small></center>");
    die("");
}
//------------------------------------------------------------------------------------------
//  Main
?>

<center>
	<h1>Respaldo de la base de Datos</h1></center>
<br>
<strong>
<?php
@set_time_limit(0);

echo "- Base de Datos: '$db_name' en '$db_server'.<br>";
$error = false;
$tablas = 0;

if (!@function_exists('gzopen')) {
    $hay_Zlib = false;
    echo "- Ya que no esta disponible Zlib, salvare la Base de Datos sin comprimir, como '$filename'<br>";
} else {
    $filename = $filename . ".gz";
    $hay_Zlib = true;
    echo "- Ya que esta disponible Zlib, salvare la Base de Datos comprimida, como '$filename'<br>";
}

if (!$error) { 
    $dbconnection = @mysqli_connect($db_server, $db_username, $db_password, $db_name); 
    if ($dbconnection) {
        echo "<br>";
        echo "- He establecido conexión con la base de datos.<br>";
    } else {
        echo "<br>";
        echo "- La conexión con la base de datos ha fallado: " . mysqli_connect_error() . "<br>";
        $error = true;
    }
}

if (!$error) { 
    // MySQL versión
    $result = mysqli_query($dbconnection, 'SELECT VERSION() AS version');
    if ($result != FALSE && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
    } else {
        $result = mysqli_query($dbconnection, "SHOW VARIABLES LIKE 'version'");
        if ($result != FALSE && mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_row($result);
        }
    }
    if (!isset($row)) {
        $row['version'] = '3.21.0';
    }
}

if (!$error) { 
    $el_path = getenv("REQUEST_URI");
    $el_path = substr($el_path, strpos($el_path, "/"), strrpos($el_path, "/"));

    $result = $dbconnection->query("SHOW TABLES");

    if (!$result) {
        echo "- Error, no puedo obtener la lista de las tablas.<br>";
        echo '- MySQL Error: ' . $dbconnection->error . '<br><br>';
        $error = true;
    } else {
        $t_start = time();
        
        if (!$hay_Zlib) 
            $filehandle = fopen($filename, 'w');
        else
            $filehandle = gzopen($filename, 'w6');    //  nivel de compresión
            
        if (!$filehandle) {
            $el_path = getenv("REQUEST_URI");
            $el_path = substr($el_path, strpos($el_path, "/"), strrpos($el_path, "/"));
            echo "<br>";
            echo "- No he podido crear '$filename' en '$el_path/'. Por favor, asegurese de<br>";
            echo "&nbsp;&nbsp;que dispone de privilegios de escritura.<br>";
        } else {                    
            $tabledump = "-- Dump de la Base de Datos\n";
            fwrite($filehandle, $tabledump);
            setlocale(LC_TIME, "spanish");
			$tabledump = "-- Fecha: " . date("l d F Y - H:i:s", time()) . "\n";
            fwrite($filehandle, $tabledump);
            
            $tabledump = "--\n";
            fwrite($filehandle, $tabledump);
            $tabledump = "-- Version: " . Str_VERS . ", del " . Str_DATE . ", insidephp@gmail.com\n";
            fwrite($filehandle, $tabledump);
            $tabledump = "-- Soporte y Updaters: http://insidephp.sytes.net\n";
            fwrite($filehandle, $tabledump);
            $tabledump = "--\n";
            fwrite($filehandle, $tabledump);
            $tabledump = "-- Host: `$db_server`    Database: `$db_name`\n";
            fwrite($filehandle, $tabledump);
            $tabledump = "-- ------------------------------------------------------\n";
            fwrite($filehandle, $tabledump);
            $tabledump = "-- Server version " . $row['version'] . "\n\n";
            fwrite($filehandle, $tabledump);

            $result = $dbconnection->query('SHOW TABLES');
            while ($currow = $result->fetch_array(MYSQLI_NUM)) {
                fetch_table_dump_sql($currow[0], $filehandle, $dbconnection);
                fwrite($filehandle, "\n");
                $tablas++;
            }
            $tabledump = "\n-- Dump de la Base de Datos Completo.";
            fwrite($filehandle, $tabledump);
            if (!$hay_Zlib) 
                fclose($filehandle);
            else
                gzclose($filehandle);

				$t_now = time();
				$t_delta = $t_now - $t_start;
				if (!$t_delta)
					$t_delta = 1;
				$t_delta = floor(($t_delta-(floor($t_delta/3600)*3600))/60) . " minutos y "
					. floor(($t_delta-(floor($t_delta/60))*60)) . " segundos.";
				echo "<br>";
				echo "- He salvado las $tablas tablas en $t_delta<br>";
				echo "<br>";
				echo "- El Dump de la Base de Datos está completo.<br>";
				echo "- He salvado la Base de Datos en: $el_path$filename<br>";
				echo "<br>";
				echo "- Puede descargárs <a href=\"$filename\">$filename</a>";
				
			}
		}
	}

?>

</center>