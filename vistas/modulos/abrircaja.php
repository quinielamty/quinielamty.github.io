<?php

if($_SESSION["TIPOCUENTA"] == "Vendedor"){

  echo '<script>

    window.location = "permisos";

  </script>';
header('Location: permisos.php');
  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Ver apertura de caja
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Apertura de caja</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
     <button class="btn btn-primary" data-toggle="modal" data-target="#modalAbrirCaja">
          
          Abrir caja

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Usuario</th>
           <th>Fecha</th>
           <th>Hora</th>
           <th>Se abrió con</th>
          

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $abrircaja = ControladorAbrircaja::ctrMostrarAbrircaja($item, $valor);

          foreach ($abrircaja as $key => $value) {
           
            echo ' <tr>

                    <td class="text-uppercase">'.$value["RECORDID"].'</td>
                    <td class="text-uppercase">'.$value["USUARIO"].'</td>
                    <td class="text-uppercase">'.$value["FECHA"].'</td>
                    <td class="text-uppercase">'.$value["HORA"].'</td>
                    <td class="text-uppercase">'.$value["EFECTIVO"].'</td>


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


<!--=====================================
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAbrirCaja" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Abrir caja</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-money"></i></span> 

                <input type="number" class="form-control input-lg" name="nuevoAbrir" placeholder="Ingresar cantidad" required>
              </div>

            </div>
  
      
              </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Abrir Caja</button>

        </div>

        <?php

          $abrircajanuevo = new ControladorAbrircaja();
          $abrircajanuevo -> ctrCrearCaja();

        ?>

      </form>

    </div>

  </div>

</div>

