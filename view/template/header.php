<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!--	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
	<div class="container">
		<header class="mb-5">
			<div class="p-5 text-center bg-light" style="margin-top: 58px;">
				<h1 class="mb-3"><?php echo $controller->page_title; ?></h1>

				<?php
				//d) Se permitirá cerrar sesión en un formulario situado en el header.php que solo se mostrará si el usuario está autenticado. A su izquierda mostrará el email del usuario autenticado (1 punto)
				if (SessionManager::iniciarSesion() && isset($_SESSION["userId"])) {

				?>
					<div class="d-flex  justify-content-end  align-items-center">
						<div class="d-flex mx-2 align-items-center justify-content-end">
							<p class="lead">¡Hola <?= $_SESSION["email"] ?>!</p>
						</div>

						<form method="post" action="FrontController.php?controller=Usuario&action=logout" class="d-flex mx-2 align-items-center justify-content-start">
							<input type="submit" class="btn btn-primary btn-block" value="Cerrar sesión" name="btnCerrar"></button>
						</form>
					</div>


					<?php

					if ((SessionManager::isUserLoggedIn()) && ($_SESSION["roleId"] == 2)) { ?>

						<div class="d-flex  justify-content-end  align-items-center">
							<span class="badge bg-info text-dark mx-2">
								
							<!-- 2- Modifica el fichero header.php para que muestre el total de artículos
							 añadidos al carrito (sea cual sea el id del producto). 
							 Por ejemplo, imaginemos que añado 2 unidades del producto cinturón a las 5 unidades del pantalón. 
							 Entonces, el carrito tendrá 7 unidades en total. (2 puntos) -->
								echo "Items en el carrito: "
							?>


							</span>

							<form action="FrontController.php?controller=Producto&action=clearCart" method="post" class="mx-2" >
								<button type="submit" class="btn btn-secondary">Vaciar el carrito</button>
							</form>

							<span class="badge bg-danger text-dark">
								<?php

								if (isset($_COOKIE) && isset($_COOKIE[ProductoController::PANTALON_COOKIE])) {

									echo " Pantalón cookie: " . $_COOKIE[ProductoController::PANTALON_COOKIE];
								}


								?>
							</span>
						</div>
					<?php } ?>



				<?php } ?>






			</div>
		</header>