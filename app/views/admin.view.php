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

}