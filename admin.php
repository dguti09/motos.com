
<!doctype html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title><?= isset($PageTitle) ? $PageTitle : "Mi Mundo Motos"?></title>
    <!-- Additional tags here -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
    <meta charset="utf-8">
    <?php if (function_exists('customPageHeader')){
      customPageHeader();
    }?>
  </head>
 <body>
 <!-- Dropdown Structure -->
<ul id="dropdownInserts" class="dropdown-content">
  <li><a href="addClub.php"><i class="material-icons right">local_gas_station</i>Club</a></li>
  <li><a href="addUser.php"><i class="material-icons right">local_play</i>Presidente</a></li>
  <li><a href="addAlmacen.php"><i class="material-icons right">business</i>Almacen</a></li>
  <li><a href="addAsoc.php"><i class="material-icons right">store_mall_directory</i>Asociacion</a></li>
</ul>
    <nav>
        <div class="nav-wrapper #424242 grey darken-3">
            <a href="#!" class="brand-logo center">Mi EDS App</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="dashboard.php"><i class="material-icons right">home</i>Inicio</a></li>
                <!-- <li><a href="addstation.php"><i class="material-icons right">add_box</i>Agregar Estacion</a></li> -->
                <li><a class="dropdown-button" href="#!" data-activates="dropdownInserts">Insertar Nuevo<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="controllers/logout.php"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="dashboard.php"><i class="material-icons right">home</i>Inicio</a></li>
                <!-- <li><a href="addstation.php"><i class="material-icons right">add_box</i>Agregar Estacion</a></li> -->
                <!-- <li><a class="dropdown-button" href="#!" data-activates="dropdownInserts">Insertar<i class="material-icons right">arrow_drop_down</i></a></li> -->

                <li><a href="controllers/logout.php"><i class="material-icons right">exit_to_app</i>Cerrar Sesion</a></li>
            </ul>
        </div>
    </nav>

<?php 
 echo "Super User";
 ?>

     <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
<!--fin imports js-->
    <!--nav lateral responsivo-->
    <script>
        $(document).ready(function () {

            $(".button-collapse").sideNav();
            $('select').material_select();
  			$('#textarea1').trigger('autoresize');

        })
    </script>

    <!--fin nav lateral responsivo-->
</body>

</html>