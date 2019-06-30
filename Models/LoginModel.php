<?php


class LoginModel extends Model
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->main_table = "users";
    }

    public function can_user_login($login){
        $sth = $this->db->select_where($this->main_table, ['password'], ['login' => $login]); //TODO check login for injections
        if (count($sth) > 2)
            throw new DatabaseException("More than one entry ", 10);
        else if (count($sth) < 1 || !hash_equals($sth[0]['password'], hash('whirlpool', $_POST['passwd'])))
            throw new WrongCredentialsException();
    }
}