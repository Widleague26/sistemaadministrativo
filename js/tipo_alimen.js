var contador = $("input[name=numImgs]").val();
$("button[name=editarfoto]").hide();

	$(document).on('click', '#addgaleria', function(event) {
			//$('#galerialugar').append('<div><div data-role="fieldcontain" class="ui-field-contain"><label for="name">Nombre de Foto:</label><div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input type="text" name="galernomfotos[]" required></div></div><div data-role="fieldcontain" class="ui-field-contain"><label for="name">Foto:</label><div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset"><input type="file" name="galerfotos[]" required></div></div><a href="" class="eliminar ui-link ui-btn ui-icon-delete ui-btn-icon-left ui-shadow ui-corner-all" role="button" data-role="button" data-icon="delete"></a></div>');
			$("button[name=editarfoto]").show('slow/400/fast', function() {
				
			});
			contador++;
			if (contador < 6) {
				$('.filaGalaria').append('<tr><td><input type="text" name="galernomfotos[]" value="'+contador+'" required><input type="file" name="galerfotos[]" required></td><td><a class="btn btn-danger tip-top eliminar" href="#">Borrar</a></td></tr>');
			}else{
				contador--;
				alert("Solo se permite un máximo de 5 Imágenes")
			}
			
			//alert(contador);
	});
    $("select[name='servicios'] option").each(function(){
    	if ($(this).text() != "") {
    		//alert('opcion '+$(this).text()+' valor '+ $(this).attr('value'))
    		var selectThis = $(this);    		
    		$("input[name='serviciosName[]']").each(function(){
    			var inputThis = $(this).attr('value');
    			//alert(selectThis+inputThis)
    			if (selectThis.text()==inputThis) {
    				selectThis.remove();
    			}   				  
		    });
    	}       
    });

    $(document).on('click', '.btn-masmas', function(event) {
    	var servicio = $(this).val();
    	var servSplit = servicio.split('-');
    	var serviciosVal = servSplit[0];
		var serviciosTxt = servSplit[1];

		var checkboxValues = new Array();
		var encontrado = 0;
		//recorremos todos los checkbox seleccionados con .each
		$('input[name="serviciosName[]"]').each(function() {
			//$(this).val() es el valor del checkbox correspondiente
			//checkboxValues.push($(this).val());
			var servicioName = $(this).val();
			if (servicioName == serviciosTxt) {
				encontrado = 1;
			}
		});
		

		if (serviciosTxt != "" && encontrado == 0) {
			$('.servicios').append('<div><p class="margin"></p><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-danger del" value="'+serviciosTxt+' '+serviciosVal+'">Eliminar</button></div><input class="form-control" type="text" name="serviciosName[]" value="'+serviciosTxt+'" disabled=""><input class="form-control" type="hidden" name="serviciosID[]" value="'+serviciosVal+'"></div></div>');
			$("input[name='autoServicio']").val("");
		}else{
			$("input[name='autoServicio']").val("");
		}
	});

	$(document).on('click', '.btn-mas', function(event) {
		var serviciosVal = $("select[name='servicios'] option:selected").val();
		var serviciosTxt = $("select[name='servicios'] option:selected").text();
		//alert(servicosGlo);

		if (serviciosTxt != "") {
			$('.servicios').append('<div><p class="margin"></p><div class="input-group"><div class="input-group-btn"><button type="button" class="btn btn-danger del" value="'+serviciosTxt+' '+serviciosVal+'">Eliminar</button></div><input class="form-control" type="text" name="serviciosName[]" value="'+serviciosTxt+'" disabled=""><input class="form-control" type="hidden" name="serviciosID[]" value="'+serviciosVal+'"></div></div>');
			$("select[name='servicios'] option:selected").text(serviciosTxt).remove();
		}
	});


$(document).on('click', '.del', function(event) {
	var parent = $(this).parents().get(2);
	var serviciosSelect = $(this).val();
	var res = serviciosSelect.split(" ");
	//alert(res[0]);
	if (confirm("Desea Eliminar este Servicios?")) {
		$(parent).remove();
		$("select[name='servicios']").append('<option value="'+res[2]+'">'+res[0]+'</option>');
	}
});
$(document).on("click",".eliminar",function(){		
		var parent = $(this).parents().get(1);
		if(confirm("Desea eliminar este Dato?")){
			$(parent).remove();
			contador--;
		}
		if (contador == 1) {
			$("button[name=editarfoto]").hide('slow/400/fast');
		}
		
	});

$(document).on('click', '#lugarguardar', function () {
	var lat = $('input[name="latitud"]').val();
	var lon = $('input[name="longitud"]').val();

	if (lat == "" && lon == ""){
		$('#pac-input').focus();
		$('.ayuda').css('color', 'red');
		return false;
	}
	return true;
});

$("#file-3").fileinput({
	language: 'es',
	showUpload: false,
	showCaption: false,
	browseClass: "btn btn-primary btn-lg",
	allowedFileExtensions: ['jpg', 'png'],
	previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
});
function generarGaleria(id_lugar) {
	var url="pages/generargaleria.php";
	var newRow = [];
	var configPrew = [];


	$.getJSON(url, {id_lugar: id_lugar, page: "mostrarIMG"}, function(clientes){
		$.each(clientes, function(i,cliente){
			newRow.push("images/galeria/"+cliente.descripcion);
			configPrew.push({caption: cliente.descripcion, url: url, key: cliente.id_imagen, extra: {img_key: cliente.id_imagen, nombreIMG: cliente.descripcion, borrar: "borrarIMG"}});
		});

		$("#input-700").fileinput({
			language: 'es',
			uploadUrl: url, // server upload action
			uploadAsync: true,
			showUpload: false,
			maxFileCount: 8,
			browseClass: "btn btn-primary",
			validateInitialCount: true,
			overwriteInitial: false,
			initialPreview: newRow,
			initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
			initialPreviewFileType: 'image', // image is the default and can be overridden in config below
			allowedFileExtensions: ['jpg', 'png'],
			initialPreviewConfig: configPrew,
			fileActionSettings:{
				showUpload: true,
				//showRemove: false
			},
			browseOnZoneClick: true,
			uploadExtraData: {
				img_key: "100",
				subir: "subirIMG",
				id_lugar: id_lugar
			}
		});
	});
}

var pathname = window.location.pathname;
var url = window.location;
var separarUrl = url.toString().split('&')[1];
var separarUrl2 = separarUrl.split('=');
//alert(pathname);
//alert(separarUrl2[0]+" = "+separarUrl2[1]);

if (separarUrl2[0] == "editargaleria"){
	generarGaleria(separarUrl2[1]);
}

