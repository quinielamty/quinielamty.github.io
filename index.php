<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/gastosfijos.controlador.php";
require_once "controladores/gastos.controlador.php";
require_once "controladores/abrircaja.controlador.php";
require_once "controladores/cerrarcaja.controlador.php";
require_once "controladores/devoluciones.controlador.php";
require_once "controladores/facturas.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/gastosfijos.modelo.php";
require_once "modelos/gastos.modelo.php";
require_once "modelos/abrircaja.modelo.php";
require_once "modelos/cerrarcaja.modelo.php";
require_once "modelos/devoluciones.modelo.php";
require_once "modelos/facturas.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();