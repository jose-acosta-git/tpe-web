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
    private $authHelper;

    function __construct() {
        $this->model = new ReviewsModel();
        $this->categoriesHelper = new CategoriesHelper();
        $this->categories = $this->categoriesHelper->getAll();
        $this->view = new ReviewsView($this->categories);
        $this->categoriesModel = new CategoriesModel();
        $this->adminView = new AdminView($this->categories);
        $this->authHelper = new AuthHelper();
    }

    function showReviews() {
        $reviews = $this->model->getAll();
        $cantidad = count($reviews);

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
            $this->view->printReview($review);
        }
        else {
            $this->view->showError('Tarea no encontrada');
        }
    }

    function showForms() {
        $this->authHelper->checkLogged();
        $this->adminView->printForms();
    }

    function addReview() {
        $this->authHelper->checkLogged();

        $title = $_POST['title'];
        $author = $_POST['author']; 
        $review = $_POST['review'];
        $category = $_POST['category'];

        if (empty($title) || empty($author) || empty($review)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $this->model->insert($title, $author, $review, $category);

        header("Location: " . BASE_URL . "listar");
    }

    function addCategory() {
        $this->authHelper->checkLogged();

        $name = $_POST['name'];
        $description = $_POST['description'];

        if (empty($name) || empty($description)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $this->categoriesModel->insert($name, $description);
        header("Location: " . BASE_URL . "listar");
    }

    function deleteReview($id) {
        $this->authHelper->checkLogged();

        $this->model->remove($id);
        header("Location: " . BASE_URL . "listar");
    }
    
    function showEditReview($id) {
        $this->authHelper->checkLogged();

        $review = $this->model->getById($id);
        if (!$review) {
            $this->view->showError("La reseña no existe");
            die();
        }
        $this->adminView->editReview($review);
    }

    function editReview($id) {
        $this->authHelper->checkLogged();

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

    function deleteCategory($id){
        $this->authHelper->checkLogged();

        $reviews = $this->model->getByCategory($id);
        foreach ($reviews as $review) {
            $this->model->remove($review->id);
        }
        $this->categoriesModel->removeCategory($id);

    }

    function showEditCategory($id) {
        $this->authHelper->checkLogged();

        $category = $this->categoriesModel->getById($id);
        if (!$category) {
            $this->view->showError("La categoría no existe");
            die();
        }
        $this->adminView->editCategory($category);
    }

    function editCategory($id) {
        $this->authHelper->checkLogged();
        
        $name = $_POST['name'];
        $description = $_POST['description'];

        if (empty($name) || empty($description)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $this->categoriesModel->modify($name, $description, $id);

        header("Location: " . BASE_URL . "listar");
    }
}