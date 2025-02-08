
<?php



include"./fpdf/fpdf.php";


 $bd = new GestarBD;
 
 $x1=$_GET['codigo'];

date_default_timezone_set('America/caracas');
$hora = date('H:i:s a');
$fecha = date('d-m-Y ');
$fecha7dias = date('d-m-Y', strtotime('-1 week')) ; // resta 1 semana




class MiPDF extends FPDF {
	
	
	
	
	}
	
	
	$cabeceraT = array("Codigo ");
		
		
		$mipdf = new MiPDF();
		$mipdf -> addPage();
		
		
		
		
	
		$mipdf -> Setfont('Arial','B',10);
		$mipdf -> Ln (2);
		$mipdf -> Cell(200,10,"Lista De Liquidados $fecha",0,0,'C');
		$mipdf -> Ln (10);
		
		
		
		
		
		$mipdf -> Cell(10,12,"N°",0,0,'C');
		for ($i = 0; $i < count($cabeceraT); $i++)
		{
			
		
			$mipdf -> SetFont('ARIAL','B', 9);
			$mipdf -> SetFillColor(0, 191, 255);
			$mipdf -> Cell ( 15, 11 , $cabeceraT[$i],1,0,'C',true);
		}
		
			
			$mipdf -> SetFont('ARIAL','B', 9);
$mipdf -> SetFillColor(0, 191, 255);
	$mipdf -> Cell(35,11,"NOMBRE",1,0,'C',true);
	$mipdf -> SetFont('ARIAL','B', 9);
$mipdf -> SetFillColor(0, 191, 255);
	$mipdf -> Cell(30,11,"APELLIDO",1,0,'C',true);

		$mipdf -> SetFont('ARIAL','B', 9);
$mipdf -> SetFillColor(0, 191, 255);
	$mipdf -> Cell(25,11,"FECHA INICIO",1,0,'C',true);
	
	
				
		$mipdf -> SetFont('ARIAL','B', 9);
$mipdf -> SetFillColor(0, 191, 255);
	$mipdf -> Cell(27,11,"FECHA SALIDA",1,0,'C',true);
		$mipdf -> SetFont('ARIAL','B', 9);
$mipdf -> SetFillColor(0, 191, 255);
	$mipdf -> Cell(20,11,"CEDULA",1,0,'C',true);
		$mipdf -> SetFont('ARIAL','B', 9);
$mipdf -> SetFillColor(0, 191, 255);
	$mipdf -> Cell(24,11,"ESTADO",1,0,'C',true);
	
		

			
			$mipdf -> Ln (1);
		
		//$mipdf -> Image("../webcam/fotos/$imagen",10,43,30,"JPG");
		
		
	
		

	
	

	
	$mipdf -> Ln(10);
	
$sql="SELECT * FROM productos where id_productos";
	//$consulta=mysql_query($conexion,$sql); 
$sql2=$bd->consulta($sql);

		//$fecha55=$fecha7dias;
	//$consulta55=mysql_query($conexion,$fecha55); 
	//$result=mysql_query($fecha55,$link) or die("Error: ".mysql_error());
$oye=0;

$num = 0; 


	while ( $datos = $bd-> mostrar_registros($sql2))
	{
	
	
		$num;


		$id= $datos ['id_productos'];
		
		$nombre = $datos ['nombre'];
		$apellido = $datos ['apellido'];
		
		$sexo = $datos ['correo'];
		$parto = $datos ['fechai'];
		$am = $datos ['cod'];
		$fechas = $datos ['ultimal'];
		$cedula = $datos ['cedula'];
		
	
		$estado = $datos ['estado'];
		
		
		
		
		
		$fec=date('d-m-y',$fechai);
		$d=date('d',$fec);
		$m=date('m',$fec);
		$y=date('Y',$fec);
		
$dia=date(d);
$mes=date(m);
$ano=date(Y);

//fecha de nacimiento

$dianaz=4;
$mesnaz=2;
$anonaz=2005;

//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

if (($mesnaz == $mes) && ($dianaz > $dia)) {
$ano=($ano-1); }

//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

if ($mesnaz > $mes) {
$ano=($ano-1);}

//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

$edad=($ano-$anonaz);

		$fec=strtotime($parto);
		$fec=date('d-m-Y ',$fec);
		$d=date('d',$fec);
		$m=date('m',$fec);
		$y=date('Y',$fec);
		
		
		
		$cabeceraS = array("$id");
		

 
  $num++;  

	   $mipdf -> Cell(10,5,"$num",1,0,'C');
		for ($i = 0; $i < count($cabeceraS); $i++)
		{
			$mipdf -> SetFont('ARIAL','B', 9);
			$mipdf -> SetFillColor(1000,1000,255); 
			$mipdf -> Cell ( 15, 5 , $cabeceraS[$i],1,0,'C',true);
			}
			

			
		
		
			
			  $mipdf -> Cell(35,5,"$nombre",1,0,'C');
		$mipdf -> Cell(30,5,"$apellido",1,0,'C');	
		  $mipdf -> Cell(25,5,"$fec",1,0,'C');
		  
		   

		  if($fechas==''){
		  $fechas='S/N';
		  }else{
		  $fechas=date("d-m-Y",strtotime($fechas)); 

		  }
		  
		  
		  $mipdf -> Cell(27,5,"$fechas",1,0,'C');
		  $mipdf -> Cell(20,5,"$cedula",1,0,'C');
		  if($estado==''){
		  $estado='VIGENTE';
		  }else{
		  
		  $estado='LIQUIDADO';
		  }
		  
		$mipdf -> Cell(24,5,"$estado",1,0,'C');	
		 
			
			
			
		
	
		$mipdf -> Ln(5);
		}
		
		
	
	/* $mipdf -> Cell(140,5,"",0,0,'C');
	$regu="select sum(horalec)+sum(potelec)-0.5
  from dlec";
$regu2=mysql_query($conexion,$regu);
$fila3 = mysqli_fetch_row($regu2);
$regu3 = $fila3[0];

$r="SELECT  count(horalec) FROM dlec";
$re=mysqli_query($conexion,$r);
$fil = mysqli_fetch_row($re);
$reg = $fil[0];


$pro=$reg/$oye;
*/	

	
	
	 

	 

	

	
		
		$mipdf -> Ln(10);
		$mipdf -> cell(178,5,"fecha : $fecha" , 0 , 10, true);
		$mipdf -> cell(178,1,"hora : $hora" , 0 , 10, true);
		

		
		$mipdf -> Output();
		class PDF extends FPDF
{
function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');

}
}
	
	

?>
