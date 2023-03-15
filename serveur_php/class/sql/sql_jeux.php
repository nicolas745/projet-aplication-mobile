<?php
class sql_jeux extends sql
{
    private const limit = 20;
    public function __construct()
    {
        parent::__construct();
    }
    public function getList()
    {
        $statement = $this->query("SELECT * FROM jeux LIMIT " . $this::limit, array());
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
