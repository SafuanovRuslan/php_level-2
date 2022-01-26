<?php if ($isAuthorized) header('location: ?page=lk&action=getOrders');?>

<form action="?page=login&action=login" method="post">
    <p>Логин:</p>
    <input type="text" name="login" id="login"><br><br>
    <p>Пароль:</p>
    <input type="password" name="password" id="password"><br><br>
    <input type="submit" value="Войти">
</form>