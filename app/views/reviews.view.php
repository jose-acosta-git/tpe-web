<?php

include_once 'libs/smarty/libs/Smarty.class.php';   

class ReviewsView {

    private $smarty;

    function __construct($categories){
        $this->smarty = new Smarty();
        $this->smarty->assign('categories', $categories);
    }

    function printHome() {
        $this->smarty->display('templates/home.tpl');
    }
    
    function printReviews($reviews, $cantidad) {
        $this->smarty->assign('reviews', $reviews);
        $this->smarty->assign('cantidad', $cantidad);
        $this->smarty->assign('titulo', 'Reviews mas destacadas');
        $this->smarty->display('templates/printAllReviews.tpl');
    }

    function printReviewsByCategory($reviews, $cantidad, $categoria) {
        $this->smarty->assign('reviews', $reviews);
        $this->smarty->assign('cantidad', $cantidad);
        $this->smarty->assign('categoria', $categoria);
        $this->smarty->assign('titulo', 'Reseñas de esta categoría');
        $this->smarty->display('templates/printReviewsByCategory.tpl');
    }

    function printReview($review) {
        $this->smarty->assign('review', $review);
        $this->smarty->display('templates/printDetail.tpl');
    }

    function showError($msg) {
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/error.tpl');
    }
    
}