<?php

include_once 'libs/smarty/libs/Smarty.class.php';   

class AdminView {
    function printView(){
        $smarty = new Smarty();
        $smarty->display('templates/formLogin.tpl');
    }
}