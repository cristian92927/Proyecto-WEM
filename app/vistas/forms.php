<?php

@session_start();
require_once "app/controllers/controller.php";
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
					<a href="index.php?v=fichas" id="enlace-ambientes" class="btn-header">Mis Fichas</a>
					<a id="enlace-atras" class="btn-header">Atrás</a>
					<a href="index.php?v=perfil" id="usuario"><?php echo $_SESSION['user'][1]; ?></a>
					<a href="app/models/salir.php" id="salir">Cerrar Sesión</a>
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
					<a data-class="competencia">Competencia</a>
					<a data-class="programa">Programa de Formación</a>
					<a data-class="contrato">Tipo de Contrato</a>
				</div>
				<div class="icono icono-form">
					<span id="enlace-form">&#9776;</span>
				</div>
				<div class="cont-forms">
					<!------------ formulario agregar instrctor------------->
					<p id="alerta" class="alerta"></p>
					<div class="form show" id="instructor">
						<form id="agregar_instructor" method="POST" class="formulario">
							<h1>Formulario: Instructor</h1>
							<input type="hidden" id="id">
							<input class="input" type="text" id="nombres">
							<label>Nombre</label>
							<input class="input" type="text" id="apellidos">
							<label>Apellidos</label>
							<input class="input" type="text" id="documento">
							<label>Documento</label>
							<input class="input" type="text" id="correo">
							<label>Correo</label>
							<select id="tipoContrato"></select>
							<div class="color">Elige un color: <input type="color" id="color" value="#000000"></div>
							<div class="botones">
								<button type="submit">Guardar</button>
								<button type="button" class="cancelar">Cancelar</button>
							</div>

						</form>
						<div class="lista">
							<h2>Lista</h2>
							<table>
								<thead>
									<tr>
										<th>id</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>CC</th>
										<th>Correo</th>
										<th>Tipo de Contrato</th>
										<th>Color</th>
										<th>Funciones</th>
									</tr>
								</thead>
								<tbody id="lista_instructor">

								</tbody>
							</table>
						</div>
					</div>
					<!------------ formulario agregar ambiente------------->
					<div class="form" id="ambiente">
						<form method="POST" id="agregar_ambiente" class="formulario">
							<h1>Formulario: Ambiente</h1>
							<input type="hidden" id="id_amb">
							<input class="input" type="text" id="nombre_ambiente">
							<label>Nombre del ambiente</label>
							<input class="input" type="text" id="descripcion_ambiente">
							<label>Descripción del ambiente</label>
							<div class="botones">
								<button type="submit">Guardar</button>
								<button type="button" class="cancelar">Cancelar</button>
							</div>
						</form>
						<div class="lista">
							<h2>Lista</h2>
							<table>
								<thead>
									<tr>
										<th>id</th>
										<th>Nombre</th>
										<th>Descripcion</th>
										<th>Funciones</th>
									</tr>
								</thead>
								<tbody id="lista_ambiente">

								</tbody>
							</table>
						</div>
					</div>

					<!------------ formulario agregar competencia------------->
					<div class="form" id="competencia">
						<form method="POST" id='agregar_competencia' class="formulario">
							<h1>Formulario: Competencia</h1>
							<input type="hidden" id="id_comp">
							<input class="input" type="text" id="nombre_comp">
							<label>Nombre de la competencia</label>
							<input class="input" type="text" id="descripcion_comp">
							<label>Descripción de la competencia</label>
							<div class="botones">
								<button type="submit">Guardar</button>
								<button type="button" class="cancelar">Cancelar</button>
							</div>
						</form>
						<div class="lista">
							<h2>Lista</h2>
							<table>
								<thead>
									<tr>
										<th>id</th>
										<th>Nombre</th>
										<th>Descripcion</th>
										<th>Funciones</th>
									</tr>
								</thead>
								<tbody id="lista_competencia">

								</tbody>
							</table>
						</div>
					</div>

					<!------------ formulario agregar programa formacion------------->
					<div class="form" id="programa">
						<form method="POST" id="agregar_programaformacion" class="formulario">
							<h1>Formulario: Programa de Formacion</h1>
							<input type="hidden" id="id_pf">
							<input class="input" type="text" id="nombre_programa">
							<label>Nombre del programa de formación</label>
							<input class="input" type="text" id="descripcion_programa">
							<label>Descripción del programa</label>
							<div class="botones">
								<button type="submit">Guardar</button>
								<button type="button" class="cancelar">Cancelar</button>
							</div>
						</form>
						<div class="lista">
							<h2>Lista</h2>
							<table>
								<thead>
									<tr>
										<th>id</th>
										<th>Nombre</th>
										<th>Descripcion</th>
										<th>Funciones</th>
									</tr>
								</thead>
								<tbody id="lista_programa">

								</tbody>
							</table>
						</div>
					</div>

					<!------------ formulario agregar contrato------------->
					<div class="form" id="contrato">
						<form method="POST" id="agregar_contrato" class="formulario">
							<h1>Formulario: Contrato</h1>
							<input type="hidden" id="id_contrato">
							<input class="input" type="text" id="descripcion_contrato">
							<label>Descripción del contrato</label>
							<input class="input" type="text" id="horas_contrato">
							<label>Cantidad de horas</label>
							<div class="botones">
								<button type="submit">Guardar</button>
								<button type="button" class="cancelar">Cancelar</button>
							</div>
						</form>
						<div class="lista">
							<h2>Lista</h2>
							<table>
								<thead>
									<tr>
										<th>id</th>
										<th>Descripcion</th>
										<th>Horas</th>
										<th>Funciones</th>
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