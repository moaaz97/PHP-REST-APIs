<?php
    $connection = new PDO('mysql:host=localhost;dbname=phprest', 'root', '');

    //set PDO Attributes
    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $connection->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

