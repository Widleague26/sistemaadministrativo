<?php
/**
 * Created by PhpStorm.
 * User: HILARIWEB
 * Date: 2/8/2022
 * Time: 13:50
 */

include ('../../app/config/config.php');
include ('../../app/config/conexion.php');

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$ci = $_POST['ci'];
$celular = $_POST['celular'];
$cargo = $_POST['cargo'];
$email = $_POST['email'];
$id_usuario = $_POST['id_usuario'];

$sentencia = $pdo->prepare("UPDATE tb_usuarios SET
nombres = :nombres,
apellidos = :apellidos,
ci = :ci,
celular = :celular,
cargo = :cargo,
email = :email,
fyh_actualizacion = :fyh_actualizacion WHERE id_usuario = :id_usuario");

$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':cargo',$cargo);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':id_usuario',$id_usuario);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);

if($sentencia->execute()){
    //echo "se actualizo de la manera correcta";
    header('Location:' .$URL.'/admin/usuarios/');
    session_start();
    $_SESSION['msj'] = "Se actualizo de la manera correcta";
}else{
    echo "error al actualizar los datos";
    session_start();
    $_SESSION['msj'] = "Error al actualizar los datos";
}