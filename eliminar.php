<?php
require_once("app/controllers/controller.php");
$array = [];
array_push($array, $_POST['elementId']);
$borrar = new controller();
$result = $borrar->instructor(2,$array);
?>