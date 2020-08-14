<?php 
@session_start();
require_once "app/controllers/controller.php";
if(!isset($_SESSION['user'])){
	header ("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registros</title>
	<link rel="stylesheet" type="text/css" href="app/resources/css/forms.css">
</head>
<body class="hidden">
	<!----------- LOAD ------------>
	<div class="centrado" id="onload">
		<section>
			<div class="loader">
				<div class="loader-inner"></div>
			</div>
			<h3>Loading...</h3>
		</section>
	</div>
	<!------------ NAV--------------->
	<header>
		<nav id="nav" class="nav1">
			<div class="contenedor-nav">
				<div class="logo">
					<img src="app/resources/img/logo.png" alt="">
				</div>
				<div id="enlaces" class="enlaces">
					<a href="index.php?v=forms" id="enlace-registros" class="btn-header">Registro</a>
					<a id="enlace-crear" class="btn-header">Crear Instructor</a>
					<a href="index.php?v=crud" id="enlace-programar" class="btn-header">Programar horario</a></li>
					<a id="usuario" class="btn-header">Bienvenido, <?php echo $_SESSION['user'][1] ?></a>
					<a href="app/models/salir.php" id="salir" class="btn-header">Salir</a>
				</div>
				<div class="icono" id="open">
					<span>&#9776;</span>
				</div>
			</div>
		</nav>
	</header>

	<!---------- MAIN -------------->
	<main>
		<div class="container">
			<div class="cont-general">
				<div class="menu">
					<a data-class="registrar_instructor" class="active">Registrar instructor</a>
					<a data-class="registrar_ambiente">Registrar ambiente</a>
					<a data-class="registrar_ficha">Registrar ficha</a>
					<a data-class="registrar_programa">Registrar programa de formación</a>
				</div>
				<div class="cont-forms">
					<!------------ formulario agregar ------------->
					<div class="form show" id="registrar_instructor">
						<form method="POST">
							<h1>Registrar Instructor</h1>
							<input type="text" id="nombres" placeholder="Nombres">
							<input type="text" id="apellidos" placeholder="Apellidos">
							<input type="text" id="documento" placeholder="Documento">
							<input type="text" id="correo" placeholder="Correo electronico">
							<input type="text" id="horas" placeholder="Cantidad de horas">
							<div><label>Elige un color: </label><input type="color" id="color" value="#000"></div>

							<button id="agregar_instructor">Crear</button>
						</form>
					</div>
					<div class="form" id="registrar_ambiente">
						<form method="POST">
							<h1>Registrar Ambiente</h1>
							<input type="text" id="nombre_ambiente" placeholder="Nombre del ambiente">
							<input type="text" id="descripcion_ambiente" placeholder="descripción">
							<button id="agregar_ambiente">Crear</button>
						</form>
					</div>
					<div class="form" id="registrar_ficha">
						<form method="POST">
							<h1>Registrar Ficha</h1>
							<input type="text" id="nombre_gestor" placeholder="Nombre del gestor">
							<input type="text" id="num_ficha" placeholder="Numero de la ficha">
							<input type="text" id="documento" placeholder="id del programa">
							<button id="agregar_ficha">Crear</button>
						</form>
					</div>
					<div class="form" id="registrar_programa">
						<form method="POST">
							<h1>Registrar Programa de Formacion</h1>
							<input type="text" id="nombre_programa" placeholder="Nombre del programa">
							<input type="text" id="descripcion_programa" placeholder="Descripción">
							
							<button id="agregar_programa">Crear</button>
						</form>
					</div>
					<div class="lista">
						<h2>Lista</h2>
						<table>
							<tr>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Documento</th>
								<th>Correo</th>
								<th>Horas</th>
								<th>Color</th>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>

<script src="app/resources/js/loader.js"></script>
<script src="app/resources/js/nav.js"></script>
<script src="app/resources/js/forms.js"></script>
</html>