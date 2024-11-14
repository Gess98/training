<?php

require_once '../config/config.php';
require_once '../config/db_connection.php';

// Для версии PHP 8.1 и ниже
if(floatval(phpversion()) < 8.2){
    $id=3;
    $query = "SELECT * FROM users WHERE id=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $id);   // Можно не использовать bind_param("i", $id) а передать все в execute([$id]) версия PHP 8.1
    $stmt->execute();
    $result = $stmt->get_result();
    foreach($result->fetch_all(MYSQLI_ASSOC) as $row) {
        echo $row['id'] . " => " . $row['username'] . "<br>";
    }
}

// Для версии PHP 8.2 и выше
if(floatval(phpversion()) >= 8.2){
    $query = "SELECT * FROM users";
    $result = $db->execute_query($query); // Значения можно передать в массив вторым параметром
    // echo $db->affected_rows . "<br>";  // Количество затронутых строк в запросе
    foreach ($result as $row) {
        echo $row['id'] . " => " . $row['username'] . "<br>";
    }
}