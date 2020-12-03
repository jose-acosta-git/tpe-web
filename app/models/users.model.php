<?php
include_once 'app/helpers/db.helper.php';

class UsersModel {
    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DBHelper();

        $this->db = $this->dbHelper->connect();
    }

    //trae la información de un usuario de la db, dado el email
    function getByEmail($email) {
        $query = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    //registra un usuario en la db
    function add($email, $password) {
        $query = $this->db->prepare('INSERT INTO users (email, password) VALUES (?,?)');
        $query->execute([$email, $password]);
        return $this->db->lastInsertId();
    }

    //devuelve todos los usuarios de la db
    function getAll() {
        $query = $this->db->prepare('SELECT id, email, admin FROM users');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //devuelve un usuario dado el ID del mismo
    function getById($id) {
        $query = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    //modifica el rol de un usuario
    function changeRole($admin, $id) {
        $query = $this->db->prepare('UPDATE users SET admin=? WHERE id = ?');
        $query->execute([$admin, $id]);
    }

    //elimina un usuario de la db
    function remove($id){
        $query = $this->db->prepare('DELETE FROM users WHERE id = ?');
        $query->execute([$id]);
    }
}