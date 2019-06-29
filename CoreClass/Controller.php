<?php

//TODO make it less abstract
abstract class Controller
{
    protected $view;
    protected $model;

    function __construct()
    {
        $this->view = new View();
        $this->getModel();
    }

    function getModel(){
        $modelname = str_replace('Controller', 'Model', get_called_class());
        $path = MODELS_PATH.$modelname.'.php';
        if (file_exists($path))
        {
            require ($path);
            $this->model = new $modelname;
        }
    }

    abstract function actionDefault($params = false);

}