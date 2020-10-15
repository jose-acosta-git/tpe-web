<?php
include_once 'libs/smarty/libs/Smarty.class.php'; 

class AdminView {

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
        $this->smarty->display('templates/formLogin.tpl');
    }

    //imprime el formulario para editar categorias
    function editCategory($category) {
        $this->smarty->assign('categoria', $category);
        $this->smarty->display('templates/formsEdit.tpl');
    }

}