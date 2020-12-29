<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Registro de compras
    
    </h1>

<h4><a href="tablafacturas">Ver facturas anteriores</a></h4>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Registro de compras</li>
    
    </ol>

  </section>

  <section class="content">


<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar nueva compras</h3>


            </div>

            <form class="form-horizontal" method="post">
              <div class="box-body">

        <div class="form-group row">
                <div class="col-xs-4">
                
                  <div class="input-group">
              <label>Folio</label>
              <input type="text" class="form-control" name="nuevoFolio" id="nuevoFolio" placeholder="Ingresar folio">
              </div>
             
            </div>
                  

            
        <!-- ENTRADA PARA SELECCIONAR PROVEEDOR -->
           <div class="col-xs-4"> 
              <div class="input-group">
               <label>Proveedor*</label>
               <input type="text" class="form-control" name="nuevoProveedor" id="nuevoProveedor" placeholder="Ingresar proveedor" required>

              </div>

            </div>

                    <!-- ENTRADA PARA SELECCIONAR FECHA -->
           <div class="col-xs-4"> 
              <div class="input-group">
               <label>Fecha de registro*</label>

                <input type="text" class="form-control" name="nuevoFecha" placeholder="Ingresar fecha"  id="editarnuevoFecha"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask required>

             
              </div>

            </div>

    </div>


    <br>
     <div class="form-group row">
                <div class="col-xs-1">
                
                  <div class="input-group">
              <label>Cantidad</label>
            
              </div>
             
            </div>
                  

            
        <!-- ENTRADA PARA SELECCIONAR PROVEEDOR -->
           <div class="col-xs-3"> 
              <div class="input-group">
               <label>Descripción</label>
             

              </div>

            </div>

                    <!-- ENTRADA PARA SELECCIONAR FECHA -->
           <div class="col-xs-2"> 
              <div class="input-group">
               <label>Unidad</label>
                 </div>

            </div>

                       <div class="col-xs-2"> 
              <div class="input-group">
               <label>Precio Unitario</label>
                 </div>
            </div>

                                   <div class="col-xs-2"> 
              <div class="input-group">
               <label>Precio Compra</label>
                 </div>
            </div>
                       <div class="col-xs-1"> 
              <div class="input-group">
               <label>Eliminar</label>
                 </div>
            </div>

    </div>





 <form role="form" method="post" class="formularioVentaF" id="formularioVentaF">

<div class="form-group row nuevoProductoF"></div>
 <input type="hidden" id="listaProductosF" name="listaProductosF">



     
            <div class="col-xs-2">
             
              <div class="input-group" method="post">
               <label>Total de la compra</label>
 <input type="number"  class="form-control nuevototal" name="nuevototal" id="nuevototal" required readonly>   

                 </div>
      
                    </div>      


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
        <button class="btn btn-default btnAgregarFactura"> Agregar producto</button>
 <?php

        $crearFactura = new ControladorFacturas();
        $crearFactura -> ctrCrearFacturas();

      ?>
 </section>
</div>

