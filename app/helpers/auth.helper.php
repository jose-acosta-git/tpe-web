<?php

class AuthHelper {
    function __construct(){
        session_start();
    }

    //crea una sesión para el usuario con sus datos
    function login($user) {
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['EMAIL_USER'] = $user->email;
    }

    //verifica si el usuario esta logeado
    function checkLogged() {
        if (!isset($_SESSION['ID_USER'])) {
            header("Location: " . BASE_URL . "login");
            die(); 
        }
    }
    
    //destruye la sesión del usuario
    function logout() {
        session_destroy();
        header("Location: " . BASE_URL . 'home');
    }   
}