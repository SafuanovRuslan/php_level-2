<?php

class UserController extends BaseController {
    private $title;
    private $page;
    private $actionRequest;

    public function __construct() {
        $this->page = $_GET['page'];
        $this->title = ($_GET['page'] == 'registration') ? 'Регистрация' : 'Авторизация';

        if ($_GET['action']) {
            $this->actionRequest = User::{$_GET['action']}();
        } else {
            self::render($this->page, [
                'title' => $this->title,
                'actionRequest' => $this->actionRequest,
            ]);
        }
    }
}