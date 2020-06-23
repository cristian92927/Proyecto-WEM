<?php 
include_once("app/controllers/controller.php");
$array = [];
array_push($array, $_POST['elemento']);
$obtener = new controller();
$result = $obtener->instructor(3,$array);
$json = array();
while($row = mysqli_fetch_array($result)){
	$json[] = array(
		'id' => $row['id'],
		'nombres' => $row['Nombres'],
		'apellidos' => $row['Apellidos'],
		'correo' => $row['Correo'],
		'horas' => $row['Horas'],
		'color' => $row['Color']
	);
}
$jsonstring = json_encode($json);
echo $jsonstring;
?>