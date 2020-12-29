
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar ventas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar ventas</li>
    
    </ol>
 <section class="content">

    <div class="row">
 

    <div class="box">

      <div class="box-header with-border">


         <button type="button" class="btn btn-default pull-left" id="daterange-btn">
           
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


        if(isset($_GET["fechaInicial"])){

          $fechaInicial = $_GET["fechaInicial"];
          $fechaFinal = $_GET["fechaFinal"];
        }else{

          $fechaInicial = null;
          $fechaFinal = null;
        }


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

       <?php



     if(isset($_GET["fechaInicial"])){

          $fechaInicialR = $_GET["fechaInicial"];
          $fechaFinalR = $_GET["fechaFinal"];
        }else{

          $fechaInicialR = null;
          $fechaFinalR = null;
        }

        $ventasrango = ControladorVentas::ctrSumaTotalVentasRango($fechaInicialR, $fechaFinalR);
?>
     
             <h4>Ventas totales: $<?php echo number_format($ventasrango["totalrango"],2); ?></h4>

      </div>
        
    </div>

  </section>

</div>
</section>
</div>


