<?php 
   if(!isset($_SESSION)){
    session_start(); 
  }

  $auth = $_SESSION["login"] ?? false;
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grupo san isidro</title>
  <link rel="shortcut icon" href="../../build/img/1718053.png" type="application/atom+xml">

 

  <!-- Swipér -->
  <link rel="stylesheet" href="../../build/CSS/swiper.css">
  <script src="../../build/js/swipper.js."></script>

  <!-- CSS -->
  <!-- <link rel="stylesheet" href="../../build/CSS/tailwind.min.css"> -->
  <link rel="stylesheet" href="../../build/CSS/style.css">
  <link rel="stylesheet" href="../../build/CSS/admin.css">

   <!-- Fuentes -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Open+Sans:wght@300;400;500;700&display=swap"
    rel="stylesheet">

  <!-- Iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
  <!-- CONTENIDO -->
  <!-- Header -->

  <header class="primary-header ">
    <div class="wrap">

      <div class="img">
        <a href="../../index.php"><img src="../../build/img/1718053.png" alt="Logo de pagina" height="70px"></a>
      </div>

      <nav>
        <ul class="primary-navigation" id="primary-navigation" data-visible="false">
          <li>
            <a href="#nosotros" class="header__link">Nosotros</a>
          </li>
          <li>
            <a href="#servicios" class="header__link">Servicios</a>
          <li>
            <a href="#galeria" class="header__link">Galeria</a>
          </li>
          <li>
            <a href="#mapa" class="header__link">Mapa</a>
          </li>
          <li>
            <!-- <a href="#contacto" class="header__link">Contacto</a> -->
            <a href="#contacto" class="header__link">Contacto</a>
          </li>
          <li>
            <a href="#contacto" class="header__link header__link--button">Cotizaciones</a>
          </li>
          <?php if($auth):?>
            <li>
              <a href="../sesion/cerrarSesion.php" class="header__link header__link--button">Cerrar Sesion</a>
            </li>
          <?php endif;?>
        </ul>
      </nav>

      <button class="mobile-nav-toggle" aria-controls="primary-navigation" aria-expanded="false">
        <span class="sr-only">Menu</span>
      </button>
    </div>
  </header>