<?php

class ControladorDevoluciones{


	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarDevoluciones($item, $valor){

		$tabla = "devoluciones";

		$respuesta = ModeloDevoluciones::mdlMostrarDevoluciones($tabla, $item, $valor);

		return $respuesta;
	
	}

		/*=============================================
	SUMA TOTAL VENTAS AL DIA
	=============================================*/

	public function ctrSumaTotalDevoluciones($fechaInicialDia){

		$tabla = "devoluciones";


		//$fechaInicialDia = "2020-07-01";

		$respuesta = ModeloDevoluciones::mdlSumaTotalDevoluciones($tabla, $fechaInicialDia);

		return $respuesta;

	}

		/*=============================================
	SUMA TOTAL GASTOS RANGO
	=============================================*/

	public function ctrSumaTotalDevolucionesRango($fechaInicialR){
		$tabla = "devoluciones";
		$respuesta = ModeloDevoluciones::mdlSumaTotalDevolucionesRango($tabla, $fechaInicialR);
		return $respuesta;
	}
}