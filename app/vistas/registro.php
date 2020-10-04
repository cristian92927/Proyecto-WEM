<?php
require_once "app/controllers/controller.php";
$regE = "";
if (!empty($_POST['nombres']) && !empty($_POST['apellidos'])) {
    $array = [];
    array_push($array, $_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['contrasena']);
    $registro = new controller();
    $result   = $registro->Login(1, $array);
    if ($result == null) {
        $regE = "Correo ya registrado!";
    } else {
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
  <!------- form ---------->
  <div class="container">
      <form id="form" method="POST" class="formulario">
        <a href="index.php"><img src="app/resources/img/Logo.png" class="avatar" alt="Avatar Image"></a>
        <h1>Registro</h1>
        <p><?php echo $regE; ?></p>
        <p id="alerta" class="alerta"></p>
        <!--- Input nombres ----->
        <input type="text" class="input" name="nombres" id="name">
        <label>Nombres*</label>
        <!--- Input apellidos ----->
        <input type="text" class="input" name="apellidos" id="lastname">
        <label>Apellidos*</label>
        <!--- Input email ----->
        <input type="text" class="input" name="correo" id="email">
        <label>Correo*</label>
        <!--- Input password ----->
        <input type="password" class="input" name="contrasena" id="pw">
        <label>Contraseña*</label>
        <!--- Input password2 ----->
        <input type="password" class="input" name="contrasena2" id="pw2">
        <label>Confirmar contraseña</label>
        <!--- Nombre enviar ----->
        <button type="submit" class="input" name="registrar" id="boton">Registrar</button>
        <!--- Etiqueta para regresar al modulo de inicio de sesión --->
        <p>¿Ya tienes una cuenta? <a href="index.php?v=sesion">Iniciar sesión</a></p>
      </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="app/resources/js/loader.js"></script>
  <script src="app/resources/js/registro.js"></script>
</body>
</html>