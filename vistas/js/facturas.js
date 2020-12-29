$( ".btnAgregarFactura" ).click(function() {


          	$(".nuevoProductoF").append(

          	'<div class="row" style="padding:5px 15px">'+

			  '<!-- Descripción del producto -->'+
	          
	          '<div class="col-xs-1 ingresoCantidad">'+       
	           '<input type="number" class="form-control nuevaCantidad" id="nuevaCantidad" name="nuevaCantidad" required>'+   
	         '</div>'+

	         	          '<div class="col-xs-3 ingresoDescripcion">'+
	           '<input type="text" class="form-control  nuevaDescripcion" required>'+          
	         '</div>'+

	         	          '<div class="col-xs-2">'+
	                    '        <select class="form-control nuevaUnidad"  id="nuevaUnidad" name="nuevaUnidad">'+
               '  <option value="">Selecionar la unidad</option>'+
                    
                  '  <option value="PIEZA">PIEZA</option>'+
                  '   <option value="CAJA">CAJA / LOTE</option>'+
                  '  <option value="GRAMOS">GRAMOS</option>'+
                 '   <option value="KILOGRAMOS">KILOGRAMOS</option>'+
                 '  <option value="LITRO">LITRO</option>'+
                '   <option value="GALONES">GALONES</option>'+
  
               ' </select>       '+
	         '</div>'+
	         	          '<div class="col-xs-2 ingresoPrecioUni">'+
	           '<input type="number"  class="form-control nuevaPrecio"   id="nuevaPrecio" step="0.1" min="0" name="nuevaPrecio" required>'+        
	         '</div>'+

	         	          '<div class="col-xs-2 ingresoPrecioFinal">'+
	           '<input type="text"  class="form-control nuevaPrecioFinal" id="nuevaPrecioFinal"  step="0.1" min="0" name="nuevaPrecioFinal" required>'+        
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

$(".nuevoProductoF").on("change", ".nuevaPrecio", function(){

	var itemCantidad = $(this).parent().parent().children(".ingresoCantidad").children(".nuevaCantidad").val();
	var itemPrecioUni = $(this).parent().parent().children(".ingresoPrecioUni").children(".nuevaPrecio").val();

	var totalItem = Number(itemCantidad)* Number(itemPrecioUni);
	
$(this).parent().parent().children(".ingresoPrecioFinal").children(".nuevaPrecioFinal").val(totalItem);
sumarTotalPreciosF()
})




/*=============================================
SELECCIONAR PRODUCTO
=============================================*/

$(".formularioVentaF").on("change", "select.nuevaDescripcion", function(){

	var nuevaDescripcion = $(this).parent().parent().parent().children().children().children(".nuevaDescripcion");
	var nuevaPrecio = $(this).parent().parent().parent().children().children().children(".nuevaPrecio");

var nuevaUnidad = $(this).parent().parent().parent().children().children().children(".nuevaUnidad");
var nuevaCantidad = $(this).parent().parent().parent().children().children().children(".nuevaCantidad");

	var datos = new FormData();
    datos.append("nombreProducto", nombreProducto);

listarProductosF()
sumarTotalPreciosF()
     
})





/*=============================================
SUMAR TODOS LOS PRECIOS
=============================================*/

function sumarTotalPreciosF(){


	var precioItem = $(".nuevaPrecioFinal");
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
	var descripcion = $(".nuevaDescripcion");
	var cantidadpro = $(".nuevoCantidadPTotal");
	var cantidad = $(".nuevaCantidad");
	var precio = $(".nuevaPrecio");
	var unidad = $(".nuevaUnidad");

	var preciot = $(".nuevaPrecioFinal");

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
