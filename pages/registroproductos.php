	
<?php
 
		 require ('validarnum.php');

$fecha2=date("Y-m-d");  	

if (isset($_GET['nuevo'])) { 

                        if (isset($_POST['nuevo'])) {
                           





$nombre=strtoupper($_POST["nombre"]);
$descripcion=strtoupper($_POST["descripcion"]);
$marca=$_POST["marca"];
$costo=strtoupper($_POST["costo"]);
$p_publico=$_POST["preciop"];  
$provedor=$_POST["provedor"];      
     
$estado=strtoupper($_POST["estado"]);





$sql="select * from productos where modelo='$nombre' AND descripcion='$descripcion' AND estado='$estado' ";

$cs=$bd->consulta($sql);

if($bd->numeroFilas($cs)==0){

$sql2="INSERT INTO `productos` ( `modelo`, `descripcion`, `marca`, `costo`, `p_publico`, `provedor`, `estado`, `cantidad`) 
VALUES ( '$nombre', '$descripcion', '$marca', '$costo', '$p_publico', '$provedor', '$estado','0')";

/*
INSERT INTO `productos` (`id_productos`, `modelo`, `descripcion`, `marca`, `cantidad`, `costo`, `p_publico`, `provedor`, `estado`) VALUES (NULL, 'TELEFONO', 'EVOLUXION 3', 'HUAWAI', NULL, '50000', '80000', 'VENTACEL', 'NUEVO');*/

                          $cs=$bd->consulta($sql2);

                           
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b>Se registro el Producto nuevo  Correctamente... ';



                               echo '   </div>';

}else{

//CONSULTAR SI EL CAMPO YA EXISTE
	  echo '<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alerta no se registro este Poducto</b> Ya Existe... ';



                               echo '   </div>';
}

}
?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Registrar Equipo o Accesorios</h3>
                                </div>
                                
                            
                                <!-- form start -->
                                <form role="form"  name="fe" action="?mod=registroproductos&nuevo=nuevo" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            
                                            <label for="exampleInputFile">Modelo</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="nombre" class="form-control" value="<?php echo $var2 ?>" id="exampleInputEmail1" placeholder="Intoducir el Nombre">
                                            <label for="exampleInputFile">Descripcion</label>
                                            <input   required type="tex" name="descripcion" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="descripcion">

                                             <label for="exampleInputFile">Marca</label>
                                            <input    required type="tex" name="marca" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="marca">

                                            <label for="exampleInputFile">Costo</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="costo" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="costo">

                                            <label for="exampleInputFile">Precio Publico</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="preciop" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="Precio Publico">

                                                <label for="exampleInputFile">Proveedor</label>
                                            <input  type="text" name="provedor" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="Precio Publico">
                                            

                                            <label for="exampleInputFile">Estado del equipo</label>
                                          
                                               
                                                <select  for="exampleInputEmail" class="form-control" name='estado'>
     <option  value="nuevo">Nuevo</option>
     <option value="usado">Usado</option>
     <option value="reparado">Reparado</option>

   </select>
                                            
                                           
                                            
  
                                        </div>
                                       
                                     
                                        
                                    </div><!-- /.box-body -->
                                    <center>

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-lg" name="nuevo" id="nuevo" value="Guardar">Agregar</button>
                                        
                                    
                                    </div>
                                    </center>
                                </form>
                            </div><!-- /.box -->
<?php
}

	
   
   if (isset($_GET['lista'])) { 

    $x1=$_GET['codigo'];

                        if (isset($_POST['lista'])) {
                           



        

}
?>
  
                            
                    <div class="row">
                        <div class="col-xs-9">
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Lista de Equpos y Accesorios:</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               
                                                <th>Nombre</th>
                                                <th>Modelo</th>
                                                <th>Marca</th>
                                                 <th>Estado</th>
                                                   <th>Precio Venta</th>
                                                <th>Cantidad</th>
                                               
                                                <th>Opciones</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if($tipo2==1){
                                        
                                        $consulta="SELECT id_productos,p_publico, descripcion, modelo, marca, estado, cantidad FROM productos ORDER BY id_productos ASC ";
                                        $bd->consulta($consulta);
                                        while ($fila=$bd->mostrar_registros()) {
                                            switch ($fila['status']) {
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
                                                            $fila[estado]
                                                        </td>
                                                         <td>
                                                            $fila[p_publico]
                                                        </td>
                                                         <td>";
                                                         if( $fila[cantidad]==0){
                                                          echo 0;
                                                         }else{

                                                          
                                                           echo  $fila['cantidad'];

                                                         }


                                                          echo "

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
                                                   <th>Precio Venta</th>
                                                <th>Cantidad</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    
              

                          
                            <?php 
if($tipo2==1){
                                echo '
  <div class="col-md-3">
  <div class="box">
                                <div class="box-header">
                                <div class="box-header">
                                    <h3> <center>Registrar Equipos o Accesorios <a href="#" class="alert-link"></a></center></h3>                                    
                                </div>
                        <center>        
                            <form  name="fe" action="?mod=registroproductos&nuevo" method="post" id="ContactForm">
    


 <input title="AGREGAR UN NUEVO EQUIPO" name="btn1"  class="btn btn-primary"type="submit" value="Agregar Nuevo">

    
  </form>
  </center>
                                </div>
                            </div>
                            </div>  '; 

                            } ?>
                        </br>       
                                
  <div class="col-md-3">
  <div class="box">
                                <div class="box-header">
                                <center>
                                <div class="box-header">
                                   <h3> <center>Imprimir Lista De Equipos y Accesorios</a></center></h3>                                    
                                </div>
                                
                                
                                 <a target='_blank'  href=./pdf/listaequipos.php><img src='./img/impresora.png'  width='50' alt='Edicion' title='Imprimir lista de Equipos'></a>
                                </center>
                                </div>
                                </div>
                                </div>

<?php
}

     

     if (isset($_GET['editar'])) { 

//codigo que viene de la lista
$x1=$_GET['codigo'];
                        if (isset($_POST['editar'])) {
                           


$nombre=strtoupper($_POST["nombre"]);
$descripcion=strtoupper($_POST["descripcion"]);
$marca=$_POST["marca"];
$costo=strtoupper($_POST["costo"]);
$p_publico=$_POST["preciop"];      
$provedor=$_POST["provedor"];      
$estado=strtoupper($_POST["estado"]);



                       
if( $nombre=="" )
                {
                
                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {



$sql22=" UPDATE productos SET 
modelo='$nombre' ,
descripcion='$descripcion' ,
marca='$marca' ,
costo='$costo', 
p_publico='$p_publico',
provedor='$provedor',
estado='$estado'  
 where id_productos='$x1'";


$bd->consulta($sql22);
   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Editados Correctamente... ';



                               echo '   </div>';
                           
}
   
}


                                        
     $consulta="SELECT modelo, descripcion, marca,costo,p_publico,provedor FROM productos where id_productos='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar Equipo o Accesorio </h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registroproductos&editar=editar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
               
                           
                        <label for="exampleInputFile">Modelo</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="nombre" class="form-control" value="<?php echo $fila['modelo'] ?>" id="exampleInputEmail1" placeholder="Intoducir el Nombre">
                                            <label for="exampleInputFile">Descripcion</label>
                                            <input   required type="tex" name="descripcion" class="form-control" value="<?php echo $fila['descripcion'] ?>" id="exampleInputEmail1" placeholder="descripcion">

                                             <label for="exampleInputFile">Marca</label>
                                            <input    required type="tex" name="marca" class="form-control" value="<?php echo $fila['marca'] ?>" id="exampleInputEmail1" placeholder="marca">

                                            <label for="exampleInputFile">Costo</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="costo" class="form-control" value="<?php echo $fila['costo'] ?>" id="exampleInputEmail1" placeholder="costo">

                                            <label for="exampleInputFile">Precio Publico</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="preciop" class="form-control" value="<?php echo $fila['p_publico'] ?>" id="exampleInputEmail1" placeholder="Precio Publico">

                                                <label for="exampleInputFile">Proveedor</label>
                                            <input  type="text" name="provedor" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="Precio Publico">

                                            <label for="exampleInputFile">Estado del equipo</label>
                                          
                                               
                                                <select  for="exampleInputEmail" class="form-control" name='estado'>
     <option  value="nuevo">Nuevo</option>
     <option value="usado">Usado</option>
     <option value="reparado">Reparado</option>

   </select>
                                            

                                        </div>
                                       
                                     
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-lg" name="editar" id="editar" value="Editar">Editar</button>
                                        
                                    
                                    </div>
                                </form>
                            </div><!-- /.box -->
<?php


}
}

 //eliminar

      if (isset($_GET['eliminar'])) { 

//codigo que viene de la lista
$x1=$_GET['codigo'];
                        if (isset($_POST['eliminar'])) {
                           


$nombre=strtoupper($_POST["nombre"]);
$apellido=strtoupper($_POST["apellido"]);
$correo=strtoupper($_POST["correo"]);
$ci=strtoupper($_POST["ci"]);

                       
if( $x1=="" )
                {
                
                    echo "
   <script> alert('error')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {







$sql="delete from productos where id_productos='$x1' ";


$bd->consulta($sql);
                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Se Elimino Correctamente... ';



                               echo '   </div>';
                           
                            
                 

                                echo '
  <div class="col-md-3">
  <div class="box">
                                <div class="box-header">
                                <div class="box-header">
                                    <h3> <center>Regresar a Lista<a href="#" class="alert-link"></a></center></h3>                                    
                                </div>
                        <center>        
                            <form  name="fe" action="?mod=registroproductos&lista" method="post" id="ContactForm">
    


 <input title="REGRESAR A LISTA" name="btn1"  class="btn btn-primary"type="submit" value="Regresar a lista">

    
  </form>
  </center>
                                </div>
                            </div>
                            </div>  ';         



}
   
}


                                        
     $consulta="SELECT modelo, descripcion, marca,costo,p_publico,provedor,estado FROM productos where id_productos='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
<center>
  <div class="col-md-5">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Eliminar Equipo</h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registroproductos&eliminar=eliminar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            <center>
                                             <table id="example1" class="table table-bordered table-striped">
                                            <tr><td>
                                            <h3> Modelo</h3>
                                           <td> <?php echo $fila['modelo'] ?></td><tr>
                                          <tr>
                                          <td>
                                            <h3>Descripcion</h3>
                                            </td><td>
                                         <?php echo $fila['descripcion'] ?></td>
</tr><tr><td>
                                             <h3>Marca</h3></td>
                                             <td>
                                           <?php echo $fila['marca'] ?></td>
</tr><tr><td>
                                            <h3>Costo</h3></td><td>
                                           <?php echo $fila['costo'] ?></td>
</tr><tr><td>
                                            <h3>Precio Publico</h3></td><td>
                                           <?php echo $fila['p_publico'] ?></td>
                                           </tr><tr><td>

                                            <h3>Proveedor</h3></td><td>
                                            <?php echo  $fila['provedor'] ?></td></tr> 
                                            <tr><td>

                                            <h3>Estado del equipo</h3></td><td>
                                           <?php echo  $fila['estado'] ?></td></tr>
                                               
                                                </table>
               
  </center>
                                        </div>
                                       
                                     
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type=submit  class="btn btn-primary btn-lg" name="eliminar" id="eliminar" value="ELIMINAR">
                                        
                                    
 

                                    </div>
                                </form>
                            </div><!-- /.box -->
                            </center>



                            <?php

                                echo '
  <div class="col-md-3">
  <div class="box">
                                <div class="box-header">
                                <div class="box-header">
                                    <h3> <center>Regresar a Lista<a href="#" class="alert-link"></a></center></h3>                                    
                                </div>
                        <center>        
                            <form  name="fe" action="?mod=registroproductos&lista" method="post" id="ContactForm">
    


 <input title="REGRESAR A LISTA" name="btn1"  class="btn btn-primary"type="submit" value="Regresar a lista">

    
  </form>
  </center>
                                </div>
                            </div>
                            </div>  ';  ?>
                            
    
<?php


}

}

  if (isset($_GET['consultar'])) { 

//codigo que viene de la lista
$x1=$_GET['codigo'];
                        if (isset($_POST['consultar'])) {
                           

   
}


                                        
     $consulta="SELECT modelo, descripcion, marca,costo,p_publico,provedor,estado FROM productos where id_productos='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
<center>
  <div class="col-md-5">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Consulta de Equipo</h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registroproductos&eliminar=eliminar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            <center>
                                             <table id="example1" class="table table-bordered table-striped">
                                            <tr><td>
                                            <h3> Modelo</h3>
                                           <td> <?php echo $fila['modelo'] ?></td><tr>
                                          <tr>
                                          <td>
                                            <h3>Descripcion</h3>
                                            </td><td>
                                         <?php echo $fila['descripcion'] ?></td>
</tr><tr><td>
                                             <h3>Marca</h3></td>
                                             <td>
                                           <?php echo $fila['marca'] ?></td>
</tr><tr><td>
                                            <h3>Costo</h3></td><td>
                                           <?php echo $fila['costo'] ?></td>
</tr><tr><td>
                                            <h3>Precio Publico</h3></td><td>
                                           <?php echo $fila['p_publico'] ?></td>
                                           </tr><tr><td>

                                            <h3>Proveedor</h3></td><td>
                                            <?php echo  $fila['provedor'] ?></td></tr> 
                                            <tr><td>

                                            <h3>Estado del equipo</h3></td><td>
                                           <?php echo  $fila['estado'] ?></td></tr>
                                               
                                                </table>
               
  </center>
                                        </div>
                                       
                                     
                                        
                                    </div><!-- /.box-body -->

                                </form>
                            </div><!-- /.box -->
                            </center>



<?php



                                echo '
  <div class="col-md-3">
  <div class="box">
                                <div class="box-header">
                                <div class="box-header">
                                    <h3> <center>Regresar a Lista<a href="#" class="alert-link"></a></center></h3>                                    
                                </div>
                        <center>        
                            <form  name="fe" action="?mod=registroproductos&lista" method="post" id="ContactForm">
    


 <input title="REGRESAR A LISTA" name="btn1"  class="btn btn-primary"type="submit" value="Regresar a lista">

    
  </form>
  </center>
                                </div>
                            </div>
                            </div>  ';  ?>
                            
    
<?php


}




}
?>



                            <?php








?>
