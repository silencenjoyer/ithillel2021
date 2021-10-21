<?php
spl_autoload_register(function ($class) {
    if(file_exists('./lib/' . $class . '.php')) {
        require_once './lib/' . $class . '.php';
    } 
    
    else if (file_exists('./generators/' . $class . '.php')) {
        require_once './generators/' . $class . '.php';
    }
});