<?php

require_once "app/models/conexion.php";

class detalleshorario_controller{
    
    public function __construct(){}

    public static function Main($option,$array=[]){
        $login = new detalleshorario_controller();
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
        $sql = "SELECT id_Detalles_Horario, dia, hora_inicio, hora_fin, Nombres, Color, Nombre_Ambiente, Nombre_Comp FROM detalles_horario dh INNER JOIN instructor i on dh.id_Instructor = i.id_Instructor INNER JOIN ambiente a on dh.id_Ambiente = a.id_Ambiente INNER JOIN competencia c on dh.id_Competencia = c.id_Competencia";
        return $conexion->query($sql);
    }
    public function insert($array){
        $conexion=Conexion::connection();
        $sql = "SELECT * from detalles_horario WHERE dia = '$array[0]' AND hora_inicio = '$array[1]' AND hora_fin = '$array[2]' ";
        $result = $conexion->query($sql);
        $filas = $result->num_rows;
        if($filas === 0){
            $stmt=$conexion->prepare("INSERT INTO detalles_horario(dia, hora_inicio, hora_fin, id_Ambiente, id_Competencia, id_Instructor, id_Horario, id_Usuario) 
                VALUES( ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssiiiii",$array[0],$array[1],$array[2],$array[3],$array[4],$array[5],$array[6], $array[7]);
            $stmt->execute();
        }
    }
    // public function update($array){
    //     $conexion=Conexion::connection();
    //     $sql = "UPDATE instructor SET Nombres=?,Apellidos=?,Correo=?,Color=?, id_TipoContrato = ? WHERE id_Instructor=?";
    //     $stmt = $conexion->prepare($sql);
    //     $stmt->bind_param("sssssi",$array[0],$array[1],$array[2],$array[3],$array[4],$array[5]);
    //     $stmt->execute();
    // }


    // public function delete($array){
    //     $conexion=Conexion::connection();
    //     $sql = "DELETE FROM instructor WHERE id_Instructor = ? ";
    //     $stmt=$conexion->prepare($sql);
    //     $stmt->bind_param("i",$array[0]);
    //     $stmt->execute();
    // }
    // public function consultUpdate($array){
    //     $conexion=Conexion::connection();
    //     $sql = "SELECT * FROM instructor WHERE id_Instructor = $array[0]";
    //     $result = $conexion->query($sql);
    //     return $result;
    // }
}

?>