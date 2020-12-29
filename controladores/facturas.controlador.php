<?php

class ControladorFacturas{

	/*=============================================
	MOSTRAR Facturas
	=============================================*/

	static public function ctrMostrarFacturas($item, $valor){

		$tabla = "factura";

		$respuesta = ModeloFacturas::mdlMostrarFacturas($tabla, $item, $valor);

		return $respuesta;

	}


/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasFacturas($fechaInicial, $fechaFinal){

		$tabla = "factura";

		$respuesta = ModeloFacturas::mdlRangoFechasFacturas($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}
	


	/*=============================================
	SUMA TOTAL COMPRAS RANGO
	=============================================*/

	public function ctrSumaTotalFacturasRango($fechaInicialR, $fechaFinalR){

		$tabla = "factura";

		$respuesta = ModeloFacturas::mdlSumaTotalFacturasRango($tabla, $fechaInicialR, $fechaFinalR);

		return $respuesta;

	}


		/*=============================================
	SUMA TOTAL COMPRAS RANGO
	=============================================*/

	public function ctrSumaTotalFacturasRangoSemana($fechaInicialR, $fechaFinalR){

		$tabla = "factura";

		$respuesta = ModeloFacturas::mdlSumaTotalFacturasRangoSemana($tabla, $fechaInicialR, $fechaFinalR);

		return $respuesta;

	}

	/*=============================================
	CREAR VENTA
	=============================================*/

	static public function ctrCrearFacturas(){

		if(isset($_POST["nuevoFolio"])){

/*=============================================
	ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS Facturas DE LOS PRODUCTOS
		=============================================*/

			if($_POST["listaProductosF"] == ""){

					echo'<script>

				swal({
					  type: "error",
					  title: "La venta no se ha ejecuta si no hay productos",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "facturaprueba";

								}
							})

				</script>';

				return;
			}



			$listaProductosF = json_decode($_POST["listaProductosF"], true);

			$totalProductosComprados = array();

			foreach ($listaProductosF as $key => $value) {

			   array_push($totalProductosComprados, $value["cantidadpro"]);
			  
 				$tablaProductos = "productos";
			   	$descripcion = $value["descripcion"];
			    $precio = $value["precio"];
			    $unidad = $value["unidad"];
			     $cantidadf = $value["cantidad"];
			      $preciot = $value["preciot"];

			     
	
			/*=============================================
			GUARDAR LA COMPRA
			=============================================*/	
			$tabla = "factura";
			date_default_timezone_set('America/Mexico_City');
			$datos = array("RECORDID" => NULL,

					           "FOLIO" => $_POST["nuevoFolio"],	
					           "FECHA"=> $_POST["nuevoFecha"], 
					           "PROVEEDOR" => $_POST["nuevoProveedor"],
					           "CANTIDAD" =>  $cantidadf,
					           "DESCRIPCION" => $descripcion,
					           "PRECIOUNITARIO" => $precio,
					           "PRECIOCOMPRA" =>  $preciot,
					           "UNIDAD" => $unidad,
					        "COMPRATOTAL" =>  $_POST["nuevototal"],);
					          

			$respuesta = ModeloFacturas::mdlIngresarFactura($tabla, $datos);
}			

			if($respuesta == "ok"){
	

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La venta ha sido guardada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "crear-factura";

								}
							})

				</script>';

			}

		}

	}


	



}
