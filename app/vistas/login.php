<?php

@session_start();
require_once "app/controllers/controller.php";
$loginE = "";
if (!empty($_POST['correo']) && !empty($_POST['pw'])) {
    $login = new controller();
    $array = [];
    array_push($array, $_POST['correo'], $_POST['pw']);
    $_SESSION['user'] = $login->Login(0, $array);
    $resultado        = $_SESSION['user'];
    if ($resultado != null) {
        header("Location: index.php?v=fichas");
    } else {
        $loginE = "Usuario o contraseña incorrectos";
    }
}

if (isset($_POST['enviar'])) {
    $login = new controller();
    $array = [];
    $token = uniqid();
    array_push($array, $token, $_POST['receptor']);
    $login->Login(2, $array);
}
?>
  <!DOCTYPE html>
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
    <!------ form -------->
    <div class="container">
        <form method="POST" class="formulario" id="containerRecuperar">
         <a href="index.php"><img src="app/resources/img/Logo.png" alt="Avatar Image"></a>
        <h1>Recuperar Contraseña</h1>
          <input type="text" class="input" name="receptor" required>
          <label>Ingrese su correo</label>
          <button type="submit" name="enviar">Recuperar Contraseña</button>
          <p>Volver a <a id="volver">Inicio de Sesion</a></p>
        </form>
        <form method="POST"  class="formulario" id="containerSesion">
          <a href="index.php"><img src="app/resources/img/Logo.png" alt="Avatar Image"></a>
          <h1>Inicio de sesión</h1>
          <p><?php echo $loginE; ?></p>
          <input type="text" class="input" name="correo" id="email" required>
          <label>Correo*</label>
          <input type="password" class="input" name="pw" required>
          <label>Contraseña</label>
          <button type="submit" name="ingresar">Iniciar sesión</button>
          <p>¿Has olvidado tu contraseña? <a id="recuperar">Click aqui</a></p>
          <p>¿No tienes una cuenta? <a href="index.php?v=registrar">Registrate</a></p>
        </form>

    </div>


    <script src="app/resources/js/loader.js"></script>
    <script type="text/javascript" src="app/resources/js/login.js"></script>
  </body>
  </html>