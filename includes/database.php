<?php 
function conectar() : mysqli{
    $db = mysqli_connect('localhost','root','','textileria');
    $db->set_charset("utf8");

    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    } 
    
    return $db;
}

