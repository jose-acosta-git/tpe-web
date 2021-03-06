<?php
include_once 'app/models/reviews.model.php';
include_once 'app/models/categories.model.php';
include_once 'app/views/reviews.view.php';
include_once 'app/views/users.view.php';
include_once 'app/helpers/categories.helper.php';

class ReviewsController {

    private $model;
    private $view;
    private $categoriesModel;
    private $categoriesHelper;
    private $categories;
    private $usersView;
    private $authHelper;

    function __construct() {
        $this->model = new ReviewsModel();
        $this->categoriesHelper = new CategoriesHelper();
        $this->categories = $this->categoriesHelper->getAll();
        $this->view = new ReviewsView($this->categories);
        $this->categoriesModel = new CategoriesModel();
        $this->usersView = new UsersView($this->categories);
        $this->authHelper = new AuthHelper();
    }

    //muestra todas las reviews
    function showReviews() {
        $reviews = $this->model->getAll();
        $cantidad = count($reviews);

        $this->view->printReviews($reviews, $cantidad);
    }

    //muestra el home
    function showHome(){
        $this->view->printHome(); 
    }

    //filtra las reviews de una determinada categoria y las muestra junto con la descripcion de la misma
    function showReviewsByCategory($category){
        $reviews = $this->model->getByCategory($category);
        $cantidad = count($reviews);
        $categoria = $this->categoriesModel->getById($category);

        $this->view->printReviewsByCategory($reviews, $cantidad, $categoria);
    }

    //muestra el detalle de una review específica
    function showDetail($id) {
        $review = $this->model->getById($id);
        if($review) {
            $this->view->printReview($review);
        }
        else {
            //si no la encontró en la base de datos comunica al usuario
            $this->view->showError('Tarea no encontrada');
        }
    }

    //muestra los formularios de alta
    function showForms() {
        $this->authHelper->checkLogged(1);
        $this->usersView->printForms();
    }

    //agrega una review a la db
    function addReview() {
        $this->authHelper->checkLogged(1);

        $title = $_POST['title'];
        $author = $_POST['author']; 
        $review = $_POST['review'];
        $category = $_POST['category'];

        //verifico que los campos no estén vacíos
        if (empty($title) || empty($author) || empty($review)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        if ($_FILES['image']['type'] == "image/jpg" || 
            $_FILES['image']['type'] == "image/jpeg" || 
            $_FILES['image']['type'] == "image/png" )
        {
            $realName = $this->uniqueSaveName($_FILES['image']['name'], $_FILES['image']['tmp_name']);
            $this->model->insert($title, $author, $review, $category, $realName);
        } else {
            $this->model->insert($title, $author, $review, $category);
        }

        header("Location: " . BASE_URL . "listar");
    }

    // Construye un nombre unico de archivo y ademas lo mueve a mi carpeta de imagenes
    function uniqueSaveName($realName, $tempName) {
        
        $filePath = "images/" . uniqid("", true) . "." 
            . strtolower(pathinfo($realName, PATHINFO_EXTENSION));

        move_uploaded_file($tempName, $filePath);

        return $filePath;
    }

    //agrega una categoria a la db
    function addCategory() {
        $this->authHelper->checkLogged(1);

        $name = $_POST['name'];
        $description = $_POST['description'];

        //verifico que los campos no estén vacíos
        if (empty($name) || empty($description)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $this->categoriesModel->insert($name, $description);
        header("Location: " . BASE_URL . "listar");
    }

    //elimina una review de la db
    function deleteReview($id) {
        $this->authHelper->checkLogged(1);

        $this->model->remove($id);
        header("Location: " . BASE_URL . "listar");
    }
    
    //muestra el formulario para editar una review
    function showEditReview($id) {
        $this->authHelper->checkLogged(1);

        $review = $this->model->getById($id);
        if (!$review) {
            //si no encuentro review con esa id le comunico al usuario
            $this->view->showError("La reseña no existe");
            die();
        }
        $this->usersView->editReview($review);
    }

    //edita una review de la db
    function editReview($id) {
        $this->authHelper->checkLogged(1);

        $title = $_POST['title'];
        $author = $_POST['author']; 
        $review = $_POST['review'];
        $category = $_POST['category'];

        //verifico que los campos no estén vacíos
        if (empty($title) || empty($author) || empty($review)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        if ($_FILES['image']['type'] == "image/jpg" || 
            $_FILES['image']['type'] == "image/jpeg" || 
            $_FILES['image']['type'] == "image/png" )
        {
            $realName = $this->uniqueSaveName($_FILES['image']['name'], $_FILES['image']['tmp_name']);
            $this->model->modify($title, $author, $review, $category, $id, $realName);
        } else {
            $this->model->modify($title, $author, $review, $category, $id);
        }

        header("Location: " . BASE_URL . "listar");
    }

    //elimina una categoria y sus respectivas reviews de la db
    function deleteCategory($id){
        $this->authHelper->checkLogged(1);

        //elimina todas las reviews de esa categoria de la db
        $this->model->removeAllByCategory($id);
        //elimina la categoria de la db
        $this->categoriesModel->removeCategory($id);

        header("Location: " . BASE_URL . "listar");
    }

    //muestra el formulario para editar una categoria
    function showEditCategory($id) {
        $this->authHelper->checkLogged(1);

        $category = $this->categoriesModel->getById($id);
        //si no encuentro categoria con esa id le comunico al usuario
        if (!$category) {
            $this->view->showError("La categoría no existe");
            die();
        }
        $this->usersView->editCategory($category);
    }

    //edita una categoria de la db
    function editCategory($id) {
        $this->authHelper->checkLogged(1);
        
        $name = $_POST['name'];
        $description = $_POST['description'];

        //verifico que los campos no estén vacíos
        if (empty($name) || empty($description)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $this->categoriesModel->modify($name, $description, $id);

        header("Location: " . BASE_URL . "listar");
    }
}