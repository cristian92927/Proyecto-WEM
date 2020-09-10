<?php

require_once "login_controller.php";
require_once "instructor_controller.php";
require_once "api_response.php";
require_once "ambiente_controller.php";
require_once "ficha_controller.php";
require_once "programaformacion_controller.php";
require_once "contrato_controller.php";
require_once "horario_controller.php";

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
	public function contrato($option,$array=[]){
		return contrato_controller::Main($option,$array);
	}
	public function horario($option,$array=[]){
		return horario_controller::Main($option,$array);
	}
	function redireccion($ruta){
		include_once('app/vistas/'.$ruta.'.php');
	}
	function index(){
		$this->redireccion('index');
	}
	function sesion(){
		$this->redireccion('login');
	}
	function registrar(){
		$this->redireccion('registro');
	}
	function crud(){
		$this->redireccion('crud');
	}
	function forms(){
		$this->redireccion('forms');
	}
	function recuperarPw(){
		$this->redireccion('recuperarPw');
	}
	function fichas(){
		$this->redireccion('fichas');
	}
	function trimestre(){
		$this->redireccion('trimestres');
	}
	function peticionesAjax($p){
		switch($p){
			case 'mostrar':
			$result = $this->instructor(0);
			$resultado = api_response::mostrar($result, ["id", "nombres", "apellidos", "documento", "correo", "color", "tipoContrato"]);
			echo $resultado;
			break;

			case 'agregar':
			$array = [];
			array_push($array, $_POST['nombres'], $_POST['apellidos'], $_POST['documento'], $_POST['correo'], $_POST['color'], $_POST['tipoContrato']);
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
			$resultado = api_response::mostrar($result, ["id", "nombres", "apellidos","documento", "correo", "color", "tipoContrato"]);
			echo $resultado;
			break;

			case 'editar':
			$array = [];
			array_push($array, $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['color'], $_POST['tipoContrato'], $_POST['id']);
			$editar = new controller();
			$result = $editar->instructor(4,$array);
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
		}
		
	}
	function peticionesAjaxContrato($p){
		switch($p){
			case 'mostrar':
			$result = $this->contrato(0);
			$resultado = api_response::mostrar($result, ["id_cont","descripcion_tipocontrato", "horas_tipocontrato"]);
			echo $resultado;
			break;
	
			case 'agregar':
			$array = [];
			array_push($array, $_POST['descripcion_tipocontrato'], $_POST['horas_tipocontrato']);
			$consulta = new controller();
			$result = $consulta->contrato(1, $array);
			break;
	
			case 'eliminar':
			$array = [];
			array_push($array, $_POST['id_cont']);
			$borrar = new controller();
			$result = $borrar->contrato(2,$array);
			break;
	
			case 'obtenerdatos':
			$array = [];
			array_push($array, $_POST['id_cont']);
			$result = $this->contrato(3, $array);
			$resultado = api_response::mostrar($result, ["id_cont","descripcion_tipocontrato", "horas_tipocontrato"]);
			echo $resultado;
			break;
	
			case 'editar':
			$array = [];
			array_push($array, $_POST['descripcion_tipocontrato'], $_POST['horas_tipocontrato'],$_POST['id_cont']);
			$editar = new controller();
			$result = $editar->contrato(4,$array);
			break;
		}
		
	}
	function peticionesAjaxTrimestre($p){
		switch($p){
			case 'mostrar':
			$array = [];
			array_push($array, $_POST['id_ficha']);
			$result = $this->horario(0, $array);
			$resultado = api_response::mostrar($result, ["id_horario", "trimestre", "fecha_inicio", "fecha_fin", "id_ficha"]);
			echo $resultado;
			break;
	
			case 'agregar':
			$array = [];
			array_push($array, $_POST['trimestre'], $_POST['fecha_inicio'], $_POST['fecha_fin'], $_POST['id_ficha']);
			$consulta = new controller();
			$result = $consulta->horario(1, $array);
			break;
	
			case 'eliminar':
			$array = [];
			array_push($array, $_POST['id_horario']);
			$borrar = new controller();
			$result = $borrar->horario(2,$array);
			break;
	
			case 'obtenerdatos':
			$array = [];
			array_push($array, $_POST['id_horario']);
			$result = $this->horario(3, $array);
			$resultado = api_response::mostrar($result, ["id_cont","descripcion_tipocontrato", "horas_tipocontrato"]);
			echo $resultado;
			break;
	
			case 'editar':
			$array = [];
			array_push($array, $_POST['trimestre'], $_POST['fecha_inicio'], $_POST['fecha_fin'], $_POST['id_ficha'], $_POST['id_horario']);
			$editar = new controller();
			$result = $editar->horario(4,$array);
			break;
		}
		
	}
}
?>