<?php

class ControladorCerrarcaja{


	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarCerrarcaja($item, $valor){

		$tabla = "cortecaja";

		$respuesta = ModeloCerrarcaja::mdlMostrarCerrarcaja($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasVentas($fechaInicial, $fechaFinal){

		$tabla = "cortecaja";

		$respuesta = ModeloCerrarcaja::mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
	}

	/*=============================================
	SUMA TOTAL VENTAS RANGO
	=============================================*/

	public function ctrSumaTotalUtilidadRango($fechaInicialR, $fechaFinalR){

		$tabla = "cortecaja";

		$respuesta = ModeloCerrarcaja::mdlSumaTotalUtilidadRango($tabla, $fechaInicialR, $fechaFinalR);

		return $respuesta;

	}



/*=============================================
	CREAR CAJA
	=============================================*/

	static public function ctrCrearCorte(){


$fechaInicialDia = date("Y")."-".date("m")."-".date("d");

		if(isset($_POST["nuevoAbrirr"])){

		

				$tabla = "cortecaja";
date_default_timezone_set('America/Mexico_City');
					$datos = array("RECORDID" => null,
				    "USUARIO"=>$_SESSION["NOMBRECOMPL"],
					"FECHA"=>$_POST["nuevoFechaC"],
					"HORA"=>"",
					 "APERTURACAJA"=>$_POST["nuevoAbrirr"],
					 "GASTOS"=>$_POST["nuevoGastos"],
					 "EFECTIVO"=>$_POST["nuevoEfectivo"],
					 "TARJETA"=>$_POST["nuevoTarjeta"],
					 "DEVOLUCIONES"=>$_POST["nuevoDevoluciones"],
					 "VENTATOTAL"=>$_POST["nuevoTotal"],
					 "ENCAJA"=>$_POST["nuevoEncaja"],
					 "FECHADC"=>date("Y")."-".date("m")."-".date("d")." ".date("G").":".date("i"),
					 "HORADC"=>"",
					   "UTILIDAD"=>$_POST["nuevoUtilidad"],);

				$respuesta = ModeloCerrarcaja::mdlCerrarCaja($tabla, $datos);

				if($respuesta == "ok"){

 $tablaProductosCaja = "apercaja";
 $column ="CAJAABIERTA";
  $ultimoID = ControladorAbrircaja::ctrMostrarIDUltimoCorte();
                       $ultimoID = $ultimoID["id"];

$cerrarcaja = ModeloAbrircaja::mdlCambiarEstatusCaja($tablaProductosCaja, $ultimoID, $column);


					echo'<script>

					swal({
						  type: "success",
						  title: "La caja se ha cerrado",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cortecaja";

									}
								})

					</script>';

				}


			else{

				echo'<script>

					swal({
						  type: "error",
						  title: "No se pudo cerrar la caja",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "cortecaja";

							}
						})

			  	</script>';

			}

		}

	}

}