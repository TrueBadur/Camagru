<?php


class IndexController extends Controller
{

    public function actionDefault($params = false)
    {
        $this->view->render('index', array('title' => 'index', 'line' => $params));
    }
}