<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Registro de clientes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Registro de clientes</li>
    
    </ol>

  </section>

  <section class="content">


<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar nuevo cliente</h3>
            </div>

            <form class="form-horizontal" method="post">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-1">Número de teléfono*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nuevoTelefono" placeholder="Ingresar teléfono de contacto" required>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-1">Nombre*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nuevoNombre" placeholder="Ingresar nombre" required>
                  </div>
                </div>

              <div class="form-group">
                  <label class="col-sm-1">Dirección*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nuevoDireccion" placeholder="Ingresar la dirección" required>
                  </div>
                </div>

                  <div class="form-group">
                  <label class="col-sm-1">E-Mail</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="nuevoMail"  placeholder="Ingresar el correo electrónico">
                    
                  </div>
                </div>


              <!-- /.box-body -->
              <div class="box-footer">
               <div class="col-sm-11">
                <button type="reset" class="btn btn-default">Cancelar</button>
             
            <button type="submit" class="btn btn-primary btn-lg  pull-right">Guardar producto</button>
</div>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
 <?php

        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();

      ?>
 </section>
</div>

