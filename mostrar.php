<?php 
require_once "app/controllers/controller.php";
$consulta = new controller();
$result = $consulta->instructor(0);

$json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'id' => $row['id_Instructor'],
      'nombres' => $row['Nombres'],
      'apellidos' => $row['Apellidos'],
      'documento' => $row['Documento'],
      'correo' => $row['Correo'],
      'horas' => $row['Horas'],
      'color' => $row['Color']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>