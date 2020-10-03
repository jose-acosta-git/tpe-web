<?php

include_once 'libs/smarty/libs/Smarty.class.php';   

class ReviewsView {

    function printHome() {
        $smarty = new Smarty();
        $smarty->display('templates/home.tpl');
    }
    
    function printReviews($reviews, $cantidad) {
        $smarty = new Smarty();
        $smarty->assign('reviews', $reviews);
        $smarty->assign('cantidad', $cantidad);
        $smarty->display('templates/reviews.tpl');
    }

    function printReview($review) {
        $smarty = new Smarty();
        $smarty->assign('review', $review);
        $smarty->display('templates/review.tpl');
    }

    function showError($msg) {
        $smarty = new Smarty();
        $smarty->assign('msg', $msg);
        $smarty->display('templates/error.tpl');
    }
    
}