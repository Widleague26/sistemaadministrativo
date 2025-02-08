<?php
include ('../../app/config/config.php');
include ('../../app/config/conexion.php');

include('../../layout/admin/sesion.php');
include('../../layout/admin/datos_sesion_user.php');
?>

<?php include ('../../layout/admin/parte1.php');

$id_get = $_GET['id'];
$query = $pdo->prepare("SELECT * FROM tb_usuarios WHERE id_usuario = '$id_get' ");
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario){
    $id = $usuario['id_usuario'];
    $nombres = $usuario['nombres'];
    $apellidos = $usuario['apellidos'];
    $ci = $usuario['ci'];
    $celular = $usuario['celular'];
    $email = $usuario['email'];
    $cargo = $usuario['cargo'];
}


?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edición del usuario</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card">
                <div class="card-header" style="background-color: #00A000;color: #ffffff">
                    LLene la información con mucho cuidado
                </div>
                <div class="card-body">
                    <form action="controller_edit.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input type="text" name="nombres" value="<?php echo $nombres;?>" class="form-control" placeholder="Escribe los nombres completos..." required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <input type="text" name="apellidos" value="<?php echo $apellidos;?>" class="form-control" placeholder="Escribe los apellidos completos..." required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Carnet de Identidad</label>
                                    <input type="number" name="ci" class="form-control" value="<?php echo $ci;?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input type="number" name="celular" value="<?php echo $celular;?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Cargo</label>
                                    <select name="cargo" id="" class="form-control">
                                        <option value="<?php echo $cargo;?>"><?php echo $cargo;?></option>
                                        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                        <option value="DOCENTE">DOCENTE</option>
                                        <option value="ESTUDIANTE">ESTUDIANTE</option>
                                        <option value="PUBLICO">PÚBLICO</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Correo electronico</label>
                                    <input type="email" name="email" value="<?php echo $email;?>" class="form-control" required>
                                    <input type="text" name="id_usuario" value="<?php echo $id_get;?>" hidden>
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <center>
                                    <a href="<?php echo $URL."/admin/usuarios";?>" class="btn btn-default btn-block">Cancelar</a>
                                </center>
                            </div>
                            <div class="col-md-4">
                                <center>
                                    <button type="submit" onclick="return confirm('Asegurece de llenar la información correcta');"
                                            class="btn btn-success btn-block">Actualizar usuario</button>
                                </center>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
</div>
<?php include ('../../layout/admin/parte2.php');?>
