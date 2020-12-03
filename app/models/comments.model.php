<?php
include_once 'app/helpers/db.helper.php';

class CommentsModel {
    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DBHelper();

        $this->db = $this->dbHelper->connect();
    }

    //Devuelve un comentario de la db, dado el ID del mismo
    function get($id) {
        $query = $this->db->prepare('SELECT * FROM comments WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    //Inserta un comentario en la db
    function insert($comment, $score, $id_review, $id_user) {
        $query = $this->db->prepare('INSERT INTO comments (comment, score, id_review, id_user) VALUES (?,?,?,?)');
        $query->execute([$comment, $score, $id_review, $id_user]);
        return $this->db->lastInsertId();
    }

    //Devuelve los comentarios asociados a una review dada
    function getByReview($review) {
        $query = $this->db->prepare('SELECT comments.*,users.email as user_email
        FROM `comments` JOIN users ON (comments.id_user = users.id) WHERE id_review = ?');
        $query->execute([$review]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //Elimina un comentario de la db
    function remove($id) {
        $query = $this->db->prepare('DELETE FROM comments WHERE id = ?');
        $query->execute([$id]);
    }
}