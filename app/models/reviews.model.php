<?php
include_once 'app/helpers/db.helper.php';

class ReviewsModel {

    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DBHelper();

        $this->db = $this->dbHelper->connect();
    }

    //trae todas las reviews de la db, y el nombre de la categoría correspondiente
    function getAll() {
        $query = $this->db->prepare('SELECT reviews.*,categories.name as name_category
        FROM `reviews` JOIN categories ON (reviews.id_category = categories.id)');
        $query->execute();

        $reviews = $query->fetchAll(PDO::FETCH_OBJ);

        return $reviews;
    }

    //trae todas las reviews de la db, de una determinada categoria
    function getByCategory($category) {
        $query = $this->db->prepare('SELECT * FROM reviews WHERE id_category = ?');
        $query->execute([$category]);

        $reviews = $query->fetchAll(PDO::FETCH_OBJ);

        return $reviews;
    }

    //trae una review de la bd, dada la id
    function getById($id) {
        $query = $this->db->prepare('SELECT reviews.*,categories.name as name_category FROM `reviews`
        JOIN categories ON (reviews.id_category = categories.id) WHERE reviews.id = ?');
        $query->execute([$id]);

        $review = $query->fetch(PDO::FETCH_OBJ);

        return $review;
    }

    //inserta una review a la db
    function insert($title, $author, $review, $category) {
        $query = $this->db->prepare('INSERT INTO reviews (title, author, review, id_category) VALUES (?,?,?,?)');
        $query->execute([$title, $author, $review, $category]);
    }

    //elimina una review de la db
    function remove($id) {
        $query = $this->db->prepare('DELETE FROM reviews WHERE id = ?');
        $query->execute([$id]);
    }

    //modifica una review de la db
    function modify($title, $author, $review, $category, $id) {
        $query = $this->db->prepare('UPDATE reviews SET title=?, author=?, review=?, id_category=? WHERE reviews.id=?');
        $query->execute([$title, $author, $review, $category, $id]);
    }

    
}