<?php
include "User.class.php";
// Админ может удалять пользователей

class Admin extends User {
    public function __construct($name) {
        parent::__construct($name);
        $this->isAdmin = true;
    }

    public function deleteUser() {
        // Удаляем пользователя
    }
}

$admin = new Admin("Ашот");

$admin->info();