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
    <!------------ NAV--------------->
    <header>
        <nav id="nav" class="nav1">
            <div class="contenedor-nav">
                <div class="logo">
                    <img src="app/resources/img/logo.png" alt="">
                </div>
                <div id="enlaces" class="enlaces">
                    <a href="index.php?v=forms" id="enlace-registros" class="btn-header">Registro</a>
                    <a id="enlace-guardar" class="btn-header">Guardar Horario</a></li>
                    <a id="usuario" class="btn-header">Bienvenido, <?php echo $_SESSION['user'][1] ?></a>
                    <a href="app/models/salir.php" id="salir" class="btn-header">Salir</a>
                </div>
                <div class="icono" id="open">
                    <span>&#9776;</span>
                </div>
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
                    <th colspan="6">Ficha: 
                        <select name="" id="ficha">
                            <option value="">Seleccione alguno</option>
                        </select>
                    </th>
                </tr>
                <tr>
                    <th colspan="6">Trimestre: 
                        <select name="" id="trimestre">
                            <option value="">Seleccione alguno</option>
                        </select>
                    </th>
                </tr>
                <tr>
                    <th colspan="1">Hora</th>
                    <th colspan="1">L</th>
                    <th colspan="1">M</th>
                    <th colspan="1">X</th>
                    <th colspan="1">J</th>
                    <th colspan="1">V</th>
                </tr>
                <tr>
                    <th class="horas">6:00-9:00AM</th>
                    <td class="drops" id="drop1" data-dia="Lunes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop2" data-dia="Martes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop3" data-dia="Miercoles" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop4" data-dia="Jueves" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop5" data-dia="Viernes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">9:00-12:00PM</th>
                    <td class="drops" id="drop6" data-dia="Lunes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop7" data-dia="Martes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop8" data-dia="Miercoles" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop9" data-dia="Jueves" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop10" data-dia="Viernes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">12:00-3:00PM</th>
                    <td class="drops" id="drop11" data-dia="Lunes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop12" data-dia="Martes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop13" data-dia="Miercoles" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop14" data-dia="Jueves" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop15" data-dia="Viernes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">3:00-6:00PM</th>
                    <td class="drops" id="drop16" data-dia="Lunes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop17" data-dia="Martes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop18" data-dia="Miercoles" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop19" data-dia="Jueves" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop20" data-dia="Viernes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">6:00-9:00PM</th>
                    <td class="drops" id="drop21" data-dia="Lunes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop22" data-dia="Martes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop23" data-dia="Miercoles" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop24" data-dia="Jueves" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drop25" data-dia="Viernes" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
            </table>
            
        </div>
    </div>
</main>
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