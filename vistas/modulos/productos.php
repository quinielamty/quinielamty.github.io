
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar productos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar productos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
     <h3 class="box-title">Ver tabla de productos</h3>

      <div class="box-header with-border">
  <a href="crear-producto">
        <button class="btn btn-primary">
          Agregar producto
         

        </button>
</a>
      </div>
      </div>

      <div class="box-body">
         
       <table class="table table-sm table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead >
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Categoria</th>
           <th>Codigo de Barra</th>
           <th>Descripcion</th>
           <th>Utilidad</th>
           <th>Stock</th>
           <th>Precio de compra</th> 
           <th>Precio de venta</th>
           <th>Unidad</th>
           <th>Ventas</th>
           <th>Fecha de ingreso</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;
          $orden = "RECORDID";

          $clientes = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

          foreach ($clientes as $key => $value) {
            

            echo '<tr>

                   <td>'.$value["RECORDID"].'</td>

                    <td>'.$value["id_categoria"].'</td>

                    <td>'.$value["codigo"].'</td>

                    <td>'.$value["descripcion"].'</td>

                    <td>'.$value["utilidad"].'</td>

                    <td>'.$value["stock"].'</td>

                    <td>'.$value["precio_compra"].'</td>             

                    <td>'.$value["precio_venta"].'</td>

                    <td>'.$value["unidad"].'</td>

                    <td>'.$value["ventas"].'</td>
                    <td>'.$value["fecha"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-success btnEditarProducto" idProducto="'.$value[
                        "RECORDID"].'"  data-toggle="modal" data-target="#modalEditarProducto"><i class="fa fa-plus"></i></button>
 


                          <button class="btn btn-danger btnEliminarProducto" idProducto="'.$value[
                        "RECORDID"].'"><i class ="fa fa-trash"></i></button>


                      </div>  

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
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Actualizar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL CODIGO DE BARRA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 

                <input type="text" class="form-control input-lg" id="editarCodigoBarra" name="editarCodigoBarra" readonly required>
                <input type="hidden" name="idProducto" id="idProducto" required>
                <input type="hidden" name="NoVentas" id="NoVentas" required>

              </div>

            </div>

              <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

               <input type="text" class="form-control input-lg" id="editarCategoria" name="editarCategoria" required>

              </div>

            </div>



            <!-- ENTRADA PARA EL DESCRIPCION -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion"  required>

              </div>

            </div>


             <!-- ENTRADA PARA STOCK -->

                         <div class="form-group row">

                <div class="col-xs-6">
                
                  <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                <input type="number" class="form-control input-lg" value="0" name="editarStock" id="editarStock" required>
              </div>
              <h5 class="modal-dialog-centered">NOTA: Actualizar con el valor actual</h5>
<h6 class="modal-dialog-centered">Si es un servicio dejar el valor en 0</h6>
            </div>
                  

            
        <!-- ENTRADA PARA SELECCIONAR UNIDAD -->

           <div class="col-xs-6">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

               <input type="text" class="form-control input-lg" id="editarUnidad" name="editarUnidad"  required>


              </div>

            </div>
    </div>


            <!-- ENTRADA PARA PRECIO DE COMPRA -->
            

                         <div class="form-group row">

                <div class="col-xs-6">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-money"></i></span> 

                <input type="number" class="form-control input-lg" step="0.1" min="0" name="editarPrecioCompra" id="editarPrecioCompra" required>

              </div>

            </div>
        <!-- ENTRADA PARA PRECIO DE VENTA -->

           <div class="col-xs-6">
              
               <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-money"></i></span> 

                <input type="number" class="form-control input-lg" step="0.1" min="0" name="editarPrecioVenta" id="editarPrecioVenta" required>
</div>  

      </div>
                  </div>
           

             <!-- ENTRADA PARA LA FECHA DE INGRESO -->
             <div class="form-group row">

             <div class="col-xs-6">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaIngreso"  id="editarFechaIngreso"data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>
  
        <!-- ENTRADA PARA UTILIDAD -->

           <div class="col-xs-6">
              
               <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-money"></i></span> 

                <input type="number" class="form-control input-lg" step="0.1" min="0" name="editarUtilidad" id="editarUtilidad" required >

            </div>
                  </div>

                  </div>

  </div>
 </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Actualizar cambios</button>

        </div>

        <?php

          $editarProducto = new ControladorProductos();
          $editarProducto -> ctrEditarProducto();

        ?>

      </form>

    </div>

  </div>

</div>



<?php

  $borrarProducto = new ControladorProductos();
  $borrarProducto -> ctrBorrarProducto();

?>