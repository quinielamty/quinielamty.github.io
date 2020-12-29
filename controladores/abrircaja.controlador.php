<?php

class ControladorAbrircaja{


	/*=============================================
	MOSTRAR CAJA
	=============================================*/

	static public function ctrMostrarAbrircaja($item, $valor){

		$tabla = "apercaja";
		$respuesta = ModeloAbrircaja::mdlMostrarAbrircaja($tabla, $item, $valor);
		return $respuesta;
	}

	/*=============================================
	MOSTRAR SE ABRIO
	=============================================*/

	static public function ctrMostrarSeAbrioCaja($fechaInicialR, $fechaFinalR){

		$tabla = "apercaja";
		$respuesta = ModeloAbrircaja::mdlMostrarSeAbrioCaja($tabla, $fechaInicialR, $fechaFinalR);
		return $respuesta;
	}

	/*=============================================
	MOSTRAR ULTIMA FECHA
	=============================================*/

	static public function ctrMostrarUltimoCorte(){

		$tabla = "apercaja";
		$respuesta = ModeloAbrircaja::mdlMostrarUltimoCorte($tabla);
		return $respuesta;
	}


	/*=============================================
	MOSTRAR ESTATUS ULTIMA FECHA
	=============================================*/

	static public function ctrMostrarEstatusUltimoCorte(){

		$tabla = "apercaja";
		$respuesta = ModeloAbrircaja::mdlMostrarEstatusUltimoCorte($tabla);
		return $respuesta;
	}


	/*=============================================
	MOSTRAR ID ULTIMA CORTE
	=============================================*/

	static public function ctrMostrarIDUltimoCorte(){

		$tabla = "apercaja";
		$respuesta = ModeloAbrircaja::mdlMostrarIDUltimoCorte($tabla);
		return $respuesta;
	}


	/*=============================================
	CREAR CAJA
	=============================================*/

	static public function ctrCrearCaja(){


$fechaInicialDia = date("Y")."-".date("m")."-".date("d");

		if(isset($_POST["nuevoAbrir"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAbrir"])){

				$tabla = "apercaja";
date_default_timezone_set('America/Mexico_City');
				$datos = array("RECORDID" => null,
					           "USUARIO" => $_SESSION["NOMBRECOMPL"],
					           	"FECHA"=>date("Y")."-".date("m")."-".date("d")." ".date("G").":".date("i"),
					       		"HORA"=>date("G").":".date("i"),
					           "EFECTIVO" => $_POST["nuevoAbrir"],
					           "CAJAABIERTA"=>"SI",);

				$respuesta = ModeloAbrircaja::mdlIngresarCaja($tabla, $datos);

				if($respuesta == "ok"){
					echo'<script>

					swal({
						  type: "success",
						  title: "La caja se ha abierto",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "abrircaja";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "No se pudo abrir la caja",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "abrircaja";

							}
						})

			  	</script>';

			}

		}

	}












}