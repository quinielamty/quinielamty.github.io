<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div id="back"></div>
<body>
  <div class="login-logo">

    <!--
      <img src="vistas/img/plantilla/logo-blanco-bloque.png" style="padding:0px 0px 0px 0px">
    -->

  </div>
    <div id="login">
        <h3 class="text-center text-white pt-5"> JORNADA 1 LIGA MX</h3>


          <h4 class="text-center text-white pt-5"> QUEDAN 
         <small class="text-white" id="countdown"></small></h4>
  
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        


<script>
var end = new Date('01/07/2021 11:30 PM');

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById('countdown').innerHTML = 'EXPIRED!';

            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);

        document.getElementById('countdown').innerHTML = days + ' dias, ';
        document.getElementById('countdown').innerHTML += hours + ' horas, ';
        document.getElementById('countdown').innerHTML += minutes + ' minutos.';
    }

    timer = setInterval(showRemaining, 1000);
</script>


  <section class="content">

    

      <div  class="box-header with-border row justify-content-center align-items-center">
  <form role="form" method="post"> 
      <div class="col-xs-6">
                  <p class="text-white">Nombre de registro</p>
                  <div>
                   <input type="text"  class="form-control" name="nuevoUsername" id="nuevoUsername" required>
                  </div>
                </div> 
                      <div class="col-xs-6">
                    <h3 class="text-white">COSTO $40 MX.</h3>

                </div>
           <div class="col-xs-12">
               <small class="text-white">
El jugador que tenga el mayor número de aciertos de llevara el 50% acumulado de la bolsa. El segundo lugar 25%. Tercer lugar 10%. Cuarto y quinto lugar 5%</small> 
                </div>       


    
 <div class="row justify-content-center align-items-center col-xs-12">

       
          <div class="col-xs-1">
    <h1 name="pronostico1" id="pronostico1" class="text-white">_</h1>
   <input type="hidden" class="form-control" name="pronostico1hidden"  id="pronostico1hidden" required>
            </div>   

           <div class="col-xs-1">
    <h1 name="pronostico2" id="pronostico2" class="text-white">_</h1>
       <input type="hidden" class="form-control" name="pronostico2hidden"  id="pronostico2hidden" required>
            </div>   

           <div class="col-xs-1">
    <h1 name="pronostico3" id="pronostico3" class="text-white">_</h1>
       <input type="hidden" class="form-control" name="pronostico3hidden"  id="pronostico3hidden" required>
            </div>   

           <div class="col-xs-1">
    <h1 name="pronostico4" id="pronostico4" class="text-white">_</h1>
       <input type="hidden" class="form-control" name="pronostico4hidden"  id="pronostico4hidden" required>
            </div>   

           <div class="col-xs-1">
    <h1 name="pronostico5" id="pronostico5" class="text-white">_</h1>
       <input type="hidden" class="form-control" name="pronostico5hidden"  id="pronostico5hidden" required>
            </div>   

           <div class="col-xs-1">
    <h1 name="pronostico6" id="pronostico6" class="text-white">_</h1>
       <input type="hidden" class="form-control" name="pronostico6hidden"  id="pronostico6hidden" required>
            </div>   

           <div class="col-xs-1">
    <h1 name="pronostico7" id="pronostico7" class="text-white">_</h1>
       <input type="hidden" class="form-control" name="pronostico7hidden"  id="pronostico7hidden" required>
            </div>   

           <div class="col-xs-1">
    <h1 name="pronostico8" id="pronostico8" class="text-white">_</h1>
       <input type="hidden" class="form-control" name="pronostico8hidden"  id="pronostico8hidden" required>
            </div>   

           <div class="col-xs-1">
    <h1 name="pronostico9" id="pronostico9" class="text-white">_</h1>
       <input type="hidden" class="form-control" name="pronostico9hidden"  id="pronostico9hidden" required>
            </div>   
    </div>
 <div class="col-xs-12">
    <div class="box">

            
       <table class="table">
  <thead>
    <tr>
       <th style="width:10px">#</th>
       <th style="width:10px"></th>
       <th style="width:10px">Local</th>
       <th style="width:10px"></th>
       <th style="width:10px">Visitante</th>
       <th style="padding:10px 10px 10px 50px" style="width:10px"></th>

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
      <td><input style="padding:10px 10px 10px 10px" id="local'.$value["RECORDID"].'" type="checkbox" name="local'.$value["RECORDID"].'" value="L"></td>

 <td>
 <div class="col-xs-2">
               <img src="vistas/img/equipos/'.$value["local"].'.png" style="padding:0px 50px 10px 0px">
            </div>
             <div class="col-xs-4">'.$value["local"].'
            </div>
        </td>

      <td><input style="padding:10px 10px 10px 10px" class="form-check-input" type="checkbox" id="empate'.$value["RECORDID"].'"  value="E" name="empate'.$value["RECORDID"].'"></td>

                  <td>
 <div class="col-xs-2">
               <img src="vistas/img/equipos/'.$value["visitante"].'.png" style="padding:0px 50px 10px 0px">
            </div>
             <div class="col-xs-4">'.$value["visitante"].'
            </div>
        </td>

      <td><input style="padding:10px 10px 10px 10px" class="form-check-input" type="checkbox" id="visitante'.$value["RECORDID"].'" value="V" name="visitante'.$value["RECORDID"].'"></td>

                  </tr>';
          }

        ?>
  </tbody>
</table>   </div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>

          </form>   
        <?php

          $guardarJornada = new ControladorGastos();
          $guardarJornada -> ctrCrearGastos();
          
        ?>





  </section>




                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</div>