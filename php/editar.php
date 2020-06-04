<?php 
	require_once "app/controllers/instructor_controller.php";

	echo $_POST['documentoEditar'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Actualizar datos</title>
</head>
<body>
	<form id="actualizar" action="" method="POST">
		<h1>Modificar</h1>
		<input type="text" id="Nnombres" name="Nnombres" value="<?php echo $regE[1]; ?>">
		<input type="text" id="Napellidos" name="Napellidos" value="<?php echo $regE[2]; ?>">
		<input type="text" id="Ncorreo" name="Ncorreo" value="<?php echo $regE[4]; ?>">
		<input type="text" id="Ncantidad-horas" name="Ncantidad-horas" value="<?php echo $regE[5]; ?>">

		<button id="modificar">Guardar cambios</button>
	</form>
</body>
</html>