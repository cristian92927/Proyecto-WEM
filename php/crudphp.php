<?php 
@session_start();
require_once "app/models/conexion.php";
if(!isset($_SESSION['user'])){
	header ("Location: index.php");
}
/*$result = $_SESSION['user'];
if ($result == null) {
    header("Location:Login.php");
}*/
require_once "app/controllers/instructor_controller.php";
$regE ="";
if(!empty($_POST['nombres']) && !empty($_POST['apellidos'])){
    $array = [];
    array_push($array, $_POST['nombres'], $_POST['apellidos'], $_POST['documento'], $_POST['correo'], $_POST['cantidad-horas']);
    $registro = new Instructor_controller();
    $result = $registro->Main(1,$array);
    if($result== null){
      $regE = "Instructor ya registrado!";
  }else{
      $regE = "";
  }
}
if(!empty($_POST['documentoBorrar'])){
    $array = [];
    array_push($array, $_POST['documentoBorrar']);
    $registro = new Instructor_controller();
    $result = $registro->Main(3,$array);
    if($result== null){
      $regE = "Instructor!";
  }else{
      $regE = "";
  }
}
$i = 0;
if(!empty($_POST['documentoEditar'])){
    $array = [];
    array_push($array, $_POST['documentoEditar']);
    $registro = new Instructor_controller();
    $result = $registro->Main(0,$array);
    if($result== null){
      $regE = "No existe";
      echo "<script> alert('No existe'); </script>";
  }else{
      $regE = "Existe";
      echo "<tr>";
      foreach ($result as $item) { 
        echo "<td><input type='text' value='$result[$i]'></td></tr><br>";
        $i += 1;
      }
      echo "</tr>";
  }
}
?>