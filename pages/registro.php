<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('validarnum.php'); // Asegúrate de incluir correctamente este archivo

$fecha2 = date("Y-m-d");

// ==========================================================
// SECCIÓN: Agregar Nuevo Usuario
// ==========================================================
if (isset($_GET['nuevo'])) {
    if (isset($_POST['lugarguardar'])) {
        // Recoger y sanitizar datos del formulario
        $nombre = strtoupper(trim($_POST["nombre"]));
        $apellido = strtoupper(trim($_POST["apellido"]));
        $correo = strtoupper(trim($_POST["correo"]));
        $ci = strtoupper(trim($_POST["ci"]));
        $direccion = strtoupper(trim($_POST["direccion"]));
        $telefono = strtoupper(trim($_POST["telefono"]));
        $fechai = $fecha2;

        // Verificar si la cédula ya existe
        $sql = "SELECT * FROM `usuarios` WHERE cedula='$ci'";
        $cs = $bd->consulta($sql);

        if ($bd->numero_filas($cs) != 0) {
            echo '<div class="alert alert-danger alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b>Alerta:</b> no se registró este usuario. Ya existe...
                </div>';
        } else {
            // Insertar nuevo usuario
            $sql = "INSERT INTO `usuarios` (`cedula`, `nombre`, `apellido`, `correo`, `fechai`, `telefono`, `direccion`) 
                    VALUES ('$ci', '$nombre', '$apellido', '$correo', '$fechai', '$telefono', '$direccion')";

            if ($bd->consulta($sql)) {
                echo '<div class="alert alert-success alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Bien!</b> Datos guardados correctamente...
                    </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissable">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <b>Error:</b> No se pudieron guardar los datos. ' . $bd->obtenerError() . '
                    </div>';
            }
        }
    }

    // Formulario para agregar nuevos usuarios
    ?>
    <div class="col-md-10">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Clientes</h3>
            </div>
            <form role="form" name="fe" action="?mod=registro&nuevo=nuevo" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputFile">Nombre</label>
                        <input onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required name="nombre" class="form-control" placeholder="Introducir el Nombre">

                        <label for="exampleInputFile">Apellido</label>
                        <input onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required name="apellido" class="form-control" placeholder="Apellido">

                        <label for="exampleInputFile">Cédula</label>
                        <input onkeydown="return enteros(this, event)" required type="text" name="ci" class="form-control" placeholder="Cédula">

                        <label for="exampleInputFile">Teléfono</label>
                        <input onkeydown="return enteros(this, event)" required type="text" name="telefono" class="form-control" placeholder="Teléfono">

                        <label for="exampleInputFile">Dirección</label>
                        <input required type="text" name="direccion" class="form-control" placeholder="Dirección">

                        <label for="exampleInputFile">Correo</label>
                        <input required type="email" name="correo" class="form-control" placeholder="Correo">
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-lg" name="lugarguardar" id="lugarguardar" value="Guardar">Agregar</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div>
    <?php
}

// ==========================================================
// SECCIÓN: Listar Usuarios
// ==========================================================
if (isset($_GET['lista'])) {
    $consulta = "SELECT cedula, nombre, apellido, correo, id_usuarios FROM usuarios ORDER BY cedula ASC";
    $bd->consulta($consulta);
    ?>
    <div class="row">
        <div class="col-xs-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista Clientes:</h3>                                    
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($fila = $bd->mostrar_registros()) {
                            echo "<tr>
                                    <td>{$fila['cedula']}</td>
                                    <td>{$fila['nombre']}</td>
                                    <td>{$fila['apellido']}</td>
                                    <td>{$fila['correo']}</td>
                                    <td>
                                        <center>
                                            <a href=?mod=registro&consultar&codigo={$fila['id_usuarios']}><img src='./img/consul.png' width='25' alt='Consultar' title='Consultar'></a>
                                            <a href=?mod=registro&editar&codigo={$fila['id_usuarios']}><img src='./img/editar.png' width='25' alt='Editar' title='Editar'></a>
                                            <a href=?mod=registro&eliminar&codigo={$fila['id_usuarios']}><img src='./img/elimina.png' width='25' alt='Eliminar' title='Eliminar'></a>
                                        </center>
                                    </td>
                                </tr>";
                        }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <?php
}

// ==========================================================
// SECCIÓN: Consultar Usuario
// ==========================================================
if (isset($_GET['consultar'])) {
    $codigo = $_GET['codigo'];
    $consulta = "SELECT * FROM usuarios WHERE id_usuarios='$codigo'";
    $bd->consulta($consulta);

    while ($fila = $bd->mostrar_registros()) {
        
        ?>
        <div class="col-md-10">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Consultar Usuario</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Cédula:</label>
                        <p><?php echo $fila['cedula']; ?></p>
                        <label>Nombre:</label>
                        <p><?php echo $fila['nombre']; ?></p>
                        <label>Apellido:</label>
                        <p><?php echo $fila['apellido']; ?></p>
                        <label>Correo:</label>
                        <p><?php echo $fila['correo']; ?></p>
                        <label>Teléfono:</label>
                        <p><?php echo $fila['telefono']; ?></p>
                        <label>Dirección:</label>
                        <p><?php echo $fila['direccion']; ?></p>
                        <label>Fecha de Registro:</label>
                        <p><?php echo $fila['fechai']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

// ==========================================================
// SECCIÓN: Editar Usuario
// ==========================================================
if (isset($_GET['editar'])) {
    $codigo = $_GET['codigo'];
    $consulta = "SELECT * FROM usuarios WHERE id_usuarios='$codigo'";
    $bd->consulta($consulta);

    while ($fila = $bd->mostrar_registros()) {
        ?>
        <div class="col-md-10">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Editar Usuario</h3>
                </div>
                <form role="form" name="fe" action="?mod=registro&editar&codigo=<?php echo $fila['id_usuarios']; ?>" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputFile">Nombre</label>
                            <input onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required name="nombre" class="form-control" value="<?php echo $fila['nombre']; ?>">

                            <label for="exampleInputFile">Apellido</label>
                            <input onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required name="apellido" class="form-control" value="<?php echo $fila['apellido']; ?>">

                            <label for="exampleInputFile">Cédula</label>
                            <input onkeydown="return enteros(this, event)" required type="text" name="ci" class="form-control" value="<?php echo $fila['cedula']; ?>" readonly>

                            <label for="exampleInputFile">Teléfono</label>
                            <input onkeydown="return enteros(this, event)" required type="text" name="telefono" class="form-control" value="<?php echo $fila['telefono']; ?>">

                            <label for="exampleInputFile">Dirección</label>
                            <input required type="text" name="direccion" class="form-control" value="<?php echo $fila['direccion']; ?>">

                            <label for="exampleInputFile">Correo</label>
                            <input required type="email" name="correo" class="form-control" value="<?php echo $fila['correo']; ?>">
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-lg" name="actualizar" value="Actualizar">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
        <?php
    }
}

// Manejo de la actualización del usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['actualizar'])) {
    $codigo = $_GET['codigo'];

    // Recoger los datos del formulario
    $nombre = strtoupper(trim($_POST["nombre"]));
    $apellido = strtoupper(trim($_POST["apellido"]));
    $correo = strtoupper(trim($_POST["correo"]));
    $telefono = strtoupper(trim($_POST["telefono"]));
    $direccion = strtoupper(trim($_POST["direccion"]));

    // Construir la consulta UPDATE
    $sql = "UPDATE `usuarios` SET 
                nombre = '$nombre',
                apellido = '$apellido',
                correo = '$correo',
                telefono = '$telefono',
                direccion = '$direccion'
            WHERE id_usuarios = '$codigo'";

    // Ejecutar la consulta
    if ($bd->consulta($sql)) {
        echo '<div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Bien!</b> Datos actualizados correctamente...
            </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Error:</b> No se pudieron actualizar los datos. ' . $bd->obtenerError() . '
            </div>';
    }
}
// ==========================================================
// SECCIÓN: Eliminar Usuario
// ==========================================================
if (isset($_GET['eliminar'])) {
    $codigo = $_GET['codigo'];
    $consulta = "SELECT * FROM usuarios WHERE id_usuarios='$codigo'";
    $bd->consulta($consulta);

    while ($fila = $bd->mostrar_registros()) {
        ?>
        <div class="col-md-10">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Eliminar Usuario</h3>
                </div>
                <div class="box-body">
                    <p>¿Está seguro de que desea eliminar al siguiente usuario?</p>
                    <div class="form-group">
                        <label>Cédula:</label>
                        <p><?php echo $fila['cedula']; ?></p>
                        <label>Nombre:</label>
                        <p><?php echo $fila['nombre']; ?></p>
                        <label>Apellido:</label>
                        <p><?php echo $fila['apellido']; ?></p>
                        <label>Correo:</label>
                        <p><?php echo $fila['correo']; ?></p>
                        <label>Teléfono:</label>
                        <p><?php echo $fila['telefono']; ?></p>
                        <label>Dirección:</label>
                        <p><?php echo $fila['direccion']; ?></p>
                    </div>
                    <form action="?mod=registro&eliminar&codigo=<?php echo $fila['id_usuarios']; ?>" method="post">
                        <button type="submit" class="btn btn-danger" name="confirmar_eliminar" value="Eliminar">Eliminar</button>
                        <a href="?mod=registro&lista" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
}

// ==========================================================
// SECCIÓN: Procesar la Eliminación del Usuario
// ==========================================================
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['eliminar']) && isset($_POST['confirmar_eliminar'])) {
    $codigo = $_GET['codigo'];

    // Construir la consulta DELETE
    $sql = "DELETE FROM `usuarios` WHERE id_usuarios = '$codigo'";

    // Ejecutar la consulta
    if ($bd->consulta($sql)) {
        echo '<div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Bien!</b> Usuario eliminado correctamente...
            </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <b>Error:</b> No se pudo eliminar el usuario. ' . $bd->obtenerError() . '
            </div>';
    }
}
?>