<?php

class DatabaseException extends Exception {
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = "DatabseException: ".$message;
        parent::__construct($message, $code, $previous);
    }
}

class WrongCredentialsException extends DatabaseException{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = "Can't find such user in database. ".$message;
        $code = 3;
        parent::__construct($message, $code, $previous);
    }
}