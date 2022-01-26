<?php

class ProductController extends BaseController {
    private $title;
    private $page;
    private $actionRequest;

    public function __construct() {
        $this->page = 'product';
        $this->title = "Товар № {$_GET['id']}";

        if ($_GET['action']) {
            $this->actionRequest = Good::{$_GET['action']}();
        }

        self::render($this->page, [
            'title' => $this->title,
            'product' => $this->actionRequest,
        ]);
    }
}