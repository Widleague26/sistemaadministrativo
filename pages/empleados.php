	
<?php
 $cn=mysql_connect("localhost","root","") or die("error en conexion");
		 require ('validarnum.php');

$fecha2=date("Y-m-d");  	

if (isset($_GET['nuevo'])) { 

                        if (isset($_POST['lugarguardar'])) {
                           





$nombre=strtoupper($_POST["nombre"]);
$apellido=strtoupper($_POST["apellido"]);
$correo=strtoupper($_POST["correo"]);
$ci=strtoupper($_POST["ci"]);
$fechai=$fecha2;
                       




$sql="select * from `basecelulares`.`usuarios` where cedula='$ci'";


$cs=mysql_query($sql,$cn);
while($resul=mysql_fetch_array($cs)){
	$var6=$resul[0];
}
//CONSULTAR SI EL CAMPO YA EXISTE


if($var6>1){

	  echo '<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alerta no se registro este usuario </b> Ya Existe... ';



                               echo '   </div>';
}else{

$sql = "INSERT INTO `basecelulares`.`usuarios` (`cedula`, `nombre`, `apellido`, `correo`, `fechai`) VALUES ('$ci', '$nombre', '$apellido', '$correo', '$fechai')";


                          $cs=mysql_query($sql,$cn);

                           


            

                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Guardados Correctamente... ';



echo "
Nombre: $nombre

";
                               echo '   </div>';
                           
							
                        }



}
?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Empleados</h3>
                                </div>
                                
                            
                                <!-- form start -->
                                <form role="form"  name="fe" action="?mod=empleados&nuevo=nuevo" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            
                                            <label for="exampleInputFile">Nombre</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="nombre" class="form-control" value="<?php echo $var2 ?>" id="exampleInputEmail1" placeholder="Intoducir el Nombre">
                                            <label for="exampleInputFile">Apellido</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required type="tex" name="apellido" class="form-control" value="<?php echo $var3 ?>" id="exampleInputEmail1" placeholder="Apellido">
                                            <label for="exampleInputFile">cedula</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="ci" class="form-control" value="<?php echo $var1 ?>" id="exampleInputEmail1" placeholder="Cedula">
                                            <label for="exampleInputFile">correo</label>
                                            <input  required type="email" name="correo" class="form-control" value="<?php echo $var4 ?>"  placeholder="Correo">
                                            
                                           
                                            
  
                                        </div>
                                       
                                     
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-lg" name="lugarguardar" id="lugarguardar" value="Guardar">Agregar</button>
                                        
                                    
                                    </div>
                                </form>
                            </div><!-- /.box -->
<?php
}

	
   
   if (isset($_GET['lista'])) { 

                        if (isset($_POST['lista'])) {
                           





$nombre=strtoupper($_POST["nombre"]);
$apellido=strtoupper($_POST["apellido"]);
$correo=strtoupper($_POST["correo"]);
$ci=strtoupper($_POST["ci"]);
$fechai=$fecha2;
                       




$sql="select * from `basecelulares`.`usuarios` where cedula='$ci'";


$cs=mysql_query($sql,$cn);
while($resul=mysql_fetch_array($cs)){
    $var6=$resul[0];
}
//CONSULTAR SI EL CAMPO YA EXISTE


if($var6>1){

      echo '<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alerta no se registro este usuario </b> Ya Existe... ';



                               echo '   </div>';
}else{

$sql = "INSERT INTO `basecelulares`.`usuarios` (`cedula`, `nombre`, `apellido`, `correo`, `fechai`) VALUES ('$ci', '$nombre', '$apellido', '$correo', '$fechai')";


                          $cs=mysql_query($sql,$cn);

                           


            

                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Guardados Correctamente... ';



echo "
Nombre: $nombre

";
                               echo '   </div>';
                           
                            
                        }



}
?>
  
                            
                    <div class="row">
                        <div class="col-xs-8">
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Lista de Lugares Turísticos o Comerciales:</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Cedula</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>correo</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if($tipo2==1){
                                        
                                        $consulta="SELECT cedula, nombre, apellido, correo FROM usuarios ORDER BY cedula ASC ";
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
                                                           
                                                              $fila[cedula]
                                                            
                                                        </td>
                                                        <td> $fila[nombre]                                                        </td>
                                                        <td>
                                                            $fila[apellido]
                                                        </td>
                                                         <td>
                                                            $fila[correo]
                                                        </td>
                                                         <td>
                                                            <a  href=prestacion2.php?codigo=".$fila["cedula"]."><img src='./img/consul.png' width='25' alt='Edicion' title=' CONSULTAR ".$fila["nombre"]."'></a>";
      
                            if($tipo2==1){
                                echo "
      
      <a  href=editar.php?codigo=".$fila["cedula"]."><img src='./img/editar.png' width='25' alt='Edicion' title='EDITAR LOS DATOS DE ".$fila["nombre"]."'></a> 
      <a   href=editar.php?codigo=".$fila["cedula"]."><img src='./img/elimina.png'  width='25' alt='Edicion' title='ELIMINAR A   ".$fila["nombre"]."'></a>
      ";}
      echo "
      
      <a target='_blank'  href=./pdf/prestacionespdfbien.php?codigo=".$fila["cedula"]."><img src='./img/impresora.png'  width='25' alt='Edicion' title='Imprimir reporte de prestaciones de  ".$fila["nombre"]."'></a>
      
     
                                                        </td>
                                                    </tr>";
                                        } 
                                        }
                                        
                                        
                                        else {
                                        
                                /*              SELECT * 
                                                FROM admin_lugares
                                                INNER JOIN administrador ON admin_lugares.id_lugares = administrador.id
INNER JOIN lugares ON admin_lugares.id_lugares = lugares.id_lugar*/
                                        
                                        $consulta="";
                                        $bd->consulta($consulta);
                                        while ($fila=$bd->mostrar_registros()) {
                                            switch ($fila['status']) {
                                               
                                            }
                                            
                                             //echo '<li data-icon="delete"><a href="?mod=lugares?edit='.$fila['id_tipo'].'"><img src="images/lugares/'.$fila['imagen'].'" height="350" >'.$fila['nombre'].'</a><a href="?mod=lugares?borrar='.$fila['id_tipo'].'" data-position-to="window" >Borrar</a></li>';
                                             echo "<tr>
                                                        <td>
                                                            <a href='?mod=lugares&edit=$fila[id_lugar]'>
                                                                <img src='images/galeria/$fila[foto]' height='' width='130'>
                                                            </a>
                                                        </td>
                                                        <td><a href='?mod=lugares&edit=$fila[id_lugar]'>
                                                            $fila[descripcion]</a>
                                                        </td>
                                                        <td>
                                                            $fila[estado]
                                                        </td>
                                                         <td>
                                                            $fila[ciudad]
                                                        </td>
                                                         <td>
                                                           
                                                            <a href='?mod=lugares&editargaleria=$fila[id_lugar]' class='btn btn-success tip-top'>Editar <br> Galería</a>
                                                        </td>
                                                    </tr>";
                                        }
                                        
                                        } ?>                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Lugar</th>
                                                <th>Estado</th>
                                                <th>Ciudad</th>
                                                <th>Acción</th>
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
                                    <h3> <center>Agregar Empleado <a href="#" class="alert-link">Nuevos</a></center></h3>                                    
                                </div>
                        <center>        
                            <form  name="fe" action="?mod=empleados&nuevo" method="post" id="ContactForm">
    


 <input title="AGREGAR UN NUEVO EMPLEADO" name="btn1"  class="btn btn-primary"type="submit" value="Agregar Nuevo">

    
  </form>
  </center>
                                </div>
                            </div>
                            </div>  '; } ?>
                        </br>       
                                
  <div class="col-md-3">
  <div class="box">
                                <div class="box-header">
                                <center>
                                <div class="box-header">
                                   <h3> <center>Imprimir Lista De Clientes</a></center></h3>                                    
                                </div>
                                
                                
                                 <a target='_blank'  href=../pdf/listaderegistros.php><img src='./img/impresora.png'  width='50' alt='Edicion' title='Imprimir lista de Registro De empleados'></a>
                                </center>
                                </div>
                                </div>
                                </div>

<?php
}

     ?>