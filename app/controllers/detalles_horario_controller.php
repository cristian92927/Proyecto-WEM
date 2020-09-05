<?php

require_once "app/models/conexion.php";

class horario_controller{
	public function __construct(){}

    public static function Main($option,$array=[]){
    	$horario = new horario_controller();
    	switch($option){
    		case 0:
            $result=$login->consult();
            break;

            case 1:
            $result=$login->insert($array);
            break;
    	}
    }
    public function consult(){
        $conexion=Conexion::connection();
        $sql = "SELECT * FROM detalles_horario";
        return $conexion->query($sql);
    }
    public function insert($array){
        $conexion=Conexion::connection();
        $sql = "SELECT * from detalles_horario WHERE hora_inicio = '$array[0]' AND hora_fin = '$array[1]' ";
        $result = $conexion->query($sql);
        $filas = $result->num_rows;
        if($filas === 0){
            $stmt=$conexion->prepare("INSERT INTO detalles_horario(hora_inicio, hora_fin, id_Ambiente, id_Competencia, id_Instructor, id_Horario, id_Usuario) 
                VALUES( ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiiiii",$array[0],$array[1],$array[2],$array[3],$array[4],$array[5],$array[6]);
            $stmt->execute();
        }
    }
}

?>