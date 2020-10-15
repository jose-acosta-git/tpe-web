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
        $query = $this->db->prepare('SELECT reviews.*,categories.name as name_category
        FROM `reviews` JOIN categories ON (reviews.id_category = categories.id)');
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
        $query = $this->db->prepare('SELECT reviews.*,categories.name as name_category FROM `reviews`
        JOIN categories ON (reviews.id_category = categories.id) WHERE reviews.id = ?');
        $query->execute([$id]);

        $review = $query->fetch(PDO::FETCH_OBJ);

        return $review;
    }

    function insert($title, $author, $review, $category) {
        $query = $this->db->prepare('INSERT INTO reviews (title, author, review, id_category) VALUES (?,?,?,?)');
        $query->execute([$title, $author, $review, $category]);
    }

    function remove($id) {
        $query = $this->db->prepare('DELETE FROM reviews WHERE id = ?');
        $query->execute([$id]);
    }

    function modify($title, $author, $review, $category, $id) {
        $query = $this->db->prepare('UPDATE reviews SET title=?, author=?, review=?, id_category=? WHERE reviews.id=?');
        $query->execute([$title, $author, $review, $category, $id]);
    }

    
}