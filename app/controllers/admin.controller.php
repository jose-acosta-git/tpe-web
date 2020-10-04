<?php

include_once 'app/models/admin.model.php';
include_once 'app/view/admin.view.php';

class AdminController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new AdminModel();
        $this->view = new AdminView();
    }

    function login() {
        $this->view->printForm();
    }

}