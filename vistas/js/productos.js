/*=============================================
AGREGANDO PRECIO DE VENTA
=============================================*/
$("#nuevaPrecioVenta, #nuevaPrecioCompra").change(function(){

var precioCompra = $("#nuevaPrecioCompra").val();
var precioVenta = $("#nuevaPrecioVenta").val();
   

var totalUtilidad = Number(precioVenta)- Number(precioCompra);

$("#nuevaUtilidad").val(totalUtilidad);
})


/*=============================================
EDITANDO PRECIO DE VENTA
=============================================*/
$("#editarPrecioVenta, #editarPrecioCompra").change(function(){

var precioCompraEdit = $("#editarPrecioCompra").val();
var precioVentaEdit = $("#editarPrecioVenta").val();
   

var totalUtilidadEdit = Number(precioVentaEdit)- Number(precioCompraEdit);

$("#editarUtilidad").val(totalUtilidadEdit);
})



/*=============================================
EDITAR PRODUCTO
=============================================*/
$(".tablas").on("click", "button.btnEditarProducto", function(){

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
        
$("#idProducto").val(respuesta["RECORDID"]);
$("#editarCodigoBarra").val(respuesta["codigo"]);
$("#editarDescripcion").val(respuesta["descripcion"]);
$("#editarCategoria").val(respuesta["id_categoria"]);
$("#editarStock").val(respuesta["stock"]);
$("#editarUnidad").val(respuesta["unidad"]);
$("#editarPrecioCompra").val(respuesta["precio_compra"]);
$("#editarPrecioVenta").val(respuesta["precio_venta"]);
$("#editarFechaIngreso").val(respuesta["fecha"]);
$("#editarUtilidad").val(respuesta["utilidad"]);

$("#NoVentas").val(respuesta["ventas"]);
      }

  })

})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarProducto", function(){

   var idProducto = $(this).attr("idProducto");

   swal({
    title: '¿Está seguro de borrar el producto?',
    text: "¡Si no lo está puede cancelar la acción!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar categoría!'
   }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=productos&idProducto="+idProducto;

    }

   })

})