
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Ver facturas anteriores
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tabla facturas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
         <button type="button" class="btn btn-default pull-left" id="daterangeF-btn">
           
            <span>
              <i class="fa fa-calendar"></i> Rango de fecha
            </span>

            <i class="fa fa-caret-down"></i>

         </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Folio</th>
           <th>Fecha de compra</th>
    
           <th>Proveedor</th>
           <th>Cantidad</th>
           <th>Descripción</th>
            <th>Unidad</th> 
            <th>Precio unitario</th>
           <th>Precio de compra</th>
           <th>Total de factura</th>


         </tr> 

        </thead>

        <tbody>

        <?php



        if(isset($_GET["fechaInicial"])){

          $fechaInicial = $_GET["fechaInicial"];
          $fechaFinal = $_GET["fechaFinal"];
        }else{

          $fechaInicial = null;
          $fechaFinal = null;
        }


      $compras = ControladorFacturas::ctrRangoFechasFacturas($fechaInicial, $fechaFinal);

          foreach ($compras as $key => $value) {
           
            echo ' <tr>

                    <td class="text-uppercase">'.$value["RECORDID"].'</td>
                    <td class="text-uppercase">'.$value["FOLIO"].'</td>
                    <td class="text-uppercase">'.$value["FECHA"].'</td>
                  
                    <td class="text-uppercase">'.$value["PROVEEDOR"].'</td>
                     <td class="text-uppercase">'.$value["CANTIDAD"].'</td>
                      <td class="text-uppercase">'.$value["DESCRIPCION"].'</td>
                       <td class="text-uppercase">'.$value["UNIDAD"].'</td>
                        <td class="text-uppercase">'.$value["PRECIOUNITARIO"].'</td>
                         <td class="text-uppercase">'.$value["PRECIOCOMPRA"].'</td>
                          <td class="text-uppercase">'.$value["COMPRATOTAL"].'</td>

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>
  <?php




     if(isset($_GET["fechaInicial"])){

          $fechaInicialR = $_GET["fechaInicial"];
          $fechaFinalR = $_GET["fechaFinal"];
        }else{

          $fechaInicialR = null;
          $fechaFinalR = null;
        }

        $comprasrangos = ControladorFacturas::ctrSumaTotalFacturasRango($fechaInicialR, $fechaFinalR);
?>
     
             <h4>Compras totales: $<?php echo number_format($comprasrangos["totalrangoF"],2); ?></h4>
      </div>

    </div>

  </section>

</div>

