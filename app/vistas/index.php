<!DOCTYPE html>
<html lang="en">

<head>
    <!------ Required meta tags ------>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!------- SEO meta tags -------->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-------- Title ------->
    <title>WEM</title>
    <!------ Stylesheets -------->
    <link rel="stylesheet" href="app/resources/css/index.css">
    <link rel="stylesheet" href="app/resources/iconos/icomoon/style.css">
</head>

<body class="hidden">
    <!----------- LOAD ------------>
    <div class="centrado" id="onload">
        <div class="loader">
            <div class="loader-inner"></div>
        </div>
    </div>
    <!------------ NAV--------------->
    <header id="enlace-inicio">
        <nav id="nav" class="nav1">
            <div class="contenedor-nav">
                <div class="logo">
                    <img src="app/resources/img/logo.png" alt="">
                </div>
                <div class="enlaces" id="enlaces">
                    <a data-enlace="#enlace-inicio" class="btn-header">Inicio</a>
                    <a data-enlace="#enlace-equipo" class="btn-header">Equipo</a>
                    <a data-enlace="#enlace-caracteristica" class="btn-header">Caracteristicas</a>
                    <a data-enlace="#enlace-nosotros" class="btn-header">Nosotros</a>
                    <a data-enlace="#enlace-servicios" class="btn-header">Servicios</a>
                    <a data-enlace="#enlace-contacto" class="btn-header">Contacto</a>
                    <a href="index.php?v=sesion" id="iniciar-sesion">Iniciar Sesión</a>
                    <a href="index.php?v=registrar" id="registrarse">Registrarse</a>
                </div>
                <div class="icono" id="open">
                    <span>&#9776;</span>
                </div>
            </div>
        </nav>
        <div class="textos">
            <h1 class="title move">Work Environment Managment</h1>
            <h2 class="subtitle move2">Gestion de Ambientes de Trabajo</h2>
            <a href="index.php?v=sesion"><button class="btn">Crear Horario</button></a>
        </div>
    </header>
    <!---------- MAIN -------------->
    <main>
        <section class="team contenedor" id="enlace-equipo">
            <h3>Nuestro equipo</h3>
            <p class="after">Conoce a la gente asombrosa y creativa</p>
            <div class="card">
                <div class="content-card">
                    <div class="people">
                        <img src="app/resources/img/people1.jpg" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>Juan Pablo Guevara</h4>
                        <p>UX/UI designer</p>
                    </div>
                </div>
                <div class="content-card">
                    <div class="people">
                        <img src="app/resources/img/people2.jpg" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>Cristian Trujillo</h4>
                        <p>UX/UI designer</p>
                    </div>
                </div>
                <div class="content-card">
                    <div class="people">
                        <img src="app/resources/img/people3.jpg" alt="">
                    </div>
                    <div class="texto-team">
                        <h4>Pablo Andres Henao</h4>
                        <p>UX/UI designer</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="features" id="enlace-caracteristica">
            <div class="contenedor">
                <h3>Caracteristicas</h3>
                <p class="after">Nos caracterizamos por ser comprometidos con las dudad que se le puedan presentar a nuestros
                clientes, y estamos prestos a colaborar en su ambiente de trabajo.</p>
                <div class="caracteristicas">
                    <div class="caja-caracteristicas">
                        <img src="app/resources/img/sabiduria.png" alt="">
                        <h4>Sabiduría</h4>
                        <p>Sabemos lo importante que es para nuestros clientes la seguridad.</p>
                    </div>
                    <div class="caja-caracteristicas">
                        <img src="app/resources/img/rendimiento.png" alt="">
                        <h4>Gran rendimineto</h4>
                        <p>Queremos que su tiempo pueda ser utilizado en sus labores mas importantes.</p>
                    </div>
                    <div class="caja-caracteristicas">
                        <img src="app/resources/img/limpio.png" alt="">
                        <h4>Diseño limpio</h4>
                        <p>Queremos que nuentros clientes tengan la mejor experiencia de usuario.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="about" id="enlace-nosotros">
            <div class="contenedor">
                <h3>Nosotros</h3>
                <div class="about-img">
                    <img src="app/resources/img/reloj.png" alt="">
                </div>
                <div class="about-text">
                    <p>
                        WEM (Work Environment Managment) es la solucion creada por un grupo de
                        deasarrolladores, para dar solucion a la creación de horarios de los ambientes de
                        trabajo, inicialmente pensado para el servicio nacional de aprendizaje (SENA) para así
                        agilizar y disminuir el tiempo de creación del mismo y recortar al maximo el tiempo
                        empleado en dicha actividad.
                    </p>
                </div>
            </div>
        </section>
        <section class="service" id="enlace-servicios">
            <div class="contenedor">
                <h3>Nuestros Servicios</h3>
                <p class="after">Siempre mejorando para ti</p>
                <div class="servicios">
                    <div class="caja-servicios">
                        <img src="app/resources/img/idea.png" alt="">
                        <h4>Creativos y asombrosos</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                    </div>
                    <div class="caja-servicios">
                        <img src="app/resources/img/calendario.png" alt="">
                        <h4>Creativos y asombrosos</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                    </div>
                    <div class="caja-servicios">
                        <img src="app/resources/img/velocidad.png" alt="">
                        <h4>Creativos y asombrosos</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!----------------- FOOTER ----------------->
    <footer id="enlace-contacto">
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
    <script src="app/resources/js/index.js"></script>
    <script src="app/resources/js/loader.js"></script>
    <script src="app/resources/js/nav.js"></script>
</body>
</html>