<?php
  require_once "app/controllers/controller.php";
  $regE ="";
  if(!empty($_POST['nombres']) && !empty($_POST['apellidos'])){
    $array = [];
    array_push($array, $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['contrasena']);
    $registro = new controller();
    $result = $registro->Login(1,$array);
    if($result== null){
      $regE = "Correo ya registrado!";
    }else{
      $regE = "";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Formulario De Registro | WEM</title>
  <link rel="stylesheet" href="app/resources/css/registro.css">

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
    <!-------- fondo ----------->
  <img src="app/resources/img/header3.jpg" alt="">
  <!------- form ---------->
  <div class="container">
    <div class="login-box">
      <a href="index.php"><img src="app/resources/img/Logo.png" class="avatar" alt="Avatar Image"></a>
      <h1>Registro</h1>
      <p><?php echo $regE; ?></p>
      <form id="form" method="POST">
        <input type="text" name="nombres" id="name" placeholder="Nombres" required>
        <input type="text" name="apellidos" placeholder="Apellidos" required>
        <input type="email" name="correo" id="mail" placeholder="ejemplo@misena.edu.co" required>
        <input type="password" name="contrasena" id="pw" placeholder="Contraseña" required minlength="4" maxlength="8">
        <input type="password" name="contrasena2" id="pw2" placeholder="Confirmar contraseña" required>
        <button type="submit" name="registrar">Registrar</button>
        <p>¿Ya tienes una cuenta? <a href="index.php?v=sesion">Iniciar sesión</a></p>
      </form>
    </div>
  </div>
  
  <script src="app/resources/js/loader.js"></script>
  <script src="app/resources/js/registro.js"></script>
</body>
</html>