<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script type="text/javascript">
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
	});

	///////////////Javscript

	function sendId(id){
		$("#producto_id").val(id);
	}

	function eliminarNodo(id){
		$( "#caja"+id).remove();
		

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
</script>