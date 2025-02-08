	
<?php

		 require ('validarnum.php');

$fecha2=date("Y-m-d");  	

if (isset($_GET['nuevo'])) { 

                        if (isset($_POST['lugarguardar'])) {
                           





$nombre=strtoupper($_POST["nombre"]);
$apellido=strtoupper($_POST["apellido"]);
$correo=strtoupper($_POST["correo"]);
$ci=strtoupper($_POST["ci"]);
$direccion=strtoupper($_POST["direccion"]);
$telefono=strtoupper($_POST["telefono"]);
$fechai=$fecha2;
                       




$sql="select * from `usuarios` where cedula='$ci'";

$cs=$bd->consulta($sql);

if($bd->numeroFilas($cs)!=0){

/*
$cs=mysql_query($sql,$cn);
while($resul=mysql_fetch_array($cs)){
	$var6=$resul[0];
}
//CONSULTAR SI EL CAMPO YA EXISTE
*/

	  echo '<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Alerta no se registro este usuario </b> Ya Existe... ';



                               echo '   </div>';
}else{

$sql = "INSERT INTO `usuarios` (`cedula`, `nombre`, `apellido`, `correo`, `fechai`, `telefono`, `direccion`) VALUES ('$ci', '$nombre', '$apellido', '$correo', '$fechai', '$telefono', '$direccion')";

                            
                          $cs=$bd->consulta($sql);  
                         // $cs=mysql_query($sql,$cn);

                           


            

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
                                    <h3 class="box-title">Clientes</h3>
                                </div>
                                
                            
                                <!-- form start -->
                                <form role="form"  name="fe" action="?mod=registro&nuevo=nuevo" method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            
    



<?php
$var1 = '12345678';
$var2 = 'Nombre Inicial';
$var3 = 'Apellido Inicial';
$var4 = 'correo@gmail.com'; 
$var5 = 'Ubicacion' ; 
$var6 = '04241155689' ; 
// Otros códigos PHP...
?>

<label for="exampleInputFile">Nombre</label>
<input onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required name="nombre" class="form-control" value="<?php echo $var2; ?>" id="exampleInputEmail1" placeholder="Introducir el Nombre">

<label for="exampleInputFile">Apellido</label>
<input onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required name="apellido" class="form-control" value="<?php echo $var3; ?>" id="exampleInputEmail1" placeholder="Apellido">

<label for="exampleInputFile">Cédula</label>
<input onkeydown="return enteros(this, event)" required type="text" name="ci" class="form-control" value="<?php echo $var1; ?>" id="exampleInputEmail1" placeholder="Cédula">

<label for="exampleInputFile">Teléfono</label>
<input onkeydown="return enteros(this, event)" required type="text" name="telefono" class="form-control" value="<?php echo $var6; ?>" id="exampleInputEmail1" placeholder="Teléfono">

<label for="exampleInputFile">Dirección</label>
<input required type="text" name="direccion" class="form-control" value="<?php echo $var5; ?>" id="exampleInputEmail1" placeholder="Dirección">

<label for="exampleInputFile">Correo</label>
<input required type="email" name="correo" class="form-control" value="<?php echo $var4; ?>" placeholder="Correo">


                                            
                                                
    
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

    if (isset($_GET['codigo'])) {
    $x1 = $_GET['codigo'];
} else {
    $x1 = ''; // Define un valor predeterminado o maneja el caso en el que 'codigo' no esté presente
}

                        if (isset($_POST['lista'])) {
                           



        

}
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
                                        
                                        $consulta="SELECT cedula, nombre, apellido, correo,id_usuarios FROM usuarios ORDER BY cedula ASC ";
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
                                                         <td><center>
                                                            <a  href=?mod=registro&editar&codigo=".$fila["id_usuarios"]."><img src='./img/consul.png' width='25' alt='Edicion' title=' CONSULTAR ".$fila["nombre"]."'></a>";
      
                                echo "
      
      <a  href=?mod=registro&editar&codigo=".$fila["id_usuarios"]."><img src='./img/editar.png' width='25' alt='Edicion' title='EDITAR LOS DATOS DE ".$fila["nombre"]."'></a> 
      <a   href=?mod=registro&eliminar&codigo=".$fila["id_usuarios"]."><img src='./img/elimina.png'  width='25' alt='Edicion' title='ELIMINAR A   ".$fila["nombre"]."'></a>
      ";}
      echo "
      
    
      
     </center>
                                                        </td>
                                                    </tr>";
                                        
                                        }
                                        
                                        
                                        else {
                                        
                                           $consulta="SELECT cedula, nombre, apellido, correo,id_usuarios FROM usuarios ORDER BY cedula ASC ";
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
      
                             
      echo "
      
      <a target='_blank'  href=./pdf/.php?codigo=".$fila["cedula"]."><img src='./img/impresora.png'  width='25' alt='Edicion' title='Imprimir reporte de prestaciones de  ".$fila["nombre"]."'></a>
      
     
                                                        </td>
                                                    </tr>";
                                        }
                                        
                                        } ?>                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>Cedula</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>correo</th>
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
                                    <h3> <center>Agregar Clientes <a href="#" class="alert-link">Nuevos</a></center></h3>                                    
                                </div>
                        <center>        
                            <form  name="fe" action="?mod=registro&nuevo" method="post" id="ContactForm">
    


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
                                
                                
                                 <a target='_blank'  href=./pdf/listaclientes.php><img src='./img/impresora.png'  width='50' alt='Edicion' title='Imprimir lista de Registro De empleados'></a>
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
$apellido=strtoupper($_POST["apellido"]);
$correo=strtoupper($_POST["correo"]);
$ci=strtoupper($_POST["ci"]);
$telefono=strtoupper($_POST["telefono"]);
$direccion=strtoupper($_POST["direccion"]);

                       
if( $nombre=="" )
                {
                
                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {
$sql=" UPDATE usuarios SET 
nombre='$nombre' ,
apellido='$apellido' ,
cedula='$ci' ,
telefono='$telefono' ,
direccion='$direccion' ,
correo='$correo' 
 where id_usuarios='$x1'";


$bd->consulta($sql);
                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Datos Editados Correctamente... ';



echo "
Nombre: '$nombre',
apellido='$apellido' ,
cedula='$ci' ,
correo='$correo',
telefono='$telefono',
direccion='$direccion',
id_usuarios='$x1'
";
                               echo '   </div>';
                           
                            
                        



}
   
}


                                        
     $consulta="SELECT cedula, nombre, apellido, correo,telefono,direccion FROM usuarios where id_usuarios='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Editar Empleados</h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registro&editar=editar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            
                                            <label for="exampleInputFile">Nombre</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="nombre" class="form-control" value="<?php echo  $fila[nombre] ?>" id="exampleInputEmail1" placeholder="Intoducir el Nombre">
                                            <label for="exampleInputFile">Apellido</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required type="tex" name="apellido" class="form-control" value="<?php echo  $fila[apellido] ?>" id="exampleInputEmail1" placeholder="Apellido">
                                            <label for="exampleInputFile">cedula</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="ci" class="form-control" value="<?php echo $fila[cedula] ?>" id="exampleInputEmail1" placeholder="Cedula">
    <label for="exampleInputFile">telefono</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="telefono" class="form-control" value="<?php echo $fila[telefono] ?>" id="exampleInputEmail1" placeholder="telefono">

                                             <label for="exampleInputFile">Direccion</label>
                                            <input  required type="tex" name="direccion" class="form-control" value="<?php echo $fila[direccion] ?>" id="exampleInputEmail1" placeholder="direccion">

                                            <label for="exampleInputFile">correo</label>
                                            <input  required type="email" name="correo" class="form-control" value="<?php echo $fila[correo] ?>"  placeholder="Correo">
                                            
                                           
                                            
  
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

                       
if( $nombre=="" )
                {
                
                    echo "
   <script> alert('campos vacios')</script>
   ";
                    echo "<br>";
                    
                }
        else
           {







$sql="delete from usuarios where id_usuarios='$x1' ";


$bd->consulta($sql);
                          

   
                            //echo "Datos Guardados Correctamente";
                            echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Bien!</b> Se Elimino Correctamente... ';



echo "
Nombre: '$nombre',
apellido='$apellido' ,
cedula='$ci' ,
correo='$correo',
id_usuarios='$x1'
";
                               echo '   </div>';
                           
                            
                        



}
   
}


                                        
     $consulta="SELECT cedula, nombre, apellido, correo FROM usuarios where id_usuarios='$x1'";
     $bd->consulta($consulta);
     while ($fila=$bd->mostrar_registros()) {



?>
  <div class="col-md-10">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Eliminar Empleados</h3>
                                </div>
                                
                            
        <?php  echo '  <form role="form"  name="fe" action="?mod=registro&eliminar=eliminar&codigo='.$x1.'" method="post">';
        ?>
                                    <div class="box-body">
                                        <div class="form-group">
                                           
                                            
                                            
                                            
                                            <label for="exampleInputFile">Nombre</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" type="text" required type="tex" name="nombre" class="form-control" value="<?php echo  $fila[nombre] ?>" id="exampleInputEmail1" placeholder="Intoducir el Nombre">
                                            <label for="exampleInputFile">Apellido</label>
                                            <input  onkeypress="return caracteres(event)" onblur="this.value=this.value.toUpperCase();" required type="tex" name="apellido" class="form-control" value="<?php echo  $fila[apellido] ?>" id="exampleInputEmail1" placeholder="Apellido">
                                            <label for="exampleInputFile">cedula</label>
                                            <input onkeydown="return enteros(this, event)" required type="text" name="ci" class="form-control" value="<?php echo $fila[cedula] ?>" id="exampleInputEmail1" placeholder="Cedula">
                                            <label for="exampleInputFile">correo</label>
                                            <input  required type="email" name="correo" class="form-control" value="<?php echo $fila[correo] ?>"  placeholder="Correo">
                                            
                                           
                                            
  
                                        </div>
                                       
                                     
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type=submit  class="btn btn-primary btn-lg" name="eliminar" id="eliminar" value="ELIMINAR">
                                        
                                    
 

                                    </div>
                                </form>
                            </div><!-- /.box -->
<?php


}




}
?>




