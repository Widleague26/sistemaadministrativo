<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 2/8/2022
 * Time: 18:44
 */


include ('../../app/config/config.php');
include ('../../app/config/conexion.php');

$id_usuario = $_POST['id_usuario'];
$estado_inactivo = '0';

$sentencia = $pdo->prepare("UPDATE tb_usuarios SET estado = '$estado_inactivo',fyh_eliminacion='$fechaHora' WHERE id_usuario = :id_usuario");

$sentencia->bindParam(':id_usuario',$id_usuario);

if($sentencia->execute()){
    header('Location:' .$URL.'/admin/usuarios/');
    session_start();
    $_SESSION['msj'] = "Se elimino al usuario de la manera correcta";
}else{
    echo "error al eliminar los registros de la base de datos";
    session_start();
    $_SESSION['msj'] = "Error al eliminar los registros de la base de datos";
}