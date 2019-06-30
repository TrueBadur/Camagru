<?php


class Session
{
    static function init(){
        if (!isset($_SESSION))
            session_start();
    }

    static function get($key){
        if (isset($_SESSION[$key]))
            return($_SESSION[$key]);
        return false;
    }

    static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    static function destroy() {
        $_SESSION = null;
        session_destroy();
    }
}