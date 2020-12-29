<?php

require_once "../controladores/gastosfijos.controlador.php";
require_once "../modelos/gastosfijos.modelo.php";

class AjaxGastosfijos{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idGastosfijos;

	public function ajaxEditarGastosfijos(){

		$item = "RECORDID";
		$valor = $this->idGastosfijos;

		$respuesta = ControladorGastosfijos::ctrMostrarGastosfijos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idGastosfijos"])){

	$gastosfijos = new AjaxGastosfijos();
	$gastosfijos -> idGastosfijos = $_POST["idGastosfijos"];
	$gastosfijos -> ajaxEditarGastosfijos();
}
