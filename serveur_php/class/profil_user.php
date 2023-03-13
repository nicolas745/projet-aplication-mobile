<?php
class profil_user extends sql_user
{
    public function __construct(int $id)
    {
        parent::__construct();
        $data = $this->query("SELECT pseudo,description,e_mail,id_sex,id FROM `utilisateurs` WHERE id=:id", array(
            ":id" => array(
                "value" => $id,
                "type" => PDO::PARAM_INT
            )
        ))->fetch();
        if (empty($data)) return;
        $this->navuser($data);
        $this->actionclick($data);
    }
    public function navuser($data)
    {
    }
    public function actionclick($data)
    {
    }
}
