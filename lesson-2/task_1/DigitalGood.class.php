<?php
include "SimpleGood.class.php";

class DigitalGood extends Good {
    public function __construct(SimpleGood $good) {
        parent::__construct($good->getCost()/2);
    }

    public function calculateFinalCost() {
        return $this->getCost();
    }
}

$digitalGood = new DigitalGood($good); // Обычный товар стоит 900
echo $digitalGood->calculateFinalCost();