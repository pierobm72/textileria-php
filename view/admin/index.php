<?php  
require ('../../includes/app.php');

$auth = estaAutenticado();
    
    if(!$auth){
        header('location: login.php');
    }

$db = conectar();

$query = "SELECT * FROM slider";
$resultado = mysqli_query($db, $query); 

//Muestra mensaje condicional
$mensaje =$_GET["resultado"] ?? null;  

if($_SERVER["REQUEST_METHOD"] === "POST"){   

       
    $id = filter_var($_POST["id"],FILTER_VALIDATE_INT);

    //validar id tipo num
    if($id){
        //Eliminar imagen del server
        $query = "SELECT imagen FROM slider WHERE id=$id";
        $resultado = mysqli_query($db,$query);
        $slider = mysqli_fetch_assoc($resultado);

       //Eliminar el archivo
        unlink("../../image/{$slider['imagen']}");
        
        //Eliminar slider
        $query = "DELETE FROM slider where id=$id";
        $resultado = mysqli_query($db,$query);

        
        
        if($resultado){
            header('location: index.php?resultado=3');
    }
    }

    
}

include('../../templates/header.php');


?>
<h2 class="admin-h2">Administador</h2>
<main class="contenedor seccion">
        <?php if(intval($mensaje) === 1) :?>
            <p class="alerta exito">Slider creado correctamente</p>
        <?php elseif (intval($mensaje) === 2) :?>
            <p class="alerta amarillo">Slider actualizado correctamente</p>
        <?php elseif (intval($mensaje) === 3) :?>
            <p class="alerta amarillo">Slider eliminado correctamente</p>
        <?php endif; ?>

        <a href="crear.php" class="boton boton-verde">Crear slider</a>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php //Listar las propiedades desde la base de datos ?>
                <?php while($slider = mysqli_fetch_assoc($resultado)): ?>                  
                <tr>
                    <td><?= $slider["id"] ?></td>
                    <td><?= $slider["titulo"] ?></td>
                    <td><?= $slider["descripcion"] ?></td>
                    <td><img src="../../image/<?= $slider["imagen"] ?>" class="imagen-tabla"></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $slider['id'] ?>">
                            <button class="boton-rojo-block w-100" type="submit">Eliminar</button>
                        </form>
                        <a href="actualizar.php?id=<?= $slider["id"] ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile;?>
                
            </tbody>
        </table>        

    </main>
<?php require('../../templates/footer.php')?>