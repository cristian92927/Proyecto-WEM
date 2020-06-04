<?php 
@session_start();
require_once "app/controllers/controller.php";
if(!isset($_SESSION['user'])){
    header ("Location: index.php");
}
/*$result = $_SESSION['user'];
if ($result == null) {
    header("Location:Login.php");
}*/

$regE ="";
if(isset($_POST["agregar"])){
    $array = [];
    array_push($array, $_POST['nombres'], $_POST['apellidos'], $_POST['documento'], $_POST['correo'], $_POST['cantidad-horas'], $_POST['color']);
    $registro = new controller();
    $result = $registro->instructor(1,$array);
}
if(!empty($_POST['documentoBorrar'])){
    $array = [];
    array_push($array, $_POST['documentoBorrar']);
    $borrar = new controller();
    $result = $borrar->instructor(3,$array);
}
if(!empty($_POST['documentoEditar'])){
    $array = [];
    array_push($array, $_POST['documentoEditar']);
    $borrar = new controller();
    $result = $borrar->instructor(2,$array);
}
?>
<!DOCTYPE html5>
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
            <!------------ form1 ------------->
            <form id="formulario1" action="crud.php" method="POST">
                <h1>Crear</h1>
                <input type="text" id="nombres" name="nombres" placeholder="Nombres">
                <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos">
                <input type="text" id="doc-istructor" name="documento" placeholder="Documento">
                <input type="text" id="correo" name="correo" placeholder="Correo electronico">
                <input type="text" id="cantidad-horas" name="cantidad-horas" placeholder="Cantidad de horas">
                <input type="color" name="color" id="color">

                <button id="agregar" name="agregar">Crear</button>
            </form>
            <!------------ form2 ------------->
            <form id="formulario2" action="" method="POST">
                <h1>Eliminar</h1>
                <input type="text" id="doc-instructor2" name="documentoBorrar" placeholder="Ingrese la cedula"> 
                <button id="eliminar">Eliminar</button>
            </form>
            <!------------ form3 ------------->
            <form id="formulario3" action="" method="POST">
                <h1>Modificar</h1>
                <input type="text" id="doc-instructor3" name="documentoEditar" placeholder="Ingrese la cedula"> 
                <button id="editar" name="editar">Enviar</button>
            </form>
            
        </div>
    </div>
    
    <!------------ NAV--------------->
    <header>
        <nav id="nav" class="nav1">
            <div class="contenedor-nav">
                <div class="logo">
                    <img src="app/resources/img/logo.png" alt="">
                </div>
                <div class="enlaces" id="enlaces">
                    <a id="enlace-crear" class="btn-header">Crear Instructor</a>
                    <a id="enlace-borrar" class="btn-header">Borrar Instructor</a>
                    <a id="enlace-modificar" class="btn-header">Modificar Instructor</a>
                    <a href="#" id="usuario" class="btn-header">Bienvenido, Usuario</a>
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
                <div class="cont_caja" id="lugar">
                    <?php 
                    $consulta = new controller();
                    $resultC = $consulta->instructor(0);
                    while($mostrar = $resultC->fetch_row()){
                        ?>
                        <div class="caja" id="<?php echo 'caja'.$mostrar[0] ?>" style="background-color: <?php echo $mostrar[6] ?>" draggable="true" ondragstart="drag(event)"><?php echo $mostrar[1] ?></div>
                    <?php } ?>
                </div>
            </div>
            <div class="flecha" id="left"><i class="icon-arrow-left"></i></div>
            <div class="horario">
               <table id="lunes">
                <tr>
                    <th colspan="4">Trimestre: </th>
                </tr>
                <tr>
                    <th rowspan="2">Horas</th>
                    <th colspan="3">Lunes</th>
                </tr>
                <tr>
                    <th class="salon">Info 1</th>
                    <th class="salon">Info 2</th>
                    <th class="salon">Info 3</th>
                </tr>
                <tr>
                    <th class="horas">6-7am</th>
                    <td class="drops" id="drops1" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops2" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops3" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">7-8am</th>
                    <td class="drops" id="drops4" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops5" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops6" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">8-9am</th>
                    <td class="drops" id="drops7" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops8" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops9" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">9-10am</th>
                    <td class="drops" id="drops10" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops11" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops12" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">10-11am</th>
                    <td class="drops" id="drops13" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops14" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops15" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">11-12am</th>
                    <td class="drops" id="drops16" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops17" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops18" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">12-1pm</th>
                    <td class="drops" id="drops19" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops20" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops21" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">1-2pm</th>
                    <td class="drops" id="drops22" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops23" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops24" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">2-3pm</th>
                    <td class="drops" id="drops25" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops26" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops27" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">3-4pm</th>
                    <td class="drops" id="drops28" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops29" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops30" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">4-5pm</th>
                    <td class="drops" id="drops31" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops32" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops33" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">5-6pm</th>
                    <td class="drops" id="drops34" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops35" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops36" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">6-7pm</th>
                    <td class="drops" id="drops37" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops38" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops39" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">7-8pm</th>
                    <td class="drops" id="drops40" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops41" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops42" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">8-9pm</th>
                    <td class="drops" id="drops43" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops44" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops45" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
            </table>
            <table id="martes">
                <tr>
                    <th colspan="4">Trimestre: </th>
                </tr>
                <tr>
                    <th rowspan="2">Horas</th>
                    <th colspan="3">Martes</th>
                </tr>
                <tr>
                    <th class="salon">Info 1</th>
                    <th class="salon">Info 2</th>
                    <th class="salon">Info 3</th>
                </tr>
                <tr>
                    <th class="horas">6-7am</th>
                    <td class="drops" id="drops46" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops47" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops48" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">7-8am</th>
                    <td class="drops" id="drops49" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops50" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops51" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">8-9am</th>
                    <td class="drops" id="drops52" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops53" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops54" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">9-10am</th>
                    <td class="drops" id="drops55" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops56" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops57" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">10-11am</th>
                    <td class="drops" id="drops58" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops59" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops60" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">11-12am</th>
                    <td class="drops" id="drops61" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops62" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops63" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">12-1pm</th>
                    <td class="drops" id="drops64" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops65" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops66" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">1-2pm</th>
                    <td class="drops" id="drops67" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops68" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops69" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">2-3pm</th>
                    <td class="drops" id="drops70" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops71" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops72" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">3-4pm</th>
                    <td class="drops" id="drops73" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops74" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops75" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">4-5pm</th>
                    <td class="drops" id="drops76" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops77" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops78" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">5-6pm</th>
                    <td class="drops" id="drops79" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops80" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops81" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">6-7pm</th>
                    <td class="drops" id="drops82" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops83" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops84" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">7-8pm</th>
                    <td class="drops" id="drops85" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops86" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops87" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">8-9pm</th>
                    <td class="drops" id="drops88" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops89" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops90" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
            </table>
            <table id="miercoles">
                <tr>
                    <th colspan="4">Trimestre: </th>
                </tr>
                <tr>
                    <th rowspan="2">Horas</th>
                    <th colspan="3">Miercoles</th>
                </tr>
                <tr>
                    <th class="salon">Info 1</th>
                    <th class="salon">Info 2</th>
                    <th class="salon">Info 3</th>
                </tr>
                <tr>
                    <th class="horas">6-7am</th>
                    <td class="drops" id="drops91" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops92" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops93" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">7-8am</th>
                    <td class="drops" id="drops94" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops95" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops96" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">8-9am</th>
                    <td class="drops" id="drops97" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops98" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops99" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">9-10am</th>
                    <td class="drops" id="drops100" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops101" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops102" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">10-11am</th>
                    <td class="drops" id="drops103" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops104" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops105" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">11-12am</th>
                    <td class="drops" id="drops106" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops107" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops108" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">12-1pm</th>
                    <td class="drops" id="drops109" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops110" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops111" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">1-2pm</th>
                    <td class="drops" id="drops112" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops113" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops114" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">2-3pm</th>
                    <td class="drops" id="drops115" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops116" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops117" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">3-4pm</th>
                    <td class="drops" id="drops118" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops119" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops120" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">4-5pm</th>
                    <td class="drops" id="drops121" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops122" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops123" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">5-6pm</th>
                    <td class="drops" id="drops124" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops125" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops126" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">6-7pm</th>
                    <td class="drops" id="drops127" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops128" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops129" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">7-8pm</th>
                    <td class="drops" id="drops130" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops131" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops132" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">8-9pm</th>
                    <td class="drops" id="drops133" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops134" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops135" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
            </table>
            <table id="jueves">
                <tr>
                    <th colspan="4">Trimestre: </th>
                </tr>
                <tr>
                    <th rowspan="2">Horas</th>
                    <th colspan="3">Jueves</th>
                </tr>
                <tr>
                    <th class="salon">Info 1</th>
                    <th class="salon">Info 2</th>
                    <th class="salon">Info 3</th>
                </tr>
                <tr>
                    <th class="horas">6-7am</th>
                    <td class="drops" id="drops136" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops137" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops138" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">7-8am</th>
                    <td class="drops" id="drops139" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops140" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops141" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">8-9am</th>
                    <td class="drops" id="drops142" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops143" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops144" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">9-10am</th>
                    <td class="drops" id="drops145" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops146" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops147" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">10-11am</th>
                    <td class="drops" id="drops148" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops149" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops150" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">11-12am</th>
                    <td class="drops" id="drops151" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops152" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops153" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">12-1pm</th>
                    <td class="drops" id="drops154" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops155" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops156" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">1-2pm</th>
                    <td class="drops" id="drops157" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops158" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops159" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">2-3pm</th>
                    <td class="drops" id="drops160" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops161" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops162" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">3-4pm</th>
                    <td class="drops" id="drops163" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops164" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops165" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">4-5pm</th>
                    <td class="drops" id="drops166" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops167" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops168" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">5-6pm</th>
                    <td class="drops" id="drops169" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops170" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops171" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">6-7pm</th>
                    <td class="drops" id="drops172" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops173" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops174" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">7-8pm</th>
                    <td class="drops" id="drops175" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops176" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops177" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">8-9pm</th>
                    <td class="drops" id="drops178" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops179" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops180" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
            </table>
            <table id="viernes">
                <tr>
                    <th colspan="4">Trimestre: </th>
                </tr>
                <tr>
                    <th rowspan="2">Horas</th>
                    <th colspan="3">Viernes</th>
                </tr>
                <tr>
                    <th class="salon">Info 1</th>
                    <th class="salon">Info 2</th>
                    <th class="salon">Info 3</th>
                </tr>
                <tr>
                    <th class="horas">6-7am</th>
                    <td class="drops" id="drops181" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops182" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops183" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">7-8am</th>
                    <td class="drops" id="drops184" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops185" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops186" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">8-9am</th>
                    <td class="drops" id="drops187" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops188" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops189" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">9-10am</th>
                    <td class="drops" id="drops190" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops191" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops192" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">10-11am</th>
                    <td class="drops" id="drops193" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops194" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops195" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">11-12am</th>
                    <td class="drops" id="drops196" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops197" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops198" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">12-1pm</th>
                    <td class="drops" id="drops199" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops200" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops201" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">1-2pm</th>
                    <td class="drops" id="drops202" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops203" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops204" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">2-3pm</th>
                    <td class="drops" id="drops205" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops206" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops207" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">3-4pm</th>
                    <td class="drops" id="drops208" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops209" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops210" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">4-5pm</th>
                    <td class="drops" id="drops211" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops212" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops213" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">5-6pm</th>
                    <td class="drops" id="drops214" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops215" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops216" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">6-7pm</th>
                    <td class="drops" id="drops217" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops218" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops219" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">7-8pm</th>
                    <td class="drops" id="drops220" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops221" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops222" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
                <tr>
                    <th class="horas">8-9pm</th>
                    <td class="drops" id="drops223" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops224" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                    <td class="drops" id="drops225" ondrop="drop(event)" ondragover="allowDrop(event)"></td>
                </tr>
            </table>
        </div>
        <div class="flecha" id="right"><i class="icon-arrow-right"></i></div>
    </div>
</div>
</main>
<!----------------- FOOTER ----------------->
<footer id="contacto">
    <div class="footer contenedor">
        <div class="marca-logo">
            <img src="app/resources/img/Logo.png" alt="">
        </div>
        <div class="iconos">
            <i class="icon icon-facebook"></i>
            <i class="icon icon-github"></i>
            <i class="icon icon-youtube"></i>
            <i class="icon icon-instagram"></i>
            <i class="icon icon-linkedin"></i>
        </div>
        <p>La pasión e innovación es lo que nos distingue del resto</p>
    </div>
</footer> 
<!--- Javascriprt ---->
<script src="app/resources/js/nav.js"></script>
<script src="app/resources/js/loader.js"></script>
<script src="app/resources/js/crud.js"></script>
<script src="app/resources/js/crud_forms.js"></script>
</body>
</html>