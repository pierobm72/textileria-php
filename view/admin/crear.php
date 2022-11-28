<?php 
   require ('../../includes/app.php');

   $auth = estaAutenticado();
    
    if(!$auth){
        header('location: ../home/index.php');
    }
   $db = conectar();

   
    
    //Arreglo con mensajes de errores
    $errores = [];

    $titulo =  "";
    $descripcion =  ""; 
    $cantidadCaracteres = 10;

    
    if($_SERVER["REQUEST_METHOD"] === "POST"){       

          
        $imagen =  $_FILES['imagen'];        
       
        $titulo =  mysqli_real_escape_string($db, $_POST["titulo"]);        
        $descripcion =  mysqli_real_escape_string($db, $_POST["descripcion"]);        
        $imagen = $_FILES['imagen'];

        if(!$titulo){
            $errores [] = "El titulo es obligatorio";
        }
        

        if(strlen($descripcion) < $cantidadCaracteres){
            $errores [] = "La descripcion debe tener minimo $cantidadCaracteres caracteres";
        }        

        if(!$imagen['name'] || $imagen['error']){
            $errores [] = "La imagen es obligatoria";
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
            // Nombre unico de la imagen
            $nombreImagen = md5(uniqid(rand(),true)) .strrchr($_FILES['imagen']['name'], '.');

            //Subir la imagen
            move_uploaded_file($imagen["tmp_name"],"$carpetaImagenes/$nombreImagen");
           
           
            

            //Insertar los registros 
            $query = "INSERT INTO slider (titulo,descripcion,imagen)VALUES ('$titulo','$descripcion','$nombreImagen')";
            $resultado = mysqli_query($db,$query);

            if($resultado){
                //Resultado correcto
                header("location: index.php?resultado=1");
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
        <form class="formulario" method="post" action="crear.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Informacion General</legend>
                <label for="titulo">Titulo:</label>

                <input type="text" id="titulo" name="titulo" placeholder="Titulo Slider" value="<?= $titulo ?>">
                <label for="descripcion">Descripcion:</label>

                <textarea id="descripcion" name="descripcion"><?= $descripcion ?></textarea>

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png" >

                
            </fieldset>

            
                <input type="submit" value="Crear Slider" class="boton boton-verde">
        </form>
    </main>
    
<?php 
     include('../../templates/footer.php');
?>
