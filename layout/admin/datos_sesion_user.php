<?php

$email_sesion = $_SESSION['sesion_email'];
$query_usuario = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$email_sesion' AND estado = '1' ");
$query_usuario->execute();

$sesion_usuarios = $query_usuario->fetchAll(PDO::FETCH_ASSOC);
foreach ($sesion_usuarios as $sesion_usuario){
    $sesion_id_usuario = $sesion_usuario['id_usuario'];
    $sesion_nombres = $sesion_usuario['nombres'];
    $sesion_apellidos = $sesion_usuario['apellidos'];
    $sesion_ci = $sesion_usuario['ci'];
    $sesion_celular = $sesion_usuario['celular'];
    $sesion_cargo = $sesion_usuario['cargo'];
}
