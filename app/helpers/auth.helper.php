<?php

class AuthHelper {
    function __construct(){
        
    }

    function login($user) {
        session_start();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['EMAIL_USER'] = $user->email;
    }
}