<?php

require_once "app/models/conexion.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
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
            $result=$login->setToken($array);
            break;

            case 3:
            $result=$login->recuperarPw($array);
            break;

            case 4:
            $result=$login->consultarToken($array);
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
    public function setToken($array){
        $conexion=Conexion::connection();
        $sql = "SELECT Correo from usuario WHERE Correo = '$array[1]' ";
        $result = $conexion->query($sql);
        $filas = $result->num_rows;
        if($filas === 1){
            $sql = "UPDATE usuario SET token = ? WHERE correo = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("ss",$array[0], $array[1]);
            $stmt->execute();
            $message  = "<html><head>";
            $message .= "<style type='text/css'>";
            $message .= "
            .container-msg{
              width: 100%;
              background: #ccc;
              text-align: center;
            }
            .boton{
              margin: 20px auto;
              padding: 10px;
              border-radius: 8px;
              border-style: none;
              border: 1px solid gray;
              box-shadow: 2px 2px 4px 0 black;
              background: orange;
              cursor: pointer;
            }
            a{
              text-decoration: none;
              cursor: pointer;
              color: black;
            }
            a:hover > .boton{
              color: white;
              box-shadow: 1px 1px 2px 0 black;
            }
            ";
            $message .= "</style></head><body>";
            $message .= "
            <div class='container-msg'>
                <h1>Restablecer contraseña</h1>
                <p>Para restablecer su contraseña haga click en el siguiente boton: </p>

                <a href='http://localhost/Proyecto-WEM/index.php?v=recuperarPw&token=".$array[0]."'><button class='boton'>Restablecer Contraseña</button></a>
              </div>
            ";  
            $message .= "</body></html>";
            $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();
            $mail->CharSet ='UTF-8';                                         // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'pikador.pikador40@gmail.com';                     // SMTP username
            $mail->Password   = '1238938482Jpg.';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('pikador.pikador40@gmail.com', 'Proyecto Wem');
            $mail->addAddress($array[1]);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Restablecer contraseña';
            $mail->Body    = $message;

            if($mail->send()){
                echo '<script>alert("Se envio correctamente"); </script>';    
            }else{
                echo '<script>alert("No se envio el correo"); </script>';
            }
            
        }else{
            echo '<script>alert("El correo electronico no existe"); </script>';
        }
    }
    public function recuperarPw($array){
        $conexion=Conexion::connection();
        $sql = "UPDATE usuario SET Contrasena = MD5(?) WHERE token = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss",$array[0], $array[1]);
        if($stmt->execute()){
            $sql = "UPDATE usuario SET token = null WHERE token = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $array[1]);
            $stmt->execute();
            echo "<script>
            alert('Su contraseña ha cambiado con exito!');
            window.location = 'index.php?v=sesion';
            </script>";
        }
        
    }
    public function consultarToken($array){
            $conexion=Conexion::connection();
            $sql = "SELECT * from usuario WHERE token = ?";
            $stmt=$conexion->prepare($sql);
            $stmt->bind_param("s",$array[0]);
            $stmt->execute();
            $result=$stmt->get_result();
            return $result->fetch_row();
        }
}
?>