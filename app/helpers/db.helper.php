<?php

class DBHelper {

    function __construct(){}

    function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_reviews;charset=utf8', 'root', '');
        return $db;
    }
}