<?php
spl_autoload_register(function($class) {
    if ( file_exists("controllers/$class.php") ) {
        include "controllers/$class.php";
        return;
    }
});

// https://localhost?page=lk&act=home

if ($_GET) {
    switch ($_GET['page']) {
        case 'lk':
            Base::render('lk', ['title' => 'личный кабинет']);
            break;
        case 'registration':
            Base::render('registration', ['title' => 'регистрация']);
            break;
        case 'login':
            Base::render('login', ['title' => 'вход']);
            break;
        default:
            base::render('404', ['title' => '404']);
    }
} else {
    Base::render('home', ['title' => 'главная']);
}