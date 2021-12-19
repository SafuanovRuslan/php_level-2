<?php
include "Good.class.php";

class SimpleGood extends Good {
    public function __construct($cost) {
        parent::__construct($cost);
    }

    public function calculateFinalCost() {
        return $this->getCost();
    }
}

$good = new SimpleGood(900);
// echo $good->calculateFinalCost();