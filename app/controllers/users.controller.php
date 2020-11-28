<?php

include_once 'app/models/users.model.php';
include_once 'app/views/users.view.php';

class UsersController {

    private $model;
    private $view;
    private $categoriesHelper;
    private $categories;
    private $authHelper;

    function __construct() {
        $this->categoriesHelper = new CategoriesHelper();
        $this->categories = $this->categoriesHelper->getAll();
        $this->model = new UsersModel();
        $this->view = new UsersView($this->categories);
        $this->authHelper = new AuthHelper();
    }

    function showUsers() {
        $users = $this->model->getAll();
        $cantidad = count($users);
        $this->view->printUsers($users, $cantidad);
    }

    function modifyUser($id) {
        // verifica si existe
        $user = $this->model->getById($id);
        if (!$user) {
            $this->view->showError('No existe el usuario');
            die();
        }

        if ($user->admin) {
            $this->model->changeRole(0, $id);
        } else {
            $this->model->changeRole(1, $id);
        }

        header("Location: " . BASE_URL . "administrar");
    }

    function removeUser($id) {
        // verifica si existe
        $user = $this->model->getById($id);
        if (!$user) {
            $this->view->showError('No existe el usuario');
            die();
        }

        $this->model->remove($id);

        header("Location: " . BASE_URL . "administrar");
    }
}