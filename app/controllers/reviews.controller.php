<?php
include_once 'app/models/reviews.model.php';
include_once 'app/views/reviews.view.php';

class ReviewsController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new ReviewsModel();
        $this->view = new ReviewsView();
    }

    function showReviews() {
        $reviews = $this->model->getAll();
        $this->view->printReviews($reviews);
    }

    function showReviewsByCategory($category){
        $reviews = $this->model->getByCategory($category);
        $this->view->printReviews($reviews);
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
    }
}
