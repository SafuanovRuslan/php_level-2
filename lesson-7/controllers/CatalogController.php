<?php

class CatalogController extends BaseController {
    private $title;
    private $page;
    private $actionRequest;

    public function __construct() {
        $this->title = 'Каталог';
        $this->page = 'catalog';

        if ($_GET['action']) {
            $this->actionRequest = Good::{$_GET['action']}();
        }

        self::render($this->page, [
            'title' => $this->title,
            'actionRequest' => $this->actionRequest,
        ]);
    }
}