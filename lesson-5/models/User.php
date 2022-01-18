<?php
define('DB_NAME', 'php_learning_safuanov');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', '');

try {
    $db = new PDO("mysql:host=localhost;dbname=".DB_NAME, DB_LOGIN, DB_PASSWORD);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registration() {
        // аналогично login(), но с добавлением данных в ДБ и куки
    }

    public function login() {
        if ($_COOKIE['login'] && $_COOKIE['password']) {
            $stmt = $this->db->query("SELECT * FROM users WHERE login = `{$_COOKIE['login']}`", PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll();

            if ( empty($user) ) {
                $_SERVER["location"] = "/lesson-5?p=login";
            }

            if ($user['password'] == $_COOKIE['password']) {
                $_SERVER["location"] = "/lesson-5?p=lk";
            }
        }

        if ($_POST) {
            $stmt = $this->db->query("SELECT * FROM users WHERE login = `{$_POST['login']}`", PDO::FETCH_ASSOC);
            $user = $stmt->fetchAll();

            if ( empty($user) ) {
                $_SERVER["location"] = "/lesson-5?p=login";
            }

            if ($user['password'] == $_POST['password']) {
                setcookie('login', $user['login'], 3600*24*1000);
                setcookie('password', $user['password'], 3600*24*1000);
                setcookie('name', $user['name'], 3600*24*1000);
                setcookie('surname', $user['surname'], 3600*24*1000);
                setcookie('viewedPages', $user['viewed_pages'], 3600*24*1000);
                $_SERVER["location"] = "/lesson-5?p=lk";
            }
        }
    }
}

$user = new User($db);

$user->login();