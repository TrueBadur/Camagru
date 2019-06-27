<?php

class ErrorController extends Controller
{
    static function action404($message = false){
        header("HTTP/1.1 404 Not Found");
        echo "<br>404 Page<br>";
        if (isset($message) && !empty($message))
            echo $message;
        exit;
    }

    public function actionDefault($params = false)
    {
        self::action404($params);
    }
}