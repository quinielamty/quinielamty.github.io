
<?php

if($_SESSION["TIPOCUENTA"] == "Vendedor"){

  echo '<script>

    window.location = "crear-venta";

  </script>';
header('Location: crear-venta.php');
  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Inicio
      
      <small>Dashoboard</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Inicio</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">
      
    <?php

    if($_SESSION["TIPOCUENTA"] =="Administrador"){

      include "inicio/cajas-superiores.php";

    }

    ?>

    </div> 

     <div class="row">
       
        <div class="col-lg-12">



        </div>

        <div class="col-lg-5">


        </div>

         <div class="col-lg-7">

         

        </div>




         <div class="col-lg-12">
           
          <?php

          if($_SESSION["TIPOCUENTA"] =="Especial" || $_SESSION["TIPOCUENTA"] =="Vendedor"){

             echo '<div class="box box-success">

             <div class="box-header">

             <h1>Bienvenid@ ' .$_SESSION["NOMBRECOMPL"].'</h1>

             </div>

             </div>';

          }

          ?>

         </div>

     </div>

  </section>
 
</div>
