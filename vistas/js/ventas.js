/*=============================================
CARGAR LA TABLA DINÁMICA DE VENTAS
=============================================*/

// $.ajax({

// 	url: "ajax/datatable-ventas.ajax.php",
// 	success:function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	}

// })// 

$('.tablaVentas').DataTable( {
    "ajax": "ajax/datatable-ventas.ajax.php",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );

/*=============================================
AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
=============================================*/

$(".tablaVentas tbody").on("click", "button.agregarProducto", function(){

	var idProducto = $(this).attr("idProducto");

		var datos = new FormData();
    datos.append("idProducto", idProducto);

     $.ajax({

     	url:"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){

      	    var descripcion = respuesta["descripcion"];
          	var stock = respuesta["stock"];
          	var precio = respuesta["precio_venta"];
          	var codigobarra = respuesta["codigo"];
          	var utilidad = respuesta["utilidad"];

          	
console.log(stock);
    /*=============================================
     EVITAR AGREGAR PRODUTO CUANDO EL STOCK ESTÁ EN CERO
    =============================================*/

          	if(stock == 0){

      			swal({
			      title: "No hay stock disponible",
			      type: "error",
			      confirmButtonText: "¡Cerrar!"
			    });
			    $("button[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");

			    return;

          	}

          	$(".nuevoProducto").append(

          	'<div class="row" style="padding:5px 15px">'+

			  '<!-- Descripción del producto -->'+
	          
	          '<div class="col-xs-8" style="padding-right:0px">'+
	          
	            '<div class="input-group">'+
	              
	              '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+
	              '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+

	            '</div>'+

	          '</div>'+

	          '<!-- Cantidad del producto -->'+

	          '<div class="col-xs-3">'+
	            
	             '<input type="hidden" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+
					
	          '</div>' +

	          '<!-- Precio del producto -->'+

	          '<div class="col-xs-4 ingresoPrecio"  style="padding-left:11px">'+

	            '<div class="input-group">'+
  				     
	              '<input type="text" class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'" readonly required>'+
	  				'<input type="hidden" class="form-control nuevoCodigoBarra" codigobarra="'+codigobarra+'" name="nuevoCodigoBarra" value="'+codigobarra+'" readonly required>'+
	  				'<input type="hidden" class="form-control nuevaUtilidad" utilidad="'+utilidad+'" name="nuevaUtilidad" value="'+utilidad+'" readonly required>'+
	  				'<input type="hidden" class="form-control nuevoStockk" stock="'+stock+'" name="nuevoStockk" value="'+stock+'" readonly required>'+
	  				


	  				'<input type="hidden" class="form-control nuevoCantidadPTotal" name="nuevoCantidadPTotal" value="2" readonly required>'+
	  				
	            '</div>'+
	            
	          '</div>'+

	        '</div>') 

	        // SUMAR TOTAL DE PRECIOS

	        sumarTotalPrecios()

	        // AGREGAR IMPUESTO

	        agregarImpuesto()

		
	        // AGRUPAR PRODUCTOS EN FORMATO JSON

	        listarProductos()

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

			

			calculadora()


	        $(".nuevoPrecioProducto").number(true, 2);


			localStorage.removeItem("quitarProducto");

      	}

     })

});


var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");

$(".nuevoProducto").on("click", "button.quitarProducto", function(){

$(this).parent().parent().parent().parent().remove();


	var idProducto = $(this).attr("idProducto");
	/*=============================================
	ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
	=============================================*/
				
				
	if(localStorage.getItem("quitarProducto") == null){

		idQuitarProducto = [];
			

	}else{

		idQuitarProducto.concat(localStorage.getItem("quitarProducto"))

	}

	idQuitarProducto.push({"idProducto":idProducto});

	localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));



	if($(".nuevoProducto").children().length == 0){

		$("#nuevoImpuestoVenta").val(0);
		$("#nuevoTotalVenta").val(0);
		$("#totalVenta").val(0);
		$("#totalVenta2").val(0);
	txttotal= "Total: $";
	valor= 0;
			 document.getElementById('totalVenta22').innerHTML = txttotal.concat(valor) ;
txtbtn= "Pagar: $";
			 document.getElementById('btn-total').innerHTML = txtbtn.concat(valor) ;	
		$("#nuevoTotalVenta").attr("total",0);


	}else{

		// SUMAR TOTAL DE PRECIOS

    	sumarTotalPrecios()

    	// AGREGAR IMPUESTO
	        
        agregarImpuesto()

        // AGRUPAR PRODUCTOS EN FORMATO JSON

        listarProductos()


		// CALCULAR CAMBIO
		calculadora()
	}

})



/*=============================================
SELECCIONAR PRODUCTO
=============================================*/

$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function(){

	var nombreProducto = $(this).val();
	var nuevaDescripcionProducto = $(this).parent().parent().parent().children().children().children(".nuevaDescripcionProducto");


var nuevaUtilidad = $(this).parent().parent().parent().children().children(".ingresoPrecio").children().children().children().children(".nuevaUtilidad");
var nuevoCodigoBarra = $(this).parent().parent().parent().children().children(".ingresoPrecio").children().children().children(".nuevoCodigoBarra");

	var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
	var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");

	var datos = new FormData();
    datos.append("nombreProducto", nombreProducto);



	  $.ajax({

     	url:"ajax/productos.ajax.php",
      	method: "POST",
      	data: datos,
      	cache: false,
      	contentType: false,
      	processData: false,
      	dataType:"json",
      	success:function(respuesta){
      	    
      	     $(nuevaDescripcionProducto).attr("idProducto", respuesta["id"]);
      	    $(nuevaCantidadProducto).attr("stock", respuesta["stock"]);

		$(nuevaUtilidad).attr("utilidad", respuesta["utilidad"]);
		$(nuevoCodigoBarra).attr("codigobarra", respuesta["codigobarra"]);

      	    $(nuevaCantidadProducto).attr("nuevoStock", Number(respuesta["stock"])-1);

      	    $(nuevoPrecioProducto).val(respuesta["precio_venta"]);
      	    $(nuevoPrecioProducto).attr("precioReal", respuesta["precio_venta"]);


  	      // AGRUPAR PRODUCTOS EN FORMATO JSON

	        listarProductos()

      	}

      })
})


/*=============================================
MODIFICAR LA CANTIDAD
=============================================*/

$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function(){

	var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

	var precioFinal = $(this).val() * precio.attr("precioReal");
	
	precio.val(precioFinal);

	var nuevoStock = Number($(this).attr("stock")) - $(this).val();

	$(this).attr("nuevoStock", nuevoStock);

	if(Number($(this).val()) > Number($(this).attr("stock"))){

		/*=============================================
		SI LA CANTIDAD ES SUPERIOR AL STOCK REGRESAR VALORES INICIALES
		=============================================*/

		$(this).val(0);

		$(this).attr("nuevoStock", $(this).attr("stock"));

		var precioFinal = $(this).val() * precio.attr("precioReal");

		precio.val(precioFinal);

		sumarTotalPrecios();

		swal({
	      title: "La cantidad supera el Stock",
	      text: "¡Sólo hay "+$(this).attr("stock")+" unidades!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });

	    return;

	}

	// SUMAR TOTAL DE PRECIOS

	sumarTotalPrecios()

	// AGREGAR IMPUESTO
	        
    agregarImpuesto()

    // AGRUPAR PRODUCTOS EN FORMATO JSON

    listarProductos()

})

/*=============================================
SUMAR TODOS LOS PRECIOS
=============================================*/

function sumarTotalPrecios(){

	var precioItem = $(".nuevoPrecioProducto");
	
	var arraySumaPrecio = [];  

	for(var i = 0; i < precioItem.length; i++){

		 arraySumaPrecio.push(Number($(precioItem[i]).val()));
		 	}

	function sumaArrayPrecios(total, numero){
		return total + numero;
	}

	var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);
	
	$("#nuevoTotalVenta").val(sumaTotalPrecio);
	$("#totalVenta").val(sumaTotalPrecio);
	$("#totalVenta2").val(sumaTotalPrecio);
	$("#nuevoTotalVenta").attr("total",sumaTotalPrecio);


txttotal= "Total: $";
			 document.getElementById('totalVenta22').innerHTML = txttotal.concat(sumaTotalPrecio) ;
txtbtn= "Pagar: $";
			 document.getElementById('btn-total').innerHTML = txtbtn.concat(sumaTotalPrecio) ;
}




/*=============================================
FUNCIÓN AGREGAR IMPUESTO
=============================================*/

function agregarImpuesto(){

	var impuesto = $("#nuevoImpuestoVenta").val();
	var precioTotal = $("#nuevoTotalVenta").attr("total");

	var precioImpuesto = Number(precioTotal * impuesto/100);

	var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal);
	$("#nuevoTotalVenta").val(totalConImpuesto);
	$("#totalVenta").val(totalConImpuesto);
	$("#totalVenta2").val(totalConImpuesto);

	txttotal= "Total: $";
			 document.getElementById('totalVenta22').innerHTML = txttotal.concat(totalConImpuesto) ;
txtbtn= "Pagar: $";
			 document.getElementById('btn-total').innerHTML = txtbtn.concat(totalConImpuesto) ;
	$("#nuevoPrecioImpuesto").val(precioImpuesto);
	$("#nuevoPrecioNeto").val(precioTotal);


}


/*=============================================
FUNCIÓN CALCULADORA
=============================================*/

function calculadora(){

var precioCalculadora = $("#ans").val();
	var precioTotal = $("#nuevoTotalVenta").attr("total");

	var totalCalculadora = Number(precioCalculadora)- Number(precioTotal);
	$("#nuevoTotalResta").val(totalCalculadora);

}

/*=============================================
CUANDO SE AGREGUE EL PAGO
=============================================*/
 $("#ans").change(function(){
	calculadora();
	
});


$("#nav").click(function(){
	calculadora();
	
});
/*=============================================
CUANDO CAMBIA EL IMPUESTO
=============================================*/

$("#nuevoImpuestoVenta").change(function(){

	agregarImpuesto();
calculadora();
});

/*=============================================
FORMATO AL PRECIO FINAL
=============================================*/




$("#nuevoTotalVenta").number(true, 2);
$("#nuevoTotalResta").number(true, 2);


/*=============================================
LISTAR TODOS LOS PRODUCTOS
=============================================*/

function listarProductos(){

	var listaProductos = [];

	var descripcion = $(".nuevaDescripcionProducto");

	var cantidad = $(".nuevaCantidadProducto");

	var precio = $(".nuevoPrecioProducto");

	var utilidad = $(".nuevaUtilidad");
	var codigobarra = $(".nuevoCodigoBarra");

	for(var i = 0; i < descripcion.length; i++){

		listaProductos.push({ "RECORDID" : $(descripcion[i]).attr("idProducto"), 
							  "descripcion" : $(descripcion[i]).val(),
							  "utilidad" : $(utilidad[i]).val(),
							  "codigobarra" : $(codigobarra[i]).val(),
							  "cantidad" : $(cantidad[i]).val(),
							  "stock" : $(cantidad[i]).attr("nuevoStock"),
							  "precio" : $(precio[i]).attr("precioReal"),
							  "total" : $(precio[i]).val()})

	}


	$("#listaProductos").val(JSON.stringify(listaProductos)); 

}



/*=============================================
FUNCIÓN PARA DESACTIVAR LOS BOTONES AGREGAR CUANDO EL PRODUCTO YA HABÍA SIDO SELECCIONADO EN LA CARPETA
=============================================*/

function quitarAgregarProducto(){

	//Capturamos todos los id de productos que fueron elegidos en la venta
	var idProductos = $(".quitarProducto");

	//Capturamos todos los botones de agregar que aparecen en la tabla
	var botonesTabla = $(".tablaVentas tbody button.agregarProducto");

	//Recorremos en un ciclo para obtener los diferentes idProductos que fueron agregados a la venta
	for(var i = 0; i < idProductos.length; i++){

		//Capturamos los Id de los productos agregados a la venta
		var boton = $(idProductos[i]).attr("idProducto");
		
	}
	
}






/*=============================================
CADA VEZ QUE CARGUE LA TABLA CUANDO NAVEGAMOS EN ELLA EJECUTAR LA FUNCIÓN:
=============================================*/

$('.tablaVentas').on( 'draw.dt', function(){

	quitarAgregarProducto();

		calculadora()
})



/*=============================================
IMPRIMIR FACTURA
=============================================*/

$(".tablas").on("click", ".btnImprimirFactura", function(){

	var codigoVenta = $(this).attr("codigoVenta");

	window.open("extensiones/tcpdf/pdf/factura.php?codigo="+codigoVenta, "_blank");

})

/*=============================================
RANGO DE FECHAS
=============================================*/

$('#daterange-btn').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn span").html();
   
   	localStorage.setItem("capturarRango", capturarRango);

   	window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

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


$(document).ready(function() {

//success toast



var options = {
autoClose: true,
progressBar: true,
enableSounds: true,
sounds: {

success: "https://res.cloudinary.com/dxfq3iotg/video/upload/v1557233524/success.mp3",

},
};

var toast = new Toasty(options);
toast.configure(options);


$(".tablaVentas tbody").on("click", "button.agregarProducto", function(){
toast.success("Producto Agregado");
});
});