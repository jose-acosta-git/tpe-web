<?php

include_once 'app/views/admin.view.php';
include_once 'app/helpers/categories.helper.php';
include_once 'app/models/user.model.php';
include_once 'app/helpers/auth.helper.php';

class AuthController {

    private $model;
    private $view;
    private $categoriesHelper;
    private $categories;
    private $authHelper;

    function __construct(){
        $this->categoriesHelper = new CategoriesHelper();
        $this->categories = $this->categoriesHelper->getAll();
        $this->model = new UserModel();
        $this->view = new AdminView($this->categories);
        $this->authHelper = new AuthHelper();
    }

    function showLogin() {
        $this->view->printFormLogin();
    }

    function loginUser() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            $this->view->printFormLogin("Faltan datos obligatorios");
            die();
        }

        $user = $this->model->getByEmail($email);

        if (!$user) {
            $this->view->printFormLogin("No existe ninguna cuenta asociada a este email");
        }
        else if (!password_verify($password, $user->password)) {
            $this->view->printFormLogin("Contraseña incorrecta");
        }
        else {
            $this->authHelper->login($user);
            header("Location: " . BASE_URL . 'home');
        }
        
    }

    function logout() {
        $this->authHelper->logout();
    }
}