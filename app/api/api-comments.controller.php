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

    // Lee la variable asociada a la entrada estandar y la convierte en JSON
    function getData() { 
        return json_decode($this->data); 
    } 

    // Notifica al consumidor de la API que el recurso solicitado no existe
    function show404($params = null) {
        $this->view->response("El recurso solicitado no existe", 404);
    }

    //Agrega un comentario a la db
    function add($params=null) {
        $body = $this->getData();

        if (!$this->verify($body)) {
            $this->view->response('Faltan datos obligatorios', 500);
            die();
        }

        $comment       = $body->comment;
        $score         = $body->score;
        $id_review     = $body->id_review;
        $id_user       = $body->id_user;

        if (($score >= 1) && ($score <=5)){
            $id = $this->model->insert($comment, $score, $id_review, $id_user);
        } else {
            $this->view->response("Por favor ingrese una puntuacion del 1 al 5", 500);
            die();
        }

        if ($id > 0){
            $comment = $this->model->get($id);
            $this->view->response($comment, 200);
        }
        else { 
            $this->view->response("No se pudo insertar", 500);
        }
    }

    //Verifica que le lleguen todos los datos necesarios para agregar un comentario a la db
    function verify($body) {
        if ((isset($body->comment)) && (isset($body->score)) && (isset($body->id_review)) && (isset($body->id_user))) {
            return true;
        } else {
            return false;
        }
    }

    //Devuelve los comentarios asociados a una review específica
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

    //Elimina un comentario de la db
    function remove($params=null) {
        $id = $params[':ID'];

        $comment = $this->model->get($id);

        if ($comment) {
            $this->model->remove($id);
            $this->view->response('Se removio el comentario ' . $id . ' con exito', 200);
        } else {
            $this->view->response('El comentario solicitado no ta', 404);
        }
    }
}