<?php


class LoginController extends Controller
{
    public function actionDefault($params = false)
    {
        // TODO: Implement actionDefault() method.
        $this->view->render('login', array('title' => 'Login'));
    }
    public function login(){
        $this->model->get_single();
    }
}