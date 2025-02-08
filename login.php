<?php 
include 'inc/comun.php'; ?>
<!DOCTYPE html>
<html class="lockscreen">
    <head>
        <meta charset="UTF-8">
        <title>Sistema administrativo</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="icon" type="image/png" href="../images/client_13.png" />
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    
	   <script src="js/calendario/jquery-ui.min.js" type="text/javascript" ></script>
        <script src="js/tipo_alimen.js"></script>
        <script src="js/validarfrom.js"></script>
        <!--<script src="cordova.js"></script>-->

        <script>
        $(function() {
            $( "[data-role='navbar']" ).navbar();
            $( "[data-role='header'], [data-role='footer']" ).toolbar();
        });
        // Update the contents of the toolbars
        $( document ).on( "pagecontainerchange", function() {
            // Each of the four pages in this demo has a data-title attribute
            // which value is equal to the text of the nav button
            // For example, on first page: <div data-role="page" data-title="Info">
            var current = $( ".ui-page-active" ).jqmData( "title" );
            // Change the heading
            $( "[data-role='header'] h1" ).text( current );
            // Remove active class from nav buttons
            $( "[data-role='navbar'] a.ui-btn-active" ).removeClass( "ui-btn-active" );
            // Add active class to current nav button
            $( "[data-role='navbar'] a" ).each(function() {
                if ( $( this ).text() === current ) {
                    $( this ).addClass( "ui-btn-active" );
                }
            });
        });
    </script>
	
    </head>
    <body class="lockscreen">
    <?php
    $bd = new GestarBD;

    if (isset($_POST["iniciar"])) {
        # code...
        $usuario = $_POST["usuario"];
        $password = $_POST["pass"];
        
		
        $usuario = $bd->SelectText('*', 'administrador', "correo='$usuario' AND pass='$password'",false,null,null);
        $bd->consulta($usuario);
        if ($mostrar = $bd->mostrar_registros()) {
            
			
            $_SESSION['dondequedavalida'] = true;
			$_SESSION['dondequeda_tipo'] = $mostrar['nive_usua'];
            $_SESSION['dondequeda_nombre'] = $mostrar['nombre'];
            $_SESSION['dondequeda_apellido'] = $mostrar['apellido'];
            $_SESSION['dondequeda_nive_usua'] = $mostrar['nive_usua'];
            $_SESSION['dondequeda_usuario'] = $mostrar['usuario'];
            $_SESSION['dondequeda_correo'] = $mostrar['correo'];
            $_SESSION['dondequeda_id'] = $mostrar['id'];
                    
            
            header("Location: index.php?mod=index");
            exit;
        } else {
            //header("Location: login.php");
            echo '<div class="form-box">
                        <div class="alert alert-warning alert-dismissable">
                                        <i class="fa fa-warning"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Inicio de Sesión !</b>  Usuario o Contraseña Incorrectos. Intente de nuevo.
                                    </div>
                                </div>';
        }
    }
    $codigo = $_GET['codigo'];
    if (isset($codigo)) {
        $query = "SELECT * FROM registros_temp WHERE codigo = '$codigo'";
        $bd->consulta($query);
        if ($temp_resg = $bd->mostrar_registros()) {

            $insertUser = "INSERT INTO `administrador` (`usuario` ,`pass` ,`nombre`  ,`correo` ,`nive_usua`, codigo_user, codigo_referr)
                                VALUES (
                                 '$temp_resg[usuario]', '$temp_resg[pass]', '$temp_resg[nombre]',  '$temp_resg[email]' , '$temp_resg[nive_usua]', '$codigo', '$temp_resg[codigo_referr]'
                                ) ";
            $bd->consulta($insertUser);

            $borrarTemp = "DELETE FROM registros_temp WHERE codigo = '$codigo'";
            $bd->consulta($borrarTemp);

            echo '<div class="form-box">
                        <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Registro !</b>  Has confirmado tu cuenta correctamente Ingresa al sistema.
                                    </div>
                                </div>';
        }else{

        }
    }
    ?>

    <div class="form-box" id="login-box">

        <?php
        if(isset($_POST["btn1"])){
            $btn=$_POST["btn1"];
            $bus=$_POST["txtbus"];

            if($btn=="Agregar"){
                $destino = $_POST['email'];
                //$cs=mysql_query($sql,$conexion);
                $bd = new GestarBD();
                $usuario = $bd->SelectText('*', 'administrador', "correo='$destino'",false,null,null);
                $bd->consulta($usuario);
                if ($mostrar = $bd->mostrar_registros()) {
                    $nombre= $mostrar['nombre'];
                    $hola= $mostrar['correo'];
                    $clave= $mostrar['pass'];
                    $destino = $_POST['email'];
                    $asunto="comentario";
                    $comentario="
                           email:$_POST[email]
                           comentario: $_POST[com]";

                    /*$headers = 'From: '.$destino."\r\n".
                    'Reply-To:'.$destino."\r\n".
                    'X-Mailer: PHP/'.phpversion();

                    echo $destino,$asunto,$comentario,$headers;

                    mail("yond1994@gmail.com",$asunto,$comentario,$headers); */

//ini_set("SMTP", "cloud.8ssi.com");
//ini_set("sendmail_from", "registro@dondequeda.com.ve");
//ini_set("smtp_port", "465");
                    $mail = $_POST['email'];
                    $registro = "dondequeda.com.ve/panelControl/index.php?mod=lugares&nuevo=nuevo";
                    $email2= "appdondequeda@gmail.com";
                    /*
                    $header = 'From: < com >' . "\r\n";
                    $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
                    $header .= "Mime-Version: 1.0 \r\n";
                    $header .= "Content-Type: text/plain";
                    */
                    $casilla = 'appdondequeda@gmail.com';
                    $asunto = 'Registra tu comercio Gratis';
                    $cabeceras = "From: " . strip_tags($_POST['email']) . "\r\n";
                    $cabeceras .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
                    $cabeceras .= "CC: appdondequeda@gmail.com\r\n";
                    $cabeceras .= "MIME-Version: 1.0\r\n";
                    $cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";

                    $mensaje = '<html><body>';
                    $mensaje = '<center>';
                    $mensaje .= '<img src="http://dondequeda.com.ve/images/logo.png" alt="Space Invaders" width="70" />';
                    $mensaje .= '<table rules="all" border="1" style="border-color: #666;" cellpadding="10">';
                    $mensaje .= "<tr style='background: #eee;'><td><strong>Nombre:</strong> </td><td>" . $nombre . "</td></tr>";
                    $mensaje .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
                    $mensaje .= "<tr><td><strong>tu clave de dondequeda app es:</strong> </td><td>" . $clave . "</td></tr>";
                    $mensaje .= "<tr><td><strong>Link para iniciar sesion </strong> </td><td>" . $registro. "</td></tr>";
                    $mensaje .= "</table>";
                    $mensaje .= '</br>';
                    $mensaje .= "</body></html>";
                    $para = "$mail";
                    $asunto = 'Registra tu comercio GRATIS en nuestra app';

//Enviamos el mensaje a tu_dirección_email

                    $bool = mail($para, $asunto, $mensaje, $cabeceras);
                    if($bool){
                        //echo "<script > alert('hemos enviado a su correo electronico  su contraseña de dondequeda app ')</script>";

                        echo '<div class="form-box">
                                    <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Recuperar Contraseña !</b>Se ha enviado a su correo electronico la contraseña de ¿DóndeQueda? 
                                    </div>
                                </div>';
                    }
                } else{
                    //echo "<script > alert('no se Recuperaron sus datos correctamente el  correo: $destino no  se encuentra registrado ')</script>";
                    echo '<div class="form-box">
                                    <div class="alert alert-warning alert-dismissable">
                                        <i class="fa fa-warning"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Recuperar Contraseña !</b>No se Recuperaron sus datos correctamente el  correo: '.$destino.' no  se encuentra registrado
                                    </div>
                                </div>';
                }
            }
        }
        ?>



        <div class="header">Inicie Sesión</div>
        <form  name="frmLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="body bg-gray">
                <div class="form-group">
                    <input type="email" name="usuario" class="form-control" placeholder="Correo Electronico"/>
                </div>
                <div class="form-group">
                    <input type="password" name="pass" class="form-control" placeholder="Contraseña"/>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember_me"/> Recordar
                </div>
            </div>
            <div class="footer">
                <button type="submit" name="iniciar" class="btn bg-olive btn-block">Entrar</button>
        </form>
        <center>
            <button type="submit" name="" data-toggle="modal" data-target="#myModal" class="btn bg-olive btn-block">¿olvido su contraseña?</button>


            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

               <div class="modal-dialog">
                   <div class="modal-content ">
                       <div class="modal-header ">
                           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                           <center>
                               <form role="form"  name="fe" action="" method="post" >
                                   <h4 class="modal-title" id="myModalLabel">Recuperar Contraseña </h4>
                       </div>
                       <div class="modal-body">
                           <center>
                               <div class="span12 alert alert-success" style="margin-left: 0">Datos para recuperar tu contraseña.</div>
                           </center>
                           <div class="box-body">
                               <div class="row">
                                   <div class="col-xs-12">
                                       <label>Correo </label>
                                       <p><input type="email" name="email" id="txtNombreCurso" placeholder="Correo Electronico" required="" class="form-control"></p>
                                   </div>
                               </div>
                           </div>
                           </br>
                           <div class="span12 alert alert-success" style="margin-left: 0">Te enviaremos tu contraseña a tu correo</div>
                       </div>

                       <div class="modal-footer">
                           <button name="btn1" type="submit" value="Agregar" class="btn btn-primary">Recuperar</button>
                           </form>
                       </div>
                   </div>
               </div>
           </div>

       
       </center>
        </div>
    </div>


    <!-- jQuery 2.0.2 -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>