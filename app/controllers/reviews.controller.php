<?php
include_once 'app/models/reviews.model.php';
include_once 'app/views/reviews.view.php';
include_once 'app/models/categories.model.php';

class ReviewsController {

    private $model;
    private $view;
    private $categoriesModel;

    function __construct() {
        $this->model = new ReviewsModel();
        $this->view = new ReviewsView();
        $this->categoriesModel = new CategoriesModel();
    }

    function showReviews() {
        $reviews = $this->model->getAll();
        $cantidad = count($reviews);
        $categories = $this->categoriesModel->getAll();

        foreach ($reviews as $review) {
            foreach ($categories as $category) {
                if ($category->id == $review->id_category) {
                    $review->categoria = $category->name;
                }
            }
        }
        $this->view->printReviews($reviews, $cantidad);
    }

    function showHome(){
        $this->view->printHome(); 
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
            $review->categoria = $this->categoriesModel->getById($review->id_category)->name;
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
