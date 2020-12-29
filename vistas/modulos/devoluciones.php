
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Ver devoluciones
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Devoluciones</li>
    
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
           <th>No. Ticket</th>
           <th>Codigo de barra</th>
           <th>Producto</th>
           <th>Motivo</th>
           <th>Fecha</th>
           <th>Hora</th>
           <th>Precio</th>
           <th>Usuario</th>


         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $devoluciones = ControladorDevoluciones::ctrMostrarDevoluciones($item, $valor);

          foreach ($devoluciones as $key => $value) {
           
            echo ' <tr>

                    <td class="text-uppercase">'.$value["RECORDID"].'</td>
                    <td class="text-uppercase">'.$value["TICKET"].'</td>
                    <td class="text-uppercase">'.$value["IDPRODUCTO"].'</td>
                    <td class="text-uppercase">'.$value["PRODUCTO"].'</td>
                    <td class="text-uppercase">'.$value["MOTIVO"].'</td>
                     <td class="text-uppercase">'.$value["FECHA"].'</td>
                      <td class="text-uppercase">'.$value["HORA"].'</td>
                       <td class="text-uppercase">'.$value["PRECIO"].'</td>
                        <td class="text-uppercase">'.$value["USUARIO"].'</td>


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

