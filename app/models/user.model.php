<?php
include_once 'app/helpers/db.helper.php';

class UserModel {
    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DBHelper();

        $this->db = $this->dbHelper->connect();
    }

    function getByEmail($email) {
        $query = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}