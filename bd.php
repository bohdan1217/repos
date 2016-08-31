<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=moo', 'bohdan1217', 'bohdan1712');
    $db->exec("set names utf8");
    }
catch (PDOException $e) {
    print "Помилка :" . $e->getMessage() . "<br/>";
    die();
}


