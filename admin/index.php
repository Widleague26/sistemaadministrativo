<?php
include ('../app/config/config.php');
include ('../app/config/conexion.php');

include('../layout/admin/sesion.php');
include('../layout/admin/datos_sesion_user.php');
?>

<?php include ('../layout/admin/parte1.php');?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bienvenida</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <table class="table table-hover table-bordered table-striped" style="background-color: #ffffff">
                        <thead>
                        <tr>
                            <td><b>Nombres</b></td>
                            <td><?php echo $sesion_nombres;?></td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th><b>Apellido</b></th>
                            <td><?php echo $sesion_apellidos;?></td>
                        </tr>
                        <tr>
                            <th><b>CI</b></th>
                            <td><?php echo $sesion_ci;?></td>
                        </tr>
                        <tr>
                            <th><b>Celular</b></th>
                            <td><?php echo $sesion_celular;?></td>
                        </tr>
                        <tr>
                            <th><b>Cargo</b></th>
                            <td><?php echo $sesion_cargo;?></td>
                        </tr>
                        <tr>
                            <th><b>Email</b></th>
                            <td><?php echo $email_sesion;?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>
<?php include ('../layout/admin/parte2.php');?>
