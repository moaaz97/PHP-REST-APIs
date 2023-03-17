<?php
    $connection = new PDO('mysql:host=localhost;dbname=php_rest_api', 'root', '');

    //set PDO Attributes
    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $connection->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    const APP_NAME = 'PHP REST API';
?>

