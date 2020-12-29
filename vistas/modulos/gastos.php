
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Caja Chica
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Caja chica</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
   <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarGastos">
          
          Agregar gastos o sueldo

        </button>
      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Autorizó</th>
           <th>Fecha</th>
           <th>Hora</th>
           <th>Cantidad</th>
           <th>Concepto de pago</th>
           <th>Motivo</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $gastos = ControladorGastos::ctrMostrarGastos($item, $valor);

          foreach ($gastos as $key => $value) {
           
            echo ' <tr>

                    <td class="text-uppercase">'.$value["RECORDID"].'</td>
                    <td class="text-uppercase">'.$value["USUARIO"].'</td>
                    <td class="text-uppercase">'.$value["FECHA"].'</td>
                    <td class="text-uppercase">'.$value["HORA"].'</td>
                    <td class="text-uppercase">'.$value["EFECTIVO"].'</td>
                    <td class="text-uppercase">'.$value["TIPOPAG"].'</td>
                    <td class="text-uppercase">'.$value["DESCRIP"].'</td>


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

<div id="modalAgregarGastos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar gastos rápido o sueldo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL AUTORIZADO  -->
            
            <div class="form-group">
              
              <div class="text-info">
              
             <h5 class="modal-title"  id="nuevoAutorizado" name="nuevoAutorizado">Autorizado por: <?php  echo $_SESSION["NOMBRECOMPL"]; ?></h5>
              </div>

            </div>

                        <!-- ENTRADA PARA FECHA -->
            
            <div class="form-group">
              
              <div class="text-info">
              
              
<?php
date_default_timezone_set('America/Mexico_City');

$nuevoFechas = date("Y")."-".date("m")."-".date("d");
?>
             <h5 class="modal-title" id="nuevoFecha" name="nuevoFecha">Fecha: <?php date_default_timezone_set('America/Mexico_City'); echo date("Y")."-".date("m")."-".date("d");?></h5>
              </div>

            </div>

                                    <!-- ENTRADA PARA HORA -->
            
            <div class="form-group">
              
              <div class="text-info">
              
             <h5 class="modal-title" id="nuevoHora"  name="nuevoHora">Hora: <?php date_default_timezone_set('America/Mexico_City'); echo date("G").":".date("i");?></h5>
              </div>

            </div>
  
        

        <!-- ENTRADA PARA EL MONTO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-money"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCantidad" placeholder="Ingrese la cantidad" id="nuevoCantidad" required>

              </div>

            </div>

    <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaConcepto" name="nuevaConcepto">
                  
                  <option value="">Selecionar el concepto</option>
                  .
                  <option value="Sueldo">Sueldo</option>

                  <option value="Pago a proveedor">Pago a proveedor</option>

                  <option value="Insumo">Insumo</option>
                  <option value="Otro">Otro</option>
  
                </select>

              </div>
        </div>


        <!-- ENTRADA PARA EL MONTO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-comment"></i></span> 

               
                  <textarea class="form-control" name="nuevoDescripcion" id="nuevoDescripcion"  placeholder="Describa el concepto" rows="3"></textarea>
              </div>

            </div>




         


        <!--=====================================
        PIE DEL MODAL
        ======================================-->
     </div>

            </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar gasto</button>

        </div>

        <?php

          $crearGastos = new ControladorGastos();
          $crearGastos -> ctrCrearGastos();

        ?>

      </form>

    </div>

  </div>

</div>
