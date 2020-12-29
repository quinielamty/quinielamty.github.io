<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /><!-- Etiqueta para adaptar a @media -->
  <LINK REL="stylesheet" TYPE="text/css" HREF="estiloscalculadora.css"><!-- Enlace hoja estilos -->
</head>




<div class="content-wrapper">

  <section class="content-header">
    
<div class="container">
    
    <div class="row">
        <div class="col-md-6">
            <form name="calculator">
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab">Productos</a></li>
                            <li><a href="#tab2primary" data-toggle="tab">Opciones pago</a></li>
                            <li><a href="#tab3primary" data-toggle="tab">Cobro</a></li>
                 </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">
 
   <table class="table table-sm table-bordered table-striped dt-responsive tablaVentas">
              
               <thead>

                 <tr>
                 <th>Descripcion</th>
                 <th>Precio de venta</th>
                 <th style="width:10px">#</th>
                 </tr>

              </thead>

            </table>
     

                        </div>


<div class="tab-pane fade" id="tab2primary">


  <section class="content">


          <form role="form" method="post" class="formularioVenta">


                <!--=====================================
                ENTRADA DEL VENDEDOR
                ======================================-->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    
                    <input type="hidden" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["NOMBRECOMPL"]; ?>" readonly>

  <h5>Atendido por <?php echo $_SESSION["NOMBRECOMPL"]; ?></h5>


                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["ID"]; ?>">

                  </div>

                </div> 

                <!--=====================================
                ENTRADA DEL CÓDIGO
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    
                    <?php

                    $item = null;
                    $valor = null;

                    $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                    if(!$ventas){   
                    echo '<input type="hidden" class="form-control" id="nuevaVenta" name="nuevaVenta" value="1" >';  

                    }else{
                      foreach ($ventas as $key => $value) {       
                      }
                      $codigo = $value["IDVENTA"] + 1;
                  
                      echo '<input type="hidden" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" >';     
                    }

                    ?>
                      <h6>Numero de Ticket: <?php echo $codigo; ?></h6>
                    
                  </div>
                
                </div>

                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="NA">NA</option>
                    </select>
                  
                  
                  </div>
                
                </div>
                <!--=====================================
                ENTRADA MÉTODO DE PAGO
                ======================================-->
                <div class="form-group">
                  
                  <div class="input-group">
                  
                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value="">Seleccione método de pago</option>
                        <option value="Efectivo">Efectivo</option>
                        <option value="TC">Tarjeta Crédito</option>
                        <option value="TD">Tarjeta Débito</option>                  
                      </select>    

                    </div>

                  </div>

                  <div class="cajasMetodoPago"></div>

                  <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

       
                <!--=====================================
                ENTRADA PARA AGREGAR PRODUCTO
                ======================================--> 

                <div class="form-group row nuevoProducto">

                

                </div>

                <input type="hidden" id="listaProductos" name="listaProductos">

                <div class="row">

                  <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->
                  
                  <div class="col-xs-12">
                    
                    <table class="table">

                      <thead>

                        <tr>
                          <th>Impuesto</th>
                          <th>Total</th>      
                        </tr>

                      </thead>

                      <tbody>
                      
                        <tr>
                          
                          <td style="width: 50%">
                            
                            <div class="input-group">
                           
                              <input type="number" class="form-control input-lg" value="0" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>

                               <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto">

                               <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto">

                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                        
                            </div>

                          </td>

                           <td style="width: 50%">
                            
                            <div class="input-group">
                           
                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>

                              <input type="hidden" name="totalVenta" id="totalVenta">
                              
                        
                            </div>






                          </td>

                        </tr>

                      </tbody>

                    </table>

                  </div>

                </div>

                <hr>

              </div>

          


                         <div class="tab-pane fade" id="tab3primary">


       <h3>Pagar en caja</h3>

       <div class="col-xs-4">
 <h5>Total a pagar: $ </h5>
  </div> 

      <div class="col-xs-12 text-right  pull-right">
        <input type="text" sclass="form-control" id="totalVenta2" name="totalVenta2" total="" placeholder="00000" readonly required>
             </div> 

      


     <form name="calculator" class="calc">
       <div class="col-xs-12">
      <input type="textfield1" class="styled" id= "ans" name="ans" value="">
      <br>
</div> 
       <div class="col-xs-4">
      <button type="button1" class="btn-block" value="1" onClick="document.calculator.ans.value+='1'">1
     </button>
</div> 

 <div class="col-xs-4">
 <button type="button1" class="btn-block" value="2" onClick="document.calculator.ans.value+='2'">2
     </button>
</div> 

 <div class="col-xs-4">
      <button type="button1" class="btn-block"  value="3" onClick="document.calculator.ans.value+='3'">3
     </button>

</div>

 
      <div class="col-xs-4">
      <button type="button1" class="btn-block"  value="4" onClick="document.calculator.ans.value+='4'">4</button>
      </div>
       <div class="col-xs-4">
         <button type="button1" class="btn-block"  value="5" onClick="document.calculator.ans.value+='5'">5</button>
</div>
      <div class="col-xs-4">
              <button type="button1" class="btn-block" value="6" onClick="document.calculator.ans.value+='6'">6</button>
               
</div>
     
    
    
      <div class="col-xs-4">
               <button type="button1" class="btn-block" value="7" onClick="document.calculator.ans.value+='7'">7</button>
</div>

      <div class="col-xs-4">
               <button type="button1" class="btn-block"  value="8" onClick="document.calculator.ans.value+='8'">8</button>
</div>

   <div class="col-xs-4">
              <button type="button1" class="btn-block" value="9" onClick="document.calculator.ans.value+='9'">9</button>
               
</div>


<div class="col-xs-4">
           <button type="button1" class="btn-block"  value="C" name="clear" onclick="document.calculator.ans.value=''">C</button>
</div>
      <div class="col-xs-4">
                <button type="button1" class="btn-block"  value="0" onClick="document.calculator.ans.value+='0'">0</button>
</div>
      <div class="col-xs-4">
               <button type="button1" class="btn-block"  value="." onClick="document.calculator.ans.value+='.'">.</button>  <br>
</div>

     
     
     
   <div class="box-footer">

            <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>

          </div>

        </form>

        <?php

          $crearventa = new ControladorVentas();
          $crearventa -> ctrCrearVenta();
          
        ?>


          </div>


</div>


                    </div>
 <br>
                </div>  
            </div>
        </div>
  </div>

    </form>


</section>


</div>