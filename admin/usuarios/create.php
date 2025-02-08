<?php
include ('../../app/config/config.php');
include ('../../app/config/conexion.php');

include('../../layout/admin/sesion.php');
include('../../layout/admin/datos_sesion_user.php');
?>

<?php include ('../../layout/admin/parte1.php');?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registro de un nuevo usuario</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card">
                <div class="card-header">
                    LLene la información con mucho cuidado
                </div>
                <div class="card-body">
                    <form action="controller_create.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombres</label>
                                    <input type="text" name="nombres" class="form-control" placeholder="Escribe los nombres completos..." required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <input type="text" name="apellidos" class="form-control" placeholder="Escribe los apellidos completos..." required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Carnet de Identidad</label>
                                    <input type="number" name="ci" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input type="number" name="celular" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Cargo</label>
                                    <select name="cargo" id="" class="form-control">
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
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" name="password"  class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Verificación de Password</label>
                                    <input type="text" name="verificar_password" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <center>
                                    <a href="<?php echo $URL."/admin/";?>" class="btn btn-default btn-block">Cancelar</a>
                                </center>
                            </div>
                            <div class="col-md-4">
                               <center>
                                   <button type="submit" onclick="return confirm('Asegurece de llenar la información correcta');" class="btn btn-primary btn-block">Registrar usuario</button>
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
