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
                <div class="col-sm-10">
                    <h1 class="m-0">Listado de Usuarios</h1>
                    <?php
                    if(isset($_SESSION['msj'])){
                        $respuesta = $_SESSION['msj']; ?>
                        <script>
                            Swal.fire(
                                'Exito!',
                                '<?php echo $respuesta; ?>',
                                'success'
                            )
                        </script>
                    <?php
                        unset($_SESSION['msj']);
                    }
                    ?>
                    <br>
                    <div class="card card-blue">
                        <div class="card-header">
                            Usuario
                        </div>
                        <div class="card-body">

                            <script>
                                $(document).ready(function() {
                                    $('#tabla-1').DataTable( {
                                        "pageLength": 5,
                                        "language": {
                                            "emptyTable": "No hay información",
                                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                                            "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                                            "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
                                            "infoPostFix": "",
                                            "thousands": ",",
                                            "lengthMenu": "Mostrar _MENU_ Usuarios",
                                            "loadingRecords": "Cargando...",
                                            "processing": "Procesando...",
                                            "search": "Buscador:",
                                            "zeroRecords": "Sin resultados encontrados",
                                            "paginate": {
                                                "first": "Primero",
                                                "last": "Ultimo",
                                                "next": "Siguiente",
                                                "previous": "Anterior"
                                            }
                                        }
                                    });
                                } );
                            </script>


                            <table id="tabla-1" class="table table-striped table-hover table-bordered table-sm">
                                <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Carnet de Identidad</th>
                                    <th>Celular</th>
                                    <th>Correo electronico</th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador = 0;
                                $query = $pdo->prepare('SELECT * FROM tb_usuarios WHERE estado = "1" ');
                                $query->execute();
                                $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($usuarios as $usuario){
                                    $id = $usuario['id_usuario'];
                                    $nombres = $usuario['nombres'];
                                    $apellidos = $usuario['apellidos'];
                                    $ci = $usuario['ci'];
                                    $celular = $usuario['celular'];
                                    $email = $usuario['email'];
                                    $contador = $contador + 1;
                                    ?>
                                    <tr>
                                        <td><?php echo $contador; ?></td>
                                        <td><?php echo $nombres; ?></td>
                                        <td><?php echo $apellidos; ?></td>
                                        <td><?php echo $ci; ?></td>
                                        <td><?php echo $celular; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td>
                                            <center>
                                                <a href="edit.php?id=<?php echo $id;?>" class="btn btn-success btn-sm">Editar <i class="fas fa-pen"></i></a>
                                                <a href="delete.php?id=<?php echo $id;?>" class="btn btn-danger btn-sm">Borrar <i class="fas fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                    </div>



                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
<?php include ('../../layout/admin/parte2.php');?>
