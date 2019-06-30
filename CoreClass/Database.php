<?php


class Database
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=camagru', 'admin', 'CamagruMySQLAdmin');
    }

    private function add_rows_to_query($query, $select){
        $flag = false;
        foreach ($select as $row){
            if ($flag)
                $query .= ', ';
            $query .= $row;
            $flag = true;
        }
        $query .= ' ';
        return $query;
    }

    private function add_where_to_query($query, $where){
        $flag = false;
        $i = 'a';
        $inp = array();
        foreach ($where as $key => $sttmnt){
            if ($flag)
                $query .= " AND ";
            $query .= "$key = :$i ";
            $inp[":$i"] = $sttmnt;
            $i .= 'a';
            $flag = true;
        }
        return array($query, $inp);
    }

    public function select_where($table, $select, $where){
        $query = $this->add_rows_to_query("SELECT ", $select);
        $tmp = $this->add_where_to_query($query."FROM $table WHERE ", $where);
        var_dump($tmp[1]);
        $sth = $this->db->prepare($tmp[0]);
        $sth->execute($tmp[1]);
        $data = $sth->fetchAll();
        return $data;
    }
}
