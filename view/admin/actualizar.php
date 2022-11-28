<?php 
   require ('../../includes/app.php');
   $auth = estaAutenticado();
    
    if(!$auth){
        header('location: ../home/index.php');
    }

   //Validar lar URL por id Valido
   $id = $_GET["id"];
   $id = filter_var($id,FILTER_VALIDATE_INT);
   
   if(!$id){
       header("location: index.php");
   }
   $db = conectar();

    $query = "SELECT * FROM slider where id='$id'";
    $resultado = mysqli_query($db,$query);
    $slider = mysqli_fetch_assoc($resultado);

    
    //Arreglo con mensajes de errores
    $errores = [];

    $titulo =  $slider['titulo'];
    $descripcion =  $slider['descripcion']; 
    $cantidadCaracteres = 10;

    
    if($_SERVER["REQUEST_METHOD"] === "POST"){      
             
       
        $titulo =  mysqli_real_escape_string($db, $_POST["titulo"]);        
        $descripcion =  mysqli_real_escape_string($db, $_POST["descripcion"]);        
        $imagen = $_FILES['imagen'];

        if(!$titulo){
            $errores [] = "El titulo es obligatorio";
        }
        

        if(strlen($descripcion) < $cantidadCaracteres){
            $errores [] = "La descripcion debe tener minimo $cantidadCaracteres caracteres";
        }        

        

        //Validar por tamaño
        $medida = 1024 * 2000;

        if($imagen['size'] > $medida ){
            $errores [] = "La imagen debe ser menor a 2Mb";
        }

        if(empty($errores)){     

           /* SUBIDA DE ARCHIVOS */

            //Crear carpeta
            $carpetaImagenes = "../../image";
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);

            }
            // $nombreImagen = "";
            
            //Verificar si se ha cargado una imagen
            if($imagen["name"]){
                //Eliminar la imagen de la carpeta imagen
                unlink("$carpetaImagenes/{$slider['imagen']}");

                // Nombre unico de la imagen
                $nombreImagen = md5(uniqid(rand(),true)) .strrchr($_FILES['imagen']['name'], '.');
                
                //Subir la imagen
                move_uploaded_file($imagen["tmp_name"],"$carpetaImagenes/$nombreImagen");
                
            } else {
                
                $nombreImagen = $slider["imagen"];
            }      

            //Insertar los registros 
            $query = "UPDATE slider SET titulo='$titulo',descripcion='$descripcion',imagen='$nombreImagen' WHERE id=$id";
            $resultado = mysqli_query($db,$query);

            if($resultado){
                //Resultado correcto
                header("location: index.php?resultado=2");
            }
        }

    }      
    
    include('../../templates/header.php');
?>
    
    <main class="contenedor seccion">
        <div style="margin-bottom: 90px;"></div>
        <h1>Crear</h1>
        <!-- Mostrar los errores -->
        <?php foreach($errores as $error){?>
            <div class="alerta error">                
                <?= $error ?>
            </div>
        <?php }?>

        
        <a href="index.php" class="boton boton-verde">Volver</a>      
        <form action="" class="formulario" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>
                <label for="titulo">Titulo:</label>

                <input type="text" id="titulo" name="titulo" placeholder="Titulo slider" value="<?= $titulo ?>">
                <label for="descripcion">Descripcion:</label>

                <textarea id="descripcion" name="descripcion"><?= $descripcion ?></textarea>

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png" >
                <img src="../../image/<?= $slider["imagen"] ?>" class="imagen-actualizar"></a>

                
            </fieldset>

            
                <input type="submit" value="Actualizar slider" class="boton boton-verde">
        </form>
    </main>
    
<?php 
     include('../../templates/footer.php');
?>
