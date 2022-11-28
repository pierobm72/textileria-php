<?php 
    declare(strict_types = 1);
    require ('../../includes/app.php'); 

    include('../../templates/header.php');

    
    $db = conectar();   

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $email  = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
        $password = mysqli_real_escape_string($db,$_POST["password"]);
        $passwordHash = password_hash($password,PASSWORD_BCRYPT);

        if(!$email){
            $errores [] = "El email esta vacio o es invalido";
        }

        if(!$password){
            $errores [] = "El password esta vacio";
        }

        //Si no hay error
        if(empty($errores)){
           
            //Comprobar que el usuario existe
            $query = "SELECT * FROM usuario WHERE email = '$email'";
            $resultado = mysqli_query($db,$query);

            //Verificar si hay contenido en la tabla
            if($resultado->num_rows){

                $usuario = mysqli_fetch_assoc($resultado);

                //Verificar que el password ingresado y el hash de la base de datos sean iguales
                $auth = password_verify($password,$usuario["password"]);
                
                
                if($auth){
                    //Usuario autenticado
                    session_start();

                    //Llenar arreglo de sesion
                    $_SESSION["email"] = $usuario["email"];
                    $_SESSION["login"] = true;
                    header('location: index.php');

                } else {
                    $errores [] = "Password incorrecto";
                }
            } else {
                $errores [] = "Usuario no existe";
            }
        
        }

    }
    
   
    
?>
<p style="margin-bottom: 100px;"></p>
<main class="contenedor seccion ">
    <?php foreach ($errores as $error) :?>
            <div class="alerta error">
                    <?= $error ?>
            </div>
        <?php endforeach?>
     <h1 style="margin-top: 100px;">Iniciar Sesion</h1>    
     <form class="formulario contenido-centrado mx-auto" method="post" >
            <fieldset >
                <legend>Cuenta</legend>

                <label for="email">Tu email: </label>
                <input type="text" id="email" name="email" placeholder="Tu email" >

                <label for="password">Tu password: </label>
                <input type="password" id="password" name="password" placeholder="Tu password" >

            </fieldset> 
            
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
        
   
</main>
<?php 
      require('../../templates/footer.php')
?>
