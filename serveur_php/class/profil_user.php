<?php
class profil_user extends sql_user
{
    public function __construct(int $id)
    {
        parent::__construct();
        $data = $this->getDatauser($id);
        if (empty($data)) return;
        $this->navuser($data);
        $this->actionclick($data);
    }
    public function isBlocked(int $blocker, int $who)
    {
        $datablock = array(
            ":blocker" => array(
                "value" => $blocker,
                "type" => pdo::PARAM_INT
            ),
            ":who" => array(
                "value" => $who,
                "type" => pdo::PARAM_INT
            )
        );
        return $this->query("SELECT * FROM `blacklist` WHERE (id_blocker=:blocker AND id_who=:who)", $datablock)->fetchColumn() != 0;
    }
    public function isattent(int $sender, int $receveur)
    {
        $datami = array(
            ":sender" => array(
                "value" => $sender,
                "type" => pdo::PARAM_INT
            ),
            ":receveur" => array(
                "value" => $receveur,
                "type" => pdo::PARAM_INT
            )
        );
        return $this->query("SELECT * FROM `ami_attent` WHERE (id_receveur=:receveur AND id_send=:sender )", $datami)->fetchColumn();
    }
    public function isami(int $id_ami1, int $id_ami2)
    {
        $datami = array(
            ":ami1" => array(
                "value" => $id_ami1,
                "type" => pdo::PARAM_INT
            ),
            ":ami2" => array(
                "value" => $id_ami2,
                "type" => pdo::PARAM_INT
            ),
            ":ami1bi" => array(
                "value" => $id_ami1,
                "type" => pdo::PARAM_INT
            ),
            ":ami2bi" => array(
                "value" => $id_ami2,
                "type" => pdo::PARAM_INT
            )
        );
        return $this->query("SELECT * FROM `listamie` WHERE (id_ami1=:ami1 AND id_ami2=:ami2 ) or (id_ami2=:ami1bi AND id_ami1=:ami2bi )", $datami)->fetchColumn();
    }
    public function navuser($data)
    {
        include("contenu_html/titre_add_user.php");
    }
    public function actionclick($data)
    {
    }
}
