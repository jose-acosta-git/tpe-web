<?php
require_once 'libs/Router.php';
require_once 'app/api/api-comments.controller.php';

// creo el router
$router = new Router();

// armo la tabla de ruteo
$router->addRoute('comments', 'POST', 'ApiCommentController', 'add');
$router->addRoute('comments/:REVIEW', 'GET', 'ApiCommentController', 'getByReview');
$router->addRoute('comments/:ID', 'DELETE', 'ApiCommentController', 'remove');

$router->setDefaultRoute('ApiTaskController','show404');

// rutea
$router->route($_REQUEST['resource'],  $_SERVER['REQUEST_METHOD']);
