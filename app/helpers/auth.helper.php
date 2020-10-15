<?php

class AuthHelper {
    function __construct(){
        session_start();
    }

    function login($user) {
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['EMAIL_USER'] = $user->email;
    }

    function checkLogged() {
        if (!isset($_SESSION['ID_USER'])) {
            header("Location: " . BASE_URL . "login");
            die(); 
        }
    }
}