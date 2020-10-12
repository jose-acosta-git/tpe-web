<?php

include_once 'app/models/categories.model.php';

class CategoriesHelper {

    private $model;

    function __construct(){
        $this->model = new CategoriesModel();
    }

    function getAll() {
        $categories = $this->model->getAll();
        return $categories;
    }
}