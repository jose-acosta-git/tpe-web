<?php
require_once 'libs/Router.php';
require_once 'app/api/api-comments.controller.php';

// creo el router
$router = new Router();

// armo la tabla de ruteo
$router->addRoute('tareas', 'GET', 'ApiTaskController', 'getAll');
$router->addRoute('tareas/:ID', 'GET', 'ApiTaskController', 'get');
$router->addRoute('tareas/:ID', 'DELETE', 'ApiTaskController', 'delete');

// rutea
$router->route($_REQUEST['resource'],  $_SERVER['REQUEST_METHOD']);