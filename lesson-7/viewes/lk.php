<?php 
if (!$isAuthorized) header('location: /lesson-7');
$orders = Good::getOrders();
?>

<h1><?= $_COOKIE['name']?> <?= $_COOKIE['surname']?></h1>

<div class="orders-list">
    <?php foreach ($orders as $key => $order):?>
    <div class="order" id="<?= 'order-'.$order['id']?>">
        <div class="order__title"><a href="?page=product&id=<?= $order['good_id'];?>"><?= $order['title'];?></a></div>
        <div class="order__price"><?= $order['price'];?></div>
        <div class="order__price"><?= Date('H:i:s d.m.Y', $order['time']);?></div>
        <button class="order__button" id="<?= $order['id'];?>">Отменить</button>
    </div>
    <?php endforeach;?>
</div>