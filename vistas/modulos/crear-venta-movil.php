<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /><!-- Etiqueta para adaptar a @media -->
  <LINK REL="stylesheet" TYPE="text/css" HREF="estiloscalculadora.css"><!-- Enlace hoja estilos -->
   <link href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1557232134/toasty.css" rel="stylesheet" />
<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1557232134/toasty.js"></script>
</head>

 <?php
                    $item = null;
                    $valor = null;
                   
                    $ultimoAbrir = ControladorAbrircaja::ctrMostrarEstatusUltimoCorte();
                       
                       $estatuscaja = $ultimoAbrir["CajaAbierta"];
                  

if ($estatuscaja =="NO"){

echo'<script>


             swal({
               type: "warning",
  title: "La caja aún no ha sido abierta",
  text: "Por favor seleccione un monto para abrir caja.",}).then(function(result){
                  if (result.value) {
                  window.location = "abrircaja";
                  }
                })

          </script>';

                  }


                    ?>



<div class="content-wrapper">

  <section class="content-header">
    
 <section class="content">



    <div class="row">
<div class="col-md-9">
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs" id="nav">
                            <li class="active"><a href="#tab1primary" data-toggle="tab"><i class="fa fa-shopping-basket"></i></a></li>
                            <li><a href="#tab2primary" data-toggle="tab"><i class="fa fa-usd"></i></a></li>

                            <li><a href="#tab3primary" data-toggle="tab"><i class="fa fa-credit-card"></i></a></li>
                        </ul>
                </div>




<div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">
                          
  <div class="box-body table-responsive no-padding tablasapp">

   <table class="table table-sm table-bordered table-striped dt-responsive tablaVentas">


               <thead>

                 <tr>
                 <th style="width:20px">Descripcion</th>
                 <th style="width:15px">Venta</th>
                 <th style="width:5px">#</th>
                 </tr>

              </thead>

            </table>
     

                        </div>
      </div>

<!--=================TAB 2====================-->
 <div class="tab-pane fade" id="tab2primary">
<!--======================================--> 

      <div class="col-xs-12 text-right  pull-right">
        <input type="hidden" sclass="form-control" id="totalVenta2" name="totalVenta2" total="" placeholder="00000" readonly required>
        <h2 id="totalVenta22"></h2>
             </div> 
             <br>
         <br>    
     <form name="calculator" class="calc">
       <div class="col-xs-12">
   
       


   <input type="text" style="text-align:right" class=" form-control input-lg ans " value="" step="any" id="ans" name="ans" placeholder="0" required>


      <br>
</div> 
       <div class="col-xs-4">
      <input type="text1" readonly value="1"  onClick="document.calculator.ans.value+='1'">
     </input>
</div> 

 <div class="col-xs-4">
  <input type="text1" readonly value="2" onClick="document.calculator.ans.value+='2'">
     </input>
</div> 

 <div class="col-xs-4">
  <input type="text1" readonly value="3" onClick="document.calculator.ans.value+='3'">
     </input>

</div>


 
      <div class="col-xs-4"><br>
     <input type="text1" readonly  value="4" onClick="document.calculator.ans.value+='4'"></input>
      </div>
       <div class="col-xs-4"><br>
         <input type="text1" readonly  value="5" onClick="document.calculator.ans.value+='5'"></input>
</div>
      <div class="col-xs-4"><br>
              <input type="text1" readonly value="6" onClick="document.calculator.ans.value+='6'"></input>
               
</div>
     
    
    
      <div class="col-xs-4"><br>
               <input type="text1" readonly value="7" onClick="document.calculator.ans.value+='7'"></input>
</div>

      <div class="col-xs-4"><br>
                <input type="text1" readonly  value="8" onClick="document.calculator.ans.value+='8'"></input>
</div>

   <div class="col-xs-4"><br>
             <input type="text1" readonly value="9" onClick="document.calculator.ans.value+='9'"></input> 
               
</div>


<div class="col-xs-4"><br>
            <input type="text1" readonly  value="C" name="clear" onclick="document.calculator.ans.value=''"></input>
</div>
      <div class="col-xs-4"><br>
                <input type="text1" readonly  value="0" onClick="document.calculator.ans.value+='0'"></input>
</div>
      <div class="col-xs-4"><br>
    <input type="text1" readonly value="." onClick="document.calculator.ans.value+='.'"></input>  <br>
</div>

     
        </form>
                      <!--=================DIV TAB 2====================-->
                                                    </div>
                             <!--======================================-->  

 <div class="tab-pane fade" id="tab3primary">
 
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

                       
 <?php
                    $item = null;
                    $valor = null;
                   

                    $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
                    $ultimoticket = ControladorVentas::ctrMostrarUltimoTicket();

                    if(!$ventas){   
                     $codigo= "1";

                      echo'Número de ticket: 
                        <input type="number" style="text-align:right sclass="form-control" input-sm id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" >';
                       

                    }else{
                      foreach ($ventas as $key => $value) {
                      
                      
                      }
                       $codigo = $ultimoticket["IDTICKET"]+1;
                      echo'Número de ticket: 
                       <input type="number" style="text-align:right" sclass="form-control" input-sm id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" >';
                  
                        
                    }

                    ?>
                   
                  </div>
                
                </div>

                <!--=====================================
                ENTRADA DEL CLIENTE
                ======================================--> 

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                    <select class="form-control" id="nuevoCliente" name="nuevoCliente" required>
                 
                  <option value="NA">NA</option>
                  <?php
                  $item = null;
                  $valor = null;
                  $cliente = ControladorClientes::ctrMostrarClientes($item, $valor);
                  foreach ($cliente as $key => $value) {
                    echo '<option value="'.$value["TELEFONO"].'">'.$value["TELEFONO"].'</option>';
                  }
                  ?>
                
                    
                    </select>
                  
                  
                  </div>
                
                </div>
                <!--=====================================
                ENTRADA MÉTODO DE PAGO
                ======================================-->
                <div class="form-group">
                  
                  <div class="input-group">
                  
                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
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
                          <th>Cambio</th>    
                        </tr>

                      </thead>

                      <tbody>
                      
                        <tr>
                          
                          <td style="width: 50%">
                            
                            <div class="input-group">
                           
                              <input type="number" class="form-control input-lg" value="0" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>

                               <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto">

                               <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto">

                            </div>
                          </td>

                           <td style="width: 50%">
                            
                            <div class="input-group"  method="post">
                           
                             <input type="text" class="form-control input-lg" id="nuevoTotalResta" name="nuevoTotalResta" total="" placeholder="00000" readonly required>

                              <input type="hidden" name="totalResta" id="totalResta" >
                             
                            </div>

                          </td>

                        </tr>

                      </tbody>

                    </table>



                    <table class="table">

                      <thead>

                        <tr>
                          <th>Total a pagar</th>
                          
                        </tr>

                      </thead>

                      <tbody>
                      
                        <tr>
                          



                            <td style="width: 50%">
                            
                            <div class="input-group" method="post">
                           
                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                              <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>

                              <input type="hidden" name="totalVenta" id="totalVenta">
                              
                        
                            </div>

                          </td>

                        </tr>

                      </tbody>

                    </table>


                  </div>
 <button type="submit" id="btn-total" class="btn btn-primary btn-lg btn-block">Pagar</button>
                </div>

   <!--=================DIV TAB 3====================-->
                                                    </div>
                             <!--======================================-->  

      </form>

        <?php

          $guardarVenta = new ControladorVentas();
          $guardarVenta -> ctrCrearVenta();
          
        ?>

        </div>
            
 




      </form>

  
</div>
</div>
</div>
</div>
</div>
</div>

  </section>