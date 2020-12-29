

    <div class="box">



      <div class="box-body">
        
 <table class="table table-sm table-bordered table-striped dt-responsive tablas " width="100%" cellspacing="0">
         
        <thead>
         
         <tr>
           
          
           <th>No. Ticket</th>
           <th>Vendedor</th>
           <th>Producto</th>
           <th>Precio</th>
           <th>Metodo</th>
           <th>Fecha</th>
         

         </tr> 

        </thead>

        <tbody>

        <?php


$fechaInicialDia = date("Y")."-".date("m")."-".date("d");
$fechaAyerI = date("d")-1;
$fechaInicialAyer = date("Y")."-".date("m")."-".$fechaAyerI;


          $fechaInicial = $fechaInicialAyer;
          $fechaFinal = $fechaInicialDia;


          $ventas = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

            foreach ($ventas as $key => $value) {
            

            echo '<tr>

                    <td>'.$value["IDVENTA"].'</td>                
                    <td>'.$value["VENDEDOR"].'</td>                  
                    <td>'.$value["PRODUCTO"].'</td>              
                    <td>'.number_format($value["PRECIO"],2).'</td>
                    <td>'.$value["METODO"].'</td>
                    <td>'.$value["FECHA"].'</td>

                  </tr>';
            }

        ?>
   
        </tbody>

       </table>


      </div>

</div>




