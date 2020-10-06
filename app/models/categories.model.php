<?php

class CategoriesModel {

    private $db;

    function __construct(){
        $this->db = $this->connect();
    }

    function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_reseñas;charset=utf8', 'root', '');
        return $db;
    }

    function getAll() {
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();

        $reviews = $query->fetchAll(PDO::FETCH_OBJ);

        return $reviews;
    }

    function getById($id) {
        $query = $this->db->prepare('SELECT * FROM categorias WHERE id_categoria = ?');
        $query->execute([$id]);

        $review = $query->fetch(PDO::FETCH_OBJ);

        return $review;
    }

}