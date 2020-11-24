<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
    
    $className = str_replace('\\', '/', $className);
    // echo $className;
    $path = 'classes/';
    $extension = '.php';
    $fullPath = $path.$className.$extension;

    // echo $fullPath;
    // if (!file_exists($fullPath)) {
    //     return false;
    // }
    include_once $fullPath;
}