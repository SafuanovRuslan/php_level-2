<header class="header">
    <h1>Welcome to the empty site!</h1>
    <?php
    if ($isAuthorized):?>
        <div>
        <a href="?">Главная</a> | <a href="?page=catalog">Каталог</a> | <a href="?page=lk">Личный кабинет</a> (<?=$_COOKIE['name']." ".$_COOKIE['surname'];?>) | <a href="?page=login&action=logout">Выход</a>
        </div>
    <?php else:?>
        <div>
        <a href="?">Главная</a> | <a href="?page=catalog">Каталог</a> | <a href="?page=registration">Регистрация</a> | <a href="?page=login">Вход</a>
        </div>
    <?php endif;?>
</header>