<?php
include_once 'libs/smarty/libs/Smarty.class.php'; 

class UsersView {

    private $smarty;

    function __construct($categories){
        $this->smarty = new Smarty();
        $this->smarty->assign('categories', $categories);
    }

    //imprime los formularios de alta
    function printForms() {
        $this->smarty->display('templates/formsAlta.tpl');
    }

    //imprime el formulario para editar reviews
    function editReview($review) {
        $this->smarty->assign('review', $review);
        $this->smarty->display('templates/formsEdit.tpl');
    }
    
    //imprime el formulario de login
    function printFormLogin($error = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->assign('accion', 'login');
        $this->smarty->display('templates/formUser.tpl');
    }

    //imprime el formulario para editar categorias
    function editCategory($category) {
        $this->smarty->assign('categoria', $category);
        $this->smarty->display('templates/formsEdit.tpl');
    }

    //imprime el formulario de registro
    function printFormRegister($error = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->assign('accion', 'register');
        $this->smarty->display('templates/formUser.tpl');
    }

    function printUsers($users, $cantidad){
        $this->smarty->assign('items', $users);
        $this->smarty->assign('itemType', 'users');
        $this->smarty->assign('cantidad', $cantidad);
        $this->smarty->assign('titulo', 'Usuarios');
        $this->smarty->display('templates/printAll.tpl');
    }

    function showError($msg) {
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/error.tpl');
    }
}