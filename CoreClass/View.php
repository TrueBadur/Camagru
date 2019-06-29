<?php

class View {

    function __construct()
    {
    }

    function fetch($template, $params = array()){
        extract($params);
        ob_start();
        include VIEWS_PATH.$template.'.phtml';
        return ob_get_clean();
    }

    function fetchWhole($template, $params = array()){
        $inner = $this->fetch($template, $params);
        return $this->fetch('layout', array('inner' => $inner, 'title' => $params['title']));
    }

    function render($template, $params = array()){
        echo $this->fetchWhole($template, $params);
    }
}