<?php

class User {
    public static function registration() {
        $user = DB::connect()->select("SELECT * FROM users WHERE login='{$_POST['login']}'");
        if (!empty($user)) return "Такой пользователь уже есть";

        DB::connect()->insert('users', [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'login' => $_POST['login'],
            'password' => $_POST['password'],
            'isAdmin' => 0,
        ]);
        
        setcookie('login', $_POST['login'], time() + 3600 * 24);
        setcookie('password', $_POST['password'], time() + 3600 * 24);
        setcookie('name', $_POST['name'], time() + 3600 * 24);
        setcookie('surname', $_POST['surname'], time() + 3600 * 24);

        header('location: http://level-2/lesson-6/?page=lk');
    }

    public static function login() {
        $user = DB::connect()->select("SELECT * FROM users WHERE login='{$_POST['login']}'") or Die('Нет такого пользователя');

        if ($user[0]['login'] == $_POST['login'] && $user[0]['password'] == $_POST['password']) {
            setcookie('login', $user[0]['login'], time() + 3600 * 24);
            setcookie('password', $user[0]['password'], time() + 3600 * 24);
            setcookie('name', $user[0]['name'], time() + 3600 * 24);
            setcookie('surname', $user[0]['surname'], time() + 3600 * 24);

            header('location: http://level-2/lesson-6/?page=lk');
        } else {
            Die('Неверный логин или пароль');
        }
    }

    public static function logout() {
        setcookie('login', $_POST['login'], 0);
        setcookie('password', $_POST['password'], 0);
        setcookie('name', $_POST['name'], 0);
        setcookie('surname', $_POST['surname'], 0);

        header('location: http://level-2/lesson-6/?page=login');
    }

    public static function checkAuthorisation() {
        if ($_COOKIE['login'] && $_COOKIE['password']) {
            $user = DB::connect()->select("SELECT * FROM users WHERE login='{$_COOKIE['login']}' AND password='{$_COOKIE['password']}'");
            $isAuthorized = !empty($user);
        } else {
            $isAuthorized = false;
        }

        return $isAuthorized;
    }
}