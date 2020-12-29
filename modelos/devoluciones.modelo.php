<?php

require_once "conexion.php";

class ModeloDevoluciones{


	/*=============================================
	MOSTRAR GASTOS
	=============================================*/

	static public function mdlMostrarDevoluciones($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	
}


		/*=============================================
	SUMAR EL TOTAL DE VENTAS AL DIA
	=============================================*/

	static public function mdlSumaTotalDevoluciones($tabla, $fechaInicialDia){	

		
		$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIO) as totalDEV FROM $tabla WHERE FECHA like '%$fechaInicialDia%'");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	SUMAR EL TOTAL DE DEVOLUCIONES RANGO
	=============================================*/
	static public function mdlSumaTotalDevolucionesRango($tabla, $fechaInicialR){	

			$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIO) as totalrangoDevoluciones FROM $tabla WHERE FECHA  >= '$fechaInicialR%'");

		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
}

}
