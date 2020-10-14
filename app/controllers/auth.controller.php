<?php

include_once 'app/views/admin.view.php';
include_once 'app/helpers/categories.helper.php';

class AuthController {

    private $model;
    private $view;
    private $categoriesHelper;
    private $categories;

    function __construct(){
        $this->categoriesHelper = new CategoriesHelper();
        $this->categories = $this->categoriesHelper->getAll();
        $this->model = new UserModel();
        $this->view = new AdminView($this->categories);


    }

    function showLogin() {
        $this->view->printFormLogin();
    }



}