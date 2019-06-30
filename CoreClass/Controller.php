<?php

//TODO make it less abstract
abstract class Controller
{
    protected $view;
    protected $model;
    protected $loggedIn;

    function __construct()
    {
        $this->view = new View();
        $this->getModel();
        Session::init();
        $this->loggedIn = Session::get("loggedIn");
    }

    function getModel(){
        $modelname = str_replace('Controller', 'Model', get_called_class());
        $path = MODELS_PATH.$modelname.'.php';
        if (file_exists($path))
        {
            require ($path);
            $this->model = new $modelname($GLOBALS['db']);
        }
    }

    abstract function actionDefault($params = false);

}