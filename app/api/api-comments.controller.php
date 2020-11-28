<?php

include_once 'app/models/comments.model.php';
include_once 'app/api/api.view.php';

class ApiCommentController {
    private $model;
    private $view;
    private $data;

    function __construct() {
        $this->model = new CommentsModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    function getData() { 
        return json_decode($this->data); 
    } 

    function show404($params = null) {
        $this->view->response("El recurso solicitado no existe", 404);
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
            $this->view->response($comment, 200);
        }
        else { 
            $this->view->response("No se pudo insertar", 500);
        }
    }
}