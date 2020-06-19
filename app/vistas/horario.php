<?php

include_once('app/models/conexion.php');

class horario {

    public function consultacurso() {

        $db = Conexion::connection();

        $sql = "SELECT * FROM instructores";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            $data = array();
        }

        return $data;
    }

    public function consultahoras() {

        $db = Conexion::connection();

        $sql = "SELECT * FROM hora";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            $data = array();
        }

        return $data;
    }

    public function mantenimientoHorario($flag, $idhorario, $idhora, $idcurso, $dia) {

        $db = Conexion::connection();
        $flag = $db->realescapestring($flag);
        $idhorario = $db->realescapestring($idhorario);
        $idhora = $db->realescapestring($idhora);
        $idcurso = $db->realescapestring($idcurso);
        $dia = $db->realescapestring($dia);
        
        if ($flag == 1 ){
            $sql = "INSERT INTO horario_curso (idhora,id_Instructor,dia)
            VALUES($idhora,$idcurso,$dia) ";

        }else if($flag == 2){
            $sql = "delete from horario_curso where idhorariocurso = $idhorario;";
        }

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            $data = array();
        }

        return $data;
    }

    public function consultahorarioCurso($dia, $hora) {

        $db = Conexion::connection();

        $sql = "SELECT 
        horario_curso.idhorariocurso,
    instructores.Nombres
    FROM horario_curso
    INNER JOIN instructores ON horario_curso.id_Instructor=instructores.id_Instructor
    WHERE horario_curso.idhora = $hora AND horario_curso.dia = $dia";

        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            $data = array();
        }

        return $data;
    }

}
