<?php $goods = $params['actionRequest']?>

<div class="goods-list">
    <?php foreach ($goods as $key => $good):?>
    <div class="good">
        <div class="good__title"><a href="?page=product&action=getProduct&id=<?= $good['id'];?>"><?= $good['title'];?></a></div>
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