<?php

class ControladorVentas{

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function ctrMostrarVentas($item, $valor){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlMostrarVentas($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasVentas($fechaInicial, $fechaFinal){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}

	
	/*=============================================
	MOSTRAR SE ULTIMOTICKET
	=============================================*/

	static public function ctrMostrarUltimoTicket(){

		$tabla = "ventas";
		$respuesta = ModeloVentas::mdlMostrarUltimoTicket($tabla);
		return $respuesta;
	}

	/*=============================================
	SUMA TOTAL VENTAS RANGO
	=============================================*/

	public function ctrSumaTotalVentasRango($fechaInicialR, $fechaFinalR){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlSumaTotalVentasRango($tabla, $fechaInicialR, $fechaFinalR);

		return $respuesta;

	}


	/*=============================================
	SUMA TOTAL UTILIDAD RANGO
	=============================================*/

	public function ctrSumaTotalUtilidadRango($fechaInicialR, $fechaFinalR){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlSumaTotalUtilidadRango($tabla, $fechaInicialR, $fechaFinalR);

		return $respuesta;

	}

		/*=============================================
	SUMA TOTAL EFECTIVO RANGO
	=============================================*/

	public function ctrSumaTotalEfectivoRango($fechaInicialR, $fechaFinalR){
		$tabla = "ventas";
		$respuesta = ModeloVentas::mdlSumaTotalEfectivoRango($tabla, $fechaInicialR, $fechaFinalR);
		return $respuesta;
	}

			/*=============================================
	SUMA TOTAL Tarjeta RANGO
	=============================================*/

	public function ctrSumaTotalTarjetaRango($fechaInicialR, $fechaFinalR){
		$tabla = "ventas";
		$respuesta = ModeloVentas::mdlSumaTotalTarjetaRango($tabla, $fechaInicialR, $fechaFinalR);
		return $respuesta;
	}
	/*=============================================
	SUMA TOTAL VENTAS
	=============================================*/

	public function ctrSumaTotalVentas(){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlSumaTotalVentas($tabla);

		return $respuesta;

	}

		/*=============================================
	SUMA TOTAL VENTAS AL DIA
	=============================================*/

	public function ctrSumaTotalVentasDia($fechaInicialDia){

		$tabla = "ventas";


		//$fechaInicialDia = "2020-07-01";

		$respuesta = ModeloVentas::mdlSumaTotalVentasDia($tabla, $fechaInicialDia);

		return $respuesta;

	}


	
	/*=============================================
	SUMA TOTAL UTILIDADES
	=============================================*/

	public function ctrSumaTotalUtilidades($fechaInicialDia){

		$tabla = "ventas";

		$respuesta = ModeloVentas::mdlSumaTotalUtilidades($tabla, $fechaInicialDia);

		return $respuesta;

	}


	/*=============================================
	CREAR VENTA
	=============================================*/

	static public function ctrCrearVenta(){

		if(isset($_POST["nuevaVenta"])){

/*=============================================
	ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STOCK Y AUMENTAR LAS VENTAS DE LOS PRODUCTOS
		=============================================*/

			if($_POST["listaProductos"] == ""){

					echo'<script>

				swal({
					  type: "error",
					  title: "La venta no se ha ejecuta si no hay productos",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "cajadetect";

								}
							})

				</script>';

				return;
			}



			$listaProductos = json_decode($_POST["listaProductos"], true);

			$totalProductosComprados = array();

			foreach ($listaProductos as $key => $value) {

			   array_push($totalProductosComprados, $value["cantidad"]);
			   $tablaProductos = "productos";
			    $item = "RECORDID";
			    $valor = $value["RECORDID"];
			    $orden = "RECORDID";
			    $producto = $value["descripcion"];
			    $precio = $value["precio"];
			    $codigobarra = $value["codigobarra"];
			    $utilidad = $value["utilidad"];
	

			    $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor, $orden);
				$item1a = "ventas";
				$item2 = "stock";
				$valor1a = $value["cantidad"] + $traerProducto["ventas"];
				$stockactual =$traerProducto["stock"];
				$cantidad= $value["cantidad"];

  $nuevasVentas = ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

			$nuevoStock = ModeloProductos::mdlActualizarStock($tablaProductos, $item2, $valor, $stockactual, $cantidad);




			
			/*=============================================
			GUARDAR LA COMPRA
			=============================================*/	
			$tabla = "ventas";
			date_default_timezone_set('America/Mexico_City');
			$datos = array("RECORDID" => null,

					           "IDVENTA" => $_POST["nuevaVenta"],
					           "CLIENTE" => $_POST["nuevoCliente"],
					           "VENDEDOR" => $_SESSION["NOMBRECOMPL"],
					           "CODIGOB" => $codigobarra,
					           "PRODUCTO" =>$producto,
					           "IMPUESTO" => $_POST["nuevoImpuestoVenta"],
					           "DESCUENTO" => "0",
					           "PRECIO" => $precio,
					           "TOTAL" => $_POST["totalVenta"],
					           "METODO" => $_POST["nuevoMetodoPago"],
					           	"FECHA"=>date("Y")."-".date("m")."-".date("d")." ".date("G").":".date("i"),
					       		"HORA"=>$utilidad);
					          

			$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);
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

								window.location = "cajadetect";

								}
							})

				</script>';

			}

		}

	}


	



}
