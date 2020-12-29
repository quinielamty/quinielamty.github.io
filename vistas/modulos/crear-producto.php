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
              <h3 class="box-title">Registrar nuevo producto</h3>
            </div>

            <form class="form-horizontal" method="post">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-1">Código*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nuevoCodigoBarra" placeholder="Ingresar codigo de barra" required>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-1">Categoría</label>

                  <div class="col-sm-10">
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

              <div class="form-group">
                  <label class="col-sm-1">Descripción*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nuevoDescripcion" placeholder="Ingresar la descripcion" required>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-1">Stock</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" value="0" name="nuevoStock" min="0" placeholder="Stock" required>
                    <h5 class="modal-dialog-centered">NOTA: Si es un servicio dejar el valor en 0</h5>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-1">Unidad</label>

                  <div class="col-sm-10">
                  <select class="form-control" name="nuevaUnidad">
                 <option value="">Selecionar la unidad</option>
                    
                    <option value="PIEZA">PIEZA</option>
                    <option value="GRAMOS">GRAMOS</option>
                    <option value="KILOGRAMOS">KILOGRAMOS</option>
                   <option value="LITRO">LITRO</option>
                   <option value="GALONES">GALONES</option>
  
                </select>
                 </div>
                </div>

                <div class="form-group" method="post">
                  <label class="col-sm-1">Compra*</label>
                  <div class="col-sm-10">
                     <input type="number" class="form-control" step="0.1" min="0" name="nuevaPrecioCompra" id="nuevaPrecioCompra" placeholder="Precio compra" required>
                  </div>
                </div>

                 <div class="form-group" method="post">
                  <label class="col-sm-1">Venta*</label>
                  <div class="col-sm-10">
                      <input type="number" class="form-control" step="0.1" min="0" name="nuevaPrecioVenta" id="nuevaPrecioVenta" placeholder="Precio venta" required>
                  </div>
                </div>
              
 <div class="form-group" method="post">
                  <label class="col-sm-1">Utilidad</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" step="0.1" min="0" name="nuevaUtilidad"  id="nuevaUtilidad"placeholder="Utilidad" required >
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               <div class="col-sm-11">
                <button type="reset" class="btn btn-default">Cancelar</button>
             
            <button type="submit" class="btn btn-primary  pull-right">Guardar producto</button>
</div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
 <?php

        $crearProducto = new ControladorProductos();
        $crearProducto -> ctrCrearProducto();

      ?>
 </section>
</div>

