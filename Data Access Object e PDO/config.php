<?php
//Registra a função dada como implementação de __autoload()
spl_autoload_register(function($class_name){
    //DIRECTORY_SEPARATOR é uma Constante pré-definida (/)
    $file_name = "class".DIRECTORY_SEPARATOR.$class_name.".php";
    if(file_exists(($file_name))){
        require_once ($file_name);
    }
});
?>