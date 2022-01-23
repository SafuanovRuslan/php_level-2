<?php

class Good {
    public static function getGoods() {
        $goods = DB::connect()->select('SELECT * FROM goods');
        return $goods;
    }

    public static function getOrders() {
        $id = DB::connect()->select("SELECT id FROM users WHERE login = '{$_COOKIE['login']}'")[0]['id'];
        $orders = DB::connect()->select("SELECT orders.id, orders.time, goods.title, goods.price FROM orders LEFT JOIN goods ON orders.good_id = goods.id WHERE user_id = $id ORDER BY time DESC");
        return $orders;
    }

    public static function makeOrder() {
        $isAuthorized = User::checkAuthorisation();

        if (!$isAuthorized) {
            echo json_encode('not authorized');
            Die(); // Убивает дальнейший рендеринг, иначе отрисовывается еще и дефолтная страница
        }

        $id = DB::connect()->select("SELECT id FROM users WHERE login = '{$_COOKIE['login']}'");

        DB::connect()->insert('orders', [
            'user_id' => $id[0]['id'],
            'good_id' => $_GET['id'],
            'time' => time(),
        ]);

        echo json_encode('OK');
        Die();
    }

    public static function cancelOrder() {
        $isAuthorized = User::checkAuthorisation();

        if (!$isAuthorized) {
            echo json_encode('not authorized');
            Die(); // Убивает дальнейший рендеринг, иначе отрисовывается еще и дефолтная страница
        }

        DB::connect()->delete('orders', $_GET['id']);

        echo json_encode('OK');
        Die();
    }
}