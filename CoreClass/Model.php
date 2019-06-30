<?php


class Model
{
    protected $db;
    protected $main_table;

    public function __construct($db)
    {
        $this->db = $db;
    }
}