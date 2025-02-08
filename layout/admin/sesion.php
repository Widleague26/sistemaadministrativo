<?php
session_start();
if(isset($_SESSION['sesion_email'])){
    // echo "existe sesion, y ha pasado por el login";
}else{
    //echo "no existe sesion porque no ha pasado por el login";
    header('Location: '.$URL.'/login/');
}