<?php
include_once 'app/helpers/db.helper.php';

class UserModel {
    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DBHelper();

        $this->db = $this->dbHelper->connect();
    }
}