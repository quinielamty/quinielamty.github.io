<?php

require_once "conexion.php";

class ModeloCerrarcaja{


	/*=============================================
	MOSTRAR GASTOS
	=============================================*/

	static public function mdlMostrarCerrarcaja($tabla, $item, $valor){

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
	RANGO FECHAS
	=============================================*/	

	static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal){

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();	


		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE FECHA like '%$fechaFinal%'");

			$stmt -> bindParam(":FECHA", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE FECHA BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE FECHA BETWEEN '$fechaInicial' AND '$fechaFinal'");

			}
		
			$stmt -> execute();

			return $stmt -> fetchAll();

		}
			}

			
	/*=============================================
	SUMAR EL TOTAL DE VENTAS RANGO
	=============================================*/

	static public function mdlSumaTotalUtilidadRango($tabla, $fechaInicialR, $fechaFinalR){	


		if($fechaInicialR == null){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(UTILIDAD) as totalrangoUti FROM $tabla");



		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;


	}else if($fechaInicialR == $fechaFinalR){

			$stmt = Conexion::conectar()->prepare("SELECT SUM(UTILIDAD) as totalrangoUti FROM $tabla WHERE FECHA like '%$fechaFinalR%'");

			
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinalR);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT SUM(UTILIDAD) as totalrangoUti FROM $tabla WHERE FECHA BETWEEN '$fechaInicialR' AND '$fechaFinalMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT SUM(UTILIDAD) as totalrangoUti FROM $tabla WHERE FECHA BETWEEN '$fechaInicialR' AND '$fechaFinalR'");

			}
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;


		}
}

/*=============================================
	CERRAR CAJA
	=============================================*/

	static public function mdlCerrarCaja($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(RECORDID, USUARIO, FECHA, HORA, APERTURACAJA, GASTOS, EFECTIVO, TARJETA, DEVOLUCIONES,VENTATOTAL, ENCAJA, FECHADC, HORADC, UTILIDAD) VALUES (NULL, :USUARIO, :FECHA, :HORA, :APERTURACAJA, :GASTOS, :EFECTIVO, :TARJETA, :DEVOLUCIONES, :VENTATOTAL, :ENCAJA, :FECHADC, :HORADC, :UTILIDAD)");


		$stmt->bindParam(NULL, $datos["RECORDID"], PDO::PARAM_STR);
		
		$stmt->bindParam(":USUARIO", $datos["USUARIO"], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA", $datos["FECHA"], PDO::PARAM_STR);
		$stmt->bindParam(":HORA", $datos["HORA"], PDO::PARAM_STR);
		$stmt->bindParam(":APERTURACAJA", $datos["APERTURACAJA"], PDO::PARAM_STR);
		$stmt->bindParam(":GASTOS", $datos["GASTOS"], PDO::PARAM_STR);
				$stmt->bindParam(":EFECTIVO", $datos["EFECTIVO"], PDO::PARAM_STR);
		$stmt->bindParam(":TARJETA", $datos["TARJETA"], PDO::PARAM_STR);
		$stmt->bindParam(":DEVOLUCIONES", $datos["DEVOLUCIONES"], PDO::PARAM_STR);
		$stmt->bindParam(":VENTATOTAL", $datos["VENTATOTAL"], PDO::PARAM_STR);
		$stmt->bindParam(":ENCAJA", $datos["ENCAJA"], PDO::PARAM_STR);
		$stmt->bindParam(":FECHADC", $datos["FECHADC"], PDO::PARAM_STR);
		$stmt->bindParam(":HORADC", $datos["HORADC"], PDO::PARAM_STR);
		$stmt->bindParam(":UTILIDAD", $datos["UTILIDAD"], PDO::PARAM_STR);



		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
}
