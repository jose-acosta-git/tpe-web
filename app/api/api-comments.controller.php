<?php

include_once 'app/models/comments.model.php';
include_once 'app/views/api.view.php';

class ApiCommentController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new CommentsModel();
        $this->view = new CommentsView();
        $this->data = file_get_contents("php://input");
    }

    function getData() { 
        return json_decode($this->data); 
    } 

    function add($params=null) {

        $body = $this->getData();

        $comment       = $body->comment;
        $score         = $body->score;
        $id_review     = $body->id_review;
        $id_user       = $body->id_user;

        $id = $this->model->insert($comment, $score, $id_review, $id_user);

        if ($id > 0) {
            $comment = $this->model->get($id);
            $this->view->response($task, 200);
        }
        else { 
            $this->view->response("No se pudo insertar", 500);
        }
    }
}