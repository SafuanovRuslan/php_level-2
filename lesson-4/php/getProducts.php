<?php
define('DB_NAME', 'php_learning_safuanov');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', '');
define('DB_LIMIT', 3);

try {
    $db = new PDO("mysql:host=localhost;dbname=".DB_NAME, DB_LOGIN, DB_PASSWORD);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

if ( is_numeric($_GET['goods']) ) {
    $stmt = $db->query("SELECT * FROM goods WHERE id >= {$_GET['goods']} LIMIT ". DB_LIMIT, PDO::FETCH_ASSOC);
    $goods = $stmt->fetchAll();
    print_r( json_encode($goods) );
}
?>