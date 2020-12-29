<?php

require_once "conexion.php";

class ModeloFacturas{

	/*=============================================
	MOSTRAR Facturas
	=============================================*/

	static public function mdlMostrarFacturas($tabla, $item, $valor){

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
	SUMAR EL TOTAL DE VENTAS RANGO
	=============================================*/

	static public function mdlSumaTotalFacturasRango($tabla, $fechaInicialR, $fechaFinalR){	


		if($fechaInicialR == null){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIOCOMPRA) as totalrangoF FROM $tabla");



		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;


	}else if($fechaInicialR == $fechaFinalR){

			$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIOCOMPRA) as totalrangoF FROM $tabla WHERE FECHA like '%$fechaFinalR%'");

			
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

				$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIOCOMPRA) as totalrangoF FROM $tabla WHERE FECHA BETWEEN '$fechaInicialR' AND '$fechaFinalMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIOCOMPRA) as totalrangoF FROM $tabla WHERE FECHA BETWEEN '$fechaInicialR' AND '$fechaFinalR'");

			}
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;


		}
}
	
	
	/*=============================================
	SUMAR EL TOTAL DE VENTAS RANGO
	=============================================*/

	static public function mdlSumaTotalFacturasRangoSemana($tabla, $fechaInicialR, $fechaFinalR){	


		if($fechaInicialR == null){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIOCOMPRA) as totalrangoSEM FROM $tabla");



		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;


	}else if($fechaInicialR == $fechaFinalR){

			$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIOCOMPRA) as totalrangoSEM FROM $tabla WHERE FECHA like '%$fechaFinalR%'");

			
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

				$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIOCOMPRA) as totalrangoSEM FROM $tabla WHERE FECHA BETWEEN '$fechaInicialR' AND '$fechaFinalMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT SUM(PRECIOCOMPRA) as totalrangoSEM FROM $tabla WHERE FECHA BETWEEN '$fechaInicialR' AND '$fechaFinalR'");

			}
		
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;


		}
}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function mdlRangoFechasFacturas($tabla, $fechaInicial, $fechaFinal){

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
	CREAR CAJA
	=============================================*/

	static public function mdlIngresarFactura($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(RECORDID, FOLIO, FECHA, PROVEEDOR, CANTIDAD, DESCRIPCION, PRECIOUNITARIO, PRECIOCOMPRA, UNIDAD, COMPRATOTAL) VALUES (NULL, :FOLIO, :FECHA, :PROVEEDOR, :CANTIDAD, :DESCRIPCION, :PRECIOUNITARIO, :PRECIOCOMPRA, :UNIDAD, :COMPRATOTAL)");

		$stmt->bindParam(NULL, $datos["RECORDID"], PDO::PARAM_STR);
		
		$stmt->bindParam(":FOLIO", $datos["FOLIO"], PDO::PARAM_STR);
		$stmt->bindParam(":FECHA", $datos["FECHA"], PDO::PARAM_STR);
		$stmt->bindParam(":PROVEEDOR", $datos["PROVEEDOR"], PDO::PARAM_STR);
		$stmt->bindParam(":CANTIDAD", $datos["CANTIDAD"], PDO::PARAM_STR);
		$stmt->bindParam(":DESCRIPCION", $datos["DESCRIPCION"], PDO::PARAM_STR);
		$stmt->bindParam(":PRECIOUNITARIO", $datos["PRECIOUNITARIO"], PDO::PARAM_STR);
		$stmt->bindParam(":PRECIOCOMPRA", $datos["PRECIOCOMPRA"], PDO::PARAM_STR);
		$stmt->bindParam(":UNIDAD", $datos["UNIDAD"], PDO::PARAM_STR);
		$stmt->bindParam(":COMPRATOTAL", $datos["COMPRATOTAL"], PDO::PARAM_STR);


	if($stmt->execute()){

			return "ok";

		}else{
			return "error";
		}
		
		$stmt->close();
		$stmt = null;

	}

	
}



