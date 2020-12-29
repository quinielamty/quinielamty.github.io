<?php

class ControladorProductos{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarProductos($item, $valor, $orden){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor, $orden);

		return $respuesta;

	}

		/*=============================================
	MOSTRAR PRODUCTOS INICIO
	=============================================*/

	static public function ctrMostrarProductosInicio($item, $valor, $orden){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductosInicio($tabla, $item, $valor, $orden);

		return $respuesta;

	}

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function ctrCrearProducto(){

		if(isset($_POST["nuevoCodigoBarra"])){
				
				if(preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoCodigoBarra"]) ){
			
				$tabla = "productos";

					if($_POST["nuevoStock"] == "0"){
							$stock = "NA";

					}else{
						$stock = $_POST["nuevoStock"];
					}

					date_default_timezone_set('America/Mexico_City');
					$fechaInicialDia = date("Y")."-".date("m")."-".date("d");

				$datos = array("RECORDID" => null,
								"id_categoria" => $_POST["nuevaCategoria"],
							   "codigo" => $_POST["nuevoCodigoBarra"],
							   "descripcion" => $_POST["nuevoDescripcion"],
							   "utilidad" => $_POST["nuevaUtilidad"],
							   "stock" => $stock,
							   "precio_compra" => $_POST["nuevaPrecioCompra"],
							   "precio_venta" => $_POST["nuevaPrecioVenta"],
							   "unidad" => $_POST["nuevaUnidad"],
							   "ventas"=>"NO",
							   "fecha" =>  $fechaInicialDia,);

				$respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El producto ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "productos";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';
			}
		}

	}



	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarProducto(){

		if(isset($_POST["editarDescripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ., ]+$/', $_POST["editarDescripcion"])){

				$tabla = "productos";

	if($_POST["editarStock"] == "0"){
							$EDstock = "NA";

					}else{
						$EDstock = $_POST["editarStock"];
					}
					date_default_timezone_set('America/Mexico_City');
					$fechaInicialDia = date("Y")."-".date("m")."-".date("d");
					
				$datos = array("RECORDID" => $_POST["idProducto"],
					           "id_categoria" => $_POST["editarCategoria"],
					           "codigo" => $_POST["editarCodigoBarra"],
					           "descripcion" => $_POST["editarDescripcion"],
					           "utilidad" => $_POST["editarUtilidad"],
					           "stock" => $EDstock,
					           "precio_compra" => $_POST["editarPrecioCompra"],
					           "precio_venta" => $_POST["editarPrecioVenta"],
					           "unidad" => $_POST["editarUnidad"],
					           "ventas" => $_POST["NoVentas"],
					           "fecha" => $fechaInicialDia,);
				
				$respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);


				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El producto ha sido modificado",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "productos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarProducto(){

		if(isset($_GET["idProducto"])){

			$tabla = "productos";
			$datos = $_GET["idProducto"];

			$respuesta = ModeloProductos::mdlBorrarProducto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El producto ha sido borrado",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "productos";

									}
								})

					</script>';
			}
		}
		
	}


	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/

	static public function ctrMostrarSumaVentas(){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);

		return $respuesta;

	}


}