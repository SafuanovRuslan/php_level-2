<?php

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}

// ситуация из урока и идентична заданию 6
$a1 = new A; // нет передаваемых параметров
$b1 = new B; // можно без скобок
$a1->foo(); // 1
$b1->foo(); // 1
$a1->foo(); // 2
$b1->foo(); // 2