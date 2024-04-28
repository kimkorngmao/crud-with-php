<?php
    define('DB_NAME', 'crudphp');
    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');

    $connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($connection->connect_error)
        die("Connect error: " . $connection->connect_error);
?>