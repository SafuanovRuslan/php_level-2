<?php

// Автоподключения классов
spl_autoload_register("autoload");

function autoload($className) {
    $dirs = [
        'controllers',
        'models',
        'viewes',
    ];

    $found = false;
    foreach ($dirs as $dir) {
        $filePath = __DIR__ . '/' . $dir . '/' . $className . '.php';

        if (is_file($filePath)) {
            include($filePath);
            $found = true;
        }
    }
        
    if (!$found) {
        throw new Exception('Unable to load ' . $className);
    }
    return true;
}