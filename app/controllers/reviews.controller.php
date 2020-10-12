<?php
include_once 'app/models/reviews.model.php';
include_once 'app/views/reviews.view.php';
include_once 'app/models/categories.model.php';
include_once 'app/helpers/header.helper.php';

class ReviewsController {

    private $model;
    private $view;
    private $categoriesModel;
    private $headerHelper;
    private $categories;

    function __construct() {
        $this->model = new ReviewsModel();
        $this->headerHelper = new HeaderHelper();
        $this->categories = $this->headerHelper->getAll();
        $this->view = new ReviewsView($this->categories);
        $this->categoriesModel = new CategoriesModel();
    }

    function showReviews() {
        $reviews = $this->model->getAll();
        $cantidad = count($reviews);

        $this->view->printReviews($reviews, $cantidad);
    }

    function showHome(){
        $this->view->printHome($this->categories); 
    }

    function showReviewsByCategory($category){
        $reviews = $this->model->getByCategory($category);
        $cantidad = count($reviews);
        $categoria = $this->categoriesModel->getById($category);

        $this->view->printReviewsByCategory($reviews, $cantidad, $categoria);
    }

    function showDetail($id) {
        $review = $this->model->getById($id);
        if($review) {
            $this->view->printReview($review);
        }
        else {
            $this->view->showError('Tarea no encontrada');
        }
    }

    function addReview() {
        $titulo = $_POST['titulo'];
        $reseña = $_POST['reseña'];
        $categoria = $_POST['categoria'];

        if (empty($titulo) || empty($reseña)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }
        $id = $this->model->insert($titulo, $reseña, $categoria);
    }

    function deleteReview($id) {
        $this->model->remove($id);
        header("Location: " . BASE_URL . "listar");
    }
}