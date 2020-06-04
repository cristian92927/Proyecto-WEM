<?php 
@session_start();
require_once "app/controllers/controller.php";
$loginE = "";

if(!empty($_POST['correo']) && !empty($_POST['pw'])){
  $login = new controller();
  $array = [];
  array_push($array,$_POST['correo'],$_POST['pw']);
  $_SESSION['user'] = $login->Login(0, $array);
  $resultado = $_SESSION['user'];
  if($resultado != null){
    header("Location: crud.php");
  }else{
    $loginE = "Usuario o contraseña incorrectos";
  }
}
?>
<!DOCTYPE html5>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Inicio de sesión | WEM</title>
  <link rel="stylesheet" href="app/resources/css/login.css">
</head>

<body class="hidden">
    <!----------- LOAD ------------>
    <div class="centrado" id="onload">
        <section>
            <div class="loader">
                <div class="loader-inner"></div>
            </div>
            <h3>Loading...</h3>
        </section>
    </div>
  <!------ fondo ------->
  <img src="app/resources/img/header3.jpg" alt="">
  <!------ form -------->
  <div class="container">
      <div class="login-box">
        <a href="index.php"><img src="app/resources/img/Logo.png" alt="Avatar Image"></a>
        <h1>Inicio de sesión</h1>
        <p><?php echo $loginE; ?></p>
        <form method="POST">
          <input type="text" name="correo" placeholder="example@example.edu.co" required>
          <input type="password" name="pw" placeholder="Ingrese su contraseña" required>
          <button type="submit" name="ingresar">Iniciar sesión</button>
          <p>¿Has olvidado tu contraseña? <a href="#">Clck aqui</a></p>
          <p>¿No tienes una cuenta? <a href="registro.php">Registrate</a></p>
        </form>
      </div>
  </div>

  <script src="app/resources/js/loader.js"></script>
</body>
</html>