<?php

error_reporting(0);


$f = date("Y-m-d"); //Fecha Actual
$lastday = date("Y-m-d", strtotime("$f   -7 day"));

$fechaInicial = $lastday;
$fechaFinal = $f;


$respuesta = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

$arrayFechas = array();
$arrayVentas = array();
$sumaPagosMes = array();

foreach ($respuesta as $key => $value) {

	#Capturamos sólo el año y el mes
	$fecha = substr($value["FECHA"],0,10);

	#Introducir las fechas en arrayFechas
	array_push($arrayFechas, $fecha);

	#Capturamos las ventas
	$arrayVentas = array($fecha => $value["PRECIO"]);

	#Sumamos los pagos que ocurrieron el mismo mes
	foreach ($arrayVentas as $key => $value) {
		
		$sumaPagosMes[$key] += $value;
	}

}


$noRepetirFechas = array_unique($arrayFechas);


?>

<!--=====================================
GRÁFICO DE VENTAS
======================================-->


<div class="box box-solid bg-teal-gradient">
	
	<div class="box-header">
		
 		<i class="fa fa-th"></i>

  		<h3 class="box-title">Gráfico de ventas últimos 7 días</h3><h5><a href="ventas"> Más detalles</a></h5>

	</div>

	<div class="box-body border-radius-none nuevoGraficoVentas">

		<div class="chart" id="line-chart-ventas" style="height: 250px;"></div>

  </div>

</div>

<script>
	
 var line = new Morris.Line({
    element          : 'line-chart-ventas',
    resize           : true,
    data             : [

    <?php

    if($noRepetirFechas != null){

	    foreach($noRepetirFechas as $key){

	    	echo "{ y: '".$key."', ventas: ".$sumaPagosMes[$key]." },";


	    }

	    echo "{y: '".$key."', ventas: ".$sumaPagosMes[$key]." }";

    }else{

       echo "{ y: '0', ventas: '0' }";

    }

    ?>

    ],
    xkey             : 'y',
    ykeys            : ['ventas'],
    labels           : ['ventas'],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    preUnits         : '$',
    gridTextSize     : 10
  });

</script>