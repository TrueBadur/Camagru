<?php


class LoginController extends Controller
{
    public function actionDefault($params = false)
    {
        // TODO: Implement actionDefault() method.
        if ($this->loggedIn) {
            header("Location: " . URL); //TODO redirect to previous location
            exit;
        }
        $this->view->render('login', array('title' => 'Login'));
    }

    public function actionLogin(){
        if (!isset($_POST['login']) || !isset($_POST['passwd'])){
            header("Location: " . URL); //TODO redirect to previous location
            exit;
        }
        try {
            $this->model->can_user_login($_POST['login']);
        } catch (DatabaseException $e) {
            if ($e->getCode() == 10)
                ErrorController::action500();
            else
            {
                //TODO render correspond message (in future may be make it through ajax?)
                header("Location: " . URL.'login');
            }
            die;
        }
        Session::init();
        Session::set('loggedIn', true);
        header("Location: ".URL); //TODO redirect to previous location
        exit;
    }

    public function actionLogout(){
        Session::destroy();
        header("Location: ".URL); //TODO redirect to previous location
    }
}