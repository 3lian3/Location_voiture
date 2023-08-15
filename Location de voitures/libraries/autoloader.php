<?php

spl_autoload_register(function($className){
    $className = str_replace("\\", "/", $className);
    $filePath = "libraries/$className.php";

    if (file_exists($filePath)) {
        require_once($filePath);
    } else {
        echo "Fichier $filePath non trouvé!";
    }
});
