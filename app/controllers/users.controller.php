<?php

include_once 'app/models/user.model.php';
include_once 'app/views/users.view.php';

class UsersController {

    private $model;
    private $view;
    private $categoriesHelper;
    private $categories;
    private $authHelper;

    function __construct(){
        $this->categoriesHelper = new CategoriesHelper();
        $this->categories = $this->categoriesHelper->getAll();
        $this->model = new UserModel();
        $this->view = new UsersView($this->categories);
        $this->authHelper = new AuthHelper();
    }

    function showUsers(){
        $users = $this->model->getAll();
        $cantidad = count($users);
        $this->view->printUsers($users, $cantidad);
    }
}