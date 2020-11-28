<?php
include_once 'app/helpers/db.helper.php';

class CommentsModel {
    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DBHelper();

        $this->db = $this->dbHelper->connect();
    }

    function get($id) {
        $query = $this->db->prepare('SELECT * FROM comments WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function insert($comment, $score, $id_review, $id_user) {
        $query = $this->db->prepare('INSERT INTO comments (comment, score, id_review, id_user) VALUES (?,?,?,?)');
        $query->execute([$comment, $score, $id_review, $id_user]);
        return $this->db->lastInsertId();
    }

    function getByReview($review) {
        $query = $this->db->prepare('SELECT * FROM comments WHERE id_review = ?');
        $query->execute([$review]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}