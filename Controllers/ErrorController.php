<?php

class ErrorController extends Controller
{
    function action404(){
        header("HTTP/1.1 404 Not Found");
        $this->view->render('error', array('error_msg' => '404 Page not found', 'title' => '404 Not found'));
        exit;
    }

    function action500(){
        header("HTTP/1.1 500 Internal Error");
        $this->view->render('error', array('error_msg' => '500 Internal Error', 'title' => '500 Internal error'));
        exit;
    }

    public function actionDefault($params = false)
    {
        self::action404();
    }
}