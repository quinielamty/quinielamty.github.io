<?php
date_default_timezone_set('America/Mexico_City');

$fechaInicialDia = date("Y-m-d"); //Fecha Actual
$SemanaAnterior = date("Y-m-d", strtotime("$fechaInicialDia   -7 day"));

$item = null;
$valor = null;
$orden = "RECORDID";

$gastosfijosxdia = ControladorGastosfijos::ctrSumaTotalDeGastosFijos();


$ventas = ControladorVentas::ctrSumaTotalVentas();

$utilidades = ControladorVentas::ctrSumaTotalUtilidades($fechaInicialDia);
$ventasdia = ControladorVentas::ctrSumaTotalVentasDia($fechaInicialDia);

///////////////////////GASTOS RAPIDOS
$gastosdia = ControladorGastos::ctrSumaTotalGastos($fechaInicialDia);
///////////////////////GASTOS RAPIDOS

//////////////////////DEVOLUCIONES
$devoluciondia = ControladorDevoluciones::ctrSumaTotalDevoluciones($fechaInicialDia);
///////////////////////DEVOLUCIONES

///////////////////////COMPRAS SEMANALES


  $fechaInicialR = $SemanaAnterior;
          $fechaFinalR = $fechaInicialDia;
 $comprasrangos = ControladorFacturas::ctrSumaTotalFacturasRango($fechaInicialR, $fechaFinalR);
?>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-teal">
    
<div class="inner">
    
      <h3>$<?php echo number_format($ventasdia["totalVHOY"],2); ?></h3>
      <p>Cantidad vendida hoy</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-social-usd-outline"></i>
    
    </div>
    
    <a href="ventas" class="small-box-footer">
      
      Ver detalles <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>





<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-green">
     <div class="inner">
       <h3>$<?php echo number_format($utilidades["totalUti"],2); ?></h3>

      <p>Utilidad íntegra del día de hoy</p>
    
    </div>
    
    
    <div class="icon">
    
      <i class="ion  ion-social-usd"></i>
    
    </div>
    
    <a href="reportes-utilidades" class="small-box-footer">
      
      Ver detalles <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>
</div>


<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-red">
  
    <div class="inner">
    
      <h3>$<?php echo number_format($gastosfijosxdia["totalGF"]/30,2); ?></h3>


      <p>Gastos diarios fijos</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-alert"></i>
   
    </div>
    
    <a href="gastosfijos" class="small-box-footer">
      
      Ver detalles <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>



            </div>




<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow">
    
    <div class="inner">
    
       <h3>$<?php echo number_format($utilidades["totalUti"]-$gastosdia["totalGAST"]-$devoluciondia["totalDEV"]-$gastosfijosxdia["totalGF"]/30,2); ?></h3>

      <p>Utilidad total</p>
  
    </div>
    
    <div class="icon">
    
      <i class="ion ion-stats-bars"></i>
    
    </div>
    
    <a href="reportes-utilidades" class="small-box-footer">

      Ver detalles <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>







</div>
  <div class="row">        
    <div class="col-md-3">
          <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Gastos y devoluciones</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                                     <div class="col-lg-5 col-xs-6 box-body">
              <h5>Caja chica hoy</h5>
            <h4>$<?php echo number_format($gastosdia["totalGAST"],2); ?></h4>
                      </div>
            <div class="col-lg-6 col-xs-6 box-body">
              <h5>Devoluciones hoy</h5>
               <h4>$<?php echo number_format($devoluciondia["totalDEV"],2); ?></h4>
               
            </div>  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 


         <div class="col-md-3">
          <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Compras esta semana</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                                     <div class="col-lg-12 col-xs-6 box-body">
           <h5><a href="tablafacturas">Ver reporte facturas</a></h5>
            <h4>$<?php echo number_format($comprasrangos["totalrangoF"],2); ?></h4>
                      </div>
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div> 
