<?php

try {

    $pdo = new PDO('mysql:host=localhost;dbname=bannerbuilder', 'root', 'root');

} catch (PDOException $e) {

    exit('Database error.');

}

?>