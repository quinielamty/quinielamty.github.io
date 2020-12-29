<?php

class ControladorGastosfijos{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearGastosfijos(){

		if(isset($_POST["nuevoGastofijo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoGastofijo"])){

				$tabla = "gastosfijos";

				$datos = array("RECORDID" => null,
					           "concepto" => $_POST["nuevoGastofijo"],
					           "cantidad"=>$_POST["nuevoCantidad"],);

				$respuesta = ModeloGastosfijos::mdlIngresarGastosfijos($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El gasto ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "gastosfijos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El gasto no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "gastosfijos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarGastosfijos($item, $valor){

		$tabla = "gastosfijos";

		$respuesta = ModeloGastosfijos::mdlMostrarGastosfijos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarGastosfijos(){

		if(isset($_POST["editarGastofijo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarGastofijo"])){

				$tabla = "gastosfijos";

				$datos = array("RECORDID" => $_POST["idGastosfijos"],
					           "concepto" => $_POST["editarGastofijo"],
					           "cantidad" => $_POST["editarCantidad"],);
				
				$respuesta = ModeloGastosfijos::mdlEditarGastosfijos($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El gasto ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "gastosfijos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El campo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "gastosfijos";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarGastosfijos(){

		if(isset($_GET["idGastosfijos"])){

			$tabla ="gastosfijos";
			$datos = $_GET["idGastosfijos"];

			$respuesta = ModeloGastosfijos::mdlBorrarGastosfijos($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El gasto ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "gastosfijos";

									}
								})

					</script>';
			}
		}
		
	}


	/*=============================================
	SUMA TOTAL DE GASTOS FIJOS
	=============================================*/

	public function ctrSumaTotalDeGastosFijos(){

		$tabla = "gastosfijos";

		$respuesta = ModeloGastosfijos::mdlSumaTotalDeGastosFijos($tabla);

		return $respuesta;

	}
}
