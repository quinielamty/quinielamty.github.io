
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Reportes de Utilidades
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Reportes de Utilidades</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <div class="input-group">

          <button type="button" class="btn btn-default" id="daterange-btn3">
           
            <span>
              <i class="fa fa-calendar"></i> Rango de fecha
            </span>

            <i class="fa fa-caret-down"></i>

          </button>

        </div>

        <div class="box-tools pull-right">

        <?php

        if(isset($_GET["fechaInicial"])){

          echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';

        }else{

           echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';

        }         

        ?>
           
          
          </a>

        </div>
         
      </div>

      <div class="box-body">
        
        <div class="row">

          <div class="col-xs-12">
                         <?php



     if(isset($_GET["fechaInicial"])){

          $fechaInicialR = $_GET["fechaInicial"];
          $fechaFinalR = $_GET["fechaFinal"];
        }else{

          $fechaInicialR = null;
          $fechaFinalR = null;
        }

        $utilidadesrango = ControladorCerrarcaja::ctrSumaTotalUtilidadRango($fechaInicialR, $fechaFinalR);
?>
     
             <h3>Utilidades totales: $<?php echo number_format($utilidadesrango["totalrangoUti"],2); ?></h3>
<h6>Después del último corte de caja.</h6>
            <?php

            include "reportes/grafico-utilidades.php";

            ?>

          </div>


           </div>
          
        </div>

      </div>
      
    </div>

  </section>
 
 </div>
