<?php
include_once 'libs/smarty/libs/Smarty.class.php';   

class ReviewsView {

    private $smarty;

    function __construct($categories){
        $this->smarty = new Smarty();
        $this->smarty->assign('categories', $categories);
    }

    //imprime el home
    function printHome() {
        $this->smarty->display('templates/home.tpl');
    }
    
    //imprime todas las reviews
    function printReviews($reviews, $cantidad) {
        $this->smarty->assign('items', $reviews);
        $this->smarty->assign('itemType', 'reviews');
        $this->smarty->assign('cantidad', $cantidad);
        $this->smarty->assign('titulo', 'Reviews mas destacadas');
        $this->smarty->display('templates/printAll.tpl');
    }

    //imprime la descripción de una categoría y sus respectivas reviews
    function printReviewsByCategory($reviews, $cantidad, $categoria) {
        $this->smarty->assign('items', $reviews);
        $this->smarty->assign('itemType', 'reviews');
        $this->smarty->assign('cantidad', $cantidad);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('titulo', 'Reseñas de esta categoría');
        $this->smarty->display('templates/printReviewsByCategory.tpl');
    }

    //imprime en detalle una review
    function printReview($review) {
        $this->smarty->assign('review', $review);
        $this->smarty->display('templates/printDetail.tpl');
    }

    //imprime un error que le llegue por parámetro
    function showError($msg) {
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/error.tpl');
    }
    
}