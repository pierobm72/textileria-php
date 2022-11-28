<?php 

function estaAutenticado() : bool {
    session_start();

    $auth = $_SESSION["login"] ?? null;
       
    if($auth){
            return true;
    }

    return false;
    

}
function prettyPrint($mensaje, $modo=0) 
{
    if($modo == 0){
        echo "<pre>";
        var_export($mensaje);
        echo "</pre>";
    } else {
        echo "<pre>";
        var_dump($mensaje);
        echo "</pre>";
    }

    
   //Imprimir array en la consola
    $object = json_encode($mensaje);
    print_r('<script>console.log('.$object.')</script>');
   
}

function debuguear($mensaje, $modo=0){
    if($modo == 0){
        echo "<pre>";
        var_dump($mensaje);
        echo "</pre>";
        exit();
    } else {
        echo "<pre>";
        var_dump($mensaje);
        echo "</pre>";
    }
}