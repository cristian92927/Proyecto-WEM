<?php 
require_once "app/controllers/controller.php";
$array = [];
array_push($array, $_POST['nombres'], $_POST['apellidos'], $_POST['documento'], $_POST['correo'], $_POST['horas'], $_POST['color']);
$consulta = new controller();
$result = $consulta->instructor(1, $array);

?>