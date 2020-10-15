<?php

class DBHelper {

    function __construct(){}

    //establece la conexión con la db
    function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_reviews;charset=utf8', 'root', '');
        return $db;
    }
}