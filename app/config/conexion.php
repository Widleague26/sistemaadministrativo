<?php
/**
 * Created by PhpStorm.
 * User: HILARI
 * Date: 10/12/2019
 * Time: 20:59
 */
//include ('config.php');

$servidor = "mysql:dbname=".BD_SISTEMA.";host=".BD_SERVIDOR;

try{
    $pdo = new PDO($servidor, BD_USUARIO, BD_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "<script>alert('Conexión Exitosa a la base de datos.');</script>";
}catch (PDOException $e){
    echo "<script>alert('Error al conectar a la base de datos.');</script>";
}
