<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>

<script type="text/javascript">
var objeto2;  
function decimales(objeto, e){               
 var keynum           
 var keychar           
 var numcheck          
 if(window.event){
  /*/ IE*/            
 keynum = e.keyCode         
 }          
 else if(e.which){ 
 /*/ Netscape/Firefox/Opera/*/          
 keynum = e.which         
 }            
 if((keynum>=35 && keynum<=37) ||keynum==8||keynum==9||keynum==46||keynum==39) {
             return true;         
 }          
 if(keynum==190||keynum==110||(keynum>=95&&keynum<=105)||(keynum>=48&&keynum<=57)){
  posicion = objeto.value.indexOf('.');               
  if(posicion==-1) {              
   return true;           
  }else { 
  if(!(keynum==190||keynum==110)){
   objeto2=objeto;
   t = setTimeout('dosDecimales()',150);
   return true;
  }else{
   objeto2=null;
   return false;
  }
 }
 }else {
 return false;
 }        
}
 
function dosDecimales(){    
 var objeto = objeto2;
 var posicion = objeto.value.indexOf('.');
 var decimal = 2;
 if(objeto.value.length - posicion < decimal){
  objeto.value = objeto.value.substr(0,objeto.value.length-1);                                        
 }else {
  objeto.value = objeto.value.substr(0,posicion+decimal+1);                                            
 }
 return;
}
 
function enteros(objeto, e){
 var keynum
 var keychar
 var numcheck
  if(window.event){ /*/ IE*/
   keynum = e.keyCode
  }
  else if(e.which){ /*/ Netscape/Firefox/Opera/*/
   keynum = e.which
  }
  if((keynum>=35 && keynum<=37) ||keynum==8||keynum==9||keynum==46||keynum==39) {
   return true;
  }
  if((keynum>=95&&keynum<=105)||(keynum>=48&&keynum<=57)){
   return true;
  }else {
   return false;
  }
}
 
function caracteres(e) {
    tecla = (document.all) ? e.keyCode : e.which;
 if (tecla==8 || tecla==37 || tecla<=38 || tecla==39 || tecla<=40) return true;
    patron =/[A-Za-z]/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
</script>
<body>
</body>
</html>
