<?php

require_once "app/models/conexion.php";

class instructor_controller{

    public function __construct(){}

    public static function Main($option,$array=[]){
        $login = new instructor_controller();
        switch($option){    
            case 0:
            $result=$login->consult();
            break;

            case 1:
            $result=$login->insert($array);
            break;

            case 2:
            $result=$login->delete($array);
            break;

            case 3:
            $result=$login->consultUpdate($array);
            break;

            case 4:
            $result=$login->update($array);
            break;
        }
        return $result;
    }
    public function consult(){
        $conexion=Conexion::connection();
        $sql = "SELECT * from instructor";
        return $conexion->query($sql);
    }
    public function insert($array){
        $conexion=Conexion::connection();
        $sql = "SELECT * from instructor WHERE Documento = '$array[2]' ";
        $result = $conexion->query($sql);
        $filas = $result->num_rows;
        if($filas === 0){
            $stmt=$conexion->prepare("CALL InsertInstructor( ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssis",$array[0],$array[1],$array[2],$array[3],$array[4],$array[5]);
            $stmt->execute();
        }
    }
    public function update($array){
        $conexion=Conexion::connection();
        $sql = "CALL ActualizarInstructor(?, ?, ?, ?,? ,?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssssi",$array[0],$array[1],$array[2],$array[3],$array[4],$array[5]);
        $stmt->execute();
    }


    public function delete($array){
        $conexion=Conexion::connection();
        $sql = "DELETE FROM instructor WHERE id_Instructor = ? ";
        $stmt=$conexion->prepare($sql);
        $stmt->bind_param("i",$array[0]);
        $stmt->execute();
    }
    public function consultUpdate($array){
        $conexion=Conexion::connection();
        $sql = "SELECT * FROM instructor WHERE id_Instructor = $array[0]";
        $result = $conexion->query($sql);
        return $result;
    }
}

?>