<?php
class sql_messsages_list extends sql_messsages
{
    private const maxdata = 5;
    public function __construct()
    {
        parent::__construct();
    }
    public function listnewmessage()
    {
        $res = array();
        $res['message'] = array();
        $res['newamis'] = $this->query("SELECT * FROM `ami_attent` INNER JOIN utilisateurs ON ami_attent.id_receveur=utilisateurs.id  WHERE utilisateurs.id=:receveur", array(
            ":receveur" => array(
                "value" => $_SESSION['id'],
                "type" => pdo::PARAM_INT
            )
        ))->fetchAll();
        return $res;
    }
}
