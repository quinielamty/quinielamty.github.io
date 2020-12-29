<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["TIPOCUENTA"] == "Administrador"){
			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>';




					echo '<li>

				<a href="abrircaja">

					<i class="fa fa-cc"></i>
					<span>Aperturas de caja</span>

				</a>

			</li>';
}
	echo '<li>

				<a href="cajadetect">

					<i class="fa fa-calculator"></i>
					<span>Cobro en caja</span>

				</a>

			</li>';

			
		if($_SESSION["TIPOCUENTA"] == "Administrador"){
					echo '<li>

				<a href="cortecaja">

					<i class="fa fa-usd"></i>
					<span>Cierres de caja</span>

				</a>

			</li>';



		

			echo '<li>

				<a href="categorias">

					<i class="fa fa-th"></i>
					<span>Categorías</span>

				</a>

			</li>

			<li>

				<a href="crear-factura">

					<i class="fa fa-file-code-o"></i>
					<span>Facturas</span>

				</a>

			</li>

			<li>

				<a href="clientes">

					<i class="fa fa-users"></i>
					<span>Alta Clientes</span>

				</a>

			</li>

			<li>

				<a href="productos">

					<i class="fa fa-product-hunt"></i>
					<span>Productos</span>

				</a>

			</li>';

		

				
			echo '<li>

				<a href="gastosfijos">

					<i class="fa fa-credit-card"></i>
					<span>Gastos fijos</span>

				</a>

			</li>';

				}	
			echo '<li>

				<a href="gastos">

					<i class="fa fa-credit-card-alt"></i>
					<span>Caja chica</span>

				</a>

			</li>';

		
						
			echo '<li>

				<a href="devoluciones">

					<i class="fa fa-handshake-o"></i>
					<span>Devoluciones</span>

				</a>

			</li>';

		

if($_SESSION["TIPOCUENTA"] == "Administrador"){		
			echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>
					
					<span>Ventas</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="ventas">
							
							<i class="fa fa-circle-o"></i>
							<span>Tabla de ventas</span>

						</a>

					</li>

					<li>';

					
					echo '<li>

						<a href="reportes">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte de ventas</span>

						</a>

					</li>';
						echo '<li>

						<a href="reportes-utilidades">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte de utilidades</span>

						</a>

					</li>';

					
	}			

				echo '</ul>

			</li>';

		

		?>

		</ul>

	 </section>

</aside>