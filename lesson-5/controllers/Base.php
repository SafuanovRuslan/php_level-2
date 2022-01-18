<?php


spl_autoload_register(function($class) {
    if ( file_exists("../models/$class.php") ) {
        include "../models/$class.php";
        return;
    }
});


class Base {
    public static function render($page, $params) {
        include "views/Main.php";
    }

    public static function registration() {
        $_SERVER['location'] = 'http://level-2/lesson-5?p=404';
    }
}

if ($_GET['act']) {
    switch ($_GET['act']) {
        case 'registration':
            echo 'Wellcome club, Bari';
            break;
        case 'login':
            $user = new User($db);
            $user->login();
            break;
    }
}