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
</script>