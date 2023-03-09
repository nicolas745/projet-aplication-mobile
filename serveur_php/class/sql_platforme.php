<?php
class sql_platforme extends sql
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getList()
    {
        $statement = $this->query("SELECT * FROM platforme WHERE 1", array());
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
