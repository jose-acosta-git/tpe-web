<?php
include_once 'app/controllers/reviews.controller.php';
include_once 'app/controllers/auth.controller.php';
include_once 'app/controllers/users.controller.php';


// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

// parsea la accion Ej: suma/1/2 --> ['suma', 1, 2]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        $controller = new ReviewsController();
        $controller->showHome();
        break;
    case 'listar':
        $controller = new ReviewsController();
        $controller->showReviews();
        break;
    case 'filtrar':
        $controller = new ReviewsController();
        $controller->showReviewsByCategory($params[1]);
        break;
    case 'detallar':
        $controller = new ReviewsController();
        $controller->showDetail($params[1]);
        break;
    case 'eliminar-review':
        $controller = new ReviewsController();
        $controller->deleteReview($params[1]);
        break;
    case 'agregar':
        $controller = new ReviewsController();
        $controller->showForms();
        break;
    case 'insertar-review':
        $controller = new ReviewsController();
        $controller->addReview();
        break;
    case 'insertar-categoria':
        $controller = new ReviewsController();
        $controller->addCategory();
        break;
    case 'editar-review':
        $controller = new ReviewsController();
        $controller->showEditReview($params[1]);
        break;
    case 'edit-review':
        $controller = new ReviewsController();
        $controller->editReview($params[1]);
        break;
    case 'show-login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->loginUser();
        break;
    case 'eliminar-categoria':
        $controller = new ReviewsController();
        $controller->deleteCategory($params[1]);
        break;
    case 'editar-categoria':
        $controller = new ReviewsController();
        $controller->showEditCategory($params[1]);
        break;
    case 'edit-category':
        $controller = new ReviewsController();
        $controller->editCategory($params[1]);
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'show-register':
        $controller = new AuthController();
        $controller->showRegister();
        break;
    case 'register':
        $controller = new AuthController();
        $controller->verifyRegister();
        break;
    case 'administrar':
        $controller = new UsersController();
        $controller->showUsers();
        break;
    case 'modificar-rol':
        $controller = new UsersController();
        $controller->modifyUser($params[1]);
        break;
    case 'eliminar-usuario':
        $controller = new UsersController();
        $controller->removeUser($params[1]);
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo('404 Page not found');
        break;
}