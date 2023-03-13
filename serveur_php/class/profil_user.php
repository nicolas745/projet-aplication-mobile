<?php
class profil_user extends sql_user
{
    public function __construct(int $id)
    {
        parent::__construct();
        echo $id;
        $data = $this->query("", array())->fetch();
        include("contenu_html/titre_add_user.php");
    }
}
