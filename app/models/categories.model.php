<?php

class CategoriesModel {

    private $db;

    function __construct(){
        $this->db = $this->connect();
    }

    function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_reviews;charset=utf8', 'root', '');
        return $db;
    }

    function getAll() {
        $query = $this->db->prepare('SELECT id, name FROM categories');
        $query->execute();

        $reviews = $query->fetchAll(PDO::FETCH_OBJ);

        return $reviews;
    }

    function getById($id) {
        $query = $this->db->prepare('SELECT * FROM categories WHERE id = ?');
        $query->execute([$id]);

        $review = $query->fetch(PDO::FETCH_OBJ);

        return $review;
    }

    function insert($name, $description) {
        $query = $this->db->prepare('INSERT INTO categories (name, description) VALUES (?,?)');
        $query->execute([$name, $description]);
    }

    function removeCategory($id){
        $query = $this->db->prepare('DELETE FROM categories WHERE id = ?');
        $query->execute([$id]);
        var_dump($id);
        die();
    }
    function modify($name, $description, $id) {
        $query = $this->db->prepare('UPDATE categories SET name=?, description=? WHERE id=?');
        $query->execute([$name, $description, $id]);
    }

}