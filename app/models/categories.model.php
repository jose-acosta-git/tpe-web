<?php
include_once 'app/helpers/db.helper.php';

class CategoriesModel {

    private $db;
    private $dbHelper;

    function __construct(){
        $this->dbHelper = new DBHelper();

        $this->db = $this->dbHelper->connect();
    }

    //trae todas las categorías de la db
    function getAll() {
        $query = $this->db->prepare('SELECT id, name FROM categories');
        $query->execute();

        $reviews = $query->fetchAll(PDO::FETCH_OBJ);

        return $reviews;
    }

    //trae una categoría especifica de la db, dada la id
    function getById($id) {
        $query = $this->db->prepare('SELECT * FROM categories WHERE id = ?');
        $query->execute([$id]);

        $review = $query->fetch(PDO::FETCH_OBJ);

        return $review;
    }

    //inserta una categoría a la db
    function insert($name, $description) {
        $query = $this->db->prepare('INSERT INTO categories (name, description) VALUES (?,?)');
        $query->execute([$name, $description]);
    }

    //elimina una categoría de la db
    function removeCategory($id){
        $query = $this->db->prepare('DELETE FROM categories WHERE id = ?');
        $query->execute([$id]);
    }

    //modifica los datos de una categoría de la db
    function modify($name, $description, $id) {
        $query = $this->db->prepare('UPDATE categories SET name=?, description=? WHERE id=?');
        $query->execute([$name, $description, $id]);
    }

}