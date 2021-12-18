<?php
include "User.class.php";
// Клиент может пополнять счет

class Customer extends User {
    public function __construct($name) {
        parent::__construct($name);
        $this->money = 0;
    }

    public function info() {
        parent::info();
        echo "<br>money: $this->money";
    }

    public function addMoney($money) {
        $this->money += $money;
    }
}

$customer = new Customer("Катя", "Saint-Petersburg");

$customer->addMoney(1500);
$customer->info();