<?php

class UserModel {
    private $db;

    function __construct(){
        $this->db = $this->connect();
    }

    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_reviews;charset=utf8', 'root', '');
        return $db;
    }

    function getByEmail($email) {
        $query = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}