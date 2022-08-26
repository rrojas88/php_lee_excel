<?php

if( $entorno_ejecucion == 'dev' ){
    $DB_HOST = '';
    $DB_NAME = '';
    $DB_USER = '';
    $DB_PASS = '';
}
else{
    $DB_HOST = 'localhost';
    $DB_NAME = '';
    $DB_USER = '';
    $DB_PASS = '';
}

try {
    // Ejecutamos las variables y aplicamos UTF8
    $connect = new PDO("mysql:host=".$DB_HOST.";dbname=".$DB_NAME, $DB_USER, $DB_PASS,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e) {
    exit("Error conectando...: " . $e->getMessage());
}
?>
