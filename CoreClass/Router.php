<?php


class Router
{

    public function getURI(){
        if (!empty($_SERVER["REQUEST_URI"]))
            return trim($_SERVER['REQUEST_URI'], '/');
        return "";
    }

    public function getController($controller)
    {
        if (!isset($controller))
            $this->errorUri("No controller given");
        if (file_exists($controller_file = ROOT."/Controllers/".$controller.'.php'))
            include $controller_file;
        if(!class_exists($controller))
            $this->errorUri("No class in file");
        return new $controller;
    }
    public function getAction($controller, $action)
    {
        if ($action == 'action')
            return 'actionDefault';
        else if (method_exists($controller, $action))
            return $action;
        else
            $this->errorUri("No such action");
        return false;
    }

    public function parse_uri($url)
    {
        $tmp = explode('/', $url);
        $ret = [];
        $ret['controller'] = $this->getController(empty($tmp[0]) ? 'IndexController' :
            ucfirst(array_shift($tmp)).'Controller');
        $ret['action'] = $this->getAction($ret['controller'], 'action'.ucfirst(array_shift($tmp)));
        $ret['params'] = $tmp;
        return $ret;
    }

    public function errorUri($message, $action = 'action404')
    {
        include ROOT.'/Controllers/ErrorController.php';
        $controller = new ErrorController();
        $controller->$action($message);
        die();
    }

    public function run()
    {
        $tmp = $this->parse_uri($this->getURI());
        extract($tmp);
        call_user_func_array(array($controller, $action), $params);
    }
}