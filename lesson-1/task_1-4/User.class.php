<?php

class User {
    private $name;
    private $cart = [];

    public function __construct($name) {
        $this->name = $name;
        $this->isAdmin = false;
    }

    public function info() {
        $cart = json_encode($this->cart);
        $isAdmin = $this->isAdmin ? 'true' : 'false';
        echo "name: $this->name<br>cart: $cart<br>admin: $isAdmin";
    }

    public function cleanCart() {
        $this->cart = [];
    }
}

// $user = new User("Петя");

// $user->info();