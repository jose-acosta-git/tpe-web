<?php

class ReviewsModel {

    private $db;

    function __construct(){
        $this->db = $this->connect();
    }

    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_reviews;charset=utf8', 'root', '');
        return $db;
    }

    function getAll() {
        $query = $this->db->prepare('SELECT * FROM reviews');
        $query->execute();

        $reviews = $query->fetchAll(PDO::FETCH_OBJ);

        return $reviews;
    }

    function getByCategory($category) {
        $query = $this->db->prepare('SELECT * FROM reviews WHERE id_category = ?');
        $query->execute([$category]);

        $reviews = $query->fetchAll(PDO::FETCH_OBJ);

        return $reviews;
    }

    function getById($id) {
        $query = $this->db->prepare('SELECT * FROM reviews WHERE id = ?');
        $query->execute([$id]);

        $review = $query->fetch(PDO::FETCH_OBJ);

        return $review;
    }

    function insert($titulo, $reseña, $categoria) {
        $query = $this->db->prepare('INSERT INTO reviews (title, review, id_category) VALUES (?,?,?)');
        $query->execute([$titulo, $reseña, $categoria]);
    }

    function remove($id) {
        $query = $this->db->prepare('DELETE FROM reviews WHERE id = ?');
        $query->execute([$id]);
    }

}