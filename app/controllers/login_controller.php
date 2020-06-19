<?php

require_once "app/models/conexion.php";

class login_controller{

    private function __construct(){}

    public static function Main($option,$array=[]){
        $login = new login_controller();
        switch($option){    
            case 0:
            $result=$login->consult($array);
            break;

            case 1:
            $result=$login->insert($array);
            break;

            case 2:
            $result=$login->update();
            break;

            case 3:
            $result=$login->delete();
            break;
        }
        return $result;
    }
    public function consult($array){
        $conexion=Conexion::connection();
        $sql = "SELECT * from usuario WHERE Correo = ? AND Contrasena = MD5(?) ";
        $stmt=$conexion->prepare($sql);
        $stmt->bind_param("ss",$array[0],$array[1]);
        $stmt->execute();
        $result=$stmt->get_result();
        return $result->fetch_row();
    }
    public function insert($array){
        $conexion=Conexion::connection();
        $sql = "SELECT * from usuario WHERE Correo = '$array[2]' ";
        $result = $conexion->query($sql);
        $filas = $result->num_rows;
        if($filas === 0){
        $stmt=$conexion->prepare("INSERT INTO usuario(Nombres, Apellidos, Correo, Contrasena) 
            VALUES( ?, ?, ?, MD5(?))");
        $stmt->bind_param("ssss",$array[0],$array[1],$array[2],$array[3]);
        $stmt->execute();
        echo "<script>
        alert('Registrado con exito!');
        window.location = 'index.php?v=sesion';
        </script>";
        return $stmt;
    }
}
public function update($array){}
public function delete($array){}
}
?>