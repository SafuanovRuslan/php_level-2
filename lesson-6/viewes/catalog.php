<?php $goods = Good::getGoods();?>

<div class="goods-list">
    <?php foreach ($goods as $key => $good):?>
    <div class="good">
        <div class="good__title"><?= $good['title'];?></div>
        <div class="good__price"><?= $good['price'];?></div>
        <button class="good__button" id="<?= $good['id'];?>">Заказать</button>
    </div>
    <?php endforeach;?>
</div>

<?php













// <!-- 
// <div id="">
//     <h2 class="title"></h2>
//     <p class="price"></p>
// </div>
// -->