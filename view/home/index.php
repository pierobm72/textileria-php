<?php   require('../../templates/header.php')?>
  <!-- Carrousel -->
  <!-- Slider main container -->
  <div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->       
      <?php include('slider.php')?>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    <!-- If we need scrollbar -->
    <div class="swiper-scrollbar"></div>
  </div>

  <!-- Nosotros -->
  <section class="nosotros" id="nosotros">
    <div class="nosotros__container container">
      <div class="nosotros__contenido">
        <div class="nosotros__titulo-contenido">
          <p class="nosotros__titulo">Cotiza tu proyecto</p>
          <p class="nosotros__titulo nosotros__titulo--bold">LLámanos (01) 697-2052</p>
        </div>
        <div class="nosotros__texto-container">
          <p class="nosotros__parrafo">Somos Grupo San Isidro - Taller de Textileria Perúana, una empresa del rubro
            textil con más de 20 años de experiencia en la industria de la moda.</p>

          <p class="nosotros__parrafo">Trabajamos nuestras telas con uno de los mejores algodones del mundo.</p>

          <p class="nosotros__parrafo">Contamos con una vasta estructura productiva, comercial y administrativa, para
            brindarle a nuestros clientes la calidad que buscan en la tela.</p>

          <p class="nosotros__parrafo">¡Llámanos ahora!</p>
        </div>
        <a href="#" class="button">Continua</a>
      </div>
      <div class="nosotros__images">
        <img src="../../build/img/asset 1.jpeg" alt="Nosotros Imagen" class="nosotros__image">
        <img src="../../build/img/asset 2.jpeg" alt="Nosotros Imagen" class="nosotros__image">
      </div>

    </div>
  </section><!-- Nosotros -->
  <!-- Servicios -->
  <section class="servicios" id="servicios">
    <div class="servicios__container">
      <picture class="servicios__image-container">
        <img class="servicios__image" src="../../build/img/servicio_costura.png" alt="">
      </picture>
      <div class="servicios__contenido container">
        <div class="servicios__heading">
          <h2 class="servicios__titulo">Nuestros Servicios</h2>
          <p class="servicios__descripcion">Contamos con años de experiencia en la confección de polos, pantalones,
            camisas, blusas, ropa para empresas, ropa deportiva, ropa publicitaria, ropa industrial, etc. Hacemos envíos
            al interior y al exterior del país.</p>
        </div>
        <div class="servicios__body">
          <div class="servicios__wrap">
            <h3 class="servicios__body-title">Ropa para empresas</h3>
            <p class="servicios__body-text">Elaboramos prendas de vestir para empresas, uniformes para colegios y
              pedidos que requieran.</p>
          </div>
          <div class="servicios__wrap">
            <h3 class="servicios__body-title">Ropa publicitaria</h3>
            <p class="servicios__body-text">Confeccionamos prendas publicitarias como polos, casacas, etc. De todo tipo
              de material.</p>
          </div>
          <div class="servicios__wrap">
            <h3 class="servicios__body-title">Servicio de costura para mayoristas</h3>
            <p class="servicios__body-text">Realizamos todo tipo de servicio de costura para empresarios mayoristas.</p>
          </div>
          <div class="servicios__wrap">
            <h3 class="servicios__body-title">Servicio para emprendedores</h3>
            <p class="servicios__body-text">Trabajamos colecciones a partir de 100 unidades por modelo.</p>
          </div>
        </div>
        <div class="servicios__consulta">>> Consultar por correo o whatsapp la cantidad mínima de producción para
          cualquiera de los servicios.</div>
      </div>
    </div>
  </section><!-- Servicios -->

  <!-- Galeria -->
  <section class="galeria" id="galeria">
    <h3 class="galeria__titulo">Galeria</h3>
    <p class="galeria__subtitulo">Servicios que brindamos</p>
    <div class="galeria__contenedor">
      <img class="galeria__imagen" src="https://tinyurl.com/25u3fkgd" alt="Galeria imagen">
      <img class="galeria__imagen" src="https://tinyurl.com/22kkrqx7" alt="Galeria imagen">
      <img class="galeria__imagen" src="https://tinyurl.com/26jeeko5" alt="Galeria imagen">
      <img class="galeria__imagen" src="https://tinyurl.com/25p47pjh" alt="Galeria imagen">
      <img class="galeria__imagen" src="https://tinyurl.com/23q9gjn6" alt="Galeria imagen">
      <img class="galeria__imagen" src="https://tinyurl.com/2cata6dm" alt="Galeria imagen">
    </div>
  </section><!-- Galeria -->

  <!-- Ubicacion -->
  <section class="ubicacion" id="mapa">
    <h3 class="ubicacion__titulo">Ubícanos</h3>
    <iframe class="ubicacion__mapa"
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d768.7534030471943!2d-76.97559369315292!3d-12.019496122047126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c5c89b0b5773%3A0xfaa5be343d188101!2sX2JF%2B6VM%2C%20San%20Juan%20de%20Lurigancho%2015457!5e0!3m2!1ses-419!2spe!4v1668464631605!5m2!1ses-419!2spe"
      width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section><!-- Ubicacion -->

  <!-- Formulario -->

  <section class="contacto" id="contacto">
    <div class="contacto__contenedor container">
      <div class="contacto__formulario">
        <div class="formulario">
          <div class="formulario__contenido">
            <h2 class="formulario__heading">Déjanos tu consulta ¡Cotiza Aquí!</h2>

            <form class="formulario__consulta" method="post">
              <div class="formulario__campo">
                <input id="nombre"class="formulario__input" placeholder=" Nombre Completo" name="nombre"></input>
              </div>
              <div class="formulario__campo">
                <input id="email" class="formulario__input" placeholder=" Correo" name="email" type="email"></input>
              </div>
              <div class="formulario__campo">
                <textarea id="mensaje" class="formulario__input" rows="10" name="mensaje"></textarea>
              </div>
              <!-- <input type="submit" class="button submit" value="Enviar consulta"> -->
              <button class="button submit" disabled id="enviar">Enviar consulta</button>
            </form>
            <?php 
                require '../../mail.php';
              ?>
              <!-- Mostrar los errores -->
            <?php foreach($errores as $error){?>
                <div class="alerta error">                
                    <?= $error ?>
                </div>
            <?php }?>

          </div>
        </div>
      </div>
      <div class="contacto__contenido">
        <h3 class="contacto__contenido-titulo">¡Confianza y calidad!</h3>
        <p class="contacto__parrafo">Somos grupo san ignacio, una empresa de producción de telas. Trabajamos con
          empresas reconocidas. Contamos con más de 20 años de experiencia en la fabricación textil.</p>

        <h4 class="contacto__encuentranos">Encuentranos en</h4>
        <p class="contacto__direccion">Av. Los Proceres Mz. N1 Lote 1-A2 Int. 14 Urb. Fundo de Campoy.<br>
          San Juan de Lurigancho - Lima - Lima.<br>
          Toda visita o reunión es previa cita agendada por correo.</p>
        <p class="contacto__horario">
          Horario de atención: De lunes a viernes de 10am a 6pm <br>
          Sábados de 10am a 1pm
        </p>
        <p class="contacto__direccion">
          Teléfono: (01) 697-2052
        </p>
        <a href="#" class="contacto__email">textiles.sanisidro@gmail.com</a>


      </div>
    </div>
  </section> <!-- Formulario -->

 <?php require('../../templates/footer.php')?>