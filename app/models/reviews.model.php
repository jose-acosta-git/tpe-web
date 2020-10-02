<?php

class ReviewsModel {

    private $db;

    function __construct(){
        $this->db = $this->connect();
    }

    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_reseñas;charset=utf8', 'root', '');
        return $db;
    }

    function getAll() {
        $query = $this->db->prepare('SELECT * FROM reseñas');
        $query->execute();

        $reviews = $query->fetchAll(PDO::FETCH_OBJ);

        return $reviews;
    }

    function getByCategory($category) {
        $query = $this->db->prepare('SELECT * FROM reseñas WHERE prioridad = ?');
        $query->execute([$category]);

        $reviews = $query->fetchAll(PDO::FETCH_OBJ);

        return $reviews;
    }

}