
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Ver cierres de caja
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tabla de caja</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Usuario</th>
           <th>Fecha de apertura</th>
    
           <th>Se abrió caja</th>
           <th>Gastos rápidos</th>
           <th>Pago con efectivo</th>
           <th>Pago con tarjeta</th>
           <th>Devoluciones</th>
           <th>Venta total</th>
           <th>En caja</th>
           <th>Fecha de corte</th>
        
           <th>Utilidad</th>
          

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $cerrarcaja = ControladorCerrarcaja::ctrMostrarCerrarcaja($item, $valor);

          foreach ($cerrarcaja as $key => $value) {
           
            echo ' <tr>

                    <td class="text-uppercase">'.$value["RECORDID"].'</td>
                    <td class="text-uppercase">'.$value["USUARIO"].'</td>
                    <td class="text-uppercase">'.$value["FECHA"].'</td>
                  
                    <td class="text-uppercase">'.$value["APERTURACAJA"].'</td>
                     <td class="text-uppercase">'.$value["GASTOS"].'</td>
                      <td class="text-uppercase">'.$value["EFECTIVO"].'</td>
                       <td class="text-uppercase">'.$value["TARJETA"].'</td>
                        <td class="text-uppercase">'.$value["DEVOLUCIONES"].'</td>
                         <td class="text-uppercase">'.$value["VENTATOTAL"].'</td>
                          <td class="text-uppercase">'.$value["ENCAJA"].'</td>
                           <td class="text-uppercase">'.$value["FECHADC"].'</td>
                 
                              <td class="text-uppercase">'.$value["UTILIDAD"].'</td>

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

