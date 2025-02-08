$(document).on('pagebeforeshow', '#pag-b', function(event) {

	function procesar (post,dato,select) {
		// body...
		$.ajax({
			type: "POST",
			url: "procesar_datos.php",
			data: { post : post, dato : dato } 
		}).done(function(data){
			select.html(data);
		});
	}

	$("select[name='municipio']").change(function(){
		var dato = $("select[name='municipio']").val();
		var post = 'municipio';
		var select = $(".municdatos");		
		procesar(post,dato,select);
		
	});

	////////////////////NO ESPACIOS EN /////////////////////////////////////
	$( 'input[name="nombrexd"] ,input[name="apellidoxd"] ,input[name="name"] , input[name="descripcion"], textarea[name="descrip"], input[name="lugar"],input[name="organiza"],input[name="contacto"],input[name="latitud"],input[name="longitud"],input[name="direccion"],input[name="nomfoto"],input[name="nomfotos"],input[name="galernomfotos"]' ).change(function() {
			while(''+this.value.charAt(0)==' ')
			this.value=this.value.substring(1,this.value.length); 
			changeCase(this.form.descripcion)
		});
	/////////////////////////////MAYUSCULAS EN LA PRIMERA LETRAS/////////////////////
	$( 'input[name="nombrexd"] ,input[name="apellidoxd"], input[name="name"] , input[name="descripcion"], textarea[name="descrip"], input[name="lugar"],input[name="organiza"],input[name="contacto"],input[name="direccion"],input[name="nomfoto"],input[name="nomfotos"],input[name="galernomfotos"]').keypress(function() {
		var m = $(this).val();
		var index;
		var tmpStr;
		var tmpChar;
		var preString;
		var postString;
		var strlen;
		tmpStr = m.toLowerCase();
		strLen = tmpStr.length;
		if (strLen > 0)  {
		for (index = 0; index < strLen; index++)  {
		if (index == 0)  {
		tmpChar = tmpStr.substring(0,1).toUpperCase();
		postString = tmpStr.substring(1,strLen);
		tmpStr = tmpChar + postString;
		}
		else {
		tmpChar = tmpStr.substring(index, index+1);
		if (tmpChar == " " && index < (strLen-1))  {
		tmpChar = tmpStr.substring(index+1, index+2).toUpperCase();
		preString = tmpStr.substring(0, index+1);
		postString = tmpStr.substring(index+2,strLen);
		tmpStr = preString + tmpChar + postString;
		         }
		      }
		   }
		}
		m = tmpStr;
		$(this).val(m);
	});

	///////////////////////////////SOLO LETRAS Y ESPACIO////////////////////////
	$( 'input[name="nombrexd"] ,input[name="apellidoxd"],input[name="name"],input[name="descripcion"],input[name="lugar"],input[name="organiza"],input[name="contacto"]' ).keypress(function(e) {
		tecla = (document.all) ? e.keyCode : e.which;
	    if (tecla==8) return true; //Tecla de retroceso (para poder borrar)
	    
	    patron =/[a-za-z\s]/; // Solo acepta letras y espacios
	    
	    te = String.fromCharCode(tecla);
	    return patron.test(te); 
	});

	$( 'input[name="latitud"],input[name="longitud"]' ).keypress(function(e) {
		var nav4 = window.Event ? true : false;
		// NOTA: Backspace = 8, Enter = 13, '0' = 48, '9' = 57, '.' = 46
		var key = nav4 ? e.which : e.keyCode;
		return (key <= 13 || (key >= 48 && key <= 57) || key == 46 || key == 45);
	});
	////////////////////TELEFONO//////////////////////////////////////////
	$( 'input[name="telf"],input[name="telfcelular"],input[name="telflocal"]' ).change(function() {
		var telef = $(this).val();
		var RegExPattern = /^((04|02){1})\d{9}$/;	
	    if ((telef.match(RegExPattern))) {
	    	 $(".error").hide();
	    } else {        
	        $(this).attr("placeholder", "ERROR: Formato (0412|0212)1234567.");
	        $(this).val('');
	    } 
	});
	////////////////CORREO/////////////////////////////////////////
	$( 'input[name="correo"],input[name="correoactual"],input[name="correonuevo"]' ).change(function() {
		var telef = $(this).val();
		var RegExPattern = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;	
	    if ((telef.match(RegExPattern))) {
	    	 $(".error").hide();
	    } else {        
	        $(this).attr("placeholder", "ERROR: Formato mail@ejemplo.com.");
	        $(this).val('');
	    } 
	});
	////////////////WEB/////////////////////////////////////////
	$( 'input[name="web"]' ).change(function() {
		var telef = $(this).val();
		var RegExPattern = /^http:\/\/[a-zA-Z0-9-_:/.?&amp;=]+$/;	
	    if ((telef.match(RegExPattern))) {
	    	 $(".error").hide();
	    } else {        
	        $(this).attr("placeholder", "ERROR: Formato http://web@ejemplo.com");
	        $(this).val('');
	    } 
	});

	////////////////WEB/////////////////////////////////////////
	/*$( 'input[name="desde"], input[name="hasta"]' ).change(function() {
		var fecha = $(this).val();

		if (fecha)
		   {  
		      borrar = fecha;
		      if ((fecha.substr(2,1) == "/") && (fecha.substr(5,1) == "/"))
		      {  
		         for (i=0; i<10; i++)
		             { 
		            if (((fecha.substr(i,1)<"0") || (fecha.substr(i,1)>"9")) && (i != 2) && (i != 5))
		                        {
		               borrar = '';
		               break;  

		                        } 
		         }
		             if (borrar)
		             { 
		                a = fecha.substr(6,4);
		                    m = fecha.substr(3,2);
		                    d = fecha.substr(0,2);
		                    if((a < 1900) || (a > 2050) || (m < 1) || (m > 12) || (d < 1) || (d > 31))
		                       borrar = '';
		                    else
		                    {
		                       if((a%4 != 0) && (m == 2) && (d > 28))
		                          borrar = ''; // Año no viciesto y es febrero y el dia es mayor a 28
		                           else 
		                           {
		                          if ((((m == 4) || (m == 6) || (m == 9) || (m==11)) && (d>30)) || ((m==2) && (d>29)))
		                                 borrar = '';                        
		                           }  // else
		                    } // fin else
		         } // if (error)
		      } // if ((fecha.substr(2,1) == "/") && (fecha.substr(5,1) == "/"))                             
		          else
		             borrar = '';
		          if (borrar == '')
		          	 $(this).attr("placeholder", "ERROR: Formato dd/mm/aaaa");
		          	 $(this).val('');
		             //alert('FECHA ERRONEA INGRESA UNA FECHA Y FORMATO (dd/mm/aaaa) CORRECTO');
		   } // if (fecha)
		        
	        //$(this).attr("placeholder", "ERROR: Formato http://web@ejemplo.com");
	       
	   
	});*/

	
	/////////////////// mostrar calendario ///////////////////////////////////////
	$(function() {
		$.datepicker.regional['es'] = {
			 closeText: 'Cerrar',
			 prevText: '<Ant',
			 nextText: 'Sig>',
			 currentText: 'Hoy',
			 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
			 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
			 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			 weekHeader: 'Sm',
			 dateFormat: 'dd/mm/yy',
			 firstDay: 1,
			 isRTL: false,
			 showMonthAfterYear: false,
			 yearSuffix: ''
			 };
		$.datepicker.setDefaults($.datepicker.regional['es']);

		$( 'input[name="f_nacimiento"], input[name="fecha_mant"], input[name="fecha_prog"]').datepicker({
			dateFormat: 'yy-mm-dd',
	        changeMonth: true,
	        changeYear: true,
	        showButtonPanel: true,
	        maxDate: "+0d",
	        beforeShow: function() {
	        	$(".ui-datepicker").css('font-size', 12)
	        }
		})/*.attr('readonly', true)*//*.attr('required', true)*/.attr({
			required: true,
			readonly: true
		});

		 $( "input[name='desde']" ).datepicker({
			dateFormat: 'dd/mm/yy',
			//timeFormat: "hh:mm tt",
	        changeMonth: true,
	        changeYear: true,
	        showButtonPanel: true,
			onClose: function( selectedDate ) {
			$( "input[name='hasta']" ).datepicker( "option", "minDate", selectedDate );
			},
			beforeShow: function() {
	        	$(".ui-datepicker").css('font-size', 12)
	        }
		}).on('keypress', function(e){ e.preventDefault(); });
		 
		$( "input[name='hasta']" ).datepicker({
			dateFormat: 'dd/mm/yy',
			//timeFormat: "hh:mm tt",
	        changeMonth: true,
	        changeYear: true,
	        showButtonPanel: true,
			onClose: function( selectedDate ) {
			$( "input[name='desde']" ).datepicker( "option", "maxDate", selectedDate );
			},
			beforeShow: function() {
	        	$(".ui-datepicker").css('font-size', 12)
	        }
		}).on('keypress', function(e){ e.preventDefault(); })

		$( 'input[name="fecha_venci"]').datepicker({
			dateFormat: 'yy-mm-dd',
	        changeMonth: true,
	        changeYear: true,
	        showButtonPanel: true,
	        //maxDate: "+0d" 
		});

		$( 'input[name="mezcla_ingreso"]' ).datetimepicker({
			dateFormat: 'yy-mm-dd',
			timeFormat: "hh:mm tt",
	        changeMonth: true,
	        changeYear: true,
	        showButtonPanel: true,
			onClose: function( selectedDate ) {
			$( 'input[name="mezcla_egreso"]' ).datetimepicker( "option", "minDate", selectedDate );
			}
		}).attr('readonly', true)/*.val(formatoAMPM())*/;
		$( 'input[name="mezcla_egreso"]' ).datetimepicker({
			dateFormat: 'yy-mm-dd',
			timeFormat: "hh:mm tt",
	        changeMonth: true,
	        changeYear: true,
	        showButtonPanel: true,
			onClose: function( selectedDate ) {
			$( 'input[name="mezcla_ingreso"]' ).datetimepicker( "option", "maxDate", selectedDate );
			}
		}).attr('readonly', true)/*.val(formatoAMPM())*/;
	});

	function formatoAMPM() {
		var d = new Date();
		var dia = d.getDate();
		var mes = d.getMonth() + 1;
		var anho = d.getFullYear();
	  	var hours = d.getHours();
	  	var minutes = d.getMinutes();
	  	var ampm = hours >= 12 ? 'pm' : 'am';
	  	hours = hours % 12;
	  	hours = hours ? hours : 12; // the hour '0' should be '12'
	  	minutes = minutes < 10 ? '0'+minutes : minutes;
	  	dia = dia < 10 ? '0'+dia : dia;
	  	mes = mes < 10 ? '0'+mes : mes;
	  	var fechactual = anho + '-' + mes + '-' + dia + ' ' +hours + ':' + minutes + ' ' + ampm;
	  	return fechactual;
	}


});
	
