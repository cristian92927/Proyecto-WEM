<?php

require_once "login_controller.php";
require_once "instructor_controller.php";
require_once "api_response.php";
require_once "ambiente_controller.php";
require_once "ficha_controller.php";
require_once "programaformacion_controller.php";
class controller{

	public function Login($option,$array=[]){
		return login_controller::Main($option,$array);
	}
	public function instructor($option,$array=[]){
		return instructor_controller::Main($option,$array);
	}
	public function ambiente($option,$array=[]){
		return ambiente_controller::Main($option,$array);
	}
	public function ficha($option,$array=[]){
		return ficha_controller::Main($option,$array);
	}
	public function programaformacion($option,$array=[]){
		return programaformacion_controller::Main($option,$array);
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
	function forms(){
		include_once('app/vistas/forms.php');
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
			array_push($array, $_POST['id']);
			$borrar = new controller();
			$result = $borrar->instructor(2,$array);
			break;

			case 'obtenerdatos':
			$array = [];
			array_push($array, $_POST['id']);
			$result = $this->instructor(3, $array);
			$resultado = api_response::mostrar($result, ["id", "nombres", "apellidos","documento", "correo", "horas", "color"]);
			echo $resultado;
			break;

			case 'editar':
			$array = [];
			array_push($array, $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['horas'], $_POST['color'], $_POST['id']);
			$editar = new controller();
			$result = $editar->instructor(4,$array);
			break;

			case 'guardarHorario':
			
			break;
		}
		
	}

	function peticionesAjaxAmbiente($p){
		switch($p){
			case 'mostrar':
			$result = $this->ambiente(0);
			$resultado = api_response::mostrar($result, ["id_amb","nombre_ambiente", "descripcion_ambiente"]);
			echo $resultado;
			break;
	
			case 'agregar':
			$array = [];
			array_push($array, $_POST['nombre_ambiente'], $_POST['descripcion_ambiente']);
			$consulta = new controller();
			$result = $consulta->ambiente(1, $array);
			break;
	
			case 'eliminar':
			$array = [];
			array_push($array, $_POST['id_amb']);
			$borrar = new controller();
			$result = $borrar->ambiente(2,$array);
			break;
	
			case 'obtenerdatos':
			$array = [];
			array_push($array, $_POST['id_amb']);
			$result = $this->ambiente(3, $array);
			$resultado = api_response::mostrar($result, ["id_amb","nombre_ambiente", "descripcion_ambiente"]);
			echo $resultado;
			break;
	
			case 'editar':
			$array = [];
			array_push($array, $_POST['nombre_ambiente'], $_POST['descripcion_ambiente'],$_POST['id_amb']);
			$editar = new controller();
			$result = $editar->ambiente(4,$array);
			break;
	
			case 'guardarHorario':
			
			break;
		}
		
	}

	function peticionesAjaxFicha($p){
		switch($p){
			case 'mostrar':
			$result = $this->ficha(0);
			$resultado = api_response::mostrar($result, ["id_fic","nombre_gestor", "num_ficha","id_programa"]);
			echo $resultado;
			break;
	
			case 'agregar':
			$array = [];
			array_push($array, $_POST['nombre_gestor'], $_POST['num_ficha'], $_POST['id_programa']);
			$consulta = new controller();
			$result = $consulta->ficha(1, $array);
			break;
	
			case 'eliminar':
			$array = [];
			array_push($array, $_POST['id_fic']);
			$borrar = new controller();
			$result = $borrar->ficha(2,$array);
			break;
	
			case 'obtenerdatos':
			$array = [];
			array_push($array, $_POST['id_fic']);
			$result = $this->ficha(3, $array);
			$resultado = api_response::mostrar($result, ["id_fic","nombre_gestor", "num_ficha","id_programa"]);
			echo $resultado;
			break;
	
			case 'editar':
			$array = [];
			array_push($array, $_POST['nombre_gestor'], $_POST['num_ficha'],$_POST['id_programa'],$_POST['id_fic']);
			$editar = new controller();
			$result = $editar->ficha(4,$array);
			break;
	
			case 'guardarHorario':
			
			break;
		}
		
	}

	function peticionesAjaxProgramaFormacion($p){
		switch($p){
			case 'mostrar':
			$result = $this->programaformacion(0);
			$resultado = api_response::mostrar($result, ["id_pf","nombre_programa", "descripcion_programa"]);
			echo $resultado;
			break;
	
			case 'agregar':
			$array = [];
			array_push($array, $_POST['nombre_programa'], $_POST['descripcion_programa']);
			$consulta = new controller();
			$result = $consulta->programaformacion(1, $array);
			break;
	
			case 'eliminar':
			$array = [];
			array_push($array, $_POST['id_pf']);
			$borrar = new controller();
			$result = $borrar->programaformacion(2,$array);
			break;
	
			case 'obtenerdatos':
			$array = [];
			array_push($array, $_POST['id_pf']);
			$result = $this->programaformacion(3, $array);
			$resultado = api_response::mostrar($result, ["id_pf","nombre_programa", "descripcion_programa"]);
			echo $resultado;
			break;
	
			case 'editar':
			$array = [];
			array_push($array, $_POST['nombre_programa'], $_POST['descripcion_programa'],$_POST['id_pf']);
			$editar = new controller();
			$result = $editar->programaformacion(4,$array);
			break;
	
			case 'guardarHorario':
			
			break;
		}
		
	}
}
?>