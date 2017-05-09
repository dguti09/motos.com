<!DOCTYPE html>

<html lang="es">

<head>
    <title>Iniciar Sesion -  - Mi Eds App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
    <meta charset="utf-8">
</head>

<body>
    <!--nav-bar-->

    <nav>
        <div class="nav-wrapper #424242 grey darken-3">
            <a href="#!" class="brand-logo center">Mi Mundo Motos</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="login.php"><i class="material-icons left">home</i>Inicio</a></li>
                <!-- <li><a href="mobile.html"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li> -->
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="login.php"><i class="material-icons right">home</i>Inicio</a></li>
                <!-- <li><a href="mobile.html"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li> -->
            </ul>
        </div>
    </nav>

    <!--fin-nav-bar-->


    <!--LOGIN-->

    <div class="container">
        <div class="row">
            <div class="col m3 ">
                <h2></h2>
                <p> </p>
            </div>
            <div class="col m6 z-depth-1">
                <h2 class="center-align">Iniciar Sesion</h2>
                <div class="row">
                    <form class="col m12" action="Controllers/login.php" method="post">
                        <div class="row">
                            <div class="input-field col m12">
                                <i class="material-icons prefix">account_circle</i>
                                <input name="username" id="username" type="text" class="validate">
                                <label for="username">email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m12">
                                <i class="material-icons prefix">send</i>
                                <input id="password" name="password" type="password" class="validate">
                                <label for="pass">Contraseña</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m12">
                                <p>
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Recordarme</label>
                                </p>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <div class="col m12">
                                <p class="right-align">
                                    <button class="btn btn-large waves-effect #d32f2f red darken-2" type="submit" value="LOGIN" name="action">Iniciar Sesion
                                    <i class="material-icons right">done</i>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- FIN LOGIN      -->

<!--footer-->
<main></main>
 <footer class="page-footer #424242 grey darken-3">
          <div class="container">
            <div class="row">
             
            </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 KnowLine S.A.S
            <a class="grey-text text-lighten-4 right" href="#!">Mundo Motos</a>
            </div>
          </div>
        </footer>

<!--fin footer-->


<!--imports js-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
<!--fin imports js-->
    <!--nav lateral responsivo-->
    <script>
        $(document).ready(function () {

            $(".button-collapse").sideNav();

        })
    </script>

    <!--fin nav lateral responsivo-->
</body>

</html>