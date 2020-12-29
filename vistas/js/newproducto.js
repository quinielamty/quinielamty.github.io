$( ".btnAgregarCalzado" ).click(function() {


          	$(".nuevoProductoF").append(

          	'<div class="row" style="padding:5px 15px">'+

			  '<!-- Numero de calzado -->'+
	          
	          '<div class="col-xs-2 ingresoNumero">'+       
	           '<input type="number" class="form-control nuevoNumero" id="nuevoNumero" name="nuevoNumero"  step="0.1" min="0" required style="width:150px">'+  
	         '</div>'+

	         	          '<div class="col-xs-2 ingresoCantidad">'+
	           '<input type="number" class="form-control  nuevaCantidad" required  style="width:150">'+          
	         '</div>'+

	         	    '<div class="col-xs-3 ingresoSucursal">'+
	           '<input type="text"  class="form-control nuevoSucursal"   id="nuevoSucursal"  name="nuevoSucursal" required>'+        
	         '</div>'+

	         	          '<div class="col-xs-2 ingresoStockActual">'+
	           '<input type="text"  class="form-control nuevoStockActual" id="nuevoStockActual"  step="0.1" min="0" name="nuevoStockActual" required>'+        
	         '</div>'+

  	          '<div class="col-xs-1">'+
  	        ' <button class="btn btn-danger btnEliminarProducto" data-toggle="modal"><i class="fa fa-trash"></i></button>'+
 
	         '</div>'+




	          '<!-- Cantidad del producto -->'+

	          '<div class="col-xs-3">'+
	            
	             	'<input type="hidden" class="form-control nuevoCantidadPTotal" name="nuevoCantidadPTotal" value="2" readonly required>'+
	  				
	          '</div>' +



	        '</div>') 



listarProductosF()

});

/*=============================================
Guardar cambios ultima fila
=============================================*/

$( ".btnGuardarFactura" ).click(function() {
listarProductosF()
sumarTotalPreciosF()
	})



/*=============================================
ELiminar producto
=============================================*/
$(".nuevoProductoF").on("click", "button.btnEliminarProducto", function(){

$(this).parent().parent().remove();

	listarProductosF()
	sumarTotalPreciosF()
})


/*=============================================
MULTIPLICAR CANTIDAD X PRECIO
=============================================*/

$(".nuevoProductoF").on("change", ".nuevoSucursal", function(){



	var itemCantidad = $(this).parent().parent().children(".ingresoNumero").children(".nuevoNumero").val();
	var itemPrecioUni = $(this).parent().parent().children(".ingresoSucursal").children(".nuevoSucursal").val();

	var totalItem = Number(itemCantidad)* Number(itemPrecioUni);
	
$(this).parent().parent().children(".ingresoStockActual").children(".nuevoStockActual").val(totalItem);
sumarTotalPreciosF()
})




/*=============================================
SELECCIONAR PRODUCTO
=============================================*/

$(".formularioVentaF").on("change", "select.nuevaCantidad", function(){


	var nuevaCantidad = $(this).parent().parent().parent().children().children().children(".nuevaCantidad");
	var nuevoSucursal = $(this).parent().parent().parent().children().children().children(".nuevoSucursal");

var nuevaUnidad = $(this).parent().parent().parent().children().children().children(".nuevaUnidad");
var nuevoNumero = $(this).parent().parent().parent().children().children().children(".nuevoNumero");


	var datos = new FormData();
    datos.append("nombreProducto", nombreProducto);



listarProductosF()
sumarTotalPreciosF()
     
})





/*=============================================
SUMAR TODOS LOS PRECIOS
=============================================*/

function sumarTotalPreciosF(){


	var precioItem = $(".nuevoStockActual");
	var arraySumaPrecio = [];  
	for(var i = 0; i < precioItem.length; i++){
		 arraySumaPrecio.push(Number($(precioItem[i]).val()));
		 	}
	function sumaArrayPrecios(total, numero){
		return total + numero;
	}
	var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);

	$("#nuevototal").val(sumaTotalPrecio);
	$("#nuevototal").attr("total",sumaTotalPrecio);


}

/*=============================================
LISTAR TODOS LOS PRODUCTOS
=============================================*/

function listarProductosF(){

	var listaProductosF = [];
	var descripcion = $(".nuevaCantidad");
	var cantidadpro = $(".nuevoCantidadPTotal");
	var cantidad = $(".nuevoNumero");
	var precio = $(".nuevoSucursal");
	var unidad = $(".nuevaUnidad");

	var preciot = $(".nuevoStockActual");

	for(var i = 0; i < descripcion.length; i++){

		listaProductosF.push({ "descripcion" : $(descripcion[i]).val(),
							  "cantidadpro" : $(cantidadpro[i]).val(),					 
							  "cantidad" : $(cantidad[i]).val(),
							   "unidad" : $(unidad[i]).val(),
							  "precio" : $(precio[i]).val(),	

								"preciot" : $(preciot[i]).val()})


							 	}

$("#listaProductosF").val(JSON.stringify(listaProductosF)); 




}




/*=============================================
RANGO DE FECHAS
=============================================*/

$('#daterangeF-btn').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(7, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterangeF-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterangeF-btn span").html();
   
   	localStorage.setItem("capturarRango", capturarRango);

   	window.location = "index.php?ruta=tablafacturas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

	localStorage.removeItem("capturarRango");
	localStorage.clear();
	window.location = "ventas";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker.opensleft .ranges li").on("click", function(){

	var textoHoy = $(this).attr("data-range-key");

	if(textoHoy == "Hoy"){

		var d = new Date();
		
		var dia = d.getDate();
		var mes = d.getMonth()+1;
		var año = d.getFullYear();

		if(mes < 10){

			var fechaInicial = año+"-0"+mes+"-"+dia;
			var fechaFinal = año+"-0"+mes+"-"+dia;

		}else if(dia < 10){

			var fechaInicial = año+"-"+mes+"-0"+dia;
			var fechaFinal = año+"-"+mes+"-0"+dia;

		}else if(mes < 10 && dia < 10){

			var fechaInicial = año+"-0"+mes+"-0"+dia;
			var fechaFinal = año+"-0"+mes+"-0"+dia;

		}else{

			var fechaInicial = año+"-"+mes+"-"+dia;
	    	var fechaFinal = año+"-"+mes+"-"+dia;

		}	

    	localStorage.setItem("capturarRango", "Hoy");

    	window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

	}

})

/*=============================================
SUBIENDO LA FOTO DEL PRODUCTO
=============================================*/

$(".nuevaImagen").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaImagen").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaImagen").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})