<?php 
require_once("app/controllers/controller.php");
$array = [];
array_push($array, $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['cantidadHoras'], $_POST['color'], $_POST['id']);
$editar = new controller();
$result = $editar->instructor(4,$array);
?>