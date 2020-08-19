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
	<link rel="stylesheet" href="app/resources/iconos/icomoon/style.css">
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
					<a data-class="instructor" class="active">Instructor</a>
					<a data-class="ambiente">Ambiente</a>
					<a data-class="programa">Programa de Formación</a>
					<a data-class="ficha">Ficha</a>
					<a data-class="contrato">Tipo de Contrato</a>
				</div>
				<div class="cont-forms">
					<!------------ formulario agregar instrctor------------->
					<div class="form show" id="instructor">
						<form id="agregar_instructor" method="POST">
							<h1>Registrar Instructor</h1>
							<input type="hidden" id="id">
							<input type="text" id="nombres" placeholder="Nombres">
							<input type="text" id="apellidos" placeholder="Apellidos">
							<input type="text" id="documento" placeholder="Documento">
							<input type="text" id="correo" placeholder="Correo electronico">
							<select id="tipoContrato"></select>
							<div><label>Elige un color: </label><input type="color" id="color" value="#000000"></div>

							<button type="submit">Guardar</button>
						</form>
						<div class="lista">
							<h2>Lista</h2>
							<table>
								<thead>
									<tr>
										<th>id</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Documento</th>
										<th>Correo</th>
										<th>Tipo de Contrato</th>
										<th>Color</th>
									</tr>
								</thead>
								<tbody id="lista_instructor">

								</tbody>
							</table>
						</div>
					</div>
					<!------------ formulario agregar ambiente------------->
					<div class="form" id="ambiente">
						<form method="POST" id='agregar_ambiente'>
							<h1>Registrar Ambiente</h1>
							<input type="hidden" id="id_amb">
							<input type="text" id="nombre_ambiente" placeholder="Nombre del ambiente">
							<input type="text" id="descripcion_ambiente" placeholder="descripción">
							<button type="submit">Guardar</button>
						</form>
						<div class="lista">
							<h2>Lista</h2>
							<table>
								<thead>
									<tr>
										<th>id</th>
										<th>Nombre</th>
										<th>Descripcion</th>
									</tr>
								</thead>
								<tbody id="lista_ambiente">
									
								</tbody>
							</table>
						</div>
					</div>

					<!------------ formulario agregar programa formacion------------->
					<div class="form" id="programa">
						<form method="POST" id="agregar_programaformacion">
							<h1>Registrar Programa de Formacion</h1>
							<input type="hidden" id="id_pf">
							<input type="text" id="nombre_programa" placeholder="Nombre del programa">
							<input type="text" id="descripcion_programa" placeholder="Descripción">
							<button type="submit">Guardar</button>
						</form>
						<div class="lista">
							<h2>Lista</h2>
							<table>
								<thead>
									<tr>
										<th>id</th>
										<th>Nombre</th>
										<th>Descripcion</th>
									</tr>
								</thead>
								<tbody id="lista_programa">
									
								</tbody>
							</table>
						</div>
					</div>

					<!------------ formulario agregar ficha------------->
					<div class="form" id="ficha">
						<form method="POST" id="agregar_ficha">
							<h1>Registrar Ficha</h1>
							<input type="hidden" id="id_fic">
							<input type="text" id="nombre_gestor" placeholder="Nombre del gestor">
							<input type="text" id="num_ficha" placeholder="Numero de la ficha">
							<select class="select" id="nombre_prog"></select>
							<button type="submit">Guardar</button>
						</form>
						<div class="lista">
							<h2>Lista</h2>
							<table>
								<thead>
									<tr>
										<th>id</th>
										<th>Numero de ficha</th>
										<th>Nombre Gestor</th>
										<th>Nombre del programa de formacion</th>
									</tr>
								</thead>
								<tbody id="lista_ficha">
									
								</tbody>
							</table>
						</div>
					</div>

					<!------------ formulario agregar ficha------------->
					<div class="form" id="contrato">
						<form method="POST" id="agregar_contrato">
							<h1>Registrar Contrato</h1>
							<input type="hidden" id="id_contrato">
							<input type="text" id="descripcion_contrato" placeholder="Descripción de contrato">
							<input type="text" id="horas_contrato" placeholder="Horas">
							<button type="submit">Guardar</button>
						</form>
						<div class="lista">
							<h2>Lista</h2>
							<table>
								<thead>
									<tr>
										<th>id</th>
										<th>Descripcion</th>
										<th>Horas</th>
									</tr>
								</thead>
								<tbody id="lista_contrato">
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script src="app/resources/js/loader.js"></script>
<script src="app/resources/js/nav.js"></script>
<script src="app/resources/js/forms.js"></script>
</html>