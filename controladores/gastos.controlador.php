<?php

class ControladorGastos{

/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearGastos(){

		if(isset($_POST["pronostico1hidden"])){
			
				$tabla = "pronostico";
date_default_timezone_set('America/Mexico_City');
				$datos = array("RECORDID" => null,
					           "usuario" =>$_POST["nuevoUsername"],
					           "pro1"=>$_POST["pronostico1hidden"],
					       "pro2"=>$_POST["pronostico2hidden"],
					   "pro3"=>$_POST["pronostico3hidden"],
					"pro4"=>$_POST["pronostico4hidden"],
					"pro5"=>$_POST["pronostico5hidden"],
					"pro6"=>$_POST["pronostico6hidden"],
					"pro7"=>$_POST["pronostico7hidden"],
					"pro8"=>$_POST["pronostico8hidden"],
					"pro9"=>$_POST["pronostico9hidden"],
					"fecha"=>date("Y")."-".date("m")."-".date("d")." ".date("G").":".date("i"),
				"status"=>"PENDIENTE",);

				$respuesta = ModeloGastos::mdlIngresarGastos($tabla, $datos);

				if($respuesta == "ok"){
					$cerrar= $_POST["nuevoUsername"];
										$pronostico= $_POST["pronostico1hidden"]." ".$_POST["pronostico2hidden"]." ".$_POST["pronostico3hidden"]." ".$_POST["pronostico4hidden"]." ".$_POST["pronostico5hidden"]." ".$_POST["pronostico6hidden"]." ".$_POST["pronostico7hidden"]." ".$_POST["pronostico8hidden"]." ".$_POST["pronostico9hidden"];
					echo'<script>

					swal({
						  type: "success",
						  title: " '.$cerrar.' TOMA SCREENSHOT A TU PRONOSTICO Y ENVÍALO POR WHATSAPP:",
						  text: " '.$pronostico.'",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
					
									window.location.href = "https://api.whatsapp.com/send?phone=528129703602&text=Realiza%20tu%20pago%20y%20env%C3%ADanos%20tu%20folio";

									}
								})

					</script>';

				}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El gasto no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "usuarios";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarGastos($item, $valor){

		$tabla = "equipos";

		$respuesta = ModeloGastos::mdlMostrarGastos($tabla, $item, $valor);

		return $respuesta;
	
	}

		/*=============================================
	SUMA TOTAL VENTAS AL DIA
	=============================================*/

	public function ctrSumaTotalGastos($fechaInicialDia){

		$tabla = "gastos";


		//$fechaInicialDia = "2020-07-01";

		$respuesta = ModeloGastos::mdlSumaTotalGastos($tabla, $fechaInicialDia);

		return $respuesta;

	}

	/*=============================================
	SUMA TOTAL GASTOS RANGO
	=============================================*/

	public function ctrSumaTotalGastosRango($fechaInicialR){
		$tabla = "gastos";
		$respuesta = ModeloGastos::mdlSumaTotalGastosRango($tabla, $fechaInicialR);
		return $respuesta;
	}
}