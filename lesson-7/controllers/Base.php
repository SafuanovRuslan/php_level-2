<?php

class Base {
    public static function render($page, $params) {
        $isAuthorized = User::checkAuthorisation();
        if ($page == 'product') {
            $params['product'] = Good::getProduct();
        }?>

        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title><?= SITE_NAME . $params['title']?></title>
                <link rel="stylesheet" href="viewes/css/style.css">
            </head>
            <body>
                <?php
                include_once('viewes/header.php');?>

                <main class="content">
                    <?php include_once("viewes/$page.php");?>
                </main>

                <?php
                include_once('viewes/footer.php');?>
            </body>
        </html>
        <?php
    }
}

if ($_GET['action']) {
    switch ($_GET['action']) {
        case 'registration':
            User::registration();
            break;
        case 'login':
            User::login();
            break;
        case 'logout':
            User::logout();
            break;
        case 'order':
            Good::makeOrder();
            break;
        case 'cancelOrder':
            Good::cancelOrder();
            break;
        case 'getProduct':
            Good::getProduct();
            break;
    }
}