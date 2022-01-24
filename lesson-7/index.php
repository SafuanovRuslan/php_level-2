<?php
include_once "config.php";
include_once "autoload.php";


// http://level-2/lesson-6/?page=index&action=registration


if ($_GET["page"]) {
    switch ($_GET["page"]) {
        case "registration":
            Base::render('registration', ['title' => '::Регистрация']);
            break;
        case "login":
            Base::render('login', ['title' => '::Вход']);
            break;
        case "lk":
            Base::render('lk', ['title' => '::Личный кабинет']);
            break;
        case "catalog":
            Base::render('catalog', ['title' => '::Каталог']);
            break;
        case "product":
            Base::render('product', ['title' => "::Каталог:{$_GET['id']}"]);
            break;
        default:
            Base::render('404', ['title' => '::404']);
            break;
    }
} else {
    Base::render('home', ['title' => '']);
}