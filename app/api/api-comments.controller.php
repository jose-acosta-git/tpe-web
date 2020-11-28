<?php

include_once 'app/models/comments.model.php';
include_once 'app/api/api.view.php';
include_once 'app/models/reviews.model.php';

class ApiCommentController {
    private $model;
    private $reviewsModel;
    private $view;
    private $data;

    function __construct() {
        $this->model = new CommentsModel();
        $this->reviewsModel = new ReviewsModel();
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

    function getByReview($params=null) {
        $id_review = $params[':REVIEW'];

        $review = $this->reviewsModel->getById($id_review);

        if ($review) {
            $comments = $this->model->getByReview($id_review);
            $this->view->response($comments, 200);
        } else {
            $this->view->response('La review solicitada no ta', 404);
        }
    }

    function remove($params=null) {
        $id = $params[':ID'];

        $comment = $this->model->get($id);

        if ($comment) {
            $this->model->remove($id);
            $this->view->response('Se removio el comentario ' $id ' con exito', 200);
        } else {
            $this->view->response('El comentario solicitado no ta', 404);
        }
    }
}