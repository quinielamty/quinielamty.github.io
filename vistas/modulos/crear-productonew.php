<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Registro de productos
    
    </h1>


    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Registro de productos</li>
    
    </ol>

  </section>

  <section class="content">


<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar nuevo calzado</h3>


            </div>

            <form class="form-horizontal" method="post">
              <div class="box-body">

        <div class="form-group row">
                <div class="col-xs-3">
                
                  <div class="input-group">
              <label>Código / Modelo</label>
              <input type="text" class="form-control" name="nuevoCodigo" id="nuevoCodigo" placeholder="Código o modelo de calzado">
              </div>
             
            </div>
                  

            
        <!-- ENTRADA PARA SELECCIONAR PROVEEDOR -->
           <div class="col-xs-3"> 
              <div class="input-group">
               <label>Descripción</label>
               <input type="text" class="form-control" name="nuevoDescripcion" id="nuevoDescripcion" placeholder="Descripción de calzado" required>

              </div>

            </div>

                    <!-- ENTRADA PARA SELECCIONAR FECHA -->
           <div class="col-xs-3"> 
              <div class="input-group">
               <label>Categoria</label>

               <select class="form-control" id="nuevaCategoria" name="nuevaCategoria">
                  <option value="">Selecionar categoría</option>
                  <?php
                  $item = null;
                  $valor = null;
                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
                  foreach ($categorias as $key => $value) {
                    echo '<option value="'.$value["FAMILIA"].'">'.$value["FAMILIA"].'</option>';
                  }
                  ?>
                </select>
              </div>
            </div>

             <div class="col-xs-3"> 
              <div class="input-group">
               <label>Precio de compra</label>
               <input type="number" class="form-control" name="nuevoCompra" id="nuevoCompra" placeholder="Precio de compra" required>
              </div>
            </div>
    </div>


<div class="form-group row">
            <!-- ENTRADA PARA SELECCIONAR PROVEEDOR -->
         

            <div class="col-xs-3"> 
              <div class="input-group">
               <label>Precio de venta</label>
               <input type="number" class="form-control" name="nuevoVenta" id="nuevoVenta" placeholder="Precio de venta" required>
              </div>
            </div>

                        <div class="col-xs-3"> 
              <div class="input-group">
               <label>Utilidad</label>
               <input type="number" class="form-control" name="nuevoUtilidad" id="nuevoUtilidad" placeholder="Utilidad" required>
              </div>

            </div>

             <div class="col-xs-3"> 
              <div class="input-group">
               <label>Imagen</label>
              <input type="file" class="nuevaImagen" name="editarImagen">
              <p class="help-block">Peso máximo de la imagen 2MB</p>
              <input type="hidden" name="imagenActual" id="imagenActual">
              </div>
            </div>

<div class="col-xs-3"> 
              <div class="input-group">
             
                            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              </div>

            </div>
 </div>


   <div class="form-group row">  
                <div class="col-xs-2">
                  <div class="input-group">
              <label>Número #</label>
                 </div>
                </div>
                  

            
        <!-- ENTRADA PARA SELECCIONAR PROVEEDOR -->
           <div class="col-xs-2"> 
              <div class="input-group">
               <label>Cantidad</label>
             

              </div>

            </div>

                    <!-- ENTRADA PARA SELECCIONAR FECHA -->
           <div class="col-xs-3"> 
              <div class="input-group">
               <label>Sucursal</label>
                 </div>

            </div>

                       <div class="col-xs-2"> 
              <div class="input-group">
               <label>Stock Actual</label>
                 </div>
            </div>

                                   
                      

    </div>





 <form role="form" method="post" class="formularioVentaF" id="formularioVentaF">

<div class="form-group row nuevoProductoF"></div>
 <input type="hidden" id="listaProductosF" name="listaProductosF">



     
              <!-- /.box-body -->
              <div class="box-footer">

 

                      <div class="col-sm-11">
                       
            <button type="submit" class="btn btn-primary  btnGuardarFactura pull-right">Guardar producto</button>
                      </div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div></div>
</form>
        <button class="btn btn-default btnAgregarCalzado"> Agregar producto</button>
 <?php

        $crearFactura = new ControladorFacturas();
        $crearFactura -> ctrCrearFacturas();

      ?>
 </section>
</div>

