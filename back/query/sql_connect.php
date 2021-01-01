<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'zoolemag';

    $connection = mysqli_connect($servername, $username, $password, $dbname);

    if(!$connection)
        die('Connection failed : ') . $e->getMessage();
?>