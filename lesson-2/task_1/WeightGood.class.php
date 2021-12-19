<?php
include "SimpleGood.class.php";

class WeightGood extends Good {
    public function __construct($cost, $weight) {
        parent::__construct($cost);
        $this->weight = $weight;
    }

    public function calculateFinalCost() {
        return $this->getCost() * $this->weight;
    }
}

$weightGood = new WeightGood(800, 0.4);
echo $weightGood->calculateFinalCost();