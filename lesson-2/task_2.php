<?php

trait singletonConstruct {
    private function __construct($phrase) { 
        self::$phrase = $phrase;
    }
}

 class Singleton {
    private static $instance;
    private static $phrase;

     use singletonConstruct;

    public static function getInstance($phrase = '') {
        if ( empty(self::$instance) ) {
            self::$instance = new self($phrase);
        }
        return self::$instance;
    }
    public function doAction() {
        echo self::$phrase;
    }
 }

Singleton::getInstance("Привет")->doAction();
Singleton::getInstance("Мир")->doAction();
Singleton::getInstance()->doAction();