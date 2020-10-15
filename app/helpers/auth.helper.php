<?php

class AuthHelper {
    function __construct(){
        
    }

    function login($user) {
        session_start();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['EMAIL_USER'] = $user->email;
    }

    function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'login');
    }   
}