<?php
include ('../app/config/config.php');
include ('../app/config/conexion.php');

if(isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];
    
} else {
    
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sisitema Administrativoa</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $URL;?>/public/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo $URL;?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $URL;?>/public/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>SIS </b>BIBLIOTECA</a>
            
        </div>
        <div class="card-body">
           <center>
               <img src="https://www.psicoactiva.com/wp-content/uploads/puzzleclopedia/Libros-codificados-300x262.jpg"
                    style="width: 150px" alt="">
           </center>

            <br>

            <form action="controller_login.php" method="post">
                <label for="">Correo electronico</label>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="correo" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <label for="">Contraseña</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <a href="" class="btn btn-default btn-block">Cancelar</a>
                    <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                </div>
                
            </form>

        
        </div>
        
    </div>
    </div>

if(isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];
    
} else {
    
}

<!-- jQuery -->
<script src="<?php echo $URL;?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $URL;?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $URL;?>/public/dist/js/adminlte.min.js"></script>
</body>
</html>

