<?php

class LKController extends BaseController {
    private $title;
    private $page;
    private $actionRequest;

    public function __construct() {
        $this->page = 'lk';
        $this->title = 'Личный кабинет';

        if ($_GET['action'] == 'getOrders') {
            $this->actionRequest = Good::getOrders();
            self::render($this->page, [
                'title' => $this->title,
                'orders' => $this->actionRequest,
            ]);
        } else {
            $this->actionRequest = Good::{$_GET['action']}();
        }
    }
}