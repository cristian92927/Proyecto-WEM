<?php

require_once "login_controller.php";
require_once "instructor_controller.php";
require_once "api_response.php";
require_once "ambiente_controller.php";
require_once "ficha_controller.php";
require_once "programaformacion_controller.php";
require_once "contrato_controller.php";
require_once "horario_controller.php";
require_once "competencia_controller.php";
require_once "detalleshorario_controller.php";

class controller {

    public function Login($option, $array = []) {
        return login_controller::Main($option, $array);
    }
    public function instructor($option, $array = []) {
        return instructor_controller::Main($option, $array);
    }
    public function ambiente($option, $array = []) {
        return ambiente_controller::Main($option, $array);
    }
    public function competencia($option, $array = []) {
        return competencia_controller::Main($option, $array);
    }
    public function ficha($option, $array = []) {
        return ficha_controller::Main($option, $array);
    }
    public function programaformacion($option, $array = []) {
        return programaformacion_controller::Main($option, $array);
    }
    public function contrato($option, $array = []) {
        return contrato_controller::Main($option, $array);
    }
    public function horario($option, $array = []) {
        return horario_controller::Main($option, $array);
    }
    public function detalleshorario($option, $array = []) {
        return detalleshorario_controller::Main($option, $array);
    }
    public function redireccion($ruta) {
        include_once 'app/vistas/' . $ruta . '.php';
    }
    public function index() {
        $this->redireccion('index');
    }
    public function sesion() {
        $this->redireccion('login');
    }
    public function registrar() {
        $this->redireccion('registro');
    }
    public function crud() {
        $this->redireccion('crud');
    }
    public function forms() {
        $this->redireccion('forms');
    }
    public function recuperarPw() {
        $this->redireccion('recuperarPw');
    }
    public function fichas() {
        $this->redireccion('fichas');
    }
    public function trimestre() {
        $this->redireccion('trimestres');
    }
    public function detallesinstructor() {
        $this->redireccion('instructor');
    }
    public function peticionesAjax($p) {
        switch ($p) {
        case 'mostrar':
            $result    = $this->instructor(0);
            $resultado = api_response::mostrar($result, ["id", "nombres", "apellidos", "documento", "correo", "color", "tipoContrato"]);
            echo $resultado;
            break;

        case 'agregar':
            $array = [];
            array_push($array, $_POST['nombres'], $_POST['apellidos'], $_POST['documento'], $_POST['correo'], $_POST['color'], $_POST['tipoContrato']);
            $consulta = new controller();
            $result   = $consulta->instructor(1, $array);
            break;

        case 'eliminar':
            $array = [];
            array_push($array, $_POST['id']);
            $borrar = new controller();
            $result = $borrar->instructor(2, $array);
            break;

        case 'obtenerdatos':
            $array = [];
            array_push($array, $_POST['id']);
            $result    = $this->instructor(3, $array);
            $resultado = api_response::mostrar($result, ["id", "nombres", "apellidos", "documento", "correo", "color", "tipoContrato"]);
            echo $resultado;
            break;

        case 'editar':
            $array = [];
            array_push($array, $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['color'], $_POST['tipoContrato'], $_POST['id']);
            $editar = new controller();
            $result = $editar->instructor(4, $array);
            break;
        }

    }

    public function peticionesAjaxAmbiente($p) {
        switch ($p) {
        case 'mostrar':
            $result    = $this->ambiente(0);
            $resultado = api_response::mostrar($result, ["id_amb", "nombre_ambiente", "descripcion_ambiente"]);
            echo $resultado;
            break;

        case 'agregar':
            $array = [];
            array_push($array, $_POST['nombre_ambiente'], $_POST['descripcion_ambiente']);
            $consulta = new controller();
            $result   = $consulta->ambiente(1, $array);
            break;

        case 'eliminar':
            $array = [];
            array_push($array, $_POST['id_amb']);
            $borrar = new controller();
            $result = $borrar->ambiente(2, $array);
            break;

        case 'obtenerdatos':
            $array = [];
            array_push($array, $_POST['id_amb']);
            $result    = $this->ambiente(3, $array);
            $resultado = api_response::mostrar($result, ["id_amb", "nombre_ambiente", "descripcion_ambiente"]);
            echo $resultado;
            break;

        case 'editar':
            $array = [];
            array_push($array, $_POST['nombre_ambiente'], $_POST['descripcion_ambiente'], $_POST['id_amb']);
            $editar = new controller();
            $result = $editar->ambiente(4, $array);
            break;
        }

    }
    public function peticionesAjaxCompetencia($p) {
        switch ($p) {
        case 'mostrar':
            $result    = $this->competencia(0);
            $resultado = api_response::mostrar($result, ["id_comp", "nombre_comp", "descripcion_comp"]);
            echo $resultado;
            break;

        case 'agregar':
            $array = [];
            array_push($array, $_POST['nombre_comp'], $_POST['descripcion_comp']);
            $consulta = new controller();
            $result   = $consulta->competencia(1, $array);
            break;

        case 'eliminar':
            $array = [];
            array_push($array, $_POST['id_comp']);
            $borrar = new controller();
            $result = $borrar->competencia(2, $array);
            break;

        case 'obtenerdatos':
            $array = [];
            array_push($array, $_POST['id_comp']);
            $result    = $this->competencia(3, $array);
            $resultado = api_response::mostrar($result, ["id_comp", "nombre_comp", "descripcion_comp"]);
            echo $resultado;
            break;

        case 'editar':
            $array = [];
            array_push($array, $_POST['nombre_comp'], $_POST['descripcion_comp'], $_POST['id_comp']);
            $editar = new controller();
            $result = $editar->competencia(4, $array);
            break;
        }

    }
    public function peticionesAjaxFicha($p) {
        switch ($p) {
        case 'mostrar':
            $result    = $this->ficha(0);
            $resultado = api_response::mostrar($result, ["id_fic", "nombre_gestor", "num_ficha", "id_programa"]);
            echo $resultado;
            break;

        case 'agregar':
            $array = [];
            array_push($array, $_POST['nombre_gestor'], $_POST['num_ficha'], $_POST['id_programa']);
            $consulta = new controller();
            $result   = $consulta->ficha(1, $array);
            break;

        case 'eliminar':
            $array = [];
            array_push($array, $_POST['id_fic']);
            $borrar = new controller();
            $result = $borrar->ficha(2, $array);
            break;

        case 'obtenerdatos':
            $array = [];
            array_push($array, $_POST['id_fic']);
            $result    = $this->ficha(3, $array);
            $resultado = api_response::mostrar($result, ["id_fic", "nombre_gestor", "num_ficha", "id_programa"]);
            echo $resultado;
            break;

        case 'editar':
            $array = [];
            array_push($array, $_POST['nombre_gestor'], $_POST['num_ficha'], $_POST['id_programa'], $_POST['id_fic']);
            $editar = new controller();
            $result = $editar->ficha(4, $array);
            break;
        }

    }

    public function peticionesAjaxProgramaFormacion($p) {
        switch ($p) {
        case 'mostrar':
            $result    = $this->programaformacion(0);
            $resultado = api_response::mostrar($result, ["id_pf", "nombre_programa", "descripcion_programa"]);
            echo $resultado;
            break;

        case 'agregar':
            $array = [];
            array_push($array, $_POST['nombre_programa'], $_POST['descripcion_programa']);
            $consulta = new controller();
            $result   = $consulta->programaformacion(1, $array);
            break;

        case 'eliminar':
            $array = [];
            array_push($array, $_POST['id_pf']);
            $borrar = new controller();
            $result = $borrar->programaformacion(2, $array);
            break;

        case 'obtenerdatos':
            $array = [];
            array_push($array, $_POST['id_pf']);
            $result    = $this->programaformacion(3, $array);
            $resultado = api_response::mostrar($result, ["id_pf", "nombre_programa", "descripcion_programa"]);
            echo $resultado;
            break;

        case 'editar':
            $array = [];
            array_push($array, $_POST['nombre_programa'], $_POST['descripcion_programa'], $_POST['id_pf']);
            $editar = new controller();
            $result = $editar->programaformacion(4, $array);
            break;
        }

    }
    public function peticionesAjaxContrato($p) {
        switch ($p) {
        case 'mostrar':
            $result    = $this->contrato(0);
            $resultado = api_response::mostrar($result, ["id_cont", "descripcion_tipocontrato", "horas_tipocontrato"]);
            echo $resultado;
            break;

        case 'agregar':
            $array = [];
            array_push($array, $_POST['descripcion_tipocontrato'], $_POST['horas_tipocontrato']);
            $consulta = new controller();
            $result   = $consulta->contrato(1, $array);
            break;

        case 'eliminar':
            $array = [];
            array_push($array, $_POST['id_cont']);
            $borrar = new controller();
            $result = $borrar->contrato(2, $array);
            break;

        case 'obtenerdatos':
            $array = [];
            array_push($array, $_POST['id_cont']);
            $result    = $this->contrato(3, $array);
            $resultado = api_response::mostrar($result, ["id_cont", "descripcion_tipocontrato", "horas_tipocontrato"]);
            echo $resultado;
            break;

        case 'editar':
            $array = [];
            array_push($array, $_POST['descripcion_tipocontrato'], $_POST['horas_tipocontrato'], $_POST['id_cont']);
            $editar = new controller();
            $result = $editar->contrato(4, $array);
            break;
        }

    }
    public function peticionesAjaxTrimestre($p) {
        switch ($p) {
        case 'mostrar':
            $array = [];
            array_push($array, $_POST['id_ficha']);
            $result    = $this->horario(0, $array);
            $resultado = api_response::mostrar($result, ["id_horario", "trimestre", "fecha_inicio", "fecha_fin", "id_ficha"]);
            echo $resultado;
            break;

        case 'agregar':
            $array = [];
            array_push($array, $_POST['trimestre'], $_POST['fecha_inicio'], $_POST['fecha_fin'], $_POST['id_ficha']);
            $consulta = new controller();
            $result   = $consulta->horario(1, $array);
            break;

        case 'eliminar':
            $array = [];
            array_push($array, $_POST['id_horario']);
            $borrar = new controller();
            $result = $borrar->horario(2, $array);
            break;

        case 'obtenerdatos':
            $array = [];
            array_push($array, $_POST['id_horario']);
            $result    = $this->horario(3, $array);
            $resultado = api_response::mostrar($result, ["id_horario", "nombre_trimestre", "fecha_inicio", "fecha_fin", "id_ficha"]);
            echo $resultado;
            break;

        case 'editar':
            $array = [];
            array_push($array, $_POST['trimestre'], $_POST['fecha_inicio'], $_POST['fecha_fin'], $_POST['id_ficha'], $_POST['id_horario']);
            $editar = new controller();
            $result = $editar->horario(4, $array);
            break;
        }

    }
    public function peticionesAjaxDetallesHorario($p) {
        switch ($p) {
        case 'mostrar':
            $array = [];
            array_push($array, $_POST['id_trimestre']);
            $result    = $this->detalleshorario(0, $array);
            $resultado = api_response::mostrar($result, ["id", "dia", "hora_inicio", "hora_fin", "id_instructor", "instructor", "color", "ambiente", "competencia"]);
            echo $resultado;
            break;

        case 'agregar':
            $array = [];
            array_push($array, $_POST['dia'], $_POST['hora_inicio'], $_POST['hora_fin'], $_POST['id_Ambiente'], $_POST['id_Competencia'], $_POST['id_Instructor'], $_POST['id_Horario'], $_POST['id_Usuario'], $_POST['fecha_inicio'], $_POST['fecha_fin']);
            $consulta = new controller();
            $result   = $consulta->detalleshorario(1, $array);
            break;

        case 'obtenerInstructor':
            $array = [];
            array_push($array, $_POST['id_instructor'], $_POST['fecha_inicio'], $_POST['fecha_fin']);
            $result    = $this->detalleshorario(2, $array);
            $resultado = api_response::mostrar($result, ["dia", "hora_inicio", "hora_fin", "color", "ambiente", "competencia", "ficha"]);
            echo $resultado;
            break;
        }

    }
}
?>