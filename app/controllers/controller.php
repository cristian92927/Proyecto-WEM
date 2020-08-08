<?php

require_once "login_controller.php";
require_once "instructor_controller.php";
require_once "api_response.php";
class controller{

	public function Login($option,$array=[]){
		return login_controller::Main($option,$array);
	}
	public function instructor($option,$array=[]){
		return instructor_controller::Main($option,$array);
	}
	function index(){
		include_once('app/vistas/index.php');
	}
	function sesion(){
		include_once('app/vistas/login.php');
	}
	function registrar(){
		include_once('app/vistas/registro.php');
	}
	function crud(){
		include_once('app/vistas/crud.php');
	}
	function recuperarPw(){
		include_once('app/vistas/recuperarPw.php');
	}
	function peticionesAjax($p){
		switch($p){
			case 'mostrar':
			$result = $this->instructor(0);
			$resultado = api_response::mostrar($result, ["id", "nombres", "apellidos", "documento", "correo", "horas", "color"]);
			echo $resultado;
			break;

			case 'agregar':
			$array = [];
			array_push($array, $_POST['nombres'], $_POST['apellidos'], $_POST['documento'], $_POST['correo'], $_POST['horas'], $_POST['color']);
			$consulta = new controller();
			$result = $consulta->instructor(1, $array);
			break;

			case 'eliminar':
			$array = [];
			array_push($array, $_POST['elementId']);
			$borrar = new controller();
			$result = $borrar->instructor(2,$array);
			break;

			case 'obtenerdatos':
			$array = [];
			array_push($array, $_POST['elemento']);
			$result = $this->instructor(3, $array);
			$resultado = api_response::mostrar($result, ["id", "nombres", "apellidos", "correo", "horas", "color"]);
			echo $resultado;
			break;

			case 'editar':
			$array = [];
			array_push($array, $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['cantidadHoras'], $_POST['color'], $_POST['id']);
			$editar = new controller();
			$result = $editar->instructor(4,$array);
			break;
		}
		
	}
}
?>