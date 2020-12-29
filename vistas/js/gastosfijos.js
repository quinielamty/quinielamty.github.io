/*=============================================
EDITAR GASTOS FIJOS
=============================================*/
$(".tablas").on("click", ".btnEditarGastosfijos", function(){

	var idGastosfijos = $(this).attr("idGastosfijos");
	 
	var datos = new FormData();

	datos.append("idGastosfijos", idGastosfijos);
	
	
   $.ajax({

      url:"ajax/gastosfijos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){


			$("#idGastosfijos").val(respuesta["RECORDID"]);
     		$("#editarGastofijo").val(respuesta["concepto"]);
     		$("#editarCantidad").val(respuesta["cantidad"]);

			     		console.log("respuesta", respuesta);
     	}

	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarGastosfijos", function(){

	 var idGastosfijos = $(this).attr("idGastosfijos");

	 swal({
	 	title: '¿Está seguro de borrar?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=gastosfijos&idGastosfijos="+idGastosfijos;

	 	}

	 })

})