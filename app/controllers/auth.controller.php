<?php

include_once 'app/views/admin.view.php';
include_once 'app/helpers/categories.helper.php';
include_once 'app/helpers/auth.helper.php';
include_once 'app/models/user.model.php';

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

    //muestra formulario de login
    function showLogin() {
        $this->view->printFormLogin();
    }

    //verifica datos ingresados y todo es correcto "logea" al usuario
    function loginUser() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        //verifico datos ingresados
        if (empty($email) || empty($password)) {
            $this->view->printFormLogin("Faltan datos obligatorios");
            die();
        }

        $user = $this->model->getByEmail($email);

        //salvo posibles errores
        if (!$user) {
            $this->view->printFormLogin("No existe ninguna cuenta asociada a este email");
        }
        else if (!password_verify($password, $user->password)) {
            $this->view->printFormLogin("Contraseña incorrecta");
        }
        else {
            //logeo al usuario
            $this->authHelper->login($user);
            header("Location: " . BASE_URL . 'home');
        }
        
    }

    //cierra la sesión del usuario
    function logout() {
        $this->authHelper->logout();
    }
}