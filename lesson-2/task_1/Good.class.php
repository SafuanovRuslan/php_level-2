<?php

abstract class Good {
    private $cost;

    public function __construct($cost) {
        $this->cost = $cost;
    }

    public function getCost() {
        return $this->cost;
    }

    abstract function calculateFinalCost();
}