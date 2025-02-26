<?php 
	
    //$nena = $fila[1]; // */
		
?>
  <h4 class="page-header">
                        OPCIONES PRINCIPALES PARA REGISTRO Y MEDICAMENTOS DE LA TIENDA"<small>seleccione la opción que desea editar o agregar dependiendo de la categoría <code>!seleccione correctamente¡</code><code></code></small>
                   </h4>
        
					
                    <!-- Small boxes (Stat box) -->
                    <!-- Small boxes (Stat box) -->
                  
					<div class="row">
					
					  
					<?php 
					if($tipo2==1){
					echo '
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                         Clientes
                                    </h3>
                                    <p>
                                        Agregar o Editar Pacientes
                                    </p>
                                </div>
                                
                                <div class="icon"><a href="?mod=registro&nuevo"  id="alimen" data-icon="custom" data-transition="slide" data-prefetch="true" data-id="alimen" class="small-box-footer"> 
                                    
                                </div>
                                
                                    MAS INFORMACION <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                      Productos<sup style="font-size: 20px"></sup>
                                    </h3>
                                    <p>
                                       Farmacos
                                    </p>
                                </div>
                                <div class="icon">
                                	<a href="?mod=registroproductos&nuevo" class="small-box-footer"></a>
                                </div>
                                <a href="?mod=registroproductos&nuevo" class="small-box-footer">
                                    MAS INFORMACION <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>Kardex </h3>
                                    <p>
                                       Control Diario
                                    </p>
                                </div>
                                <div class="icon">
                                	<a href="?mod=registrokardex&total" class="small-box-footer"></a>
                                </div>
                                <a href="?mod=registrokardex&total" class="small-box-footer">
                                    MAS INFORMACION <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                   

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>Administracion</h3>
                                    <p>
                                        administradores y usuarios.                                   </p>
                                </div>
                                <div class="icon">
                                    <i class="ion "></i>
                                </div>
                                <a href="?mod=registroadmin&lista=lista" class="small-box-footer">
                                    MAS INFORMACION <i class=""></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        
                    
                    </div><!-- /.row -->
					
					';
					}
					
					?>

                    <!-- top row -->
                  
                    <!-- /.row -->

                    <!-- START ACCORDION & CAROUSEL-->
                   
                  
                      <div class="col-md-6">
                       
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Lista de Productos Farmacos :</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               
                                                <th>Nombre</th>
                                                <th>Tipo</th>
                                                <th>fabricante</th>
                                            <th>Estado</th>
                                            
                                        
                                            
                                                <th>Opciones</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if($tipo2==1){
                                        
                                        $consulta="SELECT id_productos,Gramos_ML, descripcion, modelo, marca, estado, cantidad FROM productos ORDER BY id_productos ASC ";
                                        $bd->consulta($consulta);
                                        while ($fila=$bd->mostrar_registros()) {
                                            switch ($fila['estado']) {
                                                case 1:
                                                    $btn_st = "danger";
                                                    $txtFuncion = "Desactivar";
                                                    break;
                                                
                                                case 0:
                                                    $btn_st = "primary";
                                                    $txtFuncion = "Activar";
                                                    break;
                                            }
                                             //echo '<li data-icon="delete"><a href="?mod=lugares?edit='.$fila['id_tipo'].'"><img src="images/lugares/'.$fila['imagen'].'" height="350" >'.$fila['nombre'].'</a><a href="?mod=lugares?borrar='.$fila['id_tipo'].'" data-position-to="window" >Borrar</a></li>';
                                             echo "<tr>
                                                        <td>
                                                           
                                                              $fila[modelo]
                                                            
                                                        </td>
                                                         <td>
                                                            $fila[descripcion]
                                                        </td>
                                                        <td> $fila[marca]                                                        </td>
                                                       
                                                         <td>
                                                            $fila[Gramos_ML]
                                                        </td>
                                                        
                                                       
                                                         <td><center>
                                                            ";
      
echo"
       <a  href=?mod=registroproductos&consultar&codigo=".$fila["id_productos"]."><img src='./img/consultarr.png' width='25' alt='Edicion' title='VER LOS DATOS DE ".$fila["descripcion"]."'></a> ";
       if($tipo2==1){
                                echo "
      
      <a  href=?mod=registroproductos&editar&codigo=".$fila["id_productos"]."><img src='./img/editar.png' width='25' alt='Edicion' title='EDITAR LOS DATOS DE ".$fila["descripcion"]."'></a> 
      <a   href=?mod=registroproductos&eliminar&codigo=".$fila["id_productos"]."><img src='./img/elimina2.png'  width='25' alt='Edicion' title='ELIMINAR A   ".$fila["descripcion"]."'></a>
      ";
    }
     
     }
                                               echo "    </center>     </td>
                                                    </tr>";


                                        
                                        } ?>                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                   <th>Nombre</th>
                                                <th>Modelo</th>
                                                <th>Marca</th>
                                                 <th>Estado</th>
                                              
                                                <th>Opciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                    
                        </div><!-- /.col -->
                        <div class="col-md-6">
                            <div class="box box-solid">
                                <div class="box-header">
                                   
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
                                            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="item">
                                                <img src="img/OIP.jpeg" alt="First slide">
                                                <div class="carousel-caption">
                                                    
                                                </div>
                                            </div>
                                            <div class="item active">
                                                <img src="img/OIP1.jpeg" alt="Second slide">
                                                <div class="carousel-caption">
                                                    
                                                </div>
                                            </div>
                                            <div class="item">
                                                <img src="img/OIP2.jpeg" alt="Third slide">
                                                <div class="carousel-caption">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                        </a>
                                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                        </a>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    
                    </div><!-- /.row -->
                    <!-- END ACCORDION & CAROUSEL-->

