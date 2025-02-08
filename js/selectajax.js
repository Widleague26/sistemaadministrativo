	function llamdaselect (post,dato,select) {
		$.ajax({
			url: 'pages/ajaxprocesardatos.php',
			type: 'POST',
			data: {post : post, dato : dato},
		})
		.done(function(data) {
			select.html(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	//AUTOCOMPLETAR BUSQUEDA ARTICULOS DESDE FACTURA
	function auto(nomart) {
		if(nomart.length == 0) {
			// Hide the suggestion box.
			$('#auto').hide();
			
		} else {
			$.post("pages/auto_complete.php", {caja: ""+nomart+""}, function(data){
				if(data.length >0) {
					$('#auto').show();
					$('#autolist').html(data);
				}
			});
			
		}
	} // lookup
	
	function fin(thisValue) {
		$('#nomart').val(thisValue);
		setTimeout("$('#auto').hide();", 200);
	}  //FIN

	$("select[name='categorias']").change(function(){
		var dato = $("select[name='categorias'] option:selected").val();
		var post = 'categoria';
		var select = $("select[name='subcategorias']").val("");
		llamdaselect(post,dato,select);
		//alert(dato);		
	});

	$("select[name='estado']").change(function(event) {
		var dato = $("select[name='estado'] option:selected").val();
		var post = 'estado';
		var select = $("select[name='municipio']");
		llamdaselect(post,dato,select);
		//alert(dato);
	});

	$("select[name='municipio']").change(function(event) {
		var dato = $("select[name='municipio'] option:selected").val();
		var post = 'ciudad';
		var select = $("select[name='lugar']");
		llamdaselect(post,dato,select);
		//alert(dato);
	});