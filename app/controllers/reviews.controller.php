<?php
include_once 'app/models/reviews.model.php';
include_once 'app/views/reviews.view.php';
include_once 'app/models/categories.model.php';
include_once 'app/helpers/categories.helper.php';
include_once 'app/views/admin.view.php';

class ReviewsController {

    private $model;
    private $view;
    private $categoriesModel;
    private $categoriesHelper;
    private $categories;
    private $adminView;

    function __construct() {
        $this->model = new ReviewsModel();
        $this->categoriesHelper = new CategoriesHelper();
        $this->categories = $this->categoriesHelper->getAll();
        $this->view = new ReviewsView($this->categories);
        $this->categoriesModel = new CategoriesModel();
        $this->adminView = new AdminView($this->categories);
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

    function showForms() {
        $this->adminView->printForms();
    }

    function addReview() {
        $title = $_POST['title'];
        $author = $_POST['author']; 
        $review = $_POST['review'];
        $category = $_POST['category'];

        if (empty($title) || empty($author) || empty($review)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $this->model->insert($title, $author, $review, $category);

        header("Location: " . BASE_URL . "agregar");
    }

    function addCategory() {
        $name = $_POST['name'];
        $description = $_POST['description'];

        if (empty($name) || empty($description)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $this->categoriesModel->insert($name, $description);
        header("Location: " . BASE_URL . "agregar");
    }

    function deleteReview($id) {
        $this->model->remove($id);
        header("Location: " . BASE_URL . "listar");
    }
    
    function showEditReview($id) {
        $review = $this->model->getById($id);
        if (!$review) {
            $this->view->showError("La reseña no existe");
            die();
        }
        $this->adminView->editReview($review);
    }

    function editReview($id) {
        $title = $_POST['title'];
        $author = $_POST['author']; 
        $review = $_POST['review'];
        $category = $_POST['category'];

        if (empty($title) || empty($author) || empty($review)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $this->model->modify($title, $author, $review, $category, $id);

        header("Location: " . BASE_URL . "listar");
    }
}