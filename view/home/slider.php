<?php
//Base de datos
require ('../../includes/app.php');
$db = conectar();

$query = "SELECT * FROM slider";
$resultado = mysqli_query($db, $query);
?>

<?php while ($slider = mysqli_fetch_assoc($resultado)) : ?>
    <div class="swiper-slide" style="background:linear-gradient(rgba(15,15,15,0.80), rgba(15,15,15,0.80)), url('../../Image/<?= $slider['imagen'] ?>">
        <h2 class="swiper-title"><?= $slider['titulo'] ?></h2>
        <p class="swiper-description"><?= $slider['descripcion'] ?></p>
        <div class="swiper-buttons">
            <a href="#contacto" class="button white">Cotiza ahora</a>
            <a href="#servicios" class="button white">Ver Servicios</a>
        </div>
    </div>
<?php endwhile; ?>
<?php mysqli_close($db)?>