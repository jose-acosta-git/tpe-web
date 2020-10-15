<?php

class AdminView {

    private $smarty;

    function __construct($categories){
        $this->smarty = new Smarty();
        $this->smarty->assign('categories', $categories);
    }

    function printForms() {
        $this->smarty->display('templates/formsAlta.tpl');
    }

    function editReview($review) {
        $this->smarty->assign('review', $review);
        $this->smarty->display('templates/formsEdit.tpl');
    }
    
    function printFormLogin($error = null) {
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/formLogin.tpl');
    }

    function editCategory($category) {
        $this->smarty->assign('categoria', $category);
        $this->smarty->display('templates/formsEdit.tpl');
    }

}