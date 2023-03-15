<?php
class sql_sex extends sql
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getList()
    {
        $statement = $this->query("SELECT * FROM sex WHERE 1", array());
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
