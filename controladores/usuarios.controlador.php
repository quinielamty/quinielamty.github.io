<?php

class ControladorUsuarios{



	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){


			
	$tabla = "acceso";
				 $item = "acceso";
          			$valor = "NO";
				

		$acceso = ModeloUsuarios::mdlMostrarAcceso($tabla, $item, $valor);


	if($acceso["acceso"] == "SI"){
	

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

			   
				$tabla = "usuarios";
				$item = "USUARIO";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if($respuesta["USUARIO"] == $_POST["ingUsuario"] && $respuesta["CONTRASENA"]){

						$_SESSION["iniciarSesion"] = "ok";

						$_SESSION["ID"] = $respuesta["ID"];
						$_SESSION["NOMBRECOMPL"] = $respuesta["NOMBRECOMPL"];
						$_SESSION["USUARIO"] = $respuesta["USUARIO"];
						$_SESSION["TIPOCUENTA"] = $respuesta["TIPOCUENTA"];

						/*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

							echo '<script>

								window.location = "inicio";

							</script>';

										
						
					}else{

						echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';

					}		

				}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

				

			}	

		}


} else if($acceso["acceso"] == "SI"){

echo '<br><div class="alert alert-danger">Lo sentimos, usted no tiene acceso por falta de pago, comuníquese con su asesor</div>';


}


return $acceso;



 }
	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario(){

		if(isset($_POST["nuevoUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

			   	
				$ruta = "";


				$tabla = "usuarios";

			
				$datos = array("ID" => null,
					           "USUARIO" => $_POST["nuevoUsuario"],
					           "CONTRASENA" => $_POST["nuevoPassword"],
					           "TIPOCUENTA" => $_POST["nuevoPerfil"],
					           "NOMBRECOMPL"=>$_POST["nuevoNombre"],);

				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuarios";
			$datos = $_GET["idUsuario"];


			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}

	}


}
	


