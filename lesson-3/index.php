<?php
$path = $_SERVER["DOCUMENT_ROOT"]."/lesson-3/public/img/";
$files = array_slice(scandir($path.'small'), 2);


require_once 'lib/Twig/Autoloader.php';
Twig_Autoloader::register();

try {
    // Указывает, где хранятся шаблоны
    $loader = new Twig_Loader_Filesystem('templates');
    // Инициализируем Twig
    $twig = new Twig_Environment($loader);
    // Подгружаем шаблон
    $template = $twig->loadTemplate('main.tmpl');
    // Передаем в шаблон переменные и значения
    // Выводим сформированное содержание
    echo $template->render(array(
      'files' => $files,
    ));
} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}