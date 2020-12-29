 <?php
                    $item = null;
                    $valor = null;
                   
                    $ultimoAbrir = ControladorAbrircaja::ctrMostrarEstatusUltimoCorte();
                       $estatuscaja = $ultimoAbrir["CajaAbierta"];
if ($estatuscaja =="NO"){

echo'<script>


             swal({
               type: "warning",
  title: "La caja aún no ha sido abierta",
  text: "Por favor seleccione un monto para abrir caja.",}).then(function(result){
                  if (result.value) {
                  window.location = "abrircaja";
                  }
                })

          </script>';

                  }


                    ?>


    <div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Realizar Corte de Caja
    
    </h1>

<h4><a href="cerrarcaja">Haga clic aquí</a> para ver el registro de cortes de caja anteriores</h4>
    

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Corte de Caja</li>
    
    </ol>

  </section>

     <?php
   $ultimocorte = ControladorAbrircaja::ctrMostrarUltimoCorte();


          $fechaInicialR = $ultimocorte["UltimoCorte"];

          $fechaFinalR = null;
    

        $ventasrango = ControladorVentas::ctrSumaTotalVentasRango($fechaInicialR, $fechaFinalR);
        $utilidadrango = ControladorVentas::ctrSumaTotalUtilidadRango($fechaInicialR, $fechaFinalR);
         $efectivorango = ControladorVentas::ctrSumaTotalEfectivoRango($fechaInicialR, $fechaFinalR);
          $tarjetarango = ControladorVentas::ctrSumaTotalTarjetaRango($fechaInicialR, $fechaFinalR);
        $gastosfijosxdia = ControladorGastosfijos::ctrSumaTotalDeGastosFijos();
        $seabriocon = ControladorAbrircaja::ctrMostrarSeAbrioCaja($fechaInicialR, $fechaFinalR); 
        $gastosrango = ControladorGastos::ctrSumaTotalGastosRango($fechaInicialR);
         $devolucionesrango = ControladorDevoluciones::ctrSumaTotalDevolucionesRango($fechaInicialR);

$encaja =   $efectivorango["totalrangoEfectivo"] + $seabriocon["ABRIR"] - $gastosrango["totalrangoGastos"];



?>
 <section class="content">
  
    <div class="row">

  <section class="content">
    <div class="col-md-3">
            <div class="box">
            <div class="box-header">
              <h4 class="box-title">Resultados de corte</h4> <h5><?php echo ($ultimocorte["UltimoCorte"]); ?></h5>
               
            </div>

              
            <!-- /.box-header -->
            <div class="box-body" padding="50">
              <table class="table table-striped" width="50%">

                <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 15px">Concepto</th>
                  <th style="width: 15px">Cantidad</th>
                </tr>
                <tr>

                  <td>1.</td>
                  <td>Apertura de caja</td>
                  <td>
             
   $ <?php echo number_format($seabriocon["ABRIR"],2); ?>
                  </td>
               
                </tr>
                <tr>
                 <td><p class="text-red">2.</p></td>
                  <td> <p class="text-red">Gastos</p></td>
                  <td>
   <p class="text-red"> $ <?php echo number_format($gastosrango["totalrangoGastos"],2); ?></p></td>  
                 
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Pago en efectivo</td>
                  <td>
   $ <?php echo number_format($efectivorango["totalrangoEfectivo"],2); ?>
                  </td>
                 
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Pago con tarjeta</td>
                  <td>
   $ <?php echo number_format($tarjetarango["totalrangoTarjeta"],2); ?>
                  </td>
                 
                </tr>

                 <tr>
                  <td>5.</td>
                  <td>Devoluciones</td>
                  <td>
   $ <?php echo number_format($devolucionesrango["totalrangoDevoluciones"],2); ?>
                  </td>
                 
                </tr>
                                <tr>
                  <td>6.</td>
                  <td>Gastos fijos diarios</td>
                  <td>
   $<?php echo number_format($gastosfijosxdia["totalGF"]/30,2); ?>
                  </td>
                 
                </tr>
                                <tr>
                  <td>7.</td>
                  <td>Utilidad</td>
                  <td>
  $ <?php echo number_format($utilidadrango["totalrangoUtilidad"],2); ?>
                  </td>
                 
                </tr>
                                <tr>
                  <td><p class="text-green">8.</p></td>
                  <td><p class="text-green"> Venta total</p></td>
                  <td><p class="text-green"> $ <?php echo number_format($ventasrango["totalrango"],2); ?></p> </td>
                 
                </tr>
                  <tr>
                 <td><dt><p class="text-black">9.</p></dt></td>
                  <td><dt><p class="text-black"> En caja</p></dt></td>
   <td><dt><p class="text-black"> $ <?php echo number_format($encaja,2); ?></p></dt></td>
                 
                </tr>
              </table>

                <form class="form-horizontal" method="post">
<br>

  <?php
  echo '<input type="hidden" class="form-control"  id="nuevoAbrirr" name="nuevoAbrirr" value="'.$seabriocon["ABRIR"].'" >'; 
  echo '<input type="hidden" class="form-control" placeholder="0" id="nuevoGastos" name="nuevoGastos" value="'.$gastosrango["totalrangoGastos"].'" >'; 
  echo '<input type="hidden" class="form-control"  id="nuevoEfectivo" name="nuevoEfectivo" value="'.$efectivorango["totalrangoEfectivo"].'" >'; 
  echo '<input type="hidden" class="form-control"  id="nuevoTarjeta" name="nuevoTarjeta" value="'.$tarjetarango["totalrangoTarjeta"].'" >'; 
  echo '<input type="hidden" class="form-control"  id="nuevoDevoluciones" name="nuevoDevoluciones" value="'.$devolucionesrango["totalrangoDevoluciones"].'" >'; 

    echo '<input type="hidden" class="form-control"  id="nuevoUtilidad" name="nuevoUtilidad" value="'.$utilidadrango["totalrangoUtilidad"].'" >'; 

        echo '<input type="hidden" class="form-control"  id="nuevoTotal" name="nuevoTotal" value="'.$ventasrango["totalrango"].'" >'; 

        echo '<input type="hidden" class="form-control"  id="nuevoEncaja" name="nuevoEncaja" value="'.$encaja.'" >'; 
        echo '<input type="hidden" class="form-control"  id="nuevoFechaC" name="nuevoFechaC" value="'.$ultimocorte["UltimoCorte"].'" >';


  ?>







  <button type="submit" class="btn btn-primary btn-lg btn-block">Cerrar caja</button>

              
            </div>
             </form>
                    <?php

          $cerrarcajanuevo = new ControladorCerrarcaja();
          $cerrarcajanuevo -> ctrCrearCorte();
        ?>
            <!-- /.box-body -->
          </div>
 </div>
 <div class="col-md-9">
  <div class="box">
      <div class="box-header">
              <h3 class="box-title">Información de las ventas</h3>
            </div>
              <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>No. Ticket</th>
           <th>Cliente</th>
           <th>Vendedor</th>
           <th>C. Barra</th>
           <th>Producto</th>
           <th>Impuesto</th> 
           <th>Descuento</th>
           <th>Precio</th>
           <th>Total</th>
           <th>Metodo</th>
           <th>Fecha</th>
          <th>Utilidad</th>
         

         </tr> 

        </thead>

        <tbody>

        <?php
        $fechaInicial = $ultimocorte["UltimoCorte"];
          $fechaFinal = null;
          $ventas = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

            foreach ($ventas as $key => $value) {
            

            echo '<tr>

                    <td>'.$value["RECORDID"].'</td>
                    <td>'.$value["IDVENTA"].'</td>
                    <td>'.$value["CLIENTE"].'</td>
                    <td>'.$value["VENDEDOR"].'</td>
                    <td>'.$value["CODIGOB"].'</td>
                    <td>'.$value["PRODUCTO"].'</td>
                    <td>'.number_format($value["IMPUESTO"],2).'</td>             
                    <td>'.number_format($value["DESCUENTO"],2).'</td>
                    <td>'.number_format($value["PRECIO"],2).'</td>
                    <td>'.number_format($value["TOTAL"],2).'</td>
                    <td>'.$value["METODO"].'</td>
                    <td>'.$value["FECHA"].'</td>
                    <td>'.$value["HORA"].'</td>

                  </tr>';
            }

        ?>
   
        </tbody>

       </table>
              </div>
  </div>
</div>
</section>
</div></section>
</div>