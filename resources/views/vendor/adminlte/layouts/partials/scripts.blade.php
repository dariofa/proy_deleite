<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script type="text/javascript">
	$(".select2").select2({
  		language: "es",
 		 theme: "classic"
	});
	$('div.alert').not('.alert-important').delay(2000).fadeOut(350);

	$(document).ready(function(){
		$("#peso_gr").blur(function(){
			var gramos = parseInt($("#peso_gr").val());
			$("#peso_kg").val(gramos/1000);
		});
		$("#peso_kg").blur(function(){
			var gramos = parseInt($("#peso_kg").val());
			$("#peso_gr").val(gramos*1000);
		});
		
/*
		$("#btn-help").mouseout(function(){			
				$("#help").slideUp(100);								//$(".help").css({'display':'block'});
		});
		$("#btn-help").click(function(){
					
				$("#help").toggle(100);								//$(".help").css({'display':'block'});
		});
*/
	});

	///////////////Javscript
function open_Help(id,div){	//alert();
	$("#div-help"+id).addClass(div);
}
function close_Help(id,div){	//alert();
	$("#div-help"+id).removeClass(div);
}
	function sendId(id){
		$("#producto_id").val(id);
	}

	function eliminarNodo(id){
		$( "#caja"+id).remove();
		calcToPed();
		

	}
	function searchProdBod(num){
		url = '/admin/bodega/producto/search';
		id = 2;
	 $.ajax({
               
                url: url,
                type: 'POST',
                cache: false, 
                data: {'id':id},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                	console.log(respu);
                	if (num == 1) {
                		clonarNodo(respu);
                	}else{
                		clonarNodo2(respu);
                	}
                    	  
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                  
                    
                }
             });

	}
	function clonarNodo(respu) {
		indice = $(".cajas").length;
		id = indice + 1;
		
		var original=document.getElementById("nodo");

		var nodo = '<div class="content-add-ingr" id="caja'+id+'"><div class="input-group">';
		
		 nodo += '<select class="form-control cajas inp-add-pro" name="productos[]" required>';
		 for (var i = respu.length - 1; i >= 0; i--) {
		 	nodo += '<option value="'+respu[i].id+'">'+respu[i].nombre+'</option>';
		 }
		 	
		 
		 
		
		 nodo += '</select>';
		 nodo +='<input type="text" name="gramos[]" required class="form-control inp-add-gra">';

		 nodo += '<span class="input-group-addon btn-add-prod" id="basic-addon2" onclick="searchProdBod(1)" data-toggle="tooltip" data-placement="top" data-original-title="Agregar Producto">';
		 nodo += '<i class="fa fa-plus"></i></span>';
		 nodo += '<span class="input-group-addon btn-minus-prod" id="basic-addon2" onclick="eliminarNodo('+id+')" title="Eliminar" data-placement="top" >';
		 nodo += '<i class="fa fa-minus"></i></span>';


		 nodo += '</div></div>';
		
		original = $("#nodo");
		//original.attr('nodo_destino',id)
		original.append(nodo);	
		
}

function clonarNodo2(respu) {
		indice = $(".cajas").length;
		id = indice + 1;
		
		var original=document.getElementById("nodo");

		var nodo = '<div class="content-add-ingr" id="caja'+id+'"><div class="input-group">';
		
		 nodo += '<select class="form-control cajas inp-add-pro" id="producto'+id+'" required>';
		 for (var i = respu.length - 1; i >= 0; i--) {
		 	nodo += '<option value="'+respu[i].id+'">'+respu[i].nombre+'</option>';
		 }		
		 nodo += '</select>';
		 nodo +='<input type="text" id="gramo'+id+'" required class="form-control inp-add-gra">';
		 nodo += '<span class="input-group-addon btn-add-new-prod" id="basic-addon2" onclick="addProduct('+id+')" title="Agregar" data-placement="top" >';
		 nodo += '<i class="fa fa-check-circle-o"></i></span>';
		 
		 nodo += '<span class="input-group-addon btn-minus-prod" id="basic-addon2" onclick="eliminarNodo('+id+')" title="Eliminar" data-placement="top" >';
		 nodo += '<i class="fa fa-minus"></i></span>';


		 nodo += '</div></div>';
		
		original = $("#nodo");
		//original.attr('nodo_destino',id)
		original.append(nodo);	
		
}

function updateProdBod(codigo){
	gramos = $("#gramos"+codigo).val();
	id = $("#receta_id").val();
	url = '/admin/receta/producto/update';
	$.ajax({
               
                url: url,
                type: 'POST',
                cache: false,
                data: {'id':id,'gramos':gramos,'codigo':codigo},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                	console.log(respu);
                	 $('#alerts').toggle('slow');
                	$('#alerts').html('<i class="fa fa-info-circle" > </i> Producto actualizado con éxito...');
                	$('#alerts').delay(2000).fadeOut(350);
                    	  
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                  
                    
                }
             });
}
function addProduct(id){
	gramos = $("#gramo"+id).val();
	producto_id = $("#producto"+id).val();
	receta_id = $("#receta_id").val();
	url = '/admin/receta/producto/add';
	if (gramos > 0 && gramos !='' && producto_id !='') {
		$.ajax({
               
                url: url,
                type: 'POST',
                cache: false,
                data: {'receta_id':receta_id,'gramos':gramos,'producto_id':producto_id},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                	console.log(respu);
                	if (!respu.encontrado) {
                		eliminarNodo(id);
                		window.location.reload();
                	}else{
                		$("#alert").toggle();
                		$('div.alert').not('.alert-important').delay(2000).fadeOut(350);
                		eliminarNodo(id);
                	}
                	
                    	  
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                  
                    
                }
             });
	}else{
		alert('Los campos son requeridos');
	}
	
}

function searchProdTienda(num){

	url = '/admin/tienda/producto/search';
		
	 $.ajax({
               
                url: url,
                type: 'POST',
                cache: false,
                data: {'id':num},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                	console.log(respu);
                	if (num == 2) {
                		clonarNodo4(respu);
                	}else{
                		clonarNodo3(respu);
                	}

                		
                	
                    	  
                  },
                error: function(xhr, textStatus, thrownError) {
                  
                  
                    
                }
             });

}

function clonarNodo3(respu) {
		indice = $(".cajas").length;
		id = indice + 1;
		
		var original=document.getElementById("nodo");
		var nodo = '<div class="content-add-ingr" id="caja'+id+'"><div class="input-group">';
		
		 //nodo +='<div class="help" id="help'+id+'" ></div>';

		 //nodo +='<i class="fa fa-question-circle pull-left icon btn-help" onclick="openHelp(\''+id+'\')" ></i>';		
		 nodo += '<select class="form-control cajas inp-add-pro-ti tip_prod" id="producto'+id+'" name="productos[]" required onchange="searchPrTieStock('+id+')">';
		 nodo += '<option value="">Seleccione..</option>';
		 	
		 for (var i = respu.length - 1; i >= 0; i--) {
		 	nodo += '<option value="'+respu[i].id+'">'+respu[i].receta.nombre+'</option>';
		 	
		 } 
		
		 nodo += '</select>';
		 nodo += '<input type="text" name="valorUn[]" readonly class="form-control inp-val-uni-pr valUnit" id="valUnit'+id+'">';

		 nodo +='<input type="text" name="cantidad[]" id="cantidad'+id+'" required class="form-control inp-add-gra-ti cantidadPro" onblur="calcToPed('+id+')">';

		 nodo +='<input type="text" name="cantAprox[]" readonly class="form-control inp-cant-aprox-pr " id="cantAprox'+id+'">';

		 nodo += '<span class="input-group-addon btn-add-prod" id="basic-addon2" onclick="searchProdTienda(1)" data-toggle="tooltip" data-placement="top" data-original-title="Agregar Producto">';
		 nodo += '<i class="fa fa-plus"></i></span>';
		 nodo += '<span class="input-group-addon btn-minus-prod" id="basic-addon2" onclick="eliminarNodo('+id+')" title="Eliminar" data-placement="top" >';
		 nodo += '<i class="fa fa-minus"></i></span>';


		 nodo += '</div></div>';
		
		original = $("#nodo");
		//original.attr('nodo_destino',id)
		original.append(nodo);	
		
}

function clonarNodo4(respu) {
		indice = $(".cajas").length;
		id = indice + 1;
		
		var original=document.getElementById("nodo");
		var nodo = '<div class="content-add-ingr" id="caja'+id+'"><div class="input-group">';
		
		 //nodo +='<div class="help" id="help'+id+'" ></div>';

		 //nodo +='<i class="fa fa-question-circle pull-left icon btn-help" onclick="openHelp(\''+id+'\')" ></i>';		
		 nodo += '<select class="form-control cajas inp-add-pro-ti tip_prod" id="producto'+id+'" name="productos[]" required onchange="searchPrTieStock('+id+')">';
		 nodo += '<option value="">Seleccione..</option>';
		 	
		 for (var i = respu.length - 1; i >= 0; i--) {
		 	nodo += '<option value="'+respu[i].id+'">'+respu[i].receta.nombre+'</option>';
		 	
		 } 
		
		 nodo += '</select>';
		 nodo += '<input type="text" name="valorUn[]" readonly class="form-control inp-val-uni-pr valUnit" id="valUnit'+id+'">';

		 nodo +='<input type="text" name="cantidad[]" id="cantidad'+id+'" required class="form-control inp-add-gra-ti cantidadPro" onblur="calcToPed('+id+')">';

		 nodo +='<input type="text" name="cantAprox[]" readonly class="form-control inp-cant-aprox-pr " id="cantAprox'+id+'">';

		 nodo += '<span class="input-group-addon btn-add-new-prod" id="basic-addon2" onclick="addNewPro('+id+')" data-toggle="tooltip" data-placement="top" data-original-title="Agregar">';
		 nodo += '<i class="fa fa-plus"></i></span>';
		 nodo += '<span class="input-group-addon btn-minus-prod" id="basic-addon2" onclick="eliminarNodo('+id+')" title="Eliminar" data-placement="top" >';
		 nodo += '<i class="fa fa-minus"></i></span>';


		 nodo += '</div></div>';
		
		original = $("#nodo");
		//original.attr('nodo_destino',id)
		original.append(nodo);	
		
}
function openHelp(id){	
	//alert(id);


}
function searchPrTieStock(id){
	val = $("#producto"+id).val();
	//console.log(val);
	url = '/admin/tienda/producto/find'
	$.ajax({
               
                url: url,
                type: 'POST',
                cache: false,
                data: {'id':val},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                	$("#valUnit"+id).val(respu.precio);
                	calcCantAprox(id);
                	console.log(respu);  
                	     	
                    	  
                  },
                error: function(xhr, textStatus, thrownError) {                  
                }
             });
}

function calcToPed(id){
	//pro = document.getElementByTagName('productos');
	valorT = 0;
	$(".cantidadPro").each(function(){
		if (this.value > 0) {
			valorT = parseInt(valorT) + parseInt(this.value);
			$("#valorToPed").text(valorT);
			$("#valor").val(valorT);
			$("#valor_total_pedido").val(valorT);
		}else{
			$("#valorToPed").text(valorT);
			$("#valor").val(valorT);
			$("#valor_total_pedido").val(valorT);
		}	

	});

	calcCantAprox(id);
	//return valorT;


}

function calcCantAprox(id){
//alert(id)
	valUnit = $("#valUnit"+id).val();
	valPed = $("#cantidad"+id).val();
	if (valUnit > 0 && valPed > 0) {
		cantAprox = parseInt(valPed) / parseInt(valUnit);
		$("#cantAprox"+id).val(Math.ceil(cantAprox));
	}

	valUnit = $("#valor"+id).val();
	valPed = $("#precio"+id).val();
	if (valUnit > 0 && valPed > 0) {
		cantAprox = parseInt(valUnit) / parseInt(valPed);
		$("#cantAprox"+id).val(Math.ceil(cantAprox));
	}
	

}

function addProduccion(id){
	url = '/admin/tienda/producto/add/stock';
	id = $("#producto_tienda_id"+id).val();
	stock = $("#stock"+id).val();
	pedido_cantidad = $("#pedido_cantidad"+id).val();
	//alert(pedido_cantidad)
	$.ajax({
               
                url: url,
                type: 'POST',
                cache: false,
                data: {'id':id,'stock':stock,'pedido_cantidad':pedido_cantidad},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                },
                success: function(respu) {
                	if (respu ==false) {
                		$('#alerts').toggle('slow');
                		$('#alerts').html('<i class="fa fa-info-circle" ></i> Lo sentimos..');

                	}else{ 
                		window.location.reload().delay(2000);
                	}
                	

                	console.log(respu);  
                	     	
                    	  
                  },
                error: function(xhr, textStatus, thrownError) {                  
                }
             });


}

function updateProdPedido(id,pedido_id){
	
	url = '/admin/tienda/pedido/product/update';
	producto_id = $("#producto_id"+id).val();
	valor = $("#valor"+id).val();
	cantAprox = $("#cantAprox"+id).val();
	valor_total_pedido = $("#valor_total_pedido").val();

	$.ajax({
               
                url: url,
                type: 'POST',
                cache: false,
                data: {'id':pedido_id,'producto_id':producto_id,'valor':valor,'cantAprox':cantAprox,'valor_total_pedido':valor_total_pedido},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));                },
                success: function(respu) {
               		$('#alerts').toggle('slow');
                	$('#alerts').html('<i class="fa fa-info-circle" > </i> Producto actualizado con éxito...');
                	$('#alerts').delay(2000).fadeOut(350);
                	console.log(respu);  
                	     	
                    	  
                  },
                error: function(xhr, textStatus, thrownError) {                  
                }
             });

}
function addNewPro(id){
	url = '/admin/tienda/pedido/product/add';
	producto_id = $("#producto"+id).val();
	cantidad = $("#cantidad"+id).val();
	cantAprox = $("#cantAprox"+id).val();
	valor_total_pedido = $("#valor_total_pedido").val();
	pedido_id = $("#pedido_id").val();
	//alert(producto_id+" "+cantidad+" "+cantAprox+" "+valor_total_pedido+" "+pedido_id)
	$.ajax({
               
                url: url,
                type: 'POST',
                cache: false,
                data: {'id':pedido_id,'producto_id':producto_id,'valor':cantidad,'cantAprox':cantAprox,'valor_total_pedido':valor_total_pedido},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));                },
                success: function(respu) {
               	            	console.log(respu.encontrado);
               	            	if (!respu.encontrado) {
               	            		window.location.reload().delay(2000);
               	            	}  
               	    $('#alerts').toggle('slow');
                	$('#alerts').html('<i class="fa fa-info-circle" > </i> El producto ya existe...');
                	$('#alerts').delay(2000).fadeOut(350);
                	      	
                	  	
                    	  
                  },
                error: function(xhr, textStatus, thrownError) {                  
                }
             });
}

function updateCanProd(id){
	old_stock = $("#stock"+id).val();
	new_stock = $("#new_stock"+id).val();	
	producto_tienda_id = $("#producto_tienda_id"+id).val();
	url = '/admin/tienda/produccion/update/producido';
	$.ajax({
               
                url: url,
                type: 'POST',
                cache: false,
                data: {'old_stock':old_stock,'new_stock':new_stock,'producto_tienda_id':producto_tienda_id},                
                beforeSend: function(xhr){
                  xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));                },
                success: function(respu) {
               		openAlert('Producto actualizado con éxito...');
                	console.log(respu);  
                	$("#label-info"+id).text(new_stock);
                	toggleUpd(respu.id);   	
                    	  
                  },
                error: function(xhr, textStatus, thrownError) {                  
                }
             });
}
function toggleUpd(id){
	$("#new_stock"+id).toggle();
	$("#label-info"+id).toggle();
	$("#btnUpdate"+id).toggle();
	$("#btnOpUpdate"+id).toggle();
	$("#btnCloUpdate"+id).toggle();
	//alert(id);
}
function openAlert(mensaje){
	$('#alerts').toggle('slow');
    $('#alerts').html('<i class="fa fa-info-circle" > </i> '+mensaje+'');
    $('#alerts').delay(2000).fadeOut(350);
}
</script>