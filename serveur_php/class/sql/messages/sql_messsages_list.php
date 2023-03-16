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
        $sql_user_attent = new sql_user_attent();
        $res['newamis'] = $sql_user_attent->getlistattent($_SESSION['id']);
        return $res;
    }
}
