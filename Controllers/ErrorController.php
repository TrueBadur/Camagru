<?php

class ErrorController
{
    static $view;

    static function action404($msg) {
        header("HTTP/1.1 404 Not Found");
        echo $msg;
        $view = new View();
        $view->render('error', array('error_msg' => '404 Page not found', 'title' => '404 Not found'));
        exit;
    }

    static function action500() {
        header("HTTP/1.1 500 Internal Error");
        $view = new View();
        $view->render('error', array('error_msg' => '500 Internal Error', 'title' => '500 Internal error'));
        exit;
    }
}