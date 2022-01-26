<?php
include_once "config.php";
include_once "autoload.php";


// http://level-2/lesson-6/?page=index&action=registration


if ($_GET["page"]) {
    switch ($_GET["page"]) {
        case "registration":
        case "login":
            new UserController;
            break;
        case "lk":
            new LKController;
            break;
        case "catalog":
            new CatalogController;
            break;
        case "product":
            new ProductController;
            break;
        default:
            BaseController::render('404', ['title' => '404']);
            break;
    }
} else {
    BaseController::render('home', ['title' => 'Главная']);
}