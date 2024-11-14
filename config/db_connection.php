<?php
try {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $db = new mysqli(DB_SETTINGS['host'], DB_SETTINGS['user'], DB_SETTINGS['password'], DB_SETTINGS['db']);
    $db->set_charset(DB_SETTINGS['charset']);
    $db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
} catch (mysqli_sql_exception $e) {
    echo "Ошибка подключения к базе данных";
    $message = date("Y-m-d H:i:s") . " " . $e . PHP_EOL;
    error_log($message, 3, "../errorlog/error.txt");
}