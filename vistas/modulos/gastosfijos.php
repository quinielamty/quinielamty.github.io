<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
          Gestionar gastos fijos    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Gastos fijos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarGastosfijos">
          
          Agregar gastos fijos

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Concepto</th>
           <th>Gasto</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $gastosfijos = ControladorGastosfijos::ctrMostrarGastosfijos($item, $valor);

          foreach ($gastosfijos as $key => $value) {
           
            echo ' <tr>

                    <td class="text-uppercase">'.$value["RECORDID"].'</td>
                    <td class="text-uppercase">'.$value["concepto"].'</td>
                    <td class="text-uppercase">'.$value["cantidad"].'</td>

                    <td>

                      <div class="btn-group">
                          
                      <button class="btn btn-warning btnEditarGastosfijos" idGastosfijos="'.$value[
                        "RECORDID"].'" data-toggle="modal" data-target="#modalEditarGastosfijos"><i class ="fa fa-pencil"></i></button>

                     
                        <button class="btn btn-danger btnEliminarGastosfijos" idGastosfijos="'.$value[
                        "RECORDID"].'"><i class ="fa fa-trash"></i></button>

                         
                       

                      </div>  

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>

        <?php

            $gastosfijosxdia = ControladorGastosfijos::ctrSumaTotalDeGastosFijos();

        ?>
            <h5 class="modal-title">Tus gastos totales al día son de: $<?php echo number_format($gastosfijosxdia["totalGF"]/30,2); ?>. MXN</h5>


      </div>
        
    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarGastosfijos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar gasto fijo por mes</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL GASTO FIJO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoGastofijo" placeholder="Ingresar concepto de gasto" required>
              </div>

            </div>
  
        

        <!-- ENTRADA PARA EL MONTO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-money"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCantidad" placeholder="Ingrese la cantidad por mes" id="nuevoCantidad" required>

              </div>

            </div>

              </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar gasto fijo</button>

        </div>

        <?php

          $crearGastosfijos = new ControladorGastosfijos();
          $crearGastosfijos -> ctrCrearGastosfijos();

        ?>

      </form>

    </div>

  </div>

</div>




<!--=====================================
MODAL AGREGAR EDITAr
======================================-->

<div id="modalEditarGastosfijos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar gasto fijo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarGastofijo" id="editarGastofijo" required>
                <input type="hidden" name="idGastosfijos" id="idGastosfijos" required>
              </div>

            </div>
  
        

        <!-- ENTRADA PARA EL FAVORITO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-money"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCantidad" id="editarCantidad" required>

              </div>

            </div>

              </div>
        </div>
        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

        <?php

          $editarGastofijo = new ControladorGastosfijos();
          $editarGastofijo -> ctrEditarGastosfijos();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

  $borrarGastosfijos = new ControladorGastosfijos();
  $borrarGastosfijos -> ctrBorrarGastosfijos();

?>


