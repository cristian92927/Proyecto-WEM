<?php 
@session_start();
require_once "app/controllers/controller.php";
if(!isset($_SESSION['user'])){
    header ("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Required meta tags --->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--- SEO meta tags --->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--- Title --->
    <title>WEM</title>
    <!--- Stylesheets --->
    <link rel="stylesheet" href="app/resources/css/crud.css">
    <link rel="stylesheet" href="app/resources/iconos/icomoon/style.css">
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
    <!------------ forms ------------->
    <div class="container" >
        <div id="form">
            <i class="icon-cross" id="cerrar"></i>
            <!------------ formulario agregar ------------->
            <form id="agregar" action="crud.php" method="POST">
                <h1>Crear</h1>
                <input type="text" id="nombres" placeholder="Nombres">
                <input type="text" id="apellidos" placeholder="Apellidos">
                <input type="text" id="documento" placeholder="Documento">
                <input type="text" id="correo" placeholder="Correo electronico">
                <input type="text" id="horas" placeholder="Cantidad de horas">
                <div><label>Elige un color: </label><input type="color" id="color" value="#ffffff"></div>

                <button id="agregar"  class="horas"name="agregar">Crear</button>
            </form>
            <!------------ formulario editar ------------->
            <form id="editar" action="crud.php" method="POST">
                <h1>Modificar</h1>
                <input type="hidden" id="id">
                <input type="text" id="Nnombres" placeholder="Nombres">
                <input type="text" id="Napellidos" placeholder="Apellidos">
                <input type="text" id="Ncorreo" placeholder="Correo electronico">
                <input type="text" id="Ncantidad_horas" placeholder="Cantidad de horas">
                <div><label>Elige un color: </label><input type="color" id="Ncolor"></div>
                

                <button type="submit" id="agregar"  class="horas"name="agregar">Modificar</button>
            </form>
            
        </div>
    </div>
    
    <!------------ NAV--------------->
    <header>
        <nav id="nav" class="nav1">
            <div id="logo">
                <img src="app/resources/img/logo.png" alt="">
            </div>
            <div id="enlaces" class="enlaces">
                <ul id="menu">
                    <li id="desplegar">
                        <a>Registro</a>
                        <ul id="desplegable">
                            <li><a id="enlace-crear" class="btn-header">Crear Instructor</a></li>
                            <li><a>Crear Ficha</a></li>
                            <li><a>Crear Trimestre</a></li>
                            <li><a>Registrar Ficha</a></li>
                        </ul>
                    </li>
                    <li><a id="enlace-guardar" class="btn-header">Guardar Horario</a></li>
                    <li><a id="usuario" class="btn-header">Bienvenido, <?php echo $_SESSION['user'][1] ?></a></li>
                    <li><a href="app/models/salir.php" id="salir" class="btn-header">Salir</a></li>
                </ul>
            </div>
            <div class="icono" id="open">
                <span>&#9776;</span>
            </div>
        </nav>
    </header>
    <!---------- MAIN -------------->
    <main>
        <div class="table">

            <div class="cajas">
                <div id="titulo">
                    Instructores
                </div>
                <div class="cont_caja" id="lugar">

                </div>
            </div>

            <table>
                <tr>
                    <th colspan="6" id="trimestre">Trimestre:</th>
                </tr>
                <tr>
                    <th colspan="6" id="aula">Lugar:</th>
                </tr>
                <tr>
                    <th colspan="1">Horas</th>
                    <th colspan="1">L</th>
                    <th colspan="1">M</th>
                    <th colspan="1">X</th>
                    <th colspan="1">J</th>
                    <th colspan="1">V</th>
                </tr>
                <tr>
                    <th class="horas">6:00-9:00AM</th>
                    <td class="drops" id="drop1" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop2" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop3" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop4" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop5" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">9:00-12:00PM</th>
                    <td class="drops" id="drop6" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop7" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop8" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop9" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop10" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">12:00-3:00PM</th>
                    <td class="drops" id="drop11" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop12" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop13" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop14" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop15" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">3:00-6:00PM</th>
                    <td class="drops" id="drop16" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop17" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop18" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop19" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop20" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">6:00-9:00PM</th>
                    <td class="drops" id="drop21" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop22" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop23" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop24" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop25" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
            </table>
            
        </div>
    </div>
</main>
<!----------------- FOOTER ----------------->
<footer id="contacto">
    <div class="footer">
        <div class="marca-logo">
            <img src="app/resources/img/Logo.png" alt="">
        </div>
        <div id="frase">
            <p>La pasión e innovación es lo que nos distingue del resto.</p>
        </div>
        <div class="iconos">
            <ul>
                <li><a href=""><i class="icon icon-facebook">Facebook</i></a></li>
                <li><a href=""><i class="icon icon-github">GitHub</i></a></li>
                <li><a href=""><i class="icon icon-youtube">Youtube</i></a></li>
                <li><a href=""><i class="icon icon-instagram">Instagram</i></a></li>
                <li><a href=""><i class="icon icon-linkedin">LinkedIn</i></a></li>
            </ul>
        </div>
    </div>
</footer> 
<!--- Javascriprt ---->

<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script src="app/resources/js/nav.js"></script>
<script src="app/resources/js/loader.js"></script>
<script src="app/resources/js/crud.js"></script>
<script type="text/javascript" src="app/resources/js/crud_forms.js"></script>

</body>
</html>