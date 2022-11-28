<?php 
require_once('includes/app.php');
$db = conectar();   

/* if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header("Location: index.html");
} */

$errores = [];
$nombre = "";
$email = "";
$mensaje = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nombre = $_POST["nombre"];
    $email  = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $mensaje = $_POST["mensaje"];

    if(!$nombre){
        $errores [] = "El Nombre es obligatorio";
    }

    if(!$email){
        $errores [] = "El email esta vacio o es invalido";
    }

    if(!$mensaje){
        $errores [] = "El Mensaje es obligatorio";
    }

    if(empty($errores)){
        //Insertar los registros 
        $query = "INSERT INTO `consulta`(`nombre`, `email`, `consulta`) VALUES ('$nombre','$email','$mensaje')";
        $resultado = mysqli_query($db,$query);

    } 
}