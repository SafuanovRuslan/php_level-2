<?php if ($isAuthorized) header('location: ?page=lk');?>

<form action="?action=registration" method="post">
    <p>Имя:</p>
    <input type="text" name="name" id="name"><br><br>
    <p>Фамилия:</p>
    <input type="text" name="surname" id="surname"><br><br>
    <p>Логин:</p>
    <input type="text" name="login" id="login"><br><br>
    <p>Пароль:</p>
    <input type="password" name="password" id="password"><br><br>
    <input type="submit" value="Зарегистрироваться">
</form>